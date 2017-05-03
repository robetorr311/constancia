<?php

class Modelo_constancia extends CI_Model
{


	public function __construct()
	{
		parent:: __construct();
	}
	public function iddoc(){
		$sql="SELECT nextval('sys_rrhh.modelo_constancia_id_seq');";
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$id= "" .pg_result($rlista, $d, 0). "";
		}
		return $id;		
	}
	public function guardar($id , $htipotrabajador , $htiponomina , $hlogo1 , $hlogo2 , $encabezado , $contenido , $pie , $htipoconstancia )
	{
        $sql="select * from sys_rrhh.fmodelo_constancia($id , $htipotrabajador , $htiponomina , $hlogo1 , $hlogo2 , '$encabezado' , '$contenido' , '$pie' , $htipoconstancia )";
		$rlista=pg_exec($sql);
	}
    public function constancia($id) {
        $this->db->select('*');
		$this->db->from('sys_rrhh.modelo_constancia');
		$data = array('id =' => $id);
		$this->db->where($data);
		return $this->db->get();
    }
    public function ver_constancia($cedula,$tipoconstancia) {
		$sql="SELECT * FROM sys_rrhh.ver_constancia('$cedula', $tipoconstancia)"; 
		$rlista=pg_exec($sql);
		$reg = pg_numrows($rlista);
		for ($d=0; $d < $reg; $d++){
			$id="" .pg_result($rlista, $d, 0)."";
			$hlogo1="" .pg_result($rlista, $d, 1)."";
			$hlogo2="" .pg_result($rlista, $d, 2)."";
			$encabezado="" .pg_result($rlista, $d, 3)."";
			$contenido="" .pg_result($rlista, $d, 4)."";
			$pie="" .pg_result($rlista, $d, 5)."";
		}
		$salida=array($id,
			$hlogo1,
			$hlogo2,
			$encabezado,
			$contenido,
			$pie);
		pg_free_result($rlista);
		return $salida;	
    }    
	public function eliminar($id){
		$this->db->where('id', $id);
		$this->db->delete('sys_rrhh.modelo_constancia'); 
	}    
    public function registro($id)	{
			if (empty($id)){	$id=""; } 
			if (empty($htipotrabajador)){	$htipotrabajador=""; } 
			if (empty($htiponomina)){	$htiponomina=""; } 
			if (empty($hlogo1)){	$hlogo1=""; } 
			if (empty($hlogo2)){	$hlogo2=""; } 
			if (empty($encabezado)){	$encabezado=""; } 
			if (empty($contenido)){	$contenido=""; } 
			if (empty($pie)){	$pie=""; } 
			if (empty($htipoconstancia)){	$htipoconstancia=""; } 
			if (empty($tipotrabajador)){	$tipotrabajador=""; } 
			if (empty($tiponomina)){	$tiponomina=""; } 
			if (empty($tipoconstancia)){	$tipoconstancia=""; }
			$this->db->select('*');
			$this->db->from('sys_rrhh.v_constancia');			
			$this->db->where('id', $id); 
			$consulta = $this->db->get();
			if($consulta->num_rows() > 0)
			{
				foreach ($consulta->result_array() as $registro)
				{
					$htipotrabajador=$registro['htipotrabajador']; 
					$htiponomina=$registro['htiponomina']; 
					$hlogo1=$registro['hlogo1']; 
					$hlogo2=$registro['hlogo2']; 
					$encabezado=$registro['encabezado']; 
					$contenido=$registro['contenido']; 
					$pie=$registro['pie']; 
					$htipoconstancia=$registro['htipoconstancia']; 
					$tipotrabajador=$registro['tipotrabajador']; 
					$tiponomina=$registro['tiponomina']; 
					$tipoconstancia=$registro['tipoconstancia'];
				}
			}
			$result=array($id, 
				$htipotrabajador, 
				$htiponomina, 
				$hlogo1, 
				$hlogo2, 
				$encabezado, 
				$contenido, 
				$pie, 
				$htipoconstancia, 
				$tipotrabajador, 
				$tiponomina, 
				$tipoconstancia);
			return $result;			
	} 
    public function listados($inicio,$direccion){
		if (empty($salida)){ $salida= array(); }
		if (empty($retorno)){ $retorno= array(); }
		$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id;";
		$rlista=pg_exec($lista);
		$reg = pg_numrows($rlista);	
		pg_free_result($rlista);
		if ($direccion==1){
			$r = $inicio+6;
			if ($r>=$reg){
				if ($reg<6){
					$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}
				else {
					$inicio=$reg-6;
					$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id offset $inicio;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);				
				}
			}
			else {
					$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id offset $inicio limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
		else {
			$rf=$inicio-6;
			$r=$inicio-12;	
			if (($inicio<=0) or ($r<=0) or ($rf<=0)){
				if ($reg < 6){
					$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=0;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}	
				else {
		
					$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id limit 6;";
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$inicio=$inicio+6;
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);					
				}					
			}
			else {
					$inicio=$rf;
					$lista="SELECT * from sys_rrhh.v_constancia order by sys_rrhh.v_constancia.id offset $r limit 6;";		
					$rlista=pg_exec($lista);
					$salida = pg_fetch_all($rlista);
					$retorno= array($salida,$inicio);
					pg_free_result($rlista);			
			}
		}
				

		return $retorno;	
	}	

}
