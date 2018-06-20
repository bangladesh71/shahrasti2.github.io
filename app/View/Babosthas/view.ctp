<div class="babosthas view">
<h2><?php echo __('Babostha'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($babostha['Babostha']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entryform'); ?></dt>
		<dd>
			<?php echo $this->Html->link($babostha['Entryform']['name'], array('controller' => 'entryforms', 'action' => 'view', $babostha['Entryform']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subcategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($babostha['Subcategory']['id'], array('controller' => 'subcategories', 'action' => 'view', $babostha['Subcategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Childcategory Id'); ?></dt>
		<dd>
			<?php echo h($babostha['Babostha']['childcategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maincategory Id'); ?></dt>
		<dd>
			<?php echo h($babostha['Babostha']['maincategory_id']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Babostha'), array('action' => 'edit', $babostha['Babostha']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Babostha'), array('action' => 'delete', $babostha['Babostha']['id']), null, __('Are you sure you want to delete # %s?', $babostha['Babostha']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Babosthas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Babostha'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entryforms'), array('controller' => 'entryforms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entryform'), array('controller' => 'entryforms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
