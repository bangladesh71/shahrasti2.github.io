<div class="contentimages index">
	<h2><?php echo __('Contentimages'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('content_id'); ?></th>
			<th><?php echo $this->Paginator->sort('imgTitle'); ?></th>
			<th><?php echo $this->Paginator->sort('imgTxt'); ?></th>
			<th><?php echo $this->Paginator->sort('imgTitlebn'); ?></th>
			<th><?php echo $this->Paginator->sort('imgTxtbn'); ?></th>
			<th><?php echo $this->Paginator->sort('order'); ?></th>
			<th><?php echo $this->Paginator->sort('is_home'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($contentimages as $contentimage): ?>
	<tr>
		<td><?php echo h($contentimage['Contentimage']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($contentimage['Content']['title'], array('controller' => 'contents', 'action' => 'view', $contentimage['Content']['id'])); ?>
		</td>
		<td><?php echo h($contentimage['Contentimage']['imgTitle']); ?>&nbsp;</td>
		<td><?php echo h($contentimage['Contentimage']['imgTxt']); ?>&nbsp;</td>
		<td><?php echo h($contentimage['Contentimage']['imgTitlebn']); ?>&nbsp;</td>
		<td><?php echo h($contentimage['Contentimage']['imgTxtbn']); ?>&nbsp;</td>
		<td><?php echo h($contentimage['Contentimage']['order']); ?>&nbsp;</td>
		<td><?php echo h($contentimage['Contentimage']['is_home']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $contentimage['Contentimage']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $contentimage['Contentimage']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $contentimage['Contentimage']['id']), array(), __('Are you sure you want to delete # %s?', $contentimage['Contentimage']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Contentimage'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
