<?php

class Articulo_model extends CI_Model
{
	
	
    public function __construct()
    {
        parent:: __construct();
    }
    
    
    function articulo_insertar($articulo_titulo,$articulo_tituloamigable,$articulo_contenido,$articulo_contenido2, $articulo_fecha, $articulo_activo, $articulo_destacado,$articulo_imagen, $articulo_galeria, $articulo_categoria, $articulo_usuario,$articulo_fechainsert, $articulo_hora) {

        $datos = array(
            'titulo' => $articulo_titulo,
			'tituloamigable' => $articulo_tituloamigable,
			'descripcion' => $articulo_contenido,
			'descripcionlarga' => $articulo_contenido2,
			'fecha' => $articulo_fecha." ".$articulo_hora,
			'activo' => $articulo_activo,
			'destacado' => $articulo_destacado,
			'imagen' => $articulo_imagen,
			'galeria' => $articulo_galeria,
			'idcategoria' => $articulo_categoria,
			'insert_user' => $articulo_usuario,
			'insert_date' => $articulo_fechainsert
            
			);

        $this->db->insert(DB_ESQUEMA_WEB.'.gw_articulo', $datos);

	}
	
	public function articulo_ver($id) {

        $this->db->where('id', $id);
        $consulta = $this->db->get(DB_ESQUEMA_WEB.'.gw_articulo');
        return $consulta->row();
    }
	
	public function articulo_eliminar($id) {

         $this->db->where('id', $id);
        $this->db->delete(DB_ESQUEMA_WEB.'.gw_articulo');
    }
	
	 public function articulo_editar($articulo_id,$articulo_titulo,$articulo_tituloamigable,$articulo_contenido,$articulo_contenido2, $articulo_fecha, $articulo_activo, $articulo_destacado,$articulo_imagen, $articulo_galeria, $articulo_categoria, $articulo_usuario,$articulo_fechainsert, $articulo_hora) {

        $datos = array(
			'id' => $articulo_id,
            'titulo' => $articulo_titulo,
			'tituloamigable' => $articulo_tituloamigable,
			'descripcion' => $articulo_contenido,
			'descripcionlarga' => $articulo_contenido2,
			'fecha' => $articulo_fecha." ".$articulo_hora,
			'activo' => $articulo_activo,
			'destacado' => $articulo_destacado,
			'imagen' => $articulo_imagen,
			'galeria' => $articulo_galeria,
			'idcategoria' => $articulo_categoria,
			'insert_user' => $articulo_usuario,
			'insert_date' => $articulo_fechainsert
            
			);
        $this->db->where('id', $articulo_id);
        $this->db->update(DB_ESQUEMA_WEB.'.gw_articulo', $datos);
    }
	
	public function articulo_ver_galeria($galeria) {

        $sql = "select * from ".DB_ESQUEMA_WEB.".gw_articulo where galeria = '".$galeria."'";
		$consulta = $this->db->query($sql);
		
        return $consulta->num_rows();
    }
	
	public function articulo_ver_imagen($imagen) {

        $sql = "select * from ".DB_ESQUEMA_WEB.".gw_articulo where imagen = '".$imagen."'";
		$consulta = $this->db->query($sql);
		
        return $consulta->num_rows();
    }
	
	public function articulo_eliminar_imagen($imagen) {

		$sql = "Delete From ".DB_ESQUEMA_WEB.".gw_articulo where imagen = '".$imagen."'";
		$consulta = $this->db->query($sql);
		
        return $consulta->num_rows();
    }
    
	
}
