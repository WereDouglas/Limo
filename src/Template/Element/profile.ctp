<ul class="navbar-nav align-items-center d-none d-md-flex">
    <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                     <?php
                     $image = $this->Url->image('user.png');
                     if ($this->session->read('image') == '') {
                         $image = $this->Url->image('user.png');
                     }
                     if ($this->session->read('image') != "") {
                         $image = $this->Url->build($this->session->read('image'));
                     }
                     ?>
                    <img alt="<?= $image; ?>" src="<?= $image; ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold word1"><?= $this->session->read('name'); ?></span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Hey!</h6>
            </div>

            <?php
            echo $this->Html->link(
                ' <i class="ni ni-single-02"></i>Profile',
                array(
                    'controller' => 'users',
                    'action' => 'view',
                    $this->session->read('id')
                ),
                array(
                    'class' => 'dropdown-item',
                    'escape' => false
                )
            );
            ?>

            <div class="dropdown-divider"></div>
            <?php
            echo $this->Html->link(
                ' <i class="ni ni-user-run"></i>Sign out',
                array(
                    'controller' => 'users',
                    'action' => 'logout'
                ),
                array(
                    'class' => 'dropdown-item',
                    'escape' => false
                )
            );
            ?>

        </div>
    </li>
</ul>
