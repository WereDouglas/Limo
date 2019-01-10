<?php
$this->extend('/Common/login');
$this->assign('title', 'login');
$this->assign('header', 'Or sign in with credentials');
?>

<!-- Page content -->
<?php $this->start('form'); ?>
<?php echo $this->Form->create('users', array(
    'inputDefaults' => array(
        'div' => 'form-group',
        'label' => false,
        'wrapInput' => false,
        'class' => 'form-control',
        'role' => 'form'
    ),

)); ?>
    <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
            </div>
            <input class="form-control" name="contact" placeholder="Contact" type="text" required autofocus>
        </div>
    </div>
    <div class="form-group">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input class="form-control" name="password" placeholder="Password" type="password" required>
        </div>
    </div>
    <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id=" name="rememberme" customCheckLogin" type="checkbox">
        <label class="custom-control-label" for=" customCheckLogin">
            <span class="text-muted">Remember me</span>
        </label>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-primary my-4">Sign in</button>
    </div>
<?= $this->Form->end() ?>
<?php $this->end(); ?>
<?php $this->start('links'); ?>
<div class="row mt-3">
    <div class="col-6">
        <a href="#" class="text-light">
            <small>Forgot password?</small>
        </a>
    </div>
    <div class="col-6 text-right">
        <?php
        echo $this->Html->link(
            'Create new account',
            array(
                'controller' => 'users',
                'action' => 'register'
            ),
            array(
                'class' => 'text-light'
            )
        );
        ?>

    </div>
</div>
<?php $this->end(); ?>


