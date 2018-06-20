<?php
echo $this->Html->script(array('jquery-1.9.1','jquery.battatech.excelexport'));
echo $this->Html->script('jquery-ui');
echo $this->Html->css('jquery-ui');

?>
<script>

	$(function() {
		$( "#allsearchDayfrom,#allsearchDayto").datepicker({
			dateFormat: "yy-mm-dd",
			changeMonth: true,
			changeYear: true,
			yearRange:"-100:+50"
		});



	});
</script>

<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title"><?php echo __('অভিযোগ এর তালিকা'); ?></h3>
		<ul class="panel-controls">
			<a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>entryforms/add">নতুন অভিযোগ যোগ করুন</a>
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style=" width: 100%;">

			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->create('allsearch',array('class'=>'form-horizontal','url' => array('controller'=>'entryforms','action'=>'index'))); ?>
					<div class="form-group">
						<div class="col-md-1">
							<?php echo $this->Form->input('id',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>' আইডি'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'নাম'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('mobileNo',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'মোবাইল নং 	'));?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->input('dayfrom',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'Date from'));?>
						</div>
						<div class="col-md-1">
							<?php echo $this->Form->input('dayto',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'Date to'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('status',array('options'=>$status,'label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'empty' => array(''=> '-status-')));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('role',array('options'=>$maincategories,'label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '-ক্যাটেগরী-'),'required'=>false));?>
						</div>

						<div class="col-md-1">
							<button class="btn btn-primary pull-right" type="submit">খুঁজুন</button>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>



			<script type="text/javascript">
				$(document).ready(function () {
					$("#btnExport").click(function () {

						$("#tblExport").btechco_excelexport({
							containerid: "tblExport"
							, datatype: $datatype.Table
						});
					});
				});
			</script>

			<table id="tblExport" class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>রেফারেন্স আইডি</th>
					<th>এন্ট্রি আইডি</th>
					<th>আবেদনকারীর নাম </th>
					<!--<th>মোবাইল নং</th>
					<th>ঠিকানা</th>-->
					<th>নিযুক্তকারীর নাম </th>
					<!--<th>নিযুক্তকারীর পদবি </th>-->
					<th>প্রধান ক্যাটেগরী</th>
					<!--<th>সাব ক্যাটেগরী</th>-->
					<th>সমস্যার ধরন </th>
					<!--<th>বিস্তারিত </th>-->
					<th>নিস্পত্তির সর্বশেষ তারিখ </th>
					<th>বর্তমান অবস্থা</th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>

					<?php $id = null; ?>

					<?php foreach ($entryforms as $entryform): //pr($entryform); die();?>
					<?php

					if($entryform['Entryform']['status']==1 || $entryform['Entryform']['status']==2 ) { ?>


					<td><?php echo h($entryform['Entryform']['id']); ?>&nbsp;</td>
					<td><?php echo h($entryform['User']['name']); ?>&nbsp;</td>
					<td><?php echo h($entryform['Entryform']['name']); ?>&nbsp;</td>
					<!--<td><?php /*echo h($entryform['Entryform']['cell_no']); */?>&nbsp;</td>
					<td><?php /*echo h($entryform['Entryform']['address']); */?>&nbsp;</td>-->
					<td><?php echo h($entryform['Subcategory']['person_name']); ?>&nbsp;</td>
					<!--<td><?php /*echo h($entryform['Subcategory']['designation_id']); */?>&nbsp;</td>-->
					<td><?php echo h($entryform['Maincategory']['name']); ?>&nbsp;</td>
					<!--<td><?php /*echo h($entryform['Subcategory']['childcategory_id']); */?>&nbsp;</td>-->
					<td><?php echo h($entryform['Problem']['name']); ?>&nbsp;</td>
					<!--<td><?php /*echo h($entryform['Entryform']['description']); */?>&nbsp;</td>-->
					<td><?php echo h($entryform['Entryform']['deadline']); ?>&nbsp;</td>
					<td><?php echo $status[$entryform['Entryform']['status']]; ?>&nbsp;</td>
					<td class="actions">

						<?php echo $this->Html->link(__('View'), array('action' => 'view', $entryform['Entryform']['id'])); ?>


						<?php if($current_user['role']==1){  ?>
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entryform['Entryform']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entryform['Entryform']['id']), null, __('Are you sure you want to delete # %s?', $entryform['Entryform']['id'])); ?>
						<?php } ?>

					</td>

					<?php }	?>


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

				<button id="btnExport" class="btn btn-primary pull-right" type="submit" style="margin-right: 5px">Export</button>

			</div>
		</div>
	</div>


</div>



