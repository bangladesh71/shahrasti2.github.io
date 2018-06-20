<?php
App::uses('AppModel', 'Model');
/**
 * Contentimage Model
 *
 * @property Content $Content
 */
class Contentimage extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'content_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	public function getImageListIdByContentId($content_id=null,$type=null){
		$data = $this->find ( 'all', array ('recursive' => -1,'order' => 'order','conditions' => array ('Contentimage.content_id' => $content_id,'Contentimage.type' => $type ) ) );
		return $data;
	}
}
