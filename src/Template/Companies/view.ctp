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
<?php $this->start('form'); ?>
<h3><?= h($company->name) ?></h3>
<table class="vertical-table">
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
    <h4><?= __('Related Trips') ?></h4>
    <?php if (!empty($company->trips)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Client') ?></th>
                <th scope="col"><?= __('Phone') ?></th>
                <th scope="col"><?= __('Date') ?></th>
                <th scope="col"><?= __('Pick Up Time') ?></th>
                <th scope="col"><?= __('Appointment Time') ?></th>
                <th scope="col"><?= __('Pick Up Address') ?></th>
                <th scope="col"><?= __('Pick Up City') ?></th>
                <th scope="col"><?= __('Drop Off Address') ?></th>
                <th scope="col"><?= __('Drop Off City') ?></th>
                <th scope="col"><?= __('Comments') ?></th>
                <th scope="col"><?= __('Created') ?></th>
                <th scope="col"><?= __('Distance') ?></th>
                <th scope="col"><?= __('User Id') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Complete') ?></th>
                <th scope="col"><?= __('Start Lat') ?></th>
                <th scope="col"><?= __('Start Long') ?></th>
                <th scope="col"><?= __('Drop Lat') ?></th>
                <th scope="col"><?= __('Drop Long') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->trips as $trips): ?>
                <tr>
                    <td><?= h($trips->id) ?></td>
                    <td><?= h($trips->client) ?></td>
                    <td><?= h($trips->phone) ?></td>
                    <td><?= h($trips->date) ?></td>
                    <td><?= h($trips->pick_up_time) ?></td>
                    <td><?= h($trips->appointment_time) ?></td>
                    <td><?= h($trips->pick_up_address) ?></td>
                    <td><?= h($trips->pick_up_city) ?></td>
                    <td><?= h($trips->drop_off_address) ?></td>
                    <td><?= h($trips->drop_off_city) ?></td>
                    <td><?= h($trips->comments) ?></td>
                    <td><?= h($trips->created) ?></td>
                    <td><?= h($trips->distance) ?></td>
                    <td><?= h($trips->user_id) ?></td>
                    <td><?= h($trips->company_id) ?></td>
                    <td><?= h($trips->complete) ?></td>
                    <td><?= h($trips->start_lat) ?></td>
                    <td><?= h($trips->start_long) ?></td>
                    <td><?= h($trips->drop_lat) ?></td>
                    <td><?= h($trips->drop_long) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Trips', 'action' => 'view', $trips->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['controller' => 'Trips', 'action' => 'edit', $trips->id]) ?>
                        <?= $this->Form->postLink(__('Delete'),
                            ['controller' => 'Trips', 'action' => 'delete', $trips->id],
                            ['confirm' => __('Are you sure you want to delete # {0}?', $trips->id)]) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</div>
<div class="related">
    <h4><?= __('Related Users') ?></h4>
    <?php if (!empty($company->users)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('First Name') ?></th>
                <th scope="col"><?= __('Last Name') ?></th>
                <th scope="col"><?= __('Contact') ?></th>
                <th scope="col"><?= __('Email') ?></th>
                <th scope="col"><?= __('Password') ?></th>
                <th scope="col"><?= __('Type') ?></th>
                <th scope="col"><?= __('Company Id') ?></th>
                <th scope="col"><?= __('Api Key Plain') ?></th>
                <th scope="col"><?= __('Api Key') ?></th>
                <th scope="col"><?= __('Digest Hash') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($company->users as $users): ?>
                <tr>
                    <td><?= h($users->id) ?></td>
                    <td><?= h($users->first_name) ?></td>
                    <td><?= h($users->last_name) ?></td>
                    <td><?= h($users->contact) ?></td>
                    <td><?= h($users->email) ?></td>
                    <td><?= h($users->password) ?></td>
                    <td><?= h($users->type) ?></td>
                    <td><?= h($users->company_id) ?></td>
                    <td><?= h($users->api_key_plain) ?></td>
                    <td><?= h($users->api_key) ?></td>
                    <td><?= h($users->digest_hash) ?></td>
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
