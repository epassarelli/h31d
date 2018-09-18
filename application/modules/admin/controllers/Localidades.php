<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Localidades extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Localidades_model');
    }
    
    public function index()
    {
        $data['provincias'] = $this->Localidades_model->provincias();
        $this->load->view('localidades_view',$data);
    }
    
    public function llena_localidades()
    {
        $options = "";
        if($this->input->post('provincia'))
        {
            $provincia = $this->input->post('provincia');
            $localidades = $this->Localidades_model->localidades($provincia);
            foreach($localidades as $fila)
            {
            ?>
            <option value="<?php echo base_url()?>penias-folkloricas-en-<?php echo $fila->loca_id?>-<?php echo url_title($fila->loca_nombre)?>.html"><?php echo $fila -> loca_nombre ?></option>
            <?php
            }
        }
    }

    public function getLocalidadesForm()
    {
        $options = "";
        if($this->input->post('provincia'))
        {
            $provincia = $this->input->post('provincia');
            $localidades = $this->Localidades_model->localidades($provincia);
            foreach($localidades as $fila)
            {
            ?>
            <option value="<?php echo $fila->loca_id?>"><?php echo $fila->loca_nombre?></option>
            <?php
            }
        }
    }

}