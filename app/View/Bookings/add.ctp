<style>
.time-title #BookingTimeHour,.time-title #BookingTimeMin,.time-title #BookingTimeMeridian{
	
	width: 32.7%;
	display:inline;
}

</style>

<script type="text/javascript">
	

</script>
<div class="row">
				<div class="col-md-12">
                            
                            <?php echo $this->Form->create('Booking',array('class'=>'form-horizontal')); ?>
                              <?php //echo $this->Form->input('id');?>
                            
                           
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong><?php echo __('Add Booking'); ?></strong></h3>
                                    <ul class="panel-controls">
                                       
                                    </ul>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-12">
                                             <div class="form-group">
                                                <label class="col-md-3 control-label">Member</label>
                                                <div class="col-md-9 col-xs-12">     
                                                                                 
                                                 	<?php echo $this->Form->input('member_id',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
                                              
                                                </div>
                                            </div>
                                           <div class="form-group">
												<label class="col-md-3 control-label"">Day</label>
												<div class="col-md-9"> 
													<?php
														echo $this->Form->input('name',array('type'=>'select','options'=>$day,'empty'=>'Please select','label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											
                                            
											
											<div class="form-group">
												<label class="col-md-3 control-label">Time</label>
												<div class="col-md-9 time-title"> 
													<?php
														echo $this->Form->input('time',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											
											 <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Trainee</label>
                                                <div class="col-md-9 col-xs-12">
                                                        <?php echo $this->Form->input('checkOut',array('type'=>'select','options'=>$checkOut,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
                                                    </div>             
                                                </div>
											
											<div class="form-group">
												<label class="col-md-3 control-label">Trainee_id</label>
												<div class="col-md-9"> 
													<?php
														echo $this->Form->input('trainee_id',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">Racquet</label>
												<div class="col-md-9"> 
													<?php echo $this->Form->input('type',array('type'=>'select','options'=>$racquet,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
												</div>
											</div>
                                      		
                                                 <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Payment Type</label>
                                                <div class="col-md-9 col-xs-12">
                                                        <?php echo $this->Form->input('paymentType',array('type'=>'select','options'=>$paymentType,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
                                                    </div>             
                                                </div>
                                                
                                                <div class="form-group">                                        
                                                <label class="col-md-3 control-label">Court Name</label>
                                                <div class="col-md-9 col-xs-12">
                                                        <?php echo $this->Form->input('type',array('type'=>'select','options'=>$courtName,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
                                                    </div>             
                                                </div>
                                                
                                                
                                                
                                            </div>
											
                                        
                                    </div>
										 </div>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                                </div>
                            </div>
                         <?php echo $this->Form->end(); ?>
                            
                        </div>
