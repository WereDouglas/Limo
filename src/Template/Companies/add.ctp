<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

<?php $this->end(); ?>
<?php $this->start('form'); ?>

<?= $this->Form->create($company, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Add') ?></legend>
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

    echo $this->Form->control('activated',
        ['options' => $active, 'empty' => 'yes', 'class' => 'form-control']);
    ?>
</fieldset>
<?php echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>
<?php $this->end(); ?>
