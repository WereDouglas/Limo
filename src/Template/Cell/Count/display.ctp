
<div class="container-fluid">
    <div class="header-body">
        <!-- Card stats -->
        <div class="row">
            <?php foreach ($trips as $ct): ?>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-stats mb-4 mb-xl-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0"></h5>
                                    <span
                                        class="h2 font-weight-bold mb-0 "><?= $ct->count.' '.$ct->title ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape <?= $ct->color ?> text-white rounded-circle shadow">
                                        <i class="fas <?= $ct->icon ?>"></i>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mb-0 text-muted text-sm">
                                <?php if ($ct->arrow === 'up'): ?>
                                <span class="text-success mr-2"><i class="fa fa-arrow-up">
                                    <?php elseif ($ct->arrow === 'down'): ?>
                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down">
                                         <?php endif; ?>
                                    </i> <?= $ct->percentage ?>%</span>
                                <span class="text-nowrap">Since last <?= $ct->period ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
