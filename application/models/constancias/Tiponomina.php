<?php

class Tiponomina extends CI_Model
{


	public function __construct()
	{
		parent:: __construct();
	}
	public function select()
	{
         if (empty($salida)) { $salida=""; } 
       $sql="select * from sys_rrhh.tiponomina order by id";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		$salida.="<option value=\"0\">SELECCIONE</option>";
		for ($d=0; $d < $reg; $d++){
			$id= "" .pg_result($rlista, $d, 0)."";
			$nombre="" .pg_result($rlista, $d, 1)."";
		$salida.="<option value=\"$id\">$nombre</option>";
		}
		pg_free_result($rlista);
		return $salida;			
	}	
	public function select_post($id)
	{
         if (empty($salida)) { $salida=""; } 
       $sql="select * from sys_rrhh.tiponomina where id=$id;";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$id= "" .pg_result($rlista, $d, 0)."";
			$nombre="" .pg_result($rlista, $d, 1)."";
			$salida.="<option selected value=\"$id\">$nombre</option>";
		}
		pg_free_result($rlista);
		return $salida;			
	}
}
