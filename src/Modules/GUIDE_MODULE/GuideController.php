<?php

namespace Budabot\Modules\GUIDE_MODULE;

/**
 * @author Tyrence (RK2)
 *
 * Guides compiled by Plugsz (RK1)
 *
 * @Instance
 *
 * Commands this controller contains:
 *	@DefineCommand(
 *		command     = 'guides',
 *		accessLevel = 'all',
 *		description = 'Guides for AO',
 *		help        = 'guides.txt'
 *	)
 */
class GuideController {

	/**
	 * Name of the module.
	 * Set automatically by module loader.
	 */
	public $moduleName;

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
	 * @var \Budabot\Core\CommandAlias $commandAlias
	 * @Inject
	 */
	public $commandAlias;
	
	private $path;
	private $fileExt = ".txt";
	
	/**
	 * This handler is called on bot startup.
	 * @Setup
	 */
	public function setup() {
		$this->commandAlias->register($this->moduleName, "guides breed", "breed");
		$this->commandAlias->register($this->moduleName, "guides healdelta", "healdelta");
		$this->commandAlias->register($this->moduleName, "guides lag", "lag");
		$this->commandAlias->register($this->moduleName, "guides nanodelta", "nanodelta");
		$this->commandAlias->register($this->moduleName, "guides stats", "stats");
		$this->commandAlias->register($this->moduleName, "aou 11", "title");
		$this->commandAlias->register($this->moduleName, "guides doja", "doja");
		$this->commandAlias->register($this->moduleName, "guides adminhelp", "adminhelp");
		$this->commandAlias->register($this->moduleName, "guides light", "light");

		$this->path = __DIR__ . "/guides/";
	}
	
	/**
	 * @HandlesCommand("guides")
	 * @Matches("/^guides$/i")
	 */
	public function guidesListCommand($message, $channel, $sender, $sendto, $args) {
		if ($handle = opendir($this->path)) {
			$topicList = array();

			/* This is the correct way to loop over the directory. */
			while (false !== ($fileName = readdir($handle))) {
				// if file has the correct extension, it's a topic file
				if ($this->util->endsWith($fileName, $this->fileExt)) {
					$topicList[] =  str_replace($this->fileExt, '', $fileName);
				}
			}

			closedir($handle);

			sort($topicList);

			$linkContents = '';
			foreach ($topicList as $topic) {
				$linkContents .= $this->text->makeChatcmd($topic, "/tell <myname> guides $topic") . "\n";
			}

			if ($linkContents) {
				$msg = $this->text->makeBlob('Topics (' . count($topicList) . ')', $linkContents);
			} else {
				$msg = "No topics available.";
			}
		} else {
			$msg = "Error reading topics.";
		}
		$sendto->reply($msg);
	}
	
	/**
	 * @HandlesCommand("guides")
	 * @Matches("/^guides ([a-z0-9_-]+)$/i")
	 */
	public function guidesShowCommand($message, $channel, $sender, $sendto, $args) {
		// get the filename and read in the file
		$fileName = strtolower($args[1]);
		$info = $this->getTopicContents($fileName);

		if (!$info) {
			$msg = "No guide named <highlight>$fileName<end> was found.";
		} else {
			$msg = $this->text->makeLegacyBlob(ucfirst($fileName), $info);
		}
		$sendto->reply($msg);
	}

	public function getTopicContents($fileName) {
		// get the filename and read in the file
		$file = $this->path . $fileName . $this->fileExt;
		return file_get_contents($file);
	}
}
