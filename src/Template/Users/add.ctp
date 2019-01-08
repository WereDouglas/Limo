<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-5 py-lg-5">
                        <?= $this->Form->create($user) ?>
                        <fieldset>
                            <legend><?= __('Add User') ?></legend>
                            <?php
                             echo $this->Form->control('first_name', ['class' => 'form-control']);
                            echo $this->Form->control('last_name', ['class' => 'form-control']);
                            echo $this->Form->control('contact', ['class' => 'form-control']);
                            echo $this->Form->control('email', ['class' => 'form-control']);
                            echo $this->Form->control('password', ['class' => 'form-control']);
                            echo $this->Form->control('type', ['class' => 'form-control']);
                            echo $this->Form->control('company_id', ['options' => $companies, 'empty' => true,'class' => 'form-control']);
                            echo $this->Form->control('api_key_plain', ['class' => 'form-control']);
                            echo $this->Form->control('api_key', ['class' => 'form-control']);
                            echo $this->Form->control('digest_hash', ['class' => 'form-control']);
                            echo $this->Form->control('roles._ids', ['options' => $roles,'class' => 'form-control']);
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-4']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

