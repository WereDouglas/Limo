<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip[]|\Cake\Collection\CollectionInterface $trips
 */
?>

<!-- Top navbar -->
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
<?php if($this->fetch('counter')){ ?>
    <?= $this->fetch('counter') ?>
<?php } ?>
<!-- Page content -->
<div class="container-fluid mt--7">
    <?= $this->fetch('content') ?>
</div>
