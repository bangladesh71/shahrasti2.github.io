<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('ক্যাটেগরী এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>categories/add">নতুন ক্যাটেগরী যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style="margin-left: 10px; width: 65%;">
			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>ক্রমিক</th>
					<th>প্রধান ক্যাটেগরী</th>
					<th>সাব ক্যাটেগরী</th>
					<th>ইউনিয়ন</th>
					<th>ব্যক্তির নাম</th>
					<th>পদবি</th>
					<th>মোবাইল নং</th>
					<th>ওয়ার্ড</th>
					<th>অন্যান্য</th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php foreach ($categories as $category): ?>
				<tr>
					<td><?php echo h($category['Category']['id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['maincategory_id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['subcategory_id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['union_id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['person_name']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['designation_id']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['cell_no']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['ward']); ?>&nbsp;</td>
					<td><?php echo h($category['Category']['others']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $category['Category']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $category['Category']['id']), null, __('Are you sure you want to delete # %s?', $category['Category']['id'])); ?>
					</td>
				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>

</div>





