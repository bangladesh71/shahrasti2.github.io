<?php
App::uses('AppController', 'Controller');
/**
 * Contents Controller
 *
 * @property Content $Content
 * @property PaginatorComponent $Paginator
 */
class ContentsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Cms');
	public $uses = array ('Content', 'Contentimage' );
/**
 * index method
 *
 * @return void
 */
	public function index($typ = 'null') {
		$this->Content->recursive = 0;
		$id = array_search ( $typ, $this->array_type );
		if(empty($id)){
			$cond = '';
		}else{
			$cond = array ('type' => $id);
		}
		$this->set('contents', $this->Paginator->paginate($cond));
		
		
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
		$this->set('content', $this->Content->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add($type = null) {
		if ($type == null) {
			$typ = 1;
		}
		$typ = array_search ( $type, $this->array_type );
		if ($this->request->is('post')) {
			$this->Content->create();
			if ($this->Content->save($this->request->data)) {
				$id = $this->Content->getInsertID ();
				//For Image  Upload
				if (!empty($this->request->data ['Content'] ['image'] ['tmp_name'])) {
					$this->Cms->uploadImage ( $this->request->data ['Content'] ['image'], $id, 'l', $this->hw [$type] [0], $this->hw [$type] [1] );
					$this->Cms->uploadImage ( $this->request->data ['Content'] ['image'], $id, 's', 150, 180 );
						
				}
				//For PDF  Upload
				if (!empty($this->request->data ['Content'] ['pdf'] ['tmp_name'])) {
					$this->Cms->uploadFile ( $this->request->data ['Content'] ['pdf'], $id, 'p' );
						
				}
				$this->Session->setFlash(__('The content has been saved.'));
				return $this->redirect(array('action' => 'index/' . $type ));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		}
		$contenttypes = $this->Content->Contenttype->find ( 'list', array ('conditions' => array ('ctype LIKE' => '%"' . $typ . '"%' ) ) );
		$this->set(compact('contenttypes'));
		
		$this->set ( 'type', $typ );
		$this->set ( 'type_slug', $type );
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($type = null, $slug = null) {
		if ($type == null) {
			$typ = 1;
		}
		$typ = array_search ( $type, $this->array_type );
		$contArray=$this->Content->getContentIdBySlug($slug);
		$id = $contArray['Content'] ['id'];
		$this->Content->id = $id;
		
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		if ($this->request->is(array('post', 'put'))) {
			
			if ($this->Content->save($this->request->data)) {
				
				//For Image  Upload
				if (!empty($this->request->data ['Content'] ['image'] ['tmp_name'])) {
					
					$this->Cms->uploadImage ( $this->request->data ['Content'] ['image'], $id, 'l', $this->hw [$type] [0], $this->hw [$type] [1] );
					$this->Cms->uploadImage ( $this->request->data ['Content'] ['image'], $id, 's', 150, 180 );
				
				}
				//For PDF  Upload
				if (!empty($this->request->data['Content'] ['pdf'] ['tmp_name'])) {
					$this->Cms->uploadFile ( $this->data ['Content'] ['pdf'], $id, 'p' );
				}
				
				$this->Session->setFlash(__('The content has been saved.'));
				return $this->redirect(array('action' => 'index/' . $type ));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
		}
		$contenttypes = $this->Content->Contenttype->find ( 'list', array ('conditions' => array ('ctype LIKE' => '%"' . $typ . '"%' ) ) );
		$this->set(compact('contenttypes'));
		
		$this->set ( 'type', $typ );
		$this->set ( 'type_slug', $type );
		
		
	}
	public function editbn($type = null, $slug = null) {
		
		if ($type == null) {
			$typ = 1;
		}
		$typ = array_search ( $type, $this->array_type );
		$contArray=$this->Content->getContentIdBySlug($slug);
		$id = $contArray['Content'] ['id'];
		$this->Content->id = $id;
	
		if (!$this->Content->exists($id)) {
			throw new NotFoundException(__('Invalid content'));
		}
		
	
		if ($this->request->is(array('post', 'put'))) {
	
			if ($this->Content->save($this->request->data)) {
				//For PDF  Upload
				if (!empty($this->request->data['Content'] ['pdf'] ['tmp_name'])) {
					pr($this->request->data['Content'] ['pdf'] ['tmp_name']);
					$this->Cms->uploadFile ( $this->data ['Content'] ['pdf'], 'bn'.$id, 'p' );
				}

				$this->Session->setFlash(__('The content has been saved.'));
				return $this->redirect(array('action' => 'index/' . $type ));
			} else {
				$this->Session->setFlash(__('The content could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Content.' . $this->Content->primaryKey => $id));
			$this->request->data = $this->Content->find('first', $options);
			
		
		}
		$this->set ( 'type', $typ );
		$this->set ( 'type_slug', $type );
	
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($type, $id = null) {
		$this->Content->id = $id;
		if (!$this->Content->exists()) {
			throw new NotFoundException(__('Invalid content'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Content->delete()) {
			$file1 = 'img/upload/large/' . $id . '.png';
			$file2 = 'img/upload/small/' . $id . '.png';
			/*$file3 = 'img/upload/pdf/' . $id . '.pdf';
			$file4 = 'img/upload/pdf/' . 'bn' .$id . '.pdf';*/
			if(is_file($file1)){
				@unlink ( $file1 );
			}
			if(is_file($file2)){
				@unlink ( $file2 );
			}
			/*if(is_file($file3)){
				@unlink ( $file3 );
			}
			if(is_file($file4)){
				@unlink ( $file4 );
			}*/
			$this->Session->setFlash(__('The content has been deleted successfully.'));
			$this->redirect ( array ('action' => 'index/' . $type ) );
		} else {
			$this->Session->setFlash(__('The content could not be deleted. Please, try again.'));
		}
			$this->redirect ( array ('action' => 'index/' . $type ) );
	}
	public function add_content_image($typeSlug,$contentSlug) {
		
		$typId = array_search ( $typeSlug, $this->array_type );
		$contArray=$this->Content->getContentIdBySlug($contentSlug);
		$content_id = $contArray['Content'] ['id'];
		
		if($this->request->is('post')){
			$data = $this->request->data;
			if(!empty($data['Contentimage']['content_id']) and $data['Uplaod']['Image']['error'] == 0 ){
				$this->Contentimage->create();
				$this->Contentimage->save($data);
				$imgId = $this->Contentimage->getInsertID();
				$this->uploader($data['Uplaod']['Image'],$imgId);
	
			}
			if(!empty($data['order'])){
				foreach($data['order'] as $key =>$value){
					$this->Contentimage->id = $value;
					$this->Contentimage->saveField('order',$key);
				}
			}
		
		}
		$data =  $this->Content->Contentimage->getImageListIdByContentId($content_id,1);
		$this->set('data',$data);
		$this->set('typ',$typeSlug);
		$this->set('contentSlug',$contentSlug);
		$this->set('content_id',$content_id);
	}
	public function add_content_video($typeSlug,$contentSlug) {
	
		$typId = array_search ( $typeSlug, $this->array_type );
		$contArray=$this->Content->getContentIdBySlug($contentSlug);
		$content_id = $contArray['Content'] ['id'];
	
		if($this->request->is('post')){
			
			$this->request->data['Contentimage']['type']=2;
			$data = $this->request->data;
			if(!empty($data['Contentimage']['content_id']) and $data['Uplaod']['image']['error'] == 0 ){
				$this->Contentimage->create();
				$this->Contentimage->save($data);
				$imgId = $this->Contentimage->getInsertID();
				//For PDF  Upload
				if (!empty($this->data ['Uplaod'] ['image'] ['tmp_name'])) {
					$this->Cms->uploadFile( $this->data ['Uplaod'] ['image'], $imgId, 'v' );
				}
			}
			if(!empty($data['order'])){
				foreach($data['order'] as $key =>$value){
					$this->Contentimage->id = $value;
					$this->Contentimage->saveField('order',$key);
				}
			}
	
		}
		$data =  $this->Content->Contentimage->getImageListIdByContentId($content_id,2);
		$this->set('data',$data);
		$this->set('typ',$typeSlug);
		$this->set('contentSlug',$contentSlug);
		$this->set('content_id',$content_id);
	}
	
	public function edit_content_image($typ,$contentSlug,$id) {
		if ($this->request->is('post') || $this->request->is('put')) {
			$data = $this->request->data;
			if ($this->Contentimage->save($this->request->data)) {
				//upload
				if(is_array($data['Contentimage'])){
					
					$this ->uploader($data['Contentimage']['Image'],$id);}
					//save
					$this->Session->setFlash(__('The contentimage has been saved'));
					$this->redirect(array('action' => 'add_content_image',$typ,$contentSlug));
						
			}else {
				$this->Session->setFlash(__('The contentimage could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contentimage->read(null, $id);
			$this->set('imagedata',$this->request->data);
		}
	}
	public function edit_content_video($typ,$contentSlug,$id) {
		if ($this->request->is('post') || $this->request->is('put')) {
			$data = $this->request->data;
			if ($this->Contentimage->save($this->request->data)) {
				//upload
				if(is_array($data['Contentimage'])){
					$this->Cms->uploadFile( $data['Contentimage']['image'], $id, 'v' );}
					//save
					$this->Session->setFlash(__('The video has been saved'));
					$this->redirect(array('action' => 'add_content_video',$typ,$contentSlug));
	
			}else {
				$this->Session->setFlash(__('The video could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Contentimage->read(null, $id);
			$this->set('imagedata',$this->request->data);
		}
}

	public function delete_content_image($type,$contentSlug, $id) {
		$this->Contentimage->id = $id;
		if($this->Contentimage->delete (  )){
			$this->unlink_image("img/upload/small/",$id,".png");
			$this->unlink_image("img/upload/large/",$id,".png");
			$this->Session->setFlash(__('The content images has been deleted successfully.'));
			$this->redirect ( array ('action' => "add_content_image/$type/$contentSlug") );
		}else{
			$this->Session->setFlash ( __ ( 'Content was not deleted' ) );
			$this->redirect ( array ('action' => "add_content_image/$type/$contentSlug") );
		}
	}
	public function delete_content_video($type,$contentSlug, $id) {
		$this->Contentimage->id = $id;
		if($this->Contentimage->delete (  )){
			$this->unlink_image("img/upload/video/",$id,".flv");
			$this->Session->setFlash(__('The content images has been deleted successfully.'));
			$this->redirect ( array ('action' => "add_content_video/$type/$contentSlug") );
		}else{
			$this->Session->setFlash ( __ ( 'Content was not deleted' ) );
			$this->redirect ( array ('action' => "add_content_video/$type/$contentSlug") );
		}
	}
	
	private function uploader($data,$imgid){
	
		$this->Cms->uploadImage($data, $imgid, 's', 180,250);
		$this->Cms->uploadImage($data, $imgid, 'l',  '', 940);
	}
	private function unlink_image($root,$id,$imgType){
		$location = $root.$id.$imgType;
		@unlink($location);
	}
}
