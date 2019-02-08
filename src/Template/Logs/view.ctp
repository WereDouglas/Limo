<?php
/**
 * @var \App\View\AppView $this
 * @var \Cake\Datasource\EntityInterface $log
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Logs');
?>
<div class="header bg-gradient-primary pb-8 pt-5">

</div>
<?php $this->start('links'); ?>
<li class="heading"><?= __('Actions') ?></li>
<li><?= $this->Html->link(__('Edit Log'), ['action' => 'edit', $log->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Log'), ['action' => 'delete', $log->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $log->id)]) ?> </li>
<li><?= $this->Html->link(__('List Logs'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Log'), ['action' => 'add']) ?> </li>
<?php $this->end(); ?>

<div class="alert alert-info alert-dismissible fade show" role="alert">

    <h3><?= h($log->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Ip Address') ?></th>
            <td><?= h($log->ip_address) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request Method') ?></th>
            <td><?= h($log->request_method) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Request Url') ?></th>
            <td><?= h($log->request_url) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($log->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User Id') ?></th>
            <td><?= $this->Number->format($log->user_id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Status Code') ?></th>
            <td><?= $this->Number->format($log->status_code) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Created At') ?></th>
            <td><?= h($log->created_at) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Request Headers') ?></h4>
        <?= $this->Text->autoParagraph(h($log->request_headers)); ?>
    </div>
    <div class="row">
        <h4><?= __('Request Body') ?></h4>
        <?= $this->Text->autoParagraph(h($log->request_body)); ?>
    </div>
</div>
