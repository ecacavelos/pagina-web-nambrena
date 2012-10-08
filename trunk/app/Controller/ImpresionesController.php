<?php
class ImpresionesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'front_light', 'back_light', 'adhesivo', 'microperforado', 'ficha', 'generate_pdf');
	}

	public $name = 'Impresiones';
	public $helpers = array('Html', 'Form');

	public function index() {

		$this->Session->write('Cartele', null);
		$this->Session->write('Corporeo', null);
		$this->Session->write('Vinilo', null);

		$this->layout = 'layout_impresiones';
		//$cartel_array = array ("Cartele" => $this->Session->read());
		//print_r($cartel_array);

	}

	public function front_light() {

		$this->Session->write('Impresione.tipo', 'Front light');

		$this->Session->write('Cartele', null);
		$this->Session->write('Corporeo', null);
		$this->Session->write('Vinilo', null);

		$this->layout = 'layout_impresiones_elegir_medida';
		
		$cartel_array = $this->Session->read();
		$this->set('array_datos', $cartel_array);

	}

	public function back_light() {

		$this->Session->write('Impresione.tipo', 'Back light');

		$this->Session->write('Cartele', null);
		$this->Session->write('Corporeo', null);
		$this->Session->write('Vinilo', null);

		$this->layout = 'layout_impresiones_elegir_medida';
		
		$cartel_array = $this->Session->read();
		$this->set('array_datos', $cartel_array);

	}

	public function adhesivo() {

		$this->Session->write('Impresione.tipo', 'Adhesivo');

		$this->Session->write('Cartele', null);
		$this->Session->write('Corporeo', null);
		$this->Session->write('Vinilo', null);

		$this->layout = 'layout_impresiones_elegir_medida';
		
		$cartel_array = $this->Session->read();
		$this->set('array_datos', $cartel_array);

	}

	public function microperforado() {

		$this->Session->write('Impresione.tipo', 'Microperforado');

		$this->Session->write('Cartele', null);
		$this->Session->write('Corporeo', null);
		$this->Session->write('Vinilo', null);

		$this->layout = 'layout_impresiones_elegir_medida';
		
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
			$this->layout = 'layout_presupuestos_ingresar_datos';
			$this->Session->write('Cartele', null);
			$this->Session->write('Corporeo', null);
			$this->Session->write('Vinilo', null);

			// Se setea el layout para presentar el formulario antes de generar el presupuesto.

			// Se obtienen el ancho y alto a partir del formulario en layout_carteles_elegir_medida.ctp
			$this->Session->write('ancho', $this->request->data['ancho']);
			$this->Session->write('alto', $this->request->data['alto']);

			// Se setea el tipo de envio que eligio el usuario.
			if (array_key_exists('envio_x', $this->request->data)) {//COLOCADO
				$this->Session->write('Impresione.tipoEnvio', 'envio');
			}
			// Se setea el tipo de envio que eligio el usuario.
			if (array_key_exists('pickup_x', $this->request->data)) {//PICKUP
				$this->Session->write('Impresione.tipoEnvio', 'pickup');
			}

			// IMPRESION DE LOS DATOS PARA DEBUGGEAR.
			//$datos = $this->request->query;
			//print_r($datos);
			//$datos2 = $this->request->data;
			//print_r($datos2);
			//$cartel_array = $this->Session->read();
			//print_r($cartel_array);

		}
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
		global $tipo, $soporte, $mantenimiento, $luminosidad, $cara, $envio;

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
			}
			if ($datos['Cartele']['soporte'] == "sobre_poste") {
				$soporte = "Sobre poste";
			}
			if ($datos['Cartele']['soporte'] == "ya_poseo") {
				$soporte = "Ya posee";
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
			if ($datos['Impresione']['tipo'] == "Back light") {
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
			$envio = $datos['Impresione']['tipoEnvio'];
			//TIPO DE ENVIO
		} elseif ($datos['Vinilo'] != null) {
			//TODO: ESTABLECER TIPO
		}

		//MENSAJE
		$mensaje = 'Estimado/a ' . $this->request->data['nombre'] . ":" . "\n\nHemos regitrado su pedido. A continuacion se encuentra el presupuesto solicitado:\n\n" . "Producto: " . $producto . "\nAlto: ".$datos['alto']." metros". "\nAncho: ".$datos['ancho']." metros". "\nTipo: " . $tipo;
		
		// TIPO DE ENVIO
		if ($envio == "colocado") {
			$mensaje = $mensaje . "\nInstalacion: Colocado";
		}
		if ($envio == "pickup") {
			$mensaje = $mensaje . "\nInstalacion: Lo pasas a buscar";
		}
		if ($envio == "envio") {
			$mensaje = $mensaje . "\nInstalacion: Te lo enviamos";
		}

		//PRECIO
		
		
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

		/*********************************************************************************
		 * Primero se leen todos los valores involucrados en los precios de los productos
		 *********************************************************************************/
		$ancho = $datos['ancho'];
		$alto = $datos['alto'];
		$precio_producto_metro = Configure::read($producto . '.' . $producto_seleccionado);
		
		/***************************************************************************/
		/*********************** Calcular el precio teniendo todos *****************/
		/************************* los datos involucrados **************************/
		/***************************************************************************/
		//FORMULA UNICA: (((ancho X alto X tipo_cartel) + (ancho X largo X precio_poste_m2) + (ancho X largo X precio_reflector_m2))*altura_factor*factor_colocacion)*si_ya_poseo+(alto X largo X costo_mantenimiento*si_con_mantenimiento)
		$precio = number_format(($ancho * $alto * $precio_producto_metro*$factor_colocacion),
								0, '.', '.');

		/***************************************************************************/
		/***************************************************************************/

		$precio = $precio . ' Gs.';
		//PRECIO
		$mensaje = $mensaje . "\nPrecio: " . $precio;
		//MENSAJE

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
		$servidor_mail = 'smtpcbi';
		// Los dos mails se envian DESDE $servidor_mail que esta especificado en Conf/email.php
		$correo_empresa_destinataria = 'test@cbi.com.py';

		//MAIL PARA EL LA EMPRESA
		//$email = new CakeEmail($servidor_mail);
		//$email->to($correo_empresa_destinataria);
		//$email->subject('Mensaje de un usuario a traves de la pagina');
		//$email->send('fadfasfasdf');
		//MAIL PARA EL CLIENTE
		$email = new CakeEmail($servidor_mail);
		$email->to($this->request->data['email']);
		// Destinatario
		$email->subject('Gracias por contactarnos!');
		// Subject
		$email->send($mensaje);

		return 1;

	}

	public function generate_pdf() {
		$this->layout = 'pdf';
		//this will use the pdf.ctp layout
		$this->render();
	}

}
