<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('Edit Car'), ['action' => 'edit', $car->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Car'), ['action' => 'delete', $car->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?> </li>
<li><?= $this->Html->link(__('List Cars'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Car'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>

<?php $this->end(); ?>
<?php $this->start('form'); ?>
<h3><?= h($car->id) ?></h3>
<table class="vertical-table">
    <tr>
        <th scope="row"><?= __('Plate') ?></th>
        <td><?= h($car->plate) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Registration') ?></th>
        <td><?= h($car->registration) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('User') ?></th>
        <td><?= $car->has('user') ? $this->Html->link($car->user->id,
                ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Id') ?></th>
        <td><?= $this->Number->format($car->id) ?></td>
    </tr>
    <tr>
        <th scope="row"><?= __('Expiry') ?></th>
        <td><?= h($car->expiry) ?></td>
    </tr>
</table>

<?php $this->end(); ?>
