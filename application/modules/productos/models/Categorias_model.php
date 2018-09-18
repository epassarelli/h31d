<?php
class Categorias_model extends CI_Model 
{
    public function __construct() {

        parent::__construct();
        $this->table = 'categorias';
    }

    public function get_Categorias() {

      //$this->db->select("idcategorias, name, image, slug");
      $this->db->order_by("orden", "ASC");
      $query = $this->db->get( $this->table );
      
      $result = $query->result_array();
      
      return $result;
    }

    public function get_fotoCategoria($categoriaSlug='') {
      
      $this->db->select("idcategorias, name, image, slug");
      $this->db->like("categorias.slug", $categoriaSlug, "before");

      $query = $this->db->get( $this->table );

      $result = $query->row_array();
      return $result;
    }

}
?>