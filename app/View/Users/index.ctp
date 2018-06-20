<div class="panel panel-default">
	<div class="panel-heading">
	    <h3 class="panel-title"><?php echo __('Users Info'); ?></h3>
	    <ul class="panel-controls">
	       <a class="btn btn-success btn-rounded" href="<?php echo $this->webroot?>users/add">Add New User</a>
	    </ul>
	</div>
	<div class="panel-body">
		<div class="table-responsive">
		<div class="row">
			        
       			 <div class="col-md-12">
       			  <?php echo $this->Form->create('Report',array('class'=>'form-horizontal','url' => array('controller'=>'users','action'=>'index'))); ?>
	       			
						 <div class="form-group">
							<div class="col-md-3"> 
								<?php echo $this->Form->input('role',array('options'=>$role,'label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--Role--'),'required'=>false,'placeholder'=>'Member'));?>
							</div>
							<div class="col-md-3"> 
								<?php echo $this->Form->input('mobileNo',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>false,'placeholder'=>'Mobile No'));?>
							</div>
							
							
							<div class="col-md-1"> 
							<button class="btn btn-primary pull-right" type="submit">Submit</button>
							</div>
						</div>
	       			  <?php echo $this->Form->end(); ?>
       			 </div>
       	 </div>
       	 <br></br>
			<table class="table table-bordered table-hover">
			<thead>
			<tr>
					<th><?php echo'Picture'; ?></th>
					<th><?php echo'Name'; ?></th>
					<th><?php echo'Mobile No'; ?></th>
					<th><?php echo'Email'; ?></th>
					<th><?php echo'Username'; ?></th>
					<th><?php echo'Role'; ?></th>
					<th><?php echo'Status'; ?></th>
					<th><?php echo'Modified'; ?></th>
					<th ><?php echo __('Actions'); ?></th>
			</tr>
		</thead>
		 <tbody>
		<?php foreach ($users as $user): //pr($user);?>
		<tr>
			<td><?php
				if($user['User']['role']==3 || $user['User']['role']==3 ){
					$files='img/upload/user/'.$user['User']['id'].'.png';
					if(is_file($files)){
						echo $this->Html->image('upload/user/' .$user['User']['id'] . '.png',array('style'=>'width:50px; height:60px;'));
					}else{
						echo $this->Html->image('no_img.jpg',array('title'=>'No image Available','style'=>'width:50px; height:60px;'));
					}
				}else{
				$files='img/upload/user/'.$user['User']['id'].'.png';
				if(is_file($files)){
				echo $this->Html->image('upload/user/' .$user['User']['id'] . '.png',array('style'=>'width:50px; height:60px;'));
				}else{
				echo $this->Html->image('no_img.jpg',array('title'=>'No image Available','style'=>'width:50px; height:60px;'));
				}
				}
				?></td>
			<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['mobileNo']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['email']); ?>&nbsp;</td>
			<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
			<td><?php echo $role[$user['User']['role']]; ?>&nbsp;</td>
			<td><?php echo h($ustatus[$user['User']['status']]); ?>&nbsp;</td>
			<td><?php echo h($user['User']['modified']); ?>&nbsp;</td>
			<td class="actions">
			
			<?php echo $this->Html->link(__('<div class="btn btn-info btn-rounded btn-condensed btn-sm"><span class="fa fa-eye"></span></div>'), array('action' => 'view', $user['User']['id']),array('escape'=>false)); ?>
			<?php echo $this->Html->link(__('<div class="btn btn-success  btn-rounded btn-condensed btn-sm"><span class="fa fa-edit"></span></div>'), array('action' => 'edit', $user['User']['id']),array('escape'=>false)); ?>
			<?php if($user['User']['role']!=1 ){
				echo $this->Form->postLink(__('<div class="btn btn-danger btn-rounded btn-condensed btn-sm"><span class="fa fa-times"></span></div>'), array('action' => 'delete', $user['User']['id']), array('escape'=>false,'confirm' => __('Are you sure you want to delete %s?', $user['User']['name'])));
			} ?>

			</td>
		</tr>
		</tbody>
<?php endforeach; ?>
	</table>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
	
</div>
</div>

	
