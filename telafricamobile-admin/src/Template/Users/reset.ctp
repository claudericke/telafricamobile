<div class="register-wrapper center" style="min-height: 348px;">
	<div class="twelve columns center">
		<h4><strong>SMS Gateway</strong> Reset Password</h4>
	</div>
	<div class="twelve columns register-form">
		<?php 
			echo $this->Form->create();
		?>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
			<?php echo $this->Form->input('password', ['label' => '', 'placeholder' => 'Password', 'class' => 'passwordInput u-full-width', 'required' => 1]); ?> 
		</div>
		<div class="twelve columns"><div class="spacer">&nbsp;</div></div>
		<div class="twelve columns">
		<?php
			echo $this->Form->input('password_confirm', ['label' => '', 'placeholder' => 'Confirm Password', 'type'=>'password', 'class' => 'passwordInput u-full-width', 'required' => 1]);
		?>
		</div>
        <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns forgotLinks">
            <span class="u-full-width"><a href="/terms.php" class="forgotUsername">By proceeding you agree to our Terms of Usage</a></span>
        </div>
        <div class="four columns margin5 center" >
            <input type="submit" name="register" class="button-primaryloginRegister center greenBG white u-full-width " value="Submit" />
        </div>
	    <?php
          echo $this->Form->end(); 
         ?>
	<div class="twelve columns"><div class="spacer"></div></div>
	<div class="twelve columns left">
	    <span class="Linkarrow"><img src="/telafricamobile-admin/images/right133.png" alt="" /></span><a href="/">Go to Login Page</a>
	    <br/> <span class="Linkarrow"><img src="v/images/right133.png" alt="" /></span><a href="../">Go to Home Page</a>
	</div>
</div>