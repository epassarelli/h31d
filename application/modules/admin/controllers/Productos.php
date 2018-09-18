<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * Productos Controller.
 */
class Productos extends MY_Controller
{
    private $title;

    public function __construct()
    {
        parent::__construct();

        $this->title = "Productos";
    }

	public function index(){

		$this->title = "Productos";

        $template_data['js_plugins'] = [
            base_url('assets/plugins/speakingurl/speakingurl.min.js'),
            base_url('assets/plugins/jquery.stringtoslug/dist/jquery.stringtoslug.min.js'),
            base_url('assets/plugins/slug.productos.js'),
        ];

		$crud = new grocery_CRUD();
		
		$crud->set_table("productos");
		$crud->set_subject("Productos");

		// Show in
		$crud->add_fields(["codigo", "nombre", "subtitulo", "precio", "description", "foto1", "foto2", "foto3", "foto4", "foto5", "slug", "tags", "Categorias", "caracteristica1", "caracteristicas1", "caracteristica2", "caracteristicas2", "caracteristica3", "caracteristicas3", "caracteristica4", "caracteristicas4", "caracteristica5", "caracteristicas5"]);
		$crud->edit_fields(["codigo", "nombre", "subtitulo", "precio", "description", "foto1", "foto2", "foto3", "foto4", "foto5", "slug", "tags", "Categorias", "caracteristica1", "caracteristicas1", "caracteristica2", "caracteristicas2", "caracteristica3", "caracteristicas3", "caracteristica4", "caracteristicas4", "caracteristica5", "caracteristicas5"]);
		$crud->columns(["codigo", "nombre", "precio", "foto1", "description", "tags", "Categorias"]);

		// Fields type
		$crud->field_type("idproducts", "integer");
		$crud->field_type("nombre", "string");
		$crud->field_type("subtitulo", "string");
		$crud->field_type("precio", "integer");
		$crud->field_type("description", "text");
		$crud->set_field_upload("foto1", 'assets/uploads');
		$crud->set_field_upload("foto2", 'assets/uploads');
		$crud->set_field_upload("foto3", 'assets/uploads');
		$crud->set_field_upload("foto4", 'assets/uploads');
		$crud->set_field_upload("foto5", 'assets/uploads');
		$crud->field_type('slug','invisible');
		$crud->callback_before_insert(array($this,'createSlug_callback'));
		$crud->callback_before_update(array($this,'createSlug_callback'));
		$crud->field_type("caracteristicas1", "text");
		$crud->field_type("caracteristicas2", "text");
		$crud->field_type("caracteristicas3", "text");
		$crud->field_type("caracteristicas4", "text");
		$crud->field_type("caracteristicas5", "text");		

		// Relation n-n
		$crud->set_relation_n_n('tags', 'productos_has_tags', 'tags', 'products_idproducts', 'tags_idtags', 'name');
		$crud->set_relation_n_n('Categorias', 'productos_has_categorias', 'categorias', 'products_idproducts', 'categories_idcategories', 'name');

		// Validation
		$crud->set_rules("nombre", "Nombre", "required");
		$crud->set_rules("precio", "Precio", "decimal");
		$crud->set_rules("description", "Description", "required");

		// Display As
		$crud->display_as("nombre", "Nombre");
		$crud->display_as("subtitulo", "Subtitulo");
		$crud->display_as("precio", "Precio");
		$crud->display_as("description", "Descripcion");
		$crud->display_as("foto1", "Foto 1");
		$crud->display_as("foto2", "Foto 2");
		$crud->display_as("foto3", "Foto  3");
		$crud->display_as("foto4", "Foto  4");
		$crud->display_as("foto5", "Foto  5");
		$crud->display_as("slug", "Slug");

		$crud->display_as("caracteristica1", "Caracteristica 1");
		$crud->display_as("caracteristica2", "Caracteristica 2");
		$crud->display_as("caracteristica3", "Caracteristica 3");
		$crud->display_as("caracteristica4", "Caracteristica 4");
		$crud->display_as("caracteristica5", "Caracteristica 5");

		$crud->display_as("caracteristicas1", "Caracteristicas");
		$crud->display_as("caracteristicas2", "Caracteristicas");
		$crud->display_as("caracteristicas3", "Caracteristicas");
		$crud->display_as("caracteristicas4", "Caracteristicas");
		$crud->display_as("caracteristicas5", "Caracteristicas");


		// Unset action
		$crud->change_field_type('slug', 'disabled');
		
		$data = (array) $crud->render();

		$this->layout->set_wrapper('productos', $data, 'page', false);

		//$this->layout->setCacheAssets();

		$template_data['grocery_css'] = $data['css_files'];
		$template_data['grocery_js']  = $data['js_files'];
		$template_data["title"] = "Productos";
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

	    $string = $post_array['nombre'];

	    // -- Remove duplicated spaces
	    $stripped = preg_replace(array('/\s{2,}/', '/[\t\n]/'), ' ', $string);

	    // -- Returns the slug

	    $post_array['slug'] = 'productos/detalle/' . strtolower(strtr($string, $table));

		return $post_array;

	    //return strtolower(strtr($string, $table));
	}


}

/* End of file Productos.php */
/* Location: ./application/modules/admin/controllers/Productos.php */