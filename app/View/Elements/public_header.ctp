<style>
<!--
.p {
  font-size: 22px;
  margin: 0;
}
-->
</style>
<div class="row top-bar">
	<div class="col-md-6 mar-tobo-left">
		<p class="p">ONLINE TENNIS AND SQUASH BOOKING SYSTEM</p>		
		
	</div>
	<div class="col-md-6 mar-tobo-right">
		<i class="glyphicon glyphicon-earphone"></i> <span style="margin: 0 5px">+ 88 02 8821025-27</span> 
		<i class="glyphicon glyphicon-envelope"></i> <span style="margin: 0 5px">For Questions write to : Info@AEEADhaka.org</span>  
		<?php if(!empty($logged_in)){
		 echo $this->Html->link('<i class="glyphicon glyphicon-log-out"></i> Log Out',array('controller'=>'users','action'=>'logout'),array('escape'=>false,'class'=>'btn btn-danger','style'=>'width:auto !important;'));
		 }else{
		 	echo $this->Html->link('<i class="glyphicon glyphicon-log-in"></i> Log In',array('controller'=>'users','action'=>'login'),array('escape'=>false,'class'=>'btn btn-success','style'=>'width:auto !important;'));
		 }
		 
		 ?>
	</div>
</div>
