<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Maincategory'); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('প্রধান ক্যাটেগরী যোগ করুন'); ?></strong></h3>
				<ul class="panel-controls">
					<!--<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				--></ul>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4 form-group">
						<label>নাম</label>
						<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>


			</div>
			<div class="panel-footer">
				<button class="btn btn-primary pull-left" type="submit">Submit</button>
			</div>
		</div>
	</div>
	<?php echo $this->Form->end(); ?>
</div>





