<?php

class Logo_constancia extends CI_Model
{


	public function __construct()
	{
		parent:: __construct();
	}
	
	public function guardar($hconstancia, $archivo, $tipo, $size)
	{

		/*$nombrearchivo2='sinlogo.png';
		$tipoarchivo2='image/png';
		$sizearchivo2='1';		*/
		if ($archivo=="sinlogo.png")	{
			$ruta="/var/www/html/Constancias/assets/img/constancias/".$archivo;
		}
		else {
			$ruta="/var/www/html/Constancias/assets/img/constancias/uploads/".$archivo;			
		}
        $sql="select * from sys_rrhh.flogo_constancia($hconstancia, '$archivo' , '$tipo', '$size', '$ruta')";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$id= "" .pg_result($rlista, $d, 0)."";
		}
		pg_free_result($rlista);
		return $id;			
	}
    public function logo($id) {
        $this->db->select('*');
		$this->db->from('sys_rrhh.logo_constancia');
		$data = array('id =' => $id);
		$this->db->where($data);
		return $this->db->get();
    }
}
