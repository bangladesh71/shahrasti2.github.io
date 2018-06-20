<?php //pr($current_user); ?>

<style>
	.table.table-striped.table-bordered.table-hover th {
		font-size: 13px;
	}
</style>

<br/>
<div class="table-responsive" id="print-lay" style="display: none;">
	<table class="table table-bordered" style="text-align: center;">
		<thead>
		<tr>
			<th colspan="3">
				<div class="widget widget-danger widget-padding-sm">
					<div class="widget-big-int plugin-clock">18<span>:</span>59</div>
					<div class="widget-subtitle plugin-date">Sunday, October 25, 2015</div>
					<div class="widget-controls">
						<a title="Remove Widget" data-placement="left" data-toggle="tooltip" class="widget-control-right widget-remove" href="wsdindex.html#"><span class="fa fa-times"></span></a>
					</div>
					<div class="widget-buttons widget-c3">
						<div class="col">
							<a href="wsdindex.html#"><span class="fa fa-clock-o"></span></a>
						</div>
						<div class="col">
							<a href="wsdindex.html#"><span class="fa fa-bell"></span></a>
						</div>
						<div class="col">
							<a href="wsdindex.html#"><span class="fa fa-calendar"></span></a>
						</div>
					</div>
				</div>
			</th>
		</tr>
		</thead>

		<tfoot>

		</tfoot>
	</table>
</div>

<div class="panel-heading">
	<div class="row">
		<div class="col-md-4">
			<div class="page-title">
				<h2 style="text-transform: uppercase"><span class="fa fa-dashboard" style="font-size: 55px;"></span> Dashboard</h2>
			</div>
		</div>

		<div class="col-md-4">
		</div>

		<div class="col-md-4">
			<div class="widget widget-danger widget-padding-sm" style="min-height: 95px;">
				<div class="widget-big-int plugin-clock">18<span>:</span>59</div>
				<div class="widget-subtitle plugin-date" style="font-size: 24px;">Sunday, October 25, 2015</div>
			</div>
		</div>
	</div>

	<div class="row" >
		<div class="col-md-12">

			<!-- START SALES BLOCK -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title-box">
						<h3>Monthly Report</h3>
					</div>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span class="fa fa-exclamation-triangle"></span>
								</div>
								<div class="widget-data">
									<div class="widget-title"> Total Complain </div>
									<div class="widget-int num-count">
										<?php echo $this->Html->link(__($monthdone + $monthworking + $monthpending), array('action' => 'index', 'controller'=>'entryforms')); ?>
										<?php
										//echo $monthdone + $monthworking + $monthpendind;

										 ?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span class="fa fa-exclamation-triangle"></span>
								</div>
								<div class="widget-data">
									<div class="widget-title"> Total Working </div>
									<div class="widget-int num-count">
										<?php
										echo $this->Html->link(__($monthworking), array('action' => 'monthworking', 'controller'=>'entryforms'));
										//echo $monthworking;
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span  class="fa fa-exclamation" aria-hidden="true"></span>
								</div>
								<div class="widget-data">

									<div class="widget-title"> Total Pending</div>
									<div class="widget-int num-count">
										<?php
											echo $this->Html->link(__($monthpending), array('action' => 'monthpending', 'controller'=>'entryforms'));
											//echo $monthpendind ;
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span class="fa fa-check-circle-o"></span>
								</div>
								<div class="widget-data">

									<div class="widget-title"> Total Done</div>
									<div class="widget-int num-count">
										<?php
											echo $this->Html->link(__($monthdone), array('action' => 'monthdone', 'controller'=>'entryforms'));
											//echo $monthdone;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!--Last date & Expire-->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title-box">
						<h3>Deadline Report</h3>
					</div>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<div class="widget widget-default widget-item-icon" style="background: #3d4e5d none repeat scroll 0 0">
								<div class="widget-data" style="color: #F4FA58">
									<div class="widget-title" > Last date (today)</div>
									<div class="widget-int num-count" >
										<?php echo $this->Html->link(__($lastday), array('action' => 'lastday', 'controller'=>'entryforms')); ?>
										<?php //echo $lastday; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="widget widget-default widget-item-icon" style="background: #3d4e5d none repeat scroll 0 0">
								<div class="widget-data" style="color: #e92a5d">
									<div class="widget-title"> Expired</div>
									<div class="widget-int num-count">
										<?php echo $this->Html->link(__($expiredate), array('action' => 'expire', 'controller'=>'entryforms')); ?>
										<?php //echo $expiredate; ?>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="widget-title" style="color: #e92a5d; font-size: 22px !important; text-align: center; mar"> Last 5 Expired Complains</div>
					<div class="table-responsive" style=" width: 100%;">
						<div class="row">
							<div class="col-md-12">

								<div class="widget widget-default widget-item-icon" style="background: #fff none repeat scroll 0 0; box-shadow: none">
									<div class="widget-data" style="color: #e92a5d">

										<div class="widget-int num-count" >
											<table class="table table-striped table-bordered table-hover" style="margin-top: 5px; margin-left: -76px">
												<thead >
												<tr style="font-size: 16px">
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

												<tbody style="font-size: 12px; color: #000; font-weight: normal">
												<tr>
													<?php $id = null; ?>
													<?php foreach ($entryforms as $entryform): //pr($entryform); die();?>
													<?php

													if($entryform['Entryform']['deadline'] < date("Y-m-d") && !empty($entryform['Entryform']['deadline']) ) { ?>

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
															<?php echo $this->Html->link(__('Edit'), array('controller'=>'entryforms','action' => 'edit', $entryform['Entryform']['id'])); ?>
															<?php echo $this->Html->link(__('View'), array('controller'=>'entryforms','action' => 'view', $entryform['Entryform']['id'])); ?>
														</td>
													<?php }	?>
												</tr>
												<?php endforeach; ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>

			<!-- Lifetime Report -->
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title-box">
						<h3> Lifetime Counter </h3>
					</div>
				</div>

				<div class="panel-body">
					<div class="row">
						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span class="fa fa-exclamation-triangle"></span>
								</div>
								<div class="widget-data">
									<div class="widget-title"> Total Complain </div>
									<div class="widget-int num-count">
										<?php
										echo $pending + $working + $done;

										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span class="fa fa-exclamation-triangle"></span>
								</div>
								<div class="widget-data">
									<div class="widget-title"> Total Working </div>
									<div class="widget-int num-count">
										<?php
										echo $this->Html->link(__($working), array('action' => 'lifetimeworking', 'controller'=>'entryforms'));
										//echo $working;
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span  class="fa fa-exclamation" aria-hidden="true"></span>
								</div>
								<div class="widget-data">

									<div class="widget-title"> Total Pending</div>
									<div class="widget-int num-count">
										<?php
											echo $this->Html->link(__($pending), array('action' => 'lifetimepending', 'controller'=>'entryforms'));
											//echo $pending ;
										?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-md-3">
							<div class="widget widget-default widget-item-icon">
								<div class="widget-item-left">
									<span class="fa fa-check-circle-o"></span>
								</div>
								<div class="widget-data">

									<div class="widget-title"> Total Done</div>
									<div class="widget-int num-count">
										<?php
											echo $this->Html->link(__($done), array('action' => 'lifetimedone', 'controller'=>'entryforms'));
											//echo $done;
										?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>



			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title-box">
						<h3>Graph View</h3>
						<span></span>
					</div>
				</div>

				<div class="panel-body">
					<div class="row">

						<?php

						foreach($piechartcount2 as $picht){

							$vx = $picht['0']['total'];
							$ky = $picht['Maincategory']['name'];

							$mainrx[] = "[".$vx."]";
							$mainry[] = "['".$ky."']";

						}

						foreach($piechartcount1 as $picht){

							$v = $picht['0']['total2'];
							$k = $status[$picht['Entryform']['status']];

							$main2v[] = "[".$v."]";
							$main2k[] = "['".$k."']";
						}

						?>

						<?php echo $this->Html->script(
							array(
								'Chart.bundle',
							));?>


						<script>
							var randomScalingFactor = function() {
								return Math.round(Math.random() * 100);
							};
							var randomColorFactor = function() {
								return Math.round(Math.random() * 255);
							};
							var randomColor = function(opacity) {
								return 'rgba(' + <?php echo(implode(',',$mainrx)); ?> + ','  + (opacity || '.3') + ')';
							};

							var config = {
								type: 'pie',
								data: {
									datasets: [{

										data: [
											<?php echo(implode(',',$mainrx)); ?>
										],
										backgroundColor: [
											'#F7464A',
											'#46BFBD',
											'#FDB45C',
											'#949FB1',
											'#4D5360',
											'#F7464A',
											'#46BFBD',
											'#FDB45C',
											'#949FB1',
											'#4D5360',
											'#F7464A',
											'#46BFBD',
											'#FDB45C',
											'#949FB1',
											'#4D5360',
										],
									}],
									labels: [
										<?php echo(implode(',',$mainry)); ?>
									]
								},
								options: {
									responsive: true
								}
							};

							var config2 = {
								type: 'pie',
								data: {
									datasets: [{

										data: [
											<?php echo(implode(',',$main2v)); ?>
										],
										backgroundColor: [
											'#F7464A',
											'#46BFBD',
											'#FDB45C',
											'#949FB1',
											'#4D5360',
											'#F7464A',
											'#46BFBD',
											'#FDB45C',
											'#949FB1',
											'#4D5360',
											'#F7464A',
											'#46BFBD',
											'#FDB45C',
											'#949FB1',
											'#4D5360',
										],
									}],
									labels: [
										<?php echo(implode(',',$main2k)); ?>
									]
								},
								options: {
									responsive: true
								}
							};

							window.onload = function() {
								var ctx = document.getElementById("chart-area").getContext("2d");
								window.myPie = new Chart(ctx, config);

								var ctx2 = document.getElementById("chart-area2").getContext("2d");
								window.myPie = new Chart(ctx2, config2);
							};

							$('#randomizeData').click(function() {
								$.each(config.data.datasets, function(i, piece) {
									$.each(piece.data, function(j, value) {
										config.data.datasets[i].data[j] = randomScalingFactor();
										config.data.datasets[i].backgroundColor[j] = randomColor(0.7);
									});
								});
								window.myPie.update();
							});

							$('#addDataset').click(function() {
								var newDataset = {
									backgroundColor: [randomColor(0.7), randomColor(0.7), randomColor(0.7), randomColor(0.7), randomColor(0.7)],
									data: [randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor(), randomScalingFactor()]
								};

								config.data.datasets.push(newDataset);
								window.myPie.update();
							});

							$('#removeDataset').click(function() {
								config.data.datasets.splice(0, 1);
								window.myPie.update();
							});
						</script>



						<div class="col-md-6">
							<div id="canvas-holder" style="width:70%">
								<h3 style="font-family: "Open Sans",sans-serif">Category Wise</h3>
								<canvas id="chart-area" width="300" height="300" />
							</div>
						</div>

						<div class="col-md-6">
							<div id="canvas-holder" style="width:70%">
								<h3 style="font-family: "Open Sans",sans-serif">Overall</h3>
								<canvas id="chart-area2" width="300" height="300" />
							</div>
						</div>
					</div>
				</div>
			</div>


		</div>
	</div>
</div>



<script type="text/javascript">
	function PrintDoc() {

		var toPrint = document.getElementById('print-lay');

		var popupWin = window.open('', '_blank', '');

		popupWin.document.open();

		popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="http://localhost/2015/projects/americanclu/css/site_css/bootstrap.min.css" /><link rel="stylesheet" type="text/css" href="http://localhost/2015/projects/americanclu/css/site_css/dashboard-print.css" /></head><body onload="window.print()">');

		popupWin.document.write(toPrint.innerHTML);

		popupWin.document.write('</html>');

		popupWin.document.close();

	}
</script>

