<script type="text/javascript">
<!--
$(document).ready(function(){
	//menu type wise menu link show hide method called at init
	menuTypeWiseUrlContentShowHide();
	
});
//menu type wise menu link show hide
function menuTypeWiseUrlContentShowHide(){

	
	var selected_type = $("#MenuType").val();
	if(selected_type == 1){
		$("#content_id").show();
		$("#MenuUrl").hide();
	}else{
		$("#content_id").hide();
		$("#MenuUrl").show();
	}
}


//-->
</script>
<?php 
	echo $this->Html->script(array('keyboard'));
?>

<div class="row">
	<div class="col-md-8">
		<div class="panel panel-default">
		<?php echo $this->Form->create('Menu'); ?>
			<div class="panel-heading">
				<h3 class="panel-title"><strong><?php echo __(ucwords($action).' Menu'); ?></strong></h3>
			</div>
			<div class="panel-body">
				<?php echo $this->Form->input('order',array('type'=>'hidden','order','value'=>0));?>
				<?php echo $this->Form->input('name',array('class'=>'form-group form-control inputcon','label' => 'Name'));?>
				
				<?php
				echo $this->Form->input('parent_id',array('type'=>'select','options'=>$parentMenus,'label'=>'Parent Menu','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
				<?php
				echo $this->Form->input('type',array('type'=>'select','options'=>$menu_type,'onchange'=>'menuTypeWiseUrlContentShowHide()','label'=>'Type','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
				
				<?php echo $this->Form->input('content_id',array('div' => array('id' => 'content_id'),'label'=>'Content','class'=>'form-control'));?>
				<?php echo $this->Form->input('url',array('class' =>'form-control','Url'));?>
				<?php
				echo $this->Form->input('role',array('type'=>'select','options'=>$menu_role,'label'=>'Role','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
				<?php
				echo $this->Form->input('status',array('type'=>'select','options'=>$menu_status,'label'=>'Status','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
			</div>	
				
				<?php echo $this->Form->end(__(ucwords($action))); ?>
		</div>
	</div>
</div>

