<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>

<?php $this->end(); ?>
<?php $this->start('form'); ?>


<?= $this->Form->create($trip) ?>
<fieldset>
    <legend><?= __('Add Trip') ?></legend>
    <?php
    echo $this->Form->control('client', ['class' => 'form-control']);
    echo $this->Form->control('phone', ['class' => 'form-control']);
    echo '  <br>';
    echo $this->Form->control('date', [
        'label' => 'Date',
        'empty' => true,
        'class' => 'form-control'
    ]);
    echo $this->Form->control('pick_up_time', ['class' => 'form-control']);
    echo $this->Form->control('appointment_time', ['class' => 'form-control']);
    echo $this->Form->control('pick_up_address', ['class' => 'form-control']);
    echo $this->Form->control('pick_up_city', ['class' => 'form-control']);
    echo $this->Form->control('drop_off_address', ['class' => 'form-control']);
    echo $this->Form->control('drop_off_city', ['class' => 'form-control']);
    echo $this->Form->control('comments', ['class' => 'form-control']);
    echo $this->Form->control('distance', ['class' => 'form-control']);
    echo $this->Form->control('user_id',
        ['options' => $users, 'empty' => true, 'class' => 'form-control']);
    echo $this->Form->control('company_id',
        ['options' => $companies, 'class' => 'form-control']);
    echo $this->Form->control('complete', ['class' => 'form-control']);
    echo $this->Form->control('start_lat', ['class' => 'form-control']);
    echo $this->Form->control('start_long', ['class' => 'form-control']);
    echo $this->Form->control('drop_lat', ['class' => 'form-control']);
    echo $this->Form->control('drop_long', ['class' => 'form-control']);
    echo $this->Form->control('miles', ['class' => 'form-control']);
    echo $this->Form->control('vehicle_type', ['class' => 'form-control']);
    echo $this->Form->control('escort', ['class' => 'form-control']);
    echo $this->Form->control('trip_num', ['class' => 'form-control']);
    echo $this->Form->control('shared_group', ['class' => 'form-control']);
    echo $this->Form->control('outbound', ['class' => 'form-control']);
    echo $this->Form->control('priority', ['class' => 'form-control']);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>
<?php $this->end(); ?>

