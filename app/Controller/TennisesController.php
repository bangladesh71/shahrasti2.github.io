<?php
App::uses('AppController', 'Controller');
/**
 * Tennises Controller
 *
 * @property Tennise $Tennise
 * @property PaginatorComponent $Paginator
 */
class TennisesController extends AppController {
	

	 public function beforeFilter() {
        parent::beforeFilter();
        
        $this->Auth->allow('tenniscourt','nexttenniscourt');
    	
		
    }

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Email');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tennise->recursive = 0;
		$this->set('tennises', $this->Tennise->find('all'));
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('id','name')));
		$this->set(compact('slots'));
	}
	
	public function tenniseSettings($type=null){
		$this->loadModel('Tennissetting');
		$data = $this->Tennissetting->find(
				'all',array('conditions'=>array('Tennissetting.type'=>$type))
		);
		return $data;
		
	}
	
	public function tenniscourt($type=null) {

		$this->layout = 'public';
		
		if(!empty($_REQUEST['id'])){
			$this->layout=false;
			$this->loadModel('Booking');
			$tennise=$this->Booking->find('first',array('conditions'=>array('Booking.tennise_id'=>$_REQUEST['id'],'Booking.tid'=>$_REQUEST['tid'],'Booking.status'=>1),'recursive'=>1));
			$this->set('tennise',$tennise);
		    $this->render('accountinfo');
		    return true;
		}
		
		$this->Tennise->recursive = 0;
		$week = $this->getWeek();

		
	//refresh tennise
		$preweek=$week-1;
		$nextweek=$week+1;

		
		$tennise=$this->Tennise->find('first',array('conditions'=>array('Tennise.weeks'=>$preweek,'Tennise.type'=>$type)));
		
		$t1=$this->tenniseSettings($type);
		if(!empty($tennise['Tennise']['weeks'])){
			if($tennise['Tennise']['weeks']==$preweek){
				
				$this->Tennise->query("DELETE FROM tennises WHERE weeks=$preweek AND type='".$type."'");
				
				foreach($t1 as $key=>$data){
					$this->request->data['Tennise']['time']=$data['Tennissetting']['time'];
					$this->request->data['Tennise']['sat']=$data['Tennissetting']['sat'];
					$this->request->data['Tennise']['sun']=$data['Tennissetting']['sun'];
					$this->request->data['Tennise']['mon']=$data['Tennissetting']['mon'];
					$this->request->data['Tennise']['tue']=$data['Tennissetting']['tue'];
					$this->request->data['Tennise']['wed']=$data['Tennissetting']['wed'];
					$this->request->data['Tennise']['thu']=$data['Tennissetting']['thu'];
					$this->request->data['Tennise']['fri']=$data['Tennissetting']['fri'];
					$this->request->data['Tennise']['weeks']=$nextweek;
					$this->request->data['Tennise']['type']=$data['Tennissetting']['type'];
					$this->request->data['Tennise']['status']=$data['Tennissetting']['status'];
					$this->request->data['Tennise']['created']=$data['Tennissetting']['created'];
					$this->request->data['Tennise']['modified']=$data['Tennissetting']['modified'];
			
					$this->Tennise->create();
					$this->Tennise->save($this->request->data);
					
					
				}
			
			}
		}
		
		
		$this->set('tennises', $this->Tennise->find('all',array('conditions'=>array('Tennise.type'=>$type,'Tennise.weeks'=>$week),'order'=>'Tennise.time ASC')));
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('id','name')));
		$this->set(compact('slots'));
	}
	
	public function nexttenniscourt($type=null) {
		
		$weekDays=array('Saturday'=>'1','Sunday'=>'2','Monday'=>'3','Tuesday'=>'4','Wednesday'=>'5','Thursday'=>'6','Friday'=>'7');
		
		if($weekDays[date('l')]!=7){
			 $c_time=date('H');
			 if($weekDays[date('l')]==7){
				 if($c_time>15){
				 		return $this->redirect($this->Auth->logout());
				 }
			 }else{
			 	return $this->redirect($this->Auth->logout());
			 }
			 
		
		}
		
		$this->layout = 'public';
		
		if(!empty($_REQUEST['id'])){
			$this->layout=false;
			$this->loadModel('Booking');
			$tennise=$this->Booking->find('first',array('conditions'=>array('Booking.tennise_id'=>$_REQUEST['id'],'Booking.tid'=>$_REQUEST['tid'],'Booking.status'=>1),'recursive'=>1));
			$this->set('tennise',$tennise);
		    $this->render('nextaccountinfo');
		    return true;
		}
		
		$this->Tennise->recursive = 0;
		$week = $this->getWeek()+1;
	
		$this->set('tennises', $this->Tennise->find('all',array('conditions'=>array('Tennise.type'=>$type,'Tennise.weeks'=>$week),'order'=>'Tennise.time ASC')));
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('id','name')));
		$this->set(compact('slots'));
	}
	
	
	public function tenniscourtadmin($type=null) {

		$this->Tennise->recursive = 0;
		
		$week = $this->getWeek();
		
		$this->set('tennises', $this->Tennise->find('all',array('conditions'=>array('Tennise.type'=>$type,'Tennise.weeks'=>$week))));
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('id','name')));
		$this->set(compact('slots'));
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tennise->exists($id)) {
			throw new NotFoundException(__('Invalid tennise'));
		}
		$options = array('conditions' => array('Tennise.' . $this->Tennise->primaryKey => $id));
		$this->set('tennise', $this->Tennise->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			
			$week = $this->getWeek();
		
			$this->request->data['Tennise']['weeks']=$week;
			$this->Tennise->create();
			if ($this->Tennise->save($this->request->data)) {
				$this->Session->setFlash(__('The tennise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tennise could not be saved. Please, try again.'));
			}
		}
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('name','name')));
		$this->set(compact('slots'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Tennise->exists($id)) {
			throw new NotFoundException(__('Invalid tennise'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tennise->save($this->request->data)) {
				$this->Session->setFlash(__('The tennise has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tennise could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tennise.' . $this->Tennise->primaryKey => $id));
			$this->request->data = $this->Tennise->find('first', $options);
		}
		
		$this->loadModel('Slot');
		$slots = $this->Slot->find('list',array('fields'=>array('name','name')));
		$this->set(compact( 'slots'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Tennise->id = $id;
		if (!$this->Tennise->exists()) {
			throw new NotFoundException(__('Invalid tennise'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tennise->delete()) {
			$this->Session->setFlash(__('The tennise has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tennise could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function bookingcancel($id = null) {
		$this->layout='ajax';
		if(!empty($_REQUEST['id'])){
			$this->loadModel('Booking');
			$this->loadModel('Setting');
			
			$settings = $this->Setting->find('first');
			$val=$this->Booking->find('first',array('conditions' =>
			array('Booking.tid' =>$_REQUEST['tid']),
			'recursive' => 1));
		
			$days=array('1'=>'sat','2'=>'sun','3'=>'mon','4'=>'tue','5'=>'wed','6'=>'thu','7'=>'fri');
		
			$field=$days[$val['Booking']['day']];
			$date=date('Y-m-d H:i:s');
		
			
			if(!empty($val)){
				
				$t1 = strtotime (date('Y-m-d H:i:s',strtotime($val['Booking']['created'])));
				$t2 = strtotime ( date('Y-m-d H:i:s'));
				$diff = $t1 - $t2;
				$hours = ceil($diff/(60*60));
				
				$dates =date('Y-m-d H:i:s',strtotime($val['Booking']['created']));
				$trainer=0;
				$racket=0;
				$noshowfee=0;
				$slot=0;
				$member_id=$val['Booking']['member_id'];
				
				if($hours<=24){ 
					if($val['Booking']['slot']=='Prime'){
						$noshowfee=$settings['Setting']['noShowprime'];
					}elseif($val['Booking']['slot']=='Non-Prime'){
						$noshowfee=$settings['Setting']['noShownonprime'];
					}
				}
				
				if($noshowfee>0){
					$this->Booking->query("INSERT into feeinfos(feedate,member_id,trainee_id,slotFee,trainerFee,racketFee,noShowFee,paymentType)VALUES('". $dates."','". $member_id."','". $val['Booking']['trainee_id']."','". $slot."','". $trainer."','". $racket."','". $noshowfee."','". $val['Booking']['paymentType']."') ");
				}
				$this->Tennise->query("UPDATE bookings SET status='2',modified='". $date."' WHERE tid='". $_REQUEST['tid']."' AND status='1'");
				$this->Tennise->query("UPDATE tennises SET $field='".$val['Booking']['slot']."' WHERE id='". $_REQUEST['id']."'");
				
				
				$mailadmindata=array('day'=>$val['Booking']['day'],'datetime'=>$val['Booking']['created'],'type'=>$val['Booking']['type'],'noshowfee'=>$noshowfee);
		
				$this->_sendSignupmsg($mailadmindata, 'cancelbook', $this->Auth->user('email') );
				
				$this->Session->setFlash(__('Your reservation has been cancelled'));
			}
			
			
		}
	}
	private function _sendSignupmsg($data, $template, $email) {
		
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
		$this->Email->subject = 'Tennis Court Cancellation ';
		$this->Email->template = $template;
		$this->Email->sendAs = 'html';
		$this->set ( 'data', $data );
		$this->Email->send();
		
	
	}


}
