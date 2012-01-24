<?php
if (realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) { die('NOT ALLOWED'); }

class Item {

	/**
	 * Class methods
	 */

    /**
	 * Instantiate an Item based on its local path.
	 * @param string $path Path for a local file. Full path is recommended
	 */
	public static function local($path){
		$inst = new self();
		$inst->local_path = $path;
		$inst->wiki_name = self::wiki_name_for($self->local_path);
		return $inst;
	}

    /**
	 * Instantiate an Item based on its wiki name.
	 * @param string $name Name for a wiki page
	 */
	public static function wiki($name){
		$inst = new self();
		$inst->wiki_name = $path;
		$inst->local_path = self::local_path_for($self->wiki_path);
		return $inst;
	}

	public static function wiki_name_for($local_path){
	}

	public static function local_path_for($wiki_name){
	}


	/**
	 * Instance methods and properties
	 */
	private $type = "";
	private $wiki_name = "";
	private $local_path = "";
	private $wiki_info;

	private function __construct(){ }

	/**
	 * Public instance methods
	 */
	public function type(){
		return $this->type;
	}

	public function setType($val){
		$this->type = $val;
	}

	public function wiki_name(){
		return $this->wiki_name;
	}

	public function wiki_mtime(){
	}

	public function wiki_exisits(){
	}

	public function local_path(){
		return $this->local_path;
	}

	public function local_mtime(){
	}

	public function local_exists(){
	}

}

?>
