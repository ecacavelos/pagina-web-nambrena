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
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

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
$pdf->SetFont('times', 'BI', 12);

// add a page
$pdf->AddPage();
$pdf->Ln(1);$pdf->Ln(1);$pdf->Ln(1);
$pdf->Write(0, 'Presupeusto tentativo de colocacion de carteles', '', 0, 'L', true, 0, false, false, 0);

$pdf->Ln(5);

$pdf->Write(0, 'Nombre: '.$ficha_array['Presupuesto']['nombre'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Apellido: '.$ficha_array['Presupuesto']['apellido'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Empresa: '.$ficha_array['Presupuesto']['empresa'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'email: '.$ficha_array['Presupuesto']['email'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'telefono: '.$ficha_array['Presupuesto']['telefono'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Ln(1);
$pdf->Ln(1);
$pdf->Ln(1);
$pdf->Ln(1);


$pdf->Write(0, 'Tipo: '.$cartel_array['Cartele']['tipo'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Soporte: '.$cartel_array['Cartele']['soporte'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Luz: '.$cartel_array['Cartele']['luminosidad'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Ancho: '.$cartel_array['Cartele']['ancho'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);
$pdf->Write(0, 'Largo: '.$cartel_array['Cartele']['largo'], '', 0, 'L', true, 0, false, false, 0);
$pdf->Ln(1);



// write the first column

$left_column1 = 'Columna izquierda ';

// MultiCell($w, $h, $txt, $border=0, $align='J', $fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)

// set color for background
$pdf->SetFillColor(255, 255, 200);

// set color for text
$pdf->SetTextColor(0, 63, 127);

// write the first column
$pdf->MultiCell(80, 0, $left_column1, 1, 'J', 1, 0, '', '', true, 0, false, true, 0);

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