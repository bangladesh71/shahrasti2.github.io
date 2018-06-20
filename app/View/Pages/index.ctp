 <style>
 	.p-justi p{
		text-align: justify;
 	}
 </style>
 <div class="row" style="z-index: 3">
 	<div class="col-md-4 p-justi">
 		<h3 class="title-style1">
 			About Us
 			<span class="title-block"></span>
 		</h3>
 		<?php foreach ($abouts as $about){ 
 			//pr($about);
			$content=$about['Content']['content'];
		?>
 			<?php echo $content;?>
 		<?php }?>
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
 	<div class="col-md-4">
 		<h3 class="title-style1">
 			Location
 			<span class="title-block"></span>
 		</h3>
 		<p>
 			<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.4358248838444!2d90.40920719999995!3d23.803096500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x8036c9957d5ed21e!2sAmerican+Club!5e0!3m2!1sbn!2sbd!4v1442924785993" width="100%" height="140" frameborder="0" style="border:0" allowfullscreen></iframe>
 		</p>
 		<!--<a href="" class="detail-bot">Details</a>
 	--></div>
 </div>
<script>
$(function(){

	// Instantiate MixItUp:

	$('#mixitup').mixItUp();

});
new BoxesFx(document.getElementById('boxgallery'));
</script>
