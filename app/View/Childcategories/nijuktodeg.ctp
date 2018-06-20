
<?php
	echo $this->Form->input('Entryform.designation_id',array('onchange'=>'name_nijukto(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childSubCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
