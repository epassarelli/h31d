<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdfcabos extends TCPDF
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
        $image_file = './reportes/escudo-arg.jpg';
        $this->Image($image_file, 10, 5, 30, 30, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Title
        $this->SetFont('helvetica', 'I', 20);
        $this->MultiCell(0, 10, 'Ministerio de Salud y Acción Social', $border=0, $align='L', $fill=0, $ln=1, $x=50, $y=15);
        $this->MultiCell(0, 10, 'Administración Nacional del Seguro de Salud', $border=0, $align='L', $fill=0, $ln=1, $x=39, $y=22);

        $this->SetFont('helvetica', '', 10);
        $this->MultiCell(0, 10, 'Anexo II', $border=0, $align='L', $fill=0, $ln=1, $x=180, $y=10);

    }

    // Page footer
    public function Footer() {  	
        
        // Position at 15 mm from bottom
        $this->SetY(-15);
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