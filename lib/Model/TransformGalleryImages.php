<?php

namespace slideShows;

class Model_TransformGalleryImages extends \Model_Table{
	var $table="slideShows_transformgalleryimages";
	function init(){
		parent::init();

		$this->hasOne('slideShows/TransformGallery','gallery_id');

		$this->addField('image')->display(array('form'=>'ElImage'));
		$this->addField('name')->caption('Display Tittle');
		// $this->add('dynamic_model/Controller_AutoCreator');
	}
}