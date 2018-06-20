<style>
<!--
#ContentImage, #ContentPdf, #Image, #CommitteeImage {
  margin-left: 0;
  margin-top: 0;
}
-->
</style>
<?php
echo $this->element('tinymce');
$type_id = $type;
?>
<?php 
	echo $this->Html->script(array('keyboard'));
?>
<div class="row">
	<div class="col-md-8">
		<?php echo $this->Form->create('Content',array('type' => 'file')); ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __('Edit Content'); ?></strong></h3>
				<ul class="panel-controls">
					<li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
				</ul>
			</div>
			<div class="panel-body">                                                                        
				<fieldset>
					<?php
						echo $this->Form->input('id');
						echo $this->Form->hidden('title',array('label'=>'','value'=>$this->request->data['Content']['title']));
						echo $this->Form->input('titlebn',array('label'=>'Title bn','class'=>'form-control nd_keyboard'));
						echo $this->Form->input('contentbn',array('id'=>'Content','label'=>'Content Bangla','class'=>'form-control nd_keyboard','required' => false));
						//echo $this->Form->input('contentbns',array('label'=>'Content Write for Bangla','class'=>'form-control nd_keyboard'));
						echo 'Upload pdf';
						echo $this->Form->file('pdf', array('type'=>'file','label'=>false));
				
					?>
				</fieldset>
			</div>
			<div class="panel-footer">
				<button class="btn btn-primary pull-right" type="submit">Submit</button>
			</div>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>    
</div>