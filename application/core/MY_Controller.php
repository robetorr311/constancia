<?php
class MY_Controller extends CI_Controller {

	private $content_areas = array();
	protected $menu = array();
	public $area = null;
	public $sistema = null;
	public $usuario = null;
	private $validado = FALSE;

	function __construct()
	{
		parent::__construct();

		$this->load->model('usuario_model');
		$this->load->model('template_model');
		

		// Usuario
		$login = $this->session->userdata('usr_usuario');
		if($login)
		{
			$this->template_model->set_usuario($login);
			$this->usuario = $this->template_model->get_usuario();
		}

		// Sistema
		$sis_id = $this->session->userdata('sis_id');
		if (!$sis_id)
		{
			$sis_id = 48; // ID del sistema plantilla
		}
		$this->template_model->set_sistema($sis_id);
		$this->sistema = $this->template_model->get_sistema();
		
		//~ var_dump($this->sistema);
		//~ die();

		// Area
		$area_id = $this->session->userdata('usr_sistema');
		if (!$area_id)
		{
			$area_id = 49; // ID del area intranet
		}
		$this->template_model->set_area($sis_id);
		$this->area = $this->template_model->get_area();

		// Valida que el usuario haya iniciado sesion
		$this->check_usr_session();

		// Configura el menu y otros detalles de la plantilla
        $this->_build_template();
	}

	function get_session_sistemas()
	{
		if (!$this->session->userdata('tmplt_sistemas'))
		{
			$var = $this->template_model->get_all_systems();
			$this->session->set_userdata('tmplt_sistemas', $var);
		}
		return $this->session->userdata('tmplt_sistemas');
	}

	function get_session_menu()
	{
		if (!$this->session->userdata('tmplt_menu'))
		{
			$var = $this->template_model->get_menu($this->sistema->id);
			$this->session->set_userdata('tmplt_menu', $var);
		}

		return $this->session->userdata('tmplt_menu');
	}

	function _build_template()
	{
		$this->content_areas['usr_nombre']= $this->usuario->nombre;
		$this->content_areas['sys_title']= $this->sistema->nombre;
		$this->content_areas['sys_actual']= $this->sistema->nombre;
		$this->content_areas['sistemas']= $this->get_session_sistemas();
		$this->content_areas['menus'] = $this->get_session_menu();
		$this->content_areas['msg_valid'] = '';
	}

	function add_view($view, $data = array(), $area = 'main')
	{
		$this->add_html($this->load->view($view, $data, TRUE), $area);
	}

	function add_html($html, $area = 'main') {

		if ( ! array_key_exists($area, $this->content_areas))
		{
			$this->content_areas[$area] = $html;
		}
		else
		{
			$this->content_areas[$area] .= $html;
		}
	}

	function render($layout = "admin_lte")
	{

		if( ! $this->validado)
		{
			$this->content_areas['msg_valid'] = $this->load->view('templates/msg_validar', null, TRUE);
		}

		$this->load->view('templates/'.$layout, $this->content_areas);
	}

	public function validate_access()
	{

		$this->validado = TRUE;

		$e = new Exception();
		$trace = $e->getTrace();
		$class = $trace[1]['class'];
		$method = $trace[1]['function'];

		$ruta = array(
			$this->area->nombre, $this->sistema->nombre, $class, $method
		);

		$valid = $this->usuario_model->has_access($this->usuario->id, $ruta);
		
		if ( ! $valid)
		{

			$data = array(
				'ruta' => strtolower(implode('.', $ruta)),
			);

			$this->add_view('acceso', $data);
			$this->render();

			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

	function check_usr_session()
	{
        if (!isset($this->usuario->id))
		{
            redirect('login');
        }
    }
}
?>
