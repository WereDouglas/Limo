<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>

<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links');?>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $driver->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Drivers'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

<?php $this->end();?>
<?php $this->start('form');?>
<?= $this->Form->create($driver) ?>
<fieldset>
    <legend><?= __('Edit Driver') ?></legend>
    <?php
    echo $this->Form->control('license');
    echo $this->Form->control('user_id', ['options' => $users]);
    echo $this->Form->control('expires', [
        'label' => 'Expire Date',
        'empty' => true,
        'class' => 'form-control'
    ]);
    ?>
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>

<?php $this->end();?>
