
<?php
	echo $this->Form->input('Entryform.childcategory_id',array('onchange'=>'sub_cat(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childCatIds,'empty' => array(-1=> '--select--'),'label'=>false));
?>
