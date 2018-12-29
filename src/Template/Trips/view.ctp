<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id], ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">
    <h3><?= h($trip->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= h($trip->client) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Phone') ?></th>
            <td><?= h($trip->phone) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pick Up Address') ?></th>
            <td><?= h($trip->pick_up_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pick Up City') ?></th>
            <td><?= h($trip->pick_up_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drop Off Address') ?></th>
            <td><?= h($trip->drop_off_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Drop Off City') ?></th>
            <td><?= h($trip->drop_off_city) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Comments') ?></th>
            <td><?= h($trip->comments) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Distance') ?></th>
            <td><?= h($trip->distance) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $trip->has('user') ? $this->Html->link($trip->user->id, ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Company') ?></th>
            <td><?= $trip->has('company') ? $this->Html->link($trip->company->name, ['controller' => 'Companies', 'action' => 'view', $trip->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date') ?></th>
            <td><?= h($trip->date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Pick Up Time') ?></th>
            <td><?= h($trip->pick_up_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Appointment Time') ?></th>
            <td><?= h($trip->appointment_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created') ?></th>
            <td><?= h($trip->created) ?></td>
        </tr>
    </table>
</div>
