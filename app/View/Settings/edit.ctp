<div class="row">
<div class="col-md-12">
                            
                            <?php echo $this->Form->create('Setting',array('class'=>'form-horizontal')); ?>
                              <?php echo $this->Form->input('id');?>
                            
                           
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong><?php echo __('Edit Fee Setting'); ?></strong></h3>
                                    <ul class="panel-controls">
                                        <!--<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    --></ul>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="col-md-4 control-label">Rackuet</label>
                                                <div class="col-md-8">     
                                                 	<?php echo $this->Form->input('rackuet',array('label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));?>
                                            	</div>
                                            </div>
											<div class="form-group">
												<label class="col-md-4 control-label"">Day Shift</label>
												<div class="col-md-8"> 
													<?php
														echo $this->Form->input('dayShift',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label"">Night Shift</label>
												<div class="col-md-8"> 
													<?php
														echo $this->Form->input('nightShift',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label"">Night Shift Start Time</label>
												<div class="col-md-8 time-title"> 
													<?php
														echo $this->Form->input('nightShiftstartTime',array('label'=>false,'div'=>false,'class'=>'form-control time-3part','required'=>true));
													?>
												</div>
											</div>
											
                                         </div>
                                         <div class="col-md-6">
                                         	<div class="form-group">
												<label class="col-md-4 control-label">Prime No Show</label>
												<div class="col-md-8"> 
													<?php
														echo $this->Form->input('noShowprime',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Non Prime No Show</label>
												<div class="col-md-8"> 
													<?php
														echo $this->Form->input('noShownonprime',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-4 control-label">Trainer Rate</label>
												<div class="col-md-8"> 
													<?php
														echo $this->Form->input('trainerRate',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
                                            <div class="form-group">                                        
                                                <label class="col-md-4 control-label">Status</label>
                                                <div class="col-md-8 col-xs-12">
                                                        <?php echo $this->Form->input('status',array('type'=>'select','options'=>$status,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
                                                    </div>             
                                            </div>
                                         </div>
											
                                        
                                    </div>
										 </div>
									<div class="panel-footer">
	                                    <button class="btn btn-primary pull-left" type="submit">Submit</button>
	                                </div>
                                </div>
                                
                            </div>
                         <?php echo $this->Form->end(); ?>
                            
                        </div>

