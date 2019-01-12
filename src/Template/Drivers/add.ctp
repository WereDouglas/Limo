<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
$this->extend('/Common/addPage');
?>

<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Drivers'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

<?php $this->end(); ?>


<?php $this->start('form'); ?>
<?= $this->Form->create($driver) ?>
<fieldset>
    <legend><?= __('Add Driver') ?></legend>
    <?php
    echo $this->Form->control('license');
    echo $this->Form->control('user_id', ['options' => $users,'class' => 'form-control form-control-alternative']);
    echo $this->Form->control('expires', [
        'label' => 'Expiry Date',
        'empty' => true,
        'class' => 'form-control form-control-alternative'
    ]);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>

<?php $this->end(); ?>
