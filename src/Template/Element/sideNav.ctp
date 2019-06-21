<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
                aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="#">
            <img src="<?= $this->Url->image('logo.png') ?>" class="navbar-brand-img" alt="...">
            <h1 class="logo">
                <span class="word1">ERP</span>
                <span class="word1">LIMO</span>
            </h1>
        </a>
        <?php if ($this->session->read('company_image') != ''): ?>
            <span class="avatar avatar-sm rounded-circle">
                     <?php
                     $image = $this->Url->build($this->session->read('company_image'));
                     ?>
                <img alt="<?= $image; ?>" src="<?= $image; ?>">

                </span>
        <?php endif; ?>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <i class="ni ni-bell-55"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right"
                     aria-labelledby="navbar-default_dropdown_1">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
              <span class="avatar avatar-sm rounded-circle">
                <img alt="Image placeholder" src="<?= $this->Url->image('theme/team-1-800x800.jpg') ?>">
              </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">Welcome!</h6>
                    </div>
                    <a href="../examples/profile.html" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>My profile</span>
                    </a>
                    <a href="../examples/profile.html" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>Settings</span>
                    </a>
                    <a href="../examples/profile.html" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>Activity</span>
                    </a>
                    <a href="../examples/profile.html" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>Support</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="#!" class="dropdown-item">
                        <i class="ni ni-user-run"></i>
                        <span>
                            <?php
                            echo $this->Html->link(
                                'Sign out',
                                array(
                                    'controller' => 'users',
                                    'action' => 'login'
                                ),
                                array(
                                    'class' => 'text-light',
                                    'escape' => false
                                )
                            );
                            ?></span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- Collapse -->
        <li class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="../index.html">
                            <img src="<?= $this->Url->image('logo.png') ?>">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse"
                                data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                                aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended"
                           placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <?php
                    echo $this->Html->link(
                        ' <i class="ni ni-tv-2"></i>Dashboard',
                        array(
                            'controller' => 'users',
                            'action' => 'dashboard'
                        ),
                        array(
                            'class' => 'nav-link word1 green ',
                            'escape' => false
                        )
                    );
                    ?>
                </li>

                <li class="nav-item">

                    <hr class="my-3">
                    <!-- Divider -->
                    <h6 class="navbar-heading text-muted">View</h6>
                    <?php
                    echo $this->Html->link(
                        ' <i class="ni ni-pin-3 text-orange"></i>Trips',
                        array(
                            'controller' => 'trips',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'nav-link ',
                            'escape' => false
                        )
                    );
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    echo $this->Html->link(
                        ' <i class="ni ni-circle-08 "></i>Users',
                        array(
                            'controller' => 'users',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'nav-link ',
                            'escape' => false
                        )
                    );
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    echo $this->Html->link(
                        ' <i class="ni ni-delivery-fast text-indigo"></i>Cars',
                        array(
                            'controller' => 'cars',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'nav-link ',
                            'escape' => false
                        )
                    );
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    echo $this->Html->link(
                        ' <i class="ni ni-single-02 text-green"></i>Drivers',
                        array(
                            'controller' => 'drivers',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'nav-link',
                            'escape' => false
                        )
                    );
                    ?>
                </li>
                <li class="nav-item">
                    <?php
                    echo $this->Html->link(
                        ' <i class="ni ni-badge text-gray"></i>Roles',
                        array(
                            'controller' => 'roles',
                            'action' => 'index'
                        ),
                        array(
                            'class' => 'nav-link ',
                            'escape' => false
                        )
                    );
                    ?>
                </li>
                <!-- <li class="nav-item">
                    <?php
                /*                    echo $this->Html->link(
                                        ' <i class="ni ni-lock-circle-open text-red"></i>Permissions',
                                        array(
                                            'controller' => 'permissions',
                                            'action' => 'index'
                                        ),
                                        array(
                                            'class' => 'nav-link ',
                                            'escape' => false
                                        )
                                    );
                                    */ ?>
                </li>-->

                <li class="nav-item">
                    <!-- Divider -->
                    <!-- Heading -->
                    <h6 class="navbar-heading text-muted">Help & support</h6>
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-md-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="ni ni-spaceship"></i> Getting started </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="ni ni-palette"></i> Foundation </a>
                        </li>

                    </ul>

                </li>

                <li class="nav-item">
                    <button class="btn btn-icon btn-3 btn-default btn-sm" type="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                        <span class="btn-inner--text">Add</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                        <ul class="side-nav" style="list-style: none">
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-pin-3 text-orange"></i>  Trips ',
                                    array(
                                        'controller' => 'trips',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-circle-08 "></i>  Users ',
                                    array(
                                        'controller' => 'users',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-delivery-fast text-indigo"></i>  Cars',
                                    array(
                                        'controller' => 'cars',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-single-02 text-green"></i>  Drivers',
                                    array(
                                        'controller' => 'drivers',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>

                            </li>
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-badge text-gray"></i>  Roles',
                                    array(
                                        'controller' => 'roles',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>

                            </li>
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-lock-circle-open text-red"></i>  Permissions',
                                    array(
                                        'controller' => 'permissions',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>
                            </li>
                            <li class="nav-item">
                                <?php
                                echo $this->Html->link(
                                    ' <i class="ni ni-briefcase-24 text-red"></i>  Company',
                                    array(
                                        'controller' => 'companies',
                                        'action' => 'add'
                                    ),
                                    array(
                                        'class' => 'nav-link ',
                                        'escape' => false
                                    )
                                );
                                ?>
                            </li>
                        </ul>
                    </div>


                    <button class="btn btn-icon btn-3 btn-default btn-sm" type="button" data-toggle="modal"
                            data-target="#roleModal">
                        <span class="btn-inner--icon"><i class="ni ni-user-run"></i></span>
                        <span class="btn-inner--text">Roles</span>
                    </button>
                </li>
            </ul>


    </div>
    </div>
</nav>
