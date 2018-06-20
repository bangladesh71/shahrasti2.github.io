<?php
App::uses('AppModel', 'Model');
/**
 * Subcategory Model
 *
 * @property Category $Category
 */
class Subcategory extends AppModel {

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
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $belongsTo = array(
			'Maincategory' => array(
					'className' => 'Maincategory',
					'foreignKey' => 'maincategory_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			'Childcategory' => array(
					'className' => 'Childcategory',
					'foreignKey' => 'childcategory_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			'Union' => array(
					'className' => 'Union',
					'foreignKey' => 'union_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			),
			'Designation' => array(
					'className' => 'Designation',
					'foreignKey' => 'designation_id',
					'conditions' => '',
					'fields' => '',
					'order' => ''
			)
	);

	public $hasMany = array(
			'Entryform' => array(
					'className' => 'Entryform',
					'foreignKey' => 'subcategory_id',
					'dependent' => false,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'exclusive' => '',
					'finderQuery' => '',
					'counterQuery' => ''
			),

		'Babostha' => array(
			'className' => 'Babostha',
			'foreignKey' => 'subcategory_id',
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


}
