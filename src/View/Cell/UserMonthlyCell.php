<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * UserMonthly cell
 * @property  string $cid
 */
class UserMonthlyCell extends Cell
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
        $this->cid = $company_id;
        $information = Array();
        $m = array(
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July ',
            'August',
            'September',
            'October',
            'November',
            'December',
        );
        $this->loadModel('Users');

        $query = $this->Users->find('all', [
            'conditions' => [
                'company_id' => $this->cid
            ],
        ]);
        $users = $query->all();
        foreach ($users as $u) {
            $data = array();
            $object = new \stdClass();
            foreach ($m as $key => $value) {
                array_push($data, $this->monthlyCount($value, $u->id));
            }
            $object->name = $u->first_name;
            $object->data = $data;

            array_push($information, $object);
        }
        $this->set('information', $information);
    }

    public function monthlyCount($month = null, $user_id = null)
    {
        $this->loadModel('Trips');
        $year = date('Y');

        $month_int = date('m', strtotime($month));

        $query = $this->Trips->find('all', [
            'conditions' => [
                'MONTH(date) =' => $month_int,
                'YEAR(date ) =' => $year,
                'user_id' => $user_id
            ],
        ]);
        return $query->count();
    }

    public function counts($month = null)
    {
        $this->loadModel('Trips');
        $year = date('Y');
        $object = new \stdClass();

        $month_int = date('m', strtotime($month));

        $query = $this->Trips->find('all', [
            'conditions' => [
                'MONTH(date) =' => $month_int,
                'YEAR(date ) =' => $year,
                'company_id' => $this->cid
            ],
        ]);
        $object->name = $month;
        $object->count = $query->count();
        return $object;
    }

}
