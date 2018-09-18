<?php

class Tecnologia_model extends CI_Model 
{
    public function __construct() {

        // Call the Model constructor
        parent::__construct();
        $this->table = 'tecnologias';
    }


    public function get_Tecnologias()
    {
      $this->db->from('tecnologias');
      $this->db->join('tecnologias_categorias', 'tecnologias.categoria = tecnologias_categorias.idcategoriatecnologia');
      $this->db->order_by('categoria', 'titulo');      
      $query = $this->db->get();
      
      $result = $query->result_array();
      return $result;
    }    
}
?>