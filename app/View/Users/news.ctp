<?php

function pole()
{

$this->loadModel('Temptrip');
/*$conditions = array();

$summary = $this->Temptrip->find('first', array('conditions' => array('Temptrip.id' => $id)));
$first = date('Y-m-d:h-m', strtotime($summary['Temptrip']['created']));

//added this for debugging and the value is the date i want
$this->set('first', $first);

$last = date('Y-m-d:h-m', strtotime($summary['Temptrip']['created']));

//debugging, this works too
$this->set('last', $last);

$conditions = array("Temptrip.start >=" => "'".$first."'", "Temptrip.start <=" => "'".$last."'"

);
$this->set('events', $this->Event->find('all', array('conditions' => $conditions)));*/

/*if(!empty($this->request->data['Temptrip']['dailydatefrom']) && !empty($this->request->data['Temptrip']['dailydateto'])){
" AND DATE_FORMAT(Temptrip.created,'%Y-%m-%d') BETWEEN '".$this->request->data['Temptrip']['dailydatefrom']."' AND '".$this->request->data['Temptrip']['dailydateto']."'";
}elseif(!empty($this->request->data['Temptrip']['dailydatefrom'])){
" AND DATE_FORMAT(Temptrip.created,'%Y-%m-%d')='".$this->request->data['Temptrip']['dailydatefrom']."'";
}*/
$this->Temptrip->recursive = 0;
$this->set('temptrips', $this->Paginator->paginate());

$map = $this->Temptrip->find('all',array('fields'=>array('Distinct (from_area)'),'order' => 'Temptrip.id desc'));
$total = $this->Temptrip->find('all' , array('fields'=>array( 'Temptrip.from_area','COUNT(Temptrip.from_area) as total'),
'group'=>array('Temptrip.from_area')) );

$total2 = $this->Temptrip->find('all' , array('fields'=>array('COUNT(Temptrip.id) as total'),
'Distinct'=>array('Temptrip.from_area')) );

$first=$this->data['Temptrip']['first'];
$last=$this->data['Temptrip']['last'];

$first1= date('Ymd', strtotime($first));
$last2= date('Ymd', strtotime($last));
$date_time_search=$this->Temptrip->find('all',array('fields'=>array('Temptrip.from_area as search'),'conditions'=>array('Temptrip.created >=' => $first1,'Temptrip.created <=' => $last2)));
$date_time_search_count = $this->Temptrip->find('all' , array('fields'=>array('COUNT(Temptrip.from_area)as date_timesearch'),'conditions'=>array('Temptrip.created >=' => $first,'Temptrip.created <=' => $last),
'group'=>array('Temptrip.from_area'))) ;
//print_r($total);
$data = Set::combine($total,'{n}.Temptrip.from_area','{n}.0.total');
$this->set('temptrips', $data);
$this->set('date_time_search', $date_time_search);
$this->set('date_time_search_count', $date_time_search_count);
//$grandtotal=count($total);
//pr($first);
//pr($last);
//pr($date_time_search).'<br>';

//Get data from model
//Get the last 10 rounds for score graph
$rs = $this->Temptrip->find('first' , array ('fields' => array('MAX(Temptrip.from_area) as max_size')));

$this->set('minS', $rs[0]['max_size']);



//echo (($this->request->data['Temptrip']['dailydatefrom'])).'//';
//echo (($this->request->data['Temptrip']['dailydateto']));
}