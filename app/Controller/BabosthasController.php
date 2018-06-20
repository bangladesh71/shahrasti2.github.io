<?php
App::uses('AppController', 'Controller');
/**
 * Babosthas Controller
 *
 * @property Babostha $Babostha
 * @property PaginatorComponent $Paginator
 */
class BabosthasController extends AppController {

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
		$this->Babostha->recursive = 0;
		$this->set('babosthas', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Babostha->exists($id)) {
			throw new NotFoundException(__('Invalid babostha'));
		}
		$options = array('conditions' => array('Babostha.' . $this->Babostha->primaryKey => $id));
		$this->set('babostha', $this->Babostha->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Babostha->create();
			if ($this->Babostha->save($this->request->data)) {
				$this->Session->setFlash(__('The babostha has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The babostha could not be saved. Please, try again.'));
			}
		}
		$entryforms = $this->Babostha->Entryform->find('list');
		$subcategories = $this->Babostha->Subcategory->find('list');
		$this->set(compact('entryforms', 'subcategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Babostha->exists($id)) {
			throw new NotFoundException(__('Invalid babostha'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Babostha->save($this->request->data)) {
				$this->Session->setFlash(__('The babostha has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The babostha could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Babostha.' . $this->Babostha->primaryKey => $id));
			$this->request->data = $this->Babostha->find('first', $options);
		}
		$entryforms = $this->Babostha->Entryform->find('list');
		$subcategories = $this->Babostha->Subcategory->find('list');
		$this->set(compact('entryforms', 'subcategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Babostha->id = $id;
		if (!$this->Babostha->exists()) {
			throw new NotFoundException(__('Invalid babostha'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Babostha->delete()) {
			$this->Session->setFlash(__('The babostha has been deleted.'));
		} else {
			$this->Session->setFlash(__('The babostha could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
