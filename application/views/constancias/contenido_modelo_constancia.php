					<div id="contenidolista">
					<?php
						if (empty($salida)){ $salida= $retorno[0];}
						if (empty($inicio)) { $inicio= $retorno[1]; }
						if (empty($s)){ $s= ""; }		
						$s.="<table><tr><td><span class=\"text-blue\">ID</span></td><td><span class=\"text-blue\">TIPO DE TRABAJADOR</span></td><td><span class=\"text-blue\">TIPO DE NOMINA</span></td><td><span class=\"text-blue\">TIPO DE CONSTANCIA</span></td></tr>";
						for ($d=0; $d < count($salida); $d++){
							$id= "" .$salida[$d]['id']."";
							$tipotrabajador= "" .$salida[$d]['tipotrabajador']."";
							$tiponomina="" .$salida[$d]['tiponomina']."";
							$tipoconstancia="" .$salida[$d]['tipoconstancia']."";
							$s.="<tr><td><span class=\"text-blue\">$id</span></td><td><span class=\"text-blue\">$tipotrabajador</span></td><td><span class=\"text-blue\">$tiponomina</span></td><td><span class=\"text-blue\">$tipoconstancia</span></td><td><div class=\"tools\"><a><i class=\"fa fa-edit\" onclick=\"registro('$id');\"   style=\"cursor:pointer\" ></i></a><a><i class=\"fa fa-trash-o\"   style=\"cursor:pointer\" onclick=\"eliminar('$id');\"></i></a><a href=\"".base_url()."index.php/constancias/Formato/constancia?id=$id\" target=\"blank\" style=\"text-decoration:none\"><i class=\"fa fa-print\"></i></a></div></td></tr>";  
						}	
						$s.="</table><div class=\"box-footer clearfix\">";
						$s.="<div class=\"pull-right\">";
						$s.="<input type=\"hidden\"id=\"inicio\" id=\"inicio\" value=\"$inicio\"/><button id=\"atras\" onclick=\"atras();\"class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-left\"></i></button>";
						$s.="<button id=\"adelante\" onclick=\"adelante();\" class=\"btn btn-xs btn-primary\" ><i class=\"fa fa-caret-right\"></i></button>";
						$s.="</div>";
						$s.="</div>";				
						echo $s;
					?>
                                            				
					</div>