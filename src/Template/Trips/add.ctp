<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="trips form large-9 medium-8 columns content">
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-5 py-lg-5">
                        <?= $this->Form->create($trip,
                            ['type' => 'file', 'controller' => 'trips', 'action' => 'import']) ?>
                        <legend><?= __('Import trips') ?></legend>

                        <?php echo $this->Form->control('start_address', ['class' => 'form-control']); ?>
                        <br>
                        <?php echo $this->Form->control('date',
                            ['label' => 'Date', 'empty' => true, 'class' => 'form-control']); ?>
                        <?php echo $this->Form->control('trip', ['type' => 'file', 'class' => 'form-control']); ?>

                        <div>
                            <?php echo $this->Form->submit('Import',
                                ['div' => false, 'name' => 'importexcel', 'class' => 'btn btn-primary mt-4']);
                            ?>
                        </div>

                        <?= $this->Form->end() ?>
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
                            ?>
                        </fieldset>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary mt-4']) ?>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

