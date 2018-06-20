<?php
App::uses('Babostha', 'Model');

/**
 * Babostha Test Case
 *
 */
class BabosthaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.babostha',
		'app.entryform',
		'app.maincategory',
		'app.category',
		'app.union',
		'app.subcategory',
		'app.childcategory',
		'app.designation',
		'app.problem',
		'app.user',
		'app.member'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Babostha = ClassRegistry::init('Babostha');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Babostha);

		parent::tearDown();
	}

}
