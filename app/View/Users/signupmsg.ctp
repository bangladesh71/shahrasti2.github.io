           
        <div id="signup" style="display: block;">   
          <h1>Forgot Password!</h1>
          <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'signupmsg'),'name'=>'form'));?>
          
            <div class="field-wrap">
            <label>
             <span> Email</span><span class="req">*</span>
            </label>
            
         
            <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
          </div>
    
         
          
          
          <?php echo $this->Form->button('Send Email',array('class'=>'button button-block'))?>
          
          <?php echo $this->Form->end();?>


        </div>