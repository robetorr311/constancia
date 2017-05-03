<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articulo_controller extends MY_Controller {

   public function __construct() {
        parent:: __construct();
		$this->load->model(MANEJADOR_WEB."/Articulo_model");
		$this->load->model(MANEJADOR_WEB."/Categoria_model");
		$this->load->library('Template_msg_alert');
		
    }

	
    public function index() 
	{
		/*$this->validate_access();*/
		
		$this->load->library('Template_table');
		

        // Datos para llenar la tabla basica
		$sql = "select * from ".DB_ESQUEMA_WEB.".gw_articulo order by fecha desc";
        $resultset = $this->db->query($sql)->result();
        $controller = MANEJADOR_WEB."/".get_class();
        $titulo = 'Lista de Artículos';
        $table_headers = array(
            array("fecha", "Fecha","fecha_salida"),
            array("titulo", "Título",""),
			array("imagen", "Imagen","ver_imagenes&".MANEJADOR_WEB_RUTA_ARTICULOS),
			array("galeria", "Galería",""),
            array("activo", "Estatus","ver_status"),
			array("destacado", "Destacado","ver_status2")
        );
		/* metodo , tooltip , color del boton , icono */
		 $table_button = array(
			array("previsualizar", "Previsualizar","btn-default","fa  fa-desktop"),
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
		$consulta['titulo'] = "Insertar Articulo";
		$consulta['articulo'] = 0;
		$consulta['categoria'] = $this->Categoria_model->categoria_ver();
		$this->add_view(MANEJADOR_WEB."/Articulo",$consulta);
		$this->render();
	}
	 public function guardar() 
	{
		$articulo_id = $this->input->post('articulo_id');
		$articulo_titulo = fullUpper($this->input->post('articulo_titulo'));
		$articulo_tituloamigable = urls_amigables($this->input->post('articulo_titulo'));
		$articulo_categoria = $this->input->post('articulo_categoria');
		$articulo_imagen = $this->input->post('articulo_imagen');
		$articulo_fecha = fecha_entrada($this->input->post('articulo_fecha'));
		$articulo_galeria = $this->input->post('articulo_galeria');
		$articulo_contenido = $this->input->post('articulo_contenido');
		$articulo_contenido2 = $this->input->post('articulo_contenido2');
		if ($this->input->post('articulo_activo') == "on") {$articulo_activo= "t";} else{$articulo_activo= "f";}
		if ($this->input->post('articulo_destacado') == "on") {$articulo_destacado= "t";} else{$articulo_destacado= "f";}
		$articulo_usuario = $this->usuario->usuario;
		$articulo_fechainsert = date('Y-m-d H:i:s');
		$articulo_hora = $this->input->post('articulo_hora');
		
		
		if (empty($articulo_id))
		{
			$this->Articulo_model->articulo_insertar($articulo_titulo, $articulo_tituloamigable,$articulo_contenido, $articulo_contenido2, $articulo_fecha, $articulo_activo, $articulo_destacado, $articulo_imagen, $articulo_galeria, $articulo_categoria, $articulo_usuario, $articulo_fechainsert, $articulo_hora);
			
			$msg = 'El articulo <strong>'.$articulo_titulo.'</strong> ha sido guardado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$consulta['consulta'] = array();
			$consulta['valores'] = "";
			$consulta['titulo'] = "Insertar Articulo";
			$consulta['articulo'] = 0;
			$consulta['categoria'] = $this->Categoria_model->categoria_ver();
			$this->add_view(MANEJADOR_WEB."/Articulo",$consulta);
        	$this->render();
		}
		else
		{
			$this->Articulo_model->articulo_editar($articulo_id,$articulo_titulo, $articulo_tituloamigable,$articulo_contenido, $articulo_contenido2, $articulo_fecha, $articulo_activo, $articulo_destacado, $articulo_imagen, $articulo_galeria, $articulo_categoria, $articulo_usuario, $articulo_fechainsert, $articulo_hora);
			$msg = 'El articulo <strong>'.$articulo_titulo.'</strong> ha sido editado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->editar($articulo_id);
			
		}
    }
	function ver($id = null) 
	{
		$resultado = $this->Articulo_model->articulo_ver($id);
		$consulta['consulta'] = $resultado;
		$consulta['valores'] = "disabled";
		$consulta['titulo'] = "Ver Articulo";
		$consulta['articulo'] = $id;
		$consulta['categoria'] = $this->Categoria_model->categoria_ver();
		$this->add_view(MANEJADOR_WEB."/Articulo",$consulta);
		$this->render();
	
	}
	function editar($id = null) 
	{
		$resultado = $this->Articulo_model->articulo_ver($id);
		$consulta['consulta'] = $resultado;
		$consulta['valores'] = "";
		$consulta['titulo'] = "Editar Articulo";
		$consulta['articulo'] = $id;
		$consulta['categoria'] = $this->Categoria_model->categoria_ver();
		$this->add_view(MANEJADOR_WEB."/Articulo",$consulta);
		$this->render();
	
	}
	 public function eliminar($id) {


        $this->Articulo_model->articulo_eliminar($id);
		$msg = 'El articulo ha sido eliminado satisfactoriamente.';
			$type = 'success';
			$mensaje = $this->template_msg_alert->get($msg, $type);
			$this->add_html($mensaje);
			$this->index();
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
				if (($ar<= (12*$page)) and ($ar>= (12*$page)-11))
				{
					$fotos[$ar] = $archivo;
					/*$modificacion[$ar] = filectime($archivo);*/
				}
			}
		}
		closedir($directorio); 
		
		
		
		$data['fotos'] = $fotos;
		$data['total'] = $ar;
		$data['pagina'] = $page;
		$data['ruta'] = $ruta;
		/*$data['modificacion'] = $modificacion;*/
		
		$this->load->view(MANEJADOR_WEB."/Articulo_imagen",$data);
		}
		else
		{echo "No existen imagenes";}
		
		
	}
	function mostrar_galerias() 
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
				if (($ar<= (6*$page)) and ($ar>= (6*$page)-5))
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
			
			$this->load->view(MANEJADOR_WEB."/Articulo_galeria",$data);
		}
		else
		{			
			echo "No existen galerias";
		
		}
		
		
		
		
	}
	
	function mostrar_imagenesgal() 
	{ 
		$ruta = $this->input->post('ruta');
		$fotos=array();
		$ar=0;
		$dir = MANEJADOR_WEB_RUTA_GALERIAS.$ruta."/";
		
		$directorio=opendir($ruta); 
		while (($archivo = readdir($directorio))) 
		{		
			if ($archivo != "." && $archivo != ".." && $archivo!="_notes" && $archivo!="index.html")  
			{	
				
				$ar = $ar + 1;
				if ($ar<=6)
					{$fotos[$ar] = $archivo;}
			}
		}
		closedir($directorio); 
		if ($ar > 0){
		$data['fotos'] = $fotos;
		$data['ruta'] = $ruta;
		
		$this->load->view(MANEJADOR_WEB."/Articulo_imagengaleria",$data);	
	
		}
		else
		{
			echo "No existen imagenes dentro de esta galeria";
		}
	}
	
	function previsualizar($id = null) 
	{
		$resultado = $this->Articulo_model->articulo_ver($id);
		$consulta['consulta'] = $resultado;	
		$this->add_view(MANEJADOR_WEB."/Articulo_previsualizar",$consulta);
		$this->render();
	
	}
	
	
	
}
