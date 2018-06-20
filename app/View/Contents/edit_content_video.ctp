<script>
	$(document).ready(function(){
		//initial hide
		$(".file").hide();
		$("#cancel").hide();

		$("#changeimage").click(function(){
			$(".file").show();
			$("#cancel").show();
			$("#curImage").hide();
			$("#changeimage").hide();
		});

		$("#cancel").click(function(){
			$(".file").hide();
			$("#cancel").hide();
			$("#changeimage").show();
			$("#curImage").show();
		});
	});
</script>
<?php 
echo $this->Html->script(array('keyboard'));

?>
<div class="contents form">
	<fieldset>
		<legend><?php echo __('Upload Video'); ?></legend>
		<?php echo $this->Form->create('Contentimage',array('type'=>'file'));?>
		<?php echo $this->Form->hidden('id'); ?>
		<div id="curImage">
			<object  type="application/x-shockwave-flash" data="<?php echo $this->webroot . 'img/player.png';?>" height="235px" width="280px">
				<param name="wmode" value="opaque">
				<param name="flashvars" value="file=<?php echo $this->webroot.'img/upload/video/' .$imagedata['Contentimage']['id'] . '.png';?>&image=''">
				<param name="allowfullscreen" value="true">
				<param name="allowscriptaccess" value="always">
				<param name="enablejs" value="true">
			</object>
		</div>
		
	<?php
		echo $this->Html->link('Cancel','javascript:void(0);', array('id' => 'cancel'));
        echo $this->Html->link('Change Video','javascript:void(0);', array('id' => 'changeimage'));
        
        echo $this->Form->input('image',array('type'=>'file','label' => 'Video'));
        
		echo $this->Form->input('Contentimage.imgTitle',array('label' =>'Title','class' =>'form-group form-control inputcon'));
		//echo $this->Form->input('Contentimage.imgTitlebn',array('label' =>'Title Bangla','class' =>'form-group form-control inputcon nd_keyboard','required' => false));
		echo $this->Form->input('Contentimage.imgTxt', array('type' => 'text','label' =>'link','class'=>'form-control'));
		//echo $this->Form->input('Contentimage.imgTxtbn', array('type' => 'textarea','label' =>'Details Bangla','class'=>'form-control nd_keyboard','required' => false));

	?>
	</fieldset>
	<br/>
<?php echo $this->Form->submit('Upload',array('id'=>'custom-button')); ?>
<?php echo $this->Form->end(); ?>
</div>



