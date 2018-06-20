<style>
<!--
.table td:first-child {
  padding-left: 8px;
}
-->
</style>
<div class="col-md-12">
	<div class="panel panel-default">
		<div class="panel-heading">
	        <h3 class="panel-title"><?php echo __('Content'); ?></h3>
	    </div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<td><?php echo __('Id'); ?></td>
						<td>
							<?php echo h($content['Content']['id']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Title'); ?></td>
						<td>
							<?php echo h($content['Content']['title']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Titlebn'); ?></td>
						<td>
							<?php echo h($content['Content']['titlebn']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Slug'); ?></td>
						<td>
							<?php echo h($content['Content']['slug']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Contenttype'); ?></td>
						<td>
							<?php echo $this->Html->link($content['Contenttype']['name'], array('controller' => 'contenttypes', 'action' => 'view', $content['Contenttype']['id'])); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Content'); ?></td>
						<td style="text-align: justify">
							<?php echo trim($content['Content']['content']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Contentbn'); ?></td>
						<td style="text-align: justify">
							<?php echo trim($content['Content']['contentbn']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Type'); ?></td>
						<td>
							<?php echo h($content['Content']['type']); ?>
							&nbsp;
						</td>
					</tr>
					<tr>
						<td><?php echo __('Created'); ?></td>
						<td>
							<?php echo h($content['Content']['created']); ?>
							&nbsp;
						</td>
					</tr>
				</table>
			</div>
		</div>
		
	</div>
	
	<div class="panel panel-default">
		<div class="panel-heading">
	        <h3 class="panel-title"><?php echo __('Related Contentimages'); ?></h3>
	    </div>
		<?php if (!empty($content['Contentimage'])): ?>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<tr>
						<th><?php echo __('Id'); ?></th>
						<th><?php echo __('Content Id'); ?></th>
						<th><?php echo __('ImgTitle'); ?></th>
						<th><?php echo __('ImgTxt'); ?></th>
						<th><?php echo __('ImgTitlebn'); ?></th>
						<th><?php echo __('ImgTxtbn'); ?></th>
						<th><?php echo __('Order'); ?></th>
						<th><?php echo __('Is Home'); ?></th>
						<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					<?php foreach ($content['Contentimage'] as $contentimage): ?>
					<tr>
						<td><?php echo $contentimage['id']; ?></td>
						<td><?php echo $contentimage['content_id']; ?></td>
						<td><?php echo $contentimage['imgTitle']; ?></td>
						<td><?php echo $contentimage['imgTxt']; ?></td>
						<td><?php echo $contentimage['imgTitlebn']; ?></td>
						<td><?php echo $contentimage['imgTxtbn']; ?></td>
						<td><?php echo $contentimage['order']; ?></td>
						<td><?php echo $contentimage['is_home']; ?></td>
						<td class="actions">
							<?php echo $this->Html->link(__('View'), array('controller' => 'contentimages', 'action' => 'view', $contentimage['id'])); ?>
							<?php echo $this->Html->link(__('Edit'), array('controller' => 'contentimages', 'action' => 'edit', $contentimage['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'contentimages', 'action' => 'delete', $contentimage['id']), array(), __('Are you sure you want to delete # %s?', $contentimage['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
				</table>
			</div>
		 </div>
		
	<?php endif; ?>
	</div>
	
</div>
