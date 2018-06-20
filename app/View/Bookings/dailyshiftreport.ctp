<?php echo $this->Html->css('report-print')?>
<br/>
<?php 
	echo $this->Html->script(array('jquery-1.9.1'));
	echo $this->Html->script('jquery-ui');
	echo $this->Html->css('jquery-ui');

?>
<script>

$(function() {
	$( "#BookingDailydate").datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
        changeYear: true,
        yearRange:"-100:+50"
	});


	$("#trinerName").html($("#BookingTraineeId :selected").text());

});
</script>
	<div class="panel panel-default">
		<div class="row">
			<div class="panel-heading">
				<div class="col-md-6">                               
					<h3 class="panel-title"><?php echo __('Tennis Court Daily Shift Reports'); ?></h3>
				</div>
				
				<div class="col-md-6">                               
				<div class="radiobutton">
				
				    <a href="<?php echo $this->webroot . 'bookings/dailyshiftreport'?>"><input id="tennis" type="radio" name="court" value="tennis" checked="checked">
				    <label for="tennis">Tennis Court</label></a>
				    <a href="<?php echo $this->webroot . 'squashbookings/dailyshiftreport'?>"><input id="squash" type="radio" name="court" value="squash">
				    <label for="squash">Squash Court</label></a>
				    
				</div>
		 </div>                              
	</div>
</div>
		<div class="panel-body">
					<div class="row">
						        
			       			 <div class="col-md-12" style="font-size: 13px;">
			       			   <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'dailyshiftreport'))); ?>
									 <div class="form-group">
									 	<div class="col-md-1">Trainer</div>
										<div class="col-md-3"> 
										<?php echo $this->Form->input('trainee_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> 'All'),'required'=>false));?>
										</div>
										<div class="col-md-1">Date</div>
										<div class="col-md-2"> 
										<?php echo $this->Form->input('dailydate',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true,'type'=>'text'));?>
										</div>
										<div class="col-md-2"> 
										<button class="btn btn-primary pull-left" type="submit">Submit</button>
										</div>
									</div>
				       			  <?php echo $this->Form->end(); ?>
			       			 </div>
			       			 
			       	 </div>
			       	 <br/>
			<div class="col-md-10">
				<div class="table-responsive" id="main-lay">
				<table class="table table-bordered" style="text-align: center;">
					<thead>
						<tr>
							<th><h3>ONLINE TENNIS AND SQUASH BOOKING SYSTEM</h3></th>
						</tr>
						<tr>
							<th><?php echo $this->Html->image('logo.png',array('width'=>'100%'))?></th>
						</tr>
						<tr>
							<th>
								<div class="widget widget-danger widget-padding-sm">
			                    	<div class="widget-big-int">
			                    		<?php  
			                    	
			                    		if(!empty($this->data['Booking']['dailydate'])){
			                    		echo date ( "l,F j, Y", strtotime($this->data['Booking']['dailydate']) );
			                    		}else{
			                    			echo date ( "l,F j, Y", time() );
			                    		}
			                    			
			                    		?></div>                            
			                    </div> 
							</th>
						</tr>
					</thead>
					<tbody>
					
					<tr>
							<th>
								Daily Shift Report
							</th>
						</tr>
						<tr>
							<td style="font-size: 14px;">
								<div class="col-md-6 col-xs-6" align="left">Trainer Name</div>
								<p class="col-md-6 col-xs-6">
									<span id="trinerName"></span>
								</p>
							</td>
						</tr>
						<tr style="font-weight: bold;">
							<td>
								<div class="col-md-6 col-xs-6" align="left">Total Check-Ins</div>
								<p class="col-md-6 col-xs-6">
									<?php echo $checkins[0][0]['checkIn']?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6 col-xs-6" align="left">No Show Fee</div>
								<p class="col-md-6 col-xs-6">
									<?php 
									
									$no_fee=0;
									$slot=0;
									$trainer=0;
									$racket=0;
									$cash=0;
									$accout=0;
									
									foreach($feeinfos as $feeinfo){
										$slot=$slot+$feeinfo['Feeinfo']['slotFee'];
										$no_fee=$no_fee+$feeinfo['Feeinfo']['noShowFee'];
										$trainer=$trainer+$feeinfo['Feeinfo']['trainerFee'];
										$racket=$racket+$feeinfo['Feeinfo']['racketFee'];
										$total=$feeinfo['Feeinfo']['slotFee']+$feeinfo['Feeinfo']['noShowFee']+$feeinfo['Feeinfo']['trainerFee']+$feeinfo['Feeinfo']['racketFee'];
										
										if($feeinfo['Feeinfo']['paymentType']==1){
											$accout=$accout+$total;
										}else{
											$cash=$cash+$total;
										}
										
									}
									
									echo $no_fee;
									
									
									?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6 col-xs-6" align="left">Trainer Fee</div>
								<p class="col-md-6 col-xs-6">
									<?php echo $trainer;?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6 col-xs-6" align="left">Racquet Fee</div>
								<p class="col-md-6 col-xs-6">
									<?php 
									
									
									echo $racket;?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
							
								<div class="col-md-6 col-xs-6" align="left">Fee charged in Account</div>
								<p class="col-md-6 col-xs-6">
									<?php echo $accout;?>
								</p>
							</td>
						</tr>
						<tr>
							<td>
								<div class="col-md-6 col-xs-6" align="left">Fee paid in Cash</div>
								<p class="col-md-6 col-xs-6">
									<?php echo $cash;?>
								</p>
							</td>
						</tr>
						<tr style="font-weight: bold;">
							<td>
								<div class="col-md-6 col-xs-6" align="left">Total Fee Collected</div>
								<p class="col-md-6 col-xs-6">
									<?php echo $accout+$cash
									;?>
								</p>
							</td>
						
						</tr>
						
						
					</tbody>
					<tfoot>
						<tr>
							<td align="right">
								<span style="font-size: 10px;">Developed By : IPSITA COMPUTERS PTE LTD</span>
							</td>
						</tr>
					</tfoot>
				</table>
				
				
				
			</div>
			<div align="center">
				<button class="btn btn-warning print" href="#" onclick="PrintDoc()" style="font-size:20px; margin-bottom: 10px;">Print Report</button>
			</div>
			</div>
	</div>
	</div>
<script type="text/javascript">
    function PrintDoc() {

   	 	//popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="http://localhost/2015/americanclub/css/theme-default.css"/><link rel="stylesheet" type="text/css" href="http://localhost/2015/americanclub/css/bootstrap.min.css"/><link rel="stylesheet" type="text/css" href="http://localhost/2015/americanclub/css/report-print.css"/></head><body onload="window.print()">');

        var toPrint = document.getElementById('main-lay');

        var popupWin = window.open('', '_blank', '');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="http://ipsitasoft.com/americanclubs/css/theme-default.css"/><link rel="stylesheet" type="text/css" href="http://ipsitasoft.com/americanclubs/css/bootstrap.min.css"/><link rel="stylesheet" type="text/css" href="http://ipsitasoft.com/americanclubs/css/report-print.css"/></head><body onload="window.print()">');

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }
</script>


