<?php

abstract class Fighter
{
	abstract function fight($t);
	public $soldier_type;
	
	public function __construct($type){
		$this->soldier_type = $type;
	}
	
	public function getType(){
		return ($this->soldier_type);
	}
}
?>