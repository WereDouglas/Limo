<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company $company
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php$this->start('links');?>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $company->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]
    )
    ?></li>
<li><?= $this->Html->link(__('List Companies'), ['action' => 'index']) ?></li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>


<?php$this->end();?>

<?php$this->start('form');?>
<?= $this->Form->create($company) ?>
<fieldset>
    <legend><?= __('Edit Company') ?></legend>
    <?php
    echo $this->Form->control('name');
    echo $this->Form->control('photo');
    echo $this->Form->control('address');
    echo $this->Form->control('contact');
    echo $this->Form->control('photo', ['type' => 'file','class' => 'form-control']);
    ?>
</fieldset>
<?php  echo $this->Form->submit('Submit'); ?>
<?= $this->Form->end() ?>


<?php$this->end();?>
