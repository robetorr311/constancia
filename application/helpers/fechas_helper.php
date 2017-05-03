<?php

/*
 * Convierte un ARRAY de postgres 
 * 
 * */

 
function fecha_salida($fecha) 
	{ 
	  $anio=substr($fecha,0,4); 
	  $mes=substr($fecha,5,2); 
	  $dia=substr($fecha,8,2); 
	  $dia=(int)$dia; 
	  if ($dia <= 9) {$dm = "0";}  else { $dm = "";} 
	  $mes=(int)$mes; 
	  if ($mes<= 9) {$mm = "0";} else {$mm = "";}
	  $anio=(int)$anio; 
	  $hora=substr($fecha,11,5); 
	  $nuevafecha=$dm.$dia."/".$mm.$mes."/".$anio; 
	  return($nuevafecha); 
	}  

	function fecha_entrada($fecha) 
	{ 
	  $dia=substr($fecha,0,2); 
	  $mes=substr($fecha,3,2); 
	  $anio=substr($fecha,6,4); 
	  $dia=(int)$dia; 
	  if ($dia <= 9) {$dm = "0";}  else { $dm = "";}  
	  $mes=(int)$mes; 
	  if ($mes<= 9) {$mm = "0";}  else {$mm = "";} 
	  $anio=(int)$anio; 
	  $hora=substr($fecha,11,5); 
	  $nuevafecha=$anio."-".$mm.$mes."-".$dm.$dia; 
	  return($nuevafecha); 
	} 
 
?>
