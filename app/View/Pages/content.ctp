
<style>
<!--
.nor-ul {
	padding-left: 35px;
}
.nor-ul li {
	list-style-type: decimal-leading-zero;
}
.nor-ul ul {
	padding-left: 15px;
}
.nor-ul ul > li {
	list-style-type: circle;
}
-->
</style>
<div class="row">

	<div class="col-md-8">
		<h3 class="title-style1">
 			<?php echo $details['Content']['title'];?>
 			<span class="title-block"></span>
 		</h3>
 		
 		<div class="post">
            	
            

            	<!-- Post image -->
            		
            			 <?php
            		
								$check = WWW_ROOT."img/upload/large/" . $details['Content']['id'].'.png';
								$image ="/img/upload/large/" . $details['Content']['id'].'.png';
							
								
							?>
								
								
								<?php if(file_exists($check)){?>
									<div class="post__image col-md-4">
									<?php echo $this->Html->link($this->Html->image($image,array('class'=>'img-responsive')),array('controller'=>'pages','action'=>'content',$event['Content']['slug']),array('escape'=>false));
								
								?>
								</div>
								<?php }?>
							<?php if(file_exists($check)){?>
                    			<div class="col-md-8">
                    		<?php }else{?>
                    		<div class="col-md-12">
                    		<?php }?>
                    		
								<?php echo $details['Content']['content'];?></div>
               				 <?php
					
								 $check= WWW_ROOT. "img/upload/pdf/".$details['Content']['id'].".pdf"; 
								 $file = $this->webroot ."img/upload/pdf/".$details['Content']['id'].".pdf";
								 if(file_exists($check)){
								?>
								<div style="float: left;padding-left: 73px;">
									<a href="<?php echo $file;?>" target='_blank' class='btn btn-success btn-small'><?php echo $Attachment;?></a>
								</div>
								<?php }?>
            


            </div>
	</div>
	<div class="col-md-4">
		 		<h3 class="title-style1">
		 		Facilities and Services
		 			<span class="title-block"></span>
		 		</h3>
		 		<ul class="clubFaci">
		 			<?php foreach ($facilities as $facilitie){ 
			 			//pr($about);
						$content=$facilitie['Content']['content'];
					?>
		 			<li>
		 				<span class="glyphicon glyphicon-ok"></span>
		 				
				 		<?php echo $content;?>
				 		
		 			</li>
		 			<?php }?>
		 		</ul>
 			</div>
	<div class="clearfix"></div>
	<br></br>
</div>

		<div class="tenisecourt">
		<div class="row">
		
			<div class="col-md-10">
			
			<h2 align="center"></h2>
	<p align="justify">
	

			
	</p>
	
				
			</div>
		</div>
	</div>



