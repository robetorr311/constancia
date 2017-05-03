<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Video_controller extends MY_Controller {

   public function __construct() {
        parent:: __construct();
		$this->load->model(MANEJADOR_WEB."/Video_model");
		$this->load->library('Template_msg_alert');
		
    }

	
    public function index() 
	{
		/*$this->validate_access();*/
		
		$this->load->library('Template_table');
		

        // Datos para llenar la tabla basica
		
        $resultset = $this->Video_model->video();
        $controller = MANEJADOR_WEB."/".get_class();
        $titulo = 'Lista de Videos';
        $table_headers = array(
			array("id", "id",""),
            array("nombre", "Título",""),
            array("link", "Link","")
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
		$consulta['titulo'] = "Insertar Video";
		$consulta['articulo'] = 0;
		$this->add_view(MANEJADOR_WEB."/Video",$consulta);
		$this->render();
	}
	 public function guardar() 
	{
		$video_id = $this->input->post('video_id');
		$video_titulo = $this->input->post('video_titulo');
		$video_link = $this->input->post('video_link');
		
		
		
		if (empty($video_id))
		{
			$this->Video_model->video_insertar($video_titulo, $video_link);
			
			$msg = 'El video <strong>'.$banner_titulo.'</strong> ha sido guardado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$consulta['consulta'] = array();
			$consulta['valores'] = "";
			$consulta['titulo'] = "Insertar Video";
			$consulta['articulo'] = 0;
			$this->add_view(MANEJADOR_WEB."/Video",$consulta);
        	$this->render();
		}
		else
		{
			$this->Video_model->video_editar($video_id,$video_titulo, $video_link);
			$msg = 'El video <strong>'.$video_titulo.'</strong> ha sido editado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->editar($video_id);
			
		}
    }
	function ver($id = null) 
	{
		$resultado = $this->Video_model->video_ver($id);
		$consulta['consulta'] = $resultado;
		$consulta['valores'] = "disabled";
		$consulta['titulo'] = "Ver Video";
		$consulta['articulo'] = $id;
		$this->add_view(MANEJADOR_WEB."/Video",$consulta);
		$this->render();
	
	}
	function editar($id = null) 
	{
		$resultado = $this->Video_model->video_ver($id);
		$consulta['consulta'] = $resultado;
		$consulta['valores'] = "";
		$consulta['titulo'] = "Editar Video";
		$consulta['articulo'] = $id;
		$this->add_view(MANEJADOR_WEB."/Video",$consulta);
		$this->render();
	
	}
	 public function eliminar($id) {


        $this->Video_model->video_eliminar($id);
		$msg = 'El video ha sido eliminado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->index();
    }
	
	
	
	
	
	
	
	
}
