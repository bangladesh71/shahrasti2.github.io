
<div class="panel panel-default">

	<div class="panel-heading">                                
	    <h3 class="panel-title"><?php echo __('Fee Settings'); ?></h3>
	    <ul class="panel-controls">
	        
	       <!--<a class="btn btn-success btn-rounded" href="/2015/projects/americanclubs/settings/add">Add New Setting</a>
                           
	    --></ul>                                
	</div>
	<div class="panel-body">
		<div class="table-responsive">
			<table class="table table-bordered table-hover">
			<thead>
			<tr>
					
					<th><?php echo'Rackuet'; ?></th>
					
					<th><?php echo'Dayshift Slot'; ?></th>
					<th><?php echo'Nightshift Slot'; ?></th>
					<th><?php echo'Nightshift Start Time'; ?></th>
					<th><?php echo'Prime No Show'; ?></th>
					<th><?php echo'Non Prime No Show'; ?></th>
					
					<th><?php echo'Status'; ?></th>
					<th><?php echo'Modified'; ?></th>
					<th ><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		 <tbody>
		<?php foreach ($settings as $setting): ?>
		<tr>
			
			<td><?php echo h($setting['Setting']['rackuet'])."$"; ?>&nbsp;</td>

			<td><?php echo h($setting['Setting']['dayShift'])."$"; ?>&nbsp;</td>
			<td><?php echo h($setting['Setting']['nightShift'])."$"; ?>&nbsp;</td>
			<td><?php echo h($setting['Setting']['nightShiftstartTime']); ?>&nbsp;</td>
			<td><?php echo h($setting['Setting']['noShowprime'])."$"; ?>&nbsp;</td>
			<td><?php echo h($setting['Setting']['noShownonprime'])."$"; ?>&nbsp;</td>
			<td><?php echo h($status[$setting['Setting']['status']]); ?>&nbsp;</td>
			<td><?php echo h($setting['Setting']['modified']); ?>&nbsp;</td>
			<td class="actions">
			
		
			<?php echo $this->Html->link(__('<div class="btn btn-success  btn-rounded btn-condensed btn-sm"><span class="fa fa-edit"></span></div>'), array('action' => 'edit', $setting['Setting']['id']),array('escape'=>false)); ?>
			
				
			</td>
		</tr>
		</tbody>
<?php endforeach; ?>
	</table>
	
</div>
</div>


	
</div>
