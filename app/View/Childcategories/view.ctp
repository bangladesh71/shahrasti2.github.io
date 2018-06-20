<div class="childcategories view">
<h2><?php echo __('Childcategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($childcategory['Childcategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maincategory'); ?></dt>
		<dd>
			<?php echo $this->Html->link($childcategory['Maincategory']['name'], array('controller' => 'maincategories', 'action' => 'view', $childcategory['Maincategory']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($childcategory['Childcategory']['name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Childcategory'), array('action' => 'edit', $childcategory['Childcategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Childcategory'), array('action' => 'delete', $childcategory['Childcategory']['id']), null, __('Are you sure you want to delete # %s?', $childcategory['Childcategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Childcategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Childcategory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Maincategories'), array('controller' => 'maincategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maincategory'), array('controller' => 'maincategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Subcategories'); ?></h3>
	<?php if (!empty($childcategory['Subcategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maincategory Id'); ?></th>
		<th><?php echo __('Childcategory Id'); ?></th>
		<th><?php echo __('Union Id'); ?></th>
		<th><?php echo __('Ward'); ?></th>
		<th><?php echo __('Designation Id'); ?></th>
		<th><?php echo __('Person Name'); ?></th>
		<th><?php echo __('Cell No'); ?></th>
		<th><?php echo __('Address'); ?></th>
		<th><?php echo __('Others'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($childcategory['Subcategory'] as $subcategory): ?>
		<tr>
			<td><?php echo $subcategory['id']; ?></td>
			<td><?php echo $subcategory['maincategory_id']; ?></td>
			<td><?php echo $subcategory['childcategory_id']; ?></td>
			<td><?php echo $subcategory['union_id']; ?></td>
			<td><?php echo $subcategory['ward']; ?></td>
			<td><?php echo $subcategory['designation_id']; ?></td>
			<td><?php echo $subcategory['person_name']; ?></td>
			<td><?php echo $subcategory['cell_no']; ?></td>
			<td><?php echo $subcategory['address']; ?></td>
			<td><?php echo $subcategory['others']; ?></td>
			<td><?php echo $subcategory['created']; ?></td>
			<td><?php echo $subcategory['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'subcategories', 'action' => 'view', $subcategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'subcategories', 'action' => 'edit', $subcategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'subcategories', 'action' => 'delete', $subcategory['id']), null, __('Are you sure you want to delete # %s?', $subcategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
