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
<!-- Page content -->
<div class="container-fluid mt--7">
    <?= $this->fetch('content') ?>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0"><?= $this->fetch('title') ?></h3>
                        </div>
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
                    </div>
                </div>

                <?php if($this->fetch('th')){ ?>
                    <div class="table-responsive">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">

                                <?= $this->fetch('th')?>

                            </thead>
                            <tbody>
                            <?= $this->fetch('tr')?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
                <?php if($this->fetch('pagination')) { ?>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <div class="paginator">

                                <?= $this->fetch('pagination') ?>

                                <ul class="pagination justify-content-end mb-0">
                                    <li class="page-item disabled">
                                        <a class="page-link" href="#" tabindex="-1">
                                            <i class="fas fa-angle-left"></i>
                                            <span
                                                class="sr-only"><?= $this->Paginator->prev('< ' . __('previous')) ?></span>
                                        </a>
                                    </li>
                                    <li class="page-item active">
                                        <a class="page-link" href="#">1</a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="page-item"><a class="page-link"
                                                             href="#"> <?= $this->Paginator->numbers() ?></a>
                                    </li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">
                                            <i class="fas fa-angle-right"></i>
                                            <span
                                                class="sr-only"><?= $this->Paginator->next(__('next') . ' >') ?></span>
                                        </a>
                                    </li>
                                </ul>

                        </div>

                    </nav>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</div>

