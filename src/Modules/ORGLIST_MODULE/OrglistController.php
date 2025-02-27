<?php

namespace Budabot\Modules\ORGLIST_MODULE;

use Budabot\Core\Event;
use stdClass;

/**
 * @author Tyrence (RK2)
 * @author Lucier (RK1)
 *
 * @Instance
 *
 * Commands this controller contains:
 *	@DefineCommand(
 *		command     = 'orglist',
 *		accessLevel = 'guild',
 *		description = 'Check an org roster',
 *		help        = 'orglist.txt'
 *	)
 */
class OrglistController {

	/**
	 * Name of the module.
	 * Set automatically by module loader.
	 */
	public $moduleName;

	/**
	 * @var \Budabot\Core\DB $db
	 * @Inject
	 */
	public $db;
	
	/**
	 * @var \Budabot\Core\Budabot $chatBot
	 * @Inject
	 */
	public $chatBot;
	
	/**
	 * @var \Budabot\Core\BuddylistManager $buddylistManager
	 * @Inject
	 */
	public $buddylistManager;
	
	/**
	 * @var \Budabot\Core\Modules\PLAYER_LOOKUP\GuildManager $guildManager
	 * @Inject
	 */
	public $guildManager;

	/**
	 * @var \Budabot\Core\Text $text
	 * @Inject
	 */
	public $text;
	
	/**
	 * @var \Budabot\Core\Util $util
	 * @Inject
	 */
	public $util;
	
	/**
	 * @var \Budabot\Core\Modules\PLAYER_LOOKUP\PlayerManager $playerManager
	 * @Inject
	 */
	public $playerManager;
	
	/**
	 * @var \Budabot\Modules\ORGLIST_MODULE\FindOrgController $findOrgController
	 * @Inject
	 */
	public $findOrgController;
	
	protected $orglist = null;
	protected $orgrankmap = array();
	
	public function __construct() {
		$this->orgrankmap["Anarchism"]  = array("Anarchist");
		$this->orgrankmap["Monarchy"]   = array("Monarch",   "Counsil",      "Follower");
		$this->orgrankmap["Feudalism"]  = array("Lord",      "Knight",       "Vassal",          "Peasant");
		$this->orgrankmap["Republic"]   = array("President", "Advisor",      "Veteran",         "Member",         "Applicant");
		$this->orgrankmap["Faction"]    = array("Director",  "Board Member", "Executive",       "Member",         "Applicant");
		$this->orgrankmap["Department"] = array("President", "General",      "Squad Commander", "Unit Commander", "Unit Leader", "Unit Member", "Applicant");
	}
	
	/**
	 * @HandlesCommand("orglist")
	 * @Matches("/^orglist end$/i")
	 */
	public function orglistEndCommand($message, $channel, $sender, $sendto, $args) {
		if (isset($this->orglist)) {
			$this->orglistEnd();
		} else {
			$sendto->reply("There is no orglist currently running.");
		}
	}
	
	/**
	 * @HandlesCommand("orglist")
	 * @Matches("/^orglist (.+)$/i")
	 */
	public function orglistCommand($message, $channel, $sender, $sendto, $args) {
		$search = $args[1];

		if (preg_match("/^[0-9]+$/", $search)) {
			$this->checkOrglist($search, $sendto);
		} else {
			$orgs = $this->getMatches($search);
			$count = count($orgs);

			if ($count == 0) {
				$msg = "Could not find any orgs (or players in orgs) that match <highlight>$search<end>.";
				$sendto->reply($msg);
			} elseif ($count == 1) {
				$this->checkOrglist($orgs[0]->id, $sendto);
			} else {
				$blob = $this->findOrgController->formatResults($orgs);
				$msg = $this->text->makeBlob("Org Search Results for '{$search}' ($count)", $blob);
				$sendto->reply($msg);
			}
		}
	}
	
	public function getMatches($search) {
		$orgs = $this->findOrgController->lookupOrg($search);

		// check if search is a character and add character's org to org list if it's not already in the list
		$name = ucfirst(strtolower($search));
		$whois = $this->playerManager->getByName($name);
		if ($whois !== null && $whois->guild_id != 0) {
			$found = false;
			foreach ($orgs as $org) {
				if ($org->id == $whois->guild_id) {
					$found = true;
					break;
				}
			}
			
			if (!$found) {
				$obj = new stdClass;
				$obj->name = $whois->guild;
				$obj->id = $whois->guild_id;
				$obj->faction = $whois->faction;
				$obj->num_members = 'unknown';
				$orgs []= $obj;
			}
		}

		return $orgs;
	}
	
	public function checkOrglist($orgid, $sendto) {
		// Check if we are already doing a list.
		if (isset($this->orglist)) {
			$msg = "There is already an orglist running. You may force it to end by using <symbol>orglist end.";
			$sendto->reply($msg);
			return;
		}
		
		$this->orglist["start"] = time();
		$this->orglist["sendto"] = $sendto;

		$sendto->reply("Downloading org roster for org id $orgid...");

		$org = $this->guildManager->getById($orgid);

		if ($org === null) {
			$msg = "Error in getting the Org info. Either org does not exist or AO's server was too slow to respond.";
			$sendto->reply($msg);
			unset($this->orglist);
			return;
		}

		$this->orglist["org"] = $org->orgname;
		$this->orglist["orgtype"] = $this->getOrgGoverningForm($org->members);

		// Check each name if they are already on the buddylist (and get online status now)
		// Or make note of the name so we can add it to the buddylist later.
		foreach ($org->members as $member) {
			// Writing the whois info for all names
			// Name (Level 1/1, Sex Breed Profession)
			$thismember  = '<highlight>'.$member->name.'<end>';
			$thismember .= ' (Level <highlight>'.$member->level."<end>";
			if ($member->ai_level > 0) {
				$thismember .= "<green>/".$member->ai_level."<end>";
			}
			$thismember .= ", ".$member->gender;
			$thismember .= " ".$member->breed;
			$thismember .= " <highlight>".$member->profession."<end>)";

			$this->orglist["result"][$member->name]["post"] = $thismember;

			$this->orglist["result"][$member->name]["name"] = $member->name;
			$this->orglist["result"][$member->name]["rank_id"] = $member->guild_rank_id;
		}

		$sendto->reply("Checking online status for " . count($org->members) ." members of '$org->orgname'...");
		
		$this->checkOnline($org->members);
		$this->addOrgMembersToBuddylist();

		unset($org);
		
		if (count($this->orglist["added"]) == 0) {
			$this->orglistEnd();
		}
	}
	
	public function getOrgGoverningForm($members) {
		$governingForm = '';
		$forms = $this->orgrankmap;
		foreach ($members as $member) {
			foreach ($forms as $name => $ranks) {
				if ($ranks[$member->guild_rank_id] != $member->guild_rank) {
					unset($forms[$name]);
				}
			}
			if (count($forms) == 1) {
				break;
			}
		}
		
		// it's possible we haven't narrowed it down to 1 at this point
		// If we haven't found the org yet, it can only be
		// Republic or Department with only a president.
		// choose the first one
		return array_shift($forms);
	}
	
	public function checkOnline($members) {
		foreach ($members as $member) {
			$buddy_online_status = $this->buddylistManager->isOnline($member->name);
			if ($buddy_online_status !== null) {
				$this->orglist["result"][$member->name]["online"] = $buddy_online_status;
			} elseif ($this->chatBot->vars["name"] == $member->name) {
				$this->orglist["result"][$member->name]["online"] = 1;
			} else {
				// check if they exist
				if ($this->chatBot->get_uid($member->name)) {
					$this->orglist["check"][$member->name] = 1;
				}
			}
		}
	}
	
	public function addOrgMembersToBuddylist() {
		foreach ($this->orglist["check"] as $name => $value) {
			if (!$this->checkBuddylistSize()) {
				break;
			}

			$this->orglist["added"][$name] = 1;
			unset($this->orglist["check"][$name]);
			$this->buddylistManager->add($name, 'onlineorg');
		}
	}
	
	public function orglistEnd() {
		$orgcolor["offline"] = "<font color='#555555'>";   // Offline names

		$msg = $this->orgmatesformat($this->orglist, $orgcolor, $this->orglist["start"], $this->orglist["org"]);
		$this->orglist["sendto"]->reply($msg);

		// in case it was ended early
		foreach ($this->orglist["added"] as $name => $value) {
			$this->buddylistManager->remove($name, 'onlineorg');
		}
		unset($this->orglist);
	}
	
	public function orgmatesformat($memberlist, $orgcolor, $timestart, $orgname) {
		$map = $memberlist["orgtype"];

		$totalonline = 0;
		$totalcount = count($memberlist["result"]);
		foreach ($memberlist["result"] as $amember) {
			$newlist[$amember["rank_id"]][] = $amember["name"];
		}

		$blob = '';

		for ($rankid = 0; $rankid < count($map); $rankid++) {
			$onlinelist = "";
			$offlinelist = "";
			$olcount = 0;
			$rank_online = 0;
			$rank_total = count($newlist[$rankid]);

			sort($newlist[$rankid]);
			for ($i = 0; $i < $rank_total; $i++) {
				if ($memberlist["result"][$newlist[$rankid][$i]]["online"]) {
					$rank_online++;
					$onlinelist .= "  " . $memberlist["result"][$newlist[$rankid][$i]]["post"] . "\n";
				} else {
					if ($offlinelist != "") {
						$offlinelist .= ", ";
						if (($olcount % 50) == 0) {
							$offlinelist .= "<end><pagebreak>" . $orgcolor["offline"];
						}
					}
					$offlinelist .= $newlist[$rankid][$i];
					$olcount++;
				}
			}

			$totalonline += $rank_online;

			$blob .= "\n<header2>" . $map[$rankid] . "<end> ({$rank_online} / {$rank_total})\n";

			if ($onlinelist != "") {
				$blob .= $onlinelist;
			}
			if ($offlinelist != "") {
				$blob .= $orgcolor["offline"] . $offlinelist . "<end>\n";
			}
			$blob .= "\n";
		}

		$totaltime = time() - $timestart;
		$blob .= "\nLookup took $totaltime seconds.";
		
		return $this->text->makeBlob("Orglist for '".$this->orglist["org"]."' ($totalonline / $totalcount)", $blob);
	}
	
	/**
	 * @Event("logOn")
	 * @Event("logOff")
	 * @Description("Records online status of org members")
	 */
	public function orgMemberLogonEvent(Event $eventObj) {
		$this->updateOrglist($eventObj->sender, $eventObj->type);
	}

	/**
	 * @Event("packet(41)")
	 * @Description("Records online status of org members")
	 */
	public function buddyRemovedEvent(Event $eventObj) {
		if (isset($this->orglist)) {
			$this->addOrgMembersToBuddylist();
		}
	}

	public function updateOrglist($sender, $type) {
		if (isset($this->orglist["added"][$sender])) {
			if ($type == "logon") {
				$this->orglist["result"][$sender]["online"] = 1;
			} elseif ($type == "logoff") {
				$this->orglist["result"][$sender]["online"] = 0;
			}

			$this->buddylistManager->remove($sender, 'onlineorg');
			unset($this->orglist["added"][$sender]);

			if (count($this->orglist["check"]) == 0 && count($this->orglist["added"]) == 0) {
				$this->orglistEnd();
			}
		}
	}
	
	public function checkBuddylistSize() {
		return count($this->buddylistManager->buddyList) < ($this->chatBot->getBuddyListSize() - 5);
	}
}
