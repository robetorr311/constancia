<?php

class Banner_model extends CI_Model
{
	
	
    public function __construct()
    {
        parent:: __construct();
    }
    
   
	
	public function banner() {

        $sql = "select * from ".DB_ESQUEMA_WEB.".gw_banner order by activo asc";
		$categoria = $this->db->query($sql);
		return $categoria->result();
    }
	
	public function banner_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get(DB_ESQUEMA_WEB.'.gw_banner');
        return $consulta->row();
    }
	
	public function banner_eliminar($id) {

         $this->db->where('id', $id);
        $this->db->delete(DB_ESQUEMA_WEB.'.gw_banner');
    }

	function banner_insertar($banner_titulo, $banner_link, $banner_imagen, $banner_activo, $banner_enlace, $banner_principal) {

        $datos = array(
            'texto' => $banner_titulo,
			'link' => $banner_link,
			'imagen' => $banner_imagen,
			'activo' => $banner_activo,
			'enlaceexterno' => $banner_enlace,
			'principal' => $banner_principal,
			
            
			);

        $this->db->insert(DB_ESQUEMA_WEB.'.gw_banner', $datos);

	}
	 public function banner_editar($banner_id,$banner_titulo, $banner_link, $banner_imagen, $banner_activo, $banner_enlace, $banner_principal) {

        $datos = array(
			'id' => $banner_id,
            'texto' => $banner_titulo,
			'link' => $banner_link,
			'imagen' => $banner_imagen,
			'activo' => $banner_activo,
			'enlaceexterno' => $banner_enlace,
			'principal' => $banner_principal,
			
            
			);
        $this->db->where('id', $banner_id);
        $this->db->update(DB_ESQUEMA_WEB.'.gw_banner', $datos);
    }
	
	public function banner_ver_imagen($imagen) {

        $sql = "select * from ".DB_ESQUEMA_WEB.".gw_banner where imagen = '".$imagen."'";
		$consulta = $this->db->query($sql);
		
        return $consulta->num_rows();
    }
    
	
}
