<?php
App::uses('Respuesta', 'Model');

/**
 * Respuesta Test Case
 *
 */
class RespuestaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.respuesta',
		'app.pregunta',
		'app.custionario'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Respuesta = ClassRegistry::init('Respuesta');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Respuesta);

		parent::tearDown();
	}

}
