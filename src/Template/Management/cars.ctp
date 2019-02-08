<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Car[]|\Cake\Collection\CollectionInterface $cars
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Cars');
?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Count'); ?>
</div>
<?php $this->end(); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New Car'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('table'); ?>

<?php $this->start('th'); ?>
<tr>
    <th scope="col"></th>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('plate') ?></th>
    <th scope="col"><?= $this->Paginator->sort('registration') ?></th>
    <th scope="col"><?= $this->Paginator->sort('expiry') ?></th>
    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($cars as $car): ?>
    <tr>
        <td>
            <?php
            $image = $this->Url->image('logo.png');
            if (h($car->photo != "")) {
                $image = $this->Url->build($car->full_url);
            }
            ?>
            <div class="avatar-group">
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="<?= h($car->name) ?>">
                    <img alt="Image placeholder" src="<?= $image; ?>" class="rounded-circle">
                </a>
            </div>
        </td>
        <td><?= $this->Number->format($car->id) ?></td>
        <td><?= h($car->plate) ?></td>
        <td><?= h($car->registration) ?></td>
        <td><?= h($car->expiry) ?></td>
        <td><?= $car->has('user') ? $this->Html->link($car->user->id,
                ['controller' => 'Users', 'action' => 'view', $car->user->id]) : '' ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['controller'=>'cars','action' => 'view', $car->id]) ?>
            <?= $this->Html->link(__('Edit'), ['controller'=>'cars','action' => 'edit', $car->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['controller'=>'companies','action' => 'delete', $car->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $car->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php $this->end(); ?>

<?php $this->end(); ?>
<?php $this->start('pagination'); ?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ') ?>
        <?= $this->Paginator->prev('< ' ) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next( ' >') ?>
        <?= $this->Paginator->last( ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<?php $this->end(); ?>

