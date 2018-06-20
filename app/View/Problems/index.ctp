<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('সমস্যার ধরন এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>problems/add">নতুন সমস্যা যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style="margin-left: 10px; width: 65%;">
			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px; ">
				<thead>
				<tr>
					<th>ক্রমিক</th>
					<th>সমস্যার ধরন এর নাম </th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php foreach ($problems as $problem): ?>
					<td><?php echo h($problem['Problem']['id']); ?>&nbsp;</td>
					<td><?php echo h($problem['Problem']['name']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $problem['Problem']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $problem['Problem']['id']), null, __('Are you sure you want to delete # %s?', $problem['Problem']['id'])); ?>
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



