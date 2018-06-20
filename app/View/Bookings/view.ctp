
<div class="row">                        
 
    <div class="col-md-12">
        
        <form class="form-horizontal" action="#">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><span class="fa fa-pencil"></span> <?php echo __('Bookings'); ?></h3>
            </div>
            <div class="panel-body form-group-separated">
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Id'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['id']); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Member'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo $this->Html->link($booking['Member']['name'], array('controller' => 'members', 'action' => 'view', $booking['Member']['id'])); ?>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Day'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($day[$booking['Booking']['day']]); ?>
                       
                    </div>
                </div>
               
               <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Time'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['time']); ?>
                       
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Trainee'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo $this->Html->link($booking['Trainee']['name'], array('controller' => 'trainees', 'action' => 'view', $booking['Trainee']['id'])); ?>
                       
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Racquet'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($racquet[$booking['Booking']['racquet']]); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Check In'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['checkIn']); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Check Out'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['checkOut']); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Status'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($status[$booking['Booking']['status']]); ?>
                       
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
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Type'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($courtName[$booking['Booking']['type']]); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Created'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['created']); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Modified'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($booking['Booking']['modified']); ?>
                       
                    </div>
                </div>
                
                
            </div>
        </div>
        </form>
        <?php echo $this->Html->link(__('<div class="btn btn-success  btn-rounded btn-condensed btn-sm"><span class="fa fa-edit"></span></div>'), array('action' => 'edit', $booking['Booking']['id']),array('escape'=>false)); ?>
    </div>
</div>
