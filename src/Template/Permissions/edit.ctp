<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Permission $permission
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $permission->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $permission->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Permissions'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>

<?php $this->end(); ?>
<?php $this->start('form'); ?>
<?= $this->Form->create($permission) ?>
<fieldset>
    <legend><?= __('Edit Permission') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('roles._ids', ['options' => $roles,'class' => 'form-control']);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>


<?php $this->end(); ?>
