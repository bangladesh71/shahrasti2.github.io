<?php
echo $this->Html->script(array('jquery-1.9.1'));
echo $this->Html->script('jquery-ui');
echo $this->Html->css('jquery-ui');
?>

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Entryform'); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('অভিযোগ দ্রুত দাখিল করুন'); ?></strong></h3>
				<ul class="panel-controls">
					<!--<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				--></ul>
			</div>
			<div class="panel-body">

				<?php //pr($logged_user); ?>

				<div class="row">
					<?php echo  $this->Form->input('user_id',array('value' => $logged_user,'type'=>'hidden'));	?>
					<div class="col-md-3 form-group">
						<label>ব্যক্তির নাম</label>
						<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>

					<div class="col-md-2 form-group">
						<label>মোবাইল নং</label>
						<?php echo $this->Form->input('cell_no', array('class'=>'form-control','label'=>false)); ?>
					</div>

					<div class="col-md-3 form-group">
						<label>সমস্যার ধরন </label>
						<?php echo $this->Form->input('problem_id',array('label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>

					<div class="col-md-3 form-group" style="margin-bottom: 0px; font-size: 15px; text-align: right">
					</div>

				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>ঠিকানা</label>
						<?php echo $this->Form->input('address', array('type'=>'textarea','class'=>'form-control','label'=>false)); ?>
					</div>
					<div class="col-md-4 form-group">
						<label>বিস্তারিত</label>
						<?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>

					<div class="row" style="display: none">
						<div class="col-md-4 form-group">
							<label>  </label>
							<?php echo $this->Form->input('status',array('value'=>'1','label'=>false,'div'=>false,'class'=>'form-control'));	?>
						</div>
						<div class="col-md-8 form-group">
						</div>
					</div>

				</div>


			</div>
			<div class="panel-footer">
				<button class="btn btn-success " type="submit">Submit</button>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>






