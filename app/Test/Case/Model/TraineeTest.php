<?php
App::uses('Trainee', 'Model');

/**
 * Trainee Test Case
 *
 */
class TraineeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.trainee',
		'app.booking',
		'app.member',
		'app.user'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Trainee = ClassRegistry::init('Trainee');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Trainee);

		parent::tearDown();
	}

}
