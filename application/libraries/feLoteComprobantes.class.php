<?php
/**
 * Copyright (C) 2015 Juan Manuel Castro
 **/

class LoteComprobantes {

	/* Cabecera */
	protected $cantReg;
	protected $cbteTipo;
	protected $comprobantes = array();

	/* Detalle */
	protected $impTotal; /* Se calcula? */
	protected $impNoGravado;
	protected $impNeto;
	protected $impExento;
	protected $impIva; /* Se calcula? */

	/* Objetos asociados */
	protected $cbtesAsoc;
	protected $tributos;
	protected $iva;

	public function __construct($ptoVenta) {
		$this->ptoVenta = $ptoVenta;
	}

	public function addComprobante($comprobante) {
		if ( $this->cbteTipo != $comprobante->getTipo() ) {
			$this->cantReg = 0;
			$this->comprobantes = array();
		}

		$this->cbteTipo = $comprobante->getTipo();
		$this->cantReg++;
		$this->comprobantes[] = $comprobante;
	}

	public function getRequestCAE() {
			$feCabReq = array('CantReg' => $this->cantReg,
												'PtoVta' => $this->ptoVenta,
												'CbteTipo' => $this->cbteTipo
												);

			for ($i = 0; $i < $this->cantReg; $i++) {
				$feDetReq['FECAEDetRequest'][] = $this->comprobantes[$i]->getRequest();
			}

		$request['FeCAEReq'] = array( 'FeCabReq' => $feCabReq,
											'FeDetReq' => $feDetReq
										);

		return $request;
	}
}

?>
