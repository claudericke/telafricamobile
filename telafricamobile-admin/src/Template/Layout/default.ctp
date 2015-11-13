<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'telafrica SMS Gateway';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>
    <?= $this->Html->meta('icon') ?>

     <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('skeleton.css') ?>
    <?= $this->Html->css('entypo.css') ?>
    <?= $this->Html->css('media-queries.css') ?>
    <?= $this->Html->css('sweetalert.css') ?>
    <?= $this->Html->css('tabs.css') ?>
    <?= $this->Html->css('jquery.tagsinput.css') ?>
    
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <script src="/telafricamobile-admin/js/jquery-2.1.4.js"></script>
    <script src="/telafricamobile-admin/js/jquery-ui.min.js"></script>
    <script src="/telafricamobile-admin/js/sweetalert.min.js"></script>
    
</head>
<body class="dashboard">
     <nav class="topNav">
    <ul>
        <li><img src="/telafricamobile-admin/images/logo.png" alt="telafrica mobile" /></li>
        <li><strong>telafrica</strong> <?= $this->fetch('title') ?></li>
        <li class="dashboard"><?= $this->Html->link('Dashboard', ['controller' => 'dashboards', 'action' => 'index']) ?></li>
        <li class="messageCenter"><?= $this->Html->link('Message Center', ['controller' => 'messages', 'action' => 'index']) ?></li>
        <li class="settings"><?= $this->Html->link('Settings', ['controller' => 'users', 'action' => 'settings']) ?></li>
        <li class="account"><?= $this->Html->link('Accounts', ['controller' => 'users', 'action' => 'index']) ?></li>
        <li class="reports"><a href="">Reports</a></li>
        <li class="support"><a href="">Support</a></li>
        <li class="Logout"><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></li>
        <li class="close" onclick="toggleNav();" ><a href="#">Close</a></li>
    </ul>
</nav>
<header>
    <div class="menu" ><span class="entypo-menu" onclick="toggleNav();">&nbsp;</span></div>
        <div class="container">
            <!-- Logo  -->
            <div class="two columns dashboardLogo">
                <img src="/telafricamobile-admin/images/logo_small.png" alt="telafrica mobile" />
            </div>
            <!-- Logo  -->


            <!-- Current Page Title  -->
            <div class="five columns left pageTitle">
                <span><?= $this->fetch('title') ?></span>
            </div>
            <!-- Current Page Title  -->


            <!-- Currently Logged in User  -->
            <div class="five columns  userName">
                <span>Logged in as <a href="#" class="openLogout"><span><?php echo $this->request->session()->read('Auth.User.email'); ?><span ><img src="/telafricamobile-admin/images/icons/down_arrow.png" alt="\/"/></span></span></a></span>
            </div>
            <div class="logout">
                <span><?= $this->Html->link('Dashboard', ['controller' => 'dashboards', 'action' => 'index']) ?></span>
                <br/>
                <span><?= $this->Html->link('Add Credits', ['controller' => 'users', 'action' => 'index']) ?></span>
                <br/>
                <span><?= $this->Html->link('Log Out', ['controller' => 'users', 'action' => 'logout']) ?></span>
            </div>
            <!-- Currently Logged in User  -->
        </div>
</header>
 <!-- Start Notifications and Alerts Panel  -->
    <section class="notifications">
        <div class="container">
            <div class="twelve columns">
                <div class="panel notice">
                   <?= $this->Flash->render() ?>
                </div>
            </div>
            <div class="twelve columns">
                <div class="panel alert">This is an alert</div>
            </div>
        </div>
    </section>
    <!-- End Notifications and Alerts Panel  -->
   

    
    <?= $this->fetch('content') ?>
             

<!-- Links for Scripts  -->

<!-- Javascript  -->
<script>
    $(document).ready(function() {
          $(".alert").hide();
        $(".notice").hide();
    });

    // Show and Hide Log In Button
    $(".userName").click(function(){
        $(".logout").slideToggle("fast");
    });

   // Show and Hide Navigation
    function toggleNav() {
        $("nav").toggle("slide", {direction: "left"}, 500);
    }
</script>
</body>
</html>
