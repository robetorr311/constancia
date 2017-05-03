<?php

class Template_model extends CI_Model
{

	public function __construct()
	{
		parent:: __construct();
	}

	/* Usuario */

	public function set_usuario($usr)
	{
		if (!$this->session->userdata('tmplt_usuario'))
		{
			$this->load->model('usuario_model');
			$user = $this->usuario_model->get($usr)->row();
			$this->session->set_userdata('tmplt_usuario', $user);
		}
		$this->usuario = $this->session->userdata('tmplt_usuario');
	}

	public function get_usuario()
	{
		return $this->usuario;
	}
	
	/* Sistema */
	
	public function set_sistema($id)
	{
		if (!$this->session->userdata('tmplt_sistema'))
		{
			$this->load->model('area_model');
			$area = $this->area_model->get($id)->row();
			$this->session->set_userdata('tmplt_sistema', $area);
		}
		$this->sistema = $this->session->userdata('tmplt_sistema');
	}

	public function get_sistema()
	{
		return $this->sistema;
	}
	
	/* Area */
	
	public function set_area($id)
	{
		if (!$this->session->userdata('tmplt_area'))
		{
			$this->load->model('area_model');
			$area = $this->area_model->get($id)->row();
			$this->session->set_userdata('tmplt_area', $area);
		}
		$this->area = $this->session->userdata('tmplt_area');
	}

	public function get_area()
	{
		return $this->area;
	}

	function get_menu($idsistema, $idpadre = null, $forzar = FALSE)
	{
		$this->load->helper('types');

		$cond = array(
			'pid' => $idpadre,
			'usr_id' => $this->usuario->id,
			'idsistema' => $idsistema,
		);
		$rslt = $this->db
		->where($cond)
		->get('sys_intranet_admin.v_menu_usuario')->result();

		// FIXME: Este proceso no es nada optimo, porque es un recorrido
		// recursivo.
		$menu = array();
		for ($i = 0; $i < count($rslt); $i++)
		{
			$itemMenu = new stdClass();
			$itemMenu->icono = $rslt[$i]->icono;
			$itemMenu->titulo = $rslt[$i]->titulo;
			
			$id = $rslt[$i]->mnu_id;
			$ruta = pg_array_parse($rslt[$i]->ruta);

			if (!empty($ruta) and count($ruta) >= 4)
			{
				$ruta = array_reverse($ruta);
				$itemMenu->href = site_url($ruta[1].'/'.$ruta[0]);
			}
			else
			{
				$itemMenu->href = $rslt[$i]->url;
			}
			$itemMenu->childs = $this->get_menu($idsistema, $id, TRUE);

			$menu[$i] = $itemMenu;
		}
		return $menu;
	}

	function get_all_systems()
	{
		$rslt = $this->db
			->get('sys_intranet_admin.v_sistema')->result();
		
		return $rslt;
	}
}
