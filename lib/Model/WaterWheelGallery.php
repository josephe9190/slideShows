<?php
namespace slideShows;
class Model_WaterWheelGallery extends \Model_Table {
	var $table= "slideShows_waterwheelgallery";
	function init(){
		parent::init();
		$this->hasOne('Epan','epan_id');
		$this->addCondition('epan_id',$this->api->current_website->id);
		$this->addField('name')->Caption('Gallery Name');
		$this->addField('show_item')->defaultValue(5);
		$this->addField('is_publish')->type('boolean')->defaultValue(true);
		// $this->addField('speed')->defaultValue(3000);
		$this->addField('separation')->defaultValue(200);
		$this->addField('size_multiplier')->defaultValue(0.7);
		$this->addField('opacity')->defaultValue(0.8);
		$this->addField('animation')->enum(array('linear','swing'));
		$this->addField('autoPlay')->defaultValue(3000)->Caption('Auto Play Speed');
		$this->addField('orientation')->enum(array('horizontal','vertical'));
		$this->addField('keyboard_Nav')->type('boolean');

		$this->hasMany('slideShows/Model_WaterWheelImages','gallery_id');
		// $this->add('dynamic_model/Controller_AutoCreator');
	}
}