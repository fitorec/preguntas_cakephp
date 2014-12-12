<?php
App::uses('AppController', 'Controller');
/**
 * Historiales Controller
 *
 * @property Historial $Historial
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class HistorialesController extends AppController {

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
		$this->Historial->recursive = 0;
		$this->set('historiales', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Historial->exists($id)) {
			throw new NotFoundException(__('Invalid historial'));
		}
		$options = array('conditions' => array('Historial.' . $this->Historial->primaryKey => $id));
		$this->set('historial', $this->Historial->find('first', $options));
	}

/**
 * Se encarga de inicializar un historial.
 * 
 * Basicamente inicia la bitacola de un cuestionario.
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Historial']['user_id'] = $this->Auth->user('id'); 
			$this->request->data['Historial']['aciertos'] = 0;
			$this->request->data['Historial']['calificacion'] = 0;
			$this->request->data['Historial']['data'] = '';
			$this->Historial->create();
			$historial = $this->Historial->save($this->request->data);
			if ($historial) {
				die(json_encode($historial));
			} else {
				die('Ocurrio un error al intentar procesar su peticición, revise de nuevo');
			}
		}
	}

/**
 * Se encarga de inicializar un historial.
 * 
 * Basicamente inicia la bitacola de un cuestionario.
 *
 * @return void
 */
	public function finalizar() {
		/*if (!$this->Historial->exists($id)) {
			throw new NotFoundException(__('Invalid historial'));
		}*/
		if ($this->request->is('post')) {
			//obteniendo la informacion necesaria
			$historial = &$this->request->data['Historial'];
			pr($historial);
			// ///////////////////////////////////////
			$this->Historial->id = $historial['id'];
			$this->Historial->Cuestionario->id = $this->Historial->field('cuestionario_id');
			$numPreguntas = $this->Historial->Cuestionario->field('num_preguntas');
			$aciertos = $historial['aciertos'];
			$calf = 10 * floatval($aciertos) / floatval($numPreguntas);
			//Seteando valores
			$historial['data'] = $historial['preguntas'];
			$historial['calicacion'] = $calf;
			$historial['hora_finalizado'] = date('Y-m-d H:i:s');
			$historialResult = $this->Historial->save(array('Historial' => $historial));
			//Guardando valores
			/*if ($historialResult) {
				die(json_encode($historialResult));
			} else {
				die('Ocurrio un error al intentar procesar su peticición, revise de nuevo');
			}*/
			return $this->redirect(array('action' => 'view', $historial['id']));
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
		if (!$this->Historial->exists($id)) {
			throw new NotFoundException(__('Invalid historial'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Historial->save($this->request->data)) {
				$this->Session->setFlash(__('The historial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historial could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Historial.' . $this->Historial->primaryKey => $id));
			$this->request->data = $this->Historial->find('first', $options);
		}
		$users = $this->Historial->User->find('list');
		$cuestionarios = $this->Historial->Cuestionario->find('list');
		$this->set(compact('users', 'cuestionarios'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Historial->id = $id;
		if (!$this->Historial->exists()) {
			throw new NotFoundException(__('Invalid historial'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Historial->delete()) {
			$this->Session->setFlash(__('The historial has been deleted.'));
		} else {
			$this->Session->setFlash(__('The historial could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
