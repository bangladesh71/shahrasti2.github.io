<?php
App::uses('Nexttennise', 'Model');

/**
 * Nexttennise Test Case
 *
 */
class NexttenniseTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.nexttennise'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Nexttennise = ClassRegistry::init('Nexttennise');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Nexttennise);

		parent::tearDown();
	}

}
