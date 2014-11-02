<?php
namespace slideShows;

class Model_WaterWheelImages extends \Model_Table {
	var $table= "slideShows_waterwheelimages";
	function init(){
		parent::init();
		$this->hasOne('slideShows/Model_WaterWheelGallery','gallery_id');

		$this->addField('image')->display(array('form'=>'ElImage'));
		$this->addField('description')->type('text');
		// $this->addField('order_no')->type('int');
		$this->addField('strat_item')->type('boolean');
		$this->addField('is_publish')->type('boolean')->defaultValue(true);
		// $this->add('dynamic_model/Controller_AutoCreator');
	}

	// function beforeSave($m){

	// 	$old_img_model=$this->add('slideShows/Model_WaterWheelImages');
	// 	$old_img_model->setOrder('order_no','desc');
	// 	$old_img_model->tryLoadAny();
	// 	if(!$m->loaded())
	// 		$m['order_no']=$old_img_model['order_no']+1;
	// }

	// function createNew($gallery_id,$order_id){
		
	// 	$this['gallery_id'] = $gallery_id;
	// 	$this['strat_item'] = "";
	// 	// $this['order_no'] = $order_id;
	// 	$this['is_publish'] = true;
	// 	$this->saveAndUnload();
	// }

}