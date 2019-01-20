<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface[]|\Cake\Collection\CollectionInterface $logs
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Logs');
?>
<div class="header bg-gradient-primary pb-8 pt-5">

</div>
<?php $this->start('links'); ?>

<li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('Delete all'), ['action' => 'destroy']) ?></li>
<?php $this->end(); ?>
<?php $this->start('th'); ?>
<th scope="col"><?= $this->Paginator->sort('id') ?></th>
<th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
<th scope="col"><?= $this->Paginator->sort('ip_address') ?></th>
<th scope="col"><?= $this->Paginator->sort('request_method') ?></th>
<th scope="col"><?= $this->Paginator->sort('url') ?></th>
<th scope="col"><?= $this->Paginator->sort('header') ?></th>
<th scope="col"><?= $this->Paginator->sort('body') ?></th>
<th scope="col"><?= $this->Paginator->sort('status_code') ?></th>
<th scope="col"><?= $this->Paginator->sort('created_at') ?></th>
<th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($logs as $log): ?>
    <tr>
        <td><?= $this->Number->format($log->id) ?></td>
        <td><?= $this->Number->format($log->user_id) ?></td>
        <td><?= h($log->ip_address) ?></td>
        <td><?= h($log->request_method) ?></td>
        <td><?= h($log->request_url) ?></td>
        <td><?= h($log->request_headers) ?></td>
        <td><?= h($log->request_body) ?></td>
        <td><?= $this->Number->format($log->status_code) ?></td>
        <td><?= h($log->created_at) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $log->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $log->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $log->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?>
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
