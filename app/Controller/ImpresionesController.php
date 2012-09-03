<?php
class ImpresionesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'front_light', 'back_light', 'adhesivo', 'microperforado', 'ficha');
	}
	
    public $name = 'Impresiones';
    public $helpers = array('Html', 'Form');    	
	    
	public function index() {
	        
 		$this->Session->write('Cartele',null);
        $this->Session->write('Corporeo',null);
        $this->Session->write('Vinilo',null);
	  	
	    $this->layout = 'layout_impresiones';
//	        $cartel_array = array ("Cartele" => $this->Session->read());
//          print_r($cartel_array);
	       
	  }
	  public function front_light(){
	  	
	  	$this->Session->write('Impresione.tipo', 'Front light');
	  
	 	$this->Session->write('Cartele',null);
        $this->Session->write('Corporeo',null);
        $this->Session->write('Vinilo',null);
	  	
	  	$this->layout = 'layout_impresiones_elegir_medida';
	  	
	  }
	  public function back_light(){
	  	
	  	$this->Session->write('Impresione.tipo', 'Back light');
	 	
	  	$this->Session->write('Cartele',null);
        $this->Session->write('Corporeo',null);
        $this->Session->write('Vinilo',null);
	  	
	  	$this->layout = 'layout_impresiones_elegir_medida';	  
	  	
	  }
	  public function adhesivo(){
	  	
	  	$this->Session->write('Impresione.tipo', 'Adhesivo');
	 	 
	 	$this->Session->write('Cartele',null);
        $this->Session->write('Corporeo',null);
        $this->Session->write('Vinilo',null);
	  	
	  	$this->layout = 'layout_impresiones_elegir_medida';	  
	  	
	  }
	  public function microperforado(){
	  	
	  	$this->Session->write('Impresione.tipo', 'Microperforado');
	  
	 	$this->Session->write('Cartele',null);
        $this->Session->write('Corporeo',null);
        $this->Session->write('Vinilo',null);
	  	
	  	$this->layout = 'layout_impresiones_elegir_medida';	  
	  	
	  }
	  public function ficha(){
	 	
	  	$this->layout = 'layout_presupuestos_ingresar_datos';
	 	$this->Session->write('Cartele',null);
        $this->Session->write('Corporeo',null);
        $this->Session->write('Vinilo',null);
		
			// Se setea el layout para presentar el formulario antes de generar el presupuesto. 
			
			
			// Se obtienen el ancho y alto a partir del formulario en layout_carteles_elegir_medida.ctp
			$this->Session->write('ancho', $this->request->data['ancho']);
			$this->Session->write('alto', $this->request->data['alto']);
			
      		// Se setea el tipo de envio que eligio el usuario. 
      		if (array_key_exists('envio_x',$this->request->data)){//COLOCADO
        		$this->Session->write('Impresione.tipoEnvio', 'envio');
        	}
        	// Se setea el tipo de envio que eligio el usuario. 
      		if (array_key_exists('pickup_x',$this->request->data)){//COLOCADO
        		$this->Session->write('Impresione.tipoEnvio', 'pickup');
        	}
        	
			

//          IMPRESION DE LOS DATOS PARA DEBUGGEAR.
//    		$datos = $this->request->query;
//          print_r($datos);
//      	$datos2 = $this->request->data;
//      	print_r($datos2);
//      	$cartel_array = $this->Session->read();
//          print_r($cartel_array);	
	}

    
    
}	