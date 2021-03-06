<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
           href="../index.html"><?= $this->fetch('title') ?></a>
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
<?php if ($this->fetch('counter')): ?>
    <?= $this->fetch('counter') ?>
<?php else: ?>

<?php endif ?>

<div class="container-fluid mt--7">
    <?= $this->fetch('content') ?>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-3">
                            <h3 class="mb-0"><?= $this->fetch('title') ?></h3>
                        </div>
                        <div class="col-6">
                            <?php if ($this->fetch('date')) { ?>
                                <?= $this->fetch('date') ?>
                            <?php } ?>
                        </div>
                        <div class="col-3">
                            <button class="btn-icon btn btn-secondary" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                <span class="btn-inner--icon"><i class="ni ni-active-40"></i></span>
                                <span class="btn-inner--text">Actions</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <ul class="side-nav" style="list-style: none">
                                    <?php if ($this->fetch('links')) { ?>
                                        <?= $this->fetch('links') ?>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <?php if ($this->fetch('form')) { ?>
                    <div class="table-responsive">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <?= $this->fetch('form') ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <?php if ($this->fetch('th')) { ?>
                    <div class="table-responsive">
                        <?php if ($this->fetch('modal')): ?>
                            <?= $this->fetch('modal') ?>
                        <?php endif; ?>
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">

                            <?= $this->fetch('th') ?>

                            </thead>
                            <tbody>
                            <?= $this->fetch('tr') ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
                <?php if ($this->fetch('pagination')) { ?>
                    <div class="card-footer py-4">
                        <nav aria-label="...">
                            <div class="paginator">
                                <?= $this->fetch('pagination') ?>
                            </div>

                        </nav>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="roleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List of your roles </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                foreach ($this->session->read('roles') as $p):
                    echo '<br>' . str_replace('_', ' ', $p);
                endforeach;
                echo '<br>-----------------------';
                ?>
                <?php

                foreach ($this->session->read('permissions') as $p):
                    echo '<br>' . str_replace('_', ' ', $p);
                endforeach;

                ?>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<?= $this->Html->script(['jquery.min', 'bootstrap-datepicker.min.js']); ?>



