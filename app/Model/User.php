<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 * @property Member $Member
 */


class User extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'mobileNo' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email'=>array(
			'Valid email'=>array(
				'rule'=>array('email'),
				'message'=>'Please enter a valid email address'
			),
			'This email address is already taken'=>array(
				'rule'=>'isUnique',
				'message'=>'This email address is already taken.'
			)
		),
		'username'=>array(
			'This username is already taken'=>array(
				'rule'=>'isUnique',
				'message'=>'This username is already taken.'
			)
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'status' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Member' => array(
			'className' => 'Member',
			'foreignKey' => 'member_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	public function LoginValidate() {
		$validate1 = array ('email' => array ('mustNotEmpty' => array ('rule' => 'notEmpty', 'message' => 'Please enter email or username' ) ), 'password' => array ('mustNotEmpty' => array ('rule' => 'notEmpty', 'message' => 'Please enter password' ) ) );
		$this->validate = $validate1;
		return $this->validates ();
	}
	public function RegisterValidate() {
		$validate2 = array (
		'password' => array (
		'mustNotEmpty' => array ('rule' => 'notEmpty', 'message' => 'Please enter password', 'on' => 'create', 'last' => true ),
	    'mustBeLonger' => array ('rule' => array ('minLength', 6 ), 'message' => 'Password must be greater than 5 characters', 'on' => 'create', 'last' => true ),
		'Check Match' => array ('rule' => 'confirmPassword', 'message' => 'Both passwords must match' ) ),
		'cpassword' => array ('Not empty' => array ('rule' => 'notEmpty', 'message' => 'Please confirm your password' ) )
		
		)//'on' => 'create'
;
		$this->validate = $validate2;
		return $this->validates ();
	}

	public function confirmPassword() {
       $hash = $this->data[$this->alias]['cpassword'];
       if($this->data[$this->alias]['password'] == $hash) {
            return true;
          }
          return false;
       } 
	public function getActivationKey($password) {
		$salt = Configure::read ( "Security.salt" );
		return md5 ( md5 ( $password ) . $salt );
	}
	public function beforeSave($options=array()) {
	    if (isset($this->data['User']['password'])) {
	        $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
	    }
	    return true;
	}
	public function checkUserRole($username=null){
		$data = $this->find('first',array('conditions'=>array('User.username'=>$username),'recursive'=>-1,'fields'=>array('User.role')));
	    return $data;
		
	}

	public $hasMany = array(
		'Entryform' => array(
			'className' => 'Entryform',
			'foreignKey' => 'user_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
}
