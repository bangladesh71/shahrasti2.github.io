<?php
echo $this->Html->script(array('jquery-1.9.1'));
echo $this->Html->script('jquery-ui');
echo $this->Html->css('jquery-ui');

?>

<script>
	var path='<?php echo $this->webroot;?>';
	function main_nijukto(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/nijuktodropdown',
			data: {id:id},
			success: function(data){
				$("#sub_nijukto").html(data);
				$("#nijukto2").remove();

			}
		});
	}

	function sub_nijukto(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/nijuktodeg',
			data: {id:id},
			success: function(data){
				$("#deg_nijukto").html(data);
				$("#nijuktodeg2").remove();

			}
		});
	}

	function name_nijukto(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/nijuktoname',
			data: {id:id},
			success: function(data){
				$("#name_nijukto").html(data);
				$("#nijuktoname").remove();

			}
		});
	}

	function main_bitoron(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron").html(data);
				$("#bitoron99").remove();

			}
		});
	}
	function main_bitoron2(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown2',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron2").html(data);
				$("#bitoron2").remove();

			}
		});
	}


	function main_bitoron3(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown3',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron3").html(data);
				$("#bitoron3").remove();

			}
		});
	}

	function main_bitoron4(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown4',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron4").html(data);
				$("#bitoron4").remove();

			}
		});
	}

	function main_bitoron5(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown5',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron5").html(data);
				$("#bitoron5").remove();

			}
		});
	}

	function main_bitoron6(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown6',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron6").html(data);
				$("#bitoron6").remove();

			}
		});
	}

	function main_bitoron7(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown7',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron7").html(data);
				$("#bitoron7").remove();

			}
		});
	}

	function main_bitoron8(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown8',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron8").html(data);
				$("#bitoron8").remove();

			}
		});
	}

	function main_bitoron9(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown9',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron9").html(data);
				$("#bitoron9").remove();

			}
		});
	}

	function main_bitoron10(id){
		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondropdown10',
			data: {id:id},
			success: function(data){
				$("#sub_bitoron10").html(data);
				$("#bitoron10").remove();

			}
		});
	}




	function sub_bitoron(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron").html(data);
				$("#bitorondeg").remove();

			}
		});
	}

	function sub_bitoron2(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg2',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron2").html(data);
				$("#bitorondeg2").remove();

			}
		});
	}

	function sub_bitoron3(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg3',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron3").html(data);
				$("#bitorondeg3").remove();

			}
		});
	}

	function sub_bitoron4(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg4',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron4").html(data);
				$("#bitorondeg4").remove();

			}
		});
	}

	function sub_bitoron5(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg5',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron5").html(data);
				$("#bitorondeg5").remove();

			}
		});
	}

	function sub_bitoron6(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg6',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron6").html(data);
				$("#bitorondeg6").remove();

			}
		});
	}

	function sub_bitoron7(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg7',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron7").html(data);
				$("#bitorondeg7").remove();

			}
		});
	}

	function sub_bitoron8(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg8',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron8").html(data);
				$("#bitorondeg8").remove();

			}
		});
	}

	function sub_bitoron9(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg9',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron9").html(data);
				$("#bitorondeg9").remove();

			}
		});
	}

	function sub_bitoron10(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitorondeg10',
			data: {id:id},
			success: function(data){
				$("#deg_bitoron10").html(data);
				$("#bitorondeg10").remove();

			}
		});
	}



	function name_bitoron(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname',
			data: {id:id},
			success: function(data){
				$("#name_bitoron").html(data);
				$("#bitoronname").remove();

			}
		});
	}

	function name_bitoron2(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname2',
			data: {id:id},
			success: function(data){
				$("#name_bitoron2").html(data);
				$("#bitoronname2").remove();

			}
		});
	}

	function name_bitoron3(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname3',
			data: {id:id},
			success: function(data){
				$("#name_bitoron3").html(data);
				$("#bitoronname3").remove();

			}
		});
	}

	function name_bitoron4(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname4',
			data: {id:id},
			success: function(data){
				$("#name_bitoron4").html(data);
				$("#bitoronname4").remove();

			}
		});
	}

	function name_bitoron5(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname5',
			data: {id:id},
			success: function(data){
				$("#name_bitoron5").html(data);
				$("#bitoronname5").remove();

			}
		});
	}

	function name_bitoron6(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname6',
			data: {id:id},
			success: function(data){
				$("#name_bitoron6").html(data);
				$("#bitoronname6").remove();

			}
		});
	}

	function name_bitoron7(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname7',
			data: {id:id},
			success: function(data){
				$("#name_bitoron7").html(data);
				$("#bitoronname7").remove();

			}
		});
	}

	function name_bitoron8(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname8',
			data: {id:id},
			success: function(data){
				$("#name_bitoron8").html(data);
				$("#bitoronname8").remove();

			}
		});
	}

	function name_bitoron9(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname9',
			data: {id:id},
			success: function(data){
				$("#name_bitoron9").html(data);
				$("#bitoronname9").remove();

			}
		});
	}

	function name_bitoron10(id){

		//alert('ok');
		$.ajax({
			type: 'POST',
			url: path +'childcategories/bitoronname10',
			data: {id:id},
			success: function(data){
				$("#name_bitoron10").html(data);
				$("#bitoronname10").remove();

			}
		});
	}


</script>


<div class="row">
	<div class="col-md-12">
		<?php echo $this->Form->create('Entryform'); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('অভিযোগ এডিট করুন'); ?></strong></h3>
				<ul class="panel-controls">
					<!--<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				--></ul>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4 form-group">
						<label>ব্যক্তির নাম</label>
						<?php echo $this->Form->input('id'); ?>
						<?php echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>মোবাইল নং</label>
						<?php echo $this->Form->input('cell_no', array('class'=>'form-control','label'=>false)); ?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>ঠিকানা</label>
						<?php echo $this->Form->input('address', array('type'=>'textarea','class'=>'form-control','label'=>false)); ?>

					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<h4 style="margin-left: 11px; color: #698d2f; margin-top: 10px; font-size: 20px">নিযুক্তকারী </h4>
				<div class="row">
					<div class="col-md-4 form-group">
						<label>প্রধান ক্যাটেগরী</label>
						<?php echo $this->Form->input('maincategory_id',array('onchange'=>'main_nijukto(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => array(-1=> '--Please Select--')));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>সাব ক্যাটেগরী</label>
						<?php echo $this->Form->input('childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'nijukto2','type'=>'select','options'=>array())); ?>
						<div id="sub_nijukto" >

						</div>
					</div>

					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>পদবি </label>
						<?php echo $this->Form->input('designation_id', array('class'=>'form-control','id'=>'nijuktodeg2','label'=>false,'type'=>'select','options'=>array())); ?>
						<div id="deg_nijukto">

						</div>
					</div>

					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label> নাম</label>
						<?php echo $this->Form->input('subcategory_id', array('class'=>'form-control','id'=>'nijuktoname','label'=>false,'type'=>'select','options'=>array())); ?>
						<div id="name_nijukto">

						</div>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row" style="margin-top: 10px">
					<div class="col-md-4 form-group">
						<label>সমস্যার ধরন </label>
						<?php echo $this->Form->input('problem_id',array('label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>বিস্তারিত</label>
						<?php echo $this->Form->input('description',array('type'=>'textarea','label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-4 form-group">
						<label>নিস্পত্তির সর্বশেষ তারিখ</label>
						<?php echo $this->Form->input('deadline',array('type'=>'text','label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row" style="">
					<div class="col-md-4 form-group">
						<label>কাজের বর্তমান অবস্থা</label>
						<?php echo $this->Form->input('status',array('options'=>$status,'label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>
					<div class="col-md-8 form-group">
					</div>
				</div>

				<div class="row">
					<div class="col-md-3 form-group">
						<label>অভিযোগ কারীর  নাম ও ঠিকানা প্রিন্ট হবে ?</label>
						<?php echo $this->Form->input('ovijog',array('options'=>$ovijogkari,'label'=>false,'div'=>false,'class'=>'form-control'));	?>

					</div>

				</div>

				<div class="row" style="margin: 10px 0 " >

					<div class="col-md-3 form-group">
						<label>বিতরণ</label>
						<?php echo $this->Form->input('bitoron',array('onchange'=>'disable_bitoron(this.value)','options'=>$bitoron,'label'=>false,'div'=>false,'class'=>'form-control'));	?>
					</div>

				</div>

				<div class="row" id="bitoron" style="margin-top: 10px; display: none">
					<h4 style="color: #698d2f">বিতরণ: সদয় অবগতি / অবগতি ও কার্যার্থে </h4>

					<!--no 1-->
					<div class="row">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.0.maincategory_id',array('onchange'=>'main_bitoron(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.0.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron99','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.0.designation_id', array('class'=>'form-control','id'=>'bitorondeg','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.0.subcategory_id', array('class'=>'form-control','id'=>'bitoronname','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="firstremove">
								<i id="addsecond" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i>
							</span>
						</div>
					</div>

					<!--no 2-->
					<div class="row"  id="2nd" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.1.maincategory_id',array('onchange'=>'main_bitoron2(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.1.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron2','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron2" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.1.designation_id', array('class'=>'form-control','id'=>'bitorondeg2','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron2">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.1.subcategory_id', array('class'=>'form-control','id'=>'bitoronname2','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron2">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="secondremove">
								<i  id="addthird" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removesecond" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 3 -->
					<div class="row" style="display: none" id="3rd">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.2.maincategory_id',array('onchange'=>'main_bitoron3(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.2.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron3','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron3" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.2.designation_id', array('class'=>'form-control','id'=>'bitorondeg3','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron3">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.2.subcategory_id', array('class'=>'form-control','id'=>'bitoronname3','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron3">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="thirdremove">
								<i  id="addfourth" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removethird" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 4 -->
					<div class="row" style="display: none" id="4th">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.3.maincategory_id',array('onchange'=>'main_bitoron4(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.3.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron4','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron4" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.3.designation_id', array('class'=>'form-control','id'=>'bitorondeg4','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron4">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.3.subcategory_id', array('class'=>'form-control','id'=>'bitoronname4','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron4">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="fourthremove">
								<i  id="addfifth" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removefourth" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 5 -->
					<div class="row" id="5th" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.4.maincategory_id',array('onchange'=>'main_bitoron5(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.4.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron5','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron5" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.4.designation_id', array('class'=>'form-control','id'=>'bitorondeg5','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron5">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.4.subcategory_id', array('class'=>'form-control','id'=>'bitoronname5','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron5">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="fifthremove">
								<i  id="addsix" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removefifth" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 6 -->
					<div class="row" id="6th" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.5.maincategory_id',array('onchange'=>'main_bitoron6(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.5.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron6','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron6" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.5.designation_id', array('class'=>'form-control','id'=>'bitorondeg6','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron6">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.5.subcategory_id', array('class'=>'form-control','id'=>'bitoronname6','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron6">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="sixremove">
								<i  id="addseven" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removesix" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 7 -->
					<div class="row" id="7th" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.6.maincategory_id',array('onchange'=>'main_bitoron7(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.6.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron7','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron7" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.6.designation_id', array('class'=>'form-control','id'=>'bitorondeg7','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron7">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.6.subcategory_id', array('class'=>'form-control','id'=>'bitoronname7','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron7">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="sevenremove">
								<i  id="addeight" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removeseven" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 8 -->
					<div class="row" id="8th" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.7.maincategory_id',array('onchange'=>'main_bitoron8(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.7.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron8','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron8" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.7.designation_id', array('class'=>'form-control','id'=>'bitorondeg8','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron8">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.7.subcategory_id', array('class'=>'form-control','id'=>'bitoronname8','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron8">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="eightremove">
								<i  id="addnine" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removeeight" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 9 -->
					<div class="row" id="9th" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.8.maincategory_id',array('onchange'=>'main_bitoron9(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.8.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron9','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron9" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.8.designation_id', array('class'=>'form-control','id'=>'bitorondeg9','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron9">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.8.subcategory_id', array('class'=>'form-control','id'=>'bitoronname9','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron9">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<span id="nineremove">
								<i  id="addten" style="font-size: 18px;margin-top: 30px; cursor: pointer" class="fa fa-plus" aria-hidden="true"></i> &nbsp;
							</span>
							<i id="removenine" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
						</div>
					</div>

					<!--no 10 -->
					<div class="row" id="10th" style="display: none">
						<div class="col-md-2 form-group">
							<label>প্রধান ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.9.maincategory_id',array('onchange'=>'main_bitoron10(this.value)','label'=>false,'div'=>false,'class'=>'form-control','empty' => '--Please Select--'));	?>
						</div>
						<div class="col-md-2 form-group">
							<label>সাব ক্যাটেগরী</label>
							<?php echo $this->Form->input('Babostha.9.childcategory_id', array('class'=>'form-control','label'=>false,'id'=>'bitoron10','type'=>'select','options'=>array())); ?>
							<div id="sub_bitoron10" >

							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>পদবি </label>
							<?php echo $this->Form->input('Babostha.9.designation_id', array('class'=>'form-control','id'=>'bitorondeg10','label'=>false,'type'=>'select','options'=>array())); ?>
							<div id="deg_bitoron10">
							</div>
						</div>
						<div class="col-md-2 form-group">
							<label>নাম</label>
							<?php echo $this->Form->input('Babostha.9.subcategory_id', array('class'=>'form-control','id'=>'bitoronname10','label'=>false,'type'=>'select','options'=>array())); ?>

							<div id="name_bitoron10">

							</div>
						</div>
						<div class="col-md-2 form-group">
							<i id="removeten" style="font-size: 18px;margin-top: 30px; cursor: pointer; color: red" class="fa fa-minus" aria-hidden="true"></i>
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


	<script>
		function disable_bitoron(id){
			//alert('ok');
			if(id==2){
				$('#bitoron').show();
			}else{
				$('#bitoron').hide();
			}

		}
	</script>

	<script>

		$(function() {
			$( "#EntryformDeadline").datepicker({
				dateFormat: "yy-mm-dd",
				changeMonth: true,
				changeYear: true,
				yearRange:"-100:+50"
			});

		});

		$(document).ready(function(){
			$("#addsecond").click(function(){
				$("#2nd").show();
				$("#firstremove").hide();
			});
			$("#removesecond").click(function(){
				$("#2nd").hide();
				$("#firstremove").show();
			});

			$("#addthird").click(function(){
				$("#3rd").show();
				$("#secondremove").hide();
			});
			$("#removethird").click(function(){
				$("#3rd").hide();
				$("#secondremove").show();
			});

			$("#addfourth").click(function(){
				$("#4th").show();
				$("#thirdremove").hide();
			});
			$("#removefourth").click(function(){
				$("#4th").hide();
				$("#thirdremove").show();
			});

			$("#addfifth").click(function(){
				$("#5th").show();
				$("#fourthremove").hide();
			});
			$("#removefifth").click(function(){
				$("#5th").hide();
				$("#fourthremove").show();
			});

			$("#addsix").click(function(){
				$("#6th").show();
				$("#fifthremove").hide();
			});
			$("#removesix").click(function(){
				$("#6th").hide();
				$("#fifthremove").show();
			});

			$("#addseven").click(function(){
				$("#7th").show();
				$("#sixremove").hide();
			});
			$("#removeseven").click(function(){
				$("#7th").hide();
				$("#sixremove").show();
			});

			$("#addeight").click(function(){
				$("#8th").show();
				$("#sevenremove").hide();
			});
			$("#removeeight").click(function(){
				$("#8th").hide();
				$("#sevenremove").show();
			});

			$("#addnine").click(function(){
				$("#9th").show();
				$("#eightremove").hide();
			});
			$("#removenine").click(function(){
				$("#9th").hide();
				$("#eightremove").show();
			});

			$("#addten").click(function(){
				$("#10th").show();
				$("#nineremove").hide();
			});
			$("#removeten").click(function(){
				$("#10th").hide();
				$("#nineremove").show();
			});

		});
	</script>












