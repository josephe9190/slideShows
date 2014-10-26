<?php
namespace slideShows;

class Model_ThumbnailSliderImages extends \Model_Table {
	var $table= "slideShows_thumbnailsliderimages";
	function init(){
		parent::init();

		$this->hasOne('slideShows/Model_ThumbnailSliderGallery','gallery_id');

		$this->addField('image')->display(array('form'=>'ElImage'));
		$this->addField('tooltip')->type('text');
		$this->addField('order_no')->type('int');
		$this->addField('description')->type('text');
		
		$this->add('dynamic_model/Controller_AutoCreator');
	}
}