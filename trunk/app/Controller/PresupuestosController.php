<?php
class PresupuestosController extends AppController {
	
    public $name = 'Presupuestos';
    public $helpers = array('Html', 'Form');

    
 	public function index() {
        
       // redireccionar a la pagina princiapl
    }
    
	public function generate_pdf() 
    { 
      
        $this->layout = 'pdf'; //this will use the pdf.ctp layout 
        $nombre = $this->request->data['Presupuestos']['Nombre*:'];
        $apellido = $this->request->data['Presupuestos']['Apellido*:'];
        $empresa = $this->request->data['Presupuestos']['Empresa*:'];
        $email = $this->request->data['Presupuestos']['Email*:'];
        $telefono = $this->request->data['Presupuestos']['Telefono*:'];
        $departamento = $this->request->data['Presupuestos']['Departamento:'];
        $direccion = $this->request->data['Presupuestos']['Direccion:'];
        $horario = $this->request->data['Presupuestos']['Horario:'];
        
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
}	