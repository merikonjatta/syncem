<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) { die('NOT ALLOWED'); }

require_once('item.inc.php');
require_once('syncstat.inc.php');

class Syncem {
	
	private $config = array();
	private $syncstat;
	private $items = array();

	public function __construct($config) {
		$this->config = $config;
		$this->syncstat = new Syncstat($this->config['syncstat_file']);
	}

	public function run(){
		$this->get_local_items();
		var_dump($this->items);

		$this->syncstat->save();
	}

	private function get_all_items(){
		return array();
	}

	private function get_local_items(){
		$files = glob($this->config['content_dir']."/**/*");
		foreach ($files as $file){
			$item = Item::local($file);
			if (stripos($file, $this->config['files_dir']) === 0){
				$item->setType('file');
			} else {
				$item->setType('page');
			}
			$this->items[] = $item;
		}
	}

	private function get_wiki_items(){
	}

	private function sync($object){
	}

}

