
<div class="register-wrapper center" style="min-height: 748px;">
	<div class="twelve columns center ">
		<h4><strong>SMS Gateway</strong> Register</h4>
	</div>
	<div class="twelve columns register-form">
		<?php 
			echo $this->Form->create($user);
		?>
		<div class="spacer">&nbsp;</div>
	    <div class="twelve columns">
			<?php echo $this->Form->input('firstname', array('label' => '', 'placeholder' => 'First Name', 'class' => 'u-full-width')); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php echo $this->Form->input('lastname', array('label' => '', 'placeholder' => 'Last Name', 'class' => 'u-full-width')); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('email',  array('label' => '', 'placeholder' => 'E-Mail Address', 'class' => 'emailInput u-full-width')); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('moblienumber',  array('label' => '', 'placeholder' => 'Mobile Number', 'class' => 'mobileInput u-full-width')); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php 
			echo $this->Form->input('country', array('label' => '', 'placeholder' => 'Type Your Country', 'class' => 'u-full-width'));
		?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('password', array('label' => '', 'placeholder' => 'Password', 'class' => 'passwordInput u-full-width')); ?> 
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php
			echo $this->Form->input('password_confirm', array('label' => '', 'placeholder' => 'Confirm Password', 'type'=>'password', 'class' => 'passwordInput u-full-width'));
		?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns margin5 center">
            Google reCaptcha
        </div>

        <div class="four columns forgotLinks">
            <span class="u-full-width"><a href="#" class="forgotUsername">By proceeding you agree to our Terms of Usage</a></span>
        </div>
        <div class="four columns margin5 center" >
            <input type="submit" name="register" class="button-primaryloginRegister center greenBG white u-full-width " value="Register" />
        </div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<?php 
			//echo $this->Form->button(__('Register', array('class' => 'button-primaryloginRegister center greenBG white u-full-width')));
			echo $this->Form->end(); 
		?>
	</div>
	<div class="twelve columns"><div class="spacer"></div></div>
	<div class="twelve columns left">
	    <span class="Linkarrow"><img src="/images/right133.png" alt="" /></span><a href="login.php">Go to Login Page</a>
	    <br/> <span class="Linkarrow"><img src="/images/right133.png" alt="" /></span><a href="../">Go to Home Page</a>
	</div>
</div>
