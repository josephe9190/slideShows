<?php

class page_slideShows_page_install extends page_componentBase_page_install {
	function init(){
		parent::init();

		// 
		// Code To run before installing
		
		$this->install();
		
		$css_file = getcwd().DS.'epans/'.$this->api->current_website['name'].'/slider.css';
		$css_file_orig = getcwd().DS.'epan-components/slideShows/templates/css/slider.css';
		
		if(!file_exists($css_file)){
			$css_content_orig = file_get_contents($css_file_orig);
			// throw new \Exception($css_content_orig);
			file_put_contents($css_file, "$css_content_orig");			
			$this->api->template->appendHTML('js_include','<link id="slideShows-thumbnail-customcss-link" type="text/css" href="'.$css_file.'" rel="stylesheet" />'."\n");
		}
		// Code to run after installation
	}
}