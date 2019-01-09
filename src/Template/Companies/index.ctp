<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Roles');
?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('table'); ?>
<?php $this->start('th'); ?>
    <tr>
        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
        <th scope="col"><?= $this->Paginator->sort('name') ?></th>
        <th scope="col"><?= $this->Paginator->sort('photo') ?></th>
        <th scope="col"><?= $this->Paginator->sort('address') ?></th>
        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
        <th scope="col" class="actions"><?= __('Actions') ?></th>
    </tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
    <?php foreach ($companies as $company): ?>
        <tr>
            <td><?= $this->Number->format($company->id) ?></td>
            <td><?= h($company->name) ?></td>
            <td><?= h($company->photo) ?></td>
            <td><?= h($company->address) ?></td>
            <td><?= h($company->contact) ?></td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $company->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $company->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $company->id], ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
<?php $this->end(); ?>

<?php $this->end(); ?>
<?php $this->start('pagination'); ?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ' . __('first')) ?>
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
        <?= $this->Paginator->last(__('last') . ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<?php $this->end(); ?>



