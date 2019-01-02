<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip[]|\Cake\Collection\CollectionInterface $trips
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips index large-9 medium-8 columns content">
    <h3><?= __('Trips') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pick_up_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('appointment_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pick_up_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('pick_up_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drop_off_address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('drop_off_city') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trips as $trip): ?>
            <tr>
                <td><?= $this->Number->format($trip->id) ?></td>
                <td><?= h($trip->client) ?></td>
                <td><?= h($trip->phone) ?></td>
                <td><?= h($trip->date) ?></td>
                <td><?= h($trip->pick_up_time) ?></td>
                <td><?= h($trip->appointment_time) ?></td>
                <td><?= h($trip->pick_up_address) ?></td>
                <td><?= h($trip->pick_up_city) ?></td>
                <td><?= h($trip->drop_off_address) ?></td>
                <td><?= h($trip->drop_off_city) ?></td>
                <td><?= h($trip->created) ?></td>
                <td><?= $trip->has('user') ? $this->Html->link($trip->user->id, ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
                <td><?= $trip->has('company') ? $this->Html->link($trip->company->name, ['controller' => 'Companies', 'action' => 'view', $trip->company->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $trip->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $trip->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
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
</div>
