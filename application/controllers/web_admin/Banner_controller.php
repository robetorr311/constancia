<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Banner_controller extends MY_Controller {

   public function __construct() {
        parent:: __construct();
		$this->load->model(MANEJADOR_WEB."/Banner_model");
		$this->load->library('Template_msg_alert');
		
    }

	
    public function index() 
	{
		/*$this->validate_access();*/
		
		$this->load->library('Template_table');
		

        // Datos para llenar la tabla basica
		
        $resultset = $this->Banner_model->banner();
        $controller = MANEJADOR_WEB."/".get_class();
        $titulo = 'Lista de Banner';
        $table_headers = array(
			array("id", "id",""),
            array("texto", "Título",""),
            array("link", "Link",""),
			array("imagen", "Imagen","ver_imagenes&".MANEJADOR_WEB_RUTA_BANNERS),
            array("activo", "Estatus","ver_status"),
			array("enlaceexterno", "Enlace","tipo_enlace"),
			array("principal", "Principal","ver_status2"),
        );
		/* metodo , tooltip , color del boton , icono */
		 $table_button = array(
            array("ver", "Ver","btn-default","glyphicon glyphicon-eye-open"),
            array("editar", "Editar","btn-default","glyphicon glyphicon-pencil"),
			array("eliminar", "Eliminar","btn-danger","glyphicon glyphicon-trash")
        );
		
		/* metodo , tooltip , color del boton , icono */
		 $header_button = array(
            array("nuevo", "Nuevo","btn-primary","glyphicon glyphicon-plus")
			
            
        );

        $vista = $this->template_table->basic_table($resultset, $table_headers, $table_button,$header_button, $titulo, $controller);
        $this->add_html($vista);
        $this->render();

		
		
    }
	
	 public function nuevo() 
	{
		$consulta['consulta'] = array();
		$consulta['valores'] = "";
		$consulta['titulo'] = "Insertar Banner";
		$consulta['articulo'] = 0;
		$this->add_view(MANEJADOR_WEB."/Banner",$consulta);
		$this->render();
	}
	 public function guardar() 
	{
		$banner_id = $this->input->post('banner_id');
		$banner_titulo = $this->input->post('banner_titulo');
		$banner_link = $this->input->post('banner_link');
		$banner_imagen = $this->input->post('articulo_imagen');
		if ($this->input->post('banner_activo') == "on") {$banner_activo= "t";} else{$banner_activo= "f";}
		if ($this->input->post('banner_enlace') == "on") {$banner_enlace= "t";} else{$banner_enlace= "f";}
		if ($this->input->post('banner_principal') == "on") {$banner_principal= "t";} else{$banner_principal= "f";}
		
		
		
		if (empty($banner_id))
		{
			$this->Banner_model->banner_insertar($banner_titulo, $banner_link, $banner_imagen, $banner_activo, $banner_enlace, $banner_principal);
			
			$msg = 'El banner <strong>'.$banner_titulo.'</strong> ha sido guardado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$consulta['consulta'] = array();
			$consulta['valores'] = "";
			$consulta['titulo'] = "Insertar Banner";
			$consulta['articulo'] = 0;
			$this->add_view(MANEJADOR_WEB."/Banner",$consulta);
        	$this->render();
		}
		else
		{
			$this->Banner_model->banner_editar($banner_id,$banner_titulo, $banner_link, $banner_imagen, $banner_activo, $banner_enlace, $banner_principal);
			$msg = 'El banner <strong>'.$banner_titulo.'</strong> ha sido editado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->editar($banner_id);
			
		}
    }
	function ver($id = null) 
	{
		$resultado = $this->Banner_model->banner_ver($id);
		$consulta['consulta'] = $resultado;
		$consulta['valores'] = "disabled";
		$consulta['titulo'] = "Ver Banner";
		$consulta['articulo'] = $id;
		$this->add_view(MANEJADOR_WEB."/Banner",$consulta);
		$this->render();
	
	}
	function editar($id = null) 
	{
		$resultado = $this->Banner_model->banner_ver($id);
		$consulta['consulta'] = $resultado;
		$consulta['valores'] = "";
		$consulta['titulo'] = "Editar Banner";
		$consulta['articulo'] = $id;
		$this->add_view(MANEJADOR_WEB."/Banner",$consulta);
		$this->render();
	
	}
	 public function eliminar($id) {


        $this->Banner_model->banner_eliminar($id);
		$msg = 'El banner ha sido eliminado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->index();
    }
	
	
	
	
	
	
	
	
}
