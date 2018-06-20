<?php
App::uses('AppModel', 'Model');
/**
 * Menu Model
 *
 * @property Menu $ParentMenu
 * @property Content $Content
 * @property Menu $ChildMenu
 */
class Menu extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $actsAs = array('Containable');
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
		),
		'slug' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'type' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'ParentMenu' => array(
			'className' => 'Menu',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Content' => array(
			'className' => 'Content',
			'foreignKey' => 'content_id',
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
		'ChildMenu' => array(
			'className' => 'Menu',
			'foreignKey' => 'parent_id',
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
	
	public function beforeValidate($options = array()){
		if($this->data['Menu']['type']=='1'){
			$this->data['Menu']['url']='';
		}else{
			$this->data['Menu']['content_id']='';
		}
	}
	
	public function beforeSave($options=null) {
		if(!empty($this->data['Menu']['name'])){
			$title = $this->data['Menu']['name'];
			if($this->data['Menu']['id'] < 0){
				$slug = $this->createSlug($title);
				$this->data['Menu']['slug']=$slug;
			} else {
				$slug = $this->createSlug($title,$this->data['Menu']['id']);
				$this->data['Menu']['slug']=$slug;
			}
			return true;
		}
		
		
	}
	public function getMenuIdBySlug($slug=null){
		$data = $this->find ( 'first', array ('fields'=>'Menu.id','conditions' => array ('Menu.slug' => $slug ) ) );
		return $data;
	
	}
	public function getMenu($type){
		$data = $this ->find(
				'threaded',
				array(
						'recursive' => -1,
						'fields' => array(
								'id',
								'parent_id',
								'name',
								'slug'
						),
						'conditions'=>array('Menu.status'=>1,'Menu.menu_type'=>$type),
						'contain'=>false,
						'order' => array('order')
				)
		);
		return $data;
	
	}

}
