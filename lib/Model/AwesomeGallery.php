<?php
namespace slideShows;

class Model_AwesomeGallery extends \Model_Table {
	var $table= "slideshows_awesomeslider";
	function init(){
		parent::init();
		
		$this->hasOne('Model_Epan','epan_id');
		$this->addCondition('epan_id',$this->api->current_website->id);
		
		$this->addField('name')->mandatory(true)->Caption('Gallery Name');
		$this->addField('pause_time')->defaultValue('3000');
		$this->addField('on_hover')->type('boolean')->defaultValue(true)->Caption('Mouse Hover Stop Slide');
		$this->addField('control_nav')->type('boolean')->defaultValue(true)->Caption('Slide Navbar');
		$this->addField('image_paginator')->enum(array('position-topleft',
												 'position-topright',
												 'position-topcenter',
												 'position-bottomleft',
												 'position-bottomright',
												 'position-bottomcenter'))->defaultValue('Please Select');
		$this->addField('folder_path')->display(array('form'=>'ElImage'));
		$this->addField('is_publish')->type('boolean')->defaultValue(true);
		$this->addHook('beforeSave',$this);
		$this->addHook('afterSave',$this);
		$this->addHook('beforeDelete',$this);
		$this->hasMany('slideShows/AwesomeImages','gallery_id');
		$this->add('dynamic_model/Controller_AutoCreator');
	}

	function afterSave($m){
			//GET Folder Path		
			$directory = $m['folder_path'];
			$img_model=$this->add('slideShows/Model_AwesomeImages');

			if($m['folder_path'] != null){
				//Getting All Images in A Directory
				$listimage=glob($directory.'/*.{jpg,gif,png}', GLOB_BRACE);	
				//Inserting Each Image Detail into AwesomeImage
				$order_id=1;
				foreach( $listimage as $image){  
        				// echo "Filename: " . $image . "<br />";
        				$image_url=$image;
        				$img_model->createNew($m->id,$image_url,$order_id);
    					// echo $image_url;
    					$image_url="";
    					$order_id++;
    				}  

				}

		}	
				

	function beforeSave($m){

		$old_gallery_model=$this->add('slideShows/Model_AwesomeGallery');
		
		if($m['folder_path']){
			$m['folder_path']=urldecode($m['folder_path']);
		}	

		if($m->loaded()){
			$old_gallery_model->load($m['id']);
			// if($old_gallery_model['folder_path'] != urldecode($m['folder_path'])){
				$image_model=$this->add('slideShows/Model_AwesomeImages');
				$image_model->addCondition('gallery_id',$old_gallery_model['id']);
				$image_model->tryLoadAny();
				$image_model->deleteAll();
			// }
			}
		}	

	function beforeDelete(){
		$this->ref('slideShows/AwesomeImages')->deleteAll();
	}	

	}