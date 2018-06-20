<div class="row">
	<div id="boxgallery" class="col-md-12 no-pad" style="padding: 0 0 40px;">
		<!-- Start WOWSlider.com BODY section -->
		<div id="wowslider-container1">
		<div class="ws_images">
			<ul>
				<?php foreach ($sliders as $slider){ 
					$img=$slider['Content']['id'];
				?>
				<?php //pr($slider)?>
				<li><img id="wows1_0" class="" src="<?php echo $this->webroot?>img/upload/large/<?php echo $img;?>.png" title="#nivo-caption0" alt="" /> </li>
				<?php }?>
			</ul>
			
		</div>
			<div class="ws_bullets">
			<div>
				<?php foreach ($sliders as $slider){ 
					$img=$slider['Content']['id'];
				?>
				<a href="#" title=""><span><img width="120px" height="60px" class="" src="<?php echo $this->webroot?>img/upload/small/<?php echo $img;?>.png" title="" alt="" />2</span></a>
				<?php }?>
			</div></div><div class="ws_script" style="position:absolute;left:-99%"><a href="http://www.ipsitasoft.com">Design & Developed</a> by IPSITA COMPUTERS PTE LTD</div>
		<div class="ws_shadow"></div>
		</div>	
		<?php echo $this->Html->script(array('slider/wowslider','slider/script'))?>
		<!-- End WOWSlider.com BODY section -->		
		<?php //echo $this->Html->image('main.png',array('class'=>'img-responsive slide-img','style'=>'min-width:100%;height:450px'))?>
	</div>
</div>