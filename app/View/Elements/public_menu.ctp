<script type="text/javascript">
<!--
//jQuery.noConflict();
jQuery(document).ready(function(){
    //jQuery.noConflict();
     var url ='<?php echo $this->here;?>';
     jQuery("#menuid a").each(function(){
          if(jQuery(this).attr("href") == url){
              jQuery(this).addClass("current_page");
              jQuery(this).parents('li').parents('ul').parents('li').addClass('current_page');
          }
     });
});
//-->
</script>

<?php //echo $this->Html->css('site_css/menurespons.css');?>
<div class="row nav-bottom">
	<div class="col-md-6 mar-tobo" style="position: relative;">
		<?php echo $this->Html->image('logo.png',array('class'=>'img-responsive','style'=>'padding: 15px 0;'))?>
		<script>
		    $(document).ready(function(){
		    	$('.sf-menu').slicknav();
		    });
		</script>
	</div>
	<div class="col-md-6">
		<nav class="header-navigation">
			
			<?php 
			//pr($current_user);
			if(!empty($logged_in)){
				echo $this->Menu->menuGenerator($menu_data, 0, '', 'active', 1,0,1); 
			?>
			<?php }else{
				echo $this->Menu->menuGenerator($menu_data, 0, '', 'active', 1,0); 
			}?>
		</nav>
	</div>
</div>