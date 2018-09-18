<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Localidades_model extends CI_Model{
    
    public function __construct(){
        parent::__construct();
        $this->table = 'localidad';
    }
    
    public function provincias(){
        $this->db->order_by('nombre','asc');
        $query = $this->db->get('provincia');
        return $query->result();       
    }
    
    public function localidades($provincia_id){
        $this->db->where('provincia_id',$provincia_id);
        $this->db->order_by('nombre','asc');
        $query = $this->db->get('localidad');
        return $query->result();
    }
}