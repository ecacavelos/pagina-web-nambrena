<?php
class AdminsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index');
	}
	    
    public $helpers = array('Html', 'Form');
	public $components = array('Session');
	public $name = 'Admins';
	    
	public function index() {
		if ($this->Auth->user('id')) {
			$this->set('logeado', '1');
		} else {
			$this->set('logeado', '0');
		}		
		
		$this->layout = 'layout_admin';			 	
	}
    
}	