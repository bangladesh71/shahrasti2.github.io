<?php
App::uses('Childcategory', 'Model');

/**
 * Childcategory Test Case
 *
 */
class ChildcategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.childcategory',
		'app.subcategory',
		'app.maincategory',
		'app.category',
		'app.union',
		'app.designation',
		'app.entryform',
		'app.problem'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Childcategory = ClassRegistry::init('Childcategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Childcategory);

		parent::tearDown();
	}

}
