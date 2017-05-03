<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Prueba extends MY_Controller {

	public function __construct() {
        parent:: __construct();
    }

    public function index() 
	{
		if(!$this->validate_access()) return;
		$this->add_view('garantizado');
		$this->render();	
    }
	public function nuevo()
	{
		if(!$this->validate_access()) return;
		$this->add_view('garantizado');
		$this->render();
    }
    
    public function editar()
	{
		if(!$this->validate_access()) return;
		$this->add_view('garantizado');
		$this->render();
    }
    
    public function borrar()
	{
		if(!$this->validate_access()) return;
		$this->add_view('garantizado');
		$this->render();
    }
}
