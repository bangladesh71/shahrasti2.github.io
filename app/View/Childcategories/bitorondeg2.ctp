
<?php
	echo $this->Form->input('Babostha.1.designation_id',array('onchange'=>'name_bitoron2(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childSubCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
