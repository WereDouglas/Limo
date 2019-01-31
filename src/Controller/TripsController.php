<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\Database\Expression\IdentifierExpression;
use Cake\Test\Fixture\ArticlesFixture;
use PhpOffice\PhpSpreadsheet\Exception;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\ORM\TableRegistry;
use App\Model\Table\Trips;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Cake\Event\Event;
use PhpParser\Node\Expr\Array_;

require ROOT . DS . 'vendor' . DS . 'phpoffice\phpspreadsheet\src\Bootstrap.php';

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 *
 * @method \App\Model\Entity\Trip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TripsController extends AppController
{

    public function initialize()
    {

        parent::initialize(); // TODO: Change the autogenerated stub
        //$this->Auth->allow(['index']);
        $this->loadComponent('RequestHandler');

    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    public function index()
    {
        $cid = $this->Auth->user('company_id');
        $this->paginate = [
            'contain' => ['Users', 'Companies'],
            'where' => ['Trips.company_id' => $cid],
             'order'=>['Trips.id' => 'DESC'],
        ];
        $users = $this->Trips->Users->find('list')->where(['company_id' => $cid]);
        $trips = $this->paginate($this->Trips, ['maxLimit' => 5]);

        $this->set(compact('trips', 'day', 'cid', 'users'));
    }

    public function form()
    {
        $cid = $this->Auth->user('company_id');
        $values = $this->request->getData();
        $day = ($values['date'] != '') ? date('Y-m-d', strtotime($values['date'])) : date('Y-m-d');

        $trips = $this->Trips->find('all', [
            'contain' => ['Users', 'Companies'],
            'order'=>['Trips.id' => 'DESC'],
        ])->where(['Trips.date' => $day, 'Trips.company_id' => $cid]);
        $this->set(compact('trips', 'day', 'cid'));
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $cid = $this->Auth->user('company_id');
        $trip = $this->Trips->get($id, [
            'contain' => ['Users', 'Companies'],
            'conditions'=>['Trips.company_id' => $cid]
        ]);
        $cid = $this->Auth->user('company_id');
        $this->set('trip', $trip, 'cid', $cid);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trip = $this->Trips->newEntity();
        if ($this->request->is('post')) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $users = $this->Trips->Users->find('list',
            ['limit' => 200])->where(['company_id' => $this->Auth->user('company_id')]);

        $this->set(compact('trip', 'users'));
    }

    public function change()
    {
        $payload = $this->request->getQueryParams();

        $id = $payload['id'];
        $user_id = $payload['user_id'];
        $trip = $this->Trips->get($id);
        $trip->user_id = $user_id;
        $trip->re_route = 'yes';
        if ($this->Trips->save($trip)) {
            $m = 'Information could not be changed. Please, try again.';
            echo json_encode($m);
            return;
        }
        $m = 'Information could not be changed. Please, try again.';
        echo json_encode($m);
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $users = $this->Trips->Users->find('list', ['limit' => 200]);
        $companies = $this->Trips->Companies->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'users', 'companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function import()
    {
        $session = $this->getRequest()->getSession();
        $helper = new Helper\Sample();
        //debug($helper);
        // $inputFileName = WWW_ROOT . 'example.xlsx';
        $values = $this->request->getData();
        $inputFileName = $values['trip']['tmp_name'];
        $start_address = $values['start_address'];
        $date = date('Y-m-d', strtotime($values['date']));
        $spreadsheet = "";
        $sheetData = "";


        if ($inputFileName != '') {
            try {
                $spreadsheet = IOFactory::load($inputFileName);
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
            }
            try {
                $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);
            } catch (Exception $e) {
            }

            $trip_objects = array();
            for ($i = 0; $i < count($sheetData); $i++) {
                $tripping = new \stdClass();
                // echo $sheetData[$i]['A'] . ' ' . $sheetData[$i]['B'] . ' ';
                if ($sheetData[$i]['A'] == "" || $sheetData[$i]['A'] == "Client Name") {
                    continue;
                }
                $tripping->client = $sheetData[$i]['A'];
                $tripping->phone = $sheetData[$i]['B'];
                // $tripping->date = $sheetData[$i]['C'];
                $tripping->pick_up_time = $this->time($sheetData[$i]['D']);
                $tripping->appointment_time = $this->time($sheetData[$i]['E']);
                $tripping->pick_up_address = $this->clean($sheetData[$i]['F'] . ' ' . $sheetData[$i]['G']);
                $tripping->pick_up_city = $sheetData[$i]['G'];
                $tripping->drop_off_address = $this->clean($sheetData[$i]['H'] . ' ' . $sheetData[$i]['I']);
                // $distance = "";
                global $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo;
                $distance = $this->getDistance($this->clean($sheetData[$i]['F']) . ' ' . $sheetData[$i]['G'],
                    $this->clean($sheetData[$i]['H']) . ' ' . $this->clean($sheetData[$i]['I']), $unit = '');
                //  $tripping->distance_from_start = $this->getDistance($start_address, $this->clean($sheetData[$i]['G']) . ' ' . $sheetData[$i]['H'], $unit = '');
                $tripping->distance = $distance;
                $tripping->drop_off_city = $sheetData[$i]['I'];
                $tripping->comments = $sheetData[$i]['Q'];
                $tripping->user_id = "1";
                $tripping->company_id = $session->read('company_id');
                $tripping->date = $date;
                $tripping->start_lat = $latitudeFrom;
                $tripping->start_long = $longitudeFrom;
                $tripping->drop_lat = $latitudeTo;
                $tripping->drop_long = $longitudeTo;

                $tripping->miles = $sheetData[$i]['J'];
                $tripping->vehicle_type = $sheetData[$i]['K'];
                $tripping->escort = $sheetData[$i]['L'];
                $tripping->trip_num = $sheetData[$i]['M'];
                $tripping->shared_group = $sheetData[$i]['N'];
                $tripping->outbound = $sheetData[$i]['O'];
                $tripping->one_way = $sheetData[$i]['P'];
                $tripping->priority = 'medium';
                $tripping->re_route = 'no';

                array_push($trip_objects, $tripping);
            }
            usort($trip_objects, function ($a, $b) {
                return strtotime($a->pick_up_time) - strtotime($b->pick_up_time);
            });
            $t = $trip_objects;
            //   $this->loop($trip_objects);

            /****getting all the users who are active and have trips  ****/
            $query = TableRegistry::getTableLocator()->get('Users')->find()->where(['Users.company_id' => $this->Auth->user(['company_id'])]);
            $query->select([
                'user_id' => 'Users.id',
                'total_trips' => $query->func()->count('Trips.id')
            ])
                ->leftJoinWith('Trips', function ($q) use ($date) {
                    return $q->where(['Trips.date' => $date]);
                })
                ->group(['Users.id'])->enableAutoFields(true);;
            $users = $query->toArray();

            $available_drivers = [];
            foreach ($users as $u) {
              //  echo $u['user_id'] . ' :' . $u['total_trips'];
                if ($u['total_trips'] == 0) {
                    $available_drivers [] = $u['user_id'];
                }

            }

            if (count($available_drivers) > 0) {
                $each = count($t) / count($available_drivers);
            //    echo '@ :' . $each;
                $each = round($each, 0);
                $distributed = array_chunk($t, $each);
                // print_r($distributed);
                for ($k = 0; $k < count($distributed); $k++) {
                    // var_dump($distributed[$k]);
                    $tp = $distributed[$k];
                    // var_dump($tp);
                    echo '<br>';

                    for ($index = 0; $index < count($tp); $index++) {

                        echo $available_drivers[$k] . '--->' . $tp[$index]->pick_up_time;
                        echo '<br>';
                        $trip = $this->Trips->newEntity();
                        $trip->client = $tp[$index]->client;
                        $trip->phone = $tp[$index]->phone;
                        $trip->pick_up_time = $tp[$index]->pick_up_time;
                        $trip->appointment_time = $tp[$index]->appointment_time;
                        $trip->pick_up_address = $tp[$index]->pick_up_address;
                        $trip->pick_up_city = $tp[$index]->pick_up_city;
                        $trip->drop_off_address = $tp[$index]->drop_off_address;
                        $trip->distance = $tp[$index]->distance;
                        $trip->drop_off_city = $tp[$index]->drop_off_city;
                        $trip->comments = $tp[$index]->comments.' ';
                        $trip->date = $tp[$index]->date;
                        $trip->complete = 'no';
                        $trip->user_id = $available_drivers[$k];
                        $trip->company_id = $this->Auth->user('company_id');
                        $trip->start_lat = $tp[$index]->start_lat;
                        $trip->start_long = $tp[$index]->start_long;
                        $trip->drop_lat = $tp[$index]->drop_lat;
                        $trip->drop_long = $tp[$index]->drop_long;

                        $trip->miles = $tp[$index]->miles;
                        $trip->vehicle_type = $tp[$index]->vehicle_type;
                        $trip->escort = $tp[$index]->escort;
                        $trip->trip_num = $tp[$index]->trip_num;
                        $trip->shared_group = $tp[$index]->shared_group;
                        $trip->outbound = $tp[$index]->outbound;
                        $trip->one_way = $tp[$index]->one_way;
                        $trip->priority = 'low';
                        $trip->re_route = 'no';


                        if (!$this->Trips->save($trip)) {
                            var_dump($trip->getErrors());
                            exit;
                        }
                    }

                }


            } else {
                $this->Flash->error(__('No Drivers available loaded'));
                return $this->redirect(['action' => 'index']);
            }


            $this->Flash->success(__('Upload complete.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('No file loaded'));
        return $this->redirect(['action' => 'index']);
    }


    function loop_old($trips)
    {
        $counts = 1;
        if (empty($trips)) {
            return $this->redirect(
                ['controller' => 'Trips', 'action' => 'thanks']
            );
        }
        echo '<pre>';
        //  var_dump($trips);
        echo '<br>';

        $min = $this->min_distance($trips);
        echo ' MINIMUM DISTANCE ' . $min;
        $index = $this->index_value($trips, $min);

        echo '<br>';
        echo 'Index ' . $index;
        echo '<br>';
        $new_start = $this->next_start($trips, $index, $min);
        echo 'NEW START ' . $new_start;
        echo '<br>';
        unset($trips[$index]);

        $trips = array_values($trips);
        var_dump($trips);
        $counts = $counts + 1;
        echo $counts . '------------^object iteration --------------------------<br>';
        //  for ($i = 0; $i < count($trips); $i++) {
        foreach ($trips as $key => $value) {
            //$trips[$i]->distance_from_start = $this->getDistance($new_start, $trips[$i]->pick_up_address);
            echo 'old distance ' . $trips[$key]->distance_from_start;
            echo '<br>';
            $new_distance = $this->getDistance($new_start, $trips[$key]->pick_up_address);
            $trips[$key]->distance_from_start = $new_distance;
            echo $key . ' ' . $new_start . ' This new distance ' . $new_distance . ' starting from ' . $trips[$key]->pick_up_address . ' drop off address ' . $trips[$key]->drop_off_address;

            echo '<br>';
        }
        // var_dump($trips);
        // exit;

        $this->loop($trips);
    }

    /**
     * function that takes on the list of objects
     *
     *
     */
    function next_start($objects, $index, $min)
    {

        $neededObject = array_filter($objects, function ($e) use (&$min) {
            return $e->distance_from_start == $min;
        }
        );

        $trip = $this->Trips->newEntity();
        $trip->client = $neededObject[$index]->client;
        $trip->phone = $neededObject[$index]->phone;
        $trip->pick_up_time = $neededObject[$index]->pick_up_time;
        $trip->appointment_time = $neededObject[$index]->appointment_time;
        $trip->pick_up_address = $neededObject[$index]->pick_up_address;
        $trip->pick_up_city = $neededObject[$index]->pick_up_city;
        $trip->drop_off_address = $neededObject[$index]->drop_off_address;
        $trip->distance = $neededObject[$index]->distance;
        $trip->drop_off_city = $neededObject[$index]->drop_off_city;
        $trip->comments = $neededObject[$index]->comments;
        $trip->user_id = "1";
        $trip->company_id = "1";
        if ($this->Trips->save($trip)) {
            echo 'Trip has been saved.';
        } else {
            var_dump($trip->getErrors());
            exit;
        }
        print_r($neededObject);
        return $neededObject[$index]->drop_off_address;
    }


    function min_distance($objects)
    {
        return $min = min(array_column($objects, 'distance_from_start'));
    }

    function index_value($objects, $min)
    {
        // find the index of the subarray containing min value
        $index = array_search($min, array_column($objects, 'distance_from_start'));


        return $index;
    }

    /**
     * @function getDistance()
     * Calculates the distance between two address
     *
     * @params
     * $addressFrom - Starting point
     * $addressTo - End point
     * $unit - Unit type
     *
     * @author CodexWorld
     * @url https://www.codexworld.com
     *
     */


    function getDistance($addressFrom, $addressTo, $unit = '')
    {
        // Google API key  AIzaSyDkPuKLdJPV9H_ozRBlj95r429WxNiyPss
        $apiKey = 'AIzaSyDkPuKLdJPV9H_ozRBlj95r429WxNiyPss';

        // Change address format
        $formattedAddrFrom = str_replace(' ', '+', $addressFrom);
        $formattedAddrTo = str_replace(' ', '+', $addressTo);

        // Geocoding API request with start address
        $geocodeFrom = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrFrom . '&sensor=false&key=' . $apiKey);
        $outputFrom = json_decode($geocodeFrom);
        if (!empty($outputFrom->error_message)) {
            return $outputFrom->error_message;
        }

        // Geocoding API request with end address
        $geocodeTo = file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddrTo . '&sensor=false&key=' . $apiKey);
        $outputTo = json_decode($geocodeTo);
        if (!empty($outputTo->error_message)) {
            return $outputTo->error_message;
        }
        global $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo;

        // Get latitude and longitude from the geodata
        $latitudeFrom = $outputFrom->results[0]->geometry->location->lat;
        $longitudeFrom = $outputFrom->results[0]->geometry->location->lng;
        $latitudeTo = $outputTo->results[0]->geometry->location->lat;
        $longitudeTo = $outputTo->results[0]->geometry->location->lng;

        // Calculate distance between latitude and longitude
        $theta = $longitudeFrom - $longitudeTo;
        $dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) + cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
        $dist = acos($dist);
        $dist = rad2deg($dist);
        $miles = $dist * 60 * 1.1515;

        // Convert unit and return distance
        $unit = strtoupper($unit);
        if ($unit == "K") {
            return round($miles * 1.609344, 2) . ' km';
        } elseif ($unit == "M") {
            return round($miles * 1609.344, 2) . ' meters';
        } else {
            return round($miles, 2);
        }
    }

    function max_attribute_in_array($data_points, $value = 'value')
    {
        $max = 0;
        foreach ($data_points as $point) {
            if ($max < (float)$point->{$value}) {
                $max = $point->{$value};
            }
        }
        return $max;
    }

    function clean($string)
    {
        return preg_replace('/[.,]/', ' ', $string);
    }

    function time($string)
    {
        $chars = str_split($string);
        $hr = $chars[0] . $chars[1];
        $min = $chars[2] . $chars[3];
        $p = $chars[4];
        if ($p == 'A') {
        } else {
        }
        $time = $hr . ':' . $min . ' ' . $p . 'M';
        $time = date("G:i", strtotime($time));
        return $time;
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $id = $user['id'];

        $permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $id]);
        $session = $this->getRequest()->getSession();
        if ($session->read('session_type') == 'advanced') {
            return true;
        }
        if ($user['type'] == 'Management') {
            return true;
        }
        if ($action === 'change') {
            return true;
        }
        if (in_array('import_trips', $permissions) && $action === 'import') {
            return true;
        }
        if (in_array('add_trips', $permissions) && $action === 'add') {
            return true;
        }
        if (in_array('view_trips', $permissions) && $action === 'view') {
            return true;
        }
        if (in_array('delete_trips', $permissions) && $action === 'delete') {
            return true;
        }
        if (in_array('edit_trips', $permissions) && $action === 'edit') {
            return true;
        }
        if (in_array('list_trips', $permissions) && $action === 'index') {
            return true;
        }
        if (in_array('list_trips', $permissions) && $action === 'form') {
            return true;
        }

        return false;
    }

    public function beforeFilter(Event $event)
    {
        $action = $this->request->getParam('action');
        // filter actions which should not output debug messages
        if ($action === 'import') {
            Configure::write('debug', 0);
        }
        if ($action === 'index') {
            Configure::write('debug', 0);
        }
        // $this->Components->unload('DebugKit.Toolbar');

    }

}
