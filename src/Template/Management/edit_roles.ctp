<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Role $role
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $role->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Roles'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>


<?php $this->end(); ?>
<?php $this->start('form'); ?>
<?= $this->Form->create($role) ?>
<fieldset>
    <legend><?= __('Edit Role') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('users._ids', ['options' => $users, 'class' => 'form-control']);
    //echo $this->Form->radio('gender', ['Masculine', 'Feminine', 'Neuter']);
    echo $this->Form->control('permissions._ids', ['options' => $permissions,'class' => 'form-control']);
    echo $this->Form->control('companies._ids', ['options' => $companies,'class' => 'form-control']);
    ?>
</fieldset>
<?php echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>

<?php $this->end(); ?>
