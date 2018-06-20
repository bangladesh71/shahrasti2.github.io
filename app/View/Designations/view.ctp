<div class="designations view">
<h2><?php echo __('Designation'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($designation['Designation']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Designation'), array('action' => 'edit', $designation['Designation']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Designation'), array('action' => 'delete', $designation['Designation']['id']), null, __('Are you sure you want to delete # %s?', $designation['Designation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Designations'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Designation'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($designation['Category'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maincategory Id'); ?></th>
		<th><?php echo __('Subcategory Id'); ?></th>
		<th><?php echo __('Union Id'); ?></th>
		<th><?php echo __('Person Name'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Cell No'); ?></th>
		<th><?php echo __('Ward'); ?></th>
		<th><?php echo __('Others'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($designation['Category'] as $category): ?>
		<tr>
			<td><?php echo $category['id']; ?></td>
			<td><?php echo $category['maincategory_id']; ?></td>
			<td><?php echo $category['subcategory_id']; ?></td>
			<td><?php echo $category['union_id']; ?></td>
			<td><?php echo $category['person_name']; ?></td>
			<td><?php echo $category['designation_id']; ?></td>
			<td><?php echo $category['cell_no']; ?></td>
			<td><?php echo $category['ward']; ?></td>
			<td><?php echo $category['others']; ?></td>
			<td><?php echo $category['created']; ?></td>
			<td><?php echo $category['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'categories', 'action' => 'view', $category['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'categories', 'action' => 'edit', $category['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'categories', 'action' => 'delete', $category['id']), null, __('Are you sure you want to delete # %s?', $category['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
