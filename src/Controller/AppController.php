<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 * @property  string $id
 * @property  array $permissions
 * @property  string $action
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     * @property array $permissions
     */
    var $helpers = array('Session');
    public $paginate = [
        'limit' => 25,
        'order' => [
            'Articles.title' => 'asc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        $this->loadComponent('Paginator');
        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
        $this->loadComponent('Auth', [
            'authorize' => 'Controller',
            'loginRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'logout'
            ],
            'authenticate' => [
                'Form' => [
                    'fields' => ['username' => 'contact', 'password' => 'password']
                ],
                'Digest' => [
                    'fields' => ['username' => 'contact', 'password' => 'digest_hash'],
                    'userModel' => 'Users'
                ],
            ],
            // 'storage' => 'Memory',
            // If unauthorized, return them to page they were just on
             'unauthorizedRedirect' => $this->referer()
        ]);

       // $this->Auth->allow(['display', 'view', 'index']);
        $this->Auth->allow(['logout', 'login', 'register']);

    }

    public function isAuthorized($user)
    {
      /*  $this->action = $this->request->getParam('action');
        $this->id = $user['id'];
        $this->permissions = TableRegistry::getTableLocator()->get('Users')->find('permissions', ['id' => $this->id]);*/
        return false;
    }


}
