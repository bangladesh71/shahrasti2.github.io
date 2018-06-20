<style>
h4 {
  border-bottom: 2px solid #1261ba;
  font-size: 21px;
  margin-bottom: 20px;
  margin-top: 48px;
	padding-bottom: 10px;
}
a:hover, a:focus{
	color: #000;
}
.title-monir{
    	font-size: 15px;
   		 color: #fff !important;
    	
	}
</style>

		<div class="row">
            <div class="col-md-8">

            	<!-- Begin article -->
            	<div class="post">
            			<h3 class="title-style1">
	            			<?php echo $presentevents[0]['Contenttype']['name']?>
	            			<span class="title-block"></span>
            			</h3>
						<?php
						$i=0;
						
						$p=1; foreach ($presentevents as $event){
            			//pr($event);
            			$i++;
            			
            			?>
            			<div class="row">
            			<div class="col-md-2">
            			 <?php
            		        	 $page="page:".$i;
								$check = WWW_ROOT."img/upload/large/" . $event['Content']['id'].'.png';
								$image ="/img/upload/large/" . $event['Content']['id'].'.png';
							
								if(file_exists($check)){
									echo $this->Html->link($this->Html->image($image,array('class'=>'img-responsive')),array('controller'=>'pages','action'=>'presentevents',$page),array('escape'=>false));
								}else{?>
						
								<?php }
		                    
		                    
		                    	?>
            			</div>
            			<div class="col-md-10">
            			
	            			
	            			<h5><?php echo $event['Content']['title']?></h5>
	            			<p><?php echo $this->Html->link(strip_tags(substr($event['Content']['content'],0,120).'.........Read More'),array('controller'=>'pages','action'=>'presentevents',$page),array('escape'=>false));?></p>
	            		
		             	</div>
            		</div>  
            		
            		<?php if($p%1==0){?>
						<br style="clear: both;">
					<?php }?>     	
                    <?php $p++; }?>

                    <?php echo $this->Html->link('View All',array('controller'=>'pages','action'=>'presentevents'),array('style'=>'font-size:20px;'));?>

            	</div>
            	<div class="post">
            	<h3 class="title-style1">
            		<?php echo $Upcomingevents[0]['Contenttype']['name']?>
            		<span class="title-block"></span>
            	</h3>
            		<?php $pr=1;
					$s=0;
            		
            		foreach ($Upcomingevents as $events){
            			//pr($event);
            			$s++;
            			?>
            			<div class="row">
            			<div class="col-md-2">
            			 <?php
            			$page="page:".$s;
								$check = WWW_ROOT."img/upload/large/" . $events['Content']['id'].'.png';
								$image ="/img/upload/large/" . $events['Content']['id'].'.png';
							
								if(file_exists($check)){
									echo $this->Html->link($this->Html->image($image,array('class'=>'img-responsive')),array('controller'=>'pages','action'=>'upcomingevents',$page),array('escape'=>false));
								}else{?>
						
								<?php }
		                    
		                    
		                    	?>
            			</div>
            			<div class="col-md-10">
            			<h5><?php echo $events['Content']['title']?></h5>
            			<p><?php echo $this->Html->link(strip_tags(substr($events['Content']['content'],0,120).'.........Read More'),array('controller'=>'pages','action'=>'upcomingevents',$page),array('escape'=>false));?></p>
            		
		              	</div>
            		</div>  
            		
            		<?php if($pr%1==0){?>
						<br style="clear: both;">
					<?php }?>    	
                    <?php $pr++; }?>

                    
					<?php echo $this->Html->link('View All',array('controller'=>'pages','action'=>'upcomingevents'),array('style'=>'font-size:20px;'));?>
            	</div>
            	<div class="post">
            	<h3 class="title-style1">
            		<?php echo $pastevents[0]['Contenttype']['name']?>
            		<span class="title-block"></span>
            	</h3>
            		<?php $pa=1; $m=0; foreach ($pastevents as $events){
            			//pr($event);
            			$m++;
            			?>
            			<div class="row">
            				<div class="col-md-2">
            			 <?php
            				$page="page:".$m;
								$check = WWW_ROOT."img/upload/large/" . $events['Content']['id'].'.png';
								$image ="/img/upload/large/" . $events['Content']['id'].'.png';
							
								if(file_exists($check)){
									echo $this->Html->link($this->Html->image($image,array('class'=>'img-responsive')),array('controller'=>'pages','action'=>'pastevents',$page),array('escape'=>false));
								}else{?>
						
								<?php }
		                    
		                    
		                    	?>
            			</div>
            			<div class="col-md-10">
	            			<h5><?php echo $events['Content']['title']?></h5>
	            			<p><?php echo $this->Html->link(strip_tags(substr($events['Content']['content'],0,120).'.........Read More'),array('controller'=>'pages','action'=>'pastevents',$page),array('escape'=>false));?></p>
	            		
		              	</div>
            		</div>          	
		                    	
                    <?php if($pa%1==0){?>
						<br style="clear: both;">
					<?php }?>    	
                    <?php $pa++; }?>

                    
				<?php echo $this->Html->link('View All',array('controller'=>'pages','action'=>'pastevents'),array('style'=>'font-size:20px;'));?>
            	</div>
            	<br>
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
		</div>
