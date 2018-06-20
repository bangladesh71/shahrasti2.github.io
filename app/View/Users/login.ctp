<style>
    .field-wrap > input {
        height: auto;
    }
</style>


<!--<ul class="tab-group" >
        <li class="tab active" ><a href="#login">Log In</a></li>
       <li class="tab"><a href="#signup">Sign Up</a></li>

</ul>-->
<div id="login">
    <h1>Call Center Automation</h1>
    <h3 class="login-subheader" style="margin-bottom:65px;color:white;text-align:center">Shahrasti, Chandpur</h3>



    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'login'),'name'=>'form'));?>

    <div class="field-wrap">
        <label>
            <span> Username </span><span class="req">*</span>
        </label>


        <?php echo $this->Form->input('username',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
    </div>

    <div class="field-wrap">
        <label>
            Password<span class="req">*</span>
        </label>


        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
    </div>

    <?php echo $this->Form->button('Log In',array('class'=>'button button-block'))?>

    <?php echo $this->Form->end();?>


</div>
<div id="signup">

    <?php echo $this->Form->create('User', array('url' => array('controller' => 'users', 'action' => 'signup'),'name'=>'form'));?>

    <div class="field-wrap">
        <label>
            Name<span class="req">*</span>
        </label>
        <?php echo $this->Form->input('name',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
    </div>
    <div class="field-wrap">
        <label>
            Email<span class="req">*</span>
        </label>
        <?php echo $this->Form->input('email',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
    </div>
    <div class="field-wrap">
        <label>
            Mobile<span class="req">*</span>
        </label>
        <?php echo $this->Form->input('mobileNo',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
    </div>

    <div class="field-wrap">
        <label>
            <span id="showMember">Membership ID<span class="req">*</span></span>
        </label>
        <?php echo $this->Form->input('memberid',array('div'=>false,'label'=>false,'autocomplete'=>'off','required','onChange'=>'checkMemberID(this.value)'));?>
    </div>

    <div class="field-wrap">
        <label>
            Password<span class="req">*</span>
        </label>
        <?php echo $this->Form->input('password',array('div'=>false,'label'=>false,'autocomplete'=>'off','required'));?>
    </div>


    <button type="submit" class="button button-block"/>Get Started</button>

    <?php echo $this->Form->end();?>

</div>



