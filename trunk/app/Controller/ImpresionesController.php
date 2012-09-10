<?php
class ImpresionesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'front_light', 'back_light', 'adhesivo', 'microperforado', 'ficha', 'generate_pdf');
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
	 	

	  	
	  	if ($this->request->is('ajax')){
		//MAIL
		if ($this->_sendMail()){ // SE ENVIO CORRECTAMENTE
		
		}
		else{ // OCURRIO UN ERROR
		
		}
	}
	else
	{
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
      		if (array_key_exists('pickup_x',$this->request->data)){//PICKUP
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
	
protected function _sendMail(){

		//1. SE OBTIENEN LOS DATOS DE LOS PRODUCTOS DE LA VARIABLE DE SESION.
		//2. SE PREPARA EL MENSAJE DEL MAIL.
		//3. SE CONFIGURA EL MAILL Y SE MANDA.

		$datos = $this->Session->read(); // VARIABLE SESSION.
		Configure::load('nambrena_config'); // Se leen los datos de configuracion de la aplicacion. app/nambrena_config.php
		$producto_seleccionado = null; // Variable en la que se va a ir cargando como un string, la configuracion del producto. Ej -> frontLight_sobrePared_sinLuz, lo cual sirve para traer el precio
										// por metro cuadrado del archivo de configuracion.
		

		//PRODUCTO
		if ($datos['Cartele'] != null){

			$producto = 'Cartel';
		}
		if ($datos['Corporeo'] != null){
				
			$producto = 'Corporeo';
		}
		if ($datos['Impresione'] != null){
				
			$producto = 'Impresion';
		}
		if ($datos['Vinilo'] != null){
				
			$producto = 'Vinilo';
		}
		/////////////

		// Se obtienen el tipo, soporte, luminosidad y mantenimiento.
		global $tipo, $soporte , $mantenimiento, $luminosidad, $cara, $envio;

		if ($datos['Cartele'] != null){ // Esto significa que el producto es un cartel

			
			if ($datos['Cartele']['tipo'] == "front_light"){
				$tipo =  "Front Light";
				$producto_seleccionado = "frontLight";
			}
			if ($datos['Cartele']['tipo'] == "back_light"){
				$tipo =  "Back Light";
				$producto_seleccionado = "backLight";
			}
			if ($datos['Cartele']['tipo'] == "adhesivo"){
				$tipo =  "Adhesivo";
				$producto_seleccionado = "adhesivo";
			}
				
				
				
			if ($datos['Cartele']['soporte'] == "sobre_pared"){
				$soporte =  "Sobre pared";
			}
			if ($datos['Cartele']['soporte'] == "sobre_poste"){
				$soporte =  "Sobre poste";
			}
			if ($datos['Cartele']['soporte'] == "ya_poseo"){
				$soporte =  "Ya posee";
			}
				
				
			if ($datos['Cartele']['luminosidad'] == 0){
				$luminosidad =  "Sin luz";
			}
			if ($datos['Cartele']['luminosidad'] == 1){
				$luminosidad =  "Con luz";
			}
				
				
			if ($datos['Cartele']['mantenimiento'] == 0){
				$mantenimiento =  "Sin mantenimiento";
			}
			if ($datos['Cartele']['mantenimiento'] == 1){
				$mantenimiento =  "Con mantenimiento";
			}
		
			if ($datos['Cartele']['cara'] == "una_cara"){
				$cara =  "Una cara";
			}
			if ($datos['Cartele']['cara'] == "doble_cara"){
				$cara =  "Doble cara";
			}
			$envio = $datos['Cartele']['tipoEnvio']; //TIPO DE ENVIO
		}
		else if ($datos['Impresione'] != null){
			if ($datos['Impresione']['tipo'] == "Front light"){
				$tipo =  "Front Light";
				$producto_seleccionado = "frontLight";
			}
			if ($datos['Impresione']['tipo'] == "Back Light"){
				$tipo =  "Back Light";
				$producto_seleccionado = "backLight";
			}
			if ($datos['Impresione']['tipo'] == "Adhesivo"){
				$tipo =  "Adhesivo";
				$producto_seleccionado = "adhesivo";
			}
			if ($datos['Impresione']['tipo'] == "Microperforado"){
				$tipo =  "Microperforado";
				$producto_seleccionado = "microperforado";
			}
			$envio = $datos['Impresione']['tipoEnvio']; //TIPO DE ENVIO
		}
		elseif ($datos['Vinilo'] != null){
			//TODO: ESTABLECER TIPO
		}
	  
		
		
		
		//MENSAJE
		$mensaje = 'Estimado/a '.$this->request->data['nombre'].":"."\n\nHemos regitrado su pedido. A continuacion se encuentra el presupuesto solicitado\n\n"."Producto: ".$producto."\nTipo: ".$tipo;

				
		// TIPO DE ENVIO
		if ($envio=="colocado"){
			$mensaje = $mensaje."\nInstalacion: Colocado";
		}
		if ($envio=="pickup"){
			$mensaje = $mensaje."\nInstalacion: Lo pasas a buscar";
		}
		if ($envio=="envio"){
			$mensaje = $mensaje."\nInstalacion: Te lo enviamos";
		}
			
			
		//PRECIO
		
		/******************************************************************************
		 * Primero se leen todos los valores involucrados en los precios de los productos
		 * *******************************************************************************/
		$altura_factor = Configure::read('Altura.factor');
		$altura_limite = Configure::read('Altura.limite');
		$precio_poste = Configure::read('Poste.precio_m2');
		$precio_reflector = Configure::read('Cartel.reflector_precio');
		$factor_colocacion = Configure::read('Cartel.instalacion_factor');
		$ancho = $datos['ancho'];
		$alto = $datos['alto'];		
		$precio_producto_metro = Configure::read($producto.'.'.$producto_seleccionado); // Se trae el costo del archivo de configuracion
		$precio_producto_metro_lona = Configure::read($producto.'.'.$producto_seleccionado.'_LONA'); // Se trae el costo del archivo de configuracion 
		
		
		/***************************************************************************/
		/***************************************************************************/
		/*********************** Calcular el precio teniendo todos****************** 
		 * ************************los datos involucrados****************************/
		/***************************************************************************/
		/***************************************************************************/
		if ($producto == 'Cartel'){  //CARTEL
			if ($soporte == "Sobre poste"){  //CARTEL - SOBRE POSTE
				if ($luminosidad ==  "Con luz"){  //CARTEL - SOBRE POSTE - CON REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)){
						if ($envio == 'pickup' ) //CARTEL - SOBRE POSTE - CON REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste + ($ancho*$precio_reflector))*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE POSTE - CON REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste + ($ancho*$precio_reflector))*$altura_factor,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
					else{
						if ($envio == 'pickup' ) //CARTEL - SOBRE POSTE - CON REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste + ($ancho*$precio_reflector))*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE POSTE - CON REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste + ($ancho*$precio_reflector)),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
				}
				else if ($luminosidad ==  "Sin luz"){ //CARTEL - SOBRE POSTE - SIN REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)){
						if ($envio == 'pickup' ) //CARTEL - SOBRE POSTE - SIN REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste)*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE POSTE - SIN REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste)*$altura_factor,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
					else{
						if ($envio == 'pickup' ) //CARTEL - SOBRE POSTE - SIN REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste)*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE POSTE - SIN REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + $precio_poste),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
				}
			}
			else if( $soporte == "Sobre pared"){ //CARTEL - SOBRE PARED
				if ($luminosidad ==  "Con luz"){  //CARTEL - SOBRE PARED - CON REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)){
						if ($envio == 'pickup' ) //CARTEL - SOBRE PARED - CON REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + ($ancho*$precio_reflector))*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE PARED - CON REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + ($ancho*$precio_reflector))*$altura_factor,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
					else{
						if ($envio == 'pickup' ) //CARTEL - SOBRE PARED - CON REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + ($ancho*$precio_reflector))*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE PARED - CON REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro + ($ancho*$precio_reflector)),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
				}
				else if ($luminosidad ==  "Sin luz"){ //CARTEL - SOBRE PARED - SIN REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)){
						if ($envio == 'pickup' ) //CARTEL - SOBRE PARED - SIN REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro)*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE PARED - SIN REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro)*$altura_factor,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
					else{
						if ($envio == 'pickup' ) //CARTEL - SOBRE PARED - SIN REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro)*$factor_colocacion,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
						else //CARTEL - SOBRE PARED - SIN REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
						$precio = number_format(($ancho*$alto*$precio_producto_metro),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
					}
				}
			}
			else if ( $soporte == "Ya posee"){
				if ($mantenimiento ==  "Sin mantenimiento"){  //CARTEL - YA POSEE - SIN MANTENIMIENTO
					$precio = number_format(($ancho*$alto*$precio_producto_metro_lona),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
				}
				else if ($mantenimiento ==  "Con mantenimiento"){ //CARTEL - YA POSEE - CON MANTENIMIENTO
					$precio = "Precio no disponible";
				}
			}
		}
		else if ($producto == 'Corporeo'){ // CORPOREOS
			
			//TODO: TODA LA LOGICA PARA LOS CORPOREOS. EN LA SIGUIENTE VERSION.
		}
		else if ($producto == 'Impresion'){ // IMPRESION
			
			$precio = number_format(($ancho*$alto*$precio_producto_metro),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
		}
		else if ($producto == 'Vinilo'){ // VINILO
			
			//TODO: TODA LA LOGICA PARA LOS CORPOREOS. EN LA SIGUIENTE VERSION.
		}

	/***************************************************************************/ 
	/***************************************************************************/
		
		$precio = $precio.' Gs.'; //PRECIO
		$mensaje = $mensaje."\nPrecio: ".$precio; //MENSAJE
			

		

			
		/***************************************************************************/
		/***************************************************************************/
		/***********************DATOS PARA DEBUGGEAR****************************/
		/***************************************************************************/
		/***************************************************************************/
		//print_r($this->request->data);echo "\n";
		//print_r($datos);
		//echo "\n\nEnvio: ".$envio. "soporte: ". $soporte. "mantenimiento: ".$mantenimiento."luminosidad: ".$luminosidad."cara: ".$cara;
		
		
		
		/***************************************************************************/
		/***************************************************************************/
		/***********************LOGICA DE ENVIO DE MAILS****************************/
		/***************************************************************************/
		/***************************************************************************/
		//CONFIGURACION
		//MAIL
		App::uses('CakeEmail', 'Network/Email');
		$servidor_mail='smtpcbi'; // Los dos mails se envian DESDE $servidor_mail que esta especificado en Conf/email.php
		$correo_empresa_destinataria = 'test@cbi.com.py';
		
		//MAIL PARA EL LA EMPRESA
		//$email = new CakeEmail($servidor_mail);
		//$email->to($correo_empresa_destinataria);
		//$email->subject('Mensaje de un usuario a traves de la pagina');
		//$email->send('fadfasfasdf');
		//MAIL PARA EL CLIENTE
		$email = new CakeEmail($servidor_mail);
		$email->to($this->request->data['email']); // Destinatario
		$email->subject('Gracias por contactarnos!'); // Subject
		$email->send($mensaje);
	
	
		return 1;

}

public function generate_pdf() {
	
	 	$this->layout = 'pdf'; //this will use the pdf.ctp layout 
       
        
		$this->render(); 

}
    
}	