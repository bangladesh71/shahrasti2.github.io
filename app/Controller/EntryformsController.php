<?php
App::uses('AppController', 'Controller');
/**
 * Entryforms Controller
 *
 * @property Entryform $Entryform
 * @property PaginatorComponent $Paginator
 */
class EntryformsController extends AppController {

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

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['status'])){
			$type_search .= ' AND Entryform.status LIKE "%'.$this->request->data['allsearch']['status'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.created,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.created,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->Paginator->settings = array('order' => array('Entryform.id' =>'desc'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search,'MONTH(Entryform.created)' => date('n'))));
	}



	public function feedback() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search)));
	}


	public function feedback_view($id) {

		//pr($this->request->data); die();


		if (!$this->Entryform->exists($id)) {
			throw new NotFoundException(__('Invalid entryform'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entryform->saveAssociated($this->request->data)) {
				//$this->Session->setFlash(__('The entryform has been saved.'));
				return $this->redirect(array('action' => 'feedback'));
			} else {
				$this->Session->setFlash(__('The entryform could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entryform.' . $this->Entryform->primaryKey => $id));
			$this->request->data = $this->Entryform->find('first', $options);
		}


		$this->Entryform->recursive = 2;
		$options = array('conditions' => array('Entryform.' . $this->Entryform->primaryKey => $id));
		$this->set('entryform', $this->Entryform->find('first', $options));
		$this->set(compact('bangla'));

	}




	public function archive() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search)));
	}


	public function monthpending() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search,'MONTH(Entryform.created)' => date('n'))));
	}


	public function monthworking() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search,'MONTH(Entryform.created)' => date('n'))));
	}


	public function monthdone() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search,'MONTH(Entryform.created)' => date('n'))));
	}

	public function expire() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search, 'Entryform.deadline <' => date("Y-m-d"), 'NOT' => array('Entryform.status' => '3'))));
	}

	public function lastday() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$entryforms = $this->Entryform->find('all');

		$this->set(compact('type_search','maincategories','entryforms'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search,'MONTH(Entryform.created)' => date('n'), 'Entryform.deadline' => date('Y-m-d', strtotime("+1 days")), 'NOT' => array('Entryform.deadline' => null ))));

		//$this->set('entryforms', $this->Paginator->paginate(array($type_search)));
	}

	public function lifetimeworking() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search, 'Entryform.status'=>2)));
	}

	public function lifetimepending() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search, 'Entryform.status'=>1)));
	}

	public function lifetimedone() {

		//pr($this->request->data);

		$type_search = null;

		$this->Entryform->recursive = 0;

		$type_search = "1=1";

		if(!empty($this->request->data['allsearch']['id'])){
			$type_search .= ' AND Entryform.id LIKE "%'.$this->request->data['allsearch']['id'].'"';
		}

		if(!empty($this->request->data['allsearch']['name'])){
			$type_search .= ' AND Entryform.name LIKE "%'.$this->request->data['allsearch']['name'].'"';
		}

		if(!empty($this->request->data['allsearch']['mobileNo'])){
			$type_search .= ' AND Entryform.cell_no LIKE "%'.$this->request->data['allsearch']['mobileNo'].'"';
		}

		if(!empty($this->request->data['allsearch']['role'])){
			$type_search .= ' AND Entryform.maincategory_id LIKE "%'.$this->request->data['allsearch']['role'].'"';
		}

		if(!empty($this->request->data['allsearch']['dayfrom']) && !empty($this->request->data['allsearch']['dayto'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d') BETWEEN '".$this->request->data['allsearch']['dayfrom']."' AND '".$this->request->data['allsearch']['dayto']."'";
		}elseif(!empty($this->request->data['allsearch']['dayfrom'])){
			$type_search .=" AND DATE_FORMAT(Entryform.deadline,'%Y-%m-%d')='".$this->request->data['allsearch']['dayfrom']."'";
		}

		$maincategories = $this->Entryform->Maincategory->find('list');

		$this->set(compact('type_search','maincategories'));

		$this->set('entryforms', $this->Paginator->paginate(array($type_search, 'Entryform.status'=>3)));
	}

	public function printout(){

		$this->Entryform->recursive = 2;
		$this->set('entryforms', $this->Paginator->paginate());

	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null, $int = null) {
		if (!$this->Entryform->exists($id)) {
			throw new NotFoundException(__('Invalid entryform'));
		}
		$this->Entryform->recursive = 2;
		$options = array('conditions' => array('Entryform.' . $this->Entryform->primaryKey => $id));
		$this->set('entryform', $this->Entryform->find('first', $options));
		$this->set(compact('bangla'));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {

			//pr($this->request->data); die();

			$this->Entryform->create();
			if ($this->Entryform->saveAssociated($this->request->data)) {
				$id = $this->Entryform->getInsertID ();
				$this->Session->setFlash(__(''));
				return $this->redirect(array('action' => 'view', $id));

 //echo $this->Html->link(__('Edit'), array('action' => 'edit', $union['Union']['id']));
			} else {
				$this->Session->setFlash(__('The entryform could not be saved. Please, try again.'));
			}
		}

		$this->loadModel('Maincategory');
		$users = $this->Entryform->User->find('list');
		$maincategories = $this->Entryform->Maincategory->find('list');
		$problems = $this->Entryform->Problem->find('list');
		$subcategories = $this->Entryform->Subcategory->Childcategory->find('list');
		$this->set(compact('maincategories', 'problems','subcategories','users'));
	}

	public function quick_service() {
		if ($this->request->is('post')) {

			//pr($this->request->data); die();

			$this->Entryform->create();
			if ($this->Entryform->saveAssociated($this->request->data)) {
				$id = $this->Entryform->getInsertID ();
				$this->Session->setFlash(__(''));
				return $this->redirect(array('action' => 'index'));

				//echo $this->Html->link(__('Edit'), array('action' => 'edit', $union['Union']['id']));
			} else {
				$this->Session->setFlash(__('The entryform could not be saved. Please, try again.'));
			}
		}

		$this->loadModel('Maincategory');
		$users = $this->Entryform->User->find('list');
		$maincategories = $this->Entryform->Maincategory->find('list');
		$problems = $this->Entryform->Problem->find('list');
		$subcategories = $this->Entryform->Subcategory->Childcategory->find('list');
		$this->set(compact('maincategories', 'problems','subcategories','users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {

		//r($this->request->data); die();

		if (!$this->Entryform->exists($id)) {
			throw new NotFoundException(__('Invalid entryform'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Entryform->saveAssociated($this->request->data)) {
				//$this->Session->setFlash(__('The entryform has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entryform could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Entryform.' . $this->Entryform->primaryKey => $id));
			$this->request->data = $this->Entryform->find('first', $options);
		}

		$this->loadModel('Maincategory');
		$users = $this->Entryform->User->find('list');
		$maincategories = $this->Entryform->Maincategory->find('list');
		$problems = $this->Entryform->Problem->find('list');
		$subcategories = $this->Entryform->Subcategory->Childcategory->find('list');
		$this->set(compact('maincategories', 'problems','subcategories','users'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Entryform->id = $id;
		if (!$this->Entryform->exists()) {
			throw new NotFoundException(__('Invalid entryform'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Entryform->delete()) {
			//$this->Session->setFlash(__('The entryform has been deleted.'));
		} else {
			$this->Session->setFlash(__('The entryform could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
