<?php

class utils{
	
	public static function DeleteSession($name) {
		
		if(isset($_SESSION[$name])){
			
			$_SESSION[$name] = NULL;
			unset($_SESSION[$name]);
		}
		return $name;
	}
}