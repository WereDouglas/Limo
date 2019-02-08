<?php if ($this->fetch('wizardCss')) { ?>
    <?= $this->fetch('wizardCss') ?>
<?php } ?>
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
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    </div>
<?php endif ?>
<!-- Page content -->
<div class="trips form large-9 medium-8 columns content">
    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Actions</a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <ul class="side-nav">
                                    <?php if ($this->fetch('links')) { ?>
                                        <?= $this->fetch('links') ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <?php if ($this->fetch('form')) { ?>
                            <?= $this->fetch('form') ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?= $this->Html->script(['jquery.min']); ?>
    <?php if ($this->fetch('dateScript')) { ?>
        <?= $this->fetch('dateScript') ?>
    <?php } ?>
    <?php if ($this->fetch('wizardScript')) { ?>
        <?= $this->fetch('wizardScript') ?>
    <?php } ?>
    <?php if ($this->fetch('bootstrapMinScript')) { ?>
        <?= $this->fetch('bootstrapMinScript') ?>
    <?php } ?>
    <?php if ($this->fetch('bootstrapJqueryScript')) { ?>
        <?= $this->fetch('bootstrapJqueryScript') ?>
    <?php } ?>
    <?php if ($this->fetch('materialScript')) { ?>
        <?= $this->fetch('materialScript') ?>
    <?php } ?>
    <?php if ($this->fetch('validateScript')) { ?>
        <?= $this->fetch('validateScript') ?>
    <?php } ?>

