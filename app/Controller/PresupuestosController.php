<?php
class PresupuestosController extends AppController {
	
    public $name = 'Presupuestos';
    public $helpers = array('Html', 'Form');
	public $uses = array('Cartele');
    
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
        $ancho = $this->request->data['ancho'];
        $alto = $this->request->data['alto'];
        
        $this->Session->write('Presupuesto.nombre', $nombre);
        $this->Session->write('Presupuesto.apellido', $apellido);
        $this->Session->write('Presupuesto.empresa', $empresa);
        $this->Session->write('Presupuesto.email', $email);
        $this->Session->write('Presupuesto.telefono', $telefono);
        $this->Session->write('Presupuesto.departamento', $departamento);
        $this->Session->write('Presupuesto.direccion', $direccion);
        $this->Session->write('Presupuesto.horario', $horario);
        $this->Session->write('Cartele.ancho', $ancho);
        $this->Session->write('Cartele.alto', $alto);
         $this->set('precio', $ancho*$alto);
       
        $this->render(); 
    } 
    
    public function llenar_ficha(){
    
    	$this->layout = 'layout_presupuestos_llenar_ficha';
    	//print_r($this->request->data);
    	//$ancho_largo = $this->request->data;
    	
    	//echo $this->request->data['Presupuestos']['Ancho'];
//    	$session = $this->Session->read();
//    	$session = "hola";
//        print_r($session);
		$ancho = $this->request->data['Presupuestos']['Ancho'];
		$largo = $this->request->data['Presupuestos']['Largo'];
    	$this->Session->write('Cartele.ancho', $ancho);
		$this->Session->write('Cartele.largo', $largo);

    	$this->render();
     
    }
    public function test(){
    
    	print_r($this->request->data);
    }
}	