<?php

class Video_model extends CI_Model
{
	
	
    public function __construct()
    {
        parent:: __construct();
    }
    
   
	
	public function video() {

        $sql = "select * from ".DB_ESQUEMA_WEB.".gw_video";
		$consulta = $this->db->query($sql);
		return $consulta->result();
    }
	
	public function video_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get(DB_ESQUEMA_WEB.'.gw_video');
        return $consulta->row();
    }
	
	public function video_eliminar($id) {

         $this->db->where('id', $id);
        $this->db->delete(DB_ESQUEMA_WEB.'.gw_video');
    }

	function video_insertar($video_titulo, $video_link) {

        $datos = array(
            'nombre' => $video_titulo,
			'link' => $video_link
			);

        $this->db->insert(DB_ESQUEMA_WEB.'.gw_video', $datos);

	}
	 public function video_editar($video_id,$video_titulo, $video_link) {

        $datos = array(
			'id' => $video_id,
            'nombre' => $video_titulo,
			'link' => $video_link
			);
        $this->db->where('id', $video_id);
        $this->db->update(DB_ESQUEMA_WEB.'.gw_video', $datos);
    }
    
	
}
