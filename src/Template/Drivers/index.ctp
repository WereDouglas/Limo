<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Driver[]|\Cake\Collection\CollectionInterface $drivers
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Drivers');
?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip'); ?>
</div>

<?php $this->end(); ?>

<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New Driver'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col">#</th>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('license') ?></th>
    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($drivers as $driver): ?>
    <tr>
        <td>
            <?php
            $image = $this->Url->image('user.png');
            if (h($driver->user->photo != "")) {
                $image = $this->Url->build($driver->user->full_url);
            }
            ?>
            <div class="avatar-group">
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?= h($driver->user->full_name) ?>">
                    <img alt="Image placeholder" src="<?= $image; ?>" class="rounded-circle">
                </a>
            </div>
        </td>
        <td><?= $this->Number->format($driver->id) ?></td>
        <td><?= h($driver->license) ?></td>
        <td><?= $driver->has('user') ? $this->Html->link($driver->user->full_name,
                ['controller' => 'Users', 'action' => 'view', $driver->user->id]) : '' ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['action' => 'view', $driver->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $driver->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $driver->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $driver->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
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
