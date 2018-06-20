<!-- Breadcrumbs -->
<style>
.title-monir-1st{

   		 color: #fff !important;
    	
	}
.title-monir{
    	font-size: 15px;
   		 color: #fff !important;
    	
	}
</style>

<!-- Breadcrumbs -->
		<div class="breadcrumb-wrapper">
			<div class="pattern-wrapper">
	            <ol class="container breadcrumb">
	                <li class="title-monir-1st">Media Room</li>
	                <li class="active title-monir">Video Album</li>
	            </ol>			
			</div>		
		</div>
		<!-- End breadcrumbs -->

<div class="container">	
	<div class="col-md-12 prgp-left" style="background: #fff">
		<h1>Video Album</h1>
		
		<?php 
		$p=1;
		foreach($gallery_data as $gallery){
			//pr($gallery);
			$imgId=$gallery['Content']['id'];
					$title=$gallery['Content']['title'];
					$content=$gallery['Content']['content'];
		?>
			 	<div class="col-md-4 image-row">
					<div class="gallery-item gallery-item--compact image-set">
						<a target="_blank" class="example-image-link gallery__image popup-item hover-effect" href="<?php echo $gallery['Content']['content'];?>" data-lightbox="example-set" ><img class="example-image" src="<?php echo $this->webroot?>img/upload/large/<?php echo $imgId;?>.png" >
						<i class="icon-circle icon-circle--thin fa fa-arrow-right"></i>
						</a>
						
						<div>
							<?php echo $title;?>
			    		</div>		
		    		</div>	
	        	</div>
	        	<?php if($p%3==0){
				?>
					<div style="clear: both;"></div>
				<?php }?>
	        	<?php $p++; }?>
			
	
	</div>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ' '));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
