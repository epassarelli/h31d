<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Contacto extends MY_Controller{

    public function index(){

		$data['view']			= "contacto_home_view";
		$this->load->view('template/layout_view', $data);
    }


	public function sendEmail(){

        $this->load->library("email");
        $this->email->initialize();

        // Correo desde donde se envia
	    $this->email->from('correo@held.com.ar', 'HELD Argentina Contacto');
	    // Correo principal de destino
	    $this->email->to('manria@urquizamotos.com.ar');
		// Correo secundario para recibir
		$this->email->cc('correo2@held.com.ar');
		
		$fechaOC = date('d/m/Y');
		$this->email->subject('Contacto desde Held - Contacto');

	    $sql = '<p align=\"left\">Nombre: '.$_POST['nombre'].'</p><p align=\"left\">Email: '. $_POST['email'] .'</p><p align=\"left\">Localidad: '. $_POST['localidad'] .'</p><p align=\"left\">Asunto: '. $_POST['asunto'] .'</p>';

	    $sql .= '<p align=\"left\">Mensaje: ' . $_POST['mensaje'] . '</p>';

	    
	    $this->email->message($sql);
	    $r = $this->email->send();


		
		if (!$r){
	        $info = array('mensage' => $this->email->print_debugger());
	        //var_dump($this->email->print_debugger());
		} else {
	        $info = array('mensage' => 'OK');
	        //echo 'OK';
		}

        header('Content-Type: application/json');
        echo json_encode($info);
        //echo '{"data":' . json_encode($msg) . '}';  
        //echo 'LA CONCHA DE TU MADRE!!';

	}

}