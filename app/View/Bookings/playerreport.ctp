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
	    <h3 class="panel-title"><?php echo __('Player Report'); ?></h3>
	                                
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		
		<div class="row">
			        
       			 <div class="col-md-12" style="font-size: 13px;">
       			   <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'playerreport'))); ?>
	       			
						 <div class="form-group">
						 
						 	<div class="col-md-1">Player</div>
							<div class="col-md-2"> 
							<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--All--'),'required'=>false));?>
							</div>
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
<div class="col-md-10">
	<div class="table-responsive" id="main-lay">
		<table class="table table-bordered" style="text-align: center;font-size: 13px;">
			<thead>
				<tr>
					<th colspan="3"><h3>ONLINE TENNIS AND SQUASH BOOKING SYSTEM</h3></th>
				</tr>
				<tr>
					<th colspan="3"><?php echo $this->Html->image('logo.png',array('width'=>'100%'))?></th>
				</tr>
				<tr>
					<th colspan="3">
						<div class="widget widget-danger widget-padding-sm">
	                    	<div class="widget-big-int">
	                    		<?php  
	                    	
	                    		if(!empty($this->data['Booking']['dailydatefrom']) && !empty($this->data['Booking']['dailydateto'])){
	                    			echo date ( "l,F j, Y", strtotime($this->data['Booking']['dailydatefrom']) ) . '&nbsp; <b> to &nbsp;</b> '. date ( "l,F j, Y", strtotime($this->data['Booking']['dailydateto']) );
	                    		}else if(!empty($this->data['Booking']['dailydatefrom'])){
	                    			echo date ( "l,F j, Y", strtotime($this->data['Booking']['dailydatefrom']) );
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
						Title
					</th>
					<th>
						Tennis Player Report
					</th>
					<th>
						Squash Player Report
					</th>
				</tr>
				<tr style="font-weight: bold;">
					<td>
						<div class="" align="left">Total Booking</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $totalbooks[0][0]['id'];?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $squashtotalbooks[0][0]['id'];?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="" align="left">Total Prime Booking</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php 
							echo $totalprimes[0][0]['Prime'];
						
							?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							N/A
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="" align="left">Total Non-Prime Bookings</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $totalnonprimes[0][0]['NonPrime'];?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							N/A
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="" align="left">Total Cancellations</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $totalncancels[0][0]['cancel'];?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php echo $squashtotalncancels[0][0]['cancel'];?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="" align="left">Total No-show</div>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php 
							$no_fee=0;
							
							
							foreach($totalnoshowfees as $noshowfee){
								
								$created=strtotime($noshowfee['Booking']['created']);
								$modified=strtotime($noshowfee['Booking']['modified']);
					
								$t1 = strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['created'])));
								$t2 =  strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['modified'])));
								$diff = $t1 - $t2;
								$hours = ceil($diff/(60*60));
							
								if($hours<=24){
								
									if($noshowfee['Booking']['slot']=='Prime'){
										$no_fee=$no_fee+$settings['Setting']['noShowprime'];
									}elseif($noshowfee['Booking']['slot']=='Non-Prime'){
										 $no_fee=$no_fee+$settings['Setting']['noShownonprime'];
										
									}
								}
							}
							echo $no_fee;
							
							
							?>
						</p>
					</td>
					<td style="font-size: 14px;">
						<p class="">
							<?php 
							$squashno_fee=0;
							
							
							foreach($squashtotalnoshowfees as $squashnoshowfee){
								
								$created=strtotime($squashnoshowfee['Squashbooking']['created']);
								$modified=strtotime($squashnoshowfee['Squashbooking']['modified']);
					
								$t1 = strtotime (date('Y-m-d H:i:s',strtotime($squashnoshowfee['Squashbooking']['created'])));
								$t2 =  strtotime (date('Y-m-d H:i:s',strtotime($squashnoshowfee['Squashbooking']['modified'])));
								$diff = $t1 - $t2;
								$hours = ceil($diff/(60*60));
							
								if($hours<=24){
										$squashno_fee=$no_fee+$settings['Setting']['noShownonprime'];
								}
							}
							echo $squashno_fee;
							?>
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


