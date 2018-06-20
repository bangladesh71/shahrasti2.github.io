<?php
App::uses('Tennise', 'Model');

/**
 * Tennise Test Case
 *
 */
class TenniseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tennise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Tennise = ClassRegistry::init('Tennise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Tennise);

		parent::tearDown();
	}

}
