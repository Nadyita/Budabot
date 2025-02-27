<?php

namespace Budabot\Modules\DEV_MODULE;

/**
 * @author Tyrence
 *
 * Read values from the MDB file
 *
 * @Instance
 *
 * Commands this controller contains:
 *	@DefineCommand(
 *		command     = 'mdb',
 *		accessLevel = 'all',
 *		description = 'Search for values in the MDB file',
 *		help        = 'mdb.txt'
 *	)
 */
class MdbController {

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
	 * @var \Budabot\Core\Util $util
	 * @Inject
	 */
	public $util;

	/**
	 * @var \Budabot\Core\Text $text
	 * @Inject
	 */
	public $text;

	/** @Setup */
	public function setup() {
	}
	
	/**
	 * @HandlesCommand("mdb")
	 * @Matches("/^mdb$/i")
	 */
	public function mdbCommand($message, $channel, $sender, $sendto, $args) {
		$categories = $this->chatBot->mmdbParser->getCategories();
		
		$blob = '';
		foreach ($categories as $category) {
			$blob .= $this->text->makeChatcmd($category['id'], "/tell <myname> mdb " . $category['id']) . "\n";
		}
		
		$msg = $this->text->makeBlob("MDB Categories", $blob);
		
		$sendto->reply($msg);
	}
	
	/**
	 * @HandlesCommand("mdb")
	 * @Matches("/^mdb ([0-9]+)$/i")
	 */
	public function mdbCategoryCommand($message, $channel, $sender, $sendto, $args) {
		$categoryId = $args[1];
		
		$instances = $this->chatBot->mmdbParser->findAllInstancesInCategory($categoryId);

		$blob = '';
		foreach ($instances as $instance) {
			$blob .= $this->text->makeChatcmd($instance['id'], "/tell <myname> mdb $categoryId " . $instance['id']) . "\n";
		}
		
		$msg = $this->text->makeBlob("MDB Instances for Category $categoryId", $blob);
		
		$sendto->reply($msg);
	}
	
	/**
	 * @HandlesCommand("mdb")
	 * @Matches("/^mdb ([0-9]+) ([0-9]+)$/i")
	 */
	public function mdbInstanceCommand($message, $channel, $sender, $sendto, $args) {
		$categoryId = $args[1];
		$instanceId = $args[2];
		
		$messageString = $this->chatBot->mmdbParser->getMessageString($categoryId, $instanceId);

		$msg = "[$categoryId : $instanceId] $messageString";
		$sendto->reply($msg);
	}
}
