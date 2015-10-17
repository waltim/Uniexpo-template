<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    public $admLocal = "/UniexpoAdmin/";
    public $urlSite = "localhost";

    public $components = array(
        'Email'=>array(),
        'Auth',
        'Session',
    );

    public $helpers = array('Html', 'Form', 'Session');

    public function beforeFilter()
    {


        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'Form'          => array(
                    'fields'        => array('username' => array('username','email')),
                ),
                'scope' => array(
                    'User.Aceito' => 'S',
                ),
            ),
            'Form',
        );
        $this->Auth->authorize = 'controller';

        $this->Auth->loginAction = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'login',
        );

        $this->Auth->logoutRedirect = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'login',
        );

        $this->Auth->loginRedirect = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'index',
        );

        $this->Auth->authError = __('Você não possui autorização para executar esta ação.');

        $this->Auth->allowedActions = array('display','add','listar_semestres_json');

        $this->set("admLocal",$this->admLocal);
        $this->set("urlSite",$this->urlSite);
        $this->set('logado',$this->Auth->loggedIn());
    }

    public function isAuthorized($user)
    {

        if (!empty($this->request->params['admin'])) {
            return $user['user_type_id'] == 1;
        }
        return !empty($user);
    }
}
