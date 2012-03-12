<?php 
App::import('Vendor','tcpdf/tcpdf'); 
$ficha_array = array ("Presupuesto" => $this->Session->read('Presupuesto'));
$cartel_array = array ("Cartele" => $this->Session->read('Cartele'));

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nambrena');
$pdf->SetTitle('oooooooo');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

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
$fontname = $pdf->addTTFfont('falsepositive.ttf');




// ---------------------------------------------------------

// set font
$pdf->SetFont('dejavusans', 'B', 18);

// add a page
$pdf->AddPage();

$pdf->Ln(1);$pdf->Ln(1);$pdf->Ln(1);
$pdf->Write(0, 'Presupuesto tentativo de colocacion de carteles', '', 0, 'C', true, 0, false, false, 0);

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



$pdf->Write(0, 'Detalles del cartel seleccionado', '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Ln(1);
// write the first column

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

/// set color for background
$pdf->SetFillColor(255, 255, 255);

// set color for text
$pdf->SetTextColor(0, 63, 127);
$pdf->SetFontSize(10);
// write the first column
$pdf->MultiCell(30, 0, 'Tipo', 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
$pdf->MultiCell(50, 0, $cartel_array['Cartele']['tipo'], 1, 'J', 2, 1, '', '', true, 0, false, true, 0);
$pdf->MultiCell(30, 0, 'Soporte', 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
$pdf->MultiCell(50, 0, $cartel_array['Cartele']['soporte'], 1, 'J', 2, 1, '', '', true, 0, false, true, 0);
$pdf->MultiCell(30, 0, 'Luminosidad', 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
$pdf->MultiCell(50, 0, $cartel_array['Cartele']['luminosidad'], 1, 'J', 2, 1, '', '', true, 0, false, true, 0);
$pdf->MultiCell(30, 0, 'Mantenimiento', 1, 'J', 1, 0, '', '', true, 0, false, true, 0);
$pdf->MultiCell(50, 0, $cartel_array['Cartele']['mantenimiento'], 1, 'J', 2, 1, '', '', true, 0, false, true, 0);

//PRECIO

$pdf->Ln(1);
$pdf->Ln(1);

$pdf->Write(0, 'Precio : '.$precio. ' Gs.', '', 0, 'L', true, 0, false, false, 0);

// set some text to print
//$txt = <<<EOD
//TCPDF Example 003
//
//Custom page header and footer are defined by extending the TCPDF class and overriding the Header() and Footer() methods.
//EOD;
//
//// print a block of text using Write()
//$pdf->Write($h=0, $txt, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('presupuesto.pdf', 'D');


?> 