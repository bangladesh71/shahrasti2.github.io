<?php
App::uses('Allsetting', 'Model');

/**
 * Allsetting Test Case
 *
 */
class AllsettingTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.allsetting'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Allsetting = ClassRegistry::init('Allsetting');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Allsetting);

		parent::tearDown();
	}

}
