<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>

<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Cars'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>


<?php $this->end(); ?>
<?php $this->start('form'); ?>

<?= $this->Form->create($car) ?>
<fieldset>
    <legend><?= __('Add Car') ?></legend>
    <?php
    echo $this->Form->control('plate');
    echo $this->Form->control('registration');

    echo $this->Form->control('expiry', [
        'label' => 'Date expires',
        'empty' => true,
        'class' => 'form-control'
    ]);
    echo $this->Form->control('user_id', ['class' => 'form-control','options' => $users, 'empty' => true]);
    echo $this->Form->control('photo', ['type' => 'file', 'class' => 'form-control']);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>

<?php $this->end(); ?>
