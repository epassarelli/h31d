<?php
/**
 * Copyright (C) 2015 Juan Manuel Castro
 **/

class Concepto {
	protected $conceptoTipo;
	protected $impNeto;
	protected $impNoGravado;
	protected $impExento;
	protected $impIva;
	protected $tipoIva;

	public function __construct($conceptoTipo = 1, $impNeto = 0, $impNoGravado = 0, $impExento = 0, $impIva = 0, $tipoIva = 3) {
		$this->set($conceptoTipo, $impNeto, $impNoGravado, $impExento, $impIva, $tipoIva);
	}

	public function set($conceptoTipo, $impNeto, $impNoGravado, $impExento, $impIva, $tipoIva) {
		$this->conceptoTipo = $conceptoTipo;
		$this->impNeto = $impNeto;
		$this->impNoGravado = $impNoGravado;
		$this->impIva = $impIva;
		$this->tipoIva = $tipoIva;
	}
	public function getTipo() {
		return $this->conceptoTipo;
	}

	public function getTotal() {
		$total = $this->impNeto + $this->impNoGravado + $this->impExento + $this->impIva;
		return $total;
	}

	public function getImpNeto() {
		return $this->impNeto;
	}

	public function getImpIva() {
		return $this->impIva;
	}

	public function getTipoIva() {
		return $this->tipoIva;
	}

	public function sumarImporte($arrConceptos, $tipoImp) {
		$total = 0;
		foreach ($arrConceptos as $concepto)
			$total += $concepto->$tipoImp;

		return $total;
	}
}

?>
