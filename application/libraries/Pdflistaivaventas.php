<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdflistaivaventas extends TCPDF
{

	public $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	public $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    public $cliente = null;
    public $tipofactura = null;
    public $letfactura = null;
    public $codfactura = null;
    public $xcomprobante = null;
    public $resCAE = null;
    public $rubro = null;

    public function __construct()
    {
        parent::__construct();
		// set document information
		$this->SetCreator('Walco Electronica');
	    // set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
		    require_once(dirname(__FILE__).'/lang/spa.php');
		    $this->setLanguageArray($l);
		}
    }

    //Page header
    public function Header() {
        // Logo
        /*$image_file = './reportes/walco.gif';
        $this->Image($image_file, 12, 12, 28, 10, 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        $this->SetFont('helvetica', 'B', 26);
        $this->MultiCell(0, 0, 'WALCO', $border=0, $align='L', $fill=0, $ln=1, $x=40, $y=11);

        $this->SetFont('helvetica', 'B', 12);
        $this->MultiCell(0, 0, 'Electronica', $border=0, $align='L', $fill=0, $ln=1, $x=73, $y=19);*/

        // Logo
        $image_file = base_urL() . 'assets/img/logo_jpg/logo_color_100x98.gif';
        $this->Image($image_file, 15, 12, 12, 12, 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        $this->SetFont('dinroundpro-bold', 'B', 26);
        $this->MultiCell(0, 0, 'EL MURO', $border=0, $align='L', $fill=0, $ln=1, $x=27, $y=11);

        $this->SetFont('dinround', 'B', 12);
        $this->MultiCell(0, 0, 'Materiales', $border=0, $align='L', $fill=0, $ln=1, $x=45, $y=20);

        $this->SetFont('helvetica', '', 16);
        $this->MultiCell(0, 0, 'Listado IVA Ventas', $border=0, $align='C', $fill=0, $ln=1, $x=100, $y=19);
    }

    // Page footer
    public function Footer() {

        // Define Barcode Style
        /*$style = array(
            'position' => '',
            'align' => 'C',
            'stretch' => false,
            'fitwidth' => true,
            'cellfitalign' => '',
            'border' => false,
            'hpadding' => 'auto',
            'vpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false,
            'text' => true,
            'font' => 'helvetica',
            'fontsize' => 8,
            'stretchtext' => 4
        );

        // BarCode Interleaved 2 of 5
        $this->SetY(-18);
        $this->SetX(15);
        $this->write1DBarcode($this->resCAE['CAE'], 'I25+', '', '', '', 18, 0.4, $style, 'N');
        $this->SetFont('helvetica', 'B', 10);
        $this->MultiCell(0, 10, 'Fecha Vto. CAE: ' . date('d/m/Y', strtotime($this->resCAE["FechaVto"])), $border=0, $align='L', $fill=0, $ln=1, $x=80, $y=282);
        $this->MultiCell(0, 10, 'Nro. CAE: ' . $this->resCAE['CAE'], $border=0, $align='L', $fill=0, $ln=1, $x=80, $y=287);*/
        
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