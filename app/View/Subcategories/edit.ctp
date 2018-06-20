<script>
	var path='<?php echo $this->webroot;?>';
	function main_cat(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/subdepended',
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
			url: path +'designations/degcat',
			data: {id:id},
			success: function(data){
				$("#deg_dropdown").html(data);
				$("#deg2").remove();

			}
		});
	}
</script>

<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Subcategory'); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('প্রোফাইল  তৈরি  করুন'); ?></strong></h3>
				<ul class="panel-controls">
					<!--<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				--></ul>
			</div>
			<div class="panel-body">

				<div class="row">
					<div class="col-md-4 form-group">
						<label>প্রধান ক্যাটেগরী</label>
						<?php echo $this->Form->input('id'); ?>
						<?php echo $this->Form->input('maincategory_id',array('onchange'=>'main_cat(this.value)','label'=>false,'div'=>false,'class'=>'form-control','required'=>true,'empty' => array(-1=> '--Please Select--')));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>সাব ক্যাটেগরী</label>
						<?php echo $this->Form->input('childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'cat2','type'=>'select','options'=>array())); ?>
						<div id="sub_dropdown" >

						</div>
					</div>
				</div>

				<!--<div class="row">
					<div class="col-md-4 form-group">
						<label>সাব ক্যাটেগরী </label>
						<?php /*echo $this->Form->input('childcategory_id',array('onchange'=>'disable_child(this.value);','label'=>false,'div'=>false,'class'=>'form-control','required'=>true));	*/?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>-->

				<!--<div id="disable_uni" style="display: none">
					<div class="row">
						<div class="col-md-4 form-group">
							<label>ইউনিয়ন</label>
							<?php /*echo $this->Form->input('union_id', array('class'=>'form-control','div'=>false,'label'=>false,'empty'=>'নির্বাচন করুন')); */?>

						</div>
						<div class="col-md-8 form-group">
						</div>
					</div>

					<div class="row">
						<div class="col-md-4 form-group">
							<label>ওয়ার্ড</label>
							<?php /*echo $this->Form->input('ward',array('options'=>$ward,'label'=>false,'div'=>false,'class'=>'form-control','empty'=>'নির্বাচন করুন')); */?>
						</div>
						<div class="col-md-8 form-group">
						</div>
					</div>
				</div>-->



				<div class="row" style="margin-top: 10px">
					<div class="col-md-4 form-group">
						<label>পদবি</label>
						<?php echo $this->Form->input('designation_id', array('class'=>'form-control','label'=>false,'id'=>'deg2','options'=>array())); ?>
						<div id="deg_dropdown" >

						</div>
					</div>
				</div>

				<div class="row" style="margin-top: 10px">
					<div class="col-md-4 form-group">
						<label>ব্যক্তির নাম</label>
						<?php echo $this->Form->input('person_name',array('label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>মোবাইল নং</label>
						<?php echo $this->Form->input('cell_no',array('label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>ঠিকানা </label>
						<?php echo $this->Form->input('address',array('type'=>'textarea','label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>অন্যান্য</label>
						<?php echo $this->Form->input('others',array('type'=>'textarea','label'=>false,'div'=>false,'class'=>'form-control'));	?>
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

<!--<script>
	function disable_child(id){
		//alert('ok');
		if(id==7){
			$('#disable_uni').show();
		}else{
			$('#disable_uni').hide();
		}

	}
</script>-->
