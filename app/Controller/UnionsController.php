<?php
App::uses('AppController', 'Controller');
/**
 * Unions Controller
 *
 * @property Union $Union
 * @property PaginatorComponent $Paginator
 */
class UnionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Union->recursive = 0;
		$this->set('unions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Union->exists($id)) {
			throw new NotFoundException(__('Invalid union'));
		}
		$options = array('conditions' => array('Union.' . $this->Union->primaryKey => $id));
		$this->set('union', $this->Union->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Union->create();
			if ($this->Union->save($this->request->data)) {
				//$this->Session->setFlash(__('The union has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The union could not be saved. Please, try again.'));
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
		if (!$this->Union->exists($id)) {
			throw new NotFoundException(__('Invalid union'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Union->save($this->request->data)) {
				//$this->Session->setFlash(__('The union has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The union could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Union.' . $this->Union->primaryKey => $id));
			$this->request->data = $this->Union->find('first', $options);
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
		$this->Union->id = $id;
		if (!$this->Union->exists()) {
			throw new NotFoundException(__('Invalid union'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Union->delete()) {
			//$this->Session->setFlash(__('The union has been deleted.'));
		} else {
			$this->Session->setFlash(__('The union could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
