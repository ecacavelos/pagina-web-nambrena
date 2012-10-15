<?php
App::import('Vendor','config/lang/eng');
App::import('Vendor','tcpdf/tcpdf');



$datos = $this->Session->read(); // VARIABLE SESSION.
Configure::load('nambrena_config'); // Se leen los datos de configuracion de la aplicacion. app/nambrena_config.php
//$producto_seleccionado = null; // Variable en la que se va a ir cargando como un string, la configuracion del producto. Ej -> frontLight_sobrePared_sinLuz, lo cual sirve para traer el precio
 //por metro cuadrado del archivo de configuracion.
// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

	//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'NAMBRENA.HEADER.png';
		$this->Image($image_file, 20, 10, 170, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		
	}
}



//Primera parte de creacion del pdf
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nambrena');
$pdf->SetTitle('Nambrena');
$pdf->SetSubject('Nambrena');
$pdf->SetKeywords('nambrena');

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set some language-dependent strings
$pdf->setLanguageArray($l);


// set default header data
//$pdf->SetHeaderData('NAMBRENA.HEADER.png', 170);





//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(5);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
//$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



/***************************************************************************/
/***************************************************************************/


//$myString = "Test with accents éñ"; 
//$fh=fopen('presupuesto.txt',"w"); 
//file_put_contents('hola.txt', "\xEF\xBB\xBF".  $myString);
//fclose($fh);
//$utf8text = file_get_contents('hola.txt', false);
	

// set color for text
//$pdf->SetTextColor(0, 63, 127);

//Write($h, $txt, $link='', $fill=0, $align='', $ln=false, $stretch=0, $firstline=false, $firstblock=false, $maxh=0)

// write the text
//$pdf->Write(5, $utf8text, '', 0, '', false, 0, false, false, 0);

/***************************************************************************/
/***************************************************************************/
/***********************DATOS PARA DEBUGGEAR*******************sx*********/
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

// set font
$fontname = $pdf->addTTFfont('fonts/Calibri.ttf', 'TrueTypeUnicode', '', 32);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont($fontname, '', 12);
// add a page
$pdf->AddPage();

$pdf->Ln(6);$pdf->Ln(6);




$pdf->Write(0, 'De nuestra mayor consideración: ' , '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(2);$pdf->Ln(2);$pdf->Ln(2);
$pdf->Write(0, '          Tenemos el agrado de dirigirnos a usted, con el fin de presentarle el presupuesto de lo solicitado en nuestra página WEB. ' , '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(2);

$pdf->Ln(3);


// set font
$fontname = $pdf->addTTFfont('fonts/CalibriBold.ttf', 'TrueTypeUnicode', '', 32);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont($fontname, '', 12);

$pdf->Write(0, 'Producto: '.$datos['PDF']['producto'],'', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Dimensiones: '.$datos['PDF']['ancho']. ' x '.$datos['PDF']['alto'].' metros','', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Tipo de '.$datos['PDF']['producto'].' : '.$datos['PDF']['tipo'],'', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, 'Soporte: '.$datos['PDF']['soporte'],'', 0, 'L', true, 0, false, false, 0);
if($datos['PDF']['envio'] == "colocado"){
	$pdf->Write(0, 'Forma de entrega: '.'Instalación del producto en el lugar indicado','', 0, 'L', true, 0, false, false, 0);	
}
elseif ($datos['PDF']['envio'] == "pickup") {
	$pdf->Write(0, 'Forma de entrega: '.'Retira el producto de nuestras oficinas','', 0, 'L', true, 0, false, false, 0);	
	
}
elseif ($datos['PDF']['envio'] == "envio") {
	$pdf->Write(0, 'Forma de entrega: '.'Le enviamos el producto','', 0, 'L', true, 0, false, false, 0);	
}


if($datos['PDF']['mantenimiento'] == 1){
	$pdf->Write(0, '* Se solicito MANTENIMIENTO del producto','', 0, 'L', true, 0, false, false, 0);
	
}
elseif ($datos['PDF']['mantenimiento'] == 0){
	$pdf->Write(0, '* NO se solicito MANTENIMIENTO del producto','', 0, 'L', true, 0, false, false, 0);
	
}
if($datos['PDF']['luminosidad'] == 1){
	$pdf->Write(0, '* Requiere instalación de reflectores','', 0, 'L', true, 0, false, false, 0);
	
}
elseif ($datos['PDF']['luminosidad'] == 0){
	$pdf->Write(0, '* NO requiere instalación de reflectores','', 0, 'L', true, 0, false, false, 0);
	
}

//$pdf->SetFont('calibri','B', 11);

// set font
$fontname = $pdf->addTTFfont('fonts/CalibriItalic.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont($fontname, '', 13);
$pdf->SetTextColor(255, 0, 0);
$pdf->Write(0, 'Precio : ');
$fontname = $pdf->addTTFfont('fonts/CalibriBoldItalic.ttf', 'TrueTypeUnicode', '', 32);
$pdf->SetFont($fontname, '', 13);
$pdf->Write(0, $datos['PDF']['precio'], '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(3);$pdf->Ln(3);


//OBS
// set font
$fontname = $pdf->addTTFfont('fonts/CalibriBold.ttf', 'TrueTypeUnicode', '', 32);

// set default font subsetting mode
$pdf->setFontSubsetting(true);
$pdf->SetTextColor(0,0,0);

// set font
$pdf->SetFont($fontname, '', 13);
$pdf->SetFillColor(0, 0, 100, 0);
$pdf->Write(0, '          Obs.: LOS PRECIOS INDICADOS MAS ARRIBA ESTAN BASADOS EN LOS MEJORES' , '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, '          ESTANDARES DE CALIDAD CON RESPECTO A LOS MATERIALES UTILIZADOS. ESTE PRECIO' , '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, '          ES IVA INCLUIDO.' , '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(3);$pdf->Ln(3);

//DESPEDIDA

// set font
$fontname = $pdf->addTTFfont('fonts/Calibri.ttf', 'TrueTypeUnicode', '', 32);

// set default font subsetting mode
$pdf->setFontSubsetting(true);

// set font
$pdf->SetFont($fontname, '', 12);

$pdf->Write(0, '     Esperando una acogida favorable, aprovechamos la ocasión para saludarles con nuestra más alta' , '', 0, 'L', true, 0, false, false, 0);
$pdf->Write(0, '     consideración y estima.' , '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(3);$pdf->Ln(3);

$pdf->Write(0, '     Atentamente.' , '', 0, 'L', true, 0, false, false, 0);


$pdf->Ln(3);$pdf->Ln(3);$pdf->Ln(3);$pdf->Ln(3);
$pdf->Write(0, '                                                 ventas@nambrena.com.py.' , '', 0, 'L', true, 0, false, false, 0);
                                                 








//Close and output PDF document
ob_clean();
$pdf->Output('Presupuesto-'.$datos['PDF']['producto'].'-'. date('d-m-y') .$datos['PDF']['nombre'].'.pdf', 'D');


?>