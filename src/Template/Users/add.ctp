<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
$this->extend('/Common/addPage');
?>
<?php $this->start('links'); ?>

<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>

<?php $this->end(); ?>
<?php $this->start('form'); ?>

<?= $this->Form->create($user, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Add User') ?></legend>
    <?php
    echo $this->Form->control('first_name');
    echo $this->Form->control('last_name');
    echo $this->Form->control('contact');
    echo $this->Form->control('email');
    echo $this->Form->control('password');
    echo $this->Form->select('type', ['Driver', 'Administrator', 'Management', 'Other'], ['empty' => '(choose one)']);
    echo $this->Form->control('company_id', ['class' => 'form-control', 'options' => $companies, 'empty' => true]);
    echo $this->Form->control('roles._ids', ['class' => 'form-control', 'options' => $roles]);
    echo $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control']);
    ?>
</fieldset>
<?php echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>


<?php $this->end(); ?>


