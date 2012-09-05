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
			
			$foobar = $this->request->data;
			
			Configure::write('Poste.precio_m2',$foobar['admins']['a001']);
			Configure::write('Altura.factor',$foobar['admins']['a002']);
			Configure::write('Altura.limite',$foobar['admins']['a003']);
			
			Configure::write('Cartel.reflector_precio',$foobar['admins']['a004']);
			Configure::write('Cartel.instalacion_factor',$foobar['admins']['a005']);
			Configure::write('Cartel.frontLight',$foobar['admins']['a006']);
			Configure::write('Cartel.backLight',$foobar['admins']['a007']);
			Configure::write('Cartel.adhesivo',$foobar['admins']['a008']);
			Configure::write('Cartel.frontLight_LONA',$foobar['admins']['a009']);
			Configure::write('Cartel.backLight_LONA',$foobar['admins']['a010']);
			Configure::write('Cartel.adhesivo_LONA',$foobar['admins']['a011']);
			
			Configure::write('Impresion.frontLight',$foobar['admins']['a012']);
			Configure::write('Impresion.backLight',$foobar['admins']['a013']);
			Configure::write('Impresion.adhesivo',$foobar['admins']['a014']);
			Configure::write('Impresion.microperforado',$foobar['admins']['a015']);
			
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