<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('পদবি এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>designations/add">নতুন পদবি যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style="margin-left: 10px; width: 65%;">
			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>ক্রমিক</th>
					<th>সাব ক্যাটেগরী</th>
					<th>পদবি এর নাম </th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php $id = null; ?>
					<?php foreach ($designations as $designation): //pr($designation)?>
					<!--<td><?php /*echo $id += 1; */?>&nbsp;</td>-->
					<td><?php echo h($designation['Designation']['id']); ?>&nbsp;</td>
					<td><?php echo h($designation['Childcategory']['name']); ?>&nbsp;</td>
					<td><?php echo h($designation['Designation']['name']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $designation['Designation']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $designation['Designation']['id']), null, __('Are you sure you want to delete # %s?', $designation['Designation']['id'])); ?>
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




