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
<div class="table-responsive">
    <h4><?= __('Related Roles') ?></h4>
    <?php if (!empty($permission->roles)): ?>
        <table class="table align-items-center table-flush">
            <thead class="thead-light">
            <th scope="col"><?= __('Id') ?></th>
            <th scope="col"><?= __('Name') ?></th>
            <th scope="col" class="actions"><?= __('Actions') ?></th>
            </thead>
            <tbody>
            <?php foreach ($permission->roles as $roles): ?>
                <tr>
                    <td><?= h($roles->id) ?></td>
                    <td><?= h($roles->name) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'),
                            [
                                'controller' => 'Roles',
                                'action' => 'view',
                                $roles->id
                            ]) ?>
                        <?= $this->Html->link(__('Edit'),
                            [
                                'controller' => 'Roles',
                                'action' => 'edit',
                                $roles->id
                            ]) ?>
                        <?= $this->Form->postLink(__('Delete'),
                            [
                                'controller' => 'Roles',
                                'action' => 'delete',
                                $roles->id
                            ],
                            [
                                'confirm' => __('Are you sure you want to delete # {0}?',
                                    $roles->id)
                            ]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php endif; ?>
</div>



<?php $this->end();?>
