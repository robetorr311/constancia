<?php

class Categoria_model extends CI_Model
{
	
	
    public function __construct()
    {
        parent:: __construct();
    }
    
   
	
	public function categoria_ver() {

        $sql = "select * from ".DB_ESQUEMA_WEB.".gw_categoria";
		$categoria = $this->db->query($sql);
		return $categoria->result();
    }
	
	

    
	
}
