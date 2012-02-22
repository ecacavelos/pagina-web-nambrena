<?php
class PresupuestosController extends AppController {
	
    public $name = 'Presupuestos';
    public $helpers = array('Html', 'Form');

    
 	public function index() {
        
       // redireccionar a la pagina princiapl
    }
    
	public function generate_pdf() 
    { 
      
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $this->render(); 
    } 
    
    public function llenar_ficha(){
    
    	$this->layout = 'layout_presupuestos_llenar_ficha';
    	//$this->render();
    
    
    }
    
    
}	