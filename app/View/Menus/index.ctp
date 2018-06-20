<?php 
  //For Sortable
	echo $this -> Html -> script(array('jquery-ui'));
?>

<script>
	$(document).ready(function(){
		$(function() {
			$( ".sortable" ).sortable();
		});
		
	});
</script>
<style> 

.sortable  li{
		margin: 0px 0px 0px 20px;
		cursor: pointer;
}

</style>
<?php if($current_user['role']==1){?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Dashboard',array('controller'=>'users','action'=>'dashboard'));?></li>                    
    <li class="active"><?php echo __('Menus'); ?></li>
</ul>
<!-- END BREADCRUMB -->
<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			<div class="col-md-6 col-xs-6">
				<h3 align="left" class="panel-title"><?php echo __('Menus'); ?></h3>
			</div>
			<div align="right" class="col-md-6 col-xs-6"><?php echo $this->Html->link(__('Add Menu'), array('action' => 'add',$this->params['pass'][0]),array('class'=>'btn btn-success btn-rounded','escape'=>false)); ?></div>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover">
					<tr>
							<th><?php echo $this->Paginator->sort('name','Name'); ?></th>
							<th><?php echo $this->Paginator->sort('slug','Slug'); ?></th>
							<th><?php echo $this->Paginator->sort('parent_id','Parent Menu'); ?></th>
							<th><?php echo $this->Paginator->sort('type','Type'); ?></th>
							<th><?php echo $this->Paginator->sort('content_id','Content'); ?></th>
							<th><?php echo $this->Paginator->sort('url','url'); ?></th>
							<th><?php echo $this->Paginator->sort('role','Role'); ?></th>
							<th><?php echo $this->Paginator->sort('status','Status'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					<?php foreach ($menus as $menu):
				
					?>
					<tr>
								<td><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
								<td><?php echo h($menu['Menu']['slug']); ?>&nbsp;</td>
								<td>
									<?php echo $menu['ParentMenu']['name']; ?>
								</td>
								<td><?php echo h($menu_type[$menu['Menu']['type']]); ?>&nbsp;</td>
								<td>
									<?php echo $menu['Content']['title']; ?>
								</td>
								<td><?php echo h($menu['Menu']['url']); ?>&nbsp;</td>
								<td><?php echo h($menu_role[$menu['Menu']['role']]); ?>&nbsp;</td>
								<td><?php echo h($menu_status[$menu['Menu']['status']]); ?>&nbsp;</td>
						<td class="actions">
							<!--<?php echo $this->Html->link(__('<i style="color: blue" class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $menu['Menu']['id']),array('escape' =>false,'title'=>'View')); ?>-->
							<?php echo $this->Html->link(__('<i style="color: green" class="glyphicon glyphicon-edit"></i>'), array('action' => 'edit', $menu['Menu']['slug'],$menu['Menu']['menu_type']),array('escape' =>false,'title'=>'Edit')); ?>
							<?php echo $this->Form->postLink(__('<i style="color: red" class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $menu['Menu']['id']), array('escape' =>false,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $menu['Menu']['id'])); ?>
						</td>
					</tr>
				<?php endforeach; ?>
					</table>
			</div>
			<p class="col-md-6 paging_txt">
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>	
			</p>
			<div class="col-md-6 paging">
				<?php
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ''));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
				?>
			</div>
		</div>
		
	
	</div>
</div>
<div style="margin-top: 20px;box-shadow: 0 0 4px;" class="panel panel-default">
<!--<?php if(!empty($menuSortable)):?>
	<div class="panel-heading">
		<h4 class="mws-i-24 i-table-1"><?php echo __('Sortable Menu');?></h4>
	</div>
	<div class="panel-body">
		<?php echo $this -> Form -> Create ('Menu', array('url' => array('controller' => 'menus', 'action' => 'order'),'class' => 'mws-form'));?>
		<div style="margin:0px 0px 0px 30px">
			<?php echo $this->Tree->menuSortable($menuSortable, 0, 'sortable','dsfd');?> 
		</div>
		
		
	</div>
	<div class="panel-footer">
         <button type="submit" class="btn btn-primary pull-right">Sort</button>
    </div>-->
</div>
	<?php endif;?>
	
	<?php }else{
                     echo $this->element('unauth');
                     	
                     	?>   
                     
                     <?php }?>
