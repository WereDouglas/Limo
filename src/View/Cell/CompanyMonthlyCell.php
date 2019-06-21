<?php

namespace App\View\Cell;

use Cake\View\Cell;

/**
 * CompanyMonthly cell
 * @property  string $cid
 */
class CompanyMonthlyCell extends Cell
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
     * @property $cid
     */
    public function display($company_id)
    {
        $this->cid = $company_id;
        $months = Array();
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
        foreach ($m as $key => $value) {

            array_push($months, $this->counts($value));
        }

        $this->set('trips', $months);
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
