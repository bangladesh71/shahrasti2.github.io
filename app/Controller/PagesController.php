<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
App::uses('AppController', 'Controller');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController {

/**
 * This controller does not use a model
 *
 * @var array
 */
	public $components = array('Email');
	public $uses = array('Content');
	
		public function beforeFilter() {
		parent::beforeFilter ();
		$this->Auth->allow();
		$this->layout = 'public';

		
		$facilities=$this->getlastData(array_search ( 'facilities', $this->array_type ));
		$this->set(compact('facilities'));
	}
/**
 * slider 
 */
	public function slider() {
	$slider_data = $this->getContentByType(array_search ( 'slider', $this->array_type ));
	$this->set ( 'slider_data', $slider_data );
	
	}
	
	//Get Page Content Single Data By Content Id
	public function getContent($contentId = null) {
	$data =$this->Content->find('first', array ('conditions' => array ('Content.id' => $contentId),'recursive'=>-1));
	return $data;
	}
	
	 public function getContentByType($type=null) {
	$this->paginate = array ('conditions' => array ('Content.type' => $type ) );
	$data= $this->paginate();
	return $data;
	}
	
	public function getlastData($type=null,$limit=null){
	$data=$this->Content->find('all', array ('conditions' => array ('Content.type' =>$type),'recursive'=>-1,'limit'=>$limit,'order'=>'id DESC'));
	  return $data;
	}

/**
 * Displays a view
 *
 * @param mixed What page to display
 * @return void
 * @throws NotFoundException When the view file could not be found
 *	or MissingViewException in debug mode.
 */
	public function index() {
		$sliders=$this->getlastData(array_search ( 'slider', $this->array_type ),'5');
		$abouts=$this->getlastData(array_search ( 'about', $this->array_type ),'1');
		
		$this->set(compact('sliders','abouts'));
		
	}
	public function content($slug = null){
		$this->layout = 'public';
	
		if (empty($slug)) {
			$this->redirect ( array ('controller' => 'pages', 'action' => 'index' ) );
		} else {
			$contentId = $this->getContentIdBySlug($slug);
			if(empty($contentId)){
				$details_data = $this->getContentBySlugOrType($slug,'');
			}else{
				$details_data = $this->getContent($contentId);
			}
			
		}
		
		$this->set( 'details', $details_data );
	}
	public function getContentIdBySlug($slug){
		$contentId = $this->Menu->find(
				'first',
				array(
						'recursive'=>-1,
						'fields'=>'content_id',
						'conditions'=>"slug = '$slug'"
				)
		);
		return $contentId['Menu']['content_id'];
	}
	public function gallery(){
		$this->layout = 'public';
	
		$this->Content->recursive = 1;
		$this->paginate = array(
			'limit' => 6,
			'recursive'=>-1,
				'fields'=>array(
					'id',
					'title',
					'slug',
					'content'
			),
			'conditions'=>array(
					'type'=>array_search ( 'photogallery', $this->array_type )
			),
			'order'=>'Content.created desc'
		);
		
		
		$this->set('gallery_data', $this->paginate());
	}
	public function gallerydetails($content_id=null) {
		$this->layout = 'public';
		$imagedata= $this->Contentimage->find('all',array ('conditions' => array ('Contentimage.content_id' => $content_id ) ));
		$this->set ( 'gallerydetails_data', $imagedata);
	}
	public function video() {
		//$gallery_data = $this->getContentByType(array_search ( 'photogallery', $this->array_type ));
		$this->layout = 'public';
		
		$this->Content->recursive = 1;
		$this->paginate = array(
			'limit' => 6,
			'recursive'=>-1,
				'fields'=>array(
					'id',
					'title',
					'slug',
					'content'
			),
			'conditions'=>array(
					'type'=>array_search ( 'videogallery', $this->array_type )
			),
			'order'=>'Content.created desc'
		);
		
		
		$this->set('gallery_data', $this->paginate());
	}
	
	//Show Gallery Data Dteails
	public function videodetails($content_id=null) {
		$this->layout = 'public';
		$imagedata= $this->Contentimage->find('all',array ('conditions' => array ('Contentimage.content_id' => $content_id ) ));
		//pr($imagedata);
		$this->set ( 'gallerydetails_data', $imagedata);
	}
public function events(){
		$this->layout = 'public';
		$presentevents= $this->Content->find('all',array('recursive'=>1,'conditions'=>array('type'=>'9','contenttype_id'=>'1'),'order'=>'Content.id desc','limit'=>'4'));
		//pr($presentevents);
		$pastevents= $this->Content->find('all',array('recursive'=>1,'conditions'=>array('type'=>'9','contenttype_id'=>'2'),'order'=>'Content.id desc','limit'=>'4'));
		$Upcomingevents= $this->Content->find('all',array('recursive'=>1,'conditions'=>array('type'=>'9','contenttype_id'=>'3'),'order'=>'Content.id desc','limit'=>'4'));
		$this->set ( 'presentevents', $presentevents);
		$this->set ( 'pastevents', $pastevents);
		$this->set ( 'Upcomingevents', $Upcomingevents);
		}
	public function presentevents(){
		$this->layout = 'public';
		
		$this->Content->recursive = 1;
		$this->paginate = array(
			'limit' => 1,
			'recursive'=>-1,
				'fields'=>array(
					'id',
					'title',
					'slug',
					'content'
			),
			'conditions'=>array(
					'type'=>array_search ( 'events', $this->array_type ),'contenttype_id'=>'1'
			),
			'order'=>'Content.created desc'
		);
		
		
		$this->set('presentevents', $this->paginate());
		
	}
	public function eventdetails(){
			$this->layout = 'public';
			
			$this->Content->recursive = 1;
			$this->paginate = array(
				'limit' => 6,
				'recursive'=>-1,
					'fields'=>array(
						'id',
						'title',
						'slug',
						'content'
				),
				'conditions'=>array(
						'type'=>array_search ( 'events', $this->array_type ),'contenttype_id'=>'1'
				),
				'order'=>'Content.created desc'
			);
			
			
			$this->set('presentevents', $this->paginate());
			
	}
	
	public function pastevents(){
		$this->layout = 'public';
		$this->Content->recursive = 1;
		$this->paginate = array(
			'limit' => 1,
			'recursive'=>-1,
				'fields'=>array(
					'id',
					'title',
					'slug',
					'content'
			),
			'conditions'=>array(
					'type'=>array_search ( 'events', $this->array_type ),'contenttype_id'=>'2'
			),
			'order'=>'Content.created desc'
		);
		
		
		$this->set('pastevents', $this->paginate());
		}
	public function upcomingevents(){
		$this->layout = 'public';
		$this->Content->recursive = 1;
		$this->paginate = array(
			'limit' => 1,
			'recursive'=>-1,
				'fields'=>array(
					'id',
					'title',
					'slug',
					'content'
			),
			'conditions'=>array(
					'type'=>array_search ( 'events', $this->array_type ),'contenttype_id'=>'3'
			),
			'order'=>'Content.created desc'
		);
		
		
		$this->set('Upcomingevents', $this->paginate());
	}
	public function contact(){
		$this->layout = 'public';
		if ($this->request->is('post')){
		
			$this->sendMail($this->request->data,"contact");
		}
	}
	private function sendMail($data, $template, $email) {
		
		$this->Email->smtpOptions = array(
                'host' => 'mail.ipsitasoft.com',
			'port' => '25',
			'username' => 'institution@ipsitasoft.com',
    		'password' => 'S}*fi[y;%ov2'
           );
	           
        $this->Email->delivery='smtp';
        $this->Email->send = 'debug';
		$this->Email->to = $email;
		$this->Email->from = 'institution@ipsitasoft.com';
		$this->Email->subject = 'AEEA Club Tennis Court Reservation';
		$this->Email->template = $template;
		$this->Email->sendAs = 'html';
		$this->set ( 'data', $data );
		$this->Email->send ();
		
	
	}
	
	public function userguide(){
		
	}
	public function rules() {

	}
	

}