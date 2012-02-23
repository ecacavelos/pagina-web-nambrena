<?php
class CartelesController extends AppController {
	
    public $name = 'Carteles';
    public $helpers = array('Html', 'Form');
	
	    
	 public function index() {
	        
	        $this->layout = 'layout_carteles';
	        $this->set('carteles_actuales', $this->Cartele->find('all'));
	       
	    }

    
    
    //**************************
    //TIPO
    ///**************************
    public function front_light($soporte = null , $luminosidad_mantenimiento = null){
    	
        
        
        if( $soporte == null ){ // Esto quiere decir que se estan en el URL /carteles/frontlight
        	
        	$this->layout = 'layout_carteles_front_light';
        	$this->Session->write('Cartele.tipo', 'front_light');
			   
        } // aca se emmpiezan a parsear el unico parametro que se manda de los views, llega como un string la configuracion. Cada configuracion es bien descriptiva. 
        else{
    		switch ($soporte){
    		
    			case "sobre_pared":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_front_light-sobre_pared';
    					$this->Session->write('Cartele.tipo', 'front_light');
    					$this->Session->write('Cartele.soporte', 'sobre_pared');
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.luminosidad', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.luminosidad', 0);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    							break;
    					}
    				}
    				break;

    				
    			case "sobre_poste":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_front_light-sobre_poste';
    					$this->Session->write('Cartele.tipo', 'front_light');
    					$this->Session->write('Cartele.soporte', 'sobre_poste');
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.luminosidad', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					echo "ooop";
		    					$this->Session->write('Cartele.luminosidad', 0);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    							break;
    					}
    				}
    				break;
    				
    				
    				case "ya_poseo":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_front_light-ya_poseo';
    					$this->Session->write('Cartele.tipo', 'front_light');
    					$this->Session->write('Cartele.soporte', 'ya_poseo');
    					
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.mantenimiento', 1);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    							
    							case "sin_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.mantenimiento', 0);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    					}
    				}
    				break;
    				
    		}
        }
//      
        $cartel_array = array ("Cartele" => $this->Session->read('Cartele'));
        $session = $this->Session->read();
        print_r($session);
        //print_r($cartel_array);
        //$this->Cartele->save($cartel_array);
    
    } 
    
public function adhesivos($soporte = null , $luminosidad_mantenimiento = null){
    	
        
        
        if( $soporte == null ){ // Esto quiere decir que se estan en el URL /carteles/frontlight
        	
        	$this->layout = 'layout_carteles_adhesivos';
        	$this->Session->write('Cartele.tipo', 'adhesivos');
			   
        } // aca se emmpiezan a parsear el unico parametro que se manda de los views, llega como un string la configuracion. Cada configuracion es bien descriptiva. 
        else{
    		switch ($soporte){
    		
    			case "sobre_pared":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_adhesivo-sobre_pared';
    					$this->Session->write('Cartele.tipo', 'adhesivos');
    					$this->Session->write('Cartele.soporte', 'sobre_pared');
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_adhesivos-sobre_pared-con_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivos');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.luminosidad', 1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_adhesivos-sobre_pared-sin_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivos');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.luminosidad', 0);
    							break;
    					}
    				}
    				break;

    				
    			case "sobre_poste":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_adhesivos-sobre_poste';
    					$this->Session->write('Cartele.tipo', 'adhesivos');
    					$this->Session->write('Cartele.soporte', 'sobre_poste');
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_adhesivos-sobre_poste-con_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivos');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.luminosidad', 1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_adhesivos-sobre_poste-sin_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivos');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.luminosidad', 0);
    							break;
    					}
    				}
    				break;
    				
    				
    				case "ya_poseo":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_adhesivos-ya_poseo';
    					$this->Session->write('Cartele.tipo', 'adhesivos');
    					$this->Session->write('Cartele.soporte', 'ya_poseo');
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_adhesivos-ya_poseo-con_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivos');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.luminosidad', 1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_adhesivos-ya_poseo-sin_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivos');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.luminosidad', 0);
    							break;
    					}
    				}
    				break;
    				
    		}
        }
//      
        $cartel_array = array ("Cartele" => $this->Session->read('Cartele'));
        print_r($cartel_array);
        $this->Cartele->save($cartel_array);
    
    } 
       
    

    //**************************
    //TIPO
    ///***************************
    
    

//    //**************************
//    //SOPORTE
//    ///***************************
//    public function sobre_pared(){
//    	
//        $this->layout = 'layout_carteles_sobre_pared';
//    	$this->Session->write('Cartele.soporte', 'sobre_pared');
//        print_r($this->Session->read('Cartele'));
//    
//    } 
//    
//	public function sobre_poste(){
//    	
//        $this->layout = 'layout_carteles_sobre_poste';
//    	$this->Session->write('Cartele.soporte', 'sobre_poste');
//        print_r($this->Session->read('Cartele'));
//
//	}
//    
//	public function ya_poseo(){
//    	
//        $this->layout = 'layout_carteles_ya_poseo';
//    	$this->Session->write('Cartele.soporte', 'ya_poseo');
//        print_r($this->Session->read('Cartele'));
//
//	}
//    //**************************
//    //SOPORTE
//    ///***************************
//    
//    
//    
//    
//    
//    //**************************
//    //LUMINOSIDAD
//    ///***************************
//    public function luminosidad_si(){
//    	  	
//        $this->layout = 'layout_carteles_luminosidad_si';
//    	$this->Session->write('Cartele.luminosidad', 1);
//        print_r($this->Session->read('Cartele'));
//        $datos = array ("Cartele" => $this->Session->read('Cartele'));
//        $this->Cartele->save($datos);
//
//    } 
//    
//	public function luminosidad_no(){
//    	
//        $this->layout = 'layout_carteles_luminosidad_no';
//    	$this->Session->write('Cartele.luminosidad', 0);
//        print_r($this->Session->read('Cartele'));
//        $datos = array ("Cartele" => $this->Session->read('Cartele'));
//        $this->Cartele->save($datos);
//
//	}
//    //**************************
//    //LUMINOSIDAD
//    ///***************************
//    
//    
//    
//    
//    
//    
//    
//    //**************************
//    //MANTENIMIENTO
//    ///***************************
//    public function mantenimiento_si(){
//    	
//        $this->layout = 'layout_carteles_mantenimiento_si';
//    	$this->Session->write('Cartele.mantenimiento', 1);
//        print_r($this->Session->read('Cartele'));
//        $datos = array ("Cartele" => $this->Session->read('Cartele'));
//        $this->Cartele->save($datos);
//
//    } 
//    
//	public function mantenimiento_no(){
//    	
//        $this->layout = 'layout_carteles_mantenimiento_no';
//    	$this->Session->write('Cartele.mantenimiento', 0);
//        print_r($this->Session->read('Cartele'));
//        $datos = array ("Cartele" => $this->Session->read('Cartele'));
//        $this->Cartele->save($datos);
//
//	}
//    //**************************
//    //MANTENIMIENTO
//    ///***************************





}	