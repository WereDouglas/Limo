<?php
$this->extend('/Common/login');
$this->assign('title', 'Register');
$this->assign('header', 'Or sign up with credentials');
?>
<!-- Navbar -->
<?php $this->start('form'); ?>
<?= $this->Form->create($company, ['type' => 'file']) ?>
<fieldset>

    <?php
    echo '<h1 class="mb--1"><span class="badge badge-pill badge-info">Company information</span></h1>';
    echo $this->Form->control('name');
    echo $this->Form->control('address');
    echo $this->Form->control('contact');
    echo $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control']);
    echo '<h1><span class="badge badge-pill badge-info">User Information</span></h1>';
    echo $this->Form->control('users.first_name');
    echo $this->Form->control('users.last_name');
    echo $this->Form->control('users.contact');
    echo $this->Form->control('users.email');
    echo $this->Form->control('users.password');

    ?>
</fieldset>
<?php echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>

<?php $this->end(); ?>
<?php $this->start('links');?>
<div class="row mt-3">
    <div class="col-6 text-right">
        <?php
        echo $this->Html->link(
            'login',
            array(
                'controller' => 'users',
                'action' => 'login'
            ),
            array(
                'class' => 'text-light'
            )
        );
        ?>

    </div>
</div>
<?php $this->end(); ?>


