<?php

	Class formatterwidgeditor extends TextFormatter{
		
		function about(){
			return array(
						 'name' => 'widgEditor',
						 'version' => '1.0',
						 'release-date' => '2009-01-21',
						 'author' => array('name' => 'Max Wheeler',
										   'website' => 'http://www.makenosound.com',
										   'email' => 'max@makenosound.com')
				 		);
		}
		
		function run($string){
      return str_replace('&nbsp;', '&#160;', $string);
		}		
		
	}
	
?>