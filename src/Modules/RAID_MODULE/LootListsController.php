<?php

namespace Budabot\Modules\RAID_MODULE;

/**
 * @author Marinerecon (RK2)
 * @author Derroylo (RK2)
 * @author Tyrence (RK2)
 * @author Morgo (RK2)
 * @author Chachy (RK2)
 * @author Dare2005 (RK2)
 * @author Nadyita (RK5)
 *
 * based on code for dbloot module by Chachy (RK2)
 *
 * @Instance
 *
 * Commands this class contains:
 *	@DefineCommand(
 *		command     = 'alb',
 *		accessLevel = 'all',
 *		description = 'Shows possible Albtraum loots',
 *		help        = 'albloot.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'db1',
 *		accessLevel = 'all',
 *		description = 'Shows possible DB1 Armor/NCUs/Programs',
 *		help        = 'dbloot.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'db2',
 *		accessLevel = 'all',
 *		description = 'Shows possible DB2 Armor',
 *		help        = 'dbloot.txt'
 *	)
 *	@DefineCommand(
 *		command     = '7',
 *		accessLevel = 'all',
 *		description = 'Shows the Sector 7 loot list',
 *		help        = 'apf.txt'
 *	)
 *	@DefineCommand(
 *		command     = '13',
 *		accessLevel = 'rl',
 *		description = 'Adds APF 13 loot to the loot list',
 *		help        = 'apf.txt'
 *	)
 *	@DefineCommand(
 *		command     = '28',
 *		accessLevel = 'rl',
 *		description = 'Adds APF 28 loot to the loot list',
 *		help        = 'apf.txt'
 *	)
 *	@DefineCommand(
 *		command     = '35',
 *		accessLevel = 'rl',
 *		description = 'Adds APF 35 loot to the loot list',
 *		help        = 'apf.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'apf',
 *		accessLevel = 'all',
 *		description = 'Shows what drops off APF Bosses',
 *		help        = 'apf.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'beast',
 *		accessLevel = 'all',
 *		description = 'Shows Beast loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'beastarmor',
 *		accessLevel = 'all',
 *		description = 'Shows Beast Armor loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'beastweaps',
 *		accessLevel = 'all',
 *		description = 'Shows Beast Weapons loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'beaststars',
 *		accessLevel = 'all',
 *		description = 'Shows Beast Stars loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'tnh',
 *		accessLevel = 'all',
 *		description = 'Shows The Night Heart loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'sb',
 *		accessLevel = 'all',
 *		description = 'Shows Shadowbreeds loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'aries',
 *		accessLevel = 'all',
 *		description = 'Shows Aries Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'leo',
 *		accessLevel = 'all',
 *		description = 'Shows Leo Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'virgo',
 *		accessLevel = 'all',
 *		description = 'Shows Virgo Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'aquarius',
 *		accessLevel = 'all',
 *		description = 'Shows Aquarius Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'cancer',
 *		accessLevel = 'all',
 *		description = 'Shows Cancer Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'gemini',
 *		accessLevel = 'all',
 *		description = 'Shows Gemini Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'libra',
 *		accessLevel = 'all',
 *		description = 'Shows Libra Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'pisces',
 *		accessLevel = 'all',
 *		description = 'Shows Pisces Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'taurus',
 *		accessLevel = 'all',
 *		description = 'Shows Taurus Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'capricorn',
 *		accessLevel = 'all',
 *		description = 'Shows Capricorn Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'sagittarius',
 *		accessLevel = 'all',
 *		description = 'Shows Sagittarius Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'scorpio',
 *		accessLevel = 'all',
 *		description = 'Shows Scorpio Zodiac loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'bastion',
 *		accessLevel = 'all',
 *		description = 'Shows Bastion loot',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'pande',
 *		accessLevel = 'all',
 *		description = 'Shows Pandemonium bosses and loot categories',
 *		help        = 'pande.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'xan',
 *		accessLevel = 'all',
 *		description = 'Shows Legacy of the Xan loot categories',
 *		help        = 'xan.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'vortexx',
 *		accessLevel = 'all',
 *		description = 'Shows possible Vortexx Loot',
 *		help        = 'xan.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'mitaar',
 *		accessLevel = 'all',
 *		description = 'Shows possible Mitaar Hero Loot',
 *		help        = 'xan.txt'
 *	)
 *	@DefineCommand(
 *		command     = '12m',
 *		accessLevel = 'all',
 *		description = 'Shows possible 12 man Loot',
 *		help        = 'xan.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'poh',
 *		accessLevel = 'all',
 *		description = 'Shows possible Pyramid of Home loot',
 *		help        = 'poh.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'totw',
 *		accessLevel = 'all',
 *		description = 'Shows possible TOTW 201+ loot',
 *		help        = 'totw.txt'
 *	)
 *	@DefineCommand(
 *		command     = 'subway',
 *		accessLevel = 'all',
 *		description = 'Shows possible Subway 201+ loot',
 *		help        = 'subway.txt'
 *	)
 */
class LootListsController {

	/**
	 * Name of the module.
	 * Set automatically by module loader.
	 */
	public $moduleName;
	
	/**
	 * @var \Budabot\Core\Budabot $chatBot
	 * @Inject
	 */
	public $chatBot;
	
	/**
	 * @var \Budabot\Core\DB $db
	 * @Inject
	 */
	public $db;

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
	 * @var \Budabot\Core\SettingManager
	 * @Inject
	 */
	public $settingManager;
	
	/**
	 * @var \Budabot\Modules\RAID_MODULE\RaidController $raidController
	 * @Inject
	 */
	public $raidController;

	/**
	 * @var \Budabot\Modules\BASIC_CHAT_MODULE\ChatLeaderController $chatLeaderController
	 * @Inject
	 */
	public $chatLeaderController;
	
	/**
	 * @Setup
	 */
	public function setup() {
		$this->db->loadSQLFile($this->moduleName, 'raid_loot');
		$this->settingManager->add(
			$this->moduleName,
			'show_raid_loot_pics',
			'Show pictures in loot lists',
			'edit',
			'options',
			'1',
			'yes;no',
			'1;0'
		);
	}
	
	/**
	 * @author Dare2005 (RK2), based on code for dbloot module by
	 * @author Chachy (RK2)
	 *
	 * @HandlesCommand("alb")
	 * @Matches("/^alb$/i")
	 */
	public function albCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('Albtraum', 'Crystals & Crystalised Memories');
		$blob .= $this->findRaidLoot('Albtraum', 'Ancients');
		$blob .= $this->findRaidLoot('Albtraum', 'Samples');
		$blob .= $this->findRaidLoot('Albtraum', 'Rings and Preservation Units');
		$blob .= $this->findRaidLoot('Albtraum', 'Pocket Boss Crystals');
		$msg = $this->text->makeBlob("Albtraum Loot", $blob);
		$sendto->reply($msg);
	}

	/**
	 * @author Chachy (RK2), based on code for Pande Loot Bot by Marinerecon (RK2)
	 *
	 * @HandlesCommand("db1")
	 * @Matches("/^db1$/i")
	 */
	public function db1Command($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('DustBrigade', 'Armor');
		$blob .= $this->findRaidLoot('DustBrigade', 'DB1');
		$msg = $this->text->makeBlob("DB1 Loot", $blob);
		$sendto->reply($msg);
	}
	
	/**
	 * @author Chachy (RK2), based on code for Pande Loot Bot by Marinerecon (RK2)
	 *
	 * @HandlesCommand("db2")
	 * @Matches("/^db2$/i")
	 */
	public function db2Command($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('DustBrigade', 'Armor');
		$blob .= $this->findRaidLoot('DustBrigade', 'DB2');
		$msg = $this->text->makeBlob("DB2 Loot", $blob);
		$sendto->reply($msg);
	}

	/**
	 * @HandlesCommand("7")
	 * @Matches("/^7$/i")
	 */
	public function apf7Command($message, $channel, $sender, $sendto, $args) {
		$raid = "Sector 7";
		$blob = $this->findRaidLoot($raid, "Misc");
		$blob .= $this->findRaidLoot($raid, "NCU");
		$blob .= $this->findRaidLoot($raid, "Weapons");
		$blob .= $this->findRaidLoot($raid, "Viralbots");
		$msg = $this->text->makeBlob("$raid Loot", $blob);
		$sendto->reply($msg);
	}
	
	/**
	 * @HandlesCommand("13")
	 * @Matches("/^13$/i")
	 */
	public function apf13Command($message, $channel, $sender, $sendto, $args) {
		if (!$this->chatLeaderController->checkLeaderAccess($sender)) {
			$sendto->reply("You must be Raid Leader to use this command.");
			return;
		}

		$this->addAPFLootToList(13);
	}
	
	/**
	 * @HandlesCommand("28")
	 * @Matches("/^28$/i")
	 */
	public function apf28Command($message, $channel, $sender, $sendto, $args) {
		if (!$this->chatLeaderController->checkLeaderAccess($sender)) {
			$sendto->reply("You must be Raid Leader to use this command.");
			return;
		}

		$this->addAPFLootToList(28);
	}
	
	/**
	 * @HandlesCommand("35")
	 * @Matches("/^35$/i")
	 */
	public function apf35Command($message, $channel, $sender, $sendto, $args) {
		if (!$this->chatLeaderController->checkLeaderAccess($sender)) {
			$sendto->reply("You must be Raid Leader to use this command.");
			return;
		}

		$this->addAPFLootToList(35);
	}
	
	public function addAPFLootToList($sector) {
		// adding apf stuff
		$this->raidController->addRaidToLootList('APF', "Sector $sector");
		$msg = "Sector $sector loot table was added to the loot list.";
		$this->chatBot->sendPrivate($msg);

		$msg = $this->raidController->getCurrentLootList();
		$this->chatBot->sendPrivate($msg);
	}
	
	/**
	 * @HandlesCommand("apf")
	 * @Matches("/^apf (7|13|28|35)$/i")
	 */
	public function apfCommand($message, $channel, $sender, $sendto, $args) {
		$sector = $args[1];

		$itemlink["ICE"] = $this->text->makeItem(257968, 257968, 1, "Hacker ICE-Breaker Source");
		$itemlink["BOARD"] = $this->text->makeItem(257706, 257706, 1, "Kyr'Ozch Helmet");
		$itemlink["APE"] = $this->text->makeItem(257960, 257960, 250, "Action Probability Estimator");
		$itemlink["DGRV"] = $this->text->makeItem(257962, 257962, 250, "Dynamic Gas Redistribution Valves");
		$itemlink["KBAP"] = $this->text->makeItem(257529, 257529, 1, "Kyr'Ozch Battlesuit Audio Processor");
		$itemlink["KVPU"] = $this->text->makeItem(257533, 257533, 1, "Kyr'Ozch Video Processing Unit");
		$itemlink["KRI"] = $this->text->makeItem(257531, 257531, 1, "Kyr'Ozch Rank Identification");
		$itemlink["ICEU"] = $this->text->makeItem(257110, 257110, 1, "Intrusion Countermeasure Electronics Upgrade");
		$itemlink["OTAE"] = $this->text->makeItem(257112, 257112, 1, "Omni-Tek Award - Exemplar");
		$itemlink["CMP"] = $this->text->makeItem(257113, 257113, 1, "Clan Merits - Paragon");
		$itemlink["EMCH"] = $this->text->makeItem(257379, 257379, 200, "Extruder's Molybdenum Crash Helmet");
		$itemlink["CKCNH"] = $this->text->makeItem(257115, 257115, 200, "Conscientious Knight Commander Nizno's Helmet");
		$itemlink["SKCGH"] = $this->text->makeItem(257114, 257114, 200, "Sworn Knight Commander Genevra's Helmet");
		$itemlink["BCOH"] = $this->text->makeItem(257383, 257383, 300, "Blackmane's Combined Officer's Headwear");
		$itemlink["GCCH"] = $this->text->makeItem(257381, 257381, 300, "Gannondorf's Combined Commando's Headwear");
		$itemlink["HCSH"] = $this->text->makeItem(257384, 257384, 300, "Haitte's Combined Sharpshooter's Headwear");
		$itemlink["OCPH"] = $this->text->makeItem(257377, 257377, 300, "Odum's Combined Paramedic's Headwear");
		$itemlink["SCMH"] = $this->text->makeItem(257380, 257380, 300, "Sillum's Combined Mercenary's Headwear");
		$itemlink["YCSH"] = $this->text->makeItem(257382, 257382, 300, "Yakomo's Combined Scout's Headwear");
		$itemlink["HLOA"] = $this->text->makeItem(257128, 257128, 300, "High Lord of Angst");
		$itemlink["SKR2"] = $this->text->makeItem(257967, 257967, 300, "Silenced Kyr'Ozch Rifle - Type 2");
		$itemlink["SKR3"] = $this->text->makeItem(257131, 257131, 300, "Silenced Kyr'Ozch Rifle - Type 3");
		$itemlink["ASC"] = $this->text->makeItem(257126, 257126, 300, "Amplified Sleek Cannon");
		$itemlink["IAPU"] = $this->text->makeItem(257959, 257959, 1, "Inertial Adjustment Processing Unit");
		$itemlink["HVBCP"] = $this->text->makeItem(257119, 257119, 300, "Hadrulf's Viral Belt Component Platform");
		$itemlink["NAC"] = $this->text->makeItem(257963, 257963, 250, "Notum Amplification Coil");
		$itemlink["TAHSC"] = $this->text->makeItem(257124, 257124, 300, "Twice Augmented Hellspinner Shock Cannon");
		$itemlink["ONC"] = $this->text->makeItem(257118, 257118, 250, "ObiTom's Nano Calculator");
		$itemlink["AKC12"] = $this->text->makeItem(257143, 257143, 300, "Amplified Kyr'Ozch Carbine - Type 12");
		$itemlink["AKC13"] = $this->text->makeItem(257142, 257142, 300, "Amplified Kyr'Ozch Carbine - Type 13");
		$itemlink["AKC5"] = $this->text->makeItem(257144, 257144, 300, "Amplified Kyr'Ozch Carbine - Type 5");
		$itemlink["ERU"] = $this->text->makeItem(257961, 257961, 250, "Energy Redistribution Unit");
		$itemlink["BOB"] = $this->text->makeItem(257147, 257147, 300, "Blades of Boltar");
		$itemlink["DVLPR"] = $this->text->makeItem(257116, 257116, 1, "De'Valos Lava Protection Ring");
		$itemlink["VLRD"] = $this->text->makeItem(257964, 257964, 250, "Visible Light Remodulation Device");
		$itemlink["DVRPR"] = $this->text->makeItem(257117, 257117, 1, "De'Valos Radiation Protection Ring");
		$itemlink["SSSS"] = $this->text->makeItem(257141, 257141, 300, "Scoped Salabim Shotgun Supremo");
		$itemlink["EPP"] = $this->text->makeItem(258345, 258345, 300, "Explosif's Polychromatic Pillows");
		$itemlink["VNGW"] = $this->text->makeItem(257123, 257123, 300, "Vektor ND Grand Wyrm");
		$list = '';

		switch ($sector) {
			case "7":
				return $this->apf7Command($message, $channel, $sendto, $sendto, $args);
			case "13":
				//CRU
				$list .= $this->text->makeImage(257196) . "\n";
				$list .= "Name: {$itemlink["ICE"]}\n";
				$list .= "Purpose: {$itemlink["ICEU"]}\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield 5 times from the Boss.<end>\n\n";

				//Token Credit Items
				$list .= $this->text->makeImage(218775) . "\n";
				$list .= "Name: {$itemlink["KBAP"]}\n";
				$list .= $this->text->makeImage(218758) . "\n";
				$list .= "Name: {$itemlink["KVPU"]}\n";
				$list .= $this->text->makeImage(218768) . "\n";
				$list .= "Name: {$itemlink["KRI"]}\n";
				$list .= "Purpose: ".
					"<highlight>Kyr'Ozch Rank Identification, ".
					"Kyr'Ozch Video Processing Unit ".
					"and Kyr'Ozch Battlesuit Audio Processor ".
					"can be traded at your faction vendor at the Alien Playfield Bar ".
					"for Tokens or Credits.<end>\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield from the Boss (one from each type).<end>\n\n";

				//Token Board
				$list .= $this->text->makeImage(230855) . "\n";
				$list .= "Name: {$itemlink["BOARD"]}\n";
				$list .= "Purpose: - {$itemlink["OTAE"]}\n";
				$list .= "<tab><tab>     - {$itemlink["CMP"]}\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield from the Boss.<end>\n\n";

				//Action Probability Estimator
				$list .= $this->text->makeImage(203502) . "\n";
				$list .= "Name: {$itemlink["APE"]}\n";
				$list .= "Purpose: - {$itemlink["EMCH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["CKCNH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["SKCGH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["BCOH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["GCCH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["HCSH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["OCPH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["SCMH"]}\n";
				$list .= "<tab><tab>     - {$itemlink["YCSH"]}\n\n";

				//Dynamic Gas Redistribution Valves
				$list .= $this->text->makeImage(205508) . "\n";
				$list .= "Name: {$itemlink["DGRV"]}\n";
				$list .= "Purpose: - {$itemlink["HLOA"]}\n";
				$list .= "<tab><tab>     - {$itemlink["SKR2"]}\n";
				$list .= "<tab><tab>     - {$itemlink["SKR3"]}\n";
				$list .= "<tab><tab>     - {$itemlink["ASC"]}\n\n";
				break;
			case "28":
				//CRU
				$list .= $this->text->makeImage(257196) . "\n";
				$list .= "Name: {$itemlink["ICE"]}\n";
				$list .= "Purpose: {$itemlink["ICEU"]}\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield 5 times from the Boss.<end>\n\n";

				//Token Credit Items
				$list .= $this->text->makeImage(218775) . "\n";
				$list .= "Name: {$itemlink["KBAP"]}\n";
				$list .= $this->text->makeImage(218758) . "\n";
				$list .= "Name: {$itemlink["KVPU"]}\n";
				$list .= $this->text->makeImage(218768) . "\n";
				$list .= "Name: {$itemlink["KRI"]}\n";
				$list .= "Purpose: ".
					"<highlight>Kyr'Ozch Rank Identification, ".
					"Kyr'Ozch Video Processing Unit ".
					"and Kyr'Ozch Battlesuit Audio Processor ".
					"can be traded at your faction vendor at the Alien Playfield Bar ".
					"for Tokens or Credits.<end>\n";
				$list .= "Note: <highlight>Drops on all Alien Playfields from the Boss (one from each type).<end>\n\n";

				//Token Board
				$list .= $this->text->makeImage(230855) . "\n";
				$list .= "Name: {$itemlink["BOARD"]}\n";
				$list .= "Purpose: - {$itemlink["OTAE"]}\n";
				$list .= "<tab><tab>     - {$itemlink["CMP"]}\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield from the Boss.<end>\n\n";

				//APF Belt
				$list .= $this->text->makeImage(11618) . "\n";
				$list .= "Name: {$itemlink["IAPU"]}\n";
				$list .= "Purpose: - {$itemlink["HVBCP"]}\n\n";

				//Notum coil
				$list .= $this->text->makeImage(257195) . "\n";
				$list .= "Name: {$itemlink["NAC"]}\n";
				$list .= "Purpose: - {$itemlink["TAHSC"]}\n";
				$list .= "<tab><tab>     - {$itemlink["ONC"]}\n";
				$list .= "<tab><tab>     - {$itemlink["AKC12"]}\n";
				$list .= "<tab><tab>     - {$itemlink["AKC13"]}\n";
				$list .= "<tab><tab>     - {$itemlink["AKC5"]}\n\n";
				break;
			case "35":
				//CRU
				$list .= $this->text->makeImage(257196) . "\n";
				$list .= "Name: {$itemlink["ICE"]}\n";
				$list .= "Purpose: {$itemlink["ICEU"]}\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield 5 times from the Boss.<end>\n\n";

				//Token Credit Items
				$list .= $this->text->makeImage(218775) . "\n";
				$list .= "Name: {$itemlink["KBAP"]}\n";
				$list .= $this->text->makeImage(218758) . "\n";
				$list .= "Name: {$itemlink["KVPU"]}\n";
				$list .= $this->text->makeImage(218768) . "\n";
				$list .= "Name: {$itemlink["KRI"]}\n";
				$list .= "Purpose: ".
					"<highlight>Kyr'Ozch Rank Identification, ".
					"Kyr'Ozch Video Processing Unit ".
					"and Kyr'Ozch Battlesuit Audio Processor ".
					"can be traded at your faction vendor at the Alien Playfield Bar ".
					"for Tokens or Credits.<end>\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield from the Boss (one from each type).<end>\n\n";

				//Token Board
				$list .= $this->text->makeImage(230855) . "\n";
				$list .= "Name:{$itemlink["BOARD"]}\n";
				$list .= "Purpose: - {$itemlink["OTAE"]}\n";
				$list .= "<tab><tab>     - {$itemlink["CMP"]}\n";
				$list .= "Note: <highlight>Drops on all Alien Playfield from the Boss.<end>\n\n";

				//Energy Redistribution Unit
				$list .= $this->text->makeImage(257197) . "\n";
				$list .= "Name: {$itemlink["ERU"]}\n";
				$list .= "Purpose: - {$itemlink["BOB"]}\n";
				$list .= "<tab><tab>     - {$itemlink["DVLPR"]}\n";
				$list .= "<tab><tab>     - {$itemlink["VNGW"]}\n\n";

				//Visible Light Remodulation Device
				$list .= $this->text->makeImage(235270) . "\n";
				$list .= "Name: {$itemlink["VLRD"]}\n";
				$list .= "Purpose: - {$itemlink["DVRPR"]}\n";
				$list .= "<tab><tab>     - {$itemlink["SSSS"]}\n";
				$list .= "<tab><tab>     - {$itemlink["EPP"]}\n\n";
				break;
		}

		$msg = $this->text->makeBlob("Loot table for sector $sector", $list);

		$sendto->reply($msg);
	}

	/**
	 * @HandlesCommand("beast")
	 * @Matches("/^beast$/i")
	 */
	public function beastCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('Pande', 'Beast Armor');
		$blob .= $this->findRaidLoot('Pande', 'Beast Weapons');
		$blob .= $this->findRaidLoot('Pande', 'Stars');
		$blob .= $this->findRaidLoot('Pande', 'Shadowbreeds');
		$msg = $this->text->makeBlob("Beast Loot", $blob);
		$sendto->reply($msg);
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("beastarmor")
	 * @Matches("/^beastarmor$/i")
	 */
	public function beastarmorCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Beast Armor'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("beastweaps")
	 * @Matches("/^beastweaps$/i")
	 */
	public function beastweapsCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Beast Weapons'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("beaststars")
	 * @Matches("/^beaststars$/i")
	 */
	public function beaststarsCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Stars'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("sb")
	 * @Matches("/^sb$/i")
	 */
	public function sbCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Shadowbreeds'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("tnh")
	 * @Matches("/^tnh$/i")
	 */
	public function tnhCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'The Night Heart'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("aries")
	 * @Matches("/^aries$/i")
	 */
	public function ariesCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Aries'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("leo")
	 * @Matches("/^leo$/i")
	 */
	public function leoCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Leo'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("virgo")
	 * @Matches("/^virgo$/i")
	 */
	public function virgoCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Virgo'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("aquarius")
	 * @Matches("/^aquarius$/i")
	 */
	public function aquariusCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Aquarius'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("cancer")
	 * @Matches("/^cancer$/i")
	 */
	public function cancerCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Cancer'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("gemini")
	 * @Matches("/^gemini$/i")
	 */
	public function geminiCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Gemini'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("libra")
	 * @Matches("/^libra$/i")
	 */
	public function libraCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Libra'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("pisces")
	 * @Matches("/^pisces$/i")
	 */
	public function piscesCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Pisces'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("taurus")
	 * @Matches("/^taurus$/i")
	 */
	public function taurusCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Taurus'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("capricorn")
	 * @Matches("/^capricorn$/i")
	 */
	public function capricornCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Capricorn'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("sagittarius")
	 * @Matches("/^sagittarius$/i")
	 */
	public function sagittariusCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Sagittarius'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("scorpio")
	 * @Matches("/^scorpio$/i")
	 */
	public function scorpioCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Scorpio'));
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("bastion")
	 * @Matches("/^bastion$/i")
	 */
	public function bastionCommand($message, $channel, $sender, $sendto, $args) {
		$sendto->reply($this->getPandemoniumLoot('Pande', 'Bastion'));
	}
	
	public function getPandemoniumLoot($raid, $category) {
		$blob = $this->findRaidLoot($raid, $category);
		$blob .= "\n\nPande Loot By Marinerecon (RK2)";
		return $this->text->makeBlob("$raid $category Loot", $blob);
	}
	
	/**
	 * @author Marinerecon (RK2)
	 *
	 * @HandlesCommand("pande")
	 * @Matches("/^pande$/i")
	 */
	public function pandeCommand($message, $channel, $sender, $sendto, $args) {
		$list  = "<header2>The Beast<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("All Beast Loot (long)\n", "/tell <myname> beast");
		$list .= "<tab>".$this->text->makeChatcmd("Beast Armor\n", "/tell <myname> beastarmor");
		$list .= "<tab>".$this->text->makeChatcmd("Beast Weapons\n", "/tell <myname> beastweaps");
		$list .= "<tab>".$this->text->makeChatcmd("Beast Stars\n", "/tell <myname> beaststars");
		$list .= "\n<header2>The Night Heart<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("TNH\n", "/tell <myname> tnh");
		$list .= "\n<header2>West Zodiacs<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("Aries\n", "/tell <myname> aries");
		$list .= "<tab>".$this->text->makeChatcmd("Leo\n", "/tell <myname> leo");
		$list .= "<tab>".$this->text->makeChatcmd("Virgo\n", "/tell <myname> virgo");
		$list .= "\n<header2>East Zodiacs<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("Aquarius\n", "/tell <myname> aquarius");
		$list .= "<tab>".$this->text->makeChatcmd("Cancer\n", "/tell <myname> cancer");
		$list .= "<tab>".$this->text->makeChatcmd("Gemini\n", "/tell <myname> gemini");
		$list .= "\n<header2>Middle Zodiacs<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("Libra\n", "/tell <myname> libra");
		$list .= "<tab>".$this->text->makeChatcmd("Pisces\n", "/tell <myname> pisces");
		$list .= "<tab>".$this->text->makeChatcmd("Taurus\n", "/tell <myname> taurus");
		$list .= "\n<header2>North Zodiacs<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("Capricorn\n", "/tell <myname> capricorn");
		$list .= "<tab>".$this->text->makeChatcmd("Sagittarius\n", "/tell <myname> sagittarius");
		$list .= "<tab>".$this->text->makeChatcmd("Scorpio\n", "/tell <myname> scorpio");
		$list .= "\n<header2>Other<end>\n";
		$list .= "<tab>".$this->text->makeChatcmd("Shadowbreeds\n", "/tell <myname> sb");
		$list .= "<tab>".$this->text->makeChatcmd("Bastion\n", "/tell <myname> bastion");

		$list .= "\n\nPandemonium Loot By Marinerecon (RK2)";

		$msg = $this->text->makeBlob("Pandemonium Loot", $list);
		$sendto->reply($msg);
	}
	
	/**
	 * @author Morgo (RK2)
	 *
	 * @HandlesCommand("vortexx")
	 * @Matches("/^vortexx$/i")
	 */
	public function xanVortexxCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('Vortexx', 'General');
		$blob .= $this->findRaidLoot('Vortexx', 'Symbiants');
		$blob .= $this->findRaidLoot('Vortexx', 'Spirits');
		$msg = $this->text->makeBlob("Vortexx loot", $blob);
		$sendto->reply($msg);
	}
	
	/**
	 * @author Morgo (RK2)
	 *
	 * @HandlesCommand("mitaar")
	 * @Matches("/^mitaar$/i")
	 */
	public function xanMitaarCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('Mitaar', 'General');
		$blob .= $this->findRaidLoot('Mitaar', 'Symbiants');
		$blob .= $this->findRaidLoot('Mitaar', 'Spirits');
		$msg = $this->text->makeBlob("Mitaar loot", $blob);
		$sendto->reply($msg);
	}
	
	/**
	 * @author Morgo (RK2)
	 *
	 * @HandlesCommand("12m")
	 * @Matches("/^12m$/i")
	 */
	public function xan12mCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('12Man', 'General');
		$blob .= $this->findRaidLoot('12Man', 'Symbiants');
		$blob .= $this->findRaidLoot('12Man', 'Spirits');
		$blob .= $this->findRaidLoot('12Man', 'Profession Gems');
		$msg = $this->text->makeBlob("12-Man loot", $blob);
		$sendto->reply($msg);
	}

	/**
	 * @author Morgo (RK2)
	 *
	 * @HandlesCommand("xan")
	 * @Matches("/^xan$/i")
	 */
	public function xanCommand($message, $channel, $sender, $sendto, $args) {
		$list = $this->text->makeChatcmd("Vortexx", "/tell <myname> vortexx") . "\n";
		$list .= "<tab>General\n";
		$list .= "<tab>Symbiants (Beta)\n";
		$list .= "<tab>Spirits (Beta)\n\n";

		$list .= $this->text->makeChatcmd("Mitaar Hero", "/tell <myname> mitaar") . "\n";
		$list .= "<tab>General\n";
		$list .= "<tab>Symbiants (Beta)\n";
		$list .= "<tab>Spirits (Beta)\n\n";

		$list .= $this->text->makeChatcmd("12 Man", "/tell <myname> 12m") . "\n";
		$list .= "<tab>General\n";
		$list .= "<tab>Symbiants (Beta)\n";
		$list .= "<tab>Spirits (Beta)\n";
		$list .= "<tab>Profession Gems\n";

		$list .= "\n\nXan Loot By Morgo (RK2)";

		$msg = $this->text->makeBlob("Legacy of the Xan Loot", $list);
		$sendto->reply($msg);
	}

	/**
	 * @HandlesCommand("poh")
	 * @Matches("/^poh$/i")
	 */
	public function pohCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('Pyramid of Home', 'General');
		$blob .= $this->findRaidLoot('Pyramid of Home', 'HUD/NCU');
		$blob .= $this->findRaidLoot('Pyramid of Home', 'Weapons');
		$msg = $this->text->makeBlob("Pyramid of Home Loot", $blob);

		$sendto->reply($msg);
	}

	/**
	 * @HandlesCommand("totw")
	 * @Matches("/^totw$/i")
	 */
	public function totwCommand($message, $channel, $sender, $sendto, $args) {
		$blob = $this->findRaidLoot('Temple of the Three Winds', 'Armor');
		$blob .= $this->findRaidLoot('Temple of the Three Winds', 'Misc');
		$blob .= $this->findRaidLoot('Temple of the Three Winds', 'NCU');
		$blob .= $this->findRaidLoot('Temple of the Three Winds', 'Rings');
		$blob .= $this->findRaidLoot('Temple of the Three Winds', 'Symbiants');
		$blob .= $this->findRaidLoot('Temple of the Three Winds', 'Weapons');
		$msg = $this->text->makeBlob("Temple of the Three Winds Loot", $blob);

		$sendto->reply($msg);
	}

	/**
	 * @HandlesCommand("subway")
	 * @Matches("/^subway$/i")
	 */
	public function subwayCommand($message, $channel, $sender, $sendto, $args) {
		$blob  = $this->findRaidLoot('Subway', 'Armor');
		$blob .= $this->findRaidLoot('Subway', 'Weapons');
		$blob .= $this->findRaidLoot('Subway', 'Belt');
		$blob .= $this->findRaidLoot('Subway', 'HUD/Utils');
		$msg = $this->text->makeBlob("Subway Loot", $blob);

		$sendto->reply($msg);
	}

	public function findRaidLoot($raid, $category) {
		$sql = "SELECT *, COALESCE(a.name, r.name) AS name ".
			"FROM raid_loot r ".
			"LEFT JOIN aodb a ON (r.name = a.name AND r.ql >= a.lowql AND r.ql <= a.highql) ".
			"WHERE r.aoid IS NULL AND raid = ? AND category = ? ".
			"UNION ".
			"SELECT *, COALESCE(a.name, r.name) AS name ".
			"FROM raid_loot r ".
			"JOIN aodb a ON (r.aoid = a.highid) ".
			"WHERE r.aoid IS NOT NULL AND raid = ? AND category = ?";
		$data = $this->db->query($sql, $raid, $category, $raid, $category);

		if (count($data) == 0) {
			return null;
		}

		$blob = "\n<pagebreak><header2>{$category}<end>\n\n";
		$showLootPics = $this->settingManager->get('show_raid_loot_pics');
		foreach ($data as $row) {
			$lootCmd = $this->text->makeChatcmd("To Loot", "/tell <myname> loot add $row->id");
			if ($row->lowid) {
				if ($showLootPics) {
					$name = "<img src=rdb://{$row->icon}>";
				} else {
					$name = $row->name;
					$blob .= $lootCmd . " - ";
				}
				$blob .= $this->text->makeItem($row->lowid, $row->highid, $row->ql, $name);
			} else {
				$blob .= "$lootCmd - <highlight>{$row->name}<end>";
			}
			if ($showLootPics && $row->lowid) {
				$blob .= "\n<highlight>{$row->name}<end>";
			}
			if ($row->multiloot > 1) {
				$blob .= " x" . $row->multiloot;
			}
			if (!empty($row->comment)) {
				$blob .= " ($row->comment)";
			}
			if ($showLootPics) {
				$blob .= "\n";
				$blob .= $this->text->makeChatcmd("To Loot", "/tell <myname> loot add $row->id");
				$blob .= "\n";
			}
			$blob .= "\n";
		}

		return $blob;
	}
}
