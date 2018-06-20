<div class="babosthas form">
<?php echo $this->Form->create('Babostha'); ?>
	<fieldset>
		<legend><?php echo __('Edit Babostha'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('entryform_id');
		echo $this->Form->input('subcategory_id');
		echo $this->Form->input('childcategory_id');
		echo $this->Form->input('maincategory_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Babostha.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Babostha.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Babosthas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Entryforms'), array('controller' => 'entryforms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entryform'), array('controller' => 'entryforms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
