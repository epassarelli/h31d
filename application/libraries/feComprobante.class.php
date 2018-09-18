<?php
/**
 * Copyright (C) 2015 Juan Manuel Castro
 **/

class Comprobante {
	protected $conceptosTipo;
	protected $cbteTipo;
	protected $docTipo;
	protected $ptoVenta;
	protected $docNro;
	protected $cbteDesde;
	protected $cbteHasta;
	protected $cbteFecha;
	protected $monId;
	protected $monCotizacion;
	protected $srvDesde;
	protected $srvHasta;
	protected $vtoPago;
	protected $conceptos = array();
	protected $comprobantesAsociados = array();

	public function __construct($cbteNro, $cbteTipo, $ptoVta, $docTipo, $docNro, $fecha, $monId, $monCotizacion, $srvDesde = '', $srvHasta = '', $vtoPago = '') {
		$this->cbteTipo      = $cbteTipo;
		$this->docTipo       = $docTipo;
		$this->ptoVta        = $ptoVta;
		$this->docNro        = $docNro;
		$this->cbteDesde     = $cbteNro;
		$this->cbteHasta     = $cbteNro;
		$this->cbteFecha     = $fecha;
		$this->monId         = $monId;
		$this->monCotizacion = $monCotizacion;
		$this->srvDesde      = $srvDesde;
		$this->srvHasta      = $srvHasta;
		$this->vtoPago       = $vtoPago;
	}

	public function addConcepto($concepto) {

//var_dump($concepto);

		if ( ($this->conceptosTipo = 0) || ($this->conceptosTipo == $concepto->getTipo()) ){
			$this->conceptosTipo = $concepto->getTipo();
		} else {
			$this->conceptosTipo = 3;
		}
		$this->conceptos[] = $concepto;
	}

	public function addcomprobantesAsociado($cmpAsoc) {

		$this->comprobantesAsociados[] = $cmpAsoc;
	}

	public function getTipo() {
		return $this->cbteTipo;
	}

	public function getTotal() {
		$total = 0;
		foreach ($this->conceptos as $concepto){
			$total += $concepto->getTotal();
		}
		return $total;
	}

	public function getTotalNeto() {
		return Concepto::sumarImporte($this->conceptos,'impNeto');
	}

	public function getTotalNoGravado() {
		return Concepto::sumarImporte($this->conceptos,'impNoGravado');
	}

	public function getTotalExento() {
		return Concepto::sumarImporte($this->conceptos,'impExento');
	}

	public function getTotalTributos() {
		return 0;
	}

	public function getTotalIva() {
		return Concepto::sumarImporte($this->conceptos,'impIva');
	}

	public function getRequest() {
		$tiposIva = array();

		foreach( $this->conceptos as $concepto) {
			if ( !isset($tiposIva[$concepto->getTipoIva()]['BaseImp']) ){
				$tiposIva[$concepto->getTipoIva()]['BaseImp'] = 0;
			}
			if ( !isset($tiposIva[$concepto->getTipoIva()]['Importe']) ){
				$tiposIva[$concepto->getTipoIva()]['Importe'] = 0;
			}
			$tiposIva[$concepto->getTipoIva()]['BaseImp'] += $concepto->getImpNeto();
			$tiposIva[$concepto->getTipoIva()]['Importe'] += $concepto->getImpIva();
		}

		switch ($this->cbteTipo) {
		    case 3:
				foreach ($tiposIva as $tipoIva => $datos) {
					$IVA['AlicIva'][] = array(
												'Id' => $tipoIva,
												'BaseImp' => $datos['BaseImp'],
												'Importe' => $datos['Importe']
											 );
				}		    
				foreach ($this->comprobantesAsociados as $cmpAsoc) {
					$asociados['CbteAsoc'][] = array(
														'Tipo' => $cmpAsoc['tipo'],
											   			'PtoVta' => $cmpAsoc['ptovta'],
											    		'Nro' => $cmpAsoc['nro']
											 		);
				}
				$request = array( 'Concepto'     => $this->conceptosTipo,
													'DocTipo'      => $this->docTipo,
													'DocNro'       => $this->docNro,
													'CbteDesde'    => $this->cbteDesde,
													'CbteHasta'    => $this->cbteHasta,
													'CbteFch'      => $this->cbteFecha,
													'ImpTotal'     => $this->getTotal(),
													'ImpTotConc'   => $this->getTotalNoGravado(),
													'ImpNeto'      => $this->getTotalNeto(),
													'ImpOpEx'      => $this->getTotalExento(),
													'ImpIVA'       => $this->getTotalIva(),
													'ImpTrib'      => $this->getTotalTributos(),
													'FchServDesde' => $this->srvDesde,
													'FchServHasta' => $this->srvHasta,
													'FchVtoPago'   => $this->vtoPago,
													'MonId'        => $this->monId,
													'MonCotiz'     => $this->monCotizacion,
													'CbtesAsoc'    => $asociados,
													'Iva'          => $IVA
								);
		        break;
		    case 8:
				foreach ($tiposIva as $tipoIva => $datos) {
					$IVA['AlicIva'][] = array(
												'Id' => $tipoIva,
												'BaseImp' => $datos['BaseImp'],
												'Importe' => $datos['Importe']
											 );
				}		    
				foreach ($this->comprobantesAsociados as $cmpAsoc) {
					$asociados['CbteAsoc'][] = array(
														'Tipo' => $cmpAsoc['tipo'],
											   			'PtoVta' => $cmpAsoc['ptovta'],
											    		'Nro' => $cmpAsoc['nro']
													);
				}
				$request = array(
									'Concepto'     => $this->conceptosTipo,
									'DocTipo'      => $this->docTipo,
									'DocNro'       => $this->docNro,
									'CbteDesde'    => $this->cbteDesde,
									'CbteHasta'    => $this->cbteHasta,
									'CbteFch'      => $this->cbteFecha,
									'ImpTotal'     => $this->getTotal(),
									'ImpTotConc'   => $this->getTotalNoGravado(),
									'ImpNeto'      => $this->getTotalNeto(),
									'ImpOpEx'      => $this->getTotalExento(),
									'ImpIVA'       => $this->getTotalIva(),
									'ImpTrib'      => $this->getTotalTributos(),
									'FchServDesde' => $this->srvDesde,
									'FchServHasta' => $this->srvHasta,
									'FchVtoPago'   => $this->vtoPago,
									'MonId'        => $this->monId,
									'MonCotiz'     => $this->monCotizacion,
									'CbtesAsoc'    => $asociados,
									'Iva'          => $IVA
								);
		        break;
			case 11:
				$request = array(
									'Concepto'     => $this->conceptosTipo,
									'DocTipo'      => $this->docTipo,
									'DocNro'       => $this->docNro,
									'CbteDesde'    => $this->cbteDesde,
									'CbteHasta'    => $this->cbteHasta,
									'CbteFch'      => $this->cbteFecha,
									'ImpTotal'     => $this->getTotal(),
									'ImpTotConc'   => $this->getTotalNoGravado(),
									'ImpNeto'      => $this->getTotalNeto(),
									'ImpOpEx'      => $this->getTotalExento(),
									'ImpIVA'       => $this->getTotalIva(),
									'ImpTrib'      => $this->getTotalTributos(),
									'FchServDesde' => $this->srvDesde,
									'FchServHasta' => $this->srvHasta,
									'FchVtoPago'   => $this->vtoPago,
									'MonId'        => $this->monId,
									'MonCotiz'     => $this->monCotizacion
								);
		        break;
		    case 13:
				foreach ($this->comprobantesAsociados as $cmpAsoc) {
					$asociados['CbteAsoc'][] = array(	
														'Tipo' => $cmpAsoc['tipo'],
											   			'PtoVta' => $cmpAsoc['ptovta'],
											    		'Nro' => $cmpAsoc['nro']
													);
				}		    	
				$request = array(
									'Concepto'     => $this->conceptosTipo,
									'DocTipo'      => $this->docTipo,
									'DocNro'       => $this->docNro,
									'CbteDesde'    => $this->cbteDesde,
									'CbteHasta'    => $this->cbteHasta,
									'CbteFch'      => $this->cbteFecha,
									'ImpTotal'     => $this->getTotal(),
									'ImpTotConc'   => $this->getTotalNoGravado(),
									'ImpNeto'      => $this->getTotalNeto(),
									'ImpOpEx'      => $this->getTotalExento(),
									'ImpIVA'       => $this->getTotalIva(),
									'ImpTrib'      => $this->getTotalTributos(),
									'FchServDesde' => $this->srvDesde,
									'FchServHasta' => $this->srvHasta,
									'FchVtoPago'   => $this->vtoPago,
									'MonId'        => $this->monId,
									'MonCotiz'     => $this->monCotizacion,
									'CbtesAsoc'    => $asociados
								);
		        break;		        
		    default:
				foreach ($tiposIva as $tipoIva => $datos) {
					$IVA['AlicIva'][] = array(
												'Id' => $tipoIva,
												'BaseImp' => $datos['BaseImp'],
												'Importe' => $datos['Importe']
											 );
				}		    
				$request = array(
								'Concepto'     => $this->conceptosTipo,
								'DocTipo'      => $this->docTipo,
								'DocNro'       => $this->docNro,
								'CbteDesde'    => $this->cbteDesde,
								'CbteHasta'    => $this->cbteHasta,
								'CbteFch'      => $this->cbteFecha,
								'ImpTotal'     => $this->getTotal(),
								'ImpTotConc'   => $this->getTotalNoGravado(),
								'ImpNeto'      => $this->getTotalNeto(),
								'ImpOpEx'      => $this->getTotalExento(),
								'ImpIVA'       => $this->getTotalIva(),
								'ImpTrib'      => $this->getTotalTributos(),
								'FchServDesde' => $this->srvDesde,
								'FchServHasta' => $this->srvHasta,
								'FchVtoPago'   => $this->vtoPago,
								'MonId'        => $this->monId,
								'MonCotiz'     => $this->monCotizacion,
								'Iva'          => $IVA
								);
		}


		//var_dump($request);

		return $request;
	}

}
?>