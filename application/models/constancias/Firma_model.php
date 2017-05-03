<?php

class Firma_model extends CI_Model
{


	public function __construct()
	{
		parent:: __construct();
	}
	public function registro()
	{
      	$sql="select * from sys_portal_web.gw_directorio where id=1;";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$director= "" .pg_result($rlista, $d, 4)."";
			$cargodirector="" .pg_result($rlista, $d, 6)."";
			$rutafirma="" .pg_result($rlista, $d, 7)."";
		}
		$salida= array($director,
			$cargodirector,
			$rutafirma);
		pg_free_result($rlista);
		return $salida;			
	}	
	public function actualizar($director,$cargodirector,$rutafirma)
	{
		$data = array(
		               'director' => $director,
		               'cargodirector' => $cargodirector,
		               'rutafirma' => $rutafirma
		            );

		$this->db->where('id', '1');
		$this->db->update('sys_portal_web.gw_directorio', $data); 		
	}
}