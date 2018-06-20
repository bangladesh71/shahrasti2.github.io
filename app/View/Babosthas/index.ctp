<div class="babosthas index">
	<h2><?php echo __('Babosthas'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('entryform_id'); ?></th>
			<th><?php echo $this->Paginator->sort('subcategory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('childcategory_id'); ?></th>
			<th><?php echo $this->Paginator->sort('maincategory_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($babosthas as $babostha): ?>
	<tr>
		<td><?php echo h($babostha['Babostha']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($babostha['Entryform']['name'], array('controller' => 'entryforms', 'action' => 'view', $babostha['Entryform']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($babostha['Subcategory']['id'], array('controller' => 'subcategories', 'action' => 'view', $babostha['Subcategory']['id'])); ?>
		</td>
		<td><?php echo h($babostha['Babostha']['childcategory_id']); ?>&nbsp;</td>
		<td><?php echo h($babostha['Babostha']['maincategory_id']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $babostha['Babostha']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $babostha['Babostha']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $babostha['Babostha']['id']), null, __('Are you sure you want to delete # %s?', $babostha['Babostha']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Babostha'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Entryforms'), array('controller' => 'entryforms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entryform'), array('controller' => 'entryforms', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
