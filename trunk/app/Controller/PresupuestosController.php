<?php
class PresupuestosController extends AppController {
	
    public $name = 'Presupuestos';
    public $helpers = array('Html', 'Form');
	public $uses = array('Cartele', 'Corporeo');
    
 	public function index() {
        
       // redireccionar a la pagina princiapl
    }
    
	public function generate_pdf() 
    { 
      
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $nombre = $this->request->data['nombre'];
        $apellido = $this->request->data['apellido'];
        $empresa = $this->request->data['empresa'];
        $email = $this->request->data['email'];
        $telefono = $this->request->data['telefono'];
        $departamento = $this->request->data['departamento'];
        $direccion = $this->request->data['direccion'];
        $horario = $this->request->data['hora_trabajo'];
        
        $this->Session->write('Presupuesto.nombre', $nombre);
        $this->Session->write('Presupuesto.apellido', $apellido);
        $this->Session->write('Presupuesto.empresa', $empresa);
        $this->Session->write('Presupuesto.email', $email);
        $this->Session->write('Presupuesto.telefono', $telefono);
        $this->Session->write('Presupuesto.departamento', $departamento);
        $this->Session->write('Presupuesto.direccion', $direccion);
        $this->Session->write('Presupuesto.horario', $horario);
        
       
        $this->render(); 
    } 

    public function test(){
    
    	$this->layout = 'layout_test';
    	print_r($this->request->data);
    	$cartel_array = $this->Session->read();
        print_r($cartel_array);
    }
}	