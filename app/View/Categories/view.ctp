<div class="categories view">
<h2><?php echo __('Category'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Maincategory Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['maincategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Subcategory Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['subcategory_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['union_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Person Name'); ?></dt>
		<dd>
			<?php echo h($category['Category']['person_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Designation Id'); ?></dt>
		<dd>
			<?php echo h($category['Category']['designation_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cell No'); ?></dt>
		<dd>
			<?php echo h($category['Category']['cell_no']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ward'); ?></dt>
		<dd>
			<?php echo h($category['Category']['ward']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Others'); ?></dt>
		<dd>
			<?php echo h($category['Category']['others']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($category['Category']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($category['Category']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Category'), array('action' => 'edit', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Category'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('action' => 'add')); ?> </li>
	</ul>
</div>
