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
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('cake.css') ?>

    <?= $this->Html->css('style.css') ?>
    <?= $this->Html->css('skeleton.css') ?>
    <?= $this->Html->css('normalize.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    
</head>
<body class="login">
     <div class="container">
        <div class="twelve columns center logo">
            <img src="/telafricamobile-admin/images/logo.png" />
        </div>
        <?php if($_SERVER['REQUEST_URI'] == '/'){ ?>
        <div class="twelve columns center white login-title">
            <h1><strong>SMS Gateway</strong> Login</h1>
        </div>
        <?php }?>
    </div>
    <div class="container">
        <div class="six columns offset-by-three">
            
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
             
        </div>
    </div>
    <script src="/telafricamobile-admin/js/jquery-2.1.4.js"></script>
</body>
</html>
