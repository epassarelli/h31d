<?php
class Tags_model extends CI_Model{
    
    public function __construct() {
        parent::__construct();
        $this->table = 'tags';
    }

    public function get_Tags() {
      $this->db->select("idtags, categoria, name");
      $this->db->order_by("categoria ASC, name ASC");
      $query = $this->db->get( $this->table );
      $result = $query->result_array();
      return $result;
    }

}
?>