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

	$("#trinerName").html($("#BookingType :selected").text());

});
</script>
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

?>
<div class="panel panel-default">
		<div class="row">
			<div class="panel-heading">
				<div class="col-md-6">                               
					<h3 class="panel-title"><?php echo __('Tennis Court Booking Report'); ?></h3>
				</div>
				
				<div class="col-md-6">                               
				<div class="radiobutton">
				
				    <a href="<?php echo $this->webroot . 'bookings/bookingreport'?>"><input id="tennis" type="radio" name="court" value="tennis" checked="checked">
				    <label for="tennis">Tennis Court</label></a>
				    <a href="<?php echo $this->webroot . 'squashbookings/bookingreport'?>"><input id="squash" type="radio" name="court" value="squash">
				    <label for="squash">Squash Court</label></a>
				    
				</div>
		 </div>                              
	</div>
</div>
	<div class="panel-body">
		<div class="table-responsive">
		
		<div class="row">
			        
       			 <div class="col-md-12">
       			   <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'bookingreport'))); ?>
	       			
						 <div class="form-group">
						 
						 	<div class="col-md-1">Type</div>
							<div class="col-md-3"> 
							<?php echo $this->Form->input('type',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> 'All'),'required'=>false,'options'=>$courtName,'type'=>'select'));?>
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
				<tr class="report-header">
					<th><h3>ONLINE TENNIS AND SQUASH BOOKING SYSTEM</h3></th>
				</tr>
				<tr class="report-header">
					<th><?php echo $this->Html->image('logo.png',array('width'=>'100%'))?></th>
				</tr>
				<tr>	
					<th>
						<div class="widget widget-danger widget-padding-sm">
	                    	<div class="widget-big-int">
	                    		<?php  
	                    	
	                    		if(!empty($this->data['Booking']['dailydatefrom']) && !empty($this->data['Booking']['dailydateto'])){
	                    			echo date ( "l,F j, Y", strtotime($this->data['Booking']['dailydatefrom']) ) . '&nbsp; <b> to </b> &nbsp;'. date ( "l,F j, Y", strtotime($this->data['Booking']['dailydateto']) );
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
						Booking Report
					</th>
				</tr>
				<tr>
					<td style="font-size: 14px;">
						<div class="col-md-6 col-xs-6" align="left">Tennis Court</div>
						<p class="col-md-6 col-xs-6">
							<span id="trinerName"></span>
						</p>
					</td>
				</tr>
				<tr style="font-weight: bold">
					<td>
						<div class="col-md-6 col-xs-6" align="left">Total Booked Slots</div>
						
						<p class="col-md-6 col-xs-6">
							<?php  
							
							
							echo $totalbooks[0][0]['id']+$totalncancels[0][0]['cancel'];
							
							
							?>
						</p>
					</td>
				</tr>
				<tr style="font-weight: bold">
					<td>
						<div class="col-md-6 col-xs-6" align="left">Total Checked-in  Slots</div>
						
						<p class="col-md-6 col-xs-6">
							<?php echo $totalbooks[0][0]['id'];?>
						</p>
					</td>
				</tr>
				<tr style="font-weight: bold">
					<td>
						<div class="col-md-6 col-xs-6" align="left">Total Non-Booked Slots</div>
						
						<p class="col-md-6 col-xs-6">
							<?php
							$tabak=$totalbooks[0][0]['id']+$totalncancels[0][0]['cancel'];
							if($tennisesNonbooks>$tabak){
								echo $tennisesNonbooks-$tabak;
							}else{
								echo $tabak-$tennisesNonbooks;
							}
							
							?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-6 col-xs-6" align="left">Prime Bookings</div>
						
						<p class="col-md-6 col-xs-6">
							<?php 
							echo $totalprimes[0][0]['Prime'];
						
							?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-6 col-xs-6" align="left">Non-Prime Bookings</div>
						
						<p class="col-md-6 col-xs-6">
							<?php echo $totalnonprimes[0][0]['NonPrime'];?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-6 col-xs-6" align="left">Day Bookings</div>
						
						<p class="col-md-6 col-xs-6">
							<?php 
							
							
							echo $totaldays[0][0]['days'];?>
						</p>
					</td>
				</tr>
				<tr>
					<td>
						<div class="col-md-6 col-xs-6" align="left">Night Bookings</div>
						
						<p class="col-md-6 col-xs-6">
							<?php echo $totalbooks[0][0]['id']-$totaldays[0][0]['days'];?>
						</p>
					</td>
					</tr>
					<tr>
					<td>
						<div class="col-md-6 col-xs-6" align="left">Total Cancellations</div>
						
						<p class="col-md-6 col-xs-6">
							<?php 
							
							
							echo $totalncancels[0][0]['cancel'];?>
						</p>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<div class="col-md-6 col-xs-6" align="left">Total No-Show</div>
						
						<p class="col-md-6 col-xs-6">
								<?php 
							
							echo $no_fee;
							
							
							?>
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



