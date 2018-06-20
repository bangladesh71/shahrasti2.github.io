<?php
App::uses('Maincategory', 'Model');

/**
 * Maincategory Test Case
 *
 */
class MaincategoryTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.maincategory',
		'app.category'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Maincategory = ClassRegistry::init('Maincategory');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Maincategory);

		parent::tearDown();
	}

}
