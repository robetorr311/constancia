<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends MY_Controller {

   public function __construct() {
        parent:: __construct();
    }

    public function index() 
	{
		$husuario= $this->session->userdata('usr_id');
		$data['husuario']=$husuario;
		$this->load->model('constancias/Usuarios_constancia');
		$data['acc']=$this->Usuarios_constancia->acceso($husuario);				
		$this->add_view("constancias/contenido",$data);
		$this->render();
    }
}
