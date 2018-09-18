<?php
/**
 * Copyright (C) 2015 Juan Manuel Castro
 **/

class WSAA extends SoapClient {
	private $scOpts = array(
		'soap_version'   => SOAP_1_2,
		'location'       => WSAA_URL,
		'trace'          => 1,
		'exceptions'     => true
	);
	
	private $signedTRA;
	private $Service;
	private $Token;
	private $Sign;

	public function __construct($service) {
		parent::SoapClient(WSAA_WSDL_URL, $this->scOpts);
		$this->Service = $service;
	}

	private function createTRA() {
		$TRA = new SimpleXMLElement(
			'<?xml version="1.0" encoding="UTF-8"?>' .
			'<loginTicketRequest version="1.0">'.
			'</loginTicketRequest>');
		$TRA->addChild('header');
		$TRA->header->addChild('uniqueId',date('U'));
		$TRA->header->addChild('generationTime',date('c',date('U')-60));
		$TRA->header->addChild('expirationTime',date('c',date('U')+60));
		$TRA->addChild('service', $this->Service);
		$TRA->asXML('TRA'.CUIT_WSAA_TRA.'.xml');
	}

	private function signTRA() {
		$STATUS=openssl_pkcs7_sign(realpath("") . "/TRA".CUIT_WSAA_TRA.".xml", realpath("") . "/TRA".CUIT_WSAA_TRA.".tmp", "file://" . realpath("") . CERT,
    		array("file://" . realpath("") . PRIV_KEY, PASSPHRASE),
    		array(),
    		!PKCS7_DETACHED
  		);
		
		if (!$STATUS) exit("ERROR generating PKCS#7 signature\n");
		
		$inf=fopen("./TRA".CUIT_WSAA_TRA.".tmp", "r");
		$i=0;
		$CMS="";
		
		while (!feof($inf)) {
			$buffer=fgets($inf);
			if ( $i++ >= 4 ) $CMS.=$buffer;
		}
		fclose($inf);
		unlink("TRA".CUIT_WSAA_TRA.".tmp");
		unlink("TRA".CUIT_WSAA_TRA.".xml");
		$this->signedTRA = $CMS;
	}

	private function callWSAA() {
		$respFile = realpath("") . '/loginCms'.CUIT_WSAA_TRA.'.xml';
		//$respFile = 'D:\wamp\www\gazaba\loginCms'.CUIT_WSAA_TRA.'.xml';
			
		// Si existe el archivo con la respuesta, tomar los datos para evaluar validez
		if( file_exists($respFile) ) {
			$xmlResponse = simplexml_load_file($respFile);
			$respDate = $xmlResponse->header->expirationTime;
			$pattern = "/(\d{4}-\d{2}-\d{2})T(\d{2}:\d{2}:\d{2}\.\d{3})(.*)/";
			preg_match($pattern,$respDate,$arrExpDate);
			$expDate = $arrExpDate[1].' '.$arrExpDate[2].' '.$arrExpDate[3];
			$strExpDate = strtotime($expDate);
			$now = date('Y-m-d H:i:s P');
			$strNow = strtotime($now);
		}

		// Si el ticket expiro, generarlo nuevamente
		if ( (! isset($strExpDate)) || (! isset($strNow)) || ($strNow > $strExpDate) ) {
			$results = $this->loginCms(array('in0'=>$this->signedTRA));
		
			file_put_contents($respFile, $results->loginCmsReturn);
			$xmlResponse = new SimpleXMLElement($results->loginCmsReturn);
			if (is_soap_fault($results)) {
				return ("SOAP Fault: ".$results->faultcode."\n".$results->faultstring."\n");
			}
		} /*else {
			echo "Usando ticket previo<br/>";
		}*/

		$this->Token = $xmlResponse->credentials->token;
		$this->Sign = $xmlResponse->credentials->sign;

		return 0;
	}

	public function getAuth() {
		$this->createTRA();
		$this->signTRA();
		$this->callWSAA();
		return array('Token' => $this->Token, 'Sign' => $this->Sign);
	}

}
?>