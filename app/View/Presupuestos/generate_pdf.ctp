<?php 
App::import('Vendor','tcpdf/tcpdf'); 
$ficha_array = array ("Presupuesto" => $this->Session->read('Presupuesto'));
$datos = $this->Session->read();

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
if ($datos['Cartele'] != null){
	
	$producto = 'cartel'; 
}
if ($datos['Corporeo'] != null){
	
	$producto = 'corporeo'; 
}
if ($datos['Impresione'] != null){
	
	$producto = 'impresion'; 
}
if ($datos['Decuvinyl'] != null){
	
	$producto = 'vinilo'; 
}

$pdf->Write(0, 'Presupuesto tentativo de ' .$producto, '', 0, 'C', true, 0, false, false, 0);

$pdf->Ln(5);

$pdf->SetFont('dejavusans', 12);

$pdf->Write(0, 'Nombre: '.$ficha_array['Presupuesto']['nombre'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Apellido: '.$ficha_array['Presupuesto']['apellido'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Empresa: '.$ficha_array['Presupuesto']['empresa'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'E-mail: '.$ficha_array['Presupuesto']['email'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Telefono: '.$ficha_array['Presupuesto']['telefono'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Ln(1);
$pdf->Ln(1);
$pdf->Ln(1);
$pdf->Ln(1);

$pdf->SetFont('dejavusans','I', 11);
$pdf->Write(0, 'Detalles del ' .$producto. ' seleccionado', '', 0, 'L', true, 0, false, false, 0);
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

// Se obtienen el tipo, soporte, luminosidad y mantenimiento. 
global $tipo, $soporte, $mantenimiento, $luminosidad;

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
	                		
	                		
	$pdf->MultiCell(30, 0, 'Tipo', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $tipo, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(30, 0, 'Soporte', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $soporte, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	
	if ($datos['Cartele']['luminosidad'] != -1){
		
		$pdf->MultiCell(30, 0, 'Luminosidad', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
		$pdf->MultiCell(50, 0, $luminosidad, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
		
	}
	if ($datos['Cartele']['mantenimiento'] != -1){
		
		$pdf->MultiCell(30, 0, 'Mantenimiento', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
		$pdf->MultiCell(50, 0, $mantenimiento, 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	}
	$pdf->MultiCell(30, 0, 'Ancho', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $datos['ancho'], 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	
	$pdf->MultiCell(30, 0, 'Alto', 1, 'L', 1, 0, '', '', true, 0, false, true, 0);
	$pdf->MultiCell(50, 0, $datos['alto'], 1, 'L', 2, 1, '', '', true, 0, false, true, 0);
	
	$pdf->Ln(1);
	$pdf->Ln(1);
	$factor = 3;
	$precio = $datos['ancho']*$datos['alto']*$factor;
	$pdf->SetFontSize(12);
	$pdf->Write(0, 'Precio estimativo: '.$precio. ' Gs.', '', 0, 'L', true, 0, false, false, 0);
	
}


//Close and output PDF document
$pdf->Output('Presupuesto-'.$producto.'.pdf', 'D');


?> 