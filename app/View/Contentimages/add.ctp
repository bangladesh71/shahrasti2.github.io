<div class="contentimages form">
<?php echo $this->Form->create('Contentimage'); ?>
	<fieldset>
		<legend><?php echo __('Add Contentimage'); ?></legend>
	<?php
		echo $this->Form->input('content_id');
		echo $this->Form->input('imgTitle');
		echo $this->Form->input('imgTxt');
		echo $this->Form->input('imgTitlebn');
		echo $this->Form->input('imgTxtbn');
		echo $this->Form->input('order');
		echo $this->Form->input('is_home');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Contentimages'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
