
<?php
	echo $this->Form->input('childcategory_id',array('onchange'=>'deg_cat(this.value)','class'=>'form-group form-control inputcon','type'=>'select','options'=>$degtIds,'empty' => '--Child category--','label'=>false));
?>

