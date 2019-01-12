<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car $car
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links');?>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $car->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Cars'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>

<?php $this->end();?>
<?php $this->start('form');?>

<?= $this->Form->create($car, ['type' => 'file']) ?>
<fieldset>
    <legend><?= __('Edit Car') ?></legend>
    <?php
    echo $this->Form->control('plate');
    echo $this->Form->control('registration');
    echo $this->Form->control('expiry', ['empty' => true]);
    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
    echo $this->Form->control('photo', ['type' => 'file','class' => 'form-control']);
    ?>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>


<?php $this->end();?>
