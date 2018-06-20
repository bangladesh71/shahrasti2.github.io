<?php 
  //For Sortable
	echo $this -> Html -> script(array('jquery-ui'));
?>
<?php 
echo $this->Html->script(array('keyboard'));

?>
<script type="text/javascript">
$(document).ready(function(){
	$("#sortable").sortable();
});
</script>

<style>
	#sortable { 
		list-style-type:none !important; 
		margin: 0; 
		padding: 0; 
	}
	#sortable li {
		display:inline-block; 
		border: 1px solid #b3b3b3; 
		margin: 3px 3px 3px 0; 
		padding: 5px;  
		font-size: 4em; 
		text-align: center; 
		cursor: pointer;
	}
</style>

<!-- Uploader form  -->
<div class="row">
	<div class="col-md-8">
	<div class="panel panel-default">
<div class="panel-body">
	<fieldset>
		<legend><?php echo __('Upload Video'); ?></legend>
		
	<?php echo $this->Form->create('Uplaod',array('type'=>'file'));
	
		echo $this->Form->hidden('Contentimage.content_id', array('value' =>$content_id));
        echo $this->Form->input('image',array('type'=>'file','label' => 'Video'));
		echo $this->Form->input('Contentimage.imgTitle',array('label' =>'Title','class' =>'form-group form-control inputcon'));
		//echo $this->Form->input('Contentimage.imgTitlebn',array('label' =>'Title Bangla','class' =>'form-group form-control inputcon nd_keyboard','required' => false));
		echo $this->Form->input('Contentimage.imgTxt', array('type' => 'text','label' =>'Link','class'=>'form-control'));
		//echo $this->Form->input('Contentimage.imgTxtbn', array('type' => 'textarea','label' =>'Details Bangla','class'=>'form-control nd_keyboard','required' => false));

	?>
	</fieldset>
		<br/>
<?php echo $this->Form->submit('Upload',array('id'=>'custom-button')); ?>
<?php echo $this->Form->end(); ?>
<!-- Sortable image area -->
<?php if(!empty($data)):?>
	<div id="sortableimages" style ="margin-top: 30px;">
		<h1>Images</h1>
		<?php echo $this->Form->create('add_content_image');?>	
		<ul id = "sortable">
			<?php 
				foreach($data as $imgaes):
						$location = "img/upload/video/".$imgaes['Contentimage']['id'].".png";
					$imgLoc = "upload/video/".$imgaes['Contentimage']['id'].".png";
					if((is_file($location))):
			?>
					<li class="ui-state-default">
					<object  type="application/x-shockwave-flash" data="<?php echo $this->webroot . 'img/player.swf';?>" height="235px" width="280px">
						<param name="wmode" value="opaque">
						<param name="flashvars" value="file=<?php echo $this->webroot.'img/upload/video/' .$imgaes['Contentimage']['id'] . '.png'?>&image=''">
						<param name="allowfullscreen" value="true">
						<param name="allowscriptaccess" value="always">
						<param name="enablejs" value="true">
					</object>
						<?php echo $this->Html->image($imgLoc, array('width' => '200px;'));?>
						<?php echo $this->Html->link($this->Html->image('edit.png',array('title' =>"Edit")), array('action' => 'edit_content_video',$typ,$contentSlug,$imgaes['Contentimage']['id']), array('escape' => false)); ?>
						<?php echo $this->Html->link($this->Html->image('delete.gif',array('title' =>"Delete")), array('action' => 'delete_content_video',$typ,$contentSlug,$imgaes['Contentimage']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $imgaes['Contentimage']['id'])); ?>
						<input type='hidden' name='order[]' value='<?php echo $imgaes['Contentimage']['id']; ?>' /> 
					</li>
					<?php endif;?>
			<?php endforeach;?>
		</ul>
	<div class="mws-button-row">
		<?php echo $this->Form->end('Sort');?>
	</div>
<?php endif;?>		
	
	</div>

</div>
</div>
</div></div>



