<br/>
<div class="table-responsive" id="print-lay" style="display: none;">
	<table class="table table-bordered" style="text-align: center;">
		<thead>
			<tr>
				<th colspan="3">
					<div class="widget widget-danger widget-padding-sm">
                                <div class="widget-big-int plugin-clock">18<span>:</span>59</div>                            
                                <div class="widget-subtitle plugin-date">Sunday, October 25, 2015</div>
                                <div class="widget-controls">                                
                                    <a title="Remove Widget" data-placement="left" data-toggle="tooltip" class="widget-control-right widget-remove" href="wsdindex.html#"><span class="fa fa-times"></span></a>
                                </div>                            
                                <div class="widget-buttons widget-c3">
                                    <div class="col">
                                        <a href="wsdindex.html#"><span class="fa fa-clock-o"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="wsdindex.html#"><span class="fa fa-bell"></span></a>
                                    </div>
                                    <div class="col">
                                        <a href="wsdindex.html#"><span class="fa fa-calendar"></span></a>
                                    </div>
                                </div>                            
                            </div> 
				</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<th colspan="3">
					Daily Shift Report
				</th>
			</tr>
			<tr>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
			</tr>
			<tr>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
			</tr>
			<tr>
				<th colspan="3">
					Booking Report
				</th>
			</tr>
			<tr>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
				<td>
					Daily Shift Report
					<p>
						100
					</p>
				</td>
			</tr>
		</tbody>
		<tfoot>
		
		</tfoot>
	</table>
</div>			

	<div class="panel-heading">
		<!--<h3 align="left" class="col-md-6 col-xs-6">AEEA Court Report</h3>
		
		--><!-- START WIDGETS -->                    
                    <div class="row">
                    	
                        <div class="col-md-4">
                        	<div class="page-title">                    
			                    <h2 style="text-transform: uppercase"><span class="fa fa-dashboard" style="font-size: 55px;"></span> Dashboard</h2>
			                </div>
                        </div>
						<div class="col-md-4">
							<!--<div align="center">
								<button class="btn btn-warning print" href="#" onclick="PrintDoc()" style="font-size:20px; margin-bottom: 10px;">Print Report</button>
							</div>		
														
                    	--></div>
                    	<div class="col-md-4">
                            <!-- START WIDGET CLOCK -->
                            <div class="widget widget-danger widget-padding-sm" style="min-height: 95px;">
                                <div class="widget-big-int plugin-clock">18<span>:</span>59</div>                            
                                <div class="widget-subtitle plugin-date" style="font-size: 24px;">Sunday, October 25, 2015</div>
                            </div>                        
                            <!-- END WIDGET CLOCK -->
                        </div>
	</div><!--
	//////<div>                    
                
                 PAGE CONTENT WRAPPER 
                <div class="page-content-wrap">
                    
                    
                        </div>
                        
                        <div class="row">
                        <div class="col-md-12">
                            
                             START SALES BLOCK 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Daily Shift Report</h3>
                                        <span></span>
                                    </div>                                     
                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row">
				                        <div class="col-md-4">
				                            
				                             START WIDGET SLIDER 
				                             
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-check-circle"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> Total Check-Ins</div>
				                                    <div class="widget-int num-count">
                                                     <?php echo $checkins[0][0]['checkIn']?>
                                                    </div>
				                                </div>      
				                                
				                            </div>
				                                 
				                             END WIDGET SLIDER 
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                             START WIDGET REGISTRED 
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-exclamation-triangle"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> No Show Fee</div>
				                                    <div class="widget-int num-count">
                                                        <?php 
						
						$no_fee=0;
						$cashno_fee=0;
						foreach($noshowfees as $noshowfee){
							
							$created=strtotime($noshowfee['Booking']['created']);
							$modified=strtotime($noshowfee['Booking']['modified']);
				
							$t1 = strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['created'])));
							$t2 =  strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['modified'])));
							$diff = $t1 - $t2;
							$hours = ceil($diff/(60*60));
						
							if($hours<=24){
							
								if($noshowfee['Booking']['slot']=='Prime'){
									$no_fee=$no_fee+$settings['Setting']['noShowprime'];
								}elseif($noshowfee['Booking']['slot']=='Non-Prime'){
									 $no_fee=$no_fee+$settings['Setting']['noShownonprime'];
									
								}
							}
						}
						
						foreach($cashnoshowfees as $cashnoshowfee){
							
							$created=strtotime($cashnoshowfee['Booking']['created']);
							$modified=strtotime($cashnoshowfee['Booking']['modified']);
				
							$t1 = strtotime (date('Y-m-d H:i:s',strtotime($cashnoshowfee['Booking']['created'])));
							$t2 =  strtotime (date('Y-m-d H:i:s',strtotime($cashnoshowfee['Booking']['modified'])));
							$diff = $t1 - $t2;
							$hours = ceil($diff/(60*60));
						
							if($hours<=24){
							
								if($cashnoshowfee['Booking']['slot']=='Prime'){
									$cashno_fee=$cashno_fee+$settings['Setting']['noShowprime'];
								}elseif($cashnoshowfee['Booking']['slot']=='Non-Prime'){
									 $cashno_fee=$cashno_fee+$settings['Setting']['noShownonprime'];
									
								}
							}
						}
						echo $no_fee;
					
						//pr($settings);
						
						?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                            </a>                         
				                             END WIDGET REGISTRED 
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                             START WIDGET REGISTRED 
				                            
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-male"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> Trainer Fee</div>
				                                    <div class="widget-int num-count">
                                                      	<?php echo $trainerfees[0][0]['trainee_id']*$settings['Setting']['trainerRate'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                 
				                             END WIDGET REGISTRED 
				                            
				                            
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                             START WIDGET REGISTRED 
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-neuter"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> Racquet fee</div>
				                                    <div class="widget-int num-count">
                           
														<?php echo $racquetfees[0][0]['racquet']*$settings['Setting']['rackuet'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                            
				                             END WIDGET REGISTRED     
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                             START WIDGET REGISTRED 
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-credit-card"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title">
				                                    <?php 
														$total_fee=($no_fee+($trainerfees[0][0]['trainee_id']*$settings['Setting']['trainerRate'])+($racquetfees[0][0]['racquet']*$settings['Setting']['rackuet']));
														$total_cashfee=($cashno_fee+($cashtrainerfees[0][0]['trainee_id']*$settings['Setting']['trainerRate'])+($cashracquetfees[0][0]['racquet']*$settings['Setting']['rackuet']));
														?>
				                                     fee charge to acount</div>
				                                    <div class="widget-int num-count">
                                                        <?php echo $total_fee-$total_cashfee;?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                     
				                             END WIDGET REGISTRED 
				                            
				                            
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                             START WIDGET REGISTRED 
				                            
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-archive"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> fee paid to cash</div>
				                                    <div class="widget-int num-count">
                                                       <?php echo $total_cashfee;?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                    
				                             END WIDGET REGISTRED 
				            
				                        </div>
				                        
				                         <div class="col-md-4">
				                            
				                             START WIDGET REGISTRED 
				                            
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-arrows-alt"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> total fee collected</div>
				                                    <div class="widget-int num-count">
                                                        <?php echo $total_fee;?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                             
				                             END WIDGET REGISTRED 
				            
				                        </div>
				                        
				                         
				                        
				                        
				                    </div>                                   
                                </div>
                            </div>
                             END SALES BLOCK 
                            
                        </div>
                        
                    </div>
                        
                    </div>
                    --><!-- END WIDGETS -->                    
                    
                    <div class="row" >
                        <div class="col-md-12">
                            
                            <!-- START SALES BLOCK -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Booking Report</h3>
                                        <span></span>
                                    </div>                                     
                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row">
				                        
				                      
				                        <div class="col-md-4">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                            
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-star"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> TOTAL Prime Booking</div>
				                                    <div class="widget-int num-count">
                                                       <?php 
															echo $totalprimes[0][0]['Prime'];
														
															?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                     
				                            <!-- END WIDGET REGISTRED -->
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-star-o"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> TOTAL Non-Prime Booking</div>
				                                    <div class="widget-int num-count">
                                                       <?php echo $totalnonprimes[0][0]['NonPrime'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                 
				                            <!-- END WIDGET REGISTRED -->
				                            
				                            
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                            <!-- START WIDGET SLIDER -->
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-users"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> TOTAL BOOKED TENNIS SLOTS</div>
				                                    <div class="widget-int num-count">
                                                        <?php echo $totalbooks[0][0]['id'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div>
				                                 
				                            <!-- END WIDGET SLIDER -->
				                            
				                        </div>
				                        
				                        <div class="col-md-6">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-sun-o"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> TOTAL Day Booking</div>
				                                    <div class="widget-int num-count">
                                                      
						
														 <?php echo $totaldays[0][0]['days'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                
				                            <!-- END WIDGET REGISTRED -->    
				                        </div>
				                        
				                        <div class="col-md-6">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-moon-o"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> TOTAL Night Booking</div>
				                                    <div class="widget-int num-count">
                                                        <?php echo $totalbooks[0][0]['id']-$totaldays[0][0]['days'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
			                        
				                            <!-- END WIDGET REGISTRED -->
				                            
				                            
				                            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                            
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-exclamation-triangle"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> Total No-Show</div>
				                                    <div class="widget-int num-count">
                                                        <?php 
						$no_fee=0;
						
						foreach($totalnoshowfees as $noshowfee){
							
							$created=strtotime($noshowfee['Booking']['created']);
							$modified=strtotime($noshowfee['Booking']['modified']);
				
							$t1 = strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['created'])));
							$t2 =  strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['modified'])));
							$diff = $t1 - $t2;
							$hours = ceil($diff/(60*60));
						
							if($hours<=24){
							
								if($noshowfee['Booking']['slot']=='Prime'){
									$no_fee=$no_fee+$settings['Setting']['noShowprime'];
								}elseif($noshowfee['Booking']['slot']=='Non-Prime'){
									 $no_fee=$no_fee+$settings['Setting']['noShownonprime'];
									
								}
							}
						}
						echo $no_fee;
						
						
						?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                   
				                            <!-- END WIDGET REGISTRED -->
				            
				                        </div>
				                        
				                        <div class="col-md-4">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                          
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-times"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> Total Cancelled</div>
				                                    <div class="widget-int num-count">
                                                        <?php echo $totalncancels[0][0]['cancel'];?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                     
				                            <!-- END WIDGET REGISTRED -->
				            
				                        </div>
				                        
				                         
				                        
				                         <div class="col-md-4">
				                            
				                            <!-- START WIDGET REGISTRED -->
				                           
				                            <div class="widget widget-default widget-item-icon">
				                                <div class="widget-item-left">
				                                    <span class="fa fa-exclamation"></span>
				                                </div>                             
				                                <div class="widget-data">
				                                    
				                                    <div class="widget-title"> Total Non-Booked Tennis Slots</div>
				                                    <div class="widget-int num-count">
                                                        <?php
						
														if($tennisesNonbooks>$totalbooks[0][0]['id']){
															echo $tennisesNonbooks-$totalbooks[0][0]['id'];
														}else{
															echo $totalbooks[0][0]['id']-$tennisesNonbooks;
														}
														
														?>
                                                    </div>
				                                </div>      
				                                
				                            </div> 
				                                                    
				                            <!-- END WIDGET REGISTRED -->
				            
				                        </div>
				                        
				                    
				                        
				                        
				                    </div>                                   
                                </div>
                            </div>
                            <!-- END SALES BLOCK -->
                            
                        </div>
                        
                    </div><!--



                    /////////<div class="row">
                        <div class="col-md-12">
                            
                             START SALES BLOCK 
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="panel-title-box">
                                        <h3>Revenue Report</h3>
                                        <span></span>
                                    </div>                                     
                                    
                                </div>
                                <div class="panel-body">                                    
                                    <div class="row">
                                        <div class="col-md-4">
                                            
                                             START WIDGET SLIDER 
                                             
                                            <div class="widget widget-default widget-item-icon">
                                                <div class="widget-item-left">
                                                    <span class="fa fa-align-justify"></span>
                                                </div>                             
                                                <div class="widget-data">
                                                    
                                                    <div class="widget-title">tennis Court Fee</div>
                                                    <div class="widget-int num-count">
                                                        <?php

													$tenninsr=$totaldaysr[0][0]['days']+$totalnightsr[0][0]['nights'];
													echo $tenninsr;?>
                                                    </div>
                                                </div>      
                                                
                                            </div>  
                                               
                                             END WIDGET SLIDER 
                                            
                                        </div>
                                       
                                        <div class="col-md-4">
                                            
                                             START WIDGET REGISTRED 
                                            
                                            <div class="widget widget-default widget-item-icon">
                                                <div class="widget-item-left">
                                                    <span class="fa fa-th-large"></span>
                                                </div>                             
                                                <div class="widget-data">
                                                    
                                                    <div class="widget-title">Racquet fee</div>
                                                    <div class="widget-int num-count">
                                                        <?php echo $racquetfees[0][0]['racquet']*$settings['Setting']['rackuet'];?>
                                                    </div>
                                                </div>      
                                                
                                            </div>                          
                                             END WIDGET REGISTRED 
                                            
                                        </div>
                                        
                                        <div class="col-md-4">
                                            
                                             START WIDGET REGISTRED 
                                            
                                            <div class="widget widget-default widget-item-icon">
                                                <div class="widget-item-left">
                                                    <span class="fa fa-th-large"></span>
                                                </div>                             
                                                <div class="widget-data">
                                                    
                                                    <div class="widget-title">No-Show fee</div>
                                                    <div class="widget-int num-count">
                                                       <?php 
						
						$no_fee=0;
						foreach($noshowfees as $noshowfee){
							
							$created=strtotime($noshowfee['Booking']['created']);
							$modified=strtotime($noshowfee['Booking']['modified']);
				
							$t1 = strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['created'])));
							$t2 =  strtotime (date('Y-m-d H:i:s',strtotime($noshowfee['Booking']['modified'])));
							$diff = $t1 - $t2;
							$hours = ceil($diff/(60*60));
						
							if($hours<=24){
							
								if($noshowfee['Booking']['slot']=='Prime'){
									$no_fee=$no_fee+$settings['Setting']['noShowprime'];
								}elseif($noshowfee['Booking']['slot']=='Non-Prime'){
									 $no_fee=$no_fee+$settings['Setting']['noShownonprime'];
									
								}
							}
						}
						
						echo $no_fee;
					
						
						
						?>
                                                    </div>
                                                </div>      
                                                
                                            </div>                          
                                             END WIDGET REGISTRED 
                                            
                                        </div>
                                        
                                        <div class="col-md-4">
                                            
                                             START WIDGET REGISTRED 
                                            
                                            <div class="widget widget-default widget-item-icon">
                                                <div class="widget-item-left">
                                                    <span class="fa fa-th-large"></span>
                                                </div>                             
                                                <div class="widget-data">
                                                    
                                                    <div class="widget-title">traineer fee</div>
                                                    <div class="widget-int num-count">
                                                       <?php echo $trainerfees[0][0]['trainee_id']*$settings['Setting']['trainerRate'];?>
                                                    </div>
                                                </div>      
                                                
                                            </div>                          
                                             END WIDGET REGISTRED 
                                            
                                        </div>
                                        <div class="col-md-4">
                                            
                                             START WIDGET REGISTRED 
                                            
                                            <div class="widget widget-default widget-item-icon">
                                                <div class="widget-item-left">
                                                    <span class="fa fa-th-large"></span>
                                                </div>                             
                                                <div class="widget-data">
                                                    
                                                    <div class="widget-title">total revenue</div>
                                                    <div class="widget-int num-count">
                                                       <?php echo $total_fee;?>
                                                    </div>
                                                </div>      
                                                
                                            </div>                          
                                             END WIDGET REGISTRED 
                                            
                                        </div>
                                        
                                    </div>                                   
                                </div>
                            </div>
                             END SALES BLOCK 
                            
                        </div>
                        
                    </div>
                    --></div>
                    
                    
                    <!-- START DASHBOARD CHART -->
                                       
                    <!-- END DASHBOARD CHART -->
                    
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
            
		
		
	</div>
<script type="text/javascript">
    function PrintDoc() {

        var toPrint = document.getElementById('print-lay');

        var popupWin = window.open('', '_blank', '');

        popupWin.document.open();

        popupWin.document.write('<html><title>::Preview::</title><link rel="stylesheet" type="text/css" href="http://localhost/2015/projects/americanclu/css/site_css/bootstrap.min.css" /><link rel="stylesheet" type="text/css" href="http://localhost/2015/projects/americanclu/css/site_css/dashboard-print.css" /></head><body onload="window.print()">');

        popupWin.document.write(toPrint.innerHTML);

        popupWin.document.write('</html>');

        popupWin.document.close();

    }
</script>