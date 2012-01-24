<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) { die('NOT ALLOWED'); }

class SyncstatEntry {

	public $path;
	public $last_synced_at;

	public function __construct(){
	}

	public function to_a(){
		return array(
			'path' => $this->path,
			'last_synced_at' => $this->last_synced_at,
		);
	}

}

