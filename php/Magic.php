<?php 
/**
* 
*/
class Magic
{
	private $inputString;
	
	public function __construct($str){
		$this->inputString = $str;
	}

	private function revert($str){
		return strrev($str);
	}

	private function removeChars($str){
		return preg_replace('/[A,a,E,e,I,i,O,o,U,u]/', '', $str);
	}

	public function magic(){
		$res = $this->revert($this->inputString);
		$res = $this->removeChars($res);
		return $res;
	}
}