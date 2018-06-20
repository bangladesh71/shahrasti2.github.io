<?php
function bangla_number( $int ) {
	$engNumber = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 0);
	$bangNumber = array('?', '?', '?', '?', '?', '?', '?', '?', '?', '?');
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
							?????????????? ???????? ????? <br>
							?????? ???????? ???????? ???????? <br>
								
                                                                                                                              ?????????, ??????? <br>
							shahrasti.chandpur.gov.bd
						</p>
					</div>

					<div class="col-md-3 form-group">
					</div>
				</div>

				<?php //pr($entryform); ?>

				<div class="row">
					<div class="col-md-12 form-group">
						<span>????????? ????????? ????: &nbsp &nbsp <?php echo bangla_number($entryform['Entryform']['id']); ?> </span>
							<span style="float: right">
								<span>??????? ???????? ?????: &nbsp &nbsp <?php echo bangla_number(date('d/m/Y', strtotime(h($entryform['Entryform']['created'])))); ?></span>
							</span>

					</div>

				</div>

				<div class="row" style="margin-top: 5px">
					<div class="col-md-12 form-group">
						<span>????????? ??????? ???: &nbsp &nbsp <?php echo h($entryform['Subcategory']['Childcategory']['name']); ?></span>
					</div>
				</div>

				<div class="row" style="margin-top: 5px">
					<div class="col-md-12 form-group">
						<span style="font-weight: bold">????:   &nbsp &nbsp <?php  echo h($entryform['Problem']['name']); ?></span>
					</div>
				</div>

				<div class="row" style="margin-top: 10px">
					<div class="col-md-10 form-group">
						<span>&nbsp;&nbsp;&nbsp;&nbsp; ????????? ???? ? ?????? ????? ?????????? ?????? ?????? ??, ?????? ?? ???????? ?????????? ?????? ??????/???? ? ????????????? ?????/?????/??????? ????????? ?????? ????? ????? ? ????? <?php echo bangla_number(date('d/m/Y', strtotime(h($entryform['Entryform']['deadline'])))); ?> ??????? ????? ??????????? ???????? ??????? ???? ?????? ??? ?’?-</span>
					</div>

					<div class="col-md-2 form-group">
					</div>
				</div>

				<?php if($entryform['Entryform']['ovijog']== 1){ ?>
					<div class="row" style="margin-top: 5px">
						<div class="col-md-12 form-group" style="margin-top: -15px; margin-bottom: 5px">
							<span>?????? ????? ???, ?????? ?? ? ??????:   &nbsp &nbsp <?php echo h($entryform['Entryform']['name']); ?> <?php echo', ' ?> <?php echo bangla_number($entryform['Entryform']['cell_no']); ?> <?php echo', ' ?> <?php echo h($entryform['Entryform']['address']); ?></span>
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
							????, <br>
							<?php echo h($entryform['Subcategory']['person_name']); ?> <br>
							<?php echo h($entryform['Subcategory']['Designation']['name']); ?>,
							<?php echo h($entryform['Subcategory']['Childcategory']['name']); ?>
						</p>

							<span style="float: right">
								<p style="text-align: center">
									?????? ???????? ?????? <br>
									?????????, ??????? <br>
									?????? ?? : ???????????<br>
									????? :unoshahrastichandpur@gmail.com
								</p>
							</span>
					</div>
				</div>


				<div class="row">
					<?php if($entryform['Entryform']['bitoron']== 2 ){ ?>
					<div class="col-md-6 form-group">
						<p style="font-size: 14px">?????: ??? ?????/????? ? ??????????   </p>

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
				<div class="col-sm-6 col-md-8 col-lg-9">


					
					<?php echo $this->Form->create('Entryform'); ?>
					<?php echo $this->Form->input('id'); ?>


					<table class="table table-hover">
						<tr>


								<div  class="form-group" id="star">
									<label for="ratingComment" class="col-sm-2 control-label rating-label"> Rating</label>

									<?php if($entryform['Entryform']['rateing']==null ) { ?>

								<p>
								  <span class="starRating">
									<input id="rating5" type="radio" name="data[Entryform][rateing]" value="5">
									<label for="rating5">5</label>
									<input id="rating4" type="radio" name="data[Entryform][rateing]" value="4">
									<label for="rating4">4</label>
									<input id="rating3" type="radio" name="data[Entryform][rateing]" value="3" checked >
									<label for="rating3">3</label>
									<input id="rating2" type="radio" name="data[Entryform][rateing]" value="2">
									<label for="rating2">2</label>
									<input id="rating1" type="radio" name="data[Entryform][rateing]" value="1">
									<label for="rating1">1</label>
								  </span>
									</p>
								</div>
							<?php }else{
								echo $entryform['Entryform']['rateing']. '  <i style="color: #9E2424;"  class="fa fa-star" aria-hidden="true"></i>' .'<br>';
							 } ?>

						</tr>

						<tr>
							<div class="form-group">
								<label for="ratingComment" class="col-sm-2 control-label rating-label">Comment</label>
								<?php if($entryform['Entryform']['rateing']==null ) {
									echo $this->Form->input('Entryform.comment', array('placeholder' => '', 'label' => false, 'div' => array('class' => 'col-md-6'), 'class' => 'form-control input-style-custom', 'id' => 'ratingComment', 'type' => 'textarea'
									));
								}else{
									echo $entryform['Entryform']['comment'];
								}
								?>
							</div>
						</tr>
					</table>
					<?php if($entryform['Entryform']['rateing']==null ) { ?>
					<div >
						<button class="btn btn-primary pull-left" type="submit">Submit</button>
					</div>
					<?php }?>
				</div>

			</div>
		</div>
	</div>
</div>
