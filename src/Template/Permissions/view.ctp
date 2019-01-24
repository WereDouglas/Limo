<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<?php $this->extend('/Common/viewPage'); ?>
<?php $this->start('links');?>
<li><?= $this->Html->link(__('Edit Permission'), ['action' => 'edit', $permission->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Permission'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?> </li>
<li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>

<?php $this->end();?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

</div>
<?php $this->end(); ?>
<?php $this->start('form');?>
<h3><?= h($permission->name) ?></h3>
<table class="vertical-table table-responsive" >
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($permission->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Role') ?></th>
        <td><?= $permission->has('role') ? $this->Html->link($permission->role->name, ['controller' => 'Roles', 'action' => 'view', $permission->role->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($permission->id) ?></td>
    </tr>
</table>


<?php $this->end();?>
