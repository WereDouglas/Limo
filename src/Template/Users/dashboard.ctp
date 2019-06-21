<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Company[]|\Cake\Collection\CollectionInterface $companies
 */
$this->extend('/Common/subPage');
$this->assign('title', 'Dashboard');
?>

<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip', ['company_id' => $cid]); ?>
</div>
<?php $this->end(); ?>
<?php $this->start('table'); ?>
<div class="row">
    <div class="col-md-6">
        <?php echo $cell = $this->cell('Pie', ['company_id' => $cid]); ?>
    </div>
    <div class="col-md-6">
        <?php echo $cell = $this->cell('CompanyMonthly', ['company_id' => $cid]); ?>
    </div>
</div>
<?php echo $cell = $this->cell('UserMonthly', ['company_id' => $cid]); ?>

<?php $this->end(); ?>


