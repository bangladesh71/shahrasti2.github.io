<div class="contenttypes form">
<?php echo $this->Form->create('Contenttype'); ?>
	<fieldset>
		<legend><?php echo __('Add Contenttype'); ?></legend>
	<?php
		echo $this->Form->input('name',array('label'=>'Name','class'=>'form-control'));
		echo $this->Form->input('slug');
		echo $this->Form->input('ctype');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>

