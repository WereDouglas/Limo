<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
$this->extend('/Common/addPage');
?>
<?php $this->Html->css('material-bootstrap-wizard.css', ['block' => 'wizardCss']); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Drivers'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<?php $this->end(); ?>

<?php $this->start('form'); ?>
<?= $this->Form->create($driver, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Add Driver') ?></legend>
    <?php
    echo '<h1><span class="badge badge-pill badge-info">User Information</span></h1>';
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('contact');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->control('type',
        ['options' =>$types, 'empty' =>'(choose one)', 'class' => 'form-control']);
    echo $this->Form->control('roles._ids', ['class' => 'form-control', 'options' => $roles]);
    echo $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control']);
    echo $this->Form->control('activated',
        ['options' =>$active, 'empty' =>'yes', 'class' => 'form-control']);
    echo '<h1><span class="badge badge-pill badge-info">Driver Information</span></h1>';
    echo $this->Form->control('drivers.license');
   // echo $this->Form->control('user_id', ['options' => $users, 'class' => 'form-control form-control-alternative']);
    ?>
    <div class="form-group">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>

            <input name="expires" class="form-control datepicker" placeholder="Expires" type="text"
                   value="<?= date('m/d/Y') ?>">
        </div>
    </div>
</fieldset>

<?php echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>

<?php $this->end(); ?>

<?php $this->Html->script('bootstrap-datepicker.min.js', ['block' => 'dateScript']); ?>

<?php /*$this->Html->script('bootstrap.min.js', ['block' => 'bootstrapMinScript']); */?><!--
<?php /*$this->Html->script('jquery.bootstrap.js', ['block' => 'bootstrapJqueryScript']); */?>
<?php /*$this->Html->script('material-bootstrap-wizard.js', ['block' => 'materialScript']); */?>
--><?php /*$this->Html->script('jquery.validate.min.js', ['block' => 'validateScript']); */?>
