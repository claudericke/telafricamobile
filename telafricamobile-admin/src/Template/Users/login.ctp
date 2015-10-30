<div class="login-wrapper center">    
    
    <div class="twelve columns login-form">
        <?= $this->Flash->render('auth') ?>
        <?= $this->Form->create() ?>
        <div class="spacer">&nbsp;</div>
        <div class="twelve columns">
           <?php echo $this->Form->input('email',  ['label' => '', 'placeholder' => 'E-Mail Address', 'class' => 'emailInput u-full-width']); ?>
        </div>
        <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="twelve columns">
            
           <?php echo $this->Form->input('password', ['label' => '', 'placeholder' => 'Password', 'class' => 'passwordInput u-full-width']); ?>
        </div>
        <div class="twelve columns"><div class="spacer">&nbsp;</div></div>
        <div class="four columns margin5 center" >
            <input type="button" name="register" class="button-primaryloginRegister center greenBG white u-full-width " value="Register" onclick="window.location = '/telafricamobile-admin/users/register/'" />
            
        </div>
        <div class="three columns margin5 center">
            <input type="submit" name="submit" class="button-primary loginSubmit blueBG white u-full-width" value="Login" />
        </div>
        <div class="four columns forgotLinks">
            <!--<span class="u-full-width"><a href="#" class="forgotUsername">Forgot your Username?</a></span>-->
            <span class="u-full-width"><!--<a href="/users/forgotpassword/" class="forgotUsername">Forgot your Password?</a>-->
            <?= $this->Html->link('Forgot your Password?', ['controller' => 'users', 'action' => 'forgotpassword']) ?>
            </span>
        </div>
        <?= $this->Form->end() ?>
    </div>
    <div class="twelve columns"><div class="spacer"></div></div>
    <div class="twelve columns left">
    <span class="Linkarrow"><img src="/telafricamobile-admin/images/right133.png" alt="" /></span><a href="../">Go to Home Page</a></div>
    
</div>