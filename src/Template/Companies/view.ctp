<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>

<?php $this->extend('/Common/viewPage'); ?>
<?php $this->start('links'); ?>

<li><?= $this->Html->link(__('Edit Company'), ['action' => 'edit', $company->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Company'), ['action' => 'delete', $company->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?> </li>
<li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>

<?php $this->end(); ?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

</div>
<?php $this->end(); ?>
<?php $this->start('form'); ?>
<h3><?= h($company->name) ?></h3>
<table class="vertical-table" class="table-responsive">
    <tr>
        <th scope="row"><?= __('Name') ?></th>
        <td><?= h($company->name) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Photo') ?></th>
        <td><?= h($company->photo) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Address') ?></th>
        <td><?= h($company->address) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Contact') ?></th>
        <td><?= h($company->contact) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($company->id) ?></td>
    </tr>
</table>

<div class="related">
    <h4><?= __('Related Users') ?></h4>
    <?php if (!empty($company->users)): ?>
        <table cellpadding="0" cellspacing="0" class="table-responsive table align-items-center table-flush">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Email') ?></th>

                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Active') ?></th>

                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->last_name) ?></td>
                    <td><?= h($users->contact) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->type) ?></td>
                    <td><?= h($users->active) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $users->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $users->id]) ?>
                        <?= $this->Form->postLink(__('Delete'),
                            ['controller' => 'Users', 'action' => 'delete', $users->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $users->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>

<?php $this->end(); ?>
