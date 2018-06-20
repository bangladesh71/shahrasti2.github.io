<?php
App::uses('AppController', 'Controller');
/**
 * Designations Controller
 *
 * @property Designation $Designation
 * @property PaginatorComponent $Paginator
 */
class DesignationsController extends AppController {

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
		$this->Designation->recursive = 0;
		$this->set('designations', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Designation->exists($id)) {
			throw new NotFoundException(__('Invalid designation'));
		}
		$options = array('conditions' => array('Designation.' . $this->Designation->primaryKey => $id));
		$this->set('designation', $this->Designation->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Designation->create();
			if ($this->Designation->save($this->request->data)) {
				//$this->Session->setFlash(__('The designation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The designation could not be saved. Please, try again.'));
			}
		}

		$childcategories = $this->Designation->Childcategory->find('list');
		$this->set(compact('childcategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Designation->exists($id)) {
			throw new NotFoundException(__('Invalid designation'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Designation->save($this->request->data)) {
				//$this->Session->setFlash(__('The designation has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The designation could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Designation.' . $this->Designation->primaryKey => $id));
			$this->request->data = $this->Designation->find('first', $options);
		}

		$childcategories = $this->Designation->Childcategory->find('list');
		$this->set(compact('childcategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Designation->id = $id;
		if (!$this->Designation->exists()) {
			throw new NotFoundException(__('Invalid designation'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Designation->delete()) {
			//$this->Session->setFlash(__('The designation has been deleted.'));
		} else {
			$this->Session->setFlash(__('The designation could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function degcat (){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$degIds = $this->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('degIds'));
		}

	}

	public function degcat_profile (){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$degIds = $this->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('degIds'));
		}

	}
}
