<?php 
App::import('Vendor','tcpdf/tcpdf'); 

class XTCPDF  extends TCPDF 
{ 

    var $xheadertext  = 'ffffffffffffffffffffffffffffff'; 
    var $xheadercolor = array(0,0,200); 
    var $xfootertext  = 'fffffffffffffffffffffffffffffff'; 
    var $xfooterfont  = PDF_FONT_NAME_MAIN ; 
    var $xfooterfontsize = 8 ; 


    /** 
    * Overwrites the default header 
    * set the text in the view using 
    *    $fpdf->xheadertext = 'YOUR ORGANIZATION'; 
    * set the fill color in the view using 
    *    $fpdf->xheadercolor = array(0,0,100); (r, g, b) 
    * set the font in the view using 
    *    $fpdf->setHeaderFont(array('YourFont','',fontsize)); 
    */ 
//Page header
	public function Header() {
		// Logo
		$image_file = K_PATH_IMAGES.'logo_nambre.png';
		$this->Image($image_file, 10, 10, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
		// Set font
		$this->SetFont('helvetica', 'B', 20);
		// Title
		$this->Cell(0, 0, 'Presupuesto', 0, false, 'C', 0, '', 0, false, 'M', 'M');
	}

	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetY(-15);
		// Set font
		$this->SetFont('helvetica', 'I', 8);
		// Page number
		$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	}
}
?>