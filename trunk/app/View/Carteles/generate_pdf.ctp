<?php
App::import('Vendor','tcpdf/tcpdf');
$datos = $this->Session->read(); // VARIABLE SESSION.
Configure::load('nambrena_config'); // Se leen los datos de configuracion de la aplicacion. app/nambrena_config.php
//$producto_seleccionado = null; // Variable en la que se va a ir cargando como un string, la configuracion del producto. Ej -> frontLight_sobrePared_sinLuz, lo cual sirve para traer el precio
 //por metro cuadrado del archivo de configuracion.



//Primera parte de creacion del pdf
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);


// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nambrena');
$pdf->SetTitle('Nambrena');
$pdf->SetSubject('Nambrena');
$pdf->SetKeywords('nambrena');

// set default header data
$pdf->SetHeaderData('logo_nambre.png', 21, 'Nambrena Industria publicitaria', '');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_NAME_MAIN);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);




// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', 'B', 18);

// add a page
$pdf->AddPage();

$pdf->Ln(1);$pdf->Ln(1);$pdf->Ln(1);



	
$producto = 'Cartel';

/////////////

// Se obtienen el tipo, soporte, luminosidad y mantenimiento.
global $tipo, $soporte , $mantenimiento, $luminosidad, $cara, $envio;

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

		// TIPO DE ENVIO
		if ($envio=="colocado"){
			$envio = "Te lo instalamos";
		}
		if ($envio=="pickup"){
			$envio = "Lo pasas a buscar";
		}
		if ($envio=="envio"){
			$envio = "Te lo enviamos";
		}



	
//CALCULO DE PRECIO
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

/***************************************************************************/
/***************************************************************************/

$precio = $precio.' Gs.'; //PRECIO
	


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
/***********************CREACION DEL PDF****************************/
/***************************************************************************/
/***************************************************************************/



$pdf->Write(0, 'Presupuesto tentativo de ' .$producto, '', 0, 'C', true, 0, false, false, 0);

$pdf->Ln(5);


$pdf->SetFont('dejavusans','I', 11);
$pdf->Write(0, 'Detalles del producto seleccionado', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Ln(1);
// write the first column

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

/// set color for background
$pdf->SetFillColor(255, 255, 255);

// set color for text
$pdf->SetTextColor(0, 63, 127);
$pdf->SetFont('dejavusans', 10);
// write the first column


	                		
	                		
	$pdf->MultiCell(30, 0, 'Tipo', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $tipo, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(30, 0, 'Soporte', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $soporte, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(30, 0, 'Envio', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $envio, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	
	if ($datos['Cartele']['luminosidad'] != -1){
		
		$pdf->MultiCell(30, 0, 'Luminosidad', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
		$pdf->MultiCell(50, 0, $luminosidad, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
		
	}
	if ($datos['Cartele']['mantenimiento'] != -1){
		
		$pdf->MultiCell(30, 0, 'Mantenimiento', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
		$pdf->MultiCell(50, 0, $mantenimiento, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	}
	
	$pdf->Ln(1);
	$pdf->Ln(1);
	$pdf->SetFontSize(12);
	$pdf->Write(0, 'Precio estimativo: '.$precio, '', 0, 'L', true, 0, false, false, 0);
	


//Close and output PDF document
ob_clean();
$pdf->Output('Presupuesto-'.$producto.'.pdf', 'D');


?>