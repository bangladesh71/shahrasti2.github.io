
<div class="row">                        
 
    <div class="col-md-12">
        
        <form class="form-horizontal" action="#">
        <div class="panel panel-default">
            <div class="panel-body">
                <h3><span class="fa fa-pencil"></span> <?php echo __('Setting'); ?></h3>
            </div>
            <div class="panel-body form-group-separated">
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Rackuet'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($setting['Setting']['rackuet']); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Slot'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($setting['Setting']['slot']); ?>
                    </div>
                </div>
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('No Show'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($setting['Setting']['noShow']); ?>
                       
                    </div>
                </div>
               
               
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Status'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo $status[$setting['Setting']['status']]; ?>
                       
                    </div>
                </div>
                
                
                 <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Created'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($setting['Setting']['created']); ?>
                       
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-md-3">
                    	<?php echo __('Modified'); ?>
                    </label>
                    <div class="col-md-9">
                       <?php echo h($setting['Setting']['modified']); ?>
                       
                    </div>
                </div>
                
                
            </div>
        </div>
        </form>
        <?php echo $this->Html->link(__('Edit Setting'), array('action' => 'edit', $setting['Setting']['id']),array('class'=>'btn btn-primary btn-rounded')); ?>
    </div>
</div>
