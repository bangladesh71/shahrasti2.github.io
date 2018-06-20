<script>
    var path='<?php echo $this->webroot;?>';
    
    function bookingCancel(id,type){
        var cond = confirm("Are you sure to cancel this booking");
        if(cond == true){
        	$("#cancelFee").show();
			$(".closeDialog").show();
			$(".cls").hide();
        	$.ajax({
    			type: 'POST',
    			url: path +'bookings/bookingcancela',
    			data: {id:id,type:type},
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

?>

<script>

$(function() {
	$( "#BookingDailydate").datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
        changeYear: true,
        yearRange:"-100:+50"
	});

});
</script>

<style type="text/css">
		#cancelFee {
              background: transparent none repeat scroll 0 0;
             
              border-radius: 6px;
              color: red;
              margin-bottom: 10px;
              padding: 15px;
              text-align: center;
              font-size:20px;
              font-weight: bold;
            }
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
                	margin-top:5%;
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
	<div class="panel-heading">                                
	    <h3 class="panel-title"><?php echo __('Bookings Cancel'); ?></h3>
	    <ul class="panel-controls">
	       
	         <a class="btn btn-success btn-rounded" href="<?php echo $this->webroot . 'tennises/tenniscourtadmin/1'?>">Create Booking Tennis Court-1</a>
	    </ul>                                
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<div class="row">
			        
       			 <div class="col-md-12">
       			  <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'cancelbooking'))); ?>
	       			
						 <div class="form-group">
							<div class="col-md-1">Member</div>
							<div class="col-md-6"> 
							<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
							</div>
							<div class="col-md-1">Date</div>
							<div class="col-md-3"> 
							<?php echo $this->Form->input('dailydate',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true,'type'=>'text','required'=>false));?>
							</div>
							<div class="col-md-1"> 
							<button class="btn btn-primary pull-right" type="submit">Submit</button>
							</div>
						</div>
						
						
	       			
	       			  <?php echo $this->Form->end(); ?>
       			 </div>
       	 </div>
       	 <br></br>
			<table class="table table-bordered">
			<thead>
			<tr>
					<th style="width: 20px;"><?php echo'ID'; ?></th>
					<th><?php echo'Member'; ?></th>
					<th><?php echo'Type'; ?></th>
					<th><?php echo'Slot'; ?></th>
					<th><?php echo'Day'; ?></th>
					<th><?php echo'Time'; ?></th>
					<th><?php echo'Trainer'; ?></th>
					<th><?php echo'Check Out'; ?></th>
					<th><?php echo'Payment Type'; ?></th>
					<th><?php echo'Status'; ?></th>
					<th><?php echo'Created'; ?></th>
					
					<th style="width: 150px !important;"><?php echo __('Action'); ?></th>
			</tr>
		</thead>
		 <tbody>
		<?php foreach ($bookings as $booking): 
		
		//pr($booking);
		
		 $time=date('H:i:s');

		$weekDays=array('Saturday'=>'1','Sunday'=>'2','Monday'=>'3','Tuesday'=>'4','Wednesday'=>'5','Thursday'=>'6','Friday'=>'7');
		
		//pr($time);
		 $today=$weekDays[date('l')];
		
		?>
	<tr>
		<td><?php echo h($booking['Booking']['id']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($booking['Member']['name'], array('controller' => 'members', 'action' => 'view', $booking['Member']['id'])); ?>
		</td>
		<td><?php echo h($courtName[$booking['Booking']['type']]); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['slot']); ?>&nbsp;</td>
		<td><?php echo h($day[$booking['Booking']['day']]); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['time']); ?>&nbsp;</td>
		
		<td>
			<?php echo $this->Html->link($booking['Trainee']['name'], array('controller' => 'trainees', 'action' => 'view', $booking['Trainee']['id'])); ?>
		</td>
		<td><?php echo h($racquet[$booking['Booking']['racquet']]); ?>&nbsp;</td>
		
		<td><?php echo h($paymentType[$booking['Booking']['paymentType']]); ?>&nbsp;</td>
		
		<td><?php echo h($bookingStatus[$booking['Booking']['status']]); ?>&nbsp;</td>
		<td><?php echo h($booking['Booking']['created']); ?>&nbsp;</td>
		<td class="actions">
		
		<?php if($booking['Booking']['checkIn']==''){?>
			<span ><a href="#openModal" onclick="myReservation(<?php echo $booking['Booking']['id']?>);" class="btn btn-primary">Cancel</a></span>
		<?php }?>
				
			</td>
	</tr>
<?php endforeach; ?>
	</table>
	
	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
</div>
</div>
</div>



	

