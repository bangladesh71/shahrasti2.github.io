<?php
App::uses('AppModel', 'Model');
/**
 * Contenttype Model
 *
 * @property Content $Content
 */
class Contenttype extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'contenttype_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	public function beforeSave($options=null) {
		$title = $this->data['Contenttype']['name'];
	
		if(empty($this->data['Contenttype']['id'])){
			$slug = $this->createSlug($title);
			$this->data['Contenttype']['slug']=$slug;
	
		}else {
			$slug = $this->createSlug($title,$this->data['Contenttype']['id']);
			$this->data['Contenttype']['slug']=$slug;
				
		}
		return true;
	}

}
