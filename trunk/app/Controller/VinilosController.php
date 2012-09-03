<?php
class VinilosController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'ficha');
	}
	
    public $name = 'Vinilos';
    public $helpers = array('Html', 'Form');	
	    
	public function index() {
	        
	 	$this->Session->write('Cartele',null);
        $this->Session->write('Impresione',null);
        $this->Session->write('Corporeo',null);
	 	
	    $this->layout = 'layout_vinilos_elegir_medida';	  
	  	
	 }
	    

	  public function ficha(){
	 
	 	$this->Session->write('Cartele',null);
        $this->Session->write('Impresione',null);
        $this->Session->write('Corporeo',null);
		
			// Se setea el layout para presentar el formulario antes de generar el presupuesto. 
			$this->layout = 'layout_presupuestos_ingresar_datos';
			
			// Se obtienen el ancho y alto a partir del formulario en layout_carteles_elegir_medida.ctp
			$this->Session->write('ancho', $this->request->data['ancho']);
			$this->Session->write('alto', $this->request->data['alto']);
			
      		$this->Session->write('Vinilo.d', 'seleccionado');
        	
			

//          IMPRESION DE LOS DATOS PARA DEBUGGEAR.
//    		$datos = $this->request->query;
//          print_r($datos);
//      	$datos2 = $this->request->data;
//      	print_r($datos2);
//      	$cartel_array = $this->Session->read();
//          print_r($cartel_array);	
		}
	    

    
}	