<script>
    var path='<?php echo $this->webroot;?>';
    
    function bookingCancel(id){

        var cond = confirm("Are you sure to cancel this booking");
        if(cond == true){
        	$.ajax({
    			type: 'POST',
    			url: path +'bookings/bookingcancel',
    			data: {id:id},
    			success: function(data){
    				location.href="<?php echo $this->here;?>";
    			}
    		});
        }else{
        }
		
	}
</script>

<div class="panel panel-default">
	<div class="panel-heading">                                
	    <h3 class="panel-title"><?php echo  "Report of " . date("d-m-Y l") ; ?></h3>
	    <!--<ul class="panel-controls">
	        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
	        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
	        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
	    </ul>                                
	--></div>
	<div class="panel-body">
	<div class="row">
			        
       			 <div class="col-md-12">
       			  <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'seereport'))); ?>
	       			
						 <div class="form-group">
							<div class="col-md-1">Select Court</div>
							<div class="col-md-2"> 
							<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
							</div>
							
							<div class="col-md-1">Select Time</div>
							<div class="col-md-2"> 
							<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
							</div>
							
							<div class="col-md-1">Select Slot</div>
							<div class="col-md-2"> 
							<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
							</div>
							
							<div class="col-md-1"> 
							<button class="btn btn-primary pull-right" type="submit">Submit</button>
							</div>
						</div>
						
						
						
	       			
	       			  <?php echo $this->Form->end(); ?>
       			 </div>
       	 </div>
       	 <br></br>
       			
		<div class="table-responsive">
			<table class="table table-bordered">
			<thead>
			<tr>
			
			<tr>
					<th><?php echo'Court Option'; ?></th>
			</tr>
			
					<th style="width: 20px;"><?php echo'Total Slots'; ?></th>
					<?php foreach ($tennises as $tenisreport): ;
						
					?>	
					<td><?php echo $tenisreport['Tennise']['total']; ?>&nbsp;</td>
					<?php endforeach; ?>
				</tr>	
				<tr>	
					<th><?php echo'Prime Slots '; ?></th>
					
				</tr>	
				<tr>
					<th><?php echo'Non-Prime Slots'; ?></th>
					
				</tr>	
				<tr>
					<th><?php echo'Booked'; ?></th>
					<?php foreach ($bookeds as $nonprime){?>
					<td><?php echo $nonprime['Booking']['booked']?></td>
					<?php }?>
				</tr>	
				<tr>
					<th><?php echo'Prime Booked'; ?></th>
					<?php foreach ($primeslot as $prime){?>
					<td><?php echo $prime['Booking']['prime']?></td>
					<?php }?>
				</tr>	
				<tr>
					<th><?php echo'Non-Prime Booked'; ?></th>
					<?php foreach ($nonprimeslot as $nonprime){?>
					<td><?php echo $nonprime['Booking']['nonprime']?></td>
					<?php }?>
				</tr>	
				<tr>
					<th><?php echo'Total Canceled'; ?></th>
				</tr>
				<tr>
					<th><?php echo'Prime Canceled'; ?></th>
				</tr>
				<tr>
					<th><?php echo'Non-Prime Canceled'; ?></th>
				</tr>	
				<tr>
					<th><?php echo'Total Non-Booked'; ?></th>
				</tr>
				<tr>
					<th><?php echo'Prime Non-Booked'; ?></th>
				</tr>
				
				<tr>
					<th><?php echo'Non-Prime Non-Booked'; ?></th>
				</tr>
					
				<tr>
					<th><?php echo'Total Member Booked'; ?></th>
					
				</tr>
				<tr>
					<th><?php echo'Full Member'; ?></th>
					<?php 
						foreach ($fulls as $booking){
					
						//pr($booking);
					?>
					<td>
						<?php 
							
							echo $booking['Member']['full']; 
							
						?>
					</td>
					<?php }?>
					</tr>
					<tr>
					<th><?php echo'Genarel Member'; ?></th>
					<?php 
						foreach ($generals as $booking){
					
						//pr($booking);
					?>
					<td>
						<?php 
							
							echo $booking['Member']['general']; 
							
						?>
					</td>
					
					<?php }?>
			</tr>
			<tr>
					<th><?php echo'Payment by Accouunt'; ?></th>
				</tr>
				
				<tr>
					<th><?php echo'Payment by Caaash'; ?></th>
				</tr>
				
				<tr>
					<th><?php echo'Check In'; ?></th>
				</tr>
				
				<tr>
					<th><?php echo'Check Out'; ?></th>
				</tr>
				
				<tr>
					<th><?php echo'No Show'; ?></th>
				</tr>
			
		</thead>
		 <tbody>
		
	

	</table>
	
		</div>
	</div>
</div>