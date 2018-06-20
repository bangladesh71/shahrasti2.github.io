<?php
App::uses('AppController', 'Controller');
/**
 * Menus Controller
 *
 * @property Menu $Menu
 * @property PaginatorComponent $Paginator
 */
class MenusController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $helpers = array('Tree');
	public $components = array('Paginator');
	public $menu_type = array('1' => 'Page', '2' =>'Url');
	public $type = array('1' => 'Top', '2' =>'Bottom');
	Public $menu_role = array ('1' => 'Master Admin','2' =>'Site Admin', '3' => 'User Admin', '4' =>'Visitors');
	public $menu_status = array('1' => 'Active', '2' => 'Inactive');

/**
 * index method
 *
 * @return void
 */
	public function beforeFilter(){
		parent::beforeFilter();
		$this->set('action' ,$this->params ['action']);
		$this->set('menu_type' ,$this->menu_type);
		$this->set('menu_status' ,$this->menu_status);
		$this->set('menu_role' ,$this->menu_role);
		$this->set('type' ,$this->type);
	}
	public function index($type=null) {
		$menus = $this -> Menu ->getMenu($type);
		$this->set('menuSortable',$menus);
		
		$con=" Menu.menu_type='" .$type. "'";
		
		$this->Menu->recursive = 0;
		$this->paginate = array('order' => 'Menu.order','limit' => 10);
		$this->set('menus', $this->paginate(array($con)));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Menu->exists($id)) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id));
		$this->set('menu', $this->Menu->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($id=null) {
		if ($this->request->is('post')) {
			
			$this->request->data['Menu']['menu_type']=$id;
			$this->request->data['Menu']['role']=1;
			$this->Menu->create();
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'));
				return $this->redirect(array('action' => 'index',$id));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		}
		$parentMenus = $this->Menu->ParentMenu->find('list');
		
		$contents = $this->Menu->Content->find('list',array('conditions'=>array(
					'type'=>array_search ( 'pages', $this->array_type )
			)));
		
	
		$this->set(compact('parentMenus', 'contents'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($slug = null,$type=null) {
		$id_data = $this->Menu->getMenuIdBySlug($slug);
		$this->Menu->id = $id_data['Menu']['id'];
		
		$this->request->data['Menu']['role']=1;
		if (!$this->Menu->exists($id_data['Menu']['id'])) {
			throw new NotFoundException(__('Invalid menu'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Menu->save($this->request->data)) {
				$this->Session->setFlash(__('The menu has been saved.'));
				return $this->redirect(array('action' => 'index',$type));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Menu.' . $this->Menu->primaryKey => $id_data['Menu']['id']));
			$this->request->data = $this->Menu->find('first', $options);
		}
		$parentMenus = $this->Menu->ParentMenu->find('list');
		$contents = $this->Menu->Content->find('list',array('conditions'=>array(
					'type'=>array_search ( 'pages', $this->array_type )
			)));
		$this->set(compact('parentMenus', 'contents'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Menu->id = $id;
		if (!$this->Menu->exists()) {
			throw new NotFoundException(__('Invalid menu'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Menu->delete()) {
			$this->Session->setFlash(__('The menu has been deleted.'));
		} else {
			$this->Session->setFlash(__('The menu could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function order(){
		if($this -> request ->is('post')){
			$data = $this->request->data;
				
			foreach ($data['order'] as $order => $key ){
				$this-> Menu-> id = $key;
				$this -> Menu -> saveField('order',$order);
			}
			$this->Session->setFlash('Menus have been sorted.');
		}
	
		$this -> redirect(array('action' => 'index'));
	
	}
}
