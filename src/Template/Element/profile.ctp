<ul class="navbar-nav align-items-center d-none d-md-flex">
    <li class="nav-item dropdown">
        <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false">
            <div class="media align-items-center">
                <span class="avatar avatar-sm rounded-circle">
                     <?php
                     $image = $this->Url->image('user.png');
                     if ($this->session->read('image') != "") {
                         $image = $this->Url->build('/'.$this->session->read('image'));
                     }
                     ?>
                  <img alt="Image placeholder" src="<?= $image; ?>">
                </span>
                <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?= $this->session->read('name'); ?></span>
                </div>
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
            <div class=" dropdown-header noti-title">
                <h6 class="text-overflow m-0">Welcome!</h6>
            </div>
            <i class="ni ni-single-02"></i>
            <?= $this->Html->link(__('Profile'),
                ['controller' => 'Users', 'action' => 'view', $this->session->read('id')]) ?>

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
            <?php
            echo $this->Html->link(
                ' <i class="ni ni-user-run"></i>Sign out',
                array(
                    'controller' => 'users',
                    'action' => 'login'
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
