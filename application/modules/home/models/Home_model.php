<?php
/*
DROP TABLE IF EXISTS `impactoh_held`.`slider`;
CREATE TABLE  `impactoh_held`.`slider` (
  `idslider` int(11) NOT NULL AUTO_INCREMENT,
  `imagen` varchar(45) DEFAULT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idslider`),
  UNIQUE KEY `idslider_UNIQUE` (`idslider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
*/
class Home_model extends CI_Model 
{
    public function __construct() {

        // Call the Model constructor
        parent::__construct();
        $this->table = 'home_setting';
    }


    public function get_CategoriasIzquierda()
    {

      $query = $this->db->query("SELECT image, slug FROM categorias WHERE 
        categorias.idcategorias IN (SELECT categoria1 FROM $this->table) OR 
        categorias.idcategorias IN (SELECT categoria2 FROM $this->table)");

      $result = $query->result_array();
      return $result;
    }


    public function get_CategoriasDerecha()
    {
      $query = $this->db->query("SELECT image2, slug FROM categorias 
        WHERE categorias.idcategorias IN (SELECT categoria3 FROM $this->table)");
        
      $result = $query->result_array();
      return $result;
    }


    public function get_Productos()
    {
      $query = $this->db->query("SELECT nombre, subtitulo, description, foto1, slug FROM productos WHERE 
        productos.idproducts IN (SELECT producto1 FROM $this->table) OR 
        productos.idproducts IN (SELECT producto2 FROM $this->table) OR 
        productos.idproducts IN (SELECT producto3 FROM $this->table) OR 
        productos.idproducts IN (SELECT producto4 FROM $this->table)");

      $result = $query->result_array();
      return $result;
    }


    public function get_Video()
    {
      $this->db->select('video');
      
      $query = $this->db->get( $this->table );
      
      $result = $query->result_array();
      return $result;
    }    

    public function getDestacados(){
      $this->db->select('destacado1, destacado1_link, destacado2, destacado2_link, destacado3, destacado3_link');
      $query = $this->db->get( $this->table );

      return $query->row_array();   
    }

}
?>