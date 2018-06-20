<style>
.checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"], .radio input[type="radio"], .radio-inline input[type="radio"] {
  margin-left: 0px;
  position: absolute;
}
</style>
<?php
$array_types = array ( '9' => 'events','16'=>'classifiedpage'  );
$id = isset($this->data['Contenttype']['id'])? $this->data['Contenttype']['id']: 0;
if($id > 0){
	$btn = "Updated";
	$selected = json_decode($this->data['Contenttype']['ctype']);
}else{
	$btn = "Save";
	$selected = '';
}

?>
<div class="row">
	<div class="col-md-8">
		<?php echo $this->Form->create('Content',array('type'=>'file','class'=>'form-horizontal')); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('Category'); ?></strong></h3>
			</div>
			<div class="panel-body">
<?php echo $this->Form->create('Contenttype'); ?>
	<fieldset>
	
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name',array('class'=>'form-control'));
		echo $this->Form->input('ctype',array('multiple'=>'checkbox','options' =>$array_types, 'selected'=>$selected, 'label'=>'Type'))
	?>

	</fieldset>
<?php echo $this->Form->end(__($btn)); ?>
</div>
</div></div></div>

