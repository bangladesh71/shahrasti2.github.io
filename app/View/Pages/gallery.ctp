<?php echo $this->Html->css('lightbox')?>
<style>
<!--
.gallery__image img {
  border: 5px solid #f2f2f2;
  transition: all 400ms ease-in-out 0s;
}
.gallery__description{
	background: #f2f2f2;
	padding: 10px;
}
	

-->
</style>
<div class="row">

	<div class="col-md-12">
		<h3 class="title-style1">
 			Gallery
 			<span class="title-block"></span>
 		</h3>
 		<div>
 			<!-- Gallery item -->
	            <?php 
	            	$p=1;
	            	foreach ($gallery_data as $gallery){
	            	$imgId=$gallery['Content']['id'];
					$title=$gallery['Content']['title'];
					$content=$gallery['Content']['content'];
	           // pr($gallery);
	            ?>
	            
	            <div class="col-md-4 image-row">
					<div class="gallery-item gallery-item--compact image-set">
						<a class="example-image-link gallery__image popup-item hover-effect" href="<?php echo $this->webroot?>img/upload/large/<?php echo $imgId;?>.png" data-lightbox="example-set" data-title="<p class='decorated-title title-light'><?php echo $title;?></p><br/><?php echo $content;?>">
							<img class="img-responsive" src="<?php echo $this->webroot?>img/upload/large/<?php echo $imgId;?>.png" >
						</a>
						
						<div class="gallery__description">
							<span style="font-size: 20px;"><?php echo $title;?></span>
							<p class="gallery__text"><?php echo $content;?></p>
			    		</div>		
		    		</div>	
	        	</div>
	        	<?php if($p%3==0){
				?>
					<div style="clear: both;"></div>
				<?php }?>
	        	<?php $p++; }?>
		</div>
	</div>
	<div class="clearfix"></div>
	<br></br>
</div>

	<!-- End main content -->
	<script src="<?php echo $this->webroot.'js/jquery-1.11.0.min.js';?>"></script>
	<script src="<?php echo $this->webroot.'js/lightbox.js';?>"></script>
