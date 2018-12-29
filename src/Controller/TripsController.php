<?php

namespace App\Controller;

use App\Controller\AppController;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Cake\ORM\TableRegistry;
use App\Model\Table\Trips;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Helper;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users', 'Companies']
        ];
        $trips = $this->paginate($this->Trips);

        $this->set(compact('trips'));
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
        $trip = $this->Trips->get($id, [
            'contain' => ['Users', 'Companies']
        ]);

        $this->set('trip', $trip);
    }

    public function import()
    {
        $helper = new Helper\Sample();
        debug($helper);
        // $inputFileName = WWW_ROOT . 'example.xlsx';
        $values = $this->request->getData();
        $inputFileName = $values['trip']['tmp_name'];


        if ($inputFileName != '') {
            $spreadsheet = IOFactory::load($inputFileName);
            $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);


            for ($i = 0; $i < count($sheetData); $i++) {

                echo $sheetData[$i]['A'] . ' ' . $sheetData[$i]['B'] . ' ';

                $trip = $this->Trips->newEntity();
                if ($sheetData[$i]['A'] == "") {
                    continue;
                }
                if ($sheetData[$i]['A'] == "Client Name") {
                    continue;
                }
                $trip->client = $sheetData[$i]['A'];
                $trip->phone = $sheetData[$i]['B'];
                $trip->pick_up_time = $this->time($sheetData[$i]['C']);
                $trip->appointment_time = $this->time($sheetData[$i]['D']);
                $trip->pick_up_address = $this->clean($sheetData[$i]['E']);
                $trip->pick_up_city = $sheetData[$i]['F'];
                $trip->drop_off_address = $this->clean($sheetData[$i]['G']);
                $distance = $this->getDistance($this->clean($sheetData[$i]['E']).' '.$sheetData[$i]['F'], $this->clean($sheetData[$i]['G']).' '.$sheetData[$i]['H'],
                    $unit = '');
                $trip->distance = $distance;

                $trip->drop_off_city = $sheetData[$i]['H'];
                $trip->comments = $sheetData[$i]['I'];
                $trip->user_id = "1";
                $trip->companies_id = "1";

                  if ($this->Trips->save($trip)) {
                      echo 'Trip has been saved.';
                  } else {
                      var_dump($trip->getErrors());
                      exit;
                  }
            }
            echo '<pre>';
            var_dump($sheetData);
        }
        $this->Flash->error(__('No file loaded'));

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
            return round($miles, 2) . ' miles';
        }
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
        return $hr . ':' . $min . ' ' . $p;

    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public
    function add()
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
        $users = $this->Trips->Users->find('list', ['limit' => 200]);
        $companies = $this->Trips->Companies->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'users', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public
    function edit(
        $id = null
    ) {
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
    public
    function delete(
        $id = null
    ) {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
