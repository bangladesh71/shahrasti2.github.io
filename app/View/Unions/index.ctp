<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('ইউনিয়ন এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>unions/add">নতুন ইউনিয়ন যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style="margin-left: 10px; width: 65%;">
			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>ক্রমিক</th>
					<th>ইউনিয়ন এর নাম </th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php foreach ($unions as $union): ?>
					<td><?php echo h($union['Union']['id']); ?>&nbsp;</td>
					<td><?php echo h($union['Union']['name']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $union['Union']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $union['Union']['id']), null, __('Are you sure you want to delete # %s?', $union['Union']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>




