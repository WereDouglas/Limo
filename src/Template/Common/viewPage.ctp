<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="../index.html"><?=$this->fetch('title')?></a>
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
        <?=$this->element('profile')?>
    </div>
</nav>
<!-- Header -->
<?php if($this->fetch('counter')): ?>
    <?= $this->fetch('counter') ?>
<?php  else:  ?>
    <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">

    </div>
<?php  endif ?>
<!-- Page content -->
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"> <?= __('Actions') ?></li>
        <?php if($this->fetch('links')){ ?>
            <?= $this->fetch('links') ?>
        <?php } ?>


    </ul>
</nav>

<div class="trips form large-12 medium-12 columns content">
    <div class="container mt--12 pb-12">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="card bg-secondary shadow border-0">

                    <div class="card-body px-lg-12 py-lg-12">
                        <?php if($this->fetch('form')){ ?>
                            <?= $this->fetch('form') ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
