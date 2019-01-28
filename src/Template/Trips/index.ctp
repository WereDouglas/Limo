<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip[]|\Cake\Collection\CollectionInterface $trips
 * @var \App\Model\Entity\Trip $trip
 */
?>
<?php
$this->extend('/Common/subPage');
$this->assign('title', 'All trips :' . $day);
?>
<!-- Header -->
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip', ['company_id' => $cid]); ?>
</div>
<?php $this->end(); ?>
<!-- Page content -->

<?php $this->start('links'); ?>

<li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Users'),
        ['controller' => 'Users', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New User'),
        ['controller' => 'Users', 'action' => 'add']) ?></li>
<li><?= $this->Html->link(__('List Companies'),
        ['controller' => 'Companies', 'action' => 'index']) ?></li>
<li><?= $this->Html->link(__('New Company'),
        ['controller' => 'Companies', 'action' => 'add']) ?></li>
<li>
    <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModal">
        Import
    </button>
</li>


<?php $this->end(); ?>
<?php $this->start('th'); ?>
<tr>
    <th scope="col"></th>
    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('driver') ?></th>
    <th scope="col"><?= $this->Paginator->sort('client') ?></th>
    <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
    <th scope="col"><?= $this->Paginator->sort('date') ?></th>
    <th scope="col"><?= $this->Paginator->sort('pick_up_time') ?></th>
    <th scope="col"><?= $this->Paginator->sort('appointment_time') ?></th>
    <th scope="col"><?= $this->Paginator->sort('pick_up_address') ?></th>
    <th scope="col"><?= $this->Paginator->sort('pick_up_city') ?></th>
    <th scope="col"><?= $this->Paginator->sort('drop_off_address') ?></th>
    <th scope="col"><?= $this->Paginator->sort('drop_off_city') ?></th>
    <th scope="col"><?= $this->Paginator->sort('distance') . '(Miles)' ?></th>
    <th scope="col"><?= $this->Paginator->sort('created') ?></th>
    <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('company_id') ?></th>
    <th scope="col"><?= $this->Paginator->sort('complete') ?></th>
    <th scope="col"><?= $this->Paginator->sort('start_lat') ?></th>
    <th scope="col"><?= $this->Paginator->sort('start_long') ?></th>
    <th scope="col"><?= $this->Paginator->sort('drop_lat') ?></th>
    <th scope="col"><?= $this->Paginator->sort('drop_long') ?></th>
    <th scope="col" class="actions"><?= __('Actions') ?></th>
</tr>
<?php $this->end(); ?>
<?php $this->start('tr'); ?>
<?php foreach ($trips as $trip): ?>
    <tr>
        <td>
            <?php
            // echo '<pre>';
            // var_dump($trip->user);
            $image = $this->Url->image('user.png');
            if ($trip->user->photo != "") {
                $image = $this->Url->build($trip->user->full_url);
            }
            ?>
            <div class="avatar-group">
                <a href="#" class="avatar avatar-sm" data-toggle="tooltip"
                   data-original-title="<?= $trip->user->full_url ?>">
                    <img alt="Image placeholder"
                         src="<?= $image ?>"
                         class="rounded-circle">
                </a>
            </div>
        </td>
        <td><?= $this->Number->format($trip->id) ?></td>
        <td><?= h($trip->user->full_name) ?>
            <?php

            echo $this->Form->control('user_id',
                ['options' => $users, 'empty' => true, 'class' => 'form-control',]);

            ?>
            <select class="form-control" name="cat_id" onChange="ajaxFunction()">
                <?php foreach ($users as $u) {  ?>

                    <option value="<?= $u['id'] ?>" class="form-control"><?php echo  $u['first_name'] ?></option>
                <?php } ?>
            </select>
        </td>
        <td><?= h($trip->client) ?></td>
        <td><?= h($trip->phone) ?></td>
        <td><?= h($trip->date) ?></td>
        <td><?= h($trip->pick_up_time) ?></td>
        <td><?= h($trip->appointment_time) ?></td>
        <td><?= h($trip->pick_up_address) ?></td>
        <td><?= h($trip->pick_up_city) ?></td>
        <td><?= h($trip->drop_off_address) ?></td>
        <td><?= h($trip->drop_off_city) ?></td>
        <td><?= h($trip->distance) ?></td>
        <td><?= h($trip->created) ?></td>
        <td><?= $trip->has('user') ? $this->Html->link($trip->user->id,
                ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
        <td><?= $trip->has('company') ? $this->Html->link($trip->company->name,
                ['controller' => 'Companies', 'action' => 'view', $trip->company->id]) : '' ?></td>
        <td>
            <?= h($trip->complete) ?>
            <?php if ($trip->complete === 'no'): ?>
                <span class="badge badge-dot mr-4"> <i class="bg-warning"></i> pending</span>
            <?php elseif ($trip->complete === 'yes'): ?>
                <span class="badge badge-dot mr-4"><i class="bg-success"></i> completed</span>
            <?php else: ?>
                <span class="badge badge-dot"><i class="bg-info"></i>en route</span>
            <?php endif; ?>
        </td>
        <td><?= $this->Number->format($trip->start_lat) ?></td>
        <td><?= $this->Number->format($trip->start_long) ?></td>
        <td><?= $this->Number->format($trip->drop_lat) ?></td>
        <td><?= $this->Number->format($trip->drop_long) ?></td>
        <td class="actions">
            <div class="dropdown">
                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                    <ul class="side-nav">

                        <li> <?= $this->Html->link(__('View'),
                                ['action' => 'view', $trip->id]) ?></li>
                        <li> <?= $this->Html->link(__('Edit'),
                                ['action' => 'edit', $trip->id]) ?></li>
                        <li>
                            <?= $this->Form->postLink(__('Delete'),
                                ['action' => 'delete', $trip->id],
                                [
                                    'confirm' => __('Are you sure you want to delete # {0}?',
                                        $trip->id)
                                ]) ?>
                        </li>

                    </ul>
                </div>
            </div>

        </td>
    </tr>
<?php endforeach; ?>


<script>
    $(document).ready(function () {
        $("#status").hide();
        $(function () {
            //acknowledgement message
            var message_status = $("#status");
            $("h1[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("p[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {

                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("span[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {

                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("h2[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {

                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("h3[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("h3[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("li[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {

                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("li[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {

                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("a[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });
            $("td[contenteditable=true]").blur(function () {
                // message_status.show();
                var field_id = $(this).attr("id");
                var value = $(this).text();
                //   alert(field_id);
                console.log(field_id);
                console.log(value);
                $.post('<?php echo base_url() . "index.php/manage/update/"; ?>', field_id + "=" + value, function (data) {
                    if (data != '')
                    {
                        message_status.show();
                        message_status.text(data);
                        //hide the message
                        setTimeout(function () {
                            message_status.hide()
                        }, 4000);
                    }
                });
            });

        });
    });

</script>


<?php $this->end(); ?>
<?php $this->start('pagination'); ?>
<ul class="pagination">
    <?= $this->Paginator->first('<< ') ?>
    <?= $this->Paginator->prev('< ') ?>
    <?= $this->Paginator->numbers() ?>
    <?= $this->Paginator->next(' >') ?>
    <?= $this->Paginator->last(' >>') ?>
</ul>
<p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>



<?php $this->end(); ?>
<?php $this->start('modal'); ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import excel data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php $trip = null; ?>
                <?= $this->Form->create($trip,
                    ['type' => 'file', 'controller' => 'trips', 'action' => 'import']) ?>
                <legend><?= __('Import trips') ?></legend>

                <?php echo $this->Form->control('start_address', ['class' => 'form-control']); ?>
                <br>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                        </div>
                        <input name="date" class="form-control datepicker" placeholder="Select date" type="text"
                               value="<?= date('m/d/Y') ?>">
                    </div>
                </div>

                <?php echo $this->Form->control('trip', ['type' => 'file', 'class' => 'form-control']); ?>

                <div>
                    <?php echo $this->Form->submit('Import',
                        ['div' => false, 'name' => 'importexcel', 'class' => 'btn btn-primary mt-4']);
                    ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<?php $this->end(); ?>
<?php $this->start('date'); ?>
<?php $list = null; ?>

<?= $this->Form->create($list, ['action' => 'form', 'class' => 'form-horizontal']) ?>
<div class="row">
    <div class="col">
        <div class="input-group input-group-alternative">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
            </div>
            <input name="date" class="form-control datepicker" placeholder="Select date" type="text"
                   value="<?= date('m/d/Y') ?>">
        </div>
    </div>
    <div class="col">
        <button class="btn-icon btn btn-secondary" type="submit">
            <span class="btn-inner--icon"><i class="ni ni-bullet-list-67"></i></span>
            <span class="btn-inner--text">filter</span>
        </button>
    </div>
</div>
<?= $this->Form->end() ?>
<?php $this->end(); ?>
