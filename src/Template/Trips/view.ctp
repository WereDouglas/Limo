<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Trip $trip
 */
?>
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 100%;
    }

    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #floating-panel {
        position: absolute;
        top: 10px;
        left: 25%;
        z-index: 5;
        background-color: #fff;
        padding: 5px;
        border: 1px solid #999;
        text-align: center;
        font-family: 'Roboto', 'sans-serif';
        line-height: 30px;
        padding-left: 10px;
    }
</style>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Trip'), ['action' => 'edit', $trip->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Trip'), ['action' => 'delete', $trip->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $trip->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Trips'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Trip'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Companies'), ['controller' => 'Companies', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Company'), ['controller' => 'Companies', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="trips view large-9 medium-8 columns content">

    <h3><?= h($trip->id) ?></h3>
    Pick up address: <input type="text" name="start" value="<?= h($trip->pick_up_address) ?>" id="start"><br>
    Drop off address name: <input type="text" name="end" value="<?= h($trip->drop_off_address) ?>" id="end"><br>

    <div id="map" style="width: 100%; height: 400px;"></div>
    <script>

        function initMap() {
            var directionsService = new google.maps.DirectionsService;
            var directionsDisplay = new google.maps.DirectionsRenderer;
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 7,
                center: {lat: 41.85, lng: -87.65}
            });
            directionsDisplay.setMap(map);

            var onChangeHandler = function () {
                calculateAndDisplayRoute(directionsService, directionsDisplay);
            };
            document.getElementById('start').addEventListener('change', onChangeHandler);
            document.getElementById('end').addEventListener('change', onChangeHandler);
        }

        function calculateAndDisplayRoute(directionsService, directionsDisplay) {
            directionsService.route({
                origin: document.getElementById('start').value,
                destination: document.getElementById('end').value,
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDkPuKLdJPV9H_ozRBlj95r429WxNiyPss&callback=initMap">
    </script>

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
                    ['controller' => 'Companies', 'action' => 'view', $trip->company->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($trip->id) ?></td>
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


