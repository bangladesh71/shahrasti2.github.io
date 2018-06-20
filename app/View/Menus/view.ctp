<div class="menus view">
<h2><?php echo __('Menu'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Namebn'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['namebn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Slug'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['slug']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Parent Menu'); ?></dt>
		<dd>
			<?php echo $this->Html->link($menu['ParentMenu']['name'], array('controller' => 'menus', 'action' => 'view', $menu['ParentMenu']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['type']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($menu['Content']['title'], array('controller' => 'contents', 'action' => 'view', $menu['Content']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Url'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['url']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Role'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['role']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['status']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($menu['Menu']['order']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Menu'), array('action' => 'edit', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Menu'), array('action' => 'delete', $menu['Menu']['id']), array(), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Menu'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Menus'), array('controller' => 'menus', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Parent Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Menus'); ?></h3>
	<?php if (!empty($menu['ChildMenu'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Namebn'); ?></th>
		<th><?php echo __('Slug'); ?></th>
		<th><?php echo __('Parent Id'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th><?php echo __('Content Id'); ?></th>
		<th><?php echo __('Url'); ?></th>
		<th><?php echo __('Role'); ?></th>
		<th><?php echo __('Status'); ?></th>
		<th><?php echo __('Order'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($menu['ChildMenu'] as $childMenu): ?>
		<tr>
			<td><?php echo $childMenu['id']; ?></td>
			<td><?php echo $childMenu['name']; ?></td>
			<td><?php echo $childMenu['namebn']; ?></td>
			<td><?php echo $childMenu['slug']; ?></td>
			<td><?php echo $childMenu['parent_id']; ?></td>
			<td><?php echo $childMenu['type']; ?></td>
			<td><?php echo $childMenu['content_id']; ?></td>
			<td><?php echo $childMenu['url']; ?></td>
			<td><?php echo $childMenu['role']; ?></td>
			<td><?php echo $childMenu['status']; ?></td>
			<td><?php echo $childMenu['order']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'menus', 'action' => 'view', $childMenu['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'menus', 'action' => 'edit', $childMenu['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'menus', 'action' => 'delete', $childMenu['id']), array(), __('Are you sure you want to delete # %s?', $childMenu['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Child Menu'), array('controller' => 'menus', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
