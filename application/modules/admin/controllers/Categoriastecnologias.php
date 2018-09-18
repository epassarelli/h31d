<?php defined("BASEPATH") or exit("No direct script access allowed");

class CategoriasTecnologias extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Categorias Tecnologias";
    }

    public function index()
    {

		$crud = new grocery_CRUD();
		
		$state_code = $crud->getState();	
		
		$crud->set_table("tecnologias_categorias");
		$crud->set_subject("Categorias Tecnologias");

		// Show in
		$crud->add_fields(["name"]);
		$crud->edit_fields(["name"]);
		$crud->columns(["name"]);

		// Fields type
		$crud->field_type("idcategorias", "integer");
		$crud->field_type("name", "string");
		
		// Relation n-n

		// Validation
		$crud->set_rules("name", "Name", "required");
		
		// Display As
		$crud->display_as("name", "Descripcion");

		// Unset action

		$data = (array) $crud->render();

		//$this->layout->set_wrapper( 'grocery', $data,'page', false);
        $this->layout->set_wrapper('categorias_tecnologias', $data, 'page', false);
        
        $this->layout->setCacheAssets();

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] =  $this->title;
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}

}

/* End of file CategoriasTecnologias.php */
/* Location: ./application/modules/admin/controllers/CategoriasTecnologias.php */