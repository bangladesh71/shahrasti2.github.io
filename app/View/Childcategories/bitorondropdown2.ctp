
<?php
	echo $this->Form->input('Babostha.1.childcategory_id',array('onchange'=>'sub_bitoron2(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
