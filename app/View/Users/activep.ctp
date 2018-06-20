
<style>
.error-message{
	color: red;
}
</style>
 <div id="signup" style="display: block;">   
          <h1>Reset Password</h1>
          <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'activep'),'name'=>'form'));?>
          
           <div class="field-wrap">
            <label>
             <span> New Password</span><span class="req">*</span>
            </label>
            
         
            <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
          </div>
          <div class="field-wrap">
            <label>
             <span> Confirm New password</span><span class="req">*</span>
            </label>
            
         
            <?php echo $this->Form->input('cpassword',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
          </div>
    
          <p class="forgot"><a href="<?php echo $this->webroot?>users/login">Back to Login</a></p>
          <?php   if (!isset($ident)) {
							$ident='';
						}
						if (!isset($activate)) {
							$activate='';
						}   ?>
						<?php echo $this->Form->hidden('ident',array('value'=>$ident))?>
						<?php echo $this->Form->hidden('activate',array('value'=>$activate))?>
          
          <?php echo $this->Form->button('Reset',array('class'=>'button button-block'))?>
         			 
          <?php echo $this->Form->end();?>


        </div>













