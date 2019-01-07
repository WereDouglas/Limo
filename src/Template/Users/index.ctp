<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User[]|\Cake\Collection\CollectionInterface $users
 */
?>
<?php
$this->extend('/Common/subPage');
$this->assign('title', 'Users');
?>
<!-- Header -->
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip'); ?>
</div>
<?php $this->end(); ?>
<!-- Page content -->

<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Users</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Actions</a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <ul class="side-nav">
                                <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('first_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('last_name') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('contact') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('password') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('type') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('api_key_plain') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('api_key') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('digest_hash') ?></th>
                        <th scope="col" class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?= $this->Number->format($user->id) ?></td>
                            <td><?= h($user->first_name) ?></td>
                            <td><?= h($user->last_name) ?></td>
                            <td><?= h($user->contact) ?></td>
                            <td><?= h($user->email) ?></td>
                            <td><?= h($user->password) ?></td>
                            <td><?= h($user->type) ?></td>
                            <td><?= $user->has('company') ? $this->Html->link($user->company->name, ['controller' => 'Companies', 'action' => 'view', $user->company->id]) : '' ?></td>
                            <td><?= h($user->api_key_plain) ?></td>
                            <td><?= h($user->api_key) ?></td>
                            <td><?= h($user->digest_hash) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer py-4">
                <nav aria-label="...">
                    <div class="paginator">
                        <ul class="pagination">
                            <?= $this->Paginator->first('<< ' . __('first')) ?>
                            <?= $this->Paginator->prev('< ' . __('previous')) ?>
                            <?= $this->Paginator->numbers() ?>
                            <?= $this->Paginator->next(__('next') . ' >') ?>
                            <?= $this->Paginator->last(__('last') . ' >>') ?>
                        </ul>
                        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
                    </div>
                    <ul class="pagination justify-content-end mb-0">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1">
                                <i class="fas fa-angle-left"></i>
                                <span class="sr-only"><?= $this->Paginator->prev('< ' . __('previous')) ?></span>
                            </a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#"> <?= $this->Paginator->numbers() ?></a></li>
                        <li class="page-item">
                            <a class="page-link" href="#">
                                <i class="fas fa-angle-right"></i>
                                <span class="sr-only"><?= $this->Paginator->next(__('next') . ' >') ?></span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
