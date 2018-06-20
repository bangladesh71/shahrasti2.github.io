<?php
App::uses('AppModel', 'Model');
/**
 * Babostha Model
 *
 * @property Entryform $Entryform
 * @property Subcategory $Subcategory
 * @property Childcategory $Childcategory
 * @property Maincategory $Maincategory
 */
class Babostha extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Entryform' => array(
			'className' => 'Entryform',
			'foreignKey' => 'entryform_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Subcategory' => array(
			'className' => 'Subcategory',
			'foreignKey' => 'subcategory_id',
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
		'Maincategory' => array(
			'className' => 'Maincategory',
			'foreignKey' => 'maincategory_id',
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
}
