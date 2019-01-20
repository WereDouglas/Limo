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
        $controller =strtolower( $this->getName()).'s';

        /* print_r($permissions);
         exit;*/
        if (in_array('add_'.$controller, $permissions) && $action === 'add') {
            return true;
        }
        if (in_array('view_'.$controller, $permissions) && $action === 'view') {
            return true;
        }
        if (in_array('delete_'.$controller, $permissions) && $action === 'delete') {
            return true;
        }
        if (in_array('edit_'.$controller, $permissions) && $action === 'edit') {
            return true;
        }
        if (in_array('list_drivers', $permissions) && $action === 'index') {
            return true;
        }
        if (in_array('update_'.$controller, $permissions) && $action === 'update') {
            return true;
        }
        {

        return false;
        }

    }

}
