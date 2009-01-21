<?php

	Class extension_widgeditor extends Extension{

		public function about(){
			return array('name' => 'Formatter: widgEditor',
						 'version' => '0.1',
						 'release-date' => '2009-01-21',
						 'author' => array('name' => 'Max Wheeler',
										   'website' => 'http://www.makenosound.com',
										   'email' => 'max@makenosound.com')
				 		);
		}
		
		public function getSubscribedDelegates(){
			return array(
						array(
							'page' => '/backend/',
							'delegate' => 'ModifyTextareaFieldPublishWidget',
							'callback' => 'modifyTextarea'
						),		
			);
		}
		
		public function modifyTextarea($context){
			if($context['field']->get('formatter') != 'widgeditor') return;
			
			if(!defined('__WIDGEDITOR_SCRIPTS_IN_HEAD__') || !__WIDGEDITOR_SCRIPTS_IN_HEAD__){
				define_safe('__WIDGEDITOR_SCRIPTS_IN_HEAD__', true);
				
				$page = $context['parent']->Page;
  			$lib_path = '/extensions/widgeditor/lib/';
			
				$page->addScriptToHead(URL . $lib_path . 'scripts/widgEditor.js', 201);
				$page->addStylesheetToHead(URL . $lib_path . 'css/widgEditor.css', 'screen', 101);
			}
			
			$context['textarea']->setAttribute('id', trim($context['textarea']->getAttribute('id') . ' ' . $context['field']->get('element_name')));
		}
	}