<?php
class Productos_model extends CI_Model 
{
    public function __construct() {
        parent::__construct();
        $this->table = 'productos';
    }

    public function get_ProductosByCategoria($categoriaSlug='') {

      $this->db->select("idproducts, nombre, precio, description, foto1, foto2, foto3, foto4, foto5, productos.slug");
      $this->db->from("productos_has_categorias");
      $this->db->join("categorias", "productos_has_categorias.categories_idcategories = categorias.idcategorias");
      $this->db->join("productos", "productos_has_categorias.products_idproducts = productos.idproducts");
      
      $this->db->like("categorias.slug", $categoriaSlug, "before");

      $this->db->order_by("idproducts", "ASC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      //$result = $query->result_array();

      foreach ($query->result() as $row) {

        $this->db->select("categoria, name");
        $this->db->from("productos_has_tags");
        $this->db->join("tags", "productos_has_tags.tags_idtags = tags.idtags");
        $this->db->where("productos_has_tags.products_idproducts",  $row->idproducts);
        $this->db->order_by("categoria ASC, name ASC");

        $queryTags = $this->db->get();
        //echo $this->db->last_query();       
        $tags = array();

        foreach ($queryTags->result() as $rowTags) {
          $tags[] = array('categoria' => $rowTags->categoria,
                          'name' => $rowTags->name
                         );
        }

        $result[] = array(
          'idproducts' => $row->idproducts,
          'nombre' => $row->nombre,
          'precio' => $row->precio,
          'description' => $row->description,
          'foto1' => $row->foto1, 
          'foto2' => $row->foto2, 
          'foto3' => $row->foto3, 
          'foto4' => $row->foto4,
          'foto5' => $row->foto5,
          'slug' => $row->slug,
          'tagsProducto' => $tags
        );
      }

      return $result;

    }

    public function get_ProductosByDetalle($productoSlug='') {

      $this->db->select("categorias.`name`, idproducts, codigo, nombre, precio, description, foto1, foto2, foto3, foto4, foto5, productos.slug, caracteristica1, caracteristicas1, caracteristica2, caracteristicas2, caracteristica3, caracteristicas3, caracteristica4, caracteristicas4, caracteristica5, caracteristicas5");
      $this->db->from("productos");

      $this->db->join("productos_has_categorias", "productos_has_categorias.products_idproducts = productos.idproducts");
      $this->db->join("categorias", "productos_has_categorias.categories_idcategories = categorias.idcategorias");

      $this->db->like("productos.slug", $productoSlug, "before");
      //$this->db->order_by("idproducts", "ASC");
      $query = $this->db->get();
      //echo $this->db->last_query();
      $result = $query->row_array();
      return $result;     
    }

    public function get_ProductosByTag($productoTag=''){
      $this->db->from("productos");
      $this->db->join("productos_has_tags", "productos_has_tags.products_idproducts = productos.idproducts");
      $this->db->join("tags", "productos_has_tags.tags_idtags = tags.idtags");
      $this->db->like("tags.name", $productoTag, "before");
      $query = $this->db->get();
      return $query->result();
    }

    public function getProductos(){
      $this->db->from("productos");
      $this->db->join("productos_has_categorias", "productos_has_categorias.products_idproducts = productos.idproducts");
      $this->db->join("categorias", "productos_has_categorias.categories_idcategories = categorias.idcategorias");
      $this->db->join("productos_has_tags", "productos_has_tags.products_idproducts = productos.idproducts");
      $this->db->join("tags", "productos_has_tags.tags_idtags = tags.idtags");
      $query = $this->db->get();
      $result = $query->row_array();     
    }

}
?>