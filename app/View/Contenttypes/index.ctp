
<?php $array_types_show = array ( 'events' => 'Event','classifiedpage'=>'Classified Page'  );?>

<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Dashboard',array('controller'=>'users','action'=>'dashboard'));?></li>                    
    <li class="active"><?php echo __('Category'); ?></li>
</ul>
<!-- END BREADCRUMB -->
<div class="col-md-12">
	<div class="panel panel-success">
		<div class="panel-heading">
			<div class="col-md-6">
				<h3 align="left" class="panel-title"><?php echo __('Category'); ?></h3>
			</div>
			<div align="right" class="col-md-6">
				<?php echo $this->Html->link(__('Add Category'), array('action' => 'add'),array('class'=>'btn btn-success btn-rounded','escape'=>false)); ?>
			</div>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
		<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover">
		<tr>
				<th><?php echo $this->Paginator->sort('name'); ?></th>
				<th><?php echo $this->Paginator->sort('ctype','Type'); ?></th>
				<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
		$i = 0;
		 foreach ($contenttypes as $contenttype): 
		 $pageId = json_decode($contenttype['Contenttype']['ctype']);
		 $pageName = null;
		 if(!empty($pageId)){
		 	foreach($pageId as $value){
		 		$pageName .= $array_type[$value].',';
		 	}
		 }
		?>
		<tr>
			<td><?php echo h($contenttype['Contenttype']['name']); ?>&nbsp;</td>
			<td><?php  echo h(substr(ucfirst($pageName),0,-1)); ?>&nbsp;</td>
			
			<td class="actions">
				<?php //echo $this->Html->link(__('<i style="color: blue" class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $contenttype['Contenttype']['id']),array('escape' =>false,'title'=>'View')); ?>
				<?php echo $this->Html->link(__('<i style="color: green" class="glyphicon glyphicon-edit"></i>'), array('action' => 'edit', $contenttype['Contenttype']['id']),array('escape' =>false,'title'=>'Edit')); ?>
				<?php //echo $this->Form->postLink(__('<i style="color: red" class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $contenttype['Contenttype']['id']), array('escape' =>false,'title'=>'Delete'), __('Are you sure you want to delete # %s?', $contenttype['Contenttype']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
		</table>
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
</div>