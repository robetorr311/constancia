<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends MY_Controller {

   public function __construct() {
        parent:: __construct();
    }

    public function index() 
	{
		$this->add_view("contenido");
		$this->render();
    }
}
