<?php
App::uses('Tennissetting', 'Model');

/**
 * Tennissetting Test Case
 *
 */
class TennissettingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tennissetting'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tennissetting = ClassRegistry::init('Tennissetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tennissetting);

		parent::tearDown();
	}

}
