<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $trip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <?= $this->Form->create($trip) ?>
    <fieldset>
        <legend><?= __('Edit Trip') ?></legend>
        <?php
            echo $this->Form->control('client');
            echo $this->Form->control('phone');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('pick_up_time');
            echo $this->Form->control('appointment_time');
            echo $this->Form->control('pick_up_address');
            echo $this->Form->control('pick_up_city');
            echo $this->Form->control('drop_off_address');
            echo $this->Form->control('drop_off_city');
            echo $this->Form->control('comments');
            echo $this->Form->control('distance');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
            echo $this->Form->control('company_id', ['options' => $companies]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
