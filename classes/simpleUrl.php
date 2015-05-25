<?php
class simpleUrl {
	var = $site_path;
	
	function __construct($site_path){
		$this->site_path = $this->addSlash($site_path);
	}
	
	function __toString(){
		return $this->site_path;
	}
	
	private function addSlash($string){
		if ($string[strlen($string)-1] != '/')
			$string = '/';
		return $string;
	}
}
?>