<?php
App::uses('AppController', 'Controller');
/**
 * Cuestionarios Controller
 *
 * @property Cuestionario $Cuestionario
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class CuestionariosController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Cuestionario->recursive = 0;
		$this->set('cuestionarios', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Cuestionario->exists($id)) {
			throw new NotFoundException(__('Invalid cuestionario'));
		}
		$options = array('conditions' => array('Cuestionario.' . $this->Cuestionario->primaryKey => $id));
		$this->Cuestionario->recursive = 2;
		$this->Cuestionario->unbindModel(
			array(
				'hasMany' => array('Historial')
			)
		);
		$this->Cuestionario->Pregunta->unbindModel(
			array(
				'belongsTo' => array('Cuestionario')
			)
		);
		$cuestionario = $this->Cuestionario->find('first', $options);
		//die(pr($cuestionario));
		$preguntas = array();
		foreach($cuestionario['Pregunta'] as $i => $p) {
			$preguntas[$i] = array(
				'pregunta'   => $p['nombre'],
				'contestada' => false,
				'respuestas' => array()
			);
			foreach($p['Respuesta'] as $j => $respuesta) {
				$preguntas[$i]['respuestas'][$j] = array(
					'txt'    => $respuesta['valor'],
					'valida' => $respuesta['es_cierta']
				);
			}
		}
		unset($cuestionario['Pregunta']);
		$this->set('preguntas', $preguntas);
		$this->set('cuestionario', $cuestionario);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$data = &$this->request->data;
			$data['Cuestionario']['num_preguntas'] = 0;
			$data['Cuestionario']['publicado'] = 1;
			$data['Cuestionario']['num_preguntas'] = count($data['Preguntas']);
			$dataSource = $this->Cuestionario->getDataSource();
			$dataSource->begin();
			$this->Cuestionario->create();
			$cuestionario = $this->Cuestionario->save($data);
			if ($cuestionario) {
				$this->Session->setFlash('Su cuestionario fue guardado con exito.');
				foreach($data['Preguntas'] as $numPregunta => $p) {
					$this->Cuestionario->Pregunta->create();
					$preguntaData = array(
						'Pregunta' => array(
							'nombre' => $p['nombre'],
							'cuestionario_id' => $cuestionario['Cuestionario']['id'],
							'num_respuestas' => count($p['respuestas']),
						)
					);
					$pregunta = $this->Cuestionario->Pregunta->save($preguntaData);
					foreach($p['respuestas'] as $r) {
						$this->Cuestionario->Pregunta->Respuesta->create();
						$respuestaData = array(
						'Respuesta'=>array(
							'pregunta_id' => $pregunta['Pregunta']['id'],
							'valor' => $r['valor'],
							'es_cierta' => isset($r['es_cierta'])
						));
						$this->Cuestionario->Pregunta->Respuesta->save($respuestaData);
					}//end foreach respuestas
				}//end foreach preguntas
				$dataSource->commit();
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Error al procesar el formulario favor de revisar sus datos');
				$dataSource->rollback();
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Cuestionario->exists($id)) {
			throw new NotFoundException(__('Invalid cuestionario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cuestionario->save($this->request->data)) {
				$this->Session->setFlash(__('The cuestionario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuestionario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cuestionario.' . $this->Cuestionario->primaryKey => $id));
			$this->request->data = $this->Cuestionario->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Cuestionario->id = $id;
		if (!$this->Cuestionario->exists()) {
			throw new NotFoundException(__('Invalid cuestionario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cuestionario->delete()) {
			$this->Session->setFlash(__('The cuestionario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cuestionario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Cuestionario->recursive = 0;
		$this->set('cuestionarios', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Cuestionario->exists($id)) {
			throw new NotFoundException(__('Invalid cuestionario'));
		}
		$options = array('conditions' => array('Cuestionario.' . $this->Cuestionario->primaryKey => $id));
		$this->set('cuestionario', $this->Cuestionario->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Cuestionario->create();
			if ($this->Cuestionario->save($this->request->data)) {
				$this->Session->setFlash(__('The cuestionario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuestionario could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Cuestionario->exists($id)) {
			throw new NotFoundException(__('Invalid cuestionario'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Cuestionario->save($this->request->data)) {
				$this->Session->setFlash(__('The cuestionario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuestionario could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Cuestionario.' . $this->Cuestionario->primaryKey => $id));
			$this->request->data = $this->Cuestionario->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Cuestionario->id = $id;
		if (!$this->Cuestionario->exists()) {
			throw new NotFoundException(__('Invalid cuestionario'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Cuestionario->delete()) {
			$this->Session->setFlash(__('The cuestionario has been deleted.'));
		} else {
			$this->Session->setFlash(__('The cuestionario could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
