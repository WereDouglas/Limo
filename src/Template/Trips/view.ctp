<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>

<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip[]|\Cake\Collection\CollectionInterface $trips
 */
?>
<?php
$this->extend('/Common/subPage');
$this->assign('title', 'All trips');
?>
<!-- Header -->
<?php $this->start('counter'); ?>
<div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <?php echo $cell = $this->cell('Trip',['company_id'=>$cid]); ?>
</div>
<?php $this->end(); ?>
<!-- Page content -->
<!-- Table -->
<div class="row">
    <div class="col">
        <div class="card shadow">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">TRIP</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">Actions</a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                            <ul class="side-nav">
                                <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id]) ?> </li>
                                <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id],
                                        ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?> </li>
                                <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
                                <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
                                <li><?= $this->Html->link(__('List Users'),
                                        ['controller' => 'Users', 'action' => 'index']) ?> </li>
                                <li><?= $this->Html->link(__('New User'),
                                        ['controller' => 'Users', 'action' => 'add']) ?> </li>
                                <li><?= $this->Html->link(__('List Companies'),
                                        ['controller' => 'Companies', 'action' => 'index']) ?> </li>
                                <li><?= $this->Html->link(__('New Company'),
                                        ['controller' => 'Companies', 'action' => 'add']) ?> </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                    <div class="trips view large-12 medium-12 columns content">
                        <div class="row">
                            <div class="col-9">
                                <div class="card shadow border-0">
                                    <div id="map-canvas" class="map-canvas" style="height: 600px;"></div>
                                </div>
                            </div>
                            <div class="col-3">

                                <h3><?= h($trip->id) ?></h3>
                                <table class="vertical-table">
                                    <tr>
                                        <th scope="row"><?= __('Client') ?></th>
                                        <td><?= h($trip->client) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Phone') ?></th>
                                        <td><?= h($trip->phone) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Pick Up Time') ?></th>
                                        <td><?= h($trip->pick_up_time) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Appointment Time') ?></th>
                                        <td><?= h($trip->appointment_time) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Pick Up Address') ?></th>
                                        <td><?= h($trip->pick_up_address) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Pick Up City') ?></th>
                                        <td><?= h($trip->pick_up_city) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Drop Off Address') ?></th>
                                        <td><?= h($trip->drop_off_address) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Drop Off City') ?></th>
                                        <td><?= h($trip->drop_off_city) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('User') ?></th>
                                        <td><?= $trip->has('user') ? $this->Html->link($trip->user->id,
                                                ['controller' => 'Users', 'action' => 'view', $trip->user->id]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Company') ?></th>
                                        <td><?= $trip->has('company') ? $this->Html->link($trip->company->name,
                                                [
                                                    'controller' => 'Companies',
                                                    'action' => 'view',
                                                    $trip->company->id
                                                ]) : '' ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Complete') ?></th>
                                        <td><?= h($trip->complete) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Id') ?></th>
                                        <td><?= $this->Number->format($trip->id) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Start Lat') ?></th>
                                        <td><?= $this->Number->format($trip->start_lat) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Start Long') ?></th>
                                        <td><?= $this->Number->format($trip->start_long) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Drop Lat') ?></th>
                                        <td><?= $this->Number->format($trip->drop_lat) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Drop Long') ?></th>
                                        <td><?= $this->Number->format($trip->drop_long) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Date') ?></th>
                                        <td><?= h($trip->date) ?></td>
                                    </tr>
                                    <tr>
                                        <th scope="row"><?= __('Created') ?></th>
                                        <td><?= h($trip->created) ?></td>
                                    </tr>
                                </table>
                                <div class="row">
                                    <h4><?= __('Comments') ?></h4>
                                    <?= $this->Text->autoParagraph(h($trip->comments)); ?>
                                </div>
                                <div class="row">
                                    <h4><?= __('Distance') ?></h4>
                                    <?= $this->Text->autoParagraph(h($trip->distance)); ?>
                                </div>


                            </div>
                        </div>

                    </div>

            </div>
        </div>
    </div>
</div>
</div>


<script type='text/javascript'>
    var pick_lat = parseFloat('<?php echo $trip->start_lat; ?>');
    var pick_lg = parseFloat('<?php echo $trip->start_long; ?>');

    var drop_lat = parseFloat('<?php echo $trip->drop_lat; ?>');
    var drop_lg = parseFloat('<?php echo $trip->drop_long; ?>');


    // var pick = new google.maps.LatLng(pick_lat, pick_lg);
    // var drop = new google.maps.LatLng(drop_lat,drop_lg);

    var pick = '<?php echo $trip->pick_up_address; ?>)';
    var drop = '<?php echo $trip->drop_off_address; ?>)';

    function init_map() {
        var directionsService = new google.maps.DirectionsService();
        var directionsDisplay = new google.maps.DirectionsRenderer();


        var mapOptions = {
            zoom: 12,
            center: pick
        }
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = pick;
        var end = drop;
        directionsService.route({
            origin: start,
            destination: end,
            travelMode: 'DRIVING'
        }, function (response, status) {
            if (status === 'OK') {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }
</script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkPuKLdJPV9H_ozRBlj95r429WxNiyPss&callback=init_map">
</script>


