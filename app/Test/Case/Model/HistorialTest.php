<?php
App::uses('Historial', 'Model');

/**
 * Historial Test Case
 *
 */
class HistorialTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.historial',
		'app.user',
		'app.cuestionario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Historial = ClassRegistry::init('Historial');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Historial);

		parent::tearDown();
	}

}
