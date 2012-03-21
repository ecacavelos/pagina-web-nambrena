<?php
class CartelesController extends AppController {
	
    public $name = 'Carteles';
    public $helpers = array('Html', 'Form');
   // public $uses = array('Presupuesto', 'Cartele');
    
	
	    
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
        //print_r($cartel_array);
        //$this->Cartele->save($cartel_array);
    
    } 
    
public function adhesivos($soporte = null , $luminosidad_mantenimiento = null){
    	
        
        
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
		    					$this->layout = 'layout_carteles_adhesivo-sobre_pared-con_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.luminosidad', 1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_adhesivo-sobre_pared-sin_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
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
		    					$this->layout = 'layout_carteles_adhesivo-sobre_poste-con_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.luminosidad', 1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_adhesivo-sobre_poste-sin_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
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
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_adhesivo-ya_poseo-con_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.luminosidad', 1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_adhesivo-ya_poseo-sin_luz';
		    					$this->Session->write('Cartele.tipo', 'adhesivo');
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
        $this->Cartele->save($cartel_array);
    
    } 
       
public function back_light($soporte = null , $luminosidad_mantenimiento = null){
     
    	if( $soporte == null ){ // Esto quiere decir que se estan en el URL /carteles/back_light
        	
        	$this->layout = 'layout_carteles_back_light';
        	$this->Session->write('Cartele.tipo', 'back_light');
			   
        }
    else{
    		switch ($soporte){
    		
    			case "sobre_pared":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_back_light-sobre_pared';
    					$this->Session->write('Cartele.tipo', 'back_light');
    					$this->Session->write('Cartele.soporte', 'sobre_pared');
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "una_cara":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.cara', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    							
    							case "doble_cara":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_pared');
		    					$this->Session->write('Cartele.cara', 2);
		    					$this->Session->write('Cartele.mantenimiento', -1);
		    					$this->Session->write('Cartele.luminosidad', -1);
		    					break;
    					}
    				}
    				break;

    				
    			case "sobre_poste":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_back_light-sobre_poste';
    					$this->Session->write('Cartele.tipo', 'back_light');
    					$this->Session->write('Cartele.soporte', 'sobre_poste');
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.luminosidad', 1);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    							break;
    							
    							case "sin_luz":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'sobre_poste');
		    					$this->Session->write('Cartele.luminosidad', 0);
		    					$this->Session->write('Cartele.mantenimiento', -1);
    							break;
    					}
    				}
    				break;
    				
    				
    				case "ya_poseo":
    				if ($luminosidad_mantenimiento == null){
    					
    					$this->layout = 'layout_carteles_back_light-ya_poseo';
    					$this->Session->write('Cartele.tipo', 'back_light');
    					$this->Session->write('Cartele.soporte', 'ya_poseo');
    					
    					
    				}
    				else{
    					switch ($luminosidad_mantenimiento){
    						
     		 				case "con_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.mantenimiento', 1);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    							
    							case "sin_mantenimiento":
		    					$this->layout = 'layout_carteles_elegir_medida';
		    					$this->Session->write('Cartele.tipo', 'back_light');
		    					$this->Session->write('Cartele.soporte', 'ya_poseo');
		    					$this->Session->write('Cartele.mantenimiento', 0);
		    					$this->Session->write('Cartele.luminosidad', -1);
    							break;
    					}
    				}
    				break;
    				
    		}
        }
        
    
    
    }



}	