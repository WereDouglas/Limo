<?php
$this->extend('/Common/login');
$this->assign('title', 'Register');
$this->assign('header', 'Or sign up with credentials');
?>
<!-- Navbar -->
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
    <div class="form-group">
        <div class="input-group input-group-alternative mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
            </div>
            <input class="form-control" placeholder="Name" type="text">
        </div>
    </div>
    <div class="form-group">
        <div class="input-group input-group-alternative mb-3">
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
    <div class="text-muted font-italic">
        <small>password strength: <span class="text-success font-weight-700">strong</span></small>
    </div>
    <div class="row my-4">
        <div class="col-12">
            <div class="custom-control custom-control-alternative custom-checkbox">
                <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                <label class="custom-control-label" for="customCheckRegister">
                    <span class="text-muted">I agree with the <a href="#!">Privacy Policy</a></span>
                </label>
            </div>
        </div>
    </div>
    <div class="text-center">
        <button type="button" class="btn btn-primary mt-4">Create account</button>
    </div>
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


