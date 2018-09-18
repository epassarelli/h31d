<?php

class Locales_model extends CI_Model 
{
    public function __construct() {

        // Call the Model constructor
        parent::__construct();
        $this->table = 'puntosdeventa';
    }


    public function get_PuntosDeVentas()
    {
      $query = $this->db->get( $this->table );
      
      $result = $query->result_array();
      return $result;
    }    
}
?>