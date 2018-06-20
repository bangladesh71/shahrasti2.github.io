<?php 
 $array_type_show = array ('pages' => 'Page', 'slider' => 'Slider', 'about' => 'About Us', 'sponsor' => 'Sponsor', 'newsfeeds' => 'News Feed', 'newsletters' => 'News Letter', 'quotes' => 'Quote', 'photogallery' => 'Gallery', 'events' => 'Event', 'notice' => 'Notice', 'stream' => 'Live Video Stream','12' => 'academic','13' => 'library','14' => 'breakingnews','15' => 'archive','classifiedpage'=>'Classified Page','videogallery'=>'Video Album','facilities'=>'Facilities and Services'  );

?>
<!-- START BREADCRUMB -->
<ul class="breadcrumb">
    <li><?php echo $this->Html->link('Dashboard',array('controller'=>'users','action'=>'dashboard'));?></li>                    
    <li class="active"><?php echo __($array_type_show[$this->params['pass'][0]]); ?></li>
</ul>
<!-- END BREADCRUMB -->
<div class="col-md-12">
	<div class="panel panel-success">
	<?php echo $this->Session->flash(); ?>
		<div class="panel-heading">
			<div class="col-md-6 col-xs-6">
				<h3 align="left" class="panel-title"><?php echo __($array_type_show[$this->params['pass'][0]] .' Contents'); ?></h3>
			</div>
			<div align="right" class="col-md-6 col-xs-6"><?php echo $this->Html->link(__("Add ".$array_type_show[$this->params['pass'][0]]), array('action' => 'add',$this->params['pass'][0]),array('class'=>'btn btn-success btn-rounded','escape'=>false)); ?></div>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-hover">
					<tr class="info">
							<th><?php echo 'Image'; ?></th>
							<th><?php echo $this->Paginator->sort('title'); ?></th>
							<th><?php echo $this->Paginator->sort('content'); ?></th>
							<th><?php echo $this->Paginator->sort('type'); ?></th>
							<?php 
							if(!empty($contents)){
								if($contents[0]['Content']['type']==5 || $contents[0]['Content']['type']==8){
					               echo '<th>Category</th>';
								}
							}
							?>
							<th class="actions"><?php echo __('Actions'); ?></th>
					</tr>
					
					<?php
				  
					 foreach ($contents as $content): 
					 
					$type_cat_id = $content['Content']['type'];
					$type = $array_type[$type_cat_id];
					
					?>
					<tr>
						<td><?php echo $this->Html->image('upload/large/'.$content['Content']['id'].'.png',array('width'=>'50'));?></td>
					
						<td><?php
						 echo $content['Content']['title']; ?>&nbsp;</td>
						<td><?php echo strip_tags(substr($content['Content']['content'],0,20)) ; ?>&nbsp;</td>
						<td><?php echo  $array_type_show[$type]; ?>&nbsp;</td>
						<?php 
							if($contents[0]['Content']['type']==5 || $contents[0]['Content']['type']==8){
				               echo '<td>'. $content['Contenttype']['name'] .'</td>';
							}
							
							?>
						<td class="actions">
							<?php //echo $this->Html->link(__('<i style="color: blue" class="glyphicon glyphicon-eye-open"></i>'), array('action' => 'view', $content['Content']['id']),array('escape' =>false)); ?>
							<?php
								if($type !='slider')
								{
									//echo $this->Html->link(__('<i style="color: #2AAAFF" class="glyphicon glyphicon-picture"></i>'), array('action' => 'add_content_image',$array_type[$content['Content']['type']],$content['Content']['slug']),array('escape' =>false,'title'=>'Photo Edit'));
								}
							?>
							<?php
								if($type=='videogallery'){
									//echo $this->Html->link(__('<i style="color: #FF2A55" class="glyphicon glyphicon-facetime-video"></i>'), array('action' => 'add_content_video',$array_type[$content['Content']['type']],$content['Content']['slug']),array('escape' =>false,'title'=>'Photo Edit'));
								}
								 
							?>
							<?php echo $this->Html->link(__('<i style="color: green" class="glyphicon glyphicon-edit"></i>'), array('action' => 'edit', $type,$content['Content']['slug']),array('escape' =>false,'title'=>'Edit')); ?>
							<?php //echo $this->Html->link(__('<span style="border: 1px solid green;border-radius: 4px;color: green;font-size: 12px;font-weight: bold;padding: 0 2px;">bn</span>'), array('action' => 'editbn', $type,$content['Content']['slug']),array('escape' =>false)); ?>
							<?php echo $this->Form->postLink(__('<i style="color: red" class="glyphicon glyphicon-trash"></i>'), array('action' => 'delete', $type, $content['Content']['id']),array('escape' =>false), __('Are you sure you want to delete # %s?', $content['Content']['id'])); ?>
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

