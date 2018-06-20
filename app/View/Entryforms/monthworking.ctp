<?php
echo $this->Html->script(array('jquery-1.9.1'));
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
		<h3 class="panel-title"><?php echo __('কার্যরত অভিযোগ  এর তালিকা'); ?></h3>
		<ul class="panel-controls">
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style=" width: 100%;">

			<div class="row">

				<div class="col-md-12">
					<?php echo $this->Form->create('allsearch',array('class'=>'form-horizontal','url' => array('controller'=>'entryforms','action'=>'monthworking'))); ?>

					<div class="form-group">

						<div class="col-md-1">
							<?php echo $this->Form->input('id',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'আইডি'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'নাম'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('mobileNo',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'মোবাইল নং 	'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('dayfrom',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'Date from'));?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input('dayto',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'Date to'));?>
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

			<table class="table table-striped table-bordered table-hover" style="margin-top: 5px">
				<thead>
				<tr>
					<th>ক্রমিক নং</th>
					<th>রেফারেন্স আইডি</th>
					<th>আবেদনকারীর নাম </th>
					<th>মোবাইল নং</th>
					<th>ঠিকানা</th>
					<th>নিযুক্তকারীর নাম </th>
					<!--<th>নিযুক্তকারীর পদবি </th>-->
					<th>প্রধান ক্যাটেগরী</th>
					<!--<th>সাব ক্যাটেগরী</th>-->
					<th>সমস্যার ধরন </th>
					<th>নিস্পত্তির সর্বশেষ তারিখ </th>
					<th>সর্বশেষ অবস্থা</th>
					<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php $id = null; ?>
					<?php foreach ($entryforms as $entryform): //pr($entryform); die();?>
					<?php

					if($entryform['Entryform']['status'] == 2) { ?>

						<td><?php echo $id += 1; ?>&nbsp;</td>
						<td><?php echo h($entryform['Entryform']['id']); ?>&nbsp;</td>
						<td><?php echo h($entryform['Entryform']['name']); ?>&nbsp;</td>
						<td><?php echo h($entryform['Entryform']['cell_no']); ?>&nbsp;</td>
						<td><?php echo h($entryform['Entryform']['address']); ?>&nbsp;</td>
						<td><?php echo h($entryform['Subcategory']['person_name']); ?>&nbsp;</td>
						<!--<td><?php /*echo h($entryform['Subcategory']['designation_id']); */?>&nbsp;</td>-->
						<td><?php echo h($entryform['Maincategory']['name']); ?>&nbsp;</td>
						<!--<td><?php /*echo h($entryform['Subcategory']['childcategory_id']); */?>&nbsp;</td>-->
						<td><?php echo h($entryform['Problem']['name']); ?>&nbsp;</td>
						<td><?php echo h($entryform['Entryform']['deadline']); ?>&nbsp;</td>
						<td><?php echo $status[$entryform['Entryform']['status']]; ?>&nbsp;</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $entryform['Entryform']['id'])); ?>
							<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $entryform['Entryform']['id']), null, __('Are you sure you want to delete # %s?', $entryform['Entryform']['id'])); ?>
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
			</div>
		</div>
	</div>


</div>



