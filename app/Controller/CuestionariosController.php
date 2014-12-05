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
		$this->set('cuestionario', $this->Cuestionario->find('first', $options));
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
			$this->Cuestionario->create();
			if ($this->Cuestionario->save($data)) {
				$this->Session->setFlash(__('The cuestionario has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The cuestionario could not be saved. Please, try again.'));
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
