<?php
App::uses('AppController', 'Controller');
/**
 * Contentimages Controller
 *
 * @property Contentimage $Contentimage
 * @property PaginatorComponent $Paginator
 */
class ContentimagesController extends AppController {

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
		$this->Contentimage->recursive = 0;
		$this->set('contentimages', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Contentimage->exists($id)) {
			throw new NotFoundException(__('Invalid contentimage'));
		}
		$options = array('conditions' => array('Contentimage.' . $this->Contentimage->primaryKey => $id));
		$this->set('contentimage', $this->Contentimage->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Contentimage->create();
			if ($this->Contentimage->save($this->request->data)) {
				$this->Session->setFlash(__('The contentimage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contentimage could not be saved. Please, try again.'));
			}
		}
		$contents = $this->Contentimage->Content->find('list');
		$this->set(compact('contents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Contentimage->exists($id)) {
			throw new NotFoundException(__('Invalid contentimage'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Contentimage->save($this->request->data)) {
				$this->Session->setFlash(__('The contentimage has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The contentimage could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Contentimage.' . $this->Contentimage->primaryKey => $id));
			$this->request->data = $this->Contentimage->find('first', $options);
		}
		$contents = $this->Contentimage->Content->find('list');
		$this->set(compact('contents'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Contentimage->id = $id;
		if (!$this->Contentimage->exists()) {
			throw new NotFoundException(__('Invalid contentimage'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Contentimage->delete()) {
			$this->Session->setFlash(__('The contentimage has been deleted.'));
		} else {
			$this->Session->setFlash(__('The contentimage could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
