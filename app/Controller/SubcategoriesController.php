<?php
App::uses('AppController', 'Controller');
/**
 * Subcategories Controller
 *
 * @property Subcategory $Subcategory
 * @property PaginatorComponent $Paginator
 */
class SubcategoriesController extends AppController {

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

		//pr($this->request->data);

		$type_search = null;

		$this->Subcategory->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['profilesearch']['maincategory_id'])){
			//$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
			$type_search .= ' AND Subcategory.maincategory_id LIKE "%'.$this->request->data['profilesearch']['maincategory_id'].'"';
		}

		if(!empty($this->request->data['profilesearch']['childcategory_id'])){
			$type_search .= ' AND Subcategory.childcategory_id LIKE "%'.$this->request->data['profilesearch']['childcategory_id'].'"';
		}

		if(!empty($this->request->data['profilesearch']['designation_id'])){
			$type_search .= ' AND Subcategory.designation_id LIKE "%'.$this->request->data['profilesearch']['designation_id'].'"';
		}

		if(!empty($this->request->data['profilesearch']['name'])){
			$type_search .= ' AND Subcategory.person_name LIKE "%'.$this->request->data['profilesearch']['name'].'%"';
		}



		$this->set(compact('type_search'));
		$this->set('subcategories', $this->Paginator->paginate(array($type_search)));

		$childcategories = $this->Subcategory->Childcategory->find('list');
		$designations = $this->Subcategory->Designation->find('list');
		$maincategories = $this->Subcategory->Maincategory->find('list');
		$this->set(compact('designations','maincategories','childcategories'));



	}

	public function search() {

		//pr($this->request->data);

		$type_search = null;

		$this->Subcategory->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['maincategory_id'])){
			//$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
			$type_search .= ' AND Subcategory.maincategory_id LIKE "%'.$this->request->data['allsearch']['maincategory_id'].'"';
		}

		if(!empty($this->request->data['allsearch']['childcategory_id'])){
			$type_search .= ' AND Subcategory.childcategory_id LIKE "%'.$this->request->data['allsearch']['childcategory_id'].'"';
		}

		if(!empty($this->request->data['allsearch']['designation_id'])){
			$type_search .= ' AND Subcategory.designation_id LIKE "%'.$this->request->data['allsearch']['designation_id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Subcategory.person_name LIKE "%'.$this->request->data['allsearch']['name'].'%"';
		}



		$this->set(compact('type_search'));
		$this->Paginator->settings = array('limit' => 500);
		$this->set('subcategories', $this->Paginator->paginate(array($type_search)));
		//$this->Paginator->paginate('Post', array(), array('title', 'slug'));



		$childcategories = $this->Subcategory->Childcategory->find('list');
		$designations = $this->Subcategory->Designation->find('list');
		$maincategories = $this->Subcategory->Maincategory->find('list');
		$this->set(compact('designations','maincategories','childcategories'));



	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
		$this->set('subcategory', $this->Subcategory->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {

		//pr($this->request->data); die();

		if ($this->request->is('post')) {
			$this->Subcategory->create();
			if ($this->Subcategory->save($this->request->data)) {
				//$this->Session->setFlash(__('The subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategory could not be saved. Please, try again.'));
			}
		}

		$childcategories = $this->Subcategory->Childcategory->find('list');
		$designations = $this->Subcategory->Designation->find('list');
		$maincategories = $this->Subcategory->Maincategory->find('list');
		$unions = $this->Subcategory->Union->find('list');
		$this->set(compact('unions','designations','maincategories','childcategories'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Subcategory->exists($id)) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Subcategory->save($this->request->data)) {
				//$this->Session->setFlash(__('The subcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The subcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Subcategory.' . $this->Subcategory->primaryKey => $id));
			$this->request->data = $this->Subcategory->find('first', $options);
		}

		$childcategories = $this->Subcategory->Childcategory->find('list');
		$designations = $this->Subcategory->Designation->find('list');
		$maincategories = $this->Subcategory->Maincategory->find('list');
		$unions = $this->Subcategory->Union->find('list');
		$this->set(compact('unions','designations','maincategories','childcategories'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Subcategory->id = $id;
		if (!$this->Subcategory->exists()) {
			throw new NotFoundException(__('Invalid subcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Subcategory->delete()) {
			//$this->Session->setFlash(__('The subcategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The subcategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	public function dropdownprofilestu(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';

				$this->set('subcategory',$this->Subcategory->find('list',array('fields'=>array('id','name'),'conditions' =>
					array('maincategory_id' =>$_REQUEST['id']),
					'recursive' => -1)));



		}

	}

	public function dropdownprofilestu1(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			$this->loadModel('Childcategory');
			$childCatIds = $this->Subcategory->find('list',array('fields'=>array('id','childcategory_id'),
					'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$strChildIds = implode(',',$childCatIds);
			if(!empty($childCatIds)){
				$childcategories = $this->Childcategory->find('list',array('fields'=>array('id','name'),
						'conditions' =>array("id IN ($strChildIds)" ),
						'recursive' => -1));

				$this->set('childcategory',$childcategories);
			}
		}

	}

	public function childcatId(){
		if(!empty($_REQUEST['id'])){
			$this->autoRender=false;
			$data=$this->Subcategory->find('first',array('conditions' =>
					array('childcategory_id' =>$_REQUEST['id'],'maincategory_id' =>$_REQUEST['childcatId']),
					'recursive' => -1));

			return json_encode($data);

		}

	}

	public function degdropdown(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$SubCatIds = $this->Subcategory->find('list',array('fields'=>array('id','designation_id'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			$this->set(compact('SubCatIds'));
		}

	}
}


