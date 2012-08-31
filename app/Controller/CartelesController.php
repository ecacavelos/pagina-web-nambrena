<?php
class CartelesController extends AppController {
	
    public $name = 'Carteles';
    public $helpers = array('Html', 'Form');
    
	
	    
	 public function index() {
	        
	        $this->layout = 'layout_carteles';
	        $this->set('carteles_actuales', $this->Cartele->find('all'));
//	        $cartel_array = array ("Cartele" => $this->Session->read());
//          print_r($cartel_array);
			   
	       
	    }

    
    
    //**************************
    //TIPO
    ///**************************
public function front_light($soporte = null , $luminosidad_mantenimiento = null){
    	
        
        $this->Session->write('Corporeo',null);
        $this->Session->write('Impresione',null);
        $this->Session->write('Vinilo',null);
        
        
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
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.luminosidad', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    						break;
    							
    						case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.cara', -1);
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
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.luminosidad', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    						break;
    							
    						case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.cara', -1);
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
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', 1);
		    					$this->Session->write('Cartele.luminosidad', -1);
    						break;
    							
    						case "sin_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'front_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', 0);
		    					$this->Session->write('Cartele.luminosidad', -1);
    						break;
    					}
    				}
    				break;
    				
    		}
        }
        
//      
        $cartel_array = $this->Session->read();
//        print_r($cartel_array);
//        $datos = $this->request->query;
//        print_r($datos);
//        
        //$this->Cartele->save($cartel_array);
    
    } 
    
public function adhesivos($soporte = null , $luminosidad_mantenimiento = null){    	
        
        $this->Session->write('Corporeo',null);
        $this->Session->write('Impresione',null);
        $this->Session->write('Vinilo',null);
        $this->Session->write('Cartele.mantenimiento', -1);
        $this->Session->write('Cartele.luminosidad', -1);
        
        if( $soporte == null ){ // Esto quiere decir que se estan en el URL /carteles/frontlight
        	
        	$this->layout = 'layout_carteles_adhesivo';
        	$this->Session->write('Cartele.tipo', 'adhesivo');
			   
        } // aca se emmpiezan a parsear el unico parametro que se manda de los views, llega como un string la configuracion. Cada configuracion es bien descriptiva. 
        else{
    		switch ($soporte){
    		
    			case "sobre_pared":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_adhesivo-sobre_pared';
    					$this->Session->write('Cartele.tipo', 'adhesivo');
    					$this->Session->write('Cartele.soporte', 'sobre_pared');
    				}
    				else{
    					switch ($luminosidad_mantenimiento){    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
		    					$this->Session->write('Cartele.luminosidad', 1);
							break;
    							
    						case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
		    					$this->Session->write('Cartele.luminosidad', 0);
		    				break;
    					}
    				}
    				break;

    				
    			case "sobre_poste":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_adhesivo-sobre_poste';
    					$this->Session->write('Cartele.tipo', 'adhesivo');
    					$this->Session->write('Cartele.soporte', 'sobre_poste');
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
		    					$this->Session->write('Cartele.luminosidad', 1);
							break;
    							
    						case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
		    					$this->Session->write('Cartele.luminosidad', 0);
							break;
    					}
    				}
    				break;    				
    				
    				case "ya_poseo":
    				if ($luminosidad_mantenimiento == null){    					
    					$this->layout = 'layout_carteles_adhesivo-ya_poseo';
    					$this->Session->write('Cartele.tipo', 'adhesivo');
    					$this->Session->write('Cartele.soporte', 'ya_poseo');    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){    						
     		 				case "sin_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', 0);
		    					$this->Session->write('Cartele.luminosidad', -1);
							break;
    							
							case "con_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', 1);
		    					$this->Session->write('Cartele.luminosidad', -1);
		    				break;
    					}
    				}
    				break;
    				
    		}
        }
      
       // $cartel_array = array ("Cartele" => $this->Session->read('Cartele'));
        //$this->Cartele->save($cartel_array);
    
    } 
       
public function back_light($soporte = null , $caras_mantenimiento = null){
     
    	
		$this->Session->write('Corporeo',null);
        $this->Session->write('Impresione',null);
        $this->Session->write('Vinilo',null);
        $this->Session->write('Cartele.mantenimiento', -1);
        $this->Session->write('Cartele.luminosidad', -1);
        
        
		if( $soporte == null ){ // Esto quiere decir que se estan en el URL /carteles/back_light
        	
        	$this->layout = 'layout_carteles_back_light';
        	$this->Session->write('Cartele.tipo', 'back_light');
			   
        }
    	else{
    		switch ($soporte){
    		
    			case "sobre_pared":
    				if ($caras_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_back_light-sobre_pared';
    					$this->Session->write('Cartele.tipo', 'back_light');
    					$this->Session->write('Cartele.soporte', 'sobre_pared');
    				}
    				else{
    					switch ($caras_mantenimiento){    						
     		 				case "una_cara":
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'back_light');
								$this->Session->write('Cartele.soporte', 'sobre_pared');
								$this->Session->write('Cartele.cara', 'una_cara');
								$this->Session->write('Cartele.mantenimiento', -1);
								$this->Session->write('Cartele.luminosidad', -1);
							break;
							
							case "doble_cara":
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'back_light');
								$this->Session->write('Cartele.soporte', 'sobre_pared');
								$this->Session->write('Cartele.cara', 'doble_cara');
								$this->Session->write('Cartele.mantenimiento', -1);
								$this->Session->write('Cartele.luminosidad', -1);
							break;
    					}
    				}
    				break;

    				
    			case "sobre_poste":
    				if ($caras_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_back_light-sobre_poste';
    					$this->Session->write('Cartele.tipo', 'back_light');
    					$this->Session->write('Cartele.soporte', 'sobre_poste');
    					
    				}
    				else{
    					switch ($caras_mantenimiento){    						
     		 				case "una_cara":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.cara', 'una_cara');
		    					$this->Session->write('Cartele.luminosidad', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    						break;
    							
    						case "doble_cara":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.cara', 'doble_cara');
		    					$this->Session->write('Cartele.luminosidad', 0);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    						break;
    					}
    				}
    				break;
    				
    				
    				case "ya_poseo":
    				if ($caras_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_back_light-ya_poseo';
    					$this->Session->write('Cartele.tipo', 'back_light');
    					$this->Session->write('Cartele.soporte', 'ya_poseo');
    					
    					
    				}
    				else{
    					switch ($caras_mantenimiento){
    						
     		 				case "con_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', 1);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    							
    							case "sin_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.cara', -1);
		    					$this->Session->write('Cartele.mantenimiento', 0);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    					}
    				}
    				break;
    		}
        }
    }

public function ficha(){
	 			
			// Se setea el layout para presentar el formulario antes de generar el presupuesto. 
			$this->layout = 'layout_presupuestos_ingresar_datos';
			
			// Se obtienen el ancho y alto a partir del formulario en layout_carteles_elegir_medida.ctp
			$this->Session->write('ancho', $this->request->data['ancho']);
			$this->Session->write('alto', $this->request->data['alto']);
			$this->Session->write('altura_piso', $this->request->data['altura_piso']);
			
      		// Se setea el tipo de envio que eligio el usuario. 
      		if (array_key_exists('colocado_x',$this->request->data)){//COLOCADO
        		$this->Session->write('Cartele.tipoEnvio', 'colocado');
        	}
			if (array_key_exists('pickup_x',$this->request->data)){//PICKUP
      	  		$this->Session->write('Cartele.tipoEnvio', 'pickup');
      		}
			if (array_key_exists('envio_x',$this->request->data)){//ENVIO
      			$this->Session->write('Cartele.tipoEnvio', 'envio');
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