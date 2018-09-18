<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/tcpdf/tcpdf.php';

class Pdf extends TCPDF
{

	public $dias = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
	public $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    public $cliente = null;
    public $tipofactura = null;
    public $letfactura = null;
    public $codfactura = null;
    public $xcomprobante = null;
    public $resCAE = null;
    public $fechaemision = null;
    public $condicionVta = null;

    public function __construct()
    {
        parent::__construct();
		// set document information
		$this->SetCreator('El Muro Materiales');
	    // set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/spa.php')) {
		    require_once(dirname(__FILE__).'/lang/spa.php');
		    $this->setLanguageArray($l);
		}
    }

    //Page header
    public function Header() {
        // Logo
        $image_file = base_urL() . 'assets/img/logo_jpg/logo_color_100x98.gif';
        $this->Image($image_file, 15, 12, 12, 12, 'GIF', '', 'T', false, 300, '', false, false, 0, false, false, false);
        
        $this->SetFont('dinroundpro-bold', 'B', 26);
        $this->MultiCell(0, 0, 'EL MURO', $border=0, $align='L', $fill=0, $ln=1, $x=27, $y=11);

        $this->SetFont('dinround', 'B', 12);
        $this->MultiCell(0, 0, 'Materiales', $border=0, $align='L', $fill=0, $ln=1, $x=45, $y=20);


        $this->SetFont('helvetica', 'B', 12);
        switch ($this->tipofactura) {
            case 1:
                $this->SetFont('helvetica', '', 10);
                $this->MultiCell(0, 0, 'Factura', $border=0, $align='C', $fill=0, $ln=1, $x=10, $y=26);
                break;
            case 3:
                $this->SetFont('helvetica', '', 6);
                $this->MultiCell(0, 0, 'Nota Credito', $border=0, $align='C', $fill=0, $ln=1, $x=10, $y=26);
                break;
            case 6:
                $this->SetFont('helvetica', '', 10);
                $this->MultiCell(0, 0, 'Factura', $border=0, $align='C', $fill=0, $ln=1, $x=10, $y=26);
                break;
            case 8:
                $this->SetFont('helvetica', '', 6);
                $this->MultiCell(0, 0, 'Nota Credito', $border=0, $align='C', $fill=0, $ln=1, $x=10, $y=26);
                break;
            case 11:
                $this->SetFont('helvetica', '', 10);
                $this->MultiCell(0, 0, 'Factura', $border=0, $align='C', $fill=0, $ln=1, $x=10, $y=26);
                break;
            case 13:
                $this->SetFont('helvetica', '', 6);
                $this->MultiCell(0, 0, 'Nota Credito', $border=0, $align='C', $fill=0, $ln=1, $x=10, $y=26);
                break;
        }

        $this->RoundedRect(10, 10, 190, 35, 3.50, '1111');

        $this->RoundedRect(98, 10, 15, 15, 3.50, '1111', '');


        $this->SetFont('helvetica', 'B', 20);
        $this->MultiCell(0, 10, $this->letfactura, $border=0, $align='L', $fill=0, $ln=1, $x=103, $y=11);
        
        $this->SetFont('helvetica', 'B', 9);
        $this->MultiCell(0, 10, $this->codfactura, $border=0, $align='L', $fill=0, $ln=1, $x=100, $y=20);

        $this->SetFont('helvetica', '', 10);
        $this->MultiCell(0, 0, $this->xcomprobante, $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=15);
        $this->MultiCell(0, 10, 'Fecha: ' . $this->dias[date('w', strtotime($this->fechaemision))]." ".date('d', strtotime($this->fechaemision))." de ".$this->meses[date('n', strtotime($this->fechaemision))-1]. " del ".date('Y', strtotime($this->fechaemision)), $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=19);


        $this->SetFont('helvetica', '', 10);

        $this->MultiCell(0, 10, 'Razón Social: Jacquin Martin Luis', $border=0, $align='L', $fill=0, $ln=1, $x=13, $y=24);
        $this->MultiCell(0, 10, 'Domicilio Comercial: Boulevard Moreno 153 - 2705 Rojas (B)', $border=0, $align='L', $fill=0, $ln=1, $x=13, $y=28);
        $this->MultiCell(0, 10, 'Condición frente al IVA: IVA Responsable Inscripto', $border=0, $align='L', $fill=0, $ln=1, $x=13, $y=32);
        $this->MultiCell(0, 10, 'Tel.: (02475) 443030 - Cel.: (02475) 416263', $border=0, $align='L', $fill=0, $ln=1, $x=13, $y=36);
        $this->MultiCell(0, 10, 'Email: martinmartin1980@hotmail.com', $border=0, $align='L', $fill=0, $ln=1, $x=13, $y=40);

        $this->MultiCell(0, 10, '', $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=24);
        $this->MultiCell(0, 10, 'Cuit: 23-27622972-9', $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=28);
        $this->MultiCell(0, 10, 'Ingresos Brutos: 23-27622972-9', $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=32);
        $this->MultiCell(0, 10, 'Fecha Inicio de Actividades: 01/02/2010', $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=36);
        $this->MultiCell(0, 10, '', $border=0, $align='L', $fill=0, $ln=1, $x=115, $y=40);

        $this->RoundedRect(10, 46, 190, 20, 3.50, '1111');
        
        $contribuyente = $this->cliente->NOM_CLIEN;
        $localidad = $this->cliente->LOCALIDAD; 
        
        $domicilio = $this->cliente->DIRECCION;

        $nomenclatura = ($this->cliente->NROQUIT == 0) ? '20-00000000-1' : $this->cliente->NROQUIT;


        //$pdamunicipal = $fila->tipo_imp . '-' . $fila->nro_imp;

        $this->SetFont('helvetica', '', 9);
       
        $this->MultiCell(0, 10, 'Sr./Sra.:' . $contribuyente . '', $border=0, $align='L', $fill=0, $ln=1, $x=20, $y=49);
        $this->MultiCell(0, 10, 'Domicilio:' . $domicilio . '', $border=0, $align='L', $fill=0, $ln=1, $x=20, $y=53);
        $this->MultiCell(0, 10, 'Localidad:' . $localidad . '', $border=0, $align='L', $fill=0, $ln=1, $x=20, $y=57);
        

        $this->MultiCell(0, 10, 'CUIT:' . $nomenclatura . '', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=49);
        /*if ($this->tipofactura == 1) {
            if ($this->cliente->RESP_INSC == 1){
                $this->MultiCell(0, 10, 'Condición frente al IVA: Responsable Inscripto', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
            } else {
                $this->MultiCell(0, 10, 'Condición frente al IVA: Responsable No Inscripto', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
            }
		}*/
		
		switch ($this->cliente->RESP_INSC) {
			case 1:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Responsable Inscripto', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 2:
				$this->MultiCell(0, 10, 'Condición frente al IVA: IVA Responsable no Inscripto', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 3:
				$this->MultiCell(0, 10, 'Condición frente al IVA: IVA no Responsable', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 4:
				$this->MultiCell(0, 10, 'Condición frente al IVA: IVA Sujeto Exento', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 5:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Consumidor Final', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 6:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Responsable Monotributo', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 7:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Sujeto no Categorizado', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 8:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Proveedor del Exterior', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 9:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Cliente del Exterior', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 10:
				$this->MultiCell(0, 10, 'Condición frente al IVA: IVA Liberado – Ley Nº 19.640', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 11:
				$this->MultiCell(0, 10, 'Condición frente al IVA: IVA Responsable Inscripto – Agente de Percepción', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 12:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Pequeño Contribuyente Eventual', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 13:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Monotributista Social', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			case 14:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Pequeño Contribuyente Eventual Social', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;
			default:
				$this->MultiCell(0, 10, 'Condición frente al IVA: Consumidor Final', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=53);
				break;			
		}
        
        if ($this->condicionVta == 1) {
            $this->MultiCell(0, 10, 'Condición de Venta: Contado', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=57);
        } else {
                $this->MultiCell(0, 10, 'Condición de Venta: Cta. Cte.', $border=0, $align='L', $fill=0, $ln=1, $x=120, $y=57);
        }
        
        $this->SetFont('helvetica', '', 6); 
        $this->MultiCell(0, 10, 'Articulos con * en su descripcion contienen IVA 10.50 %', $border=0, $align='L', $fill=0, $ln=1, $x=140, $y=63);

        //$this->RoundedRect(10, 64, 190, 5, 3.50, '0000');
            $this->SetX(10);
            $this->SetY(68);
            $this->Cell(20, 4, ' Cantidad', 1, 0, 'L', 0, 0, 0, true);
            $this->Cell(120, 4, ' Descripcion', 1, 0, 'L', 0, 0, 0, true);
            $this->Cell(20, 4, ' Precio Unit.', 1, 0, 'L', 0, 0, 0, true);
            $this->Cell(30, 4, ' Subtotal', 1, 0, 'L', 0, 0, 0, true);
    }

    // Page footer
    public function Footer() {

        // Define Barcode Style
        $style = array(
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
        $this->MultiCell(0, 10, 'Nro. CAE: ' . $this->resCAE['CAE'], $border=0, $align='L', $fill=0, $ln=1, $x=80, $y=287);
        
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