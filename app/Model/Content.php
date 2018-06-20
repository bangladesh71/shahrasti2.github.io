<?php
App::uses('AppModel', 'Model');
/**
 * Content Model
 *
 * @property Contenttype $Contenttype
 * @property Contentimage $Contentimage
 * @property Menu $Menu
 */
class Content extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	/*public $validate = array(
		'title' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'content' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);*/

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Contenttype' => array(
			'className' => 'Contenttype',
			'foreignKey' => 'contenttype_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Contentimage' => array(
			'className' => 'Contentimage',
			'foreignKey' => 'content_id',
			'dependent' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'content_id',
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
	
	public function getContentIdBySlug($slug=null){
		$data = $this->find ( 'first', array ('fields'=>'Content.id','conditions' => array ('Content.slug' => $slug ) ) );
		
		return $data;
		
	}
	public function beforeSave($options=null) {
		$title = $this->data['Content']['title'];
		if($this->data['Content']['id'] < 0){
			$slug = $this->createSlug($title);
			$this->data['Content']['slug']=$slug;
		} else {
			$slug = $this->createSlug($title,$this->data['Content']['id']);
			$this->data['Content']['slug']=$slug;
				
		}
	
		return true;
	}

}
