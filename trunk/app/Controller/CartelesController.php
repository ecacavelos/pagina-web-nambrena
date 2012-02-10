<?php
class CartelesController extends AppController {
    public $name = 'Carteles';
    public $helpers = array('Html', 'Form');
    
 public function index() {
        $this->set('carteles', $this->Cartele->find('all'));
        $this->layout = 'layout_carteles';
    } 
}	