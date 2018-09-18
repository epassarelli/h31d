<?php defined('BASEPATH') or exit('No direct script access allowed');

class Productos extends MY_Controller{
    
    private $title;


    public function __construct(){
    	parent::__construct();
		$this->load->model('productos_model');
    	$this->load->model('categorias_model');
		$this->load->model('tags_model');
    }


    public function index(){
		$data['view']		= "productos_home_view";
		$data['categorias']	= $this->categorias_model->get_Categorias();

		$this->load->view('template/layout_view', $data);
    }


    public function categoria(){
		$segs 				= $this->uri->segment_array();		
		$slug 				= end($segs);
		$data['productosByCategoria'] = $this->productos_model->get_ProductosByCategoria($slug);
		$data['fotoCategoria'] = $this->categorias_model->get_fotoCategoria($slug);
		$data['tags'] 		= $this->tags_model->get_Tags();
		$data['view']		= "productos_categoria_view";
		$this->load->view('template/layout_view', $data);
    }


    public function tag(){
		$segs 				= $this->uri->segment_array();		
		$slug 				= end($segs);
		$data['tag'] 		= $slug;
		$data['productosByTag'] = $this->productos_model->get_ProductosByTag($slug);	
		$data['tags'] 		= $this->tags_model->get_Tags();
		$data['view']		= "productos_tag_view";
		$this->load->view('template/layout_view', $data);
    }


    public function detalle(){ 	
		$segs 				= $this->uri->segment_array();		
		$slug 				= end($segs);
		$data['productosByDetalle'] = $this->productos_model->get_ProductosByDetalle($slug);
		$data['view']		= "productos_detalle_view";
		$this->load->view('template/layout_view', $data);
    }


    public function busqueda(){
		$data['productos'] 	= $this->productos_model->get_ProductosByCategoria();
		$data['categorias']	= $this->categorias_model->get_Categorias();
		$data['tags'] 		= $this->tags_model->get_Tags();
		$data['view']		= "productos_busqueda_view";
		$this->load->view('template/layout_view', $data);		
    }

}