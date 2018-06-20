<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator','Cms','Email');

/**
 * index method
 *
 * @return void
 */
	///monir
 public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add','signup','activep', 'fp');
    }
    
    //monir
	public function index() {
		$this->User->recursive = 0;
		
		$conditions = array();
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->request->data['Report'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			$filter_url['page'] = 1;
			foreach($this->request->data['Report'] as $name => $value){
				if($value){
					$filter_url[$name] = trim($value);
				}
			}	
			return $this->redirect($filter_url);
		} else {
			foreach($this->params['named'] as $param_name => $value){
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					if($param_name == "role") {
						 $conditions['User.'.$param_name] = $value;
					}else {
						 $conditions['User.'.$param_name] = $value;
					}				
					$this->request->data['Report'][$param_name] = $value;
				}
			}
		}
		
		$this->paginate = array(
			'limit' => 20,
			'conditions' => $conditions
			
		);
		$this->set('users', $this->paginate());
		
	}
	
	public function dashboard() {
	
	        $this->loadModel('Booking');
	    
	
		$c_date=date('Y-m-d');
			$settings=$this->getSettings();
			$extcheckin="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.checkIn=1 AND Booking.status=1";
			
			$noshowfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=2";
			$trainerfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.trainee_id>0 AND Booking.checkOut=1";
			$racquetfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.racquet=1 AND Booking.checkOut=1";
			
			$cashnoshowfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=2 AND Booking.paymentType=2";
			$cashtrainerfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.trainee_id>0 AND Booking.paymentType=2 AND Booking.checkOut=1";
			$cashracquetfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.racquet=1 AND Booking.paymentType=2 AND Booking.checkOut=1";
		
	
		$checkins = $this->Booking->find('all',array('conditions'=>$extcheckin,'recursive'=>-1,'fields'=>'COUNT(Booking.checkIn) AS checkIn'));
	
		$noshowfees = $this->Booking->find('all',array('conditions'=>$noshowfee,'recursive'=>-1,'fields'=>array('Booking.created','Booking.modified','Booking.slot')));
		$trainerfees = $this->Booking->find('all',array('conditions'=>$trainerfee,'recursive'=>-1,'fields'=>'COUNT(Booking.trainee_id) AS trainee_id'));
		$racquetfees = $this->Booking->find('all',array('conditions'=>$racquetfee,'recursive'=>-1,'fields'=>'COUNT(Booking.racquet) AS racquet'));
		
		$cashnoshowfees = $this->Booking->find('all',array('conditions'=>$cashnoshowfee,'recursive'=>-1,'fields'=>array('Booking.created','Booking.modified','Booking.slot')));
		$cashtrainerfees = $this->Booking->find('all',array('conditions'=>$cashtrainerfee,'recursive'=>-1,'fields'=>'COUNT(Booking.trainee_id) AS trainee_id'));
		$cashracquetfees = $this->Booking->find('all',array('conditions'=>$cashracquetfee,'recursive'=>-1,'fields'=>'COUNT(Booking.racquet) AS racquet'));
		
		
		$night=$settings['Setting']['nightShiftstartTime'];

		$totalbook="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1";
		$totalprime="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.slot='Prime'";
		$totalnonprime="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.slot='Non-Prime'";
		$totalnoshowfee="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=2";
		$totalncancel="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=2";
		
		$totalday="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.time<'$night'";
		
		$week = $this->getWeek();
		$this->loadModel('Tennise');
	
		$tennises=$this->Tennise->find('all',array('conditions'=>array('Tennise.weeks'=>$week),'fields'=>'COUNT(Tennise.id) AS tennis'));
		
		$total_days=1;
		
		$tennisesNonbooks=$tennises[0][0]['tennis']*$total_days;
		
		$totalbooks = $this->Booking->find('all',array('conditions'=>$totalbook,'recursive'=>-1,'fields'=>'COUNT(Booking.id) AS id'));
		$totalprimes = $this->Booking->find('all',array('conditions'=>$totalprime,'recursive'=>-1,'fields'=>'COUNT(Booking.slot) AS Prime'));
	
		$totalnonprimes = $this->Booking->find('all',array('conditions'=>$totalnonprime,'recursive'=>-1,'fields'=>'COUNT(Booking.slot) AS NonPrime'));
		
		$totalnoshowfees = $this->Booking->find('all',array('conditions'=>$totalnoshowfee,'recursive'=>-1,'fields'=>array('Booking.created','Booking.modified','Booking.slot')));
		
		$totalncancels = $this->Booking->find('all',array('conditions'=>$totalncancel,'recursive'=>-1,'fields'=>'COUNT(Booking.status) AS cancel'));
		
		$totaldays = $this->Booking->find('all',array('conditions'=>$totalday,'recursive'=>-1,'fields'=>'COUNT(Booking.status) AS days'));
		
		$this->set(compact('totalbooks','totalprimes','totalnonprimes','totalnoshowfees','totalncancels','totaldays','tennisesNonbooks'));
		
		$this->set(compact('checkins','noshowfees','trainerfees','racquetfees','cashnoshowfees','cashtrainerfees','cashracquetfees'));
		
		$extcheckinr="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.checkIn=1 AND Booking.status=1";
		$noshowfeer="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=2";
		$trainerfeer="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.trainee_id>0 AND Booking.checkOut=1";
		$racquetfeer="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.racquet=1 AND Booking.checkOut=1";
		$totaldayr="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.time<'$night' AND Booking.checkOut=1";
		$totalnightr="DATE_FORMAT(Booking.created,'%Y-%m-%d')='".$c_date."' AND Booking.status=1 AND Booking.time>='$night' AND Booking.checkOut=1";

		$checkinsr = $this->Booking->find('all',array('conditions'=>$extcheckinr,'recursive'=>-1,'fields'=>'COUNT(Booking.checkIn) AS checkIn'));
		$noshowfeesr = $this->Booking->find('all',array('conditions'=>$noshowfeer,'recursive'=>-1,'fields'=>array('Booking.created','Booking.modified','Booking.slot')));
		$trainerfeesr = $this->Booking->find('all',array('conditions'=>$trainerfeer,'recursive'=>-1,'fields'=>'COUNT(Booking.trainee_id) AS trainee_id'));
		$racquetfeesr = $this->Booking->find('all',array('conditions'=>$racquetfeer,'recursive'=>-1,'fields'=>'COUNT(Booking.racquet) AS racquet'));
		$totaldaysr = $this->Booking->find('all',array('conditions'=>$totaldayr,'recursive'=>-1,'fields'=>'COUNT(Booking.status) AS days'));
		$totalnightsr = $this->Booking->find('all',array('conditions'=>$totalnightr,'recursive'=>-1,'fields'=>'COUNT(Booking.status) AS nights'));
		
		$this->set(compact('totalbooksr','checkinsr','noshowfeesr','trainerfeesr','racquetfeesr','totaldaysr','totalnightsr'));
	    }

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();

			if ($this->User->save($this->request->data)) {
				$id = $this->User->getInsertID ();
				
				if (!empty($this->request->data ['User'] ['photo'] ['tmp_name'])) {
					$this->Cms->uploadImage ( $this->request->data ['User'] ['photo'], $id, 'u', 150, 180 );
						
				}
				//$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		}
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
	}

	public function edit($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->User->save($this->request->data)) {

				if (!empty($this->request->data['User']['photo']['tmp_name'])) {
					$this->Cms->uploadImage ( $this->request->data['User'] ['photo'], $id, 'u', 150, 180 );

				}
				//$this->Session->setFlash(__('The user has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
	}


	public function signup(){
		
		$this->layout="login";
		if ($this->request->is('post')) {
			
			$this->User->Member->checkMember();
			$membershipid=$this->User->Member->checkMember(trim($this->request->data['User']['memberid']));
			$data=$this->request->data;
			$message="Welcome to AEEA Club Online Tennis and Squash Reservation System. 
			Please review the User Guide to learn how to use the system to make your reservations
			Please also review the Rules and Regulations governing the usage of our tennis courts and squash court. 
			Thanks you.";
						
			if(!empty($membershipid['Member']['id'])){
				$this->User->create();
				
				$this->request->data['User']['member_id']=$membershipid['Member']['id'];
				
				$this->request->data['User']['status']=1;
				$this->request->data['User']['username']=$this->request->data['User']['email'];
				$this->request->data['User']['role']=4;
				if ($this->User->save($this->request->data)) {
					
					$this->_sendSignupmsg ( $data, 'fpass', $message );
					
					$this->Session->setFlash(__('The user has been saved.'));
					return $this->redirect(array('action' => 'login'));
				} else {
					$this->Session->setFlash(__('Your email or membership ID already taken.'));
					return $this->redirect(array('action' => 'login'));
				}
			}else{
				$this->Session->setFlash(__('The user membership ID not correct.'));
				
				return $this->redirect(array('action' => 'login'));
			}
			
		}
		$members = $this->User->Member->find('list');
		$this->set(compact('members'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */


/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->User->delete()) {
			//$this->Session->setFlash(__('The user has been deleted.'));
		} else {
			$this->Session->setFlash(__('The user could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
		///monir
	public function login() {
		
		$this->layout="login";
	    if ($this->request->is('post')) {
	    	$checkUser=$this->User->checkUserRole(trim($this->request->data['User']['username']));
	    	
	        if ($this->Auth->login()) {
		        if(!empty($checkUser)){
		    		if($checkUser['User']['role']==3){
		    			return $this->redirect(array('controller'=>'entryforms', 'action'=>'add'));
		    		}else{
		    			return $this->redirect(array('action' => 'dashbrd'));
		    		}
		    	}
	            
	        }
	        
	        $this->Session->setFlash(__('Invalid username or password, try again'));
	    }
	}
	
	public function logout() {
		return $this->redirect(array('action' => 'login'));
	}
	
	public function fp() {
		
		$this->layout = 'login';
		
		if ($this->request->is ( 'post' )) {
			$this->User->set ( $this->request->data );
			if ($this->User->LoginValidate ()) {
				$data = $this->request->data ['User'] ['email'];
				$user = $this->User->find ( 'first', array ('recursive' => - 1, 'conditions' => array ("BINARY User.email='" . $data . "'" ) ) );
				
				if (empty ( $user['User']['id'] )) {
					$this->Session->setFlash ( __ ( 'Incorrect Email' ) );
					return;
				}
				$userId = $user['User']['id'];
				// check for inactive account
				$pass = $this->User->getActivationKey($user['User']['password'] );
				//$pass = $this->Auth->password ( $user [0] ['User'] ['password'] );
				$link = Router::url ( "/users/activep/$userId/$pass", true );
				
				if ($user['User']['id']) {
					if ($this->_sendFpassword ( $data, 'fpass', $link )) {
						$this->Session->setFlash ( __ ( 'Please check your mail for reset your password' ) );
						$this->redirect ( array ('action' => 'login' ) );
					} else {
						$this->Session->setFlash ( 'Please try again.', 'default', array ('class' => 'message' ) );
					}
				}
			}
		}
	}
	
	private function _sendFpassword($data, $template, $link) {
		
		$this->Email->smtpOptions = array(
                'host' => 'mail.ipsitasoft.com',
			'port' => '25',
			'username' => 'institution@ipsitasoft.com',
    		'password' => 'S}*fi[y;%ov2'
           );
	           
        $this->Email->delivery='smtp';
        $this->Email->send = 'debug';
		$this->Email->to = $data;
		$this->Email->from = 'institution@ipsitasoft.com';
		$this->Email->subject = 'please clik the link for password reset';
		
		//$this->Email->template = $template;
		
		//$this->Email->sendAs = 'html';

		//$p = $this->set ( 'p', $data );
		
		if ($this->Email->send ($link)) {
			return true;
		} else {
			return false;
		}
	
	}
	private function _sendSignupmsg($data, $template, $message) {
		
		$this->Email->smtpOptions = array(
                'host' => 'mail.ipsitasoft.com',
			'port' => '25',
			'username' => 'institution@ipsitasoft.com',
    		'password' => 'S}*fi[y;%ov2'
           );
	           
        $this->Email->delivery='smtp';
        $this->Email->send = 'debug';
		$this->Email->to = $data['User']['email'];
		$this->Email->from = 'institution@ipsitasoft.com';
		$this->Email->subject = 'Welcome to AEEA Club Tennis Court Reservation System';
		
		//$this->Email->template = $template;
		
		//$this->Email->sendAs = 'html';

		//$p = $this->set ( 'p', $data );
		
		if ($this->Email->send ($message)) {
			return true;
		} else {
			return false;
		}
	
	}
	public function activep() {
	
		 if(!empty($this->params['pass'][0])){
		 	$indent=$this->params['pass'][0];
		 }
	   if(!empty($this->params['pass'][1])){
		 	 $active=$this->params['pass'][1];
		 }
		   
		$this->layout = 'login';
		
		if ($this->request->is ( 'post' )) {
			if (! empty ( $this->request->data  ['User'] ['ident'] ) && ! empty ( $this->request->data  ['User'] ['ident'] )) {
				$this->set ( 'ident', $this->request->data  ['User'] ['ident'] );
				$this->set ( 'activate', $this->request->data  ['User'] ['activate'] );
				$this->User->set ( $this->request->data );
				if ($this->User->RegisterValidate ()) {
					$userId = $this->request->data  ['User'] ['ident'];
					$activateKey = $this->request->data  ['User'] ['activate'];
					
					$user = $this->User->read ( null, $userId );
					
					if (! empty ( $user )) {
						$password = $user ['User'] ['password'];
						$thekey = $this->User->getActivationKey ( $password );
		                
						if ($thekey == $activateKey) {
						
							$this->User->save ( $this->request->data);
							$this->Session->setFlash ( __ ( 'Your password has been reset successfully' ) );
							$this->redirect ( '/admin' );
						} else {
							$this->Session->setFlash ( __ ( 'Something went wrong, please send password reset link again' ) );
						}
					} else {
						$this->Session->setFlash ( __ ( 'Something went wrong, please click again on the link in email' ) );
					}
				}
			} else {
				$this->Session->setFlash ( __ ( 'Something went wrong, please click again on the link in email' ) );
			}
		} else {
			if (isset ( $indent ) && isset ( $active )) {
				$this->set ( 'ident', $indent );
				$this->set ( 'activate', $active );
			}
		}
	}

	public function news (){

	}

	public function dashbrd (){
		$this->loadModel('Entryform');
		$pending = $this->Entryform->find('count', array(
			'conditions' => array('Entryform.status' => '1'),
		));

		$working = $this->Entryform->find('count', array(
			'conditions' => array('Entryform.status' => '2'),
		));

		$done = $this->Entryform->find('count', array(
			'conditions' => array('Entryform.status' => '3'),
		));

		$onedayadv = date('Y-m-d', strtotime("+1 days"));


		$currentdate = date("Y-m-d");

		$lastday = $this->Entryform->find('count', array(
			'conditions' => array('Entryform.deadline' => $onedayadv ),
		));

		$expiredate = $this->Entryform->find('count', array(
			'conditions' => array('Entryform.deadline <' => $currentdate ),
		));


		$monthpending = $this->Entryform->find('count', array('conditions' => array('Entryform.status' => '1'),
		));

		$monthworking = $this->Entryform->find('count', array('conditions' => array('Entryform.status' => '2'),
		));


		$monthdone = $this->Entryform->find('count', array('conditions' => array('Entryform.status' => '3','MONTH(Entryform.created)' => date('n')),
		));


		//$lastday = $this->Entryform->find('all',array('fields'=>'deadline'));
		$this->loadModel('Maincategory');
		$maincat = $this->Maincategory->find('all',array('fields'=>'Maincategory.name', 'recursive'=>-1));

		//pr($maincat);

		$this->set(compact('maincat','pending','working','done','lastday','expiredate','monthpending','monthworking','monthdone'));

		$entryforms =  $this->Entryform->find('all', array('limit' => 5,'order' => array('Entryform.id' => 'DESC'),
			'conditions' => array('Entryform.deadline <' => $currentdate ),
		));



		$this->set(compact('entryforms', $this->Paginator->paginate()));
	}

	public function graph(){

	}


}
