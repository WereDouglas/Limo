<li class="nav-item">

      <h6 class="navbar-heading text-muted">Your Roles</h6>
    <!-- Navigation -->
    <ul class="navbar-nav mb-md-3">

        <?php foreach ($this->session->read('roles') as $role): ?>
            <li class="nav-item">
                <a class="nav-link"
                   href="#">
                    <i class="ni ni-briefcase-24 text-gray-dark"></i><?php echo $role; ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
    <hr class="my-3">
    <ul class="navbar-nav mb-md-3">
        <h6 class="navbar-heading text-muted">Your permissions</h6>
        <?php foreach ($this->session->read('permissions') as $p): ?>
            <li class="nav-item">
                <a class="nav-link"
                   href="#">
                    <i class="ni ni-lock-circle-open text-gray"></i>
                    <?php
                    echo str_replace('_',' ', $p);

                    ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

</li>
