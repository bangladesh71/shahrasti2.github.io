
<div class="row">
<div class="col-md-12">
                            
                            <?php echo $this->Form->create('User',array('type'=>'file','class'=>'form-horizontal')); ?>
                              <?php echo $this->Form->input('id');?>
                            
                           
                             <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong><?php echo __('Edit User'); ?></strong></h3>
                                    <ul class="panel-controls">
                                        <!--<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    --></ul>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            
                                             <div class="form-group">
								                <label class="col-md-3 control-label">Photo</label>
								                <div class="col-md-9">                                            
								                    <div class="input-group">
								                        <?php echo $this->Form->input('photo',array('type'=>'file','label'=>false,'div'=>false));?>
								                    </div>                                            
								                </div>
								            </div>
                                           <div class="form-group">
												<label class="col-md-3 control-label">Name</label>
												<div class="col-md-9"> 
													<?php
														echo $this->Form->input('name',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											<div class="form-group">
												<label class="col-md-3 control-label">User ID</label>
												<div class="col-md-9"> 
													<?php
														echo $this->Form->input('username',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											
											<div class="form-group">
												<label class="col-md-3 control-label">Password</label>
												<div class="col-md-9"> 
													<?php
														echo $this->Form->input('password',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
													?>
												</div>
											</div>
											
                                            </div>
                                            <div class="col-md-6">
                                            	<div class="form-group">
													<label class="col-md-3 control-label">Email</label>
													<div class="col-md-9"> 
														<?php
															echo $this->Form->input('email',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
														?>
													</div>
												</div>
	                                      		<div class="form-group">
													<label class="col-md-3 control-label">Mobile No</label>
													<div class="col-md-9"> 
														<?php
															echo $this->Form->input('mobileNo',array('label'=>false,'div'=>false,'class'=>'form-control','required'=>true));
														?>
													</div>
												</div>
	                                           
	                                             <div class="form-group">                                        
	                                                <label class="col-md-3 control-label">Role</label>
	                                                <div class="col-md-9 col-xs-12">
	                                                        <?php echo $this->Form->input('role',array('type'=>'select','options'=>$role,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
	                                                    </div>             
	                                                </div>
	                                          
	                                             <div class="form-group">                                        
	                                                <label class="col-md-3 control-label">Status</label>
	                                                <div class="col-md-9 col-xs-12">
	                                                        <?php echo $this->Form->input('status',array('type'=>'select','options'=>$ustatus,'label'=>false,'div'=>false,'class'=>'form-control','required'=>true));?>
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

