<?php //echo phpinfo(); ?>

<script>
	var path='<?php echo $this->webroot;?>';
	function main_cat(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/subdepended_profile',
			data: {id:id},
			success: function(data){
				$("#sub_dropdown").html(data);
				$("#cat2").remove();

			}
		});
	}

	function deg_cat(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'designations/degcat_profile',
			data: {id:id},
			success: function(data){
				$("#deg_dropdown").html(data);
				$("#deg2").remove();

			}
		});
	}
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('প্রোফাইল এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>subcategories/add">নতুন প্রোফাইল যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style="margin-left: 10px; width: 65%;">

			<div class="row">

				<div class="col-md-12">
					<?php echo $this->Form->create('allsearch',array('class'=>'form-horizontal','url' => array('controller'=>'subcategories','action'=>'index'))); ?>

					<div class="form-group">

						<div class="col-md-2">
							<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'নাম'));?>
						</div>

						<div class="col-md-3">
							<?php echo $this->Form->input('maincategory_id',array('onchange'=>'main_cat(this.value)','label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'empty' => '-প্রধান ক্যাটেগরী-'));?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('childcategory_id',array('onchange'=>'deg_cat(this.value)','id'=>'sub_dropdown','label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'options'=> '-সাব ক্যাটেগরী-'));?>
						</div>
						<div class="col-md-3">
							<?php echo $this->Form->input('designation_id',array('id'=>'deg_dropdown','label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'options'=>'-পদবি-'));?>
						</div>
						<div class="col-md-1">
							<button class="btn btn-primary pull-right" type="submit">খুঁজুন</button>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>

			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>ক্রমিক</th>
					<th>নাম</th>
					<th>পদবি</th>
					<th>প্রতিষ্ঠান / সংগঠনের নাম</th>
					<th>মোবাইল নং</th>
					<th>ঠিকানা</th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php $id = null; ?>
					<?php foreach ($subcategories as $subcategory): //pr($subcategory); die()?>
				<tr>
					<!--<td><?php /*echo $id += 1; */?>&nbsp;</td>-->
					<td><?php echo h($subcategory['Subcategory']['id']); ?>&nbsp;</td>
					<td><?php echo h($subcategory['Subcategory']['person_name']); ?>&nbsp;</td>
					<td><?php echo h($subcategory['Designation']['name']); ?>&nbsp;</td>
					<td><?php echo h($subcategory['Childcategory']['name']); ?>&nbsp;</td>
					<td><?php echo h($subcategory['Subcategory']['cell_no']); ?>&nbsp;</td>
					<td><?php echo h($subcategory['Subcategory']['address']); ?>&nbsp;</td>
					<td class="actions">
						<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $subcategory['Subcategory']['id'])); ?>
						<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $subcategory['Subcategory']['id']), null, __('Are you sure you want to delete # %s?', $subcategory['Subcategory']['id'])); ?>
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







