<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Companies');
?>
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Count'); ?>
</div>
<?php $this->end(); ?>
<?php $this->start('links'); ?>
<li><?= $this->Html->link(__('New Company'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
<?php $this->end(); ?>
<?php $this->start('table'); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col"></th>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('name') ?></th>
    <th scope="col"><?= $this->Paginator->sort('Active') ?></th>
    <th scope="col"><?= $this->Paginator->sort('address') ?></th>
    <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($companies as $company): ?>
    <tr>
        <td>
            <?php
            $image = $this->Url->image('company.png');
            if (h($company->photo != "")) {
                $image = $this->Url->build($company->full_url);
            }
            ?>
            <div class="avatar-group">
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="<?= h($company->name) ?>">
                    <img alt="Image placeholder" src="<?= $image; ?>" class="rounded-circle">
                </a>
            </div>

        </td>
        <td><?= $this->Number->format($company->id) ?></td>
        <td><?= h($company->name) ?></td>
        <td><?= h($company->activated) ?></td>
        <td><?= h($company->address) ?></td>
        <td><?= h($company->contact) ?></td>
        <td class="actions">
            <?= $this->Html->link(__('View'), ['controller'=>'companies','action' => 'view', $company->id]) ?>
            <?= $this->Html->link(__('Edit'), ['controller'=>'companies','action' => 'edit', $company->id]) ?>
            <?= $this->Form->postLink(__('Delete'), ['controller'=>'companies','action' => 'delete', $company->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $company->id)]) ?>
        </td>
    </tr>
<?php endforeach; ?>
<?php $this->end(); ?>

<?php $this->end(); ?>
<?php $this->start('pagination'); ?>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->first('<< ') ?>
        <?= $this->Paginator->prev('< ') ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next( ' >') ?>
        <?= $this->Paginator->last( ' >>') ?>
    </ul>
    <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>
<?php $this->end(); ?>



