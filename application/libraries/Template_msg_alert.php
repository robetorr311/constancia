<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template_msg_alert
{

	protected $ci;

	public function __construct()
	{
		$this->ci =& get_instance();
	}

	/**
	 * Parametros:
	 * 		$resultset: Valor retornado por la funcion result()
	 **/
	public function get($msg = '', $type = 'info', $title = '')
	{

		switch($type)
		{
			case 'success':
				$data = array(
					'title' => 'EXITO',
					'icon' => 'fa fa-check',
				);
				break;
			case 'warning':
				$data = array(
					'title' => 'ADVERTENCIA',
					'icon' => 'fa fa-warning',
				);
				break;
			case 'danger':
				$data = array(
					'title' => 'ERROR',
					'icon' => 'fa fa-ban',
				);
				break;
			default:
				$data = array(
					'title' => 'INFORMACION',
					'icon' => 'fa fa-info',
				);
				break;
		}

		$data = array(
			'type' => $type,
			'icon' => $data['icon'],
			'title' => $data['title'],
			'msg' => $msg,
		);

		return $this->ci->load->view('templates/msg_alert', $data, true);
	}

}