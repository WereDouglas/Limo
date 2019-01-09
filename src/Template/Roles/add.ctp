<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

<?php $this->end(); ?>
<?php $this->start('form'); ?>
<?= $this->Form->create($role) ?>
<fieldset>
    <legend><?= __('Add Role') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('users._ids', ['options' => $users]);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>


<?php $this->end(); ?>
