<?php

class page_slideShows_page_owner_waterwheel extends page_slideShows_page_owner_main{

	function page_index(){
		// parent::init();

		$gallery_model = $this->add('slideShows/Model_WaterWheelGallery');
		
		$crud=$this->add('CRUD');
		$crud->setModel($gallery_model);

		$crud->addRef('slideShows/Model_WaterWheelImages',array('label'=>'Images'));

	}
}