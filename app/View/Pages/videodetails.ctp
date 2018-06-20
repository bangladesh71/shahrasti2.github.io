<?php echo $this->Html->css('lightbox')?>
<?php echo $this->Html->script('custom')?>
<script src="<?php echo $this->webroot.'js/jquery-1.11.0.min.js';?>"></script>
<script src="<?php echo $this->webroot.'js/lightbox.js';?>"></script>

<style>
.gallery-item--compact .gallery__description {
  min-height: 100px;
}
</style>
	<section class="container">
	<div class="gallery-items-wrapper" style="margin: 0">
			<h3 style="margin-top: 0;"><?php echo $gallerydetails_data[0]['Content']['title'];?> Details</h3>
			<div class="row">
				<!-- Gallery item -->
	            <?php 
	            	$p=1;
	            	foreach ($gallerydetails_data as $gallery){
	            	$imgId=$gallery['Contentimage']['id'];
					$title=$gallery['Contentimage']['imgTitle'];
					$content=$gallery['Contentimage']['imgTxt'];
	           //pr($gallery);
	            ?>
	            
	            <div class="col-md-4 image-row">
					<div class="gallery-item gallery-item--compact image-set">
						<a class="example-image-link gallery__image popup-item hover-effect" href="<?php echo $content;?>" target="_blank"><img class="example-image" src="<?php echo $this->webroot?>img/upload/video/<?php echo $imgId;?>.png" >
						<i class="icon-circle icon-circle--thin fa fa-arrow-right"></i>
						</a>
						
						<div class="gallery__description">
							<a class="gallery__title popup-item--link" href="<?php echo $content;?>" target="_blank" title="<?php echo $title;?>"><?php echo $title;?></a>
			    		</div>		
		    		</div>	
	        	</div>
	        	<?php if($p%3==0){
				?>
					<div style="clear: both;"></div>
				<?php }?>
	        	<?php $p++; }?>
				
        	</div>
			<!-- End row -->	

			
			<!-- End row -->	
				      
			<!-- End Gallery items  -->  

	        <!-- Pagination -->
            <div class="col-md-12">
		        <div class="pagination">
		            <?php
					$page_count = $this->Paginator->counter(array('format' => __('{:pages}')));
					
					if($page_count > 1){
						echo "<p>";
						echo $this->Paginator->counter(array(
							'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
						));
						
						echo "</p><div class='paging'>";
						
						echo $this->Paginator->prev('<< ', array(), null, array('class' => 'prev disabled'));
						echo $this->Paginator->numbers(array('separator' => ''));
						echo $this->Paginator->next(' >>', array(), null, array('class' => 'next disabled'));
						echo "</div>";
					}
					?>
		        </div>
        	</div>
	        <!-- End Pagination -->

    	</div>

</section>

<script>
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-2196019-1']);
	_gaq.push(['_trackPageview']);

	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
	</script>
