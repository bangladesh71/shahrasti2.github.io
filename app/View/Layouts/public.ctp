<?php 
$cakeDescription = __d($_SERVER['HTTP_HOST'], 'AEEA');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())

?>
<!DOCTYPE html>
<html> 
    <head>
    <title>
		<?php echo $cakeDescription ?>:
		ONLINE TENNIS AND SQUASH BOOKING SYSTEM
	</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="">
        <?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(
			array(
				'site_css/bootstrap.min',
				'site_css/font-awesome.min',
				'site_css/custom-o',
				'slider/style',
				'site_css/menurespons',
				'site_css/slicknav'
			)
		);
		
		echo $this->Html->script(
			array(
				'site_js/jquery-1.9.1.min',
				'site_js/jquery.mixitup',
				'site_js/modernizr.custom',
				'site_js/classie',
				'site_js/boxesFx',
				'site_js/lightbox',
				'site_js/superfish',
				'site_js/jquery.slicknav.min'
				
			)
		);
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');


	?>
    </head>
    <body>
    <script>
	    $(document).ready(function(){
	    	$('.sf-menu').slicknav();
	    });
	</script>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
        <!-- Add your site or application content here -->
        
                   <div class="container cont-bg">
	                    <?php echo $this->element('public_header');?>
	                    <?php echo $this->element('public_menu');?>
	                    <?php 
							 if($this->params['action']=='index'){
						 		echo $this->element('slider');
						 	}
						?>
						<?php echo $this->Session->flash(); ?>
	            		<?php echo $this->fetch('content'); ?>
                   </div>
                   
            		<div class="container footer-bg">
            			<?php echo $this->element('public_footer');?>
            		</div>
  
            
            		
        <?php echo $this->Html->script(
			array(
				'vendor/bootstrap.min',
				'vendor/modernizr-2.6.2.min'
			)
		);?>
        
			<?php echo $this->element('sql_dump'); ?>
    </body>
</html>
