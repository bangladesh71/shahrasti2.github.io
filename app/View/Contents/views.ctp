<style>
<!--

.form-group-separated .form-group {
  border-bottom: 1px dashed #d5d5d5;
  margin-bottom: 0;
}
.form-group-separated {
  border-top: 1px dashed #d5d5d5;
}
.form-group-separated .form-group [class^="col-md-"]:first-child {
  border-left: 0 none;
}
.form-group-separated .form-group [class^="col-md-"] {
  border-left: 1px dashed #d5d5d5;
  padding: 5px 10px !important;
}
.form-group-separated.panel-body, .form-group-separated.modal-body {
  padding-top: 0;
  padding-bottom: 0;
}
.form-group-separated .form-group:last-child {
  border-bottom: 0 none;
}
form {
  margin-right: 0;
  width: 100%;
}

.table td:first-child {
  padding-left: 8px;
}
h4{
	color: #00AAFF;
	font-weight: bold;
	font-size: 18px;
}
-->
</style>
<?php 



?>
                        <div style="padding: 20px 20px 0 20px" class="col-md-4">
                            
                            <form class="form-horizontal" action="#">
                            <div class="panel panel-default"> 
                            	<div class="panel-body">
                                    <h4>Academic Info</h4>
                                </div>                               
                                <?php //pr($student);?>
                                <div class="panel-body form-group-separated">
                                    <div class="panel-body" style="padding-bottom: 0;">
	                                    <div class="text-center">
	                                     <?php

	                                     $check = WWW_ROOT."img/upload/student/" . $student['Student']['id'].'.png';
						
										if(file_exists($check)){
											echo $this->Html->image('upload/student/'.$student['Student']['id'].'.png',array('width'=>'170','class'=>'img-thumbnail'));
										}else{
											echo $this->Html->link($this->Html->image('no_img.jpg'),array('controller'=>'pages','action'=>'index'),array('escape'=>false));
										}
	                                     
	                                     
	                                     ?>   
	                                    </div>                                    
	                                </div>
                                    <div class="form-group">                                        
                                        <div align="center" class="col-md-12">
                                            <?php echo h($student['Student']['first_name'.$bn_val] .' '. $student['Student']['last_name'.$bn_val]); ?>;
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><?php echo __('ID'); ?></label>
                                        <div class="col-md-8">
                                            <?php echo h($student['Student']['id'.$bn_val]); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Shift</label>
                                        <div class="col-md-8">
                                            <?php echo $student['Shift']['name'.$bn_val]?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><?php echo __('Class'); ?></label>
                                        <div class="col-md-8">
                                            <?php echo $student['Clse']['name'.$bn_val]?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Group</label>
                                        <div class="col-md-8">
                                            Science
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Section</label>
                                        <div class="col-md-8">
                                            <?php echo $section_class[$student['Studentclass']['Schoolyearclass']['section_id']]?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Roll No</label>
                                        <div class="col-md-8">
                                            <?php echo $student['Studentclass']['roll_no']?>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            
                        </div>
                        <div style="padding: 20px 0 0" class="col-md-8">
                            
                            <form class="form-horizontal" action="#">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h4>Personal Info</h4>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group" style="border-bottom: 1px dashed #d5d5d5;">
                                        <label class="col-md-2 control-label">Name</label>
                                        <div class="col-md-4">
                                            <b><?php echo h($student['Student']['first_name'.$bn_val] .' '. $student['Student']['last_name'.$bn_val]); ?>;</b>
                                        </div>
                                        <label class="col-md-2 control-label">Gender</label>
                                        <div class="col-md-4">
                                            <?php echo $sex[$student['Student']['gender'.$bn_val]]; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><?php echo __('Date Of Birth'); ?></label>
                                        <div class="col-md-4">
                                            <?php 
												if(empty($bn_val)){
													echo date('d-m-Y ',strtotime($student['Student']['dob']));
												}else{
													echo $bangla->bangla_number(date('d-m-Y',strtotime($student['Student']['dob'])));
												}
											?>
                                        </div>
                                        <label class="col-md-2 control-label">Age</label>
                                        <div class="col-md-4">
                                            <?php 
												if(empty($bn_val)){
													echo date('d-m-Y ',strtotime($student['Student']['age']));
												}else{
													echo $bangla->bangla_number(date('d-m-Y',strtotime($student['Student']['age'])));
												}
											?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-2 control-label"><?php echo __('Blood Groups'); ?></label>
                                        <div class="col-md-4">
                                            <?php echo $bloodgroup[$student['Student']['bloodGroups'.$bn_val]]; ?>
                                        </div>
                                        <label class="col-md-2 control-label"><?php echo __('Student'.'\'s'.' Cell'); ?></label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['mobile'.$bn_val]); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group" style="border-bottom: 1px dashed #d5d5d5;">
                                        <label class="col-md-2 control-label">Email</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['studentemail'.$bn_val]); ?>
                                        </div>
                                        <label class="col-md-2 control-label">Nationality</label>
                                        <div class="col-md-4">
                                            Bangladeshi
                                        </div>
                                    </div>   
								</div>   
								
                                <div class="panel-body">
                                    <h4>Guardian Info</h4>
                                </div>
                                
                                <div class="panel-body form-group-separated">     
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo __('Father'.'\'s'.' Name'); ?></label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['father_name'.$bn_val]); ?>
                                        </div>
                                        <label class="col-md-1 control-label">Cell</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['fathercell'.$bn_val]); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">National ID</label>
                                        <div class="col-md-9">
                                            <?php echo h($student['Student']['fathernationalid'.$bn_val]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Father's Occupation</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['fatheroccupation'.$bn_val]); ?>
                                        </div>
                                        <label class="col-md-1 control-label">Email</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['fatheremail'.$bn_val]); ?>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Occupation Address</label>
                                        <div class="col-md-9">
                                            <?php echo h($student['Student']['fatheroccupationAddress'.$bn_val]); ?>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-md-3 control-label"><?php echo __('Mother'.'\'s'.' Name'); ?></label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['mother_name'.$bn_val]); ?>
                                        </div>
                                        <label class="col-md-1 control-label">Cell</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['mothercell'.$bn_val]); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">National ID</label>
                                        <div class="col-md-9">
                                            <?php echo h($student['Student']['mothernationalid'.$bn_val]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Mother's Occupation</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['motheroccupation'.$bn_val]); ?>
                                        </div>
                                        <label class="col-md-1 control-label">Email</label>
                                        <div class="col-md-4">
                                            <?php echo h($student['Student']['motheremail'.$bn_val]); ?>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group" style="border-bottom: 1px dashed #d5d5d5;">
                                        <label class="col-md-3 control-label">Occupation Address</label>
                                        <div class="col-md-9">
                                            <?php echo h($student['Student']['motheroccupationAddress'.$bn_val]); ?>
                                        </div>
                                    </div> 
                                </div>
                                
                                <div class="panel-body">
                                    <h4>Emergency Info</h4>
                                </div>
                                
                                <div class="panel-body form-group-separated">     
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Name of contact person</label>
                                        <div class="col-md-8">
                                            <?php echo h($student['Student']['contactperson'.$bn_val]); ?>
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Contact Number</label>
                                        <div class="col-md-8">
                                            <?php echo h($student['Student']['mobileHome'.$bn_val]); ?>
                                        </div>
                                    </div>
                                    <div class="form-group" style="border-bottom: 1px dashed #d5d5d5;">
                                        <label class="col-md-4 control-label">Relation with contact person</label>
                                        <div class="col-md-8">
                                            <?php echo h($student['Student']['relation'.$bn_val]); ?>
                                        </div>
                                        
                                    </div>
                                    
                                </div>
                                <div class="panel-body">
                                    <h4>Financial Info</h4>
                                </div>
                                
                                <div class="table-responsive" style="margin: 10px;">
                                	<table width="100%" class="table table-bordered table-hover" style="border: 1px solid #d5d5d5; ">
	                                	<thead>
	                                		<tr>
	                                			<th>
	                                				Date
	                                			</th>
	                                			<th>
	                                				Type of Fee
	                                			</th>
	                                			<th>
	                                				Payment Mode
	                                			</th>
	                                			<th>
	                                				Amount 
	                                			</th>
	                                			<th>
	                                				Remark's
	                                			</th>
	                                		</tr>
	                                	</thead>
	                                	<tbody>
	                                		<tr>
	                                			<td>
	                                				24-06-2015
	                                			</td>
	                                			<td>
	                                				Admission fee
	                                			</td>
	                                			<td>
	                                				Cash
	                                			</td>
	                                			<td>
	                                				6,000.00
	                                			</td>
	                                			<td>
	                                				xyz
	                                			</td>
	                                		</tr>
	                                	</tbody>
	                                </table>
                                </div>
                                <div class="panel-body form-group-separated">     
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Total Fees Receivable</label>
                                        <div class="col-md-8">
                                            10,000
                                        </div>
                                    </div>  
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Total Dues</label>
                                        <div class="col-md-8" style="color: red;">
                                            4,000
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            </form>
                            

                        </div>
                        
                  