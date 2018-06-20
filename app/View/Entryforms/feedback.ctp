<?php
echo $this->Html->script(array('jquery-1.9.1'));
echo $this->Html->script('jquery-ui');
echo $this->Html->css(array('jquery-ui','rating','example'));

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
		<h3 class="panel-title"><?php echo __('অভিযোগ সম্পূর্ণ এর তালিকা'); ?></h3>
		<ul class="panel-controls">
		</ul>
	</div>

	<div class="form_top">
		<div class="table-responsive" style=" width: 100%;">

			<div class="row">

				<div class="col-md-12">
					<?php echo $this->Form->create('allsearch',array('class'=>'form-horizontal','url' => array('controller'=>'entryforms','action'=>'archive'))); ?>

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
					<th>বিস্তারিত </th>

					<th class="actions"><?php echo __('Feedback'); ?></th>
				</tr>
				</thead>

				<tbody>
				<tr>
					<?php $id = null; ?>
					<?php foreach ($entryforms as $entryform): //pr($entryform); die();?>
					<?php

					if($entryform['Entryform']['status']==3 ) { ?>

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
						<td><?php echo h($entryform['Entryform']['description']); ?>&nbsp;</td>
						<td class="actions">
							<?php

							if($entryform['Entryform']['rateing']==null ) {

								echo $this->Html->link(__('Give Feedback'), array('action' => 'feedback_view', $entryform['Entryform']['id']));
							}else{

							    echo $entryform['Entryform']['rateing']. '  <i style="color: #9E2424;"  class="fa fa-star" aria-hidden="true"></i>' .'<br>';
								echo $entryform['Entryform']['comment'].'...  ';
								echo $this->Html->link(__('details'), array('action' => 'feedback_view', $entryform['Entryform']['id']));
							}


							?>
						</td>

					<?php }	?>


				</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>
	// rating script
	$(function(){
		$('.rate-btn').hover(function(){
			$('.rate-btn').removeClass('rate-btn-hover');
			var therate = $(this).attr('id');
			for (var i = therate; i >= 0; i--) {
				$('.rate-btn-'+i).addClass('rate-btn-hover');
			};
		});

		$('.rate-btn').click(function(){
			var therate = $(this).attr('id');
			var dataRate = 'act=rate&post_id=<?php echo $post_id; ?>&rate='+therate; //
			$('.rate-btn').removeClass('rate-btn-active');
			for (var i = therate; i >= 0; i--) {
				$('.rate-btn-'+i).addClass('rate-btn-active');
			};
			$.ajax({
				type : "POST",
				url : "http://localhost/rating/ajax.php",
				data: dataRate,
				success:function(){}
			});

		});
	});
</script>



