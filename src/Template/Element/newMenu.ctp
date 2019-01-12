<ul class="navbar-nav mb-md-3">
    <a class="nav-link" href="#navbar-maps" data-toggle="collapse" role="button" aria-expanded="false"
       aria-controls="navbar-maps">
        <i class="ni ni-fat-add text-primary"></i>
        <span class="nav-link-text">Add/New</span>
    </a>
    <div class="collapse" id="navbar-maps">
        <ul class="nav nav-sm flex-column">
            <li class="nav-item">
                <?php
                echo $this->Html->link(
                    ' <i class="ni ni-pin-3 text-orange"></i>Trips',
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
                    ' <i class="ni ni-circle-08 "></i>Users',
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
                    ' <i class="ni ni-delivery-fast text-indigo"></i>Cars',
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
                    ' <i class="ni ni-single-02 text-green"></i>Drivers',
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
                    ' <i class="ni ni-badge text-gray"></i>Roles',
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
                    ' <i class="ni ni-lock-circle-open text-red"></i>Permissions',
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
                    ' <i class="ni ni-briefcase-24 text-red"></i>Company',
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
        <?= $this->element('roleMenu') ?>
    </div>
</ul>
