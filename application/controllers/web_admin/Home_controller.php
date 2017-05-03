<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home_controller extends MY_Controller {

   public function __construct() {
        parent:: __construct();
		
		
    }

	public function total_imagenes($ar) 
	{ 
		return $ar;
	}
    public function index() 
	{
		/*$this->validate_access();*/
		$sql = "select * from ".DB_ESQUEMA_WEB.".gw_articulo";
		$articulos = $this->db->query($sql);
		$data['articulos'] = $articulos->num_rows();
		
		$sql = "select * from ".DB_ESQUEMA_WEB.".gw_banner where activo = 't'";
		$banneractivos = $this->db->query($sql);
		$data['banners'] = $banneractivos->num_rows();
		
		$sql = "select * from ".DB_ESQUEMA_WEB.".gw_video";
		$videos = $this->db->query($sql);
		$data['videos'] = $videos->num_rows();

		
		$data['imagenes'] = count(listar_archivos(MANEJADOR_WEB_RUTA));
		
		
		
        $this->add_view(MANEJADOR_WEB."/Home",$data);
        $this->render();
    }
	
	
	
	
	
	
	
	
	
	
	
	
}
