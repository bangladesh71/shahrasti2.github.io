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
		
		<?php $p=1; foreach ($pastevents as $event){
            			//pr($event);
            			?>
		<h3 class="title-style1">
 			<?php echo $event['Content']['title'];?>
 			<span class="title-block"></span>
 		</h3>
 		<div class="post">
            	
            

            	<!-- Post image -->
            		
            			 <?php
            		
								$check = WWW_ROOT."img/upload/large/" . $event['Content']['id'].'.png';
								$image ="/img/upload/large/" . $event['Content']['id'].'.png';
							
								
							?>
								
								
								<?php if(file_exists($check)){?>
									<div class="post__image col-md-4">
									<?php echo $this->Html->link($this->Html->image($image,array('class'=>'img-responsive')),array('controller'=>'pages','action'=>'content',$event['Content']['slug']),array('escape'=>false));
								
								?>
								</div>
								<?php }?>

                    <div class="col-md-8"><?php 
						echo $event['Content']['content'];
					?></div>
                   
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
	<div class="col-md-12">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
			echo $this->Paginator->numbers(array('separator' => ' '));
			echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
	<div class="clearfix"></div>
	<br></br>
</div>


<style>
h4 {
  border-bottom: 2px solid #90d34f;
  font-size: 21px;
  margin-bottom: 20px;
  margin-top: 48px;
	padding-bottom: 10px;
}
a{
	color: #000;
}
</style>
<style>
.title-monir-1st{

   		 color: #fff !important;
    	
	}
.title-monir{
    	font-size: 15px;
   		 color: #fff !important;
    	
	}
</style>