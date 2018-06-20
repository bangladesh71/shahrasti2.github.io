<div class="row">

	<div class="img-responsive">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.4358248838444!2d90.40920719999995!3d23.803096500000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x8036c9957d5ed21e!2sAmerican+Club!5e0!3m2!1sbn!2sbd!4v1442924785993" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
	</div>
	<br><br>
	<div class="col-md-6">
		<h1 style="color: #1261ba;">Contact Info</h1>
		<address class="contact__info">
        	<span class="contact__info__item"><i class="icon-circle icon-circle--thin fa fa-phone"></i>+ 88 02 8821025-27</span>
        	<span class="contact__info__item"><i class="icon-circle icon-circle--thin fa fa-envelope"></i>Info@AEEADhaka.org</span>
        	<span class="contact__info__item"><i class="icon-circle icon-circle--thin fa fa-map-marker"></i>American ClubRd No 70, Dhaka</span>
        </address>
	</div>
	<div class="col-md-6" align="center">
		<form novalidate="" action="<?php echo $this->webroot?>pages/contact" method="post" name="contact-form" id="contact-form" class="contact-form">
                <input type="text" placeholder="Name:" name="user-name" id="user-name" class="form__field pull-left" vk_16879="subscribed">
                    <input type="email" placeholder="Email:" name="user-email" id="user-email" class="form__field pull-right">
                    <input type="text" placeholder="Phone:" name="user-phone" id="user-phone" class="form__field pull-left" vk_16879="subscribed">
                    <input type="text" placeholder="Title:" name="user-title" id="user-title" class="form__field pull-right clearfix" vk_16879="subscribed">
                <textarea placeholder="Message:" id="user-message" name="user-message" class="form__field form__field--message"></textarea>
                
                
                    <button type="submit" name="submit-btn" id="submit-btn" class="btn btn-info btn-lg btn--highlight" style="position:relative;">Write to us <?php echo $this->Html->image('pen.png',array('style'=>'position: absolute; width: 50px; left: -70px; top: -2px;'))?></button>
                    
                    <div id="response"></div>
        </form>
	</div>
	<div class="clearfix"></div>
	<br><br>
		
</div>