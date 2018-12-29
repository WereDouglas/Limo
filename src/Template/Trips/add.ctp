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

    <?= $this->Form->create($trip, ['type' => 'file','controller'=>'trips','action'=>'import']) ?>
    <table>
        <tbody>
        <tr>

            <td>Choose Your File:</td>
            <td><?php echo $this->Form->control('trip', ['type' => 'file']);?></td>
            <td>
                <div>
                    <?php echo $this->Form->submit('Import', array('div'=>false,'name'=>'importexcel'));
                    ?>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
    <?= $this->Form->end() ?>
    <?= $this->Form->create($trip) ?>
    <fieldset>
        <legend><?= __('Add Trip') ?></legend>
        <?php
            echo $this->Form->control('client');
            echo $this->Form->control('phone');
            echo $this->Form->control('date', ['empty' => true]);
            echo $this->Form->control('pick_up_time', ['empty' => true]);
            echo $this->Form->control('appointment_time', ['empty' => true]);
            echo $this->Form->control('pick_up_address');
            echo $this->Form->control('pick_up_city');
            echo $this->Form->control('drop_off_address');
            echo $this->Form->control('drop_off_city');
            echo $this->Form->control('comments');
            echo $this->Form->control('distance');
            echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
