<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\Query;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\Array_;


class ManagementController extends AppController
{

    /**
     * Users Controller
     *
     * @property \App\Model\Table\UsersTable $Users
     *
     * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
     */


    public function dashboard()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Companies');
        $companies = $this->Companies->find();
        $companies = $this->paginate($companies);
        $this->set(compact('companies'));

    }

    public function index()
    {
        $this->viewBuilder()->setLayout('management');
        $users = TableRegistry::getTableLocator()->get('Users')->find('all');
        $users = $this->paginate($users);

        $this->set(compact('users'));

    }

    public function users()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Users');
        $users = $this->Users->find()->contain([
            'Companies'
        ]);
        $users = $this->paginate($users);
        $this->set(compact('users'));
    }

    public function companies()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Companies');
        $companies = $this->Companies->find();
        $companies = $this->paginate($companies);
        $this->set(compact('companies'));

    }


    public function trips()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Trips');
        $trips = $this->Trips->find()->contain([
            'Users',
            'Companies'

        ])->order(['Trips.id' => 'DESC']);
        $trips = $this->paginate($trips);
        $this->set(compact('trips', 'day'));
    }

    public function form()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Trips');
        $values = $this->request->getData();
        $day = ($values['date'] != '') ? date('Y-m-d', strtotime($values['date'])) : date('Y-m-d');

        $trips = $this->Trips->find('all', [
            'contain' => ['Users', 'Companies'],
            'order' => ['Trips.id' => 'DESC'],
        ])->where(['Trips.date' => $day]);

        $this->set(compact('trips', 'day'));
    }
    public function editUsers($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->company_id = $this->Auth->user('company_id');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $types = $this->types;
        if ($this->Auth->user('type') == 'Management') {
            $types['Management'] = 'Management';
        }

        $active = $this->active;

        $this->set(compact('user', 'roles', 'types', 'active'));
    }

    public function permissions()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Permissions');
        $permissions = $this->Permissions->find();
        $permissions = $this->paginate($permissions);
        $this->set(compact('permissions'));
    }

    public function roles()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Roles');
        $roles = $this->Roles->find()->contain('companies');
        $roles = $this->paginate($roles);
        $this->set(compact('roles'));
    }

    public function deleteRoles($id = null)
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Roles');
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function viewRoles($id = null)
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Roles');
        $role = $this->Roles->get($id, [
            'contain' => ['Users', 'Permissions', 'companies']
        ]);

        $this->set('role', $role);
    }

    public function editRoles($id = null)
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Roles');
        $role = $this->Roles->get($id, [
            'contain' => ['Users', 'Permissions']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }

        $permissions = $this->Roles->Permissions->find('list', ['limit' => 200]);
        $users = $this->Roles->Users->find('list', ['limit' => 200]);
        $companies = $this->Roles->Companies->find('list', ['limit' => 200]);
        $this->set(compact('role', 'users', 'permissions', 'companies'));
    }

    public function cars()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Cars');
        $cars = $this->Cars->find();
        $cars = $this->paginate($cars);
        $this->set(compact('cars'));
    }


    public function logs()
    {
        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Logs');
        $logs = $this->Logs->find()->order(['id' => 'DESC'], Query::OVERWRITE);
        $logs = $this->paginate($logs);
        $this->set(compact('logs'));
    }

    public function drivers()
    {

        $this->viewBuilder()->setLayout('management');
        $this->loadModel('Drivers');
        $drivers = $this->Drivers->find()->contain([
            'Users'
        ]);
        $drivers = $this->paginate($drivers);
        $this->set(compact('drivers'));
    }

    public function view($id = null)
    {
        $this->viewBuilder()->setLayout('management');
        $user = $this->Users->get($id, [
            'contain' => ['Companies', 'Roles', 'Cars', 'Drivers', 'Trips']
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Management->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Management->patchEntity($user, $this->request->getData());
            if ($this->Management->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $companies = $this->Management->Companies->find('list', ['limit' => 200]);
        $roles = $this->Management->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Management->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Management->patchEntity($user, $this->request->getData());
            if ($this->Management->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $companies = $this->Management->Companies->find('list', ['limit' => 200]);
        $roles = $this->Management->Roles->find('list', ['limit' => 200]);
        $this->set(compact('user', 'companies', 'roles'));
    }

    public function update()
    {
        $values = $this->request->getData();
        $id = $values['id'];
        $user = $this->Management->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Management->patchEntity($user, $this->request->getData());
            if ($this->Management->save($user)) {
                $this->Flash->success(__('The user information has been updated.'));

                return $this->redirect(['action' => 'view', $id]);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->Flash->error(__('Invalid request '));
        return $this->redirect(['action' => 'view', $id]);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Management->get($id);
        if ($this->Management->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login($id = null)
    {
        $roles = Array();
        $this->viewBuilder()->setLayout('');
        $session = $this->getRequest()->getSession();
        $session->destroy();

        $this->loadModel('Users');
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);

        if ($user) {
            $this->Auth->setUser($user);
            $current_user = $this->Auth->user('first_name') . ' ' . $this->Auth->user('last_name');
            $user_image = '/' . $this->Auth->user('photo_dir') . '' . $this->Auth->user('photo');
            $user_id = $this->Auth->user('id');
            $user_type = $this->Auth->user('type');
            $user_contact = $this->Auth->user('contact');
            $company_id = $this->Auth->user('company_id');

            $companies = TableRegistry::get('Companies');
            $company = $companies->get($company_id);
            $permissions = TableRegistry::getTableLocator()->get('Users')->find('roles', ['id' => $user_id]);
            $session->write([
                'name' => $current_user,
                'image' => $user_image,
                'contact' => $user_contact,
                'id' => $user_id,
                'company_image' => '/' . $company['photo_dir'] . ' ' . $company['photo'],
                'company_name' => $company['name'],
                'company_id' => $company_id,
                'permissions' => $permissions,
                'roles' => $roles,
                'type' => $user_type,
                'session_type' => 'advanced'
            ]);
            $this->Flash->success(__('Logged in successfully.'));
            return $this->redirect(['controller' => 'Users', 'action' => 'index']);
        } else {
            $this->Flash->error(__('Could not log you in !'));
        }
    }

    public function destroy()
    {
        $this->loadModel('Logs');
        $this->Logs->deleteAll(array('1 = 1'));
        //$this->Logs->query('TRUNCATE TABLE logs;');
        return $this->redirect(['action' => 'logs']);
    }

    public function logout()
    {
        $session = $this->getRequest()->getSession();
        $session->destroy();
        return $this->redirect(['action' => 'login']);
        // return $this->redirect($this->Auth->logout());
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $id = $user['id'];

        $permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $id]);
        if ($user['type'] == 'Management') {
            return true;
        }
        if ($action === 'login') {
            return true;
        }
        // print_r($permissions);
        if (in_array('add_users', $permissions) && $action === 'add') {
            return true;
        }

        if (in_array('view_users', $permissions) && $action === 'view') {
            return true;
        }
        if (in_array('delete_users', $permissions) && $action === 'delete') {
            return true;
        }
        if (in_array('edit_users', $permissions) && $action === 'edit') {
            return true;
        }
        if (in_array('list_users', $permissions) && $action === 'index') {
            return true;
        }
        if (in_array('update_users', $permissions) && $action === 'update') {
            return true;
        }

        return false;
    }


}
