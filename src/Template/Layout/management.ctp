<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'erplimo';
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
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <?= $this->Html->css('nucleo.css') ?>
    <?= $this->Html->css('all.min.css') ?>
    <?= $this->Html->css('argon.css?v=1.0.0') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>
<body>
<?= $this->element('adminNav') ?>
<!-- Sidenav -->

<div class="main-content">
    <!-- content -->

    <?= $this->fetch('content') ?>
    <div class="col-lg-4 center ">
        <?= $this->Flash->render() ?>
    </div>

    <!-- Footer -->
    <?= $this->element('footer') ?>


<footer>
</footer>

<?= $this->Html->script(['jquery.min', 'bootstrap.bundle.min', 'argon']); ?>

</body>
</html>
