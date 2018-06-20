<?php
App::uses('AppController', 'Controller');
/**
 * Maincategories Controller
 *
 * @property Maincategory $Maincategory
 * @property PaginatorComponent $Paginator
 */
class MaincategoriesController extends AppController {

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
		$this->Maincategory->recursive = 0;
		$this->set('maincategories', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Maincategory->exists($id)) {
			throw new NotFoundException(__('Invalid maincategory'));
		}
		$options = array('conditions' => array('Maincategory.' . $this->Maincategory->primaryKey => $id));
		$this->set('maincategory', $this->Maincategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Maincategory->create();
			if ($this->Maincategory->save($this->request->data)) {
				//$this->Session->setFlash(__('The maincategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maincategory could not be saved. Please, try again.'));
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
		if (!$this->Maincategory->exists($id)) {
			throw new NotFoundException(__('Invalid maincategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Maincategory->save($this->request->data)) {
				//$this->Session->setFlash(__('The maincategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The maincategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Maincategory.' . $this->Maincategory->primaryKey => $id));
			$this->request->data = $this->Maincategory->find('first', $options);
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
		$this->Maincategory->id = $id;
		if (!$this->Maincategory->exists()) {
			throw new NotFoundException(__('Invalid maincategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Maincategory->delete()) {
			//$this->Session->setFlash(__('The maincategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The maincategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
