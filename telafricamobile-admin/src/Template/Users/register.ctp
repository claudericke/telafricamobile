<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="register-wrapper center" style="min-height: 900px;">
	<div class="twelve columns center">
		<h4><strong>SMS Gateway</strong> Register</h4>
          <p>Please enter your details below to be registerd for the Beta Testing Phase. You will be notified via e-mail once system is available to you</p>
	</div>
	<div class="twelve columns register-form">
		<?php 
			echo $this->Form->create($user);
		?>
		<div class="spacer">&nbsp;</div>
	    <div class="twelve columns">
			<?php echo $this->Form->input('firstname', ['label' => '', 'placeholder' => 'First Name', 'class' => 'u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php echo $this->Form->input('lastname', ['label' => '', 'placeholder' => 'Last Name', 'class' => 'u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('email',  ['label' => '', 'placeholder' => 'E-Mail Address', 'class' => 'emailInput u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('mobilenumber',  ['label' => '', 'placeholder' => 'Mobile Number', 'class' => 'mobileInput u-full-width']); ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns left">
		<?php 
            echo $this->Form->input('countrycode', [
              'class' => 'u-full-width', 
              'label' => '',
              'options' => $countries,
              'empty' => 'Select a country',
              'required' => 1
           ]);
           ?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('password', ['label' => '', 'placeholder' => 'Password', 'class' => 'passwordInput u-full-width']); ?> 
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php
			echo $this->Form->input('password_confirm', ['label' => '', 'placeholder' => 'Confirm Password', 'type'=>'password', 'class' => 'passwordInput u-full-width']);
		?>
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns margin5 center">
           <div class="g-recaptcha" data-sitekey="<?php echo $sitekey; ?>"></div>
        </div>
        <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns forgotLinks">
            <span class="u-full-width"><a href="/terms.php" class="forgotUsername">By proceeding you agree to our Terms of Usage</a></span>
        </div>
        <div class="four columns margin5 center" >
            <input type="submit" name="register" class="button-primaryloginRegister center greenBG white u-full-width " value="Register" />
        </div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<?php 
			//echo $this->Form->button(__('Register', array('class' => 'button-primaryloginRegister center greenBG white u-full-width')));
			echo $this->Form->input('role', ['type' => 'hidden', 'value' => 'regular']);
			echo $this->Form->end(); 
		?>
	</div>
	<div class="twelve columns"><div class="spacer"></div></div>
	<div class="twelve columns left">
	    <span class="Linkarrow"><img src="/telafricamobile-admin/images/right133.png" alt="" /></span>
          <?= $this->Html->link('Go to Login Page', ['controller' => 'users', 'action' => 'login']) ?>
	    <br/> <span class="Linkarrow"><img src="/telafricamobile-admin/images/right133.png" alt="" /></span><a href="/">Go to Home Page</a>
	</div>
</div>