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
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Historial->create();
			if ($this->Historial->save($this->request->data)) {
				$this->Session->setFlash(__('The historial has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The historial could not be saved. Please, try again.'));
			}
		}
		$users = $this->Historial->User->find('list');
		$cuestionarios = $this->Historial->Cuestionario->find('list');
		$this->set(compact('users', 'cuestionarios'));
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
