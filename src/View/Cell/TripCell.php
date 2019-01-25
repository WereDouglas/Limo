<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Trip cell
 */
class TripCell extends Cell
{

    /**
     * List of valid options that can be passed into this
     * cell's constructor.
     *
     * @var array
     */
    protected $_validCellOptions = [];

    /**
     * Initialization logic run at the end of object construction.
     *
     * @return void
     */
    public function initialize()
    {
    }

    /**
     * Default display method.
     *
     * @return void
     */
    public function display($company_id)
    {
        $counts = Array();
        /**
         * icons
         * fa-users
         * fa-percent

          /*trips*/

        $objects = new \stdClass();
        $this->loadModel('Trips');
        $trips = $this->Trips->find('all')
        ->where(['company_id'=>$company_id]);
        $objects->count = $trips->count();
        $objects->title = 'Trip(s)';
        $objects->icon = 'fa-road';
        $objects->arrow = 'up';
        $objects->color = 'bg-warning';
        $objects->percentage = '19.2';
        $objects->period = 'month';
        array_push($counts, $objects);


        /*users*/
        $objects = new \stdClass();
        $this->loadModel('Users');
        $users = $this->Users->find() ->where(['company_id'=>$company_id]);
        $objects->count = $users->count();
        $objects->title = 'User(s)';
        $objects->icon = 'fa-users';
        $objects->arrow = 'up';
        $objects->color = 'bg-yellow';
        $objects->percentage = '19.2';
        $objects->period = 'Week';
        array_push($counts, $objects);


        /*cars*/
        $objects = new \stdClass();
        $this->loadModel('Cars');
        $cars = $this->Cars->find();
        $objects->count = $cars->count();
        $objects->title = 'Car(s)';
        $objects->icon = 'fa-car';
        $objects->arrow = 'up';
        $objects->color = 'bg-info';
        $objects->percentage = '91.2';
        $objects->period = 'Year';
        array_push($counts, $objects);


        /*drivers*/
        $objects = new \stdClass();
        $this->loadModel('Drivers');
        $drivers = $this->Drivers->find();
        $objects->count = $drivers->count();
        $objects->title = 'Driver(s)';
        $objects->icon = 'fa-user';
        $objects->arrow = 'up';
        $objects->color = 'bg-danger';
        $objects->percentage = '19.2';
        $objects->period = 'Week';
        array_push($counts, $objects);


        $this->set('trips', $counts);

    }
}
