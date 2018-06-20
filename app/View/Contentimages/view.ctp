<div class="contentimages view">
<h2><?php echo __('Contentimage'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Content'); ?></dt>
		<dd>
			<?php echo $this->Html->link($contentimage['Content']['title'], array('controller' => 'contents', 'action' => 'view', $contentimage['Content']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImgTitle'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['imgTitle']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImgTxt'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['imgTxt']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImgTitlebn'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['imgTitlebn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('ImgTxtbn'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['imgTxtbn']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Home'); ?></dt>
		<dd>
			<?php echo h($contentimage['Contentimage']['is_home']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Contentimage'), array('action' => 'edit', $contentimage['Contentimage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Contentimage'), array('action' => 'delete', $contentimage['Contentimage']['id']), array(), __('Are you sure you want to delete # %s?', $contentimage['Contentimage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Contentimages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Contentimage'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Contents'), array('controller' => 'contents', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Content'), array('controller' => 'contents', 'action' => 'add')); ?> </li>
	</ul>
</div>
