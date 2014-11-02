<?php

namespace slideShows;
class Model_ThumbnailSliderGallery extends \Model_Table {
	var $table= "slideShows_thumbnailslidergallery";
	function init(){
		parent::init();

		$this->hasOne('Epan','epan_id');
		$this->addCondition('epan_id',$this->api->current_website->id);

		$this->addField('name')->Caption('Gallery Name')->mandatory(true);
		$this->addField('direction')->enum(array('vertical','horizontal'))->defaultValue('horizontal');
		$this->addField('scroll_intervarl')->defaultValue(2400);
		$this->addField('scroll_duration')->defaultValue(1200);
		$this->addField('on_hover')->type('boolean')->defaultValue(true)->Caption('Mouse Hover Stop Slide');
		$this->addField('autoAdvance')->type('boolean')->defaultValue(true)->Caption('Auto Slider');
		$this->addField('scroll_by_each_thumb')->type('boolean')->defaultValue(true);
		$this->addField('is_publish')->type('boolean')->defaultValue(true);

		$this->hasMany('slideShows/Model_ThumbnailSliderImages','gallery_id');

		// $this->add('dynamic_model/Controller_AutoCreator');
	}
}