<?php defined("BASEPATH") or exit("No direct script access allowed");

class Tecnologias extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Tecnologias";
    }

	public function index()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table("tecnologias");
		$crud->set_subject("Tecnologias");

		// Show in
		$crud->add_fields(["categoria", "titulo", "descripcion"]);
		$crud->edit_fields(["categoria", "titulo", "descripcion"]);
		$crud->columns(["categoria", "titulo", "descripcion"]);

		// Fields type
		$crud->field_type("idtecnologias", "integer");
		$crud->set_relation("categoria", "tecnologias_categorias", "name");
		//$crud->field_type("categoria", "enum");
		$crud->field_type("titulo", "string");
		$crud->field_type("descripcion", "text");

		// Relation n-n

		// Validation
		$crud->set_rules("categoria", "Categoria", "required");
		$crud->set_rules("titulo", "Titulo", "required");
		$crud->set_rules("descripcion", "Descripcion", "required");

		// Display As
		$crud->display_as("categoria", "Categoria");
		$crud->display_as("titulo", "Titulo");
		$crud->display_as("descripcion", "Descripcion");

		// Unset action

		$data = (array) $crud->render();

		$this->layout->set_wrapper( 'grocery', $data,'page', false);

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Tecnologias";
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}
}

/* End of file Tecnologias.php */
/* Location: ./application/modules/admin/controllers/Tecnologias.php */