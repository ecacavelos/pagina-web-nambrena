<?php
class CartelesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'front_light', 'adhesivos', 'back_light', 'ficha', 'generate_pdf');
	}

	public $helpers = array('Html', 'Form', 'Js');
	public $components = array('Session', 'RequestHandler');
	public $name = 'Carteles';

	public function index() {

		if ($this->Auth->user('id')) {
			$this->set('logeado', '1');
		} else {
			$this->set('logeado', '0');
		}

		$this->layout = 'layout_carteles';
		$this->set('carteles_actuales', $this->Cartele->find('all'));
		//$cartel_array = array ("Cartele" => $this->Session->read());
		//print_r($cartel_array);
	}

	//**************************
	//TIPO
	///**************************
	public function front_light($soporte = null, $luminosidad_mantenimiento = null) {

		$this->Session->write('Corporeo', null);
		$this->Session->write('Impresione', null);
		$this->Session->write('Vinilo', null);

		if ($soporte == null) {// Esto quiere decir que se estan en el URL /carteles/frontlight

			$this->layout = 'layout_carteles_front_light';
			$this->Session->write('Cartele.tipo', 'front_light');

		}// Aca se emmpieza a parsear el unico parametro que se manda de los views, llega como un string la configuracion. Cada configuracion es bien descriptiva.
		else {
			switch ($soporte) {

				case "sobre_pared" :
					if ($luminosidad_mantenimiento == null) {

						$this->layout = 'layout_carteles_front_light-sobre_pared';
						$this->Session->write('Cartele.tipo', 'front_light');
						$this->Session->write('Cartele.soporte', 'sobre_pared');
					} else {
						switch ($luminosidad_mantenimiento) {
							case "con_luz" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'front_light');
								$this->Session->write('Cartele.soporte', 'sobre_pared');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.luminosidad', 1);
								$this->Session->write('Cartele.mantenimiento', -1);
								break;

							case "sin_luz" :
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

				case "sobre_poste" :
					if ($luminosidad_mantenimiento == null) {

						$this->layout = 'layout_carteles_front_light-sobre_poste';
						$this->Session->write('Cartele.tipo', 'front_light');
						$this->Session->write('Cartele.soporte', 'sobre_poste');

					} else {
						switch ($luminosidad_mantenimiento) {
							case "con_luz" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'front_light');
								$this->Session->write('Cartele.soporte', 'sobre_poste');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.luminosidad', 1);
								$this->Session->write('Cartele.mantenimiento', -1);
								break;

							case "sin_luz" :
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

				case "ya_poseo" :
					if ($luminosidad_mantenimiento == null) {

						$this->layout = 'layout_carteles_front_light-ya_poseo';
						$this->Session->write('Cartele.tipo', 'front_light');
						$this->Session->write('Cartele.soporte', 'ya_poseo');

					} else {
						switch ($luminosidad_mantenimiento) {
							case "con_mantenimiento" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'front_light');
								$this->Session->write('Cartele.soporte', 'ya_poseo');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.mantenimiento', 1);
								$this->Session->write('Cartele.luminosidad', -1);
								break;

							case "sin_mantenimiento" :
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

		$cartel_array = $this->Session->read();
		$this->set('array_datos', $cartel_array);
		//print_r($cartel_array);
		//$datos = $this->request->query;
		//print_r($datos);
		//$this->Cartele->save($cartel_array);

	}

	public function adhesivos($soporte = null, $luminosidad_mantenimiento = null) {

		$this->Session->write('Corporeo', null);
		$this->Session->write('Impresione', null);
		$this->Session->write('Vinilo', null);
		$this->Session->write('Cartele.mantenimiento', -1);
		$this->Session->write('Cartele.luminosidad', -1);

		if ($soporte == null) {// Esto quiere decir que se esta en el URL /carteles/frontlight

			$this->layout = 'layout_carteles_adhesivo';
			$this->Session->write('Cartele.tipo', 'adhesivo');

		}// Aca se empieza a parsear el unico parametro que se manda de los views, llega como un string la configuracion. Cada configuracion es bien descriptiva.
		else {
			switch ($soporte) {

				case "sobre_pared" :
					if ($luminosidad_mantenimiento == null) {

						$this->layout = 'layout_carteles_adhesivo-sobre_pared';
						$this->Session->write('Cartele.tipo', 'adhesivo');
						$this->Session->write('Cartele.soporte', 'sobre_pared');
					} else {
						switch ($luminosidad_mantenimiento) {
							case "con_luz" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'adhesivo');
								$this->Session->write('Cartele.soporte', 'sobre_pared');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.mantenimiento', -1);
								$this->Session->write('Cartele.luminosidad', 1);
								break;

							case "sin_luz" :
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

				case "sobre_poste" :
					if ($luminosidad_mantenimiento == null) {

						$this->layout = 'layout_carteles_adhesivo-sobre_poste';
						$this->Session->write('Cartele.tipo', 'adhesivo');
						$this->Session->write('Cartele.soporte', 'sobre_poste');

					} else {
						switch ($luminosidad_mantenimiento) {
							case "con_luz" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'adhesivo');
								$this->Session->write('Cartele.soporte', 'sobre_poste');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.mantenimiento', -1);
								$this->Session->write('Cartele.luminosidad', 1);
								break;

							case "sin_luz" :
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

				case "ya_poseo" :
					if ($luminosidad_mantenimiento == null) {
						$this->layout = 'layout_carteles_adhesivo-ya_poseo';
						$this->Session->write('Cartele.tipo', 'adhesivo');
						$this->Session->write('Cartele.soporte', 'ya_poseo');
					} else {
						switch ($luminosidad_mantenimiento) {
							case "sin_mantenimiento" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'adhesivo');
								$this->Session->write('Cartele.soporte', 'ya_poseo');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.mantenimiento', 0);
								$this->Session->write('Cartele.luminosidad', -1);
								break;

							case "con_mantenimiento" :
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

		$cartel_array = $this->Session->read();
		$this->set('array_datos', $cartel_array);
		//$cartel_array = array ("Cartele" => $this->Session->read('Cartele'));
		//$this->Cartele->save($cartel_array);

	}

	public function back_light($soporte = null, $caras_mantenimiento = null) {

		$this->Session->write('Corporeo', null);
		$this->Session->write('Impresione', null);
		$this->Session->write('Vinilo', null);
		$this->Session->write('Cartele.mantenimiento', -1);
		$this->Session->write('Cartele.luminosidad', -1);

		if ($soporte == null) {// Esto quiere decir que se estan en el URL /carteles/back_light

			$this->layout = 'layout_carteles_back_light';
			$this->Session->write('Cartele.tipo', 'back_light');

		} else {
			switch ($soporte) {

				case "sobre_pared" :
					if ($caras_mantenimiento == null) {

						$this->layout = 'layout_carteles_back_light-sobre_pared';
						$this->Session->write('Cartele.tipo', 'back_light');
						$this->Session->write('Cartele.soporte', 'sobre_pared');
					} else {
						switch ($caras_mantenimiento) {
							case "una_cara" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'back_light');
								$this->Session->write('Cartele.soporte', 'sobre_pared');
								$this->Session->write('Cartele.cara', 'una_cara');
								$this->Session->write('Cartele.mantenimiento', -1);
								$this->Session->write('Cartele.luminosidad', -1);
								break;

							case "doble_cara" :
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

				case "sobre_poste" :
					if ($caras_mantenimiento == null) {

						$this->layout = 'layout_carteles_back_light-sobre_poste';
						$this->Session->write('Cartele.tipo', 'back_light');
						$this->Session->write('Cartele.soporte', 'sobre_poste');

					} else {
						switch ($caras_mantenimiento) {
							case "una_cara" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'back_light');
								$this->Session->write('Cartele.soporte', 'sobre_poste');
								$this->Session->write('Cartele.cara', 'una_cara');
								$this->Session->write('Cartele.luminosidad', -1);
								$this->Session->write('Cartele.mantenimiento', -1);
								break;

							case "doble_cara" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'back_light');
								$this->Session->write('Cartele.soporte', 'sobre_poste');
								$this->Session->write('Cartele.cara', 'doble_cara');
								$this->Session->write('Cartele.luminosidad', -1);
								$this->Session->write('Cartele.mantenimiento', -1);
								break;
						}
					}
					break;

				case "ya_poseo" :
					if ($caras_mantenimiento == null) {

						$this->layout = 'layout_carteles_back_light-ya_poseo';
						$this->Session->write('Cartele.tipo', 'back_light');
						$this->Session->write('Cartele.soporte', 'ya_poseo');

					} else {
						switch ($caras_mantenimiento) {

							case "con_mantenimiento" :
								$this->layout = 'layout_carteles_elegir_medida';
								$this->Session->write('Cartele.tipo', 'back_light');
								$this->Session->write('Cartele.soporte', 'ya_poseo');
								$this->Session->write('Cartele.cara', -1);
								$this->Session->write('Cartele.mantenimiento', 1);
								$this->Session->write('Cartele.luminosidad', -1);
								break;

							case "sin_mantenimiento" :
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

		$cartel_array = $this->Session->read();
		$this->set('array_datos', $cartel_array);

	}

	public function ficha() {

		if ($this->request->is('ajax')) {
			//MAIL
			if ($this->_sendMail()) {// SE ENVIO CORRECTAMENTE

			} else {// OCURRIO UN ERROR

			}
		} else {
			Configure::load('nambrena_config');
			$this->set('limite_altura', Configure::read('Altura.limite'));

			// Se setea el layout para presentar el formulario antes de generar el presupuesto.
			$this->layout = 'layout_presupuestos_ingresar_datos';

			// Se obtienen el ancho y alto a partir del formulario en layout_carteles_elegir_medida.ctp
			$this->Session->write('ancho', $this->request->data['ancho']);
			$this->Session->write('alto', $this->request->data['alto']);
			$this->Session->write('altura_piso', $this->request->data['altura_piso']);

			// Se setea el tipo de envio que eligio el usuario.
			if (array_key_exists('colocado_x', $this->request->data)) {//COLOCADO
				$this->Session->write('Cartele.tipoEnvio', 'colocado');
			}
			if (array_key_exists('pickup_x', $this->request->data)) {//PICKUP
				$this->Session->write('Cartele.tipoEnvio', 'pickup');
			}
			if (array_key_exists('envio_x', $this->request->data)) {//ENVIO
				$this->Session->write('Cartele.tipoEnvio', 'envio');
			}

			//IMPRESION DE LOS DATOS PARA DEBUGGEAR.
			//$datos = $this->request->query;
			//print_r($datos);
			//$datos2 = $this->request->data;
			//print_r($datos2);
			//$cartel_array = $this->Session->read();
			//print_r($cartel_array);

		}

	}

	public function generate_pdf() {

		$this->layout = 'pdf';
		//this will use the pdf.ctp layout
		$this->render();

	}

	protected function _sendMail() {

		//1. SE OBTIENEN LOS DATOS DE LOS PRODUCTOS DE LA VARIABLE DE SESION.
		//2. SE PREPARA EL MENSAJE DEL MAIL.
		//3. SE CONFIGURA EL MAILL Y SE MANDA.

		$datos = $this->Session->read();
		// VARIABLE SESSION.
		Configure::load('nambrena_config');
		// Se leen los datos de configuracion de la aplicacion. app/nambrena_config.php
		$producto_seleccionado = null;
		// Variable en la que se va a ir cargando como un string, la configuracion del producto. Ej -> frontLight_sobrePared_sinLuz, lo cual sirve para traer el precio
		// por metro cuadrado del archivo de configuracion.

		//PRODUCTO
		if ($datos['Cartele'] != null) {
			$producto = 'Cartel';
		}
		if ($datos['Corporeo'] != null) {
			$producto = 'Corporeo';
		}
		if ($datos['Impresione'] != null) {
			$producto = 'Impresion';
		}
		if ($datos['Vinilo'] != null) {
			$producto = 'Vinilo';
		}
		/////////////

		// Se obtienen el tipo, soporte, luminosidad y mantenimiento.
		$tipo=null; $soporte=null; $mantenimiento = null; $luminosidad=null; $cara=null; $envio=null; $sobre_poste_si_no=null; $mantenimiento_si_no=null; $ya_poseo_si_no=null; $pickup_si_no=null;

		if ($datos['Cartele'] != null) {// Esto significa que el producto es un cartel

			if ($datos['Cartele']['tipo'] == "front_light") {
				$tipo = "Front Light";
				$producto_seleccionado = "frontLight";
			}
			if ($datos['Cartele']['tipo'] == "back_light") {
				$tipo = "Back Light";
				$producto_seleccionado = "backLight";
			}
			if ($datos['Cartele']['tipo'] == "adhesivo") {
				$tipo = "Adhesivo";
				$producto_seleccionado = "adhesivo";
			}

			if ($datos['Cartele']['soporte'] == "sobre_pared") {
				$soporte = "Sobre pared";
				$sobre_poste_si_no = 0;
				$ya_poseo_si_no = 1;
			}
			if ($datos['Cartele']['soporte'] == "sobre_poste") {
				$soporte = "Sobre poste";
				$sobre_poste_si_no = 1;
				$ya_poseo_si_no=1;
			}
			if ($datos['Cartele']['soporte'] == "ya_poseo") {
				$soporte = "Ya posee";
				$sobre_poste_si_no = 0;
				$ya_poseo_si_no= 0;
			}

			if ($datos['Cartele']['luminosidad'] == 0) {
				$luminosidad = "Sin luz";
			}
			if ($datos['Cartele']['luminosidad'] == 1) {
				$luminosidad = "Con luz";
			}

			if ($datos['Cartele']['mantenimiento'] == 0) {
				$mantenimiento = "Sin mantenimiento";
			}
			if ($datos['Cartele']['mantenimiento'] == 1) {
				$mantenimiento = "Con mantenimiento";
			}

			if ($datos['Cartele']['cara'] == "una_cara") {
				$cara = "Una cara";
			}
			if ($datos['Cartele']['cara'] == "doble_cara") {
				$cara = "Doble cara";
			}
			$envio = $datos['Cartele']['tipoEnvio']; 
			
			//TIPO DE ENVIO
		} else if ($datos['Impresione'] != null) {
			if ($datos['Impresione']['tipo'] == "Front light") {
				$tipo = "Front Light";
				$producto_seleccionado = "frontLight";
			}
			if ($datos['Impresione']['tipo'] == "Back Light") {
				$tipo = "Back Light";
				$producto_seleccionado = "backLight";
			}
			if ($datos['Impresione']['tipo'] == "Adhesivo") {
				$tipo = "Adhesivo";
				$producto_seleccionado = "adhesivo";
			}
			if ($datos['Impresione']['tipo'] == "Microperforado") {
				$tipo = "Microperforado";
				$producto_seleccionado = "microperforado";
			}
		} elseif ($datos['Vinilo'] != null) {
			//TODO: ESTABLECER TIPO
		}

		//MENSAJE
		$mensaje = 'Estimado/a ' . $this->request->data['nombre'] . ":" . "\n\nHemos regitrado su pedido. A continuación se encuentra el presupuesto solicitado:\n\n" . "Producto: " . $producto . "\nAlto: ".$datos['alto']." metros". "\nAncho: ".$datos['ancho']." metros". "\nTipo: " . $tipo . "\nSoporte: " . $soporte;
		$this->Session->write('PDF.nombre', $this->request->data['nombre']);
		$this->Session->write('PDF.producto', $producto);
		$this->Session->write('PDF.alto', $datos['alto']);
		$this->Session->write('PDF.ancho', $datos['ancho']);
		$this->Session->write('PDF.tipo', $tipo);
		$this->Session->write('PDF.soporte', $soporte);
		$this->Session->write('PDF.limunisidad', $luminosidad);
		$this->Session->write('PDF.mantenimiento', $mantenimiento);
		$this->Session->write('PDF.caras', $cara);
		$this->Session->write('PDF.envio', $envio);
		
		// LUMINOSIDAD CARAS Y MANTENIMIENTO
		if ($datos['Cartele']['luminosidad'] != -1) {
			$mensaje = $mensaje . "\nLuminosidad: " . $luminosidad;
		}
		if ($datos['Cartele']['mantenimiento'] != -1) {
			$mensaje = $mensaje . "\nMantenimiento: " . $mantenimiento;
		}
		if ($datos['Cartele']['cara'] != -1) {
			$mensaje = $mensaje . "\nCaras: " . $cara;
		}

		// TIPO DE ENVIO
		if ($envio == "colocado") {
			$mensaje = $mensaje . "\nInstalación: Colocado";
		}
		if ($envio == "pickup") {
			$mensaje = $mensaje . "\nInstalación: Lo pasas a buscar";
		}
		if ($envio == "envio") {
			$mensaje = $mensaje . "\nInstalación: Te lo enviamos";
		}

		
		/*
		 * *******************
		 * DEFINICION DEL PRECIO!!
		 * *******************
		 * */
		
		/*
		 * 
		 * PRECIO REFLECTORES
		 * 
		 * */
		if ($datos['Cartele']['luminosidad'] == 1) {
				$precio_reflector = Configure::read('Cartel.reflector_precio');
		}
		else{
					$precio_reflector = 0;
		}
		/*
		 * 
		 * PRECIO REFLECTORES
		 * 
		 * */
		
		
		
		/*
		 * 
		 * PICKUP: SE PASA A BUSCAR O NO.
		 * 
		 * */
		if ($envio == 'pickup'){
			$factor_colocacion = Configure::read('Cartel.instalacion_factor'); // se hace el descuento
		}
		else{
			$factor_colocacion = 1; // No se hace el descuento
		}
		/*
		 * 
		 * PICKUP: SE PASA A BUSCAR O NO.
		 * 
		 * */
		
		
		
		
		/*
		 * 
		 * ALTURA DESDE EL PISO
		 * 
		 * */
		if ($datos['altura_piso'] == 1) {
			$altura_factor = Configure::read('Altura.factor'); // se sobrepasa la altura limite
		}
		else{
			$altura_factor = 1;
		}
		/*
		 * 
		 * ALTURA DESDE EL PISO
		 * 
		 * */
		
		
		
		/*
		 * 
		 * POSTE
		 * 
		 * */
		if ($sobre_poste_si_no == 1){
			$precio_poste = Configure::read('Poste.precio_m2');
		}
		else{
			$precio_poste = 0;
		}
				/*
		 * 
		 * POSTE
		 * 
		 * */
		
		
	   	/*
		 * 
		 * MANTENIMIENTO
		 * 
		 * */
		if ($datos['Cartele']['luminosidad'] == 1) {
				$mantenimiento_si_no = 1;
		}
		else{
				$mantenimiento_si_no = 0;
		}
		/*
		 * 
		 * MANTENIMIENTO
		 * 
		 * */
		
		
		$ancho = $datos['ancho'];
		$alto = $datos['alto'];
		$precio_producto_metro = Configure::read($producto . '.' . $producto_seleccionado);
		$precio_producto_metro_mantenimiento = Configure::read($producto . '.' . $producto_seleccionado . '_MANTENIMIENTO');
		
		/***************************************************************************/
		/*********************** Calcular el precio teniendo todos *****************/
		/************************* los datos involucrados **************************/
		/***************************************************************************/
		//FORMULA UNICA: (((ancho X alto X tipo_cartel) + (ancho X largo X precio_poste_m2) + (ancho X largo X precio_reflector_m2))*altura_factor*factor_colocacion)*si_ya_poseo+(alto X largo X costo_mantenimiento*si_con_mantenimiento)
		$precio = number_format((($ancho * $alto * $precio_producto_metro*$altura_factor*$factor_colocacion) + ($ancho * $alto * $precio_poste) + ($ancho * $alto * $precio_reflector))*$ya_poseo_si_no+
								($ancho * $alto * $precio_producto_metro_mantenimiento*$mantenimiento_si_no),
								0, '.', '.');
		
		/*if ($producto == 'Cartel') {//CARTEL
			if ($soporte == "Sobre poste") {//CARTEL - SOBRE POSTE
				if ($luminosidad == "Con luz") {//CARTEL - SOBRE POSTE - CON REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)) {
						if ($envio == 'pickup')//CARTEL - SOBRE POSTE - CON REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste + ($ancho * $precio_reflector)) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE POSTE - CON REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste + ($ancho * $precio_reflector)) * $altura_factor, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					} else {
						if ($envio == 'pickup')//CARTEL - SOBRE POSTE - CON REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste + ($ancho * $precio_reflector)) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE POSTE - CON REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste + ($ancho * $precio_reflector)), 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					}
				} else if ($luminosidad == "Sin luz") {//CARTEL - SOBRE POSTE - SIN REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)) {
						if ($envio == 'pickup')//CARTEL - SOBRE POSTE - SIN REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE POSTE - SIN REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste) * $altura_factor, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					} else {
						if ($envio == 'pickup')//CARTEL - SOBRE POSTE - SIN REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE POSTE - SIN REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + $precio_poste), 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					}
				}
			} else if ($soporte == "Sobre pared") {//CARTEL - SOBRE PARED
				if ($luminosidad == "Con luz") {//CARTEL - SOBRE PARED - CON REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)) {
						if ($envio == 'pickup')//CARTEL - SOBRE PARED - CON REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + ($ancho * $precio_reflector)) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE PARED - CON REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + ($ancho * $precio_reflector)) * $altura_factor, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					} else {
						if ($envio == 'pickup')//CARTEL - SOBRE PARED - CON REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + ($ancho * $precio_reflector)) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE PARED - CON REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro + ($ancho * $precio_reflector)), 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					}
				} else if ($luminosidad == "Sin luz") {//CARTEL - SOBRE PARED - SIN REFLECTOR
					if (($datos['altura_piso'] > $altura_limite)) {
						if ($envio == 'pickup')//CARTEL - SOBRE PARED - SIN REFLECTOR - PASANDO ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE PARED - SIN REFLECTOR -  PASANDO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro) * $altura_factor, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					} else {
						if ($envio == 'pickup')//CARTEL - SOBRE PARED - SIN REFLECTOR - DEBAJO DE ALTURA LIMITE -  PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro) * $factor_colocacion, 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
						else//CARTEL - SOBRE PARED - SIN REFLECTOR -  DEBAJO ALTURA LIMITE - NO PICKUP
							$precio = number_format(($ancho * $alto * $precio_producto_metro), 0, '.', '.');
						// Se formatea el numero con los puntos como separador de miles.
					}
				}
			} else if ($soporte == "Ya posee") {
				if ($mantenimiento == "Sin mantenimiento") {//CARTEL - YA POSEE - SIN MANTENIMIENTO
					$precio = number_format(($ancho * $alto * $precio_producto_metro_lona), 0, '.', '.');
					// Se formatea el numero con los puntos como separador de miles.
				} else if ($mantenimiento == "Con mantenimiento") {//CARTEL - YA POSEE - CON MANTENIMIENTO
					$precio = "Precio no disponible";
				}
			}
		} else if ($producto == 'Corporeo') {// CORPOREOS

			//TODO: TODA LA LOGICA PARA LOS CORPOREOS. EN LA SIGUIENTE VERSION.
		} else if ($producto == 'Impresion') {// IMPRESION

			$precio = number_format(($ancho * $alto * $precio_producto_metro), 0, '.', '.');
			// Se formatea el numero con los puntos como separador de miles.
		} else if ($producto == 'Vinilo') {// VINILO

			//TODO: TODA LA LOGICA PARA LOS CORPOREOS. EN LA SIGUIENTE VERSION.
		}*/

		/***************************************************************************/
		/***************************************************************************/

		$precio = $precio . ' Gs.';
		$this->Session->write('PDF.precio', $precio);
		//PRECIO
		$mensaje = $mensaje . "\nPrecio: " . $precio;
		$mensaje = $mensaje. "\n\n\n--\nDpto. de Ventas - Nambrena";
		//MENSAJE
		
		/***************************************************************************/
		/***************************************************************************/
		/***********************DATOS PARA DEBUGGEAR********************************/
		/***************************************************************************/
		/***************************************************************************/
		//print_r($this->request->data);echo "\n";
		//print_r($datos);
		//echo "\n\nEnvio: ".$envio. "soporte: ". $soporte. "mantenimiento: ".$mantenimiento."luminosidad: ".$luminosidad."cara: ".$cara;
		echo '$precio = ((($ancho * $alto * $precio_producto_metro) + ($ancho * $alto * $precio_poste) + ($ancho * $alto * $precio_reflector))*$altura_factor*$factor_colocacion)*$ya_poseo_si_no+($ancho * $alto * $precio_producto_metro_mantenimiento*$datos["Cartele"]["mantenimiento"]);';
		$array_datos =  '\n ancho: '.$ancho.
			 '\n alto: '. $alto. 
			 '\n precio_producto_metro: '. $precio_producto_metro.
			 '\n precio_poste: '. $precio_poste.
			 '\n precio_reflector: ' .$precio_reflector.
			 '\n altura_factor: '. $altura_factor.
			 '\n factor_colocacion: ' .$factor_colocacion.
			 '\n ya_poseo_si_no: '.	$ya_poseo_si_no.
			 '\n precio_producto_metro_mantenimiento: '. $precio_producto_metro_mantenimiento;
			 '\n datos["Cartele"]["mantenimiento"]: '.$datos['Cartele']['mantenimiento'];
		debug($array_datos);
		//$mensaje = $mensaje. "\n\n".$array_datos;
		/***************************************************************************/
		/***************************************************************************/
		/***********************LOGICA DE ENVIO DE MAILS****************************/
		/***************************************************************************/
		/***************************************************************************/
		//CONFIGURACION
		//MAIL
		App::uses('CakeEmail', 'Network/Email');
		$servidor_mail = 'smtpcbi';
		// Los dos mails se envian DESDE $servidor_mail que esta especificado en Conf/email.php
		$correo_empresa_destinataria = 'test@cbi.com.py';

		//MAIL PARA EL LA EMPRESA
		//** Descomentar loas siguientes lineas por cada mail que se quiera enviar a la empresa. 
		/*$email = new CakeEmail($servidor_mail);
		$email->to("esteban.cacavelos@cbi.com.py");
		$email->subject('Se ha solicitado presupuesto a traves de la WEB');
		$mensaje_empresa= "Se ha solicitado un presupuesto mediante la web. Los datos del usuario son los siguientes:\n\n".
		"Email: ".$this->request->data['email'].
		"\nNombre: ".$this->request->data['nombre'].
		"\nApellido: ".$this->request->data['apellido'].
		"\nEmpresa: ".$this->request->data['empresa'].
		"\nDirección: ".$this->request->data['direccion'].
		"\nCiudad: ".$this->request->data['ciudad'].
		"\nTeléfono: ".$this->request->data['telefono'].
		"\nComentario: ".$this->request->data['comentario'];
		
		$mensaje_empresa=$mensaje_empresa."\n\n El mensaje enviado al cliente es el siguiente: \n\n";
		$mensaje_empresa=$mensaje_empresa."--------------------------------------------------------\n--------------------------------------------------------\n".
		$mensaje.
		"\n--------------------------------------------------------\n--------------------------------------------------------\n";
		$email->send($mensaje_empresa);*/
		
		
		
		//MAIL PARA EL CLIENTE
		$email = new CakeEmail($servidor_mail);
		$email->to($this->request->data['email']);
		// Destinatario
		$email->subject('Gracias por contactarnos!');
		// Subject
		$email->send($mensaje);

		return 1;

	}

}
