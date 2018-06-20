<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('সাব ক্যাটেগরী এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>childcategories/add">নতুন সাব ক্যাটেগরী যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style="margin-left: 10px; width: 65%;">
			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>ক্রমিক</th>
					<th>প্রধান ক্যাটেগরী এর নাম </th>
					<th>সাব  ক্যাটেগরী এর নাম </th>

					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>

					<?php $id = null; ?>

					<?php foreach ($childcategories as $childcategory): //pr($childcategory);?>
					<!--<td><?php /*echo $id += 1; */?>&nbsp;</td>-->
					<td><?php echo h($childcategory['Childcategory']['id']); ?>&nbsp;</td>
					<td><?php echo h($childcategory['Maincategory']['name']); ?>&nbsp;</td>
					<td><?php echo h($childcategory['Childcategory']['name']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $childcategory['Childcategory']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $childcategory['Childcategory']['id']), null, __('Are you sure you want to delete # %s?', $childcategory['Childcategory']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>

			<div class="paging" style="margin-bottom: 10px">
				<?php
				echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
				echo $this->Paginator->numbers(array('separator' => ''));
				echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
				?>
			</div>

		</div>
	</div>

</div>




