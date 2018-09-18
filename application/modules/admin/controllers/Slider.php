<?php defined("BASEPATH") or exit("No direct script access allowed");

class Slider extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Slider";
    }

	public function index()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table("slider");
		$crud->set_subject("Slider");

		// Show in
		$crud->add_fields(["imagen", "titulo", "link"]);
		$crud->edit_fields(["imagen", "titulo", "link"]);
		$crud->columns(["imagen", "titulo", "link"]);

		// Fields type
		$crud->field_type("idslider", "integer");
		$crud->set_field_upload("imagen", 'assets/uploads');
		$crud->field_type("titulo", "string");

		// Relation n-n

		// Validation
		$crud->set_rules("imagen", "Imagen", "required");
		$crud->set_rules("titulo", "Titulo", "required");

		// Display As
		$crud->display_as("imagen", "Imagen");
		$crud->display_as("titulo", "Titulo");

		// Unset action

		$data = (array) $crud->render();

		$this->layout->set_wrapper( 'grocery', $data,'page', false);

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Slider";
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}
}

/* End of file Slider.php */
/* Location: ./application/modules/admin/controllers/Slider.php */