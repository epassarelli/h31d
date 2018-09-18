<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdfrpt extends TCPDF
{

	public $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	public $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

    public function __construct()
    {
        parent::__construct();
		// set document information
		$this->SetCreator('Municipalidad de Rojas');
	    // set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
		    require_once(dirname(__FILE__).'/lang/spa.php');
		    $this->setLanguageArray($l);
		}
    }

    //Page header
    public function Header() {
        // Logo
        $image_file = './reportes/escudo.jpg';
        $this->Image($image_file, 5, 5, 15, 17, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Title
        $this->SetFont('helvetica', '', 20);
        $this->MultiCell(0, 10, 'Municipalidad de Rojas', $border=0, $align='L', $fill=0, $ln=1, $x=19, $y=5);
        
        $this->SetFont('helvetica', '', 8);
        $this->MultiCell(0, 10, 'Cuit: 30-99900346-6', $border=0, $align='L', $fill=0, $ln=1, $x=19, $y=13);
        $this->MultiCell(0, 10, 'B.Mitre 428 - 2705 Rojas (B)', $border=0, $align='L', $fill=0, $ln=1, $x=19, $y=16);
        $this->MultiCell(0, 10, 'Te.: 02475 - 462002 / 462015 / 462007', $border=0, $align='L', $fill=0, $ln=1, $x=19, $y=19);
    }

    // Page footer
    public function Footer() {  	
        
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        
        // Page number
        $w_page = isset($this->l['w_page']) ? $this->l['w_page'].' ' : '';
        if (empty($this->pagegroups)) {
            $pagenumtxt = 'Pagina ' . $w_page.$this->getAliasNumPage().' de '.$this->getAliasNbPages();
        } else {
            $pagenumtxt = 'Pagina ' . $w_page.$this->getPageNumGroupAlias().' de '.$this->getPageGroupAlias();
        }

        $this->Cell(0, 10, $pagenumtxt, 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }

}
/* End of file Pdf.php */
/* Location: ./application/libraries/Pdf.php */
?>