<?php
App::uses('Slot', 'Model');

/**
 * Slot Test Case
 *
 */
class SlotTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.slot'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Slot = ClassRegistry::init('Slot');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Slot);

		parent::tearDown();
	}

}
