<div class="maincategories view">
<h2><?php echo __('Maincategory'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($maincategory['Maincategory']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($maincategory['Maincategory']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($maincategory['Maincategory']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($maincategory['Maincategory']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Maincategory'), array('action' => 'edit', $maincategory['Maincategory']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Maincategory'), array('action' => 'delete', $maincategory['Maincategory']['id']), null, __('Are you sure you want to delete # %s?', $maincategory['Maincategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Maincategories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Maincategory'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Subcategories'), array('controller' => 'subcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Subcategory'), array('controller' => 'subcategories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Childcategories'), array('controller' => 'childcategories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Childcategory'), array('controller' => 'childcategories', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Categories'); ?></h3>
	<?php if (!empty($maincategory['Category'])): ?>
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
	<?php foreach ($maincategory['Category'] as $category): ?>
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
<div class="related">
	<h3><?php echo __('Related Subcategories'); ?></h3>
	<?php if (!empty($maincategory['Subcategory'])): ?>
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
	<?php foreach ($maincategory['Subcategory'] as $subcategory): ?>
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
<div class="related">
	<h3><?php echo __('Related Childcategories'); ?></h3>
	<?php if (!empty($maincategory['Childcategory'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Maincategory Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($maincategory['Childcategory'] as $childcategory): ?>
		<tr>
			<td><?php echo $childcategory['id']; ?></td>
			<td><?php echo $childcategory['maincategory_id']; ?></td>
			<td><?php echo $childcategory['name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'childcategories', 'action' => 'view', $childcategory['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'childcategories', 'action' => 'edit', $childcategory['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'childcategories', 'action' => 'delete', $childcategory['id']), null, __('Are you sure you want to delete # %s?', $childcategory['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Childcategory'), array('controller' => 'childcategories', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
