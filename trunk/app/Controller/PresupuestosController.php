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
    
	public function enviar_mail(){

		//1. SE OBTIENEN LOS DATOS DE LOS PRODUCTOS DE LA VARIABLE DE SESION.
		//2. SE PREPARA EL MENSAJE DEL MAIL.
		//3. SE CONFIGURA EL MAILL Y SE MANDA.

		$datos = $this->Session->read(); // VARIABLE SESSION.

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
		global $tipo, $soporte , $mantenimiento, $luminosidad;

		if ($datos['Cartele'] != null){

			if ($datos['Cartele']['tipo'] == "front_light"){
				$tipo =  "Front Light";
			}
			if ($datos['Cartele']['tipo'] == "back_light"){
				$tipo =  "Back Light";
			}
			if ($datos['Cartele']['tipo'] == "adhesivo"){
				$tipo =  "Adhesivo";
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
		}
	  
		//MENSAJE
		$mensaje = 'Estimado/a '.$this->request->data['nombre'].":"."\n\nHemos regitrado su pedido. A continuaci—n se encuentra el presupuesto solicitado\n\n"."Producto: ".$producto."\nTipo: ".$tipo."\nSoporte: ".$soporte;

		if ($datos['Cartele']['luminosidad'] != -1){

			$mensaje = $mensaje."\nLuminosidad: ".$luminosidad;

		}
		if ($datos['Cartele']['mantenimiento'] != -1){

			$mensaje = $mensaje."\nMantenimiento: ".$mantenimiento;

		}
			
		//PRECIO
		$ancho = $datos['ancho'];
		$alto = $datos['alto'];
		$factor_altura = 1; // TODO: Dato que hay que traer de la bd
		$precio_producto_metro = 1; // TODO: Dato que hay que traer de la BD.
			
		$precio = number_format($ancho*$alto*$factor_altura*$precio_producto_metro,0,'.','.');// Se formatea el numero con los puntos como separador de miles.
		$precio = $precio.' Gs.';
		$mensaje = $mensaje."\nPrecio: ".$precio;
			

		App::uses('CakeEmail', 'Network/Email');
			
		//CONFIGURACION
		$servidor_mail='smtpcbi'; // Los dos mails se envian DESDE $servidor_mail que esta especificado en Conf/email.php
		$correo_empresa_destinataria = 'test@cbi.com.py';
			

		//MAIL PARA EL LA EMPRESA
		//$email = new CakeEmail($servidor_mail);
		//$email->to($correo_empresa_destinataria);
		//$email->subject('Mensaje de un usuario a traves de la pagina');
		//$email->send('fadfasfasdf');
			
		print_r($this->request->data);
			
		//MAIL PARA EL CLIENTE
		$email = new CakeEmail($servidor_mail);
		$email->to($this->request->data['email']); // Destinatario
		$email->subject('Gracias por contactarnos!'); // Subject
		$email->send($mensaje);
		$this->Session->setFlash('Gracias Por enviarnos su consulta, le estaremos respondiendo en los proximos dias');
		$this->redirect(array('controller'=>'default', 'action' => 'index'));
    }
}	