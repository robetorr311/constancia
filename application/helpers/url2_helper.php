<?php

/*
 * Convierte un ARRAY de postgres 
 * 
 * */
function urls_amigables($url) 
	{
		// Tranformamos todo a minusculas
		$url = strtolower($url);
		//Rememplazamos caracteres especiales latinos
		$find = array('á', 'é', 'í', 'ó', 'ú', 'ñ','Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ');
		$repl = array('a', 'e', 'i', 'o', 'u', 'n','a', 'e', 'i', 'o', 'u', 'n');
		$url = str_replace ($find, $repl, $url);
		// Añaadimos los guiones
		$find = array(' ', '&', '\r\n', '\n', '+');
		$url = str_replace ($find, '-', $url);
		// Eliminamos y Reemplazamos demás caracteres especiales
		$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
		$repl = array('', '-', '');
		$url = preg_replace ($find, $repl, $url);
		return $url; 
	}
	
	
	function fullUpper($string){
  		return strtr(strtoupper($string), array(
		  "à" => "À",
		  "ñ" => "Ñ",
		  "è" => "È",
		  "ì" => "Ì",
		  "ò" => "Ò",
		  "ù" => "Ù",
		  "á" => "Á",
		  "é" => "É",
		  "í" => "Í",
		  "ó" => "Ó",
		  "ú" => "Ú",
		  "â" => "Â",
		  "ê" => "Ê",
		  "î" => "Î",
		  "ô" => "Ô",
		  "û" => "Û",
		  "ç" => "Ç",
		));
	} 
	function ver_imagenes($ruta,$imagen) 
	{
		$base = base_url();
		$armado = "<img class='thumbnail' src='".$base.$ruta.$imagen."' width='100%'>";
		return $armado;
	}
	
	function ver_status($valor) 
	{
		if ($valor == 't') {$result = "Activo";} else {$result = "Inactivo";}
		return $result;
	}
	function ver_status2($valor) 
	{
		if ($valor == 't') {$result = "Si";} else {$result = "No";}
		return $result;
	}
	function tipo_enlace($valor) 
	{
		if ($valor == 't') {$result = "Externo";} else {$result = "Interno";}
		return $result;
	}


	function listar_archivos($ruta) 
	{
		$archivos=array();
		$ar=0;
		$directorio = opendir($ruta); 
		while ($archivo = readdir($directorio)) 
		{	
				
			if ($archivo != "." && $archivo != ".." && $archivo!="_notes" && $archivo!="index.html")  
			{	
				$ar = $ar + 1;
				$archivos[$ar] = $archivo;
			}
		}
		closedir($directorio); 
		
		
		return $archivos;
		
		}
?>
