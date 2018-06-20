<script>
	function rfresh(){
		location.href="<?php echo $this->here;?>";
	}
</script>
<?php //pr($tennise);?>

<div class="panel-body">
	<h3><span class="fa fa-pencil"></span> <?php echo __('Booking Information'); ?></h3>
</div>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Created </th>
				<th>Time</th>
				<th>Slot</th>
				<th>Day</th>
				<th>Trainer </th>
			                                    			
			</tr>
		</thead>
		<?php 
		
		$weekDays=array('1'=>'Saturday','2'=>'Sunday','3'=>'Monday','4'=>'Tuesday','5'=>'Wednesday','6'=>'Thursday','7'=>'Friday');
		
		$c_day_new=date("d", strtotime($weekDays[$tennise['Booking']['day']].' this week', strtotime(date('Y-m-d'))));
		
		$date=date('Y-m-d',strtotime($tennise['Booking']['created']));
		
		$t1 = strtotime (date('Y-m-d H:i:s',strtotime($tennise['Booking']['created'])));
		$t2 = strtotime ( date('Y-m-d H:i:s'));
		$diff = $t1 - $t2;
		$hours = ceil($diff/(60*60));
	
	
	
		?>
		<tbody>
			<tr>
				<td><?php echo $date; ?></td>
				<td><?php echo date('h:i A',strtotime($tennise['Tennise']['time'])); ?></td>
				<td><?php echo $tennise['Booking']['slot'];?></td>
				<td><?php echo $weekDays[$tennise['Booking']['day']];?></td>
				<td><?php echo $tennise['Trainee']['name'];?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="panel-body">
	<h3><span class="fa fa-pencil"></span> <?php echo __('Fee Information'); ?></h3>
</div>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>Pay Type </th>
				<th>Slot Fee($) </th>
				<th>Racket Fee($)</th>
				<th>Trainer Fee($)</th>
				<th>Total Fee </th>
			                                    			
			</tr>
		</thead>
		
		<?php 
			$paymentType=array('1'=>'Account','2'=>'Cash');
		?>
		<tbody>
			<tr>
				<td><?php echo h($paymentType[$tennise['Booking']['paymentType']]); ?></td>
				<td><?php 
				
			
				$trainer=0;
				$racket=0;
				$noshowfee=0;
				
				if($hours<=24){
					if($tennise['Booking']['slot']=='Prime'){
						$noshowfee=$settings['Setting']['noShowprime'];
					}elseif($tennise['Booking']['slot']=='Non-Prime'){
						$noshowfee=$settings['Setting']['noShownonprime'];
					}
				}
				
				if($tennise['Booking']['trainee_id']>0){
					$trainer=$settings['Setting']['trainerRate'];
					
				}
				if($tennise['Booking']['racquet']==1){
					$racket=$settings['Setting']['rackuet'];
					
				}
				 		$slot=0;
	                       if( $tennise['Tennise']['time']<$settings['Setting']['nightShiftstartTime']){
	                       	 echo h($settings['Setting']['dayShift']);
	                       	 $slot=$settings['Setting']['dayShift'];
	                       }else{
	                       	 echo h($settings['Setting']['nightShift']);
	                       	 $slot=$settings['Setting']['nightShift'];
	                       }
	                      
	                      
	
	                       ?>
					
				</td>
				<td><?php
				 echo $racket;
				  ?></td>
					<td>
					
				  		<?php
				 			echo $trainer;
				  		?>
				  		
				  </td>
				<td><?php echo $slot+$trainer+$racket;?></td>
			</tr>
		</tbody>
	</table>
</div>

<div class="col-md-3"></div>
<div class="col-md-6">
	<div id="cancelFee" style="display: none;"> Your No Show Fee $ <?php echo $noshowfee;?></div>
</div>
<div class="col-md-3"></div>
<div class="col-md-12">
<div class="row">
			<?php
					
					$week = $tennise['Booking']['weeks'];
		
					
					
					$time = date('hi', strtotime($tennise['Tennise']['time']));
                           
					$days = date('Ymd', strtotime($weekDays[$tennise['Booking']['day']]));
					$tenid=$week.$days.$time;
			
					$tid=$tennise['Tennise']['id'];
			
					
			
			?>
	<div class="col-md-4">	
			<?php echo $this->Form->button ( 'Do You Want to Cancel?', array ('onclick' => "bookingCancel('$tid','$tenid');", 'type' => 'button', 'label' => false, 'div' => false,'class'=>'btn btn-primary confirmDialog' ) );?>
	</div>
	<div class="col-md-4">	
			<button onclick="rfresh();" class="btn btn-primary closeDialog"  style="display: none;">Close</button>
	</div>
	<div class="col-md-4">
		<a href="#close" class="btn btn-danger cls" title="No" >No</a>
	</div>
</div>
</div>                                   	
	


