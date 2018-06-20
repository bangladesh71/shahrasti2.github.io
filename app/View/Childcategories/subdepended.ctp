
<?php
	echo $this->Form->input('Subcategory.childcategory_id',array('onchange'=>'deg_cat(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$degtIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
