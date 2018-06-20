<?php
App::uses('Entryform', 'Model');

/**
 * Entryform Test Case
 *
 */
class EntryformTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.entryform',
		'app.category',
		'app.problem'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Entryform = ClassRegistry::init('Entryform');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Entryform);

		parent::tearDown();
	}

}
