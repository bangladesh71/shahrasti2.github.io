
<?php
	echo $this->Form->input('Entryform.designation_id',array('onchange'=>'drop_cat(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childSubCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
