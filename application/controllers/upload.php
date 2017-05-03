<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Upload extends MY_Controller {

   public function __construct() {
        parent:: __construct();
		
		$this->load->helper(array('form', 'url'));
		
    }
   
	function index()
	{	
		$fotos=array();
		$ar=0;
		$directorio = opendir(MANEJADOR_WEB_RUTA_GALERIAS); 
		while ($archivo = readdir($directorio)) 
		{		
			if ($archivo != "." && $archivo != ".." && $archivo!="_notes" && $archivo!="index.html")  
			{	
				$ar = $ar + 1;
				$fotos[$ar] = $archivo;
			}
		}
		closedir($directorio); 
		
		
		$data['carpetas'] = $fotos;
		$data['error'] = '';
		
		$this->add_view('formulario_carga', $data);
		$this->render();
		
	}
	function do_upload()
	{	
		$fotos=array();
		$ar=0;
		$directorio = opendir(MANEJADOR_WEB_RUTA_GALERIAS); 
		while ($archivo = readdir($directorio)) 
		{		
			if ($archivo != "." && $archivo != ".." && $archivo!="_notes" && $archivo!="index.html")  
			{	
				$ar = $ar + 1;
				$fotos[$ar] = $archivo;
			}
		}
		closedir($directorio); 
		
		
		$data['carpetas'] = $fotos;
		
		$imagen_ruta = $this->input->post('imagen_ruta');
		if ($imagen_ruta == "articulos" or $imagen_ruta == "banners")
		{
			if ($imagen_ruta == "articulos")
			{
				$config['upload_path'] = "./".MANEJADOR_WEB_RUTA_ARTICULOS."/";
			}
			if ($imagen_ruta == "banners")
			{
				$config['upload_path'] = "./".MANEJADOR_WEB_RUTA_BANNERS."/";
			}
		}
		else
		{
			$config['upload_path'] = "./".MANEJADOR_WEB_RUTA_GALERIAS.$imagen_ruta."/";
		}
		
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '1024';
		$config['max_width']  = '3000';
		$config['max_height']  = '3000';
		
		$this->load->library('upload', $config);
	
		if ( ! $this->upload->do_upload())
		{
			$data['error'] = $this->upload->display_errors();
			$this->add_view('formulario_carga', $data);
        	$this->render();
			
		}	
		else
		{
			$data['upload_data'] = $this->upload->data();
			$data['error'] = '';
			$this->add_view('upload_success', $data);
        	$this->render();
			
		}
	}	
	
	
	
	
}
