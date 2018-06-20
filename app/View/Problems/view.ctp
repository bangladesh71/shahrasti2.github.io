<div class="problems view">
<h2><?php echo __('Problem'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($problem['Problem']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Problem'), array('action' => 'edit', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Problem'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Problems'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Problem'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Entryforms'), array('controller' => 'entryforms', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Entryform'), array('controller' => 'entryforms', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Entryforms'); ?></h3>
	<?php if (!empty($problem['Entryform'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Cell No'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Category Id'); ?></th>
		<th><?php echo __('Problem Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($problem['Entryform'] as $entryform): ?>
		<tr>
			<td><?php echo $entryform['id']; ?></td>
			<td><?php echo $entryform['name']; ?></td>
			<td><?php echo $entryform['cell_no']; ?></td>
			<td><?php echo $entryform['address']; ?></td>
			<td><?php echo $entryform['category_id']; ?></td>
			<td><?php echo $entryform['problem_id']; ?></td>
			<td><?php echo $entryform['description']; ?></td>
			<td><?php echo $entryform['status']; ?></td>
			<td><?php echo $entryform['created']; ?></td>
			<td><?php echo $entryform['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'entryforms', 'action' => 'view', $entryform['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'entryforms', 'action' => 'edit', $entryform['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'entryforms', 'action' => 'delete', $entryform['id']), null, __('Are you sure you want to delete # %s?', $entryform['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Entryform'), array('controller' => 'entryforms', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
