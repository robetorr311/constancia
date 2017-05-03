<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Acceso extends MY_Controller {

   public function __construct() {
        parent:: __construct();
        $this->load->model('constancias/Inicio_model');
        
    }
    
    
    public function index() 
	{
	   	$usu = $this->session->userdata('usuario');
		$this->add_view("constancias/acceso",'', "main");
		$this->render($usu,"Sigesmed");
		
    }
	
	
}
