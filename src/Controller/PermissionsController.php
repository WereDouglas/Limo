<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Permissions Controller
 *
 * @property \App\Model\Table\PermissionsTable $Permissions
 * @property \App\Model\Table\PermissionsTable $Roles
 *
 * @method \App\Model\Entity\Permission[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 * @property  array $permissions
 */
class PermissionsController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        // $this->Auth->allow(['add', 'delete']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $permissions = $this->Permissions->find('all', [
            'contain' => ['Roles']
        ]);
        $cid = $this->Auth->user('company_id');
        $this->set(compact('permissions','cid'));
    }

    /**
     * View method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => ['Roles']
        ]);

        $this->set('permission', $permission);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $permission = $this->Permissions->newEntity();
        if ($this->request->is('post')) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $permission = $this->Permissions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $permission = $this->Permissions->patchEntity($permission, $this->request->getData());
            if ($this->Permissions->save($permission)) {
                $this->Flash->success(__('The permission has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The permission could not be saved. Please, try again.'));
        }
        $roles = $this->Permissions->Roles->find('list', ['limit' => 200]);
        $this->set(compact('permission', 'roles'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Permission id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $permission = $this->Permissions->get($id);
        if ($this->Permissions->delete($permission)) {
            $this->Flash->success(__('The permission has been deleted.'));
        } else {
            $this->Flash->error(__('The permission could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $action = $this->request->getParam('action');
        $id = $user['id'];
        $permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $id]);
        $roles = TableRegistry::getTableLocator()->get('Users')->find('roles', ['id' => $id]);
        if ($user['type'] == 'Management') {
            return true;
        }
        $session = $this->getRequest()->getSession();
        if ( $session->read('session_type')=='advanced'){
            return true;
        }
        if (in_array('add_permissions', $permissions) && $action === 'add') {
            return true;
        }
        if (in_array('view_permissions', $permissions) && $action === 'view') {
            return true;
        }
        if (in_array('delete_permissions', $permissions) && $action === 'delete') {
            return true;
        }
        if (in_array('edit_permissions', $permissions) && $action === 'edit') {
            return true;
        }
        if (in_array('list_permissions', $permissions) && $action === 'index') {
            return true;
        }

        return false;
    }
}
