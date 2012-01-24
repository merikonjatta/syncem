<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) { die('NOT ALLOWED'); }


class Syncstat {

	private $filepath = "";
	private $entries = array();
	private $path_hash = array();

	/**
	 * Constructor
	 * @param string $filepath A file to save and load stats from.
	 */
	public function __construct($filepath){
		$this->filepath = $filepath;
		$this->load();
		$this->rehash();
	}


	/**
	 * All entries as an array
	 */
	public function entries(){
		return $this->entries;
	}


	/**
	 * A stat entry for a specific file path.
	 * @param string $path Which file to get stats for
	 */
	public function entry($path){
		return $this->path_hash[$path];
	}


	/**
	 * Load entries from a JSON file.
	 */
	public function load(){
		$this->entries = array();

		if (!file_exists($this->filepath)){
			return;
		}

		$json = file_get_contents($this->filepath);
		if (!$json) return;
		$this->entries = json_decode(file_get_contents($this->filepath), true);
		$this->rehash();
	}


	/**
	 * Save the entries to a JSON file.
	 */
	public function save(){
		$fh = fopen($this->filepath, 'w+b');
		if (!$fh) {
			echo "Cannot write to {$this->filepath}. Check permissions.";
			return;
		}

		$json = json_encode($this->entries);
		fwrite($fh, $json);
		fclose($fh);
	}


	/**
     * Hash entries into an associative array so that they may be accessed via path
	 */
	private function rehash(){
		foreach ($this->entries as $entry){
			$this->path_hash[$entry['path']] = $entry;
		}
	}

}

