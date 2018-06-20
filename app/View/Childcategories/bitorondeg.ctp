
<?php
	echo $this->Form->input('Babostha.0.designation_id',array('onchange'=>'name_bitoron(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childSubCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
