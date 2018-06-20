<?php
App::uses('AppController', 'Controller');
/**
 * Tennissettings Controller
 *
 * @property Tennissetting $Tennissetting
 * @property PaginatorComponent $Paginator
 */
class TennissettingsController extends AppController {

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
		$this->Tennissetting->recursive = 0;
		$this->set('tennissettings', $this->Paginator->paginate());
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('id','name')));
		$this->set(compact('slots'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tennissetting->exists($id)) {
			throw new NotFoundException(__('Invalid tennissetting'));
		}
		$options = array('conditions' => array('Tennissetting.' . $this->Tennissetting->primaryKey => $id));
		$this->set('tennissetting', $this->Tennissetting->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tennissetting->create();
			
			if ($this->Tennissetting->save($this->request->data)) {
				$this->Session->setFlash(__('The tennissetting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tennissetting could not be saved. Please, try again.'));
			}
		}
		
			$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('name','name')));
		$this->set(compact('slots'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tennissetting->exists($id)) {
			throw new NotFoundException(__('Invalid tennissetting'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tennissetting->save($this->request->data)) {
				$this->Session->setFlash(__('The tennissetting has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tennissetting could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tennissetting.' . $this->Tennissetting->primaryKey => $id));
			$this->request->data = $this->Tennissetting->find('first', $options);
		}
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('name','name')));
		$this->set(compact( 'slots'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tennissetting->id = $id;
		if (!$this->Tennissetting->exists()) {
			throw new NotFoundException(__('Invalid tennissetting'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tennissetting->delete()) {
			$this->Session->setFlash(__('The tennissetting has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tennissetting could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
