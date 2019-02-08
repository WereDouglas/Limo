<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?php $this->extend('/Common/addPage'); ?>
<?php $this->start('links'); ?>
<li><?= $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $user->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]
    )
    ?></li>
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


<?php $this->end(); ?>
<?php $this->start('form'); ?>
<div class="users form large-9 medium-8 columns content">

    <?= $this->Form->create($user, ['type' => 'file']) ?>
    <div class="card-profile-image">
        <a href="#">
            <?php
            $image = $this->Url->image('user.png');
            if ($user->photo != "") {
                $image = $this->Url->build($user->full_url);
            }
            ?>
            <img src="<?= $image; ?>" class="rounded-circle">
        </a>
    </div>
    <fieldset>

        <legend><?= __('Edit User') ?></legend>

        <?php

        echo $this->Form->control('first_name');
        echo $this->Form->control('last_name');
        echo $this->Form->control('contact');
        echo $this->Form->control('email');
        echo $this->Form->label('*type of user');
        echo $this->Form->select('type',$types, ['empty' =>'(choose one)', 'class' => 'form-control']);
        echo $this->Form->control('roles._ids', ['options' => $roles, 'class' => 'form-control']);
        echo $this->Form->control('companies._ids', ['options' => $companies,'class' => 'form-control']);

        echo $this->Form->control('activated',
            ['options' => $active, 'empty' =>'yes', 'class' => 'form-control']);


        ?>
    </fieldset>
    <?php echo $this->Form->submit('Submit'); ?>
    <?= $this->Form->end() ?>
</div>


<?php $this->end(); ?>
