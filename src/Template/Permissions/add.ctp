<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>

<?php $this->end(); ?>

<?php $this->start('form'); ?>
<?= $this->Form->create($permission) ?>
<fieldset>
    <legend><?= __('Add Permission') ?></legend>
    <?php
    echo $this->Form->control('name');
   // echo $this->Form->control('role_id', ['class' => 'form-control','options' => $roles]);
    echo $this->Form->control('roles._ids', ['class' => 'form-control', 'options' => $roles]);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?php $this->end(); ?>
