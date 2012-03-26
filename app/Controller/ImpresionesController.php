<?php
class ImpresionesController extends AppController {
	
    public $name = 'Impresiones';
    public $helpers = array('Html', 'Form');
    
	
	    
	 public function index() {
	        
	        $this->layout = 'layout_impresiones';
//	        $cartel_array = array ("Cartele" => $this->Session->read());
//          print_r($cartel_array);
			   
	       
	    }

    
    
}	