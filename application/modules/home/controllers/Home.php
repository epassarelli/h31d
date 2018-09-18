<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends MY_Controller{

    public function index(){
		$data['view']			= "home_view";

        $this->load->model('slider_model');
        $this->load->model('home_model');

        $data['sliders']        = $this->slider_model->get_Sliders();
        //$data['categoriasIzq']  = $this->home_model->get_CategoriasIzquierda();
        //$data['categoriasDer']  = $this->home_model->get_CategoriasDerecha();
        $data['destacados']     = $this->home_model->getDestacados();
        $data['productos']      = $this->home_model->get_Productos();       
        $data['video']          = $this->home_model->get_Video();
        //var_dump($data['destacados']);die();
		$this->load->view('template/layout_view', $data);
    }


}