
<?php
	echo $this->Form->input('Entryform.subcategory_id',array('onchange'=>'drop_cat(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$childcategory,'empty' => array(-1=> '--select--'),'label'=>false));
?>
