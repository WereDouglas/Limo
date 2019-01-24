<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Drivers Controller
 *
 * @property \App\Model\Table\DriversTable $Drivers
 *
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DriversController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $drivers = $this->paginate($this->Drivers);

        $this->set(compact('drivers'));
    }

    /**
     * View method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('driver', $driver);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driver = $this->Drivers->newEntity();
        if ($this->request->is('post')) {


            $data = $this->request->getData();
            $driving = $data['drivers'];
            $expire = $data['expires'];


            $users = TableRegistry::getTableLocator()->get('Users');
            $user = $users->newEntity($data);
            $user->company_id = $this->Auth->user('company_id');
            if ($users->save($user)) {

                $drivers = TableRegistry::getTableLocator()->get('Drivers');
                $driver = $drivers->newEntity($driving);
                $driver->user_id = $user->id;
                $driver->expires = date('Y-m-d', strtotime($expire));

                if ($drivers->save($driver)) {
                    $this->Flash->success(__('The driver has been saved.'));
                }
                $this->Flash->success(__('User Information saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));


        }
        $this->loadModel('Companies');
        $this->loadModel('Roles');
        $companies = $this->Companies->find('list', ['limit' => 200]);
        $roles = $this->Roles->find('list', ['limit' => 200]);
        $users = $this->Drivers->Users->find('list', ['limit' => 200]);
        $active = $this->active;
        $types = $this->types;
        if ($this->Auth->user('type') == 'Management') {
            $types['Management'] = 'Management';
        }

        $this->set(compact('driver', 'users', 'roles', 'companies', 'active', 'types'));
    }


    public function add_back()
    {
        $driver = $this->Drivers->newEntity();
        if ($this->request->is('post')) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $this->loadModel('Companies');
        $this->loadModel('Roles');
        $companies = $this->Companies->find('list', ['limit' => 200]);
        $roles = $this->Roles->find('list', ['limit' => 200]);
        $users = $this->Drivers->Users->find('list', ['limit' => 200]);
        $this->set(compact('driver', 'users', 'roles', 'companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $users = $this->Drivers->Users->find('list', ['limit' => 200]);


        $this->set(compact('driver', 'users'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driver = $this->Drivers->get($id);
        if ($this->Drivers->delete($driver)) {
            $this->Flash->success(__('The driver has been deleted.'));
        } else {
            $this->Flash->error(__('The driver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $id = $user['id'];
        $permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $id]);
        if ($user['type'] == 'Management') {
            return true;
        }
        if (in_array('add_drivers', $permissions) && $action === 'add') {
            return true;
        }
        if (in_array('view_drivers', $permissions) && $action === 'view') {
            return true;
        }
        if (in_array('delete_drivers', $permissions) && $action === 'delete') {
            return true;
        }
        if (in_array('edit_drivers', $permissions) && $action === 'edit') {
            return true;
        }
        if (in_array('list_drivers', $permissions) && $action === 'index') {
            return true;
        }
        if (in_array('update_drivers', $permissions) && $action === 'update') {
            return true;
        }
        {

            return false;
        }

    }

}
