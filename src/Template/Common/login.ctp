<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <?= $this->Html->css('argon.css') ?>
    <?= $this->Html->css('all.min.css') ?>
    <?= $this->Html->script(['jquery.min', 'bootstrap.bundle.min.js', 'argon.js']); ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
</head>
<?= $this->Flash->render() ?>
<body class="bg-default">

<div class="main-content">
    <?php if($this->fetch('nav')){ ?>
        <?= $this->fetch('nav') ?>
    <?php } ?>
    <?php if($this->fetch('header')): ?>
        <?= $this->fetch('header') ?>
    <?php endif; ?>
    <?= $this->fetch('content') ?>
</div>
<?php if($this->fetch('footer')): ?>
    <?= $this->fetch('footer') ?>
<?php endif; ?>
</body>
<?= $this->fetch('script') ?>
</html>

