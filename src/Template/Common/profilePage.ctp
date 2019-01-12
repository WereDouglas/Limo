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
                                    <?= $this->fetch('image') ?>
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
                        <?= $this->fetch('summary') ?>
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
                                            <?= $this->Form->create('Users',
                                                ['url' => ['action' => 'update'], 'type' => 'file']) ?>
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">
                                                    Update <?= $this->fetch('name') ?>'s profile picture</h5>
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
                                            <?= $this->Form->create('Users',
                                                ['url' => ['action' => 'update'], 'type' => 'file']) ?>
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

                                        <?= $this->fetch('information') ?>
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






