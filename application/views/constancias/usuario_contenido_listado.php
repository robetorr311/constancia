					<?php
						if (empty($salida)){ $salida= $retorno[0];}
						if (empty($inicio)) { $inicio= $retorno[1]; }
						if (empty($s)){ $s= ""; }		
						$s.="<table><tr><td><span class=\"text-navy\">ID</th><td><span class=\"text-navy\">NOMBRE</th><td><span class=\"text-navy\">CONTROLES</th></tr>";
						for ($d=0; $d < count($salida); $d++){
							$id= "" .$salida[$d]['id']."";
							$husuario= "" .$salida[$d]['husuario']."";
							$login="" .$salida[$d]['nombre']."";			
							$s.="<tr><td><span class=\"text-navy\">$id</td><td><span class=\"text-navy\">$login</td><td><span class=\"text-navy\"><div class=\"tools\"><i class=\"fa fa-trash-o\" onclick=\"eliminar('$id');\"></i></div></td></tr>";  
						}	
						$s.="</table><div class=\"box-footer clearfix\">";
						$s.="<div class=\"pull-right\">";
						$s.="<input type=\"hidden\"id=\"inicio\" id=\"inicio\" value=\"$inicio\"/><button id=\"atras\" onclick=\"atras();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
						$s.="<button id=\"adelante\" onclick=\"adelante();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
						$s.="</div>";
						$s.="</div>";				
						echo $s;
					?>