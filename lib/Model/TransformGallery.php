<?php

namespace slideShows;

class Model_TransformGallery extends \Model_Table{
	var $table="slideShows_transformgallery";
	function init(){
		parent::init();

		$this->hasOne('Model_Epan','epan_id');
		$this->addCondition('epan_id',$this->api->current_website->id);
		
		$this->addField('name')->mandatory(true)->Caption('Gallery Name');
		$this->addField('autoplay')->Caption('Auto Play')->type('boolean')->defaultValue(true);
		$this->addField('interval')->Caption('Time Interval')->defaultValue('2000')->hint('Set Time Interval In Mili-Second');
		$this->hasMany('slideShows/TransformGalleryImages','gallery_id');

		$this->add('dynamic_model/Controller_AutoCreator');
	}
}