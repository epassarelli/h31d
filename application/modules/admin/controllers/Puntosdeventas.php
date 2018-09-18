<?php defined("BASEPATH") or exit("No direct script access allowed");

class Puntosdeventas extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Puntosdeventas";
    }

	public function index()
	{
		$crud = new grocery_CRUD();
		
		$crud->set_table("puntosdeventa");
		$crud->set_subject("Puntos de Venta");

		// Show in
		$crud->add_fields(["nombre", "provincia", "localidad", "calle", "correo", "web", "latitud", "longitud", "telefono", "image"]);
		$crud->edit_fields(["nombre", "provincia", "localidad", "calle", "correo", "web", "latitud", "longitud", "telefono", "image"]);
		$crud->columns(["nombre", "provincia", "localidad", "calle", "correo", "web", "latitud", "longitud", "telefono", "image"]);

		// Fields type
		$crud->field_type("idPuntosdeventa", "integer");
		$crud->field_type("nombre", "string");
		$crud->field_type("provincia", "string");
		$crud->field_type("localidad", "string");
		$crud->field_type("calle", "string");
		$crud->field_type("correo", "string");
		$crud->field_type("web", "string");
		$crud->field_type("latitud", "string");
		$crud->field_type("longitud", "string");
		$crud->field_type("telefono", "string");
		$crud->set_field_upload("image", 'assets/uploads');

		// Relation n-n

		// Validation
		$crud->set_rules("provincia", "Provincia", "required");
		$crud->set_rules("localidad", "Localidad", "required");
		$crud->set_rules("calle", "Calle", "required");
		$crud->set_rules("correo", "Correo", "required|valid_email");
		$crud->set_rules("web", "Web", "required|valid_url");
		$crud->set_rules("telefono", "Telefono", "required");
		$crud->set_rules("image", "Image", "required");
		$crud->set_rules("nombre", "Nombre", "required");

		// Display As
		$crud->display_as("provincia", "Provincia");
		$crud->display_as("localidad", "Localidad");
		$crud->display_as("calle", "Calle");
		$crud->display_as("correo", "Email");
		$crud->display_as("web", "Web");
		$crud->display_as("latitud", "Latitud");
		$crud->display_as("longitud", "Longitud");
		$crud->display_as("telefono", "Telefono");
		$crud->display_as("image", "Foto");
		$crud->display_as("nombre", "Nombre");

		// Unset action

		$data = (array) $crud->render();

		$this->layout->set_wrapper( 'grocery', $data,'page', false);

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Puntos de Venta";
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}
}

/* End of file Puntosdeventas.php */
/* Location: ./application/modules/admin/controllers/Puntosdeventas.php */