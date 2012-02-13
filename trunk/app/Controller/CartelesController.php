<?php
class CartelesController extends AppController {
    public $name = 'Carteles';
    public $helpers = array('Html', 'Form');
    
 public function index() {
        
        $this->layout = 'layout_carteles';
    } 
    public function front_light(){
    	
        $this->layout = 'layout_carteles_front_light';
    } 
}	