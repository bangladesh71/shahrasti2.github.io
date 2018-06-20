

<?php 
	echo $this->Html->script(array('jquery-1.9.1'));
	echo $this->Html->script('jquery-ui');
	echo $this->Html->css('jquery-ui');

?>
<script>

$(function() {
	$( "#ReportCreated").datepicker({
		dateFormat: "yy-mm-dd",
		changeMonth: true,
        changeYear: true,
        yearRange:"-100:+50"
	});

});
</script>
<div class="panel panel-default">
	<div class="panel-heading">                                
	    <h3 class="panel-title"><?php echo __('Bookings Info'); ?></h3>
	    <ul class="panel-controls">
	       <a class="btn btn-success btn-rounded" href="<?php echo $this->webroot . 'tennises/tenniscourtadmin/1'?>">Create Booking Tennis Court-1</a>
	      <a class="btn btn-success btn-rounded" href="<?php echo $this->webroot . 'tennises/tenniscourtadmin/2'?>">Create Booking Tennis Court-2</a>
	    </ul>                                
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<div class="row">
       			 <div class="col-md-12">
       			  <?php echo $this->Form->create('Report',array('class'=>'form-horizontal','url' => array('controller'=>'bookings','action'=>'index'))); ?>
	       			
						 <div class="form-group">
							<div class="col-md-3"> 
								<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--Member--'),'required'=>false,'placeholder'=>'Member'));?>
							</div>
							<div class="col-md-3"> 
								<?php echo $this->Form->input('type',array('options'=>$courtName,'label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--Court--'),'required'=>false,'placeholder'=>'Type'));?>
							</div>
							<div class="col-md-3"> 
								<?php echo $this->Form->input('slot',array('options'=>$slots,'label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--Slot--'),'required'=>false,'placeholder'=>'Member'));?>
							</div>
							<div class="col-md-2"> 
								<?php echo $this->Form->input('created',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false));?>
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
					<th><?php echo'Racquet'; ?></th>

					<th><?php echo'Payment Type'; ?></th>
					
					<th><?php echo'Status'; ?></th>
					<th><?php echo'Created'; ?></th>
					
					<th style="width: 150px !important;"><?php echo __('Action'); ?></th>
			</tr>
		</thead>
		 <tbody>
		<?php foreach ($bookings as $booking): 
		
		//pr($booking);
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
			<?php echo $this->Html->link(__('<div class="btn btn-info btn-rounded btn-condensed btn-sm"><span class="fa fa-eye"></span></div>'), array('action' => 'view', $booking['Booking']['id']),array('escape'=>false)); ?>
			<?php echo $this->Html->link(__('<div class="btn btn-success  btn-rounded btn-condensed btn-sm"><span class="fa fa-edit"></span></div>'), array('action' => 'edit', $booking['Booking']['id']),array('escape'=>false)); ?>
			<?php //echo $this->Form->postLink(__('<div class="btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></div>'), array('action' => 'delete', $booking['Booking']['id']), array('escape'=>false,'confirm' => __('Are you sure you want to delete # %s?', $booking['Booking']['id']))); ?>

				
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



	

