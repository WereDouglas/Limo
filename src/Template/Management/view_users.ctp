<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

?>

<!-- Main content -->
<div class="main-content">
    <!-- Top navbar -->
    <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html">User profile</a>
            <!-- Form -->
            <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
                <div class="form-group mb-0">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control" placeholder="Search" type="text">
                    </div>
                </div>
            </form>
            <!-- User -->
            <?= $this->element('profile') ?>
        </div>
    </nav>
    <!-- Header -->
    <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center"
         style="min-height: 50px; background-image: url(<?= $this->Url->image('theme/profile-cover.jpg') ?>; background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
            <div class="row">

            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 order-lg-2">
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
                        </div>
                    </div>
                    <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                        <div class="d-flex justify-content-between">
                            <?= $this->Html->link(__('Edit Profile'),
                                ['class' => 'btn btn-sm btn-info mr-4', 'action' => 'edit', $user->id]) ?>

                            <a href="#" class="btn btn-sm btn-default float-right">Message</a>
                        </div>
                    </div>
                    <div class="card-body pt-0 pt-md-4">
                        <div class="row">
                            <div class="col">
                                <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                                    <div>
                                        <span class="heading">22</span>
                                        <span class="description">Trips</span>
                                    </div>
                                    <div>
                                        <span class="heading">10</span>
                                        <span class="description">Distance</span>
                                    </div>
                                    <div>
                                        <span class="heading">89</span>
                                        <span class="description">Roles</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h3>
                            <?= h($user->full_name) ?><span class="font-weight-light">, 27</span>
                        </h3>
                        <div class="text-left">

                            <hr class="my-4"/>
                            <h3><?= h($user->id) ?></h3>
                            <table class="vertical-table">
                                <tr>
                                    <th scope="row"><?= __('First Name') ?></th>
                                    <td><?= h($user->first_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Last Name') ?></th>
                                    <td><?= h($user->last_name) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Contact') ?></th>
                                    <td><?= h($user->contact) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Email') ?></th>
                                    <td><?= h($user->email) ?></td>
                                </tr>

                                <tr>
                                    <th scope="row"><?= __('Type') ?></th>
                                    <td><?= h($user->type) ?></td>
                                </tr>
                                <tr>
                                    <th scope="row"><?= __('Company') ?></th>
                                    <td><?= $user->has('company') ? $this->Html->link($user->company->name,
                                            [
                                                'controller' => 'Companies',
                                                'action' => 'view',
                                                $user->company->id
                                            ]) : '' ?></td>
                                </tr>

                                <tr>
                                    <th scope="row"><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($user->id) ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">My account</h3>

                            </div>
                            <div class="col-4 text-right">

                                <!-- Button trigger modal -->
                                <a href="#" class=" btn btn-sm  btn-outline-warning" data-toggle="modal"
                                   data-target="#exampleModal">
                                    <i class="ni ni-camera-compact text-gray"> </i>
                                    <span>Pic</span>
                                </a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel"
                                     aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <?= $this->Form->create( 'Users', ['url' =>['action'=>'update'],'type' => 'file']) ?>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Update <?= $user->full_name ?>'s profile picture</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="avatar-group">
                                                    <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                                                       data-original-title="<?= h($user->name) ?>">
                                                        <img alt="Image placeholder" src="<?= $image; ?>"
                                                             class="rounded-circle">
                                                    </a>
                                                </div>

                                                <input class="form-control" type="hidden" value="<?= $user->id ?>"
                                                       name="id"/>
                                                <?php echo $this->Form->control('photo',
                                                    ['type' => 'file', 'class' => 'form-control']); ?>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </div>
                                </div>


                                <a href="#" class="btn btn-sm btn-outline-danger " data-toggle="modal"
                                   data-target="#modal-notification">
                                    <i class="ni ni-lock-circle-open text-red"></i>
                                    <span>Reset</span>
                                </a>
                                <div class="modal fade" id="modal-notification" tabindex="-1" role="dialog"
                                     aria-labelledby="modal-notification" aria-hidden="true">
                                    <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                        <div class="modal-content bg-gradient-danger">
                                            <?= $this->Form->create( 'Users', ['url' =>['action'=>'update'],'type' => 'file']) ?>
                                            <div class="modal-header">
                                                <div class="dropdown-divider"></div>
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Update <?= $user->full_name ?> 's password</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="py-3 text-center">
                                                    <i class="ni ni-lock-circle-open ni-3x"></i>

                                                    <input class="form-control" type="hidden" value="<?= $user->id ?>"
                                                           name="id"/>
                                                    <br>
                                                    <div class="form-group">
                                                        <div class="input-group input-group-alternative">
                                                            <div class="input-group-prepend">
                                                             <span class="input-group-text">
                                                               <i class="ni ni-lock-circle-open"></i></span>
                                                            </div>
                                                            <input class="form-control" placeholder="Password"
                                                                   type="password"
                                                                   value="<?= $user->contact ?>" name="password"/>
                                                        </div>
                                                    </div>
                                                    <div class="text-center">
                                                        <button type="Submit" class="btn btn-primary my-4">Reset
                                                        </button>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-link text-white ml-auto"
                                                        data-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                            <?= $this->Form->end() ?>
                                        </div>
                                    </div>
                                </div>

                                <a href="#!" class="btn btn-sm btn-primary">Settings</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <h6 class="heading-small text-muted mb-4">User information</h6>
                            <hr class="my-4"/>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12">


                                        <div class="table-responsive">
                                            <h4><?= __('Related Roles') ?></h4>
                                            <?php if (!empty($user->roles)): ?>
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Name') ?></th>
                                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($user->roles as $roles): ?>
                                                        <tr>
                                                            <td><?= h($roles->id) ?></td>
                                                            <td><?= h($roles->name) ?></td>
                                                            <td class="actions">
                                                                <?= $this->Html->link(__('View'),
                                                                    [
                                                                        'controller' => 'Roles',
                                                                        'action' => 'view',
                                                                        $roles->id
                                                                    ]) ?>
                                                                <?= $this->Html->link(__('Edit'),
                                                                    [
                                                                        'controller' => 'Roles',
                                                                        'action' => 'edit',
                                                                        $roles->id
                                                                    ]) ?>
                                                                <?= $this->Form->postLink(__('Delete'),
                                                                    [
                                                                        'controller' => 'Roles',
                                                                        'action' => 'delete',
                                                                        $roles->id
                                                                    ],
                                                                    [
                                                                        'confirm' => __('Are you sure you want to delete # {0}?',
                                                                            $roles->id)
                                                                    ]) ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </div>
                                        <div class="table-responsive">
                                            <h4><?= __('Related Cars') ?></h4>
                                            <?php if (!empty($user->cars)): ?>
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Plate') ?></th>
                                                    <th scope="col"><?= __('Registration') ?></th>
                                                    <th scope="col"><?= __('Expiry') ?></th>
                                                    <th scope="col"><?= __('User Id') ?></th>
                                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($user->cars as $cars): ?>
                                                        <tr>
                                                            <td><?= h($cars->id) ?></td>
                                                            <td><?= h($cars->plate) ?></td>
                                                            <td><?= h($cars->registration) ?></td>
                                                            <td><?= h($cars->expiry) ?></td>
                                                            <td><?= h($cars->user_id) ?></td>
                                                            <td class="actions">
                                                                <?= $this->Html->link(__('View'),
                                                                    [
                                                                        'controller' => 'Cars',
                                                                        'action' => 'view',
                                                                        $cars->id
                                                                    ]) ?>
                                                                <?= $this->Html->link(__('Edit'),
                                                                    [
                                                                        'controller' => 'Cars',
                                                                        'action' => 'edit',
                                                                        $cars->id
                                                                    ]) ?>
                                                                <?= $this->Form->postLink(__('Delete'),
                                                                    [
                                                                        'controller' => 'Cars',
                                                                        'action' => 'delete',
                                                                        $cars->id
                                                                    ],
                                                                    [
                                                                        'confirm' => __('Are you sure you want to delete # {0}?',
                                                                            $cars->id)
                                                                    ]) ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </div>
                                        <div class="table-responsive">
                                            <h4><?= __('Related Drivers') ?></h4>
                                            <?php if (!empty($user->drivers)): ?>
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('License') ?></th>
                                                    <th scope="col"><?= __('User Id') ?></th>
                                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($user->drivers as $drivers): ?>
                                                        <tr>
                                                            <td><?= h($drivers->id) ?></td>
                                                            <td><?= h($drivers->license) ?></td>
                                                            <td><?= h($drivers->user_id) ?></td>
                                                            <td class="actions">
                                                                <?= $this->Html->link(__('View'),
                                                                    [
                                                                        'controller' => 'Drivers',
                                                                        'action' => 'view',
                                                                        $drivers->id
                                                                    ]) ?>
                                                                <?= $this->Html->link(__('Edit'),
                                                                    [
                                                                        'controller' => 'Drivers',
                                                                        'action' => 'edit',
                                                                        $drivers->id
                                                                    ]) ?>
                                                                <?= $this->Form->postLink(__('Delete'),
                                                                    [
                                                                        'controller' => 'Drivers',
                                                                        'action' => 'delete',
                                                                        $drivers->id
                                                                    ],
                                                                    [
                                                                        'confirm' => __('Are you sure you want to delete # {0}?',
                                                                            $drivers->id)
                                                                    ]) ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </div>
                                        <div class="table-responsive">
                                            <h4><?= __('Related Trips') ?></h4>
                                            <?php if (!empty($user->trips)): ?>
                                                <table class="table align-items-center table-flush">
                                                    <thead class="thead-light">
                                                    <th scope="col"><?= __('Id') ?></th>
                                                    <th scope="col"><?= __('Client') ?></th>
                                                    <th scope="col"><?= __('Phone') ?></th>
                                                    <th scope="col"><?= __('Date') ?></th>
                                                    <th scope="col"><?= __('Pick Up Time') ?></th>
                                                    <th scope="col"><?= __('Appointment Time') ?></th>
                                                    <th scope="col"><?= __('Pick Up Address') ?></th>
                                                    <th scope="col"><?= __('Pick Up City') ?></th>
                                                    <th scope="col"><?= __('Drop Off Address') ?></th>
                                                    <th scope="col"><?= __('Drop Off City') ?></th>
                                                    <th scope="col"><?= __('Comments') ?></th>
                                                    <th scope="col"><?= __('Created') ?></th>
                                                    <th scope="col"><?= __('Distance') ?></th>
                                                    <th scope="col"><?= __('User Id') ?></th>
                                                    <th scope="col"><?= __('Company Id') ?></th>
                                                    <th scope="col"><?= __('Complete') ?></th>
                                                    <th scope="col"><?= __('Start Lat') ?></th>
                                                    <th scope="col"><?= __('Start Long') ?></th>
                                                    <th scope="col"><?= __('Drop Lat') ?></th>
                                                    <th scope="col"><?= __('Drop Long') ?></th>
                                                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                                                    </thead>
                                                    <tbody>
                                                    <?php foreach ($user->trips as $trips): ?>
                                                        <tr>
                                                            <td><?= h($trips->id) ?></td>
                                                            <td><?= h($trips->client) ?></td>
                                                            <td><?= h($trips->phone) ?></td>
                                                            <td><?= h($trips->date) ?></td>
                                                            <td><?= h($trips->pick_up_time) ?></td>
                                                            <td><?= h($trips->appointment_time) ?></td>
                                                            <td><?= h($trips->pick_up_address) ?></td>
                                                            <td><?= h($trips->pick_up_city) ?></td>
                                                            <td><?= h($trips->drop_off_address) ?></td>
                                                            <td><?= h($trips->drop_off_city) ?></td>
                                                            <td><?= h($trips->comments) ?></td>
                                                            <td><?= h($trips->created) ?></td>
                                                            <td><?= h($trips->distance) ?></td>
                                                            <td><?= h($trips->user_id) ?></td>
                                                            <td><?= h($trips->company_id) ?></td>
                                                            <td><?= h($trips->complete) ?></td>
                                                            <td><?= h($trips->start_lat) ?></td>
                                                            <td><?= h($trips->start_long) ?></td>
                                                            <td><?= h($trips->drop_lat) ?></td>
                                                            <td><?= h($trips->drop_long) ?></td>
                                                            <td class="actions">
                                                                <?= $this->Html->link(__('View'),
                                                                    [
                                                                        'controller' => 'Trips',
                                                                        'action' => 'view',
                                                                        $trips->id
                                                                    ]) ?>
                                                                <?= $this->Html->link(__('Edit'),
                                                                    [
                                                                        'controller' => 'Trips',
                                                                        'action' => 'edit',
                                                                        $trips->id
                                                                    ]) ?>
                                                                <?= $this->Form->postLink(__('Delete'),
                                                                    [
                                                                        'controller' => 'Trips',
                                                                        'action' => 'delete',
                                                                        $trips->id
                                                                    ],
                                                                    [
                                                                        'confirm' => __('Are you sure you want to delete # {0}?',
                                                                            $trips->id)
                                                                    ]) ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id],
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                </div>
                            </div>

                            <hr class="my-4"/>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('links'); ?>

<li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Cars'), ['controller' => 'Cars', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Car'), ['controller' => 'Cars', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Drivers'), ['controller' => 'Drivers', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Driver'), ['controller' => 'Drivers', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Trips'), ['controller' => 'Trips', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Trip'), ['controller' => 'Trips', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Roles'), ['controller' => 'Roles', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Role'), ['controller' => 'Roles', 'action' => 'add']) ?> </li>

<?php $this->end(); ?>







