<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Users');
?>

<!-- Header -->
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip'); ?>
</div>
<?php $this->end(); ?>
<!-- Page content -->

<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col">#</th>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
    <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
    <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
    <th scope="col"><?= $this->Paginator->sort('type') ?></th>
    <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>

</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($users as $user): ?>
    <tr>
        <td>
            <?php
            $image = $this->Url->image('user.png');
            if (h($user->photo != "")) {
                $image = $this->Url->build($user->full_url);
            }
            ?>
            <div class="avatar-group">
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip" data-original-title="<?= h($user->full_name) ?>">
                    <img alt="Image placeholder" src="<?= $image; ?>" class="rounded-circle">
                </a>
            </div>
        </td>
        <td><?= $this->Number->format($user->id) ?></td>
        <td><?= h($user->first_name) ?></td>
        <td><?= h($user->last_name) ?></td>
        <td><?= h($user->contact) ?></td>
        <td><?= h($user->email) ?></td>

        <td><?= h($user->type) ?></td>
        <td><?= $user->has('company') ? $this->Html->link($user->company->name,
                ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
        <td class="actions" >

            <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class' => 'fat-remove word1']) ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>

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

