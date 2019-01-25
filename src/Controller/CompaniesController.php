<?php

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Companies Controller
 *
 * @property \App\Model\Table\CompaniesTable $Companies
 *
 * @method \App\Model\Entity\Company[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CompaniesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $companies = $this->paginate($this->Companies);

        $this->set(compact('companies'));
    }

    /**
     * View method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => ['Trips', 'Users']
        ]);

        $this->set('company', $company);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $new_user = $data['users'];

            $company = $this->Companies->patchEntity($company, $this->request->getData());
            $company->active = 'yes';
            if ($this->Companies->save($company)) {

                $users = TableRegistry::getTableLocator()->get('Users');
                $user = $users->newEntity($new_user);
                $user->company_id = $company->id;
                $user->type = 'Administrator';
                $user->activated = 'yes';
                if ($users->save($user)) {
                    $this->Flash->success(__('User has been saved.'));
                }
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->loadModel('Roles');
        $roles = $this->Roles->find('list', ['limit' => 200]);
        $active = $this->active;
        $this->set(compact('company', 'roles','active'));
    }


    public function add_backup()
    {
        $company = $this->Companies->newEntity();
        if ($this->request->is('post')) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $this->loadModel('Roles');
        $roles = $this->Roles->find('list', ['limit' => 200]);
        $this->set(compact('company', 'roles'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $company = $this->Companies->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $company = $this->Companies->patchEntity($company, $this->request->getData());
            if ($this->Companies->save($company)) {
                $this->Flash->success(__('The company has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The company could not be saved. Please, try again.'));
        }
        $active = $this->active;
        $this->set(compact('company', 'active'));

    }

    /**
     * Delete method
     *
     * @param string|null $id Company id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $company = $this->Companies->get($id);
        if ($this->Companies->delete($company)) {
            $this->Flash->success(__('The company has been deleted.'));
        } else {
            $this->Flash->error(__('The company could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function isAuthorized($user)
    {
        $id = $user['id'];

        if ($user['type'] == 'Management') {
            return true;
        }
        $session = $this->getRequest()->getSession();
        if ( $session->read('session_type')=='advanced'){
            return true;
        }

        return false;
    }
}
