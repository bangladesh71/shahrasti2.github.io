<?php 
  //For Sortable
	echo $this -> Html -> script(array('jquery-ui'));
?>
<?php 
echo $this->Html->script(array('keyboard'));

?>


<style>
<!--
#ContentimageImgTxt, #ContentimageImgTxtbn, #ContentimageImgTitle, #ContentimageImgTitlebn, #CommitteecategoryName, #DerectoryLinks, #DerectoryName, #DerectoryNamebn, #PerlamentName, #PerlamentNamebn {
  width: 100%
}
}
-->
</style>
<div class="row">
	<div class="col-md-6">
		<?php echo $this->Form->create('Uplaod',array('type'=>'file'));?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('Upload Images'); ?></strong></h3>
				<ul class="panel-controls">
					<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body">                                                                        
				<?php
					echo $this->element('tinymce');
					$type_id = $type;
				?>
				<fieldset>
					<?php echo $this->Form->create('Contentimage',array('class' =>'mws-form', 'type' =>'file'));?>
					<?php echo $this->Form->hidden('id'); ?>
					<?php
						
						echo '<div class="upload"> Upload Images </div>';
						echo $this->Form->input('Image',array('type' => 'file','label'=>false));
						echo $this->Form->input('Contentimage.imgTitle',array('label' =>'Title','class' =>'form-image form-group form-control inputcon'));
						echo $this->Form->input('Contentimage.imgTitlebn',array('label' =>'Title Bangla','class' =>'form-image form-group form-control inputcon nd_keyboard','required' => false));
						echo $this->Form->input('Contentimage.imgTxt', array('type' => 'textarea','label' =>'Details','class'=>'form-control '));
						echo $this->Form->input('Contentimage.imgTxtbn', array('type' => 'textarea','label' =>'Details Bangla','class'=>'form-control nd_keyboard','required' => false));
				
					?>
				</fieldset>
				
				
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary pull-right" type="submit">Submit</button>
			</div>
			<?php echo $this->Form->end(); ?>
			<?php if(!empty($data)):?>
			<div id="sortableimages" style ="margin-top: 30px;">
				<h1>Images</h1>
				<?php echo $this->Form->create('add_content_image');?>	
				<ul id = "sortable">
					<?php 
						foreach($data as $imgaes):
								$location = "img/upload/small/".$imgaes['Contentimage']['id'].".png";
							$imgLoc = "upload/small/".$imgaes['Contentimage']['id'].".png";
							if((is_file($location))):
					?>
							<li class="ui-state-default">
								<?php echo $this->Html->image($imgLoc, array('width' => '200px;'));?>
								<?php echo $this->Html->link($this->Html->image('edit.png',array('title' =>"Edit")), array('action' => 'edit_content_image',$typ,$contentSlug,$imgaes['Contentimage']['id']), array('escape' => false)); ?>
								<?php echo $this->Html->link($this->Html->image('delete.gif',array('title' =>"Delete")), array('action' => 'delete_content_image',$typ,$contentSlug,$imgaes['Contentimage']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $imgaes['Contentimage']['id'])); ?>
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
			
			<?php echo $this->Form->end(); ?>
		</div>
	</div>    
</div>


