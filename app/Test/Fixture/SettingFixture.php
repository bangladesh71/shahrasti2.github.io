<?php
/**
 * SettingFixture
 *
 */
class SettingFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'rackuet' => array('type' => 'float', 'null' => false, 'default' => null),
		'noShow' => array('type' => 'float', 'null' => false, 'default' => null),
		'slot' => array('type' => 'float', 'null' => false, 'default' => null),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 1, 'collate' => 'utf8mb4_general_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'rackuet' => 1,
			'noShow' => 1,
			'slot' => 1,
			'status' => 'Lorem ipsum dolor sit ame',
			'created' => '2015-09-14 17:48:45',
			'modified' => '2015-09-14 17:48:45'
		),
	);

}
