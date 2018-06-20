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
		$("#page").show();
		$("#url").hide();
		$("#content_id").show();
		$("#MenuUrl").hide();
	}else{
		$("#content_id").hide();
		$("#page").hide();
		$("#url").show();
		$("#MenuUrl").show();
	}
}


//-->
</script>
<?php 
	echo $this->Html->script(array('keyboard'));
?>
<?php if($current_user['role']==1){?>
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
				echo $this->Form->input('parent_id',array('type'=>'select','options'=>$parentMenus,'label'=>'Parent Menu','div'=>false,'class'=>'form-control','empty' => array('0'=> '--select--'),'required'=>true));
				?>
				
				<?php
				echo $this->Form->input('type',array('type'=>'select','options'=>$menu_type,'onchange'=>'menuTypeWiseUrlContentShowHide()','label'=>'Type','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
				
				
		
		
		     <div style="display: none;" id="page">Page</div>
		      <div style="display: none;" id="url">Url</div>
				<?php
					echo $this->Form->input('content_id',array('id' => 'content_id','type'=>'select','label'=>false,'div'=>false,'class'=>'form-control','empty' => array(''=> '--select--')));
				
				?>
				
				 <div></div>
				<?php echo $this->Form->input('url',array('class' =>'form-control','label'=>false));?>
				<?php
				echo $this->Form->input('menu_type',array('type'=>'select','options'=>array('1'=>'Top Menu','2'=>'Bottom Menu'),'label'=>'Menu Type','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
				<?php
				echo $this->Form->input('status',array('type'=>'select','options'=>$menu_status,'label'=>'Status','div'=>false,'class'=>'form-control','empty' => array(''=> '--select--'),'required'=>true));
				?>
			</div>	
				
				<?php echo $this->Form->end(__(ucwords($action))); ?>
		</div>
	</div>
</div>

<?php }else{
                     echo $this->element('unauth');
                     	
                     	?>   
                     
                     <?php }?>