
<style>
<!--
#ContentImage, #ContentPdf, #Image, #CommitteeImage {
  margin-left: 0;
  margin-top: 0;
}
-->
</style>
<?php if($current_user['role']==1){?>
<div class="row">
<div class="col-md-8">
                            
                            <?php echo $this->Form->create('Content',array('type'=>'file','class'=>'form-horizontal')); ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong><?php echo __('Edit Content'); ?></strong></h3>
                                    <ul class="panel-controls">
                                        <li><a href="wsdindex.html#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>
                                </div>
                                <div class="panel-body">                                                                        
                                    
                                    <div class="row">


<?php
echo $this->element('tinymce');
$type_id = $type;
?>

	<h2></h2>
	<fieldset class="col-md-6">
	<?php
	
		$image="";
	
		if($type_id==2){
			$image='<span style="color:red">(width:940px height:310px)</span>';
		}elseif($type_id==16){
			$image='<span style="color:red">(width:850px height:450px)</span>';
		}elseif($type_id==1){
			$image='<span style="color:red">(width:800px)</span>';
		}elseif($type_id==3){
			$image='<span style="color:red">(width:300px height:250px)</span>';
		}elseif($type_id==3){
			$image='<span style="color:red">(width:300px height:250px)</span>';
		}elseif($type_id==5){
			$image='<span style="color:red">(width:650px height:350px)</span>';
		}elseif($type_id==6){
			$image='<span style="color:red">(width:800px)</span>';
		}elseif($type_id==9){
			$image='<span style="color:red">(width:800px)</span>';
		}elseif($type_id==10){
			$image='<span style="color:red">(width:800px)</span>';
		}elseif($type_id==7){
			$image='<span style="color:red">(width:250px height:200px)</span>';
		}elseif($type_id==8){
			$image='<span style="color:red">(width:650px height:350px)</span>';
		}elseif($type_id==17){
			$image='<span style="color:red">(width:850px height:450px)</span>';
		}
		
		echo $this->Form->hidden('type', array('value'=> $type_id));
		echo $this->Form->input('id');
		echo $this->Form->input('title',array('class'=>'form-group form-control inputcon'));
		if(!empty($contenttypes)){
			echo $this->Form->input('contenttype_id',array('type'=>'select','label'=>'Category','div'=>false,'class'=>'form-group form-control inputcon','empty' => array(''=> '--select--')));
		}
		if($this->params['pass'][0]=="newsfeeds"){
			echo $this->Form->input('content',array('id'=>'Contents','type'=>'text','label'=>'Video Link','class'=>'form-group form-control inputcon'));
		}elseif($this->params['pass'][0]=="videogallery"){
			echo $this->Form->input('content',array('id'=>'Contents','type'=>'text','label'=>'Video Link','class'=>'form-group form-control inputcon'));
		}elseif($this->params['pass'][0]=="stream"){
			echo $this->Form->input('content',array('id'=>'Contents','type'=>'textarea','label'=>'Live Video Stream Code','class'=>'form-group form-control inputcon'));
		}else{
			echo $this->Form->input('content',array('id'=>'Content'));
		}
		
		
		
		echo '<div class="upload"> Upload Image '.$image.' </div>';
		echo $this->Form->file('image', array('type'=>'file','label'=>false));
		
		$notpdf=0;
		if($this->params['pass'][0]!="videogallery"){
			$notpdf=1;
		}
		if($this->params['pass'][0]!="photogallery"){
			$notpdf=1;
		}
		if($notpdf==0){
			echo 'Upload pdf';
			echo $this->Form->file('pdf', array('type'=>'file','label'=>false));
		}
	?>
	</fieldset>
     </div>
                                
                            </div>
                            <div class="panel-footer">
                                    <button class="btn btn-primary pull-right" type="submit">Submit</button>
                                </div>
                         <?php echo $this->Form->end(); ?>
                            
                        </div>
                    </div>    
</div>
 <?php }else{
                     echo $this->element('unauth');
                     	
                     	?>   
                     
                     <?php }?>