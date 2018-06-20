<style>
<!--
.form-horizontal {
    min-height: auto;
}
.table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
  line-height: 1;
  padding: 5px;
}
-->
</style>
<br/>
<script>
    var path='<?php echo $this->webroot;?>';
    
    function bookingCancel(id,tid){

        var cond = confirm("A fee will be charged if you canceled within 24 hours of you playing time.");
        if(cond == true){
        	$("#cancelFee").show();
			$(".closeDialog").show();
			$(".confirmDialog").hide();
			$(".cls").hide();
        	$.ajax({
    			type: 'POST',
    			url: path +'tennises/bookingcancel',
    			data: {id:id,tid:tid},
    			success: function(data){
    			
    				
    			}
    		});
        }else{
        }
		
	}

    function myReservation(id){
    	$.ajax({
			type: 'POST',
			data: {id:id},
			success: function(data){
				$("#basketitems").html(data);
			}
		});
  
	
}


</script>
<?php 
	echo $this->Html->script(array('jquery-1.9.1'));
	echo $this->Html->script('jquery-ui');
	echo $this->Html->css('jquery-ui');
	$type=array('1'=>'Tennise-1','2'=>'Tennise-2');

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
<style type="text/css">
            .modalDialog {
                position: relative;
                font-family: Arial, Helvetica, sans-serif;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                background: rgba(0,0,0,0.8);
                z-index: 99999;
                opacity: 0;
                -webkit-transition: opacity 400ms ease-in;
                -moz-transition: opacity 400ms ease-in;
                transition: opacity 400ms ease-in;
                pointer-events: none;
           	 }
                .modalDialog:target {
                    opacity: 1;
                    pointer-events: auto;
                }

				.modalDialog > div {
				  background: rgba(0, 0, 0, 0) linear-gradient(#fff, #999) repeat scroll 0 0;
				  border-radius: 10px;
				  height: auto;
				  margin-left: 0;
				  margin-top: 0;
				  padding: 0;
				  position: absolute;
				  width: 100%;
				}

	            .close {
	                background: #606061;
	                color: #FFFFFF;
	                line-height: 25px;
	                position: absolute;
	                right: -70px;
	                text-align: center;
	                top: -10px;
	                width: 24px;
	                text-decoration: none;
	                font-weight: bold;
	                -webkit-border-radius: 12px;
	                -moz-border-radius: 12px;
	                border-radius: 12px;
	                -moz-box-shadow: 1px 1px 3px #000;
	                -webkit-box-shadow: 1px 1px 3px #000;
	                box-shadow: 1px 1px 3px #000;
	            }
	          

 </style>
  <div class="modalDialog" id="openModal">
	 <div class="row">                        
	    <div class="col-md-12">
	        <form class="form-horizontal" action="#">
		        <div class="panel panel-default">
		          
		            <div class="panel-body form-group-separated">
		            	<div id="basketitems"></div>
		            	
		            	
		            	
		            </div>
		            
		        </div>
	        </form>
	    </div>
	</div>
</div>
<div class="panel panel-default">
		<div class="row">
			<div class="panel-heading">
				<div class="col-md-6">                               
					<h3 class="panel-title"><?php echo __('Tennis Court My Reservation Records'); ?></h3>
				</div>
				
				<div class="col-md-6">                               
			<div class="radiobutton">
				
				    <a href="<?php echo $this->webroot . 'bookings/myreservation'?>"><input id="tennis" type="radio" name="court" value="tennis" checked="checked">
				    <label for="tennis" style="color: #000"> Tennis Court</label></a>
			  	
			
				    <a href="<?php echo $this->webroot . 'squashbookings/myreservation'?>"><input id="squash" type="radio" name="court" value="squash">
				    <label for="squash" style="color: #000">Squash Court</label></a>
				
			</div>
		 </div>                              
	</div>
</div>
	<div class="panel-body">
		
		<div class="row">
			        
       			 <div class="col-md-12">
       			  			<?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'myreservation'))); ?>
	       			
						 <div class="form-group">
						 
						 	<div class="col-md-1">Type</div>
							<div class="col-md-3"> 
							<?php echo $this->Form->input('type',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--All--'),'required'=>false,'options'=>$type));?>
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
  <div class="row">
	<div class="col-md-12">
		<div class="table-responsive">
			<table class="table table-bordered table-hover" style="text-align: center;">
		
				<thead>
					<tr>
						<th>Created </th>
						<th>Slot</th>
						<th>Day</th>
						<th>Trainer </th>
						<th>Pay Type </th>
						<th>Slot Fee($) </th>
						<th>Racket Fee($)</th>
						<th>Trainer Fee($)</th>
						<th>No Show Fee($) </th>
						<th>Total Fee </th>
						<th>Action</th>
					                                    			
					</tr>
				</thead>
				
				<tbody>
				<?php
		   $weekDays=array('1'=>'Saturday','2'=>'Sunday','3'=>'Monday','4'=>'Tuesday','5'=>'Wednesday','6'=>'Thursday','7'=>'Friday');
			
			
			$paymentType=array('1'=>'Account','2'=>'Cash');
				
				foreach($reservations as $reservation){
				    //pr($reservation);
				    
				 
				$t1 = strtotime (date('Y-m-d H:i:s',strtotime($reservation['Booking']['created'])));
				$t2 = strtotime (date('Y-m-d H:i:s',strtotime($reservation['Booking']['modified'])));
				$diff = $t1 - $t2;
				$hours = ceil($diff/(60*60));
					?>
				<tr>
				   	<td><?php //echo $hours;?><?php echo date('Y-m-d h:i:s A',strtotime($reservation['Booking']['created'])); ?></td>
					<td><?php echo $reservation['Booking']['slot'];?></td>
					<td><?php echo $weekDays[$reservation['Booking']['day']];?></td>
					<td><?php echo $reservation['Trainee']['name'];?></td>
					<td><?php echo h($paymentType[$reservation['Booking']['paymentType']]); ?></td>
					<td><?php 
							$trainer=0;
							$racket=0;
							$noshowfee=0;
							
							if($hours<=24){
								if($reservation['Booking']['slot']=='Prime'){
									$noshowfee=$settings['Setting']['noShowprime'];
								}elseif($reservation['Booking']['slot']=='Non-Prime'){
									$noshowfee=$settings['Setting']['noShownonprime'];
								}
							}
							
							if($reservation['Booking']['trainee_id']>0){
								$trainer=$settings['Setting']['trainerRate'];
								
							}
							if($reservation['Booking']['racquet']==1){
								$racket=$settings['Setting']['rackuet'];
								
							}
					 		$slot=0;
		                       if( $reservation['Tennise']['time']<$settings['Setting']['nightShiftstartTime']){
		                       	 echo h($settings['Setting']['dayShift']);
		                       	 $slot=$settings['Setting']['dayShift'];
		                       }else{
		                       	 echo h($settings['Setting']['nightShift']);
		                       	 $slot=$settings['Setting']['nightShift'];
		                       }
		                      
		                      
		
		                       ?></td>
					<td><?php
					 echo h($racket);
					  ?></td>
					<td><?php
					 			echo $trainer;
					  		?>
					  		</td>
					<td><?php echo $noshowfee;?></td>
					<td><?php echo $slot+$trainer+$racket+$noshowfee;?></td>
					<td><?php if($reservation['Booking']['checkIn']==''){?>
					<span ><a href="#openModal" onclick="myReservation(<?php echo $reservation['Booking']['id']?>);" class="btn btn-primary">My Reservation</a></span>
				<?php }?></td>
				
				</tr>
				<?php }?>
				
					
					
					
				</tbody>
				<tfoot>
				
				</tfoot>
			</table>
		</div>
	
	
      <br></br>

	
</div>
	

</div>
</div>
</div>




