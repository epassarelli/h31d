<?php (defined('BASEPATH')) or exit('No direct script access allowed');

/**
 * Description of base_controller
 *
 * @author rogier
 */
class MY_Controller extends MX_Controller
{
    /**
     * Contructor, used to reference to the parents constructor.
     */
    public function __construct()
    {
        parent::__construct();
        
        $this->config->load('myigniter');
        $this->load->library('layout');
        $this->load->library('ion_auth');
        $this->load->helper('utility');

        $this->layout->sess_language();
    }

    public function getUniqueCode($length = 32)
    {
        $code = md5(uniqid(rand(), true));
        if ($length != ""){
            return substr($code, 0, $length);
        } else {
            return $code;
        }
    }
}