<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Historia extends MY_Controller{

    public function index(){
		$data['view']			= "historia_home_view";
		$this->load->view('template/layout_view', $data);
    }


}