<?php defined("BASEPATH") or exit("No direct script access allowed");

class Home extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Home";
    }

	public function index()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table("home_setting");
		$crud->set_subject("Configuracion Home");

		// Show in
		$crud->add_fields(["destacado1", "destacado1_link","destacado2", "destacado2_link", "destacado3", "destacado3_link", "video", "producto1", "producto2", "producto3", "producto4"]);
		$crud->edit_fields(["destacado1", "destacado1_link","destacado2", "destacado2_link", "destacado3", "destacado3_link", "video", "producto1", "producto2", "producto3", "producto4"]);
		$crud->columns(["destacado1", "destacado2", "destacado3", "video", "producto1", "producto2", "producto3", "producto4"]);

		// Fields type
		//$crud->set_relation("destacado1", "categorias", "name");
		//$crud->set_relation("destacado2", "categorias", "name");
		//$crud->set_relation("destacado3", "categorias", "name");
		
		$crud->field_type("video", "string");
		$crud->set_field_upload("destacado1", 'assets/uploads');
		$crud->set_field_upload("destacado2", 'assets/uploads');
		$crud->set_field_upload("destacado3", 'assets/uploads');
		
		// Relation 1-n
		$crud->set_relation("producto1", "productos", "nombre");
		$crud->set_relation("producto2", "productos", "nombre");
		$crud->set_relation("producto3", "productos", "nombre");
		$crud->set_relation("producto4", "productos", "nombre");

		// Relation n-n

		// Validation
		$crud->set_rules("destacado1", "destacado2", "required");
		$crud->set_rules("destacado2", "destacado2", "required");
		$crud->set_rules("destacado3", "destacado3", "required");
		$crud->set_rules("video", "Video", "required|valid_url|valid_url");
		$crud->set_rules("producto1", "Producto1", "required");
		$crud->set_rules("producto2", "Producto2", "required");
		$crud->set_rules("producto3", "Producto3", "required");
		$crud->set_rules("producto4", "Producto4", "required");

		// Display As
		$crud->display_as("destacado1", "Destacado 1");
		$crud->display_as("destacado2", "Destacado 2");
		$crud->display_as("destacado3", "Destacado 3");
		$crud->display_as("video", "Url del Video");
		$crud->display_as("producto1", "1er. Producto Izquierda");
		$crud->display_as("producto2", "2dor. Producto Izquierda");
		$crud->display_as("producto3", "1er. Producto Derecha");
		$crud->display_as("producto4", "2do. Producto Derecha");

		// Unset action
		$crud->unset_add();
		$crud->unset_delete();

		$data = (array) $crud->render();

		$this->layout->set_wrapper( 'grocery', $data,'page', false);

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Configuracion Home";
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}
}

/* End of file Home.php */
/* Location: ./application/modules/admin/controllers/Home.php */