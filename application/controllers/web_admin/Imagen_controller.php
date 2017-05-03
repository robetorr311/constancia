<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Imagen_controller extends MY_Controller {

   public function __construct() {
        parent:: __construct();
		$this->load->library('Template_msg_alert');
		$this->load->model(MANEJADOR_WEB."/Articulo_model");
		$this->load->model(MANEJADOR_WEB."/Banner_model");
		$this->load->library('upload');
		
    }
    public function index() 
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
		
		$this->add_view(MANEJADOR_WEB."/Imagen",$data);
		$this->render();
    }
	
	public function crear()
	{	
		$imagen_ruta = $this->input->post('imagen_ruta');
		$ruta = urls_amigables($imagen_ruta);
		$dir = MANEJADOR_WEB_RUTA_GALERIAS.$ruta."/";

		if (is_dir($dir) == TRUE)
		{
			$msg = 'La galeria <strong>'.$ruta.'</strong> ya se encuentra creado';
			$type = 'danger';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->index();
        	
		}
		else
		{
			
			if (mkdir($dir, 0777))
			{
				$msg = 'La galeria <strong>'.$ruta.'</strong> se ha creado satisfactoriamente';
				$type = 'success';
				$mensaje = $this->template_msg_alert->get($msg, $type);
				$this->add_html($mensaje);
				$this->index();
				
			}
			else
			{
				$msg = 'La galeria <strong>'.$ruta.'</strong> no pudo ser creado';
				$type = 'danger';
				$mensaje = $this->template_msg_alert->get($msg, $type);
				$this->add_html($mensaje);
				$this->index();
				
			}
        	
			
		}
	}
	
	public function eliminar()
	{
		$folder = $this->input->post('imagen_rutae');
		$dir = MANEJADOR_WEB_RUTA_GALERIAS.$folder."/";
		if (is_dir($dir) == TRUE)
		{
			$carpeta = @scandir($dir);
			if (count($carpeta) > 2)
			{	
				$msg = 'La galeria contiene '.(count($carpeta)-2).' imagenes no puede ser eliminado';
				$type = 'danger';
				$mensaje = $this->template_msg_alert->get($msg, $type);
				$this->add_html($mensaje);
				$this->index();
        		
    		}
			else
			{
				$resultado = $this->Articulo_model->articulo_ver_galeria($folder);
				if ($resultado > 0)
				{
					$msg = 'La galeria esta asociado a '.$resultado.' articulos no puede ser eliminado';
					$type = 'danger';
					$mensaje = $this->template_msg_alert->get($msg, $type);
					$this->add_html($mensaje);
					$this->index();
				}
				else
				{
					$directorio = opendir($dir);
   					rmdir($dir);
   					closedir($directorio);
					$msg = 'La galeria '.$folder.' ha sido eliminado satisfactoriamente';
					$type = 'success';
					$mensaje = $this->template_msg_alert->get($msg, $type);
					$this->add_html($mensaje);
					$this->index();
				}
			}
		}
	}
	
	function mostrar_imagenes() 
	{ 
		$ruta = $this->input->post('ruta');
		$page = $this->input->post('page');
		$fotos=array();
		$ar=0;
		
		if (is_dir($ruta) == TRUE)
		{
		$directorio=opendir($ruta); 
		while ($archivo = readdir($directorio)) 
		{		
			if ($archivo != "." && $archivo != ".." && $archivo!="_notes" && $archivo!="index.html")  
			{	
				
				$ar = $ar + 1;
				if (($ar<= (18*$page)) and ($ar>= (18*$page)-17))
				{
					
					$fotos[$ar] = $archivo;
				}
			}
		}
		closedir($directorio); 
		
		
		
		$data['fotos'] = $fotos;
		$data['total'] = $ar;
		$data['pagina'] = $page;
		$data['ruta'] = $ruta;
		
		$this->load->view(MANEJADOR_WEB."/Imagen_imagen",$data);
		}
		else
		{
			echo "No existen imagenes";
		}
		
		
	}
	
	
	function eliminar_imagenes() 
	{ 
		$nombres = $this->input->post('nombres');
		$tipo = $this->input->post('tipo');
		
		if (($tipo == "articulos") or ($tipo == "banners"))
		{
			if ($tipo == "articulos")
			{
				$articulos = array();
				for ($i = 0; $i < count($nombres); $i++) 
				{
					$resultado = $this->Articulo_model->articulo_ver_imagen($nombres[$i]);
					$articulos[$i] = $resultado;
				}
				
				if (array_sum($articulos) > 0)
				{
					
					$msg = 'Las imagenes no pueden ser eliminadas, estan asociadas a algun articulo';
					$type = 'danger';
					$mensaje = $this->template_msg_alert->get($msg, $type);
					echo $mensaje;
					
					
				}
				else
				{	
					if (count($nombres) > 0) 
					{ 
						for ($i = 0; $i < count($nombres); $i++) 
						{
							unlink(MANEJADOR_WEB_RUTA_ARTICULOS.$nombres[$i]);
						}
						$msg = 'Las imagenes han sido eliminadas satisfactoriamente';
						$type = 'success';
						$mensaje = $this->template_msg_alert->get($msg, $type);
						echo $mensaje;
						
					}
					else
					{
						$msg = 'No ha seleccionado imagenes para eliminar';
						$type = 'danger';
						$mensaje = $this->template_msg_alert->get($msg, $type);
						echo $mensaje;
						
					}

				}

			}
			if ($tipo == "banners")
			{
				$banners = array();
				for ($i = 0; $i < count($nombres); $i++) 
				{
					$resultado = $this->Banner_model->banner_ver_imagen($nombres[$i]);
					$banners[$i] = $resultado;
				}
				
				if (array_sum($banners) > 0)
				{
					
					$msg = 'Las imagenes no pueden ser eliminadas, estan asociadas a algun banner';
					$type = 'danger';
					$mensaje = $this->template_msg_alert->get($msg, $type);
					echo $mensaje;
					
					
				}
				else
				{	
					if (count($nombres) > 0) 
					{ 
						for ($i = 0; $i < count($nombres); $i++) 
						{
							unlink(MANEJADOR_WEB_RUTA_BANNERS.$nombres[$i]);
						}
						$msg = 'Las imagenes han sido eliminadas satisfactoriamente';
						$type = 'success';
						$mensaje = $this->template_msg_alert->get($msg, $type);
						echo $mensaje;
						
					}
					else
					{
						$msg = 'No ha seleccionado imagenes para eliminar';
						$type = 'danger';
						$mensaje = $this->template_msg_alert->get($msg, $type);
						echo $mensaje;
						
					}

				}
			}
		}
		else
		{
			if (count($nombres) > 0) 
			{ 
				for ($i = 0; $i < count($nombres); $i++) 
				{
					unlink(MANEJADOR_WEB_RUTA_GALERIAS.$tipo."/".$nombres[$i]);
				}
				$msg = 'Las imagenes han sido eliminadas satisfactoriamente';
				$type = 'success';
				$mensaje = $this->template_msg_alert->get($msg, $type);
				echo $mensaje;
				
			}
			else
			{
				$msg = 'No ha seleccionado imagenes para eliminar';
				$type = 'danger';
				$mensaje = $this->template_msg_alert->get($msg, $type);
				echo $mensaje;
				
			}
		}
	}
	public function subir()
	{
		$ruta=$this->input->post('imagen_ruta');
		$archivos = $this->input->post('archivos');
		
		
		if (isset ($archivos)) 
		{
			
			$tot = count($archivos);
			for ($i = 0; $i < $tot; $i++)
			{
				
			}
		}
	}
}
