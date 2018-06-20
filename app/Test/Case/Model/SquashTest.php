<?php
App::uses('Squash', 'Model');

/**
 * Squash Test Case
 *
 */
class SquashTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.squash'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Squash = ClassRegistry::init('Squash');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Squash);

		parent::tearDown();
	}

}
