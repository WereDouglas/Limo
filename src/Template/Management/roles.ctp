<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role[]|\Cake\Collection\CollectionInterface $roles
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Roles');

?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

</div>
<?php $this->end(); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New Role'), ['action' => 'addRoles']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['action' => 'addUsers']) ?></li>
<?php $this->end(); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
    <th scope="col"><?= $this->Paginator->sort('Companies') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($roles as $role): ?>
    <tr>
        <td><?= $this->Number->format($role->id) ?></td>
        <td><?= h($role->name) ?></td>
        <td> <?= $role->Companies['name'];?> </td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'viewRoles', $role->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'editRoles', $role->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'deleteRoles', $role->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php $this->end(); ?>
<?php $this->start('pagination'); ?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ') ?>
        <?= $this->Paginator->prev('< ') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(' >') ?>
        <?= $this->Paginator->last(' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<?php $this->end(); ?>
