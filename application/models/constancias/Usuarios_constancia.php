<?php

class Usuarios_constancia extends CI_Model
{


	public function __construct()
	{
		parent:: __construct();
	}
	
	public function acceso($husuario)
	{
        if (empty($salida)) { $salida=""; } 
        $sql="select * from sys_rrhh.usuarios_constancia where husuario=$husuario;";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		if ($reg>0){
			return true;			
		}
		else {
			return false;
		}
	}
}