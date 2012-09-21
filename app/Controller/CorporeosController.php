<?php
class CorporeosController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'ficha', 'proximamente');
	}

	public $name = 'Corporeos';
	public $helpers = array('Html', 'Form');

	public function index() {
		$this->Session->write('Cartele', null);
		$this->Session->write('Impresione', null);
		$this->Session->write('Vinilo', null);
		$this->layout = 'layout_corporeos_elegir_medida';
		//	        $cartel_array = array ("Cartele" => $this->Session->read());
		//            print_r($cartel_array);
	}

	//**************************
	//TIPO
	///**************************

	public function ficha() {

		$this->Session->write('Cartele', null);
		$this->Session->write('Impresione', null);
		$this->Session->write('Vinilo', null);

		// Se setea el layout para presentar el formulario antes de generar el presupuesto.
		$this->layout = 'layout_presupuestos_ingresar_datos';

		// Se obtienen el ancho y alto a partir del formulario en layout_carteles_elegir_medida.ctp
		$this->Session->write('ancho', $this->request->data['ancho']);
		$this->Session->write('alto', $this->request->data['alto']);

		// Se setea el tipo de envio que eligio el usuario.
		if (array_key_exists('colocado_x', $this->request->data)) {//COLOCADO
			$this->Session->write('Corporeo.tipoEnvio', 'colocado');
		}
		// Se setea el tipo de envio que eligio el usuario.
		if (array_key_exists('no-colocado_x', $this->request->data)) {//COLOCADO
			$this->Session->write('Corporeo.tipoEnvio', 'no-colocado');
		}

		if (array_key_exists('pickup_x', $this->request->data)) {//PICKUP
			$this->Session->write('Corporeo.tipoEnvio', 'pickup');
		}
		if (array_key_exists('envio_x', $this->request->data)) {//ENVIO
			$this->Session->write('Corporeo.tipoEnvio', 'envio');
		}

		//          IMPRESION DE LOS DATOS PARA DEBUGGEAR.
		//    		$datos = $this->request->query;
		//          print_r($datos);
		//      	$datos2 = $this->request->data;
		//      	print_r($datos2);
		//      	$cartel_array = $this->Session->read();
		//          print_r($cartel_array);
	}

	public function proximamente() {
		$this->set('cor_or_vin', 'cor');
		$this->layout = 'layout_proximamente';
	}

}
