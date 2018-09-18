<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Locales extends MY_Controller{

    public function index(){
        $this->load->model('locales_model');
        //$this->load->model('Provincias_model');
        $this->load->model('admin/Localidades_model');
        $data['provincias'] = $this->Localidades_model->provincias();
        $data['locales'] = $this->locales_model->get_PuntosDeVentas();
		
		$data['view']			= "locales_home_view";
		$this->load->view('template/layout_view', $data);
    }


}