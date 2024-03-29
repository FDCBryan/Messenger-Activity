<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		https://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
public $uses = array('User');
public $components = array(
    'DebugKit.Toolbar',
    'Session',
    'Auth' => array(
        'loginRedirect' => array('controller' => 'users', 'action' => 'index'),
        'logoutRedirect' => array('controller' => 'users', 'action' => 'index'),
        'authError' => "Access Denied. Please log in",
        'authorize' => array('Controller') // Note the uppercase 'C' in 'Controller'
    )
);

public function isAuthorized($user){
    return true;
}

public function beforeFilter(){
        $this->Auth->allow('login','register','logout');
        $this->set('logged_In', $this->Auth->loggedIn());
        $this->set('Current_user', $this->Auth->user());


}


public function beforeRender() {
        parent::beforeRender();
        $autocomplete = $this->User->find('all',array(
            'fields' => array('User.username')));
        // Add your variable and its value here
        $this->set('autocomplete', $autocomplete);

}    




}


