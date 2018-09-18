<?php defined("BASEPATH") or exit("No direct script access allowed");

class Tags extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Tags";
    }

	public function index()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table("tags");
		$crud->set_subject("Tags");

		// Show in
		$crud->add_fields(["categoria", "name"]);
		$crud->edit_fields(["categoria", "name"]);
		$crud->columns(["categoria", "name"]);

		// Fields type
		$crud->field_type("idtags", "integer");
		$crud->field_type("name", "string");
		//$crud->field_type("categoria", "options");

		// Relation n-n

		// Validation
		$crud->set_rules("name", "Name", "required");

		// Display As
		$crud->display_as("name", "Nombre");

		// Unset action

		$data = (array) $crud->render();

		$this->layout->set_wrapper( 'grocery', $data,'page', false);

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Filtros";
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}
}

/* End of file Tags.php */
/* Location: ./application/modules/admin/controllers/Tags.php */