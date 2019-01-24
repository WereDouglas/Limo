<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver $driver
 */
?>
<?php $this->extend('/Common/viewPage'); ?>
<?php $this->start('links');?>
<li><?= $this->Html->link(__('Edit Driver'), ['action' => 'edit', $driver->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Driver'), ['action' => 'delete', $driver->id], ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?> </li>
<li><?= $this->Html->link(__('List Drivers'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Driver'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>

<?php $this->end();?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

</div>
<?php $this->end(); ?>
<?php $this->start('form');?>

<h3><?= h($driver->id) ?></h3>

<table class="vertical-table table-responsive">
    <tr>
        <th scope="row"><?= __('License') ?></th>
        <td><?= h($driver->license) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('User') ?></th>
        <td><?= $driver->has('user') ? $this->Html->link($driver->user->id, ['controller' => 'Users', 'action' => 'view', $driver->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($driver->id) ?></td>
    </tr>
</table>
<?php $this->end();?>
