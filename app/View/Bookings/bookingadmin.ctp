<style>
.time-title #BookingTimeHour,.time-title #BookingTimeMin,.time-title #BookingTimeMeridian{
	
	width: 32.7%;
	display:inline;
}
.margin-5-0{
	margin-top: 5px;
	margin-bottom: 5px;
}
.table > thead > tr > td, .table > tbody > tr > td, .table > tfoot > tr > td {
  line-height: 1;
}
</style>
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
                    width: auto;
                    height :auto;
                    position: absolute;
                    margin-left:20%;
                	margin-top:15%;
                    padding: 5px 20px 13px 20px;
                    border-radius: 10px;
                    background: #fff;
                    background: -moz-linear-gradient(#fff, #999);
                    background: -webkit-linear-gradient(#fff, #999);
                    background: -o-linear-gradient(#fff, #999);
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
 <?php

 $type=0;
 
 $weekDays=array('Saturday'=>'1','Sunday'=>'2','Monday'=>'3','Tuesday'=>'4','Wednesday'=>'5','Thursday'=>'6','Friday'=>'7');

if(!empty($memberstypes['Member']['type'])){
	$type=$memberstypes['Member']['type'];
}

if($bookinfo['time']<$settings['Setting']['nightShiftstartTime']){
	$slot=$settings['Setting']['dayShift'];
}else{
	$slot=$settings['Setting']['nightShift'];
}

?>

<script type="text/javascript">
var slotp='<?php echo $slot;?>';

function getTrainer(id){

	if(id==1){
      $('.trainer').show();
      $('.totaldollar').html(slotp);
	}else if(id==2){
		$('.trainer').hide();
		$('.rdollar').html('');
		$('.trainerd').html('');

		$dropdown = $("#BookingTraineeId");
	    $dropdown[0].selectedIndex = 0;
	
		
		$('.trainerd').hide();
		if($('#BookingRacquet').val()==2){
			var totaldr=parseFloat(slotp);
		}else{
			if($('#BookingRacquet').val()==1){
				var totaldr=parseFloat(slotp)+parseFloat($('.racketd').html());
			}else{
				$('.racketd').hide();
				var totaldr=parseFloat(slotp);
			}
		}
		
	    $('.totaldollar').html(totaldr);
	}
	
	
}

function getRacket(id){

	if(id==1){

      $('.racketd').show();

      if($('#no-trainee').val()==2){

    	 
    	  var totaldr=parseFloat(slotp)+parseFloat($('.racketd').html());
			
    	  $('.totaldollar').html(totaldr);
      }else{
    	  if($('#no-trainee').val()==1){
    		  var totaldr=parseFloat($('.trainerd').html())+parseFloat(slotp)+parseFloat($('.racketd').html());
    	  }else{

    		  var totaldr=parseFloat(slotp);
    	  }
    	  
    	  $('.totaldollar').html(totaldr);
      }

    	
    	
	}else if(id==2){
		
		if($('#no-trainee').val()==2){
			var totaldr=parseFloat(slotp);
		}else{
			var totaldr=parseFloat(slotp)+parseFloat($('.trainerd').html());
		}
		

		$('.totaldollar').html(totaldr);

		$('.racketd').hide();
	}

  
}


</script>
<script>

	

	var path='<?php echo $this->webroot;?>';
	
    function getTrainerInfo(id){

        	$.ajax({
    			type: 'POST',
    			url: path +'trainees/trainerinfo',
    			data: {id:id},
    			success: function(data){
        			$('.showTrainerInfo').html(data);
    			}
    		});

        	$.ajax({
    			type: 'POST',
    			url: path +'trainees/trainerinfodolar',
    			data: {id:id},
    			success: function(data){
    				$('.trainerd').show();
        			$('.trainerd').html(data);
        			
        			if($('#BookingRacquet').val()==2){
        				var totald=parseFloat(data)+parseFloat(slotp);
        			}else{
        				
        				if($('#BookingRacquet').val()==1){
        					var totald=parseFloat(data)+parseFloat(slotp)+parseFloat($('.racketd').html());
        				}else{
        					$('.racketd').hide()
        					var totald=parseFloat(data)+parseFloat(slotp);
        				}
        				
        			}
        			
        			$('.totaldollar').html(totald);
        			
    			}
    		});
		
	}

    function confirmation(){

		var cond = confirm("Are you sure you want to book this slot? Cancellation fees apply if cancelled less than 24 hours prior to play time.");
		if(cond == true){
			$('#BookingBookingadminForm').submit();
		}else{
		}
	}
</script>


 <div class="modalDialog" id="openModal">
	 <div class="row">
	 	<div class="col-md-12">
			<div id="basketitems"></div>
		</div>
		<div class="col-md-12">
		<div class="col-md-6">
				<?php echo $this->Form->button ( 'Yes', array ('onclick' => "confirmation();", 'type' => 'button', 'label' => false, 'div' => false,'class'=>'btn btn-primary' ) );?>
			</div>
			<div class="col-md-6">
				<a href="#close" class="btn btn-primary" title="Close" class="close">No</a>
			</div>
			
		</div>
		
	</div>
</div>



<div class="row">
				<div class="col-md-12">
                            
                            <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal')); ?>
                              <?php //echo $this->Form->input('id');?>
                            
                           <h4 align="center"><?php
                           $weekDays_new=array('Saturday'=>'1','Sunday'=>'2','Monday'=>'3','Tuesday'=>'4','Wednesday'=>'5','Thursday'=>'6','Friday'=>'7');
                           
                           $today=$weekDays[date('l')];
      
                 			$c_day_new=$dates;
							$c_day_times=date('H:i:s',strtotime($bookinfo['time']));
                           	$c_day_time=date('h:i:s A',strtotime($bookinfo['time']));
                           	
                           
                           	echo date ( "l,F j, Y", strtotime ($c_day_new) ).'&nbsp;&nbsp;&nbsp; '.$c_day_time;
                           	
                           	$final_date=$c_day_new.' '.$c_day_times;
                           
                        
							echo $this->Form->input('created',array('type'=>'hidden','value'=>$final_date));
												
                           ?></h4>
                             <div class="panel panel-default">
                             
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong><?php echo __('Add Booking'); ?></strong>
                                    
                                </div>
                                <div class="panel-body">                                                                        
                                    	
									
                                    <div class="row">
                                        <div class="col-md-6">
                                        
                                             <div class="row margin-5-0">
                                          		<label class="col-md-4 control-label">Member</label>
	                                          	<div class="col-md-8">
	                                          		<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
	                                          	</div>
                                          	</div> 
                                          	<div class="row margin-5-0">
                                          		<label class="col-md-4 control-label">Request a Trainer</label>
	                                          	<div class="col-md-8">
	                                          		<?php echo $this->Form->input('trainee_id',array('empty'=>array(''=>'--select--'),'type'=>'select','options'=>$trainee,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true, 'id'=>'no-trainee','onchange'=>'getTrainer(this.value)'));?>
	                                          	</div>
                                          	</div> 
                                          	<div class="row margin-5-0 trainer" style="display: none;">
												<label class="col-md-4 control-label"> Trainer Name</label>
												<div class="col-md-8"> 
												
												
												<select id="BookingTraineeId" onchange="getTrainerInfo(this.value)" required="required" class="form-control" name="data[Booking][trainee_id]">
														<option value="0">--select--</option>
														
														<?php

														
														foreach($trainees as $trainee){
															
															$start=date('Hi',strtotime($trainee['Trainee']['startLaunch']));
															$end=date('Hi',strtotime($trainee['Trainee']['endtLaunch']));
															
															$startm=date('Hi',strtotime($trainee['Trainee']['startTime']));
															$endm=date('Hi',strtotime($trainee['Trainee']['endTime']));
															$slot_time=date('Hi',strtotime($bookinfo['time']));
															
														   if($startm>=$slot_time || $slot_time<$endm ){
														   if ($start>$slot_time || $slot_time> $end  ){
														   	
														   		
														   	?>
														   
															<option value="<?php echo $trainee['Trainee']['id']?>"><?php echo $trainee['Trainee']['name']?></option>
														
														<?php 
														   }
														   } 
														}
														?>
													</select>
												
													
													
												</div>
											</div>
											<div class="margin-5-0 showTrainerInfo col-md-12" align="center"></div> 
										</div>
										<div class="col-md-6">
											<div class="row margin-5-0">
                                          		<label class="col-md-4 control-label">Racquet Rental</label>
												<div class="col-md-8"> 
													<?php echo $this->Form->input('racquet',array('empty'=>array(''=>'--select--'),'type'=>'select','options'=>$racquet,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true,'onchange'=>'getRacket(this.value)'));?>
												</div>
                                          	</div>
											<div class="row margin-5-0">
                                          		<label class="col-md-4 control-label">Payment Type</label> 
                                                <div class="col-md-8">
                                                     <?php echo $this->Form->input('paymentType',array('empty'=>array(''=>'--select--'),'type'=>'select','options'=>$paymentType,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
                                                </div>
                                          	</div>
                                        </div>
                                 </div>
                                    
                                    		<div class="table-responsive">
                                    			<table class="table table-bordered">
	                                    			<thead>
	                                    				<tr>
	                                    					<th>Time</th>
		                                    				<th>Slot</th>
		                                    				<th>Day</th>
		                                    				<th>Slot ($)</th>
		                                    				<th>Trainer ($)</th>
		                                    				<th>Racket ($)</th>
		                                    				<th>Total ($)</th>
	                                    				</tr>
	                                    			</thead>
	                                    			<tbody>
	                                    				<tr>
	                                    					<td><?php echo $c_day_time;?></td>
	                                    					<td><?php echo $bookinfo['slot'];?></td>
	                                    					<td><?php echo $bookinfo['day'];?></td>
	                                    					<td><?php echo $slot;?></td>
	                                    					<td><div class="trainerd"  style="display: none;"></div></td>
	                                    					<td><div class="racketd"  style="display: none;"><?php echo $settings['Setting']['rackuet'];?></div></td>
	                                    					<td><div class="totaldollar" style="color: #1261ba;font-weight: bold;"></div></td>
	                                    				</tr>
	                                    			</tbody>
	                                    		</table>
                                    		</div>
										 </div>
										 <div class="panel-footer">
	                                   		 <div class="row">
	                                   		 	<div class="col-md-6 col-xs-6" align="right">
		                                   		 	<?php echo $this->Form->button ( 'Book Now', array ('onclick' => "confirmation();", 'type' => 'button', 'label' => false, 'div' => false,'class'=>'btn btn-primary' ) );?>
		                                   		 </div>
		                                   		 <div class="col-md-6 col-xs-6" align="left">
		                                   		 	<a onclick="self.history.back();" href="#" class="btn btn-danger">Go Back</a></h3>
		                                   		 </div>
	                                   		 </div>
                                		</div>
                                
                            </div>
                            <div> </div>
                            
                            
							
                         <?php echo $this->Form->end(); ?>
                            
                        </div>
                        </div>
              
                        <script>
                        $(document).ready(function(){

                        	$('.totaldollar').html(<?php echo $slot;?>);
                        });
                                                </script>
                        
