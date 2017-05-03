<?php

class Template_table{

	protected $ci;
	

	//creamos una instancia del super objeto de codeigniter
	//en el constructor para poder tenerlo disponible las veces
	//que necesitemos sin repetir la misma línea
	public function __construct()
	{
		$this->ci =& get_instance();
		
	}

	/**
	 * Parametros:
	 * 		$resultset: Valor retornado por la funcion result()
	 **/
	 
	 
	public function basic_table($resultset, 
	$table_headers = array(), $table_button = array(), $header_button = array(), $titulo = '', $controller = '',
	$table_id = 'table_basic' )
	{
		$helpersasignados = array('fecha_salida','urls_amigables','ver_imagenes','ver_status','ver_status2','tipo_enlace');
		
		$data['titulo'] = $titulo;
		$data['table_id'] = $table_id;
		$data['table_headers'] = $table_headers;
		$data['resultset'] = $resultset;
		$data['controller'] = strtolower($controller);
		$data['table_button'] = $table_button;
		$data['header_button'] = $header_button;
		$data['table_function'] = $helpersasignados;


		return $this->ci->load->view('templates/table_basic', $data, true);
	}
	

}
