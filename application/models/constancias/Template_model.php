<?php

class Template_model extends CI_Model
{
	protected $usuario = null;

	public function __construct()
	{
		parent:: __construct();
	}
	
	public function set_usuario($usr)
	{
		$this->load->model('constancias/usuario_model');
		$this->usuario = $this->usuario_model->get($usr)->row();
	}
	
	public function get_usuario()
	{
		return $this->usuario;
	}

	function get_menu($idsistema, $idpadre = null)
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

		for ($i = 0; $i < count($rslt); $i++)
		{
			$id = $rslt[$i]->mnu_id;
			$ruta = pg_array_parse($rslt[$i]->ruta);

			if (!empty($ruta) and count($ruta) >= 4)
			{
				$ruta = array_reverse($ruta);
				$rslt[$i]->href = site_url($ruta[1].'/'.$ruta[0]);
			}
			else
			{
				$rslt[$i]->href = $rslt[$i]->url;
			}
			$rslt[$i]->childs = $this->get_menu($idsistema, $id);
		}
		return $rslt;
	}
  
	function get_systems()
	{
		$rslt = $this->db
			->get('sys_intranet_admin.v_sistema')->result();
		
		return $rslt;
	}
}
