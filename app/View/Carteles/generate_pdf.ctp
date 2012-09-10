<?php 
App::import('Vendor','tcpdf/tcpdf'); 

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


$pdf->Write(0, 'Presupuesto tentativo de ', '', 0, 'C', true, 0, false, false, 0);

//Close and output PDF document
$pdf->Output('Presupuesto-'.'.pdf', 'D');


?> 