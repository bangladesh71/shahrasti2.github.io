
<?php
	echo $this->Form->input('Babostha.9.childcategory_id',array('onchange'=>'sub_bitoron10(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
