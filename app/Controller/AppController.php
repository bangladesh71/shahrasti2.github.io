<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */

	
class AppController extends Controller {
	public $helpers=array('Html','Form','Session');
	public $type = array ('1' => 'Main Category', '2' => 'Sub Category', '3' => 'Union' );
	public $ward = array('1'=>'১', '2'=>'২', '3'=>'৩', '4'=>'৪', '5'=>'৫', '6'=>'৬', '7'=>'৭', '8'=>'৮', '9'=>'৯', '10'=>'১০');
	public $hw = array ('pages' => array ('', 800 ), 'slider' => array (450, 1160 ), 'about' => array (300, 250 ), 'sponsor' => array (90, 90 ), 'newsfeeds' => array (350, 650 ), 'newsletters' => array ('', 800 ), 'quotes' => array (250, 200 ), 'photogallery' => array (350, 650 ), 'events' => array ('', 800 ), 'notice' => array ('', 800 ), 'stream' => array (120, 95 ), 'academic' => array (120, 95 ), 'library' => array (120, 95 ), 'breakingnews' => array (120, 95 ), 'archive' => array (120, 95 ), 'classifiedpage' => array (450, 850 ), 'videogallery' => array (450, 850 ) );
	public $status=array('1'=>'Pending','2'=>'Working','3'=>'Done');
	public $ovijogkari=array('1'=>'হ্যাঁ','2'=>'না');
	public $bitoron=array('1'=>'না','2'=>'হ্যাঁ');
	public $ustatus=array('1'=>'Active','2'=>'Inactive');
	public $role=array('1'=>'Super Admin','2'=>'Admin','3'=>'Employee');
	public $paytype=array('1'=>'Cash','2'=>'Account');
	public $tennisType=array('1'=>'Tennis Court-1','2'=>'Tennis Court-2');
	public $membertype=array('1'=>'General','2'=>'Full');
	public $components = array(
	    'Session',
	    'Auth' => array(
	        'loginRedirect' => array('controller' => 'pages', 'action' => 'index'),
	        'logoutRedirect' => array(
	            'controller' => 'pages',
	            'action' => 'index'
	        )
	    )
	);


    public function beforeFilter() {
        //$this->Auth->allow('index', 'view');
        
    	$this->set ( 'logged_in', $this->Auth->loggedIn() );
		$this->set('logged_user',$this->Auth->user('id'));
		$this->set ( 'current_user', $this->Auth->user() );
		$this->set ( 'array_type', $this->type );
		$this->set ( 'role', $this->role );
		$this->set ( 'ovijogkari', $this->ovijogkari );
		$this->set ( 'bitoron', $this->bitoron );
		$this->set ( 'status', $this->status );
		$this->set ( 'ustatus', $this->ustatus );
		$this->set ( 'ward', $this->ward );
		$this->set ( 'membertype', $this->membertype );
		$this->set ('menu_data', $this->getMenu(1));
		$this->set ('menu_data2', $this->getMenu(2));
		$this->set ( 'tennisType',$this->tennisType);
		$this->set ( 'settings',$this->getSettings());
    }


    
	public function getMenu($type=null){
		$this->loadModel('Menu');
		$data = $this ->Menu ->find(
				'threaded',
				array(
						'recursive' =>-1,
						'fields' => array(
								'Menu.id',
								'Menu.parent_id',
								'Menu.name',
								'Menu.slug',
								'Menu.url',
								'Menu.type'
						),
						'conditions'=>array('Menu.status'=>1,'Menu.menu_type'=>$type),
						'order' => array('Menu.order')
				)
		);
		return $data;
		
	}
	public function getSettings(){
		$this->loadModel('Setting');
		$data = $this ->Setting ->find(
				'first'
		);
		return $data;
		
	}
	
	public function getWeek(){
		$date_day=date('d')+2;
		$c_day=date('d');
		$last_day=date('t');
		
		if($last_day>=$date_day){
			$date_string=date('Y-m-'.$date_day);
		}else{
			$date_month=date('m')+1;
			if($last_day==$c_day){
				$date_string=date('Y-'.$date_month.'-02');
			}else{
				$date_string=date('Y-'.$date_month.'-01');
			}
			
		}
		
		$date = new DateTime($date_string);
		$week = $date->format("W");
		
		return $week;
		
	}

}

