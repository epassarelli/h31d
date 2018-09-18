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
class Slider_model extends CI_Model 
{
    public function __construct() {

        // Call the Model constructor
        parent::__construct();
        $this->table = 'slider';
    }

    public function get_Sliders()
    {

        $this->db->order_by("idslider", "desc"); 
        $this->db->limit(5);
        
        $query = $this->db->get( $this->table );
        
        $result = $query->result_array();
        return $result;
    }

}
?>