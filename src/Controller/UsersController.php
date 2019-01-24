<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use PhpParser\Node\Expr\Array_;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */

    /* public function initialize()
     {

         parent::initialize(); // TODO: Change the autogenerated stub
         $this->Auth->allow(['index']);

     }*/
    public function index()
    {
        $this->paginate = [
            'contain' => ['Companies']
        ];
        $users = $this->paginate($this->Users);
        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
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
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->company_id= $this->Auth->user('company_id');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }

        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $types = $this->types;
        if($this->Auth->user('type')=='Management'){
            $types['Management']='Management';
        }
        $active = $this->active;

        $this->set(compact('user', 'roles', 'types', 'active'));
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
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            $user->company_id= $this->Auth->user('company_id');
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }


        $roles = $this->Users->Roles->find('list', ['limit' => 200]);
        $types = $this->types;
        if($this->Auth->user('type')=='Management'){
            $types['Management']='Management';
        }

        $active = $this->active;

        $this->set(compact('user','roles', 'types', 'active'));
    }

    public function update()
    {
        $values = $this->request->getData();
        $id = $values['id'];
        $user = $this->Users->get($id, [
            'contain' => ['Roles']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {

            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
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
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {


        $roles = Array();
        $this->viewBuilder()->setLayout('');
        $session = $this->getRequest()->getSession();

        if (!empty($session->read('name'))) {
            $this->redirect(array('controller' => 'users', 'action' => 'index'));
        }

        if ($this->request->is('post')) {
            $user = $this->Auth->identify();
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
                    'type' => $user_type
                ]);


                // $values = $this->request->getData();
                if ($this->request->getData('rememberme') == 1) {
                    // remove "remember me checkbox"
                    unset($this->request->data['User']['remember_me']);
                    // hash the user's password
                    $this->request->data['User']['contact'] = $this->Auth->user('contact');
                    $this->Cookie->write('remember_me_cookie', $this->request->data['User'], true, '2 weeks');
                    //   var_dump( $this->Cookie->read('remember_me_cookie'));
                    //   exit();
                    //  unset($this->request->getData(['User']['rememberme']);
                    // write the cookie
                    $this->Cookie->write('remember_me_cookie', $this->Auth->user('id'), true, '2 weeks');
                    //echo $this->Cookie->read('remember_me_cookie');
                }

            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }
        }
    }

    public function register()
    {
        $this->viewBuilder()->setLayout('');

        $companies = TableRegistry::getTableLocator()->get('Companies');

        $company = $companies->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $new_user = $data['users'];
            $company = $companies->patchEntity($company, $this->request->getData());
            $company->active = 'yes';
            if ($companies->save($company)) {

                $users = TableRegistry::getTableLocator()->get('Users');
                $user = $users->newEntity($new_user);
                $user->company_id = $company->id;
                $user->type = 'Administrator';
                $user->active = 'yes';
                if ($users->save($user)) {
                    $this->Flash->success(__('User has been saved.'));
                }
                $this->Flash->success(__('The company has been saved.'));
                return $this->redirect(['action' => 'login']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));

        }
        $this->loadModel('Roles');
        $roles = $this->Roles->find('list', ['limit' => 200]);
        $this->set(compact('company', 'roles'));

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
       // $roles = TableRegistry::getTableLocator()->get('Users')->find('roles', ['id' => $id]);

        if ($user['type'] == 'Management') {
            return true;
        }
        // print_r($permissions);
        if (in_array('add_users', $permissions) && $action === 'add') {
            return true;
        }

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
