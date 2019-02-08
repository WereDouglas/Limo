<?php

namespace App\Controller;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Query;
use Rest\Controller\RestController;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

/**
 * Foo Controller
 *
 */
class InformationController extends RestController
{
    public function initialize()
    {

        parent::initialize();
        $this->loadComponent('RequestHandler');

        $this->Auth->allow(['trips', 'users', 'login','update']);
    }

    /**
     * bar method
     *
     * @return Response|void
     */
    public function trips()
    {
        $token = $this->token;
        $payload = $this->request->getQueryParams('id');
        $id = $payload['id'];
        $date = $payload['date'];

        $data = TableRegistry::get('trips')->find()->where(['user_id' => $id, 'date' => $date]);
        $this->set(compact('id', 'date', 'data', 'token'));

    }
    public function change()
    {
       // $payload = $this->request->getQueryParams();
          $id =$this->request->getQuery(['id']);
        $id = $this->request->getData('id');

      //  $id = $payload['id'];
        if ($id) {
            /*post man request**/
            $id = $this->request->getQuery(['id']);
            $user_id = $this->request->getQuery(['user_id']);
        } else {
            /*android request**/
            $id = $this->request->getData('id');
            $user_id = $this->request->getData('user_id');
        }
        //echo json_encode($payload);
        //  echo $this->set('_serialize', $payload);
        $this->set(compact( 'id'));

        // Specify which view vars JsonView should serialize.



        $trip = $this->Trips->get($id);
        $trip->user_id = $user_id;
        if ($this->Trips->save($trip)) {
            $m = 'Information changed.';
            $this->set('_serialize', $m);
            return;
        }

        $m = 'Information could not be changed. Please, try again.';
        $this->set('_serialize', $m);
        return;
    }


    public function update()
    {
        $this->token;
        $payload = $this->request->getQueryParams();
        $id = $payload['id'];
        $date = $payload['date'];
        $complete = $payload['state'];
        $trip_id = $payload['trip'];

        $tripsTable = TableRegistry::get('Trips');
        $trip = $tripsTable->get($trip_id); // Return article with id 12
        $status = 'no';
        if ($complete == 'no') {
            $status = 'yes';
        }
        if ($complete == 'cancelled') {
            $status = 'cancelled';
        }
        $trip->complete = $status;
        $tripsTable->save($trip);


        $data = TableRegistry::get('trips')->find()->where(['user_id' => $id, 'date' => $date]);
        $this->set(compact( 'trip_id','status','data'));

    }

    public function login()
    {
        /**
         *
         * postman requests are different from android requests which is strange
         */
        $contact = $this->request->getQuery(['contact']);
        if ($contact) {
            /*post man request**/
            $contact = $this->request->getQuery(['contact']);
            $password = $this->request->getQuery(['password']);

        } else {
            /*android request**/
            $contact = $this->request->getData('contact');
            $password = $this->request->getData('password');

        }
        $query = TableRegistry::getTableLocator()->get('Users')->find('all')
            ->where(['contact' => $contact]);
        $row = $query->first();
        if ((new DefaultPasswordHasher)->check($password, $row['password'])) {
            $payload = [
                'id' => $row['id'],
                'company_id' => $row['company_id'],
                'contact' => $contact,
                'full_name' => $row['first_name'] . ' ' . $row['last_name'],
                'api_key' => $row['api_key'],
                'image' => $row['photo_dir'] . ' /' . $row['photo']
            ];
            $token = \Rest\Utility\JwtToken::generate($payload);
            $this->set(compact('token', 'payload'));
        } else {
            $message = 'No user defined ' . $row['first_name'];
            $this->set(compact('message'));
        }
    }

    public function users()
    {
        $token = $this->token;
        $payload = $this->request->getQueryParams('id');
        $id = $payload['id'];
        $date = $payload['date'];

        $data = TableRegistry::get('users')->find('login');
        $this->set(compact('id', 'date', 'data', 'token'));

    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $id = $user['id'];
        $permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $id]);

        /* print_r($permissions);
         exit;*/
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

        return false;
    }
}
