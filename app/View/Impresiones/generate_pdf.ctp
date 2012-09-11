<?php
App::import('Vendor','tcpdf/tcpdf');
$datos = $this->Session->read(); // VARIABLE SESSION.
Configure::load('nambrena_config'); // Se leen los datos de configuracion de la aplicacion. app/nambrena_config.php
//$producto_seleccionado = null; // Variable en la que se va a ir cargando como un string, la configuracion del producto. Ej -> frontLight_sobrePared_sinLuz, lo cual sirve para traer el precio
 //por metro cuadrado del archivo de configuracion.
	
$producto = 'Impresion';

/////////////

// Se obtienen el tipo, soporte, luminosidad y mantenimiento.
global $tipo, $soporte , $mantenimiento, $luminosidad, $cara, $envio;

	if ($datos['Impresione'] != null){
			if ($datos['Impresione']['tipo'] == "Front light"){
				$tipo =  "Front Light";
				$producto_seleccionado = "frontLight";
			}
			if ($datos['Impresione']['tipo'] == "Back light"){
				$tipo =  "Back Light";
				$producto_seleccionado = "backLight";
			}
			if ($datos['Impresione']['tipo'] == "Adhesivo"){
				$tipo =  "Adhesivo";
				$producto_seleccionado = "adhesivo";
			}
			if ($datos['Impresione']['tipo'] == "Microperforado"){
				$tipo =  "Microperforado";
				$producto_seleccionado = "microperforado";
			}
			$envio = $datos['Impresione']['tipoEnvio']; //TIPO DE ENVIO
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
		
		
		if ($producto == 'Impresion'){ // IMPRESION
			
			$precio = number_format(($ancho*$alto*$precio_producto_metro),0,'.','.');// Se formatea el numero con los puntos como separador de miles.
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
	$pdf->MultiCell(30, 0, 'Envio', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $envio, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	
	$pdf->Ln(1);
	$pdf->Ln(1);
	$pdf->SetFontSize(12);
	$pdf->Write(0, 'Precio estimativo: '.$precio, '', 0, 'L', true, 0, false, false, 0);
	


//Close and output PDF document
ob_clean();
$pdf->Output('Presupuesto-'.$producto.'.pdf', 'D');


?>