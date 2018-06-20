
<div class="row">                        
 
    <div class="col-md-12">
        
        <form class="form-horizontal" action="#">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><span class="fa fa-pencil"></span> <?php echo __('Account Information'); ?></h3>
            </div>
            <div class="panel-body form-group-separated">
            	<div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Membership ID'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Member']['membershipId']); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Member Name'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Member']['name']); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Date'); ?>
                    </label>
                    <div class="col-md-9">
                           <?php echo h($booking['Booking']['created']); ?>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Time'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Tennise']['time']); ?>
                       
                    </div>
                </div>
               
               <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Slot Fee'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php 
                       $slot=0;
                       if( $booking['Tennise']['time']<$settings['Setting']['nightShiftstartTime']){
                       	 echo h($settings['Setting']['dayShift']);
                       	 $slot=$settings['Setting']['dayShift'];
                       }else{
                       	 echo h($settings['Setting']['nightShift']);
                       	 $slot=$settings['Setting']['nightShift'];
                       }
                      
                      

                       ?>
                       
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Trainer Fee'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo $settings['Setting']['trainerRate']; ?>
                       
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Racquet Fee'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($settings['Setting']['rackuet']); ?>
                       
                    </div>
                </div>
                <?php if(empty($booking['Booking']['checkIn'])){?>
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('No Show Fee'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['checkIn']); ?>
                       
                    </div>
                </div>
                <?php } ?>
              
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Total Fee'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo ($settings['Setting']['trainerRate']+$settings['Setting']['rackuet']+$slot); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Payment Type'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($paymentType[$booking['Booking']['paymentType']]); ?>
                       
                    </div>
                </div>
              
            </div>
        </div>
        </form>
    </div>
</div>
