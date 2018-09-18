<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tecnologia extends MY_Controller{

    public function index(){
        
        $this->load->model('tecnologia_model');
        $data['tecnologias'] = $this->tecnologia_model->get_Tecnologias();
        //var_dump($data['tecnologias']);die();
		
		$data['view']			= "tecnologia_home_view";
		$this->load->view('template/layout_view', $data);
    }


}