<section class="settings">
    <div class="container">
        <div class="twelve columns panel">
            <h4>Change Sender ID</h4>
            <p>Your sender ID is<span class="senderID"><strong> currently not set</strong></span></p>
            <?php 
                echo $this->Form->create($user);
            ?>
               
                <?php echo $this->Form->input('senderId',  ['label' => 'Enter Sender ID', 'placeholder' => 'Enter Sender ID', 'class' => '']); ?>
                <div class="twelve columns"><div class="spacer"></div></div>
                <h4>Change Password</h4>
                <p>To reset your password, enter your new password below:</p>
                <?php echo $this->Form->input('password_update', ['label' => 'Password', 'placeholder' => 'Password', 'class' => '', 'required' => 0, 'type'=>'password']); ?> 
                <?php
                    echo $this->Form->input('password_confirm_update', ['label' => 'Password Confirm', 'placeholder' => 'Confirm Password', 'type'=>'password', 'class' => '', 'required' => 0]);
        ?>
                <div class="twelve columns"><div class="spacer"></div></div>
                <div class="twelve columns"><input type="submit" name="register" class="saveSettings center greenBG white " value="Save Settings" /></div>

            <?php
            echo $this->Form->end();
            ?>
        </div>
    </div>
</section>