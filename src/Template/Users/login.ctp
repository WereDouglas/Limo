<?php
$this->extend('/Common/login');
$this->assign('title', 'login');
$this->assign('header', 'Or sign in with credentials');
?>

<!-- Page content -->
<?php $this->start('form'); ?>
<form role="form">
    <div class="form-group mb-3">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
            </div>
            <input class="form-control" placeholder="Email" type="email">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
            </div>
            <input class="form-control" placeholder="Password" type="password">
        </div>
    </div>
    <div class="custom-control custom-control-alternative custom-checkbox">
        <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
        <label class="custom-control-label" for=" customCheckLogin">
            <span class="text-muted">Remember me</span>
        </label>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-primary my-4">Sign in</button>
    </div>
</form>
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


