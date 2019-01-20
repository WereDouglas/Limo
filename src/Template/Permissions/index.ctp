<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission[]|\Cake\Collection\CollectionInterface $permissions
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Permissions');
?>
<!-- Header -->
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip'); ?>
</div>
<?php $this->end(); ?>
<!-- Page content -->
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New Permission'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
    <th scope="col"><?= $this->Paginator->sort('role_id') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($permissions as $permission): ?>
    <tr>
        <td><?= $this->Number->format($permission->id) ?></td>
        <td><?=  str_replace('_',' ', $permission->name) ?></td>

        <td><?= $permission->has('role') ? $this->Html->link($permission->role->name, ['controller' => 'Roles', 'action' => 'view', $permission->role->id]) : '' ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $permission->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $permission->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $permission->id], ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php $this->end(); ?>

<?php $this->start('pagination'); ?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<<' ) ?>
        <?= $this->Paginator->prev('< ') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' >') ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<?php $this->end(); ?>

