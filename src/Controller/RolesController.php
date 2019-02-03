<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Roles Controller
 *
 *@property \App\Model\Table\RolesTable $Roles
 *@property \App\Model\Table\CompaniesTable $Companies
 *@property \App\Model\Table\RolesTable $Permissions
 * @method \App\Model\Entity\Role[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class RolesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {

        $cid = $this->Auth->user('company_id');
        $this->paginate = [
            'contain' => ['Companies'],
            'conditions' => ['Roles.company_id' => $cid],
        ];
        $roles = $this->paginate($this->Roles);
        $this->set(compact('roles','cid'));
    }

    /**
     * View method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users','Permissions','companies']
        ]);

        $this->set('role', $role);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $role = $this->Roles->newEntity();
        /*echo '<pre>';
        var_dump($this->request->getData());

        exit;*/

        if ($this->request->is('post')) {
            $role = $this->Roles->patchEntity($role, $this->request->getData());
            if ($this->Roles->save($role)) {
                $this->Flash->success(__('The role has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The role could not be saved. Please, try again.'));
        }
        $users = $this->Roles->Users->find('list', ['limit' => 200]);
        $permissions = $this->Roles->Permissions->find('list', ['limit' => 200]);
        $companies = $this->Roles->Companies->find('list', ['limit' => 200]);
        $this->set(compact('role', 'users','permissions','companies'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $role = $this->Roles->get($id, [
            'contain' => ['Users','Permissions']
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
        $this->set(compact('role', 'users','permissions','companies'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Role id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $role = $this->Roles->get($id);
        if ($this->Roles->delete($role)) {
            $this->Flash->success(__('The role has been deleted.'));
        } else {
            $this->Flash->error(__('The role could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $id = $user['id'];
        $permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $id]);
        $session = $this->getRequest()->getSession();
        if ( $session->read('session_type')=='advanced'){
            return true;
        }
        if ($user['type'] == 'Management') {
            return true;
        }
        if (in_array('add_roles', $permissions) && $action === 'add') {
            return true;
        }
        if (in_array('view_roles', $permissions) && $action === 'view') {
            return true;
        }
        if (in_array('delete_roles',$permissions) && $action === 'delete') {
            return true;
        }
        if (in_array('edit_roles', $permissions) && $action === 'edit') {
            return true;
        }
        if (in_array('list_roles', $permissions) && $action === 'index') {
            return true;
        }

        return false;
    }

}
