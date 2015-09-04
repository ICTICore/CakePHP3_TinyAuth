<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use \Ceeram\Blame\Controller\BlameTrait;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Traits
     */
    use BlameTrait;

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * @return void
     */
    public function initialize()
    {
        $this->loadComponent('Auth', [
                'loginAction' => [
                    'controller' => 'Users',
                    'action' => 'login'
                ],
                'loginRedirect' => [
                    'controller' => 'Users',
                    'action' => 'index'
                ],
                'authError' => 'No tienes permiso para acceder a esa sección',
                'authenticate' => [
                    'Form' => [
                        'fields' => [
                            'username' => 'email',
                            'password' => 'password'
                        ],
                        'scope' => ['Users.active' => true],
                        'contain' => ['Roles']
                    ]
                ],
                'authorize' => [
                    'TinyAuth.Tiny' => [
                        'roleColumn' => 'role_id',
                        'rolesTable' => 'Roles',
                        'multiRole' => true,
                        'pivotTable' => 'roles_users',
                        'superAdminRole' => null,
                        'authorizeByPrefix' => false,
                        'prefixes' => [],
                        'allowUser' => false,
                        'adminPrefix' => null,
                        'autoClearCache' => true
                    ]
                ]
            ]
        );
        $this->loadComponent('Flash');
        $this->loadComponent('RequestHandler');
        $this->loadComponent('Search.Prg');
        $this->loadComponent('Security');
    }
}
