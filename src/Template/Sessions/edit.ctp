<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Session $session
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $session->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $session->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Sessions'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="sessions form large-9 medium-8 columns content">
    <?= $this->Form->create($session) ?>
    <fieldset>
        <legend><?= __('Edit Session') ?></legend>
        <?php
            echo $this->Form->control('expires');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
