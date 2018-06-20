<?php echo $this->Html->css('report-print')?>
<br/>
<?php 
	echo $this->Html->script(array('jquery-1.9.1'));
	echo $this->Html->script('jquery-ui');
	echo $this->Html->css('jquery-ui');

?>
<script>

$(function() {
	$( "#BookingDailydatefrom,#BookingDailydateto").datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
        changeYear: true,
        yearRange:"-100:+50"
	});

	

});
</script>

<div class="panel panel-default">
	<div class="panel-heading">                                
	    <h3 class="panel-title"><?php echo __('Revenue Report'); ?></h3>
	                                
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		
		<div class="row">
			        
       			 <div class="col-md-12">
       			   <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'revenuereport'))); ?>
	       			
						 <div class="form-group">
						 
							<div class="col-md-1">From</div>
							<div class="col-md-2"> 
							<?php echo $this->Form->input('dailydatefrom',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true,'type'=>'text'));?>
							</div>
							
							<div class="col-md-1">To</div>
							<div class="col-md-2"> 
							<?php echo $this->Form->input('dailydateto',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true,'type'=>'text','required'=>false));?>
							</div>
							<div class="col-md-1"> 
							<button class="btn btn-primary pull-right" type="submit">Submit</button>
							</div>
						</div>
	       			  <?php echo $this->Form->end(); ?>
       			 </div>
       	 </div>
      <br></br>
<div class="col-md-12">
	<div class="table-responsive" id="main-lay">
		<table class="table table-bordered" style="text-align: center; font-size: 13px;">
			<thead>
				<tr class="report-header">
					<th colspan="3"><h3>ONLINE TENNIS AND SQUASH BOOKING SYSTEM</h3></th>
				</tr>
				<tr class="report-header">
					<th colspan="3"><?php echo $this->Html->image('logo.png',array('width'=>'100%'))?></th>
				</tr>
				<tr>
					<th colspan="3">
						<div class="widget widget-danger widget-padding-sm">
								<div class="widget-big-int">
		                    		<?php  
			                    		if(!empty($this->data['Booking']['dailydatefrom']) && !empty($this->data['Booking']['dailydateto'])){
			                    			echo date ( "l,F j, Y", strtotime($this->data['Booking']['dailydatefrom']) ) . '&nbsp;&nbsp; to &nbsp;&nbsp;'. date ( "l,F j, Y", strtotime($this->data['Booking']['dailydateto']) );
			                    		}else if(!empty($this->data['Booking']['dailydatefrom'])){
			                    			echo date ( "l,F j, Y", strtotime($this->data['Booking']['dailydatefrom']) );
			                    		}else{
			                    			echo date ( "l,F j, Y", time() );
			                    		}
		                    		?>
	                    		</div>  
	                    	                           
	                    </div> 
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<th>
						Title
					</th>
					<th>
						Tennis Revenue Report
					</th>
					<th>
						Squash Revenue Report
					</th>
				</tr>
					<?php 
					
									$squashno_fee=0;
									$squashslot=0;
									$squashtrainer=0;
									$squashracket=0;
									$squashcash=0;
									$squashaccout=0;
									$squashtotalfee=0;
									foreach($squashfeeinfos as $squashfeeinfo){
										
										$squashslot=$squashslot+$squashfeeinfo['Squashfeeinfo']['slotFee'];
										$squashno_fee=$squashno_fee+$squashfeeinfo['Squashfeeinfo']['noShowFee'];
										$squashtrainer=$squashtrainer+$squashfeeinfo['Squashfeeinfo']['trainerFee'];
										$squashracket=$squashracket+$squashfeeinfo['Squashfeeinfo']['racketFee'];
										$squashtotal=$squashfeeinfo['Squashfeeinfo']['slotFee']+$squashfeeinfo['Squashfeeinfo']['noShowFee']+$squashfeeinfo['Squashfeeinfo']['trainerFee']+$squashfeeinfo['Squashfeeinfo']['racketFee'];
									
										$squashtotalfee=$squashtotalfee+$squashtotal;
									}
								
									
									$no_fee=0;
									$slot=0;
									$trainer=0;
									$racket=0;
									$cash=0;
									$accout=0;
									$totalfee=0;
									foreach($feeinfos as $feeinfo){
										
										$slot=$slot+$feeinfo['Feeinfo']['slotFee'];
										$no_fee=$no_fee+$feeinfo['Feeinfo']['noShowFee'];
										$trainer=$trainer+$feeinfo['Feeinfo']['trainerFee'];
										$racket=$racket+$feeinfo['Feeinfo']['racketFee'];
										$total=$feeinfo['Feeinfo']['slotFee']+$feeinfo['Feeinfo']['noShowFee']+$feeinfo['Feeinfo']['trainerFee']+$feeinfo['Feeinfo']['racketFee'];
									
										$totalfee=$totalfee+$total;
									}
								
									
									
									?>
				<tr>
					<td>
						<div class="" align="left">Tennis Court Fee</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $slot;?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $squashslot;?>
						</p>
					</td>
				</tr>
				<tr>	
					<td>
						<div class="" align="left">No-Show Fee</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $no_fee;?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $squashno_fee;?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="" align="left">Racquet Fee</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $racket;?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $squashracket;?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="" align="left">Trainer Fee</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $trainer;?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $squashtrainer;?>
						</p>
					</td>
				</tr>
				<tr style="font-weight: bold">
					<td>
						<div class="" align="left">Total Fee Collected</div>
					</td>
					<td style="font-size: 14px;" colspan="2">
						<p class="">
							<?php echo $totalfee+$squashtotalfee;?>
						</p>
					</td>
				</tr>
				
			</tbody>
			<tfoot>
				<tr>
					<td align="right" colspan="3">
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
</div>
<script type="text/javascript">
    function PrintDoc() {

        var toPrint = document.getElementById('main-lay');

        var popupWin = window.open('', '_blank', '');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="http://ipsitasoft.com/americanclubs/css/theme-default.css"/><link rel="stylesheet" type="text/css" href="http://ipsitasoft.com/americanclubs/css/bootstrap.min.css"/><link rel="stylesheet" type="text/css" href="http://ipsitasoft.com/americanclubs/css/report-print.css"/></head><body onload="window.print()">');

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }
</script>