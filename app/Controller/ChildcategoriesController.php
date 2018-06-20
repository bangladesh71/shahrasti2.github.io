<?php
App::uses('AppController', 'Controller');
/**
 * Childcategories Controller
 *
 * @property Childcategory $Childcategory
 * @property PaginatorComponent $Paginator
 */
class ChildcategoriesController extends AppController {

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
		$this->Childcategory->recursive = 0;
		$this->set('childcategories', $this->Paginator->paginate());
	}

	/**
	 * view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function view($id = null) {
		if (!$this->Childcategory->exists($id)) {
			throw new NotFoundException(__('Invalid childcategory'));
		}
		$options = array('conditions' => array('Childcategory.' . $this->Childcategory->primaryKey => $id));
		$this->set('childcategory', $this->Childcategory->find('first', $options));
	}

	/**
	 * add method
	 *
	 * @return void
	 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Childcategory->create();
			if ($this->Childcategory->save($this->request->data)) {
				//$this->Session->setFlash(__('The childcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The childcategory could not be saved. Please, try again.'));
			}
		}
		$maincategories = $this->Childcategory->Maincategory->find('list');
		$this->set(compact('maincategories'));
	}

	/**
	 * edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function edit($id = null) {
		if (!$this->Childcategory->exists($id)) {
			throw new NotFoundException(__('Invalid childcategory'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Childcategory->save($this->request->data)) {
				//$this->Session->setFlash(__('The childcategory has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The childcategory could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Childcategory.' . $this->Childcategory->primaryKey => $id));
			$this->request->data = $this->Childcategory->find('first', $options);
		}
		$maincategories = $this->Childcategory->Maincategory->find('list');
		$this->set(compact('maincategories'));
	}

	/**
	 * delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function delete($id = null) {
		$this->Childcategory->id = $id;
		if (!$this->Childcategory->exists()) {
			throw new NotFoundException(__('Invalid childcategory'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Childcategory->delete()) {
			//$this->Session->setFlash(__('The childcategory has been deleted.'));
		} else {
			$this->Session->setFlash(__('The childcategory could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

	//Main dropdown controller------------------------------------------------------------------//
	public function dropdownprofilestu1(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}

	public function degdropdown(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function subdepended (){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$degtIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('degtIds'));
		}

	}

	public function subdepended_profile (){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$degtIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('degtIds'));
		}

	}

	/*public function namecat(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$catName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($catName);

			$this->set(compact('catName'));
		}

	}*/
	//End Main dropdown controller-----------------------------------***------------------------//



	//all Nijukto controller--------------------------------------------------------------------//
	public function nijuktodropdown(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}

	public function nijuktodeg(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function nijuktoname(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	//End nijukto controller ---------------------------------****------------------------------//



	// bitoron controller ---------------------------------****------------------------------//
	public function bitorondropdown(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}

	public function bitorondropdown2(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown3(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown4(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown5(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown6(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown7(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown8(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown9(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}
	public function bitorondropdown10(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childCatIds = $this->Childcategory->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('maincategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childCatIds'));
		}

	}


	public function bitorondeg(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg2(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg3(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg4(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg5(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg6(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg7(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg8(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg9(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitorondeg10(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Maincategory');
			$childSubCatIds = $this->Childcategory->Designation->find('list',array('fields'=>array('id','name'),
				'conditions' =>array('childcategory_id' =>$_REQUEST['id'])));

			$this->set(compact('childSubCatIds'));
		}

	}

	public function bitoronname(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname2(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname3(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname4(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname5(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname6(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname7(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname8(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname9(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}
	public function bitoronname10(){
		if(!empty($_REQUEST['id'])){
			$this->layout='ajax';
			//$this->loadModel('Subcategory');
			$nijuktoName = $this->Childcategory->Subcategory->find('list',array('fields'=>array('id','person_name'),
				'conditions' =>array('designation_id' =>$_REQUEST['id'])));

			//pr($nijuktoName);

			$this->set(compact('nijuktoName'));
		}

	}

/*	public function dropdownprofilestu2(){
		if(!empty($_REQUEST['id'])){
			//$this->layout='ajax';
			$this->autoRender=false;
			$data=$this->Childcategory->Subcategory->find('first',array('conditions' =>
				array('designation_id' =>$_REQUEST['id'],'maincategory_id' =>$_REQUEST['childcatId']),
				'recursive' => -1));

			//$this->set(compact('data'));
			return json_encode($data);

		}

	}*/

	public function dropdownprofilestu2(){
		if(!empty($_REQUEST['id'])){

			$this->autoRender=false;
			$this->loadModel('Subcategory');
			$data=$this->Subcategory->find('all',array('conditions' =>
				array('designation_id' =>$_REQUEST['id'],'maincategory_id' =>$_REQUEST['childcatId']),
				'recursive' => -1));

			//pr($data);

			//$this->set(compact('data'));
			//pr(json_encode($data));
			return json_encode($data);

		}

	}

}
