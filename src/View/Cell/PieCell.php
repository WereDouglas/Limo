<?php
namespace App\View\Cell;

use Cake\View\Cell;

/**
 * Pie cell
 * @property  string $cid
 */
class PieCell extends Cell
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
        $pie = Array();
        $this->loadModel('Users');
        $query = $this->Users->find('all', [
            'conditions' => [
                'company_id' => $this->cid
            ],
        ]);
        $users = $query->all();
        $day = date('Y-m-d');
        foreach ($users as $u) {

            $object = new \stdClass();
            $object->count = $this->dailyCount($day, $u->id);
            $object->name = $u->first_name;
            array_push($pie, $object);
        }
        $this->set('information', $pie);
    }

    public function dailyCount($day = null, $user_id = null)
    {
        $this->loadModel('Trips');
        $query = $this->Trips->find('all', [
            'conditions' => [
                'date =' => $day,
                'user_id' => $user_id
            ],
        ]);
        return $query->count();
    }
}
