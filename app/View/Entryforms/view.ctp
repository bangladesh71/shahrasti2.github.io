<?php
function bangla_number( $int ) {
	$engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
	$bangNumber = array('১', '২', '৩', '৪', '৫', '৬', '৭', '৮', '৯', '০');
	$converted = str_replace( $engNumber, $bangNumber, $int );
	return $converted;
}

?>

<style>
	#pwrd{
		display: none;
	}
	@media print
	{
		.no-print, .no-print *
		{
			display: none !important;
		}


		.panel-body { width: 100%; margin: 0; float: none; font-size: 12pt; background: transparent;}

	}
</style>

<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-body">

					<div class="row">
						<div class="col-md-3 form-group">
						</div>

						<div class="col-md-6 form-group">
							<p style="text-align: center; font-size: 16px">
								গণপ্রজাতন্ত্রী বাংলাদেশ সরকার <br>
								উপজেলা নির্বাহী অফিসারের কার্যালয় <br>
								শাহরাস্তি, চাঁদপুর <br>
								shahrasti.chandpur.gov.bd
							</p>
						</div>

						<div class="col-md-3 form-group">
						</div>
					</div>

					<?php //pr($entryform); ?>

					<div class="row">
						<div class="col-md-12 form-group">
							<span>কলসেন্টার রেফারেন্স আইডি: &nbsp &nbsp <?php echo bangla_number($entryform['Entryform']['id']); ?> </span>
							<span style="float: right">
								<span>সার্ভিস এন্ট্রির তারিখ: &nbsp &nbsp <?php echo bangla_number(date('d/m/Y', strtotime(h($entryform['Entryform']['created'])))); ?></span>
							</span>

						</div>

					</div>

					<div class="row" style="margin-top: 5px">
						<div class="col-md-12 form-group">
							<span>সংশ্লিষ্ট দপ্তরের নাম: &nbsp &nbsp <?php echo h($entryform['Subcategory']['Childcategory']['name']); ?></span>
						</div>
					</div>

					<div class="row" style="margin-top: 5px">
						<div class="col-md-12 form-group">
							<span style="font-weight: bold">বিষয়:   &nbsp &nbsp <?php  echo h($entryform['Problem']['name']); ?></span>
						</div>
					</div>

					<div class="row" style="margin-top: 10px">
						<div class="col-md-10 form-group">
							<span>&nbsp;&nbsp;&nbsp;&nbsp; উপর্যুক্ত বিষয় ও সূত্রে আপনার জ্ঞাতার্থে জানানো যাচ্ছে যে, উপজেলা কল সেন্টারে নিম্নলিখিত নাগরিক অভিযোগ/তথ্য ও সেবাসংক্রান্ত আবেদন/মতামত/সুপারিশ সংক্রান্ত বিষয়টি আপনার অবগতি ও আগামী <?php echo bangla_number(date('d/m/Y', strtotime(h($entryform['Entryform']['deadline'])))); ?> তারিখের মধ্যে প্র্রয়োজনীয় ব্যবস্থা গ্রহণ পূর্বক নিম্নস্বাক্ষরকারীর নিকট প্রতিবেদন প্রেরণ করার জন্য অনুরোধ করা হ’ল-</span>
						</div>

						<div class="col-md-2 form-group">
						</div>
					</div>

					<?php if($entryform['Entryform']['ovijog']== 1){ ?>
					<div class="row" style="margin-top: 5px">
						<div class="col-md-12 form-group" style="margin-top: -15px; margin-bottom: 5px">
							<span>অভিযোগ কারীর নাম, মোবাইল নং ও ঠিকানা:   &nbsp &nbsp <?php echo h($entryform['Entryform']['name']); ?> <?php echo', ' ?> <?php echo bangla_number($entryform['Entryform']['cell_no']); ?> <?php echo', ' ?> <?php echo h($entryform['Entryform']['address']); ?></span>
						</div>

					</div>
					<?php } ?>

					<div class="row">
						<div class="col-md-12 form-group" style=" margin-bottom: 10px; ">
							" <?php echo  h($entryform['Entryform']['description']); ?> "
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 form-group">
							<p>
								জনাব, <br>
								<?php echo h($entryform['Subcategory']['person_name']); ?> <br>
								<?php echo h($entryform['Subcategory']['Designation']['name']); ?> <br>
								<?php echo h($entryform['Subcategory']['Childcategory']['name']); ?>
							</p>

							<span style="float: right">
								<p style="text-align: center">
									উপজেলা নির্বাহী অফিসার <br>
									শাহরাস্তি, চাঁদপুর <br>
									মোবাইল নং : ০১৭৩০০৬৭০৬৮<br>
									ইমেইল :unoshahrastichandpur@gmail.com
								</p>
							</span>
						</div>
					</div>


					<div class="row">
						<?php if($entryform['Entryform']['bitoron']== 2 ){ ?>
							<div class="col-md-6 form-group">
								<p style="font-size: 14px">বিতরণ: সদয় অবগতি/অবগতি ও কার্যার্থে   </p>

								<?php

								$i = 1;
								foreach ($entryform['Babostha'] as $bitoron){ //pr($bitoron); ?>
									<p>
										 <?php
										 	if( !empty($bitoron['subcategory_id'])){
												echo   bangla_number($i++). '. '. h($bitoron['Subcategory']['person_name']) . ',' . ($bitoron['Designation']['name']) . ',' . ($bitoron['Childcategory']['name']);
											}

										 ?>
									</p>
								<?php
									}
								 }
								?>
							</div>

						<div class="col-md-6 form-group">

						</div>
					</div>


				</div>
				<div class="panel-footer no-print">
					<button style="font-size: 17px !important;" onclick="myFunction()" class="btn btn-success " type="submit">Print</button>
					<!--<button class="btn btn-success " type="submit">Download</button>-->
					<?php
						echo $this->Html->link('Close and proceed to next complain ',array('controller'=>'entryforms','action'=>'add'),array('class'=>'btn btn-danger','style'=>'font-size: 17px; margin-right: 3px;'));
						echo'  ';

					?>

					<?php
					if($entryform['Entryform']['deadline'] < date("Y-m-d") && !empty($entryform['Entryform']['deadline']) ) {


						echo $this->Html->link('Back',array('controller'=>'users','action'=>'dashbrd'),array('class'=>'btn btn-success','style'=>'font-size: 17px;'));

					}
					?>

				</div>
			</div>
		</div>
</div>

<script>
	function myFunction() {
		window.print();
	}
</script>