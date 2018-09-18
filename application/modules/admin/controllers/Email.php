<?php defined("BASEPATH") or exit("No direct script access allowed");

class Email extends MY_Controller
{
    private $title;

    public function __construct() {
        parent::__construct();

        $this->title = "Email";
    }

	public function index() {

		$crud = new grocery_CRUD();
		
		$crud->set_table("email_setting");
		$crud->set_subject("Configuracion Email");

		// Show in
		$crud->add_fields(["email_contacto", "email_catalogo", "protocol", "smtp_host", "smtp_port", "smtp_user", "smtp_pass", "mailtype", "charset", "newline", "wordwrap"]);
		$crud->edit_fields(["email_contacto", "email_catalogo", "protocol", "smtp_host", "smtp_port", "smtp_user", "smtp_pass", "mailtype", "charset", "newline", "wordwrap"]);
		$crud->columns(["email_contacto", "email_catalogo", "protocol", "smtp_host", "smtp_port", "smtp_user", "smtp_pass", "mailtype", "charset", "newline", "wordwrap"]);

		// Fields type
		$crud->field_type("id", "integer");
		$crud->field_type("email_contacto", "string");
		$crud->field_type("email_catalogo", "string");
		$crud->field_type("protocol", "enum");
		$crud->field_type("smtp_host", "string");
		$crud->field_type("smtp_port", "integer");
		$crud->field_type("smtp_user", "string");
		$crud->field_type("smtp_pass", "string");
		$crud->field_type("mailtype", "enum");
		$crud->field_type("charset", "enum");
		$crud->field_type("newline", "string");
		$crud->field_type("wordwrap", "true_false");

		// Relation n-n

		// Validation
		$crud->set_rules("email_contacto", "Email Contacto", "required|valid_email");
		$crud->set_rules("email_catalogo", "Email Catalogo", "required|valid_email");
		$crud->set_rules("protocol", "Protocolo SMTP", "required");
		$crud->set_rules("smtp_host", "SMTP Host", "required");
		$crud->set_rules("smtp_port", "SMTP Puerto", "required");
		$crud->set_rules("smtp_user", "SMTP Usuario", "required");
		$crud->set_rules("smtp_pass", "SMTP Contraseña", "required");
		$crud->set_rules("mailtype", "Tipo de Mail", "required");
		$crud->set_rules("charset", "Juego de Caracteres", "required");
		$crud->set_rules("newline", "Nueva Linea", "required");
		$crud->set_rules("wordwrap", "Ajuste de Línea", "required");

		// Display As

		// Unset action

		$data = (array) $crud->render();

		$this->layout->set_wrapper( 'grocery', $data,'page', false);

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Configuracion Email";
		$template_data["crumb"] = [];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}
}

/* End of file Email.php */
/* Location: ./application/modules/admin/controllers/Email.php */