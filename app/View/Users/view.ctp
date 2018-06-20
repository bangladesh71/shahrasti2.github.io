

<div class="row">                        
 
    <div class="col-md-10">
        
        <form class="form-horizontal" action="#">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><span class="fa fa-pencil"></span> <?php echo __('User'); ?></h3>
            </div>
            <div class="panel-body form-group-separated">
            <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Image'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php
				if($user['User']['role']==2){
				$files='img/upload/member/'.$user['Member']['id'].'.png';
				if(is_file($files)){
				echo $this->Html->image('upload/member/' .$user['Member']['id'] . '.png',array('style'=>'width:50px; height:60px;'));
				}else{
				echo $this->Html->image('no_img.jpg',array('title'=>'No image Available','style'=>'width:50px; height:60px;'));
				}}else{
				$files='img/upload/user/'.$user['User']['id'].'.png';
				if(is_file($files)){
				echo $this->Html->image('upload/user/' .$user['User']['id'] . '.png',array('style'=>'width:50px; height:60px;'));
				}else{
				echo $this->Html->image('no_img.jpg',array('title'=>'No image Available','style'=>'width:50px; height:60px;'));
				}
				}
				?>
                    </div>
                </div>
            
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Name'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($user['User']['name']); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Mobile No'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($user['User']['mobileNo']); ?>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Email'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($user['User']['email']); ?>
                       
                    </div>
                </div>
               
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Status'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo $status[$user['User']['status']]; ?>
                       
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Created'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($user['User']['created']); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Modified'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($user['User']['modified']); ?>
                       
                    </div>
                </div>
                
                
            </div>
        </div>
        </form>
        <?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id']),array('class'=>'btn btn-primary btn-rounded')); ?>
    </div>
</div>