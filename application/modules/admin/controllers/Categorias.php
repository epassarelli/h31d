<?php defined("BASEPATH") or exit("No direct script access allowed");

class Categorias extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Categorias";
    }

    public function index()
    {
        
        $template_data['js_plugins'] = [
            /* jquery.stringtoslug */
            base_url('assets/plugins/speakingurl/speakingurl.min.js'),
            base_url('assets/plugins/jquery.stringtoslug/dist/jquery.stringtoslug.min.js'),
            base_url('assets/plugins/slug.categorias.js'),
        ];

		$crud = new grocery_CRUD();
		
		$state_code = $crud->getState();	
		
		$crud->set_table("categorias");
		$crud->set_subject("Categorias");

		// Show in
		$crud->add_fields(["name", "image", "orden", "slug"]);
		$crud->edit_fields(["name", "image", "orden", "slug"]);
		$crud->columns(["name", "image", "orden", "slug"]);

		// Fields type
		$crud->field_type("idcategorias", "integer");
		$crud->field_type("name", "string");
		$crud->set_field_upload("image", 'assets/uploads');
		$crud->field_type("orden", 'integer');
		$crud->field_type('slug','invisible');
		$crud->callback_before_insert(array($this,'createSlug_callback'));
		$crud->callback_before_update(array($this,'createSlug_callback'));
		
		// Relation n-n

		// Validation
		$crud->set_rules("name", "Name", "required");
		$crud->set_rules("image", "Imagen", "required");
		$crud->set_rules("orden", "Orden", "required");
		
		// Display As
		$crud->display_as("name", "Descripcion");
		$crud->display_as("image", "Imagen");
		$crud->display_as("orden", "Orden");
		$crud->display_as("slug", "Slug");

		// Unset action

        $crud->change_field_type('slug', 'disabled');

		$data = (array) $crud->render();

		//$this->layout->set_wrapper( 'grocery', $data,'page', false);
        $this->layout->set_wrapper('categorias', $data, 'page', false);
        
        $this->layout->setCacheAssets();

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] =  $this->title;
		$template_data["crumb"] = ["table" => ""];
		$this->layout->auth();
		$this->layout->render('admin', $template_data); // front - auth - admin
	}

	public static function createSlug_callback($post_array) {

	    $table = array(
	            'Š'=>'S', 'š'=>'s', 'Đ'=>'Dj', 'đ'=>'dj', 'Ž'=>'Z', 'ž'=>'z', 'Č'=>'C', 'č'=>'c', 'Ć'=>'C', 'ć'=>'c',
	            'À'=>'A', 'Á'=>'A', 'Â'=>'A', 'Ã'=>'A', 'Ä'=>'A', 'Å'=>'A', 'Æ'=>'A', 'Ç'=>'C', 'È'=>'E', 'É'=>'E',
	            'Ê'=>'E', 'Ë'=>'E', 'Ì'=>'I', 'Í'=>'I', 'Î'=>'I', 'Ï'=>'I', 'Ñ'=>'N', 'Ò'=>'O', 'Ó'=>'O', 'Ô'=>'O',
	            'Õ'=>'O', 'Ö'=>'O', 'Ø'=>'O', 'Ù'=>'U', 'Ú'=>'U', 'Û'=>'U', 'Ü'=>'U', 'Ý'=>'Y', 'Þ'=>'B', 'ß'=>'Ss',
	            'à'=>'a', 'á'=>'a', 'â'=>'a', 'ã'=>'a', 'ä'=>'a', 'å'=>'a', 'æ'=>'a', 'ç'=>'c', 'è'=>'e', 'é'=>'e',
	            'ê'=>'e', 'ë'=>'e', 'ì'=>'i', 'í'=>'i', 'î'=>'i', 'ï'=>'i', 'ð'=>'o', 'ñ'=>'n', 'ò'=>'o', 'ó'=>'o',
	            'ô'=>'o', 'õ'=>'o', 'ö'=>'o', 'ø'=>'o', 'ù'=>'u', 'ú'=>'u', 'û'=>'u', 'ý'=>'y', 'ý'=>'y', 'þ'=>'b',
	            'ÿ'=>'y', 'Ŕ'=>'R', 'ŕ'=>'r', '/' => '-', ' ' => '-'
	    );

	    $string = $post_array['name'];

	    // -- Remove duplicated spaces
	    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

	    // -- Returns the slug

	    $post_array['slug'] = 'productos/categoria/' . strtolower(strtr($string, $table));

		return $post_array;

	    //return strtolower(strtr($string, $table));
	}
}

/* End of file Categorias.php */
/* Location: ./application/modules/admin/controllers/Categorias.php */