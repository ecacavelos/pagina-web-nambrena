<?php
class AdminsController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('index', 'updateconfig');
	}

	public $helpers = array('Html', 'Form');
	public $components = array('Session');
	public $name = 'Admins';

	public function index() {
		$this->layout = 'layout_admin';

		if ($this->Auth->user('id')) {
			$this->set('logeado', '1');
		} else {
			$this->set('logeado', '0');
		}

		Configure::load('nambrena_config');

		if ($this->request->is('post')) {
			$this->set('testingvar', '22');

			$datosrequest = $this->request->data;

			Configure::write('Poste.precio_m2', $datosrequest['admins']['a001']);
			Configure::write('Altura.factor', $datosrequest['admins']['a002']);
			Configure::write('Altura.limite', $datosrequest['admins']['a003']);

			Configure::write('Cartel.reflector_precio', $datosrequest['admins']['a004']);
			Configure::write('Cartel.instalacion_factor', $datosrequest['admins']['a005']);
			Configure::write('Cartel.frontLight', $datosrequest['admins']['a006']);
			Configure::write('Cartel.backLight', $datosrequest['admins']['a007']);
			Configure::write('Cartel.adhesivo', $datosrequest['admins']['a008']);
			Configure::write('Cartel.frontLight_LONA', $datosrequest['admins']['a009']);
			Configure::write('Cartel.backLight_LONA', $datosrequest['admins']['a010']);
			Configure::write('Cartel.adhesivo_LONA', $datosrequest['admins']['a011']);

			Configure::write('Impresion.frontLight', $datosrequest['admins']['a012']);
			Configure::write('Impresion.backLight', $datosrequest['admins']['a013']);
			Configure::write('Impresion.adhesivo', $datosrequest['admins']['a014']);
			Configure::write('Impresion.microperforado', $datosrequest['admins']['a015']);

			Configure::dump('nambrena_config.php', 'default', array('Poste', 'Altura', 'Cartel', 'Impresion'));

		} else {
			$this->set('testingvar', '33');
		}

		$this->set('preciom2_poste', Configure::read('Poste.precio_m2'));
		$this->set('factor_altura', Configure::read('Altura.factor'));
		$this->set('limite_altura', Configure::read('Altura.limite'));

		$this->set('cartel_reflectorprecio', Configure::read('Cartel.reflector_precio'));
		$this->set('cartel_instalacionfactor', Configure::read('Cartel.instalacion_factor'));
		$this->set('cartel_frontlight', Configure::read('Cartel.frontLight'));
		$this->set('cartel_backlight', Configure::read('Cartel.backLight'));
		$this->set('cartel_adhesivo', Configure::read('Cartel.adhesivo'));
		$this->set('cartel_frontlight_lona', Configure::read('Cartel.frontLight_LONA'));
		$this->set('cartel_backlight_lona', Configure::read('Cartel.backLight_LONA'));
		$this->set('cartel_adhesivo_lona', Configure::read('Cartel.adhesivo_LONA'));

		$this->set('impresion_frontlight', Configure::read('Impresion.frontLight'));
		$this->set('impresion_backlight', Configure::read('Impresion.backLight'));
		$this->set('impresion_adhesivo', Configure::read('Impresion.adhesivo'));
		$this->set('impresion_microperforado', Configure::read('Impresion.microperforado'));

	}

}
?>