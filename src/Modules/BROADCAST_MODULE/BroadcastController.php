<?php

namespace Budabot\Modules\BROADCAST_MODULE;

use Budabot\Core\Event;
use Budabot\Core\StopExecutionException;

/**
 * @author Tyrence (RK2)
 *
 * @Instance
 *
 * Commands this controller contains:
 *	@DefineCommand(
 *		command     = 'broadcast',
 *		accessLevel = 'mod',
 *		description = 'View/edit the broadcast bots list',
 *		help        = 'broadcast.txt'
 *	)
 */
class BroadcastController {

	/**
	 * Name of the module.
	 * Set automatically by module loader.
	 */
	public $moduleName;
	
	/**
	 * @var \Budabot\Core\LoggerWrapper $logger
	 * @Logger
	 */
	public $logger;
	
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
	 * @var \Budabot\Core\SettingManager $settingManager
	 * @Inject
	 */
	public $settingManager;
	
	/**
	 * @var \Budabot\Core\Modules\LIMITS\RateIgnoreController $rateIgnoreController
	 * @Inject
	 */
	public $rateIgnoreController;
	
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
	
	private $broadcastList = array();
	
	/**
	 * This handler is called on bot startup.
	 * @Setup
	 */
	public function setup() {
		$this->db->loadSQLFile($this->moduleName, 'broadcast');
		
		$this->loadBroadcastListIntoMemory();
		
		$this->settingManager->add($this->moduleName, "broadcast_to_guild", "Send broadcast message to guild channel", "edit", "options", "1", "true;false", "1;0");
		$this->settingManager->add($this->moduleName, "broadcast_to_privchan", "Send broadcast message to private channel", "edit", "options", "0", "true;false", "1;0");
	}
	
	private function loadBroadcastListIntoMemory() {
		//Upload broadcast bots to memory
		$data = $this->db->query("SELECT * FROM broadcast_<myname>");
		$this->broadcastList = array();
		foreach ($data as $row) {
			$this->broadcastList[$row->name] = $row;
		}
	}
	
	/**
	 * @HandlesCommand("broadcast")
	 * @Matches("/^broadcast$/i")
	 */
	public function broadcastListCommand($message, $channel, $sender, $sendto, $args) {
		$blob = '';

		$sql = "SELECT * FROM broadcast_<myname> ORDER BY dt DESC";
		$data = $this->db->query($sql);
		foreach ($data as $row) {
			$remove = $this->text->makeChatcmd('Remove', "/tell <myname> <symbol>broadcast rem $row->name");
			$dt = $this->util->date($row->dt);
			$blob .= "<highlight>{$row->name}<end> [added by {$row->added_by}] {$dt} {$remove}\n";
		}

		if (count($data) == 0) {
			$msg = "No bots are on the broadcast list.";
		} else {
			$msg = $this->text->makeBlob('Broadcast Bots', $blob);
		}

		$sendto->reply($msg);
	}

	/**
	 * @HandlesCommand("broadcast")
	 * @Matches("/^broadcast add (.+)$/i")
	 */
	public function broadcastAddCommand($message, $channel, $sender, $sendto, $args) {
		$name = ucfirst(strtolower($args[1]));

		$charid = $this->chatBot->get_uid($name);
		if ($charid == false) {
			$sendto->reply("'$name' is not a valid character name.");
			return;
		}

		if (isset($this->broadcastList[$name])) {
			$sendto->reply("'$name' is already on the broadcast bot list.");
			return;
		}

		$this->db->exec("INSERT INTO broadcast_<myname> (`name`, `added_by`, `dt`) VALUES (?, ?, ?)", $name, $sender, time());
		$msg = "Broadcast bot added successfully.";

		// reload broadcast bot list
		$this->loadBroadcastListIntoMemory();

		$this->rateIgnoreController->add($name, $sender . " (bot)");

		$sendto->reply($msg);
	}
	
	/**
	 * @HandlesCommand("broadcast")
	 * @Matches("/^broadcast (rem|remove) (.+)$/i")
	 */
	public function broadcastRemoveCommand($message, $channel, $sender, $sendto, $args) {
		$name = ucfirst(strtolower($args[2]));

		if (!isset($this->broadcastList[$name])) {
			$sendto->reply("'$name' is not on the broadcast bot list.");
			return;
		}

		$this->db->exec("DELETE FROM broadcast_<myname> WHERE name = ?", $name);
		$msg = "Broadcast bot removed successfully.";

		// reload broadcast bot list
		$this->loadBroadcastListIntoMemory();

		$this->rateIgnoreController->remove($name);

		$sendto->reply($msg);
	}

	/**
	 * @Event("msg")
	 * @Description("Relays incoming messages to the guild/private channel")
	 */
	public function incomingMessageEvent(Event $eventObj) {
		if ($this->isValidBroadcastSender($eventObj->sender)) {
			$this->processIncomingMessage($eventObj->sender, $eventObj->message);
			
			// keeps the bot from sending a message back
			throw new StopExecutionException();
		}
	}
	
	public function isValidBroadcastSender($sender) {
		return isset($this->broadcastList[$sender]);
	}

	public function processIncomingMessage($sender, $message) {
		$msg = "[$sender]: $message";

		if ($this->settingManager->get('broadcast_to_guild')) {
			$this->chatBot->sendGuild($msg, true);
		}
		if ($this->settingManager->get('broadcast_to_privchan')) {
			$this->chatBot->sendPrivate($msg, true);
		}
	}
}
