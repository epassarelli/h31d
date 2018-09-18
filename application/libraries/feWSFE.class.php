<?php
/**
 * Copyright (C) 2015 Juan Manuel Castro
 **/

class WSFE extends SoapClient {
	private $scOpts = array(
		'soap_version'   => SOAP_1_2,
		'location'       => WSFE_URL,
		'trace'          => 1,
		'exceptions'     => true
	);

	private $Auth;
	private $Cuit;

	function __construct($Cuit, $WSAA) {
		$this->Auth = $WSAA->getAuth(); 
		$this->Cuit = $Cuit;
				
		parent::SoapClient(WSFE_WSDL_URL, $this->scOpts);
	}

	function getEstadoServidores() {
		$results = $this->FEDummy();
		return array('Servidor de Aplicacion: ' => $results->FEDummyResult->AppServer, 
					 'Servidor de Base de Datos: ' => $results->FEDummyResult->DbServer, 
					 'Servidor de Autenticacion: ' => $results->FEDummyResult->AuthServer
					);
	}

	private function sendRequest($method, $options) {
		$optArr['Auth'] = $this->Auth;
		$optArr['Auth']['Cuit'] = $this->Cuit;
		if ( is_array($options) )
			foreach ($options as $key => $value) $optArr[$key] = $value;

		$results = $this->$method($optArr);
		return $results;
	}

	private function sendRequestParam($method) {
		$results = $this->sendRequest($method, '');
		$resultMethod = $method.'Result';
		$vars = get_object_vars($results->$resultMethod);
		$keys = array_keys($vars);

		if ($keys[0] == 'Errors') {
			$param = $results->$resultMethod->Errors;
		} else {
			$resultVars = get_object_vars($results->$resultMethod->ResultGet);
			$resultKeys = array_keys($resultVars);
			$param = $results->$resultMethod->ResultGet->$resultKeys[0];
		}
		return $param;
	}

	public function getUltCbte($poSale, $type) {
		$options = array('PtoVta' => $poSale, 'CbteTipo'=>$type);
		$results = $this->sendRequest('FECompUltimoAutorizado',$options);
		return $results->FECompUltimoAutorizadoResult->CbteNro;
	}

	public function getAuthCbte($pComp, $tComp, $nComp) {
		$options = array('PtoVta' => $pComp, 'CbteTipo'=>$tComp, 'CbteNro'=>$nComp);
		//$results = $this->sendRequest('FECompConsultar',$options);

		$optArr['Auth'] = $this->Auth;
		$optArr['Auth']['Cuit'] = $this->Cuit;
		if ( is_array($options) ) {
			foreach ($options as $key => $value){
				$xxx[$key] = $value;
			}
		}
		$optArr['FeCompConsReq'] = $xxx;

		$results = $this->FECompConsultar($optArr);

		return $results->FECompConsultarResult->ResultGet;
	}


	public function getTiposCbte() {
		return $this->sendRequestParam('FEParamGetTiposCbte');
	}

	public function getTiposConcepto() {
		return $this->sendRequestParam('FEParamGetTiposConcepto');
	}

	public function getTiposDoc() {
		return $this->sendRequestParam('FEParamGetTiposDoc');
	}

	public function getTiposIva() {
		return $this->sendRequestParam('FEParamGetTiposIva');
	}

	public function getTiposMonedas() {
		return $this->sendRequestParam('FEParamGetTiposMonedas');
	}

	public function getTiposTributos() {
		return $this->sendRequestParam('FEParamGetTiposTributos');
	}

	public function getPtosVenta() {
		return $this->sendRequestParam('FEParamGetPtosVenta');
	}

	public function getOpcionales(){
		return $this->sendRequestParam('FEParamGetTiposOpcional');
	}

	public function solicitarCAE($request) {
		$response = $this->sendRequest('FECAESolicitar',$request);

		/*foreach ($response as $nombre => $valor) {
			echo "Nombre\n";
			var_dump($nombre);
			echo "Valor\n";
			var_dump($valor);
		}*/

		foreach ($response->FECAESolicitarResult->FeDetResp as $detalle) {

			$datosCAE = array(	'CbteNro'  => $detalle->CbteDesde,
								'CAE'      => $detalle->CAE,
								'FechaVto' => $detalle->CAEFchVto
							 );
		}

		$datosCAE['Resultado'] = $response->FECAESolicitarResult->FeCabResp->Resultado;
		
		if (isset($response->FECAESolicitarResult->FeDetResp->FECAEDetResponse->Observaciones)){

			foreach ($response->FECAESolicitarResult->FeDetResp->FECAEDetResponse->Observaciones as $E){
				$datosObs[] = array( 'Code' => $E->Code, 
			  						 'Msg' => utf8_decode($E->Msg)
			  						);
			}
			$datosCAE['Observaciones'] = $datosObs;
		}

		if ($response->FECAESolicitarResult->FeCabResp->Resultado <> 'A'){
			
			$contador = 0;

			if (isset($response->FECAESolicitarResult->Errors)){
				$contador = 1;
				foreach ($response->FECAESolicitarResult->Errors as $E){
					$datosERR[] = array( 'ErrCode' => $E->Code, 
				  					 	 'ErrMsg' => utf8_decode($E->Msg)
				  						);
				}				
			}
			
			if ($contador){
				$datosCAE['Errors'] = $datosERR;
			}
		}
		
		return $datosCAE;
	}
}
?>