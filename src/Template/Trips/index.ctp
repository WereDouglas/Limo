<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip[]|\Cake\Collection\CollectionInterface $trips
 */
?>
<?php
$this->extend('/Common/subPage');
$this->assign('title', 'All trips');
?>
<!-- Header -->
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip'); ?>
</div>
<?php $this->end(); ?>
<!-- Page content -->

<?php $this->start('links'); ?>

<li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'),
        ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'),
        ['controller' => 'Users', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Companies'),
        ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'),
        ['controller' => 'Companies', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col"></th>
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
    <th scope="col"><?= $this->Paginator->sort('distance') . '(Miles)' ?></th>
    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('complete') ?></th>
    <th scope="col"><?= $this->Paginator->sort('start_lat') ?></th>
    <th scope="col"><?= $this->Paginator->sort('start_long') ?></th>
    <th scope="col"><?= $this->Paginator->sort('drop_lat') ?></th>
    <th scope="col"><?= $this->Paginator->sort('drop_long') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($trips as $trip): ?>
    <tr>
        <td>
            <div class="avatar-group">
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="Ryan Tompson">
                    <img alt="Image placeholder"
                         src="<?= $this->Url->image('theme/team-1-800x800.jpg') ?>"
                         class="rounded-circle">
                </a>
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="Romina Hadid">
                    <img alt="Image placeholder"
                         src="<?= $this->Url->image('theme/team-2-800x800.jpg') ?>"
                         class="rounded-circle">
                </a>
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="Alexander Smith">
                    <img alt="Image placeholder"
                         src="<?= $this->Url->image('theme/team-3-800x800.jpg') ?>"
                         class="rounded-circle">
                </a>
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="Jessica Doe">
                    <img alt="Image placeholder"
                         src="<?= $this->Url->image('theme/team-4-800x800.jpg ') ?>"
                         class="rounded-circle">
                </a>
            </div>
        </td>
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
        <td><?= h($trip->distance) ?></td>
        <td><?= h($trip->created) ?></td>
        <td><?= $trip->has('user') ? $this->Html->link($trip->user->id,
                ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
        <td><?= $trip->has('company') ? $this->Html->link($trip->company->name,
                ['controller' => 'Companies', 'action' => 'view', $trip->company->id]) : '' ?></td>
        <td>
            <?= h($trip->complete) ?>
            <?php if ($trip->complete === 'no'): ?>
                <span class="badge badge-dot mr-4"> <i class="bg-warning"></i> pending</span>
            <?php elseif ($trip->complete === 'yes'): ?>
                <span class="badge badge-dot mr-4"><i class="bg-success"></i> completed</span>
            <?php else: ?>
                <span class="badge badge-dot"><i class="bg-info"></i>en route</span>
            <?php endif; ?>
        </td>

        <td><?= $this->Number->format($trip->start_lat) ?></td>
        <td><?= $this->Number->format($trip->start_long) ?></td>
        <td><?= $this->Number->format($trip->drop_lat) ?></td>
        <td><?= $this->Number->format($trip->drop_long) ?></td>
        <td class="actions">


            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <ul class="side-nav">

                        <li> <?= $this->Html->link(__('View'),
                                ['action' => 'view', $trip->id]) ?></li>
                        <li> <?= $this->Html->link(__('Edit'),
                                ['action' => 'edit', $trip->id]) ?></li>
                        <li>
                            <?= $this->Form->postLink(__('Delete'),
                                ['action' => 'delete', $trip->id],
                                [
                                    'confirm' => __('Are you sure you want to delete # {0}?',
                                        $trip->id)
                                ]) ?>
                        </li>

                    </ul>
                </div>
            </div>

        </td>
    </tr>
<?php endforeach; ?>
<?php $this->end(); ?>
<?php $this->start('pagination'); ?>
<ul class="pagination">
    <?= $this->Paginator->first('<< ' . __('first')) ?>
    <?= $this->Paginator->prev('< ' . __('previous')) ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(__('next') . ' >') ?>
    <?= $this->Paginator->last(__('last') . ' >>') ?>
</ul>
<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>

<?php $this->end(); ?>
