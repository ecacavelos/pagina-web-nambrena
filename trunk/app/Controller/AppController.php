<?php
// app/Controller/AppController.php
class AppController extends Controller {

    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array('controller' => 'admins', 'action' => 'index'),
            'logoutRedirect' => array('controller' => 'pages', 'action' => 'display', 'home'),
			'authorize' => array('Controller')
        )
    );

    public function beforeFilter() {
        $this->Auth->allow('display');
    }

}