<script type="text/javascript">  

$(document).ready( function() 
{
	
		
	$(document).on('click', '.selli', function() {
		var valor = $('#imagen_rutae').val();
		
		if ((valor == 'articulos') || (valor == 'banners'))
		{
			if (valor == 'articulos')
			{
				var ruta = '<?php echo MANEJADOR_WEB_RUTA_ARTICULOS; ?>'
			}
			if (valor == 'banners')
			{
				var ruta = '<?php echo MANEJADOR_WEB_RUTA_BANNERS; ?>'
			}
		}
		else
		{
			var ruta = '<?php echo MANEJADOR_WEB_RUTA_GALERIAS; ?>'+valor+'/'
			
		}
		var page = $(this).attr('id');
		$('#imagenes').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Imagen_controller/mostrar_imagenes', {'ruta': ruta, 'page': page});
		
		})
	
	
		
		
	
});
</script>

<div id="imagenes"> 



<?php
$registros = 18;

if (!$pagina) 
{ 
    $inicio = 0; 
    $pagina = 1; 
} 
else 
{ 
    $inicio = ($pagina - 1) * $registros; 
} 
$total_registros = $total; 
$total_paginas = ceil($total_registros / $registros); 		  			

echo"<div class='col-md-12'>";
if($total_registros) 
{
	foreach ($fotos as $items): 
		
		echo "
		<div class='col-md-2'>
			<a class='thumbnail' id='".$items."'>
				
				<img alt='' src='".base_url().$ruta.$items."'title='".$items."'><input name=".$items." class'form-control' type='checkbox' id=".$items.">
			</a>
		</div>   
		";

	endforeach;
	
}
echo"</div>";
?>

	
		



<div class="text-center">
			<ul class="pagination">
      <?php    
        if($total_registros) {
		
		
		
		if(($pagina - 1) > 0) {
			echo "<li class='selli' id='".($pagina-1)."'><a  id='".($pagina-1)."' href='#'>Anterior</a></li>";
		}
		
		for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) 
				echo "<li class='active selli' id='".$i."'><a  id='".$i."' href='#'>$i</a></li> "; 
			else
				echo "<li class='selli' id='".$i."'><a id='".$i."' href='#'>$i</a></li> "; 
		}
	  
		if(($pagina + 1)<=$total_paginas) {
			echo "<li class='selli' id='".($pagina+1)."'><a id='".($pagina+1)."' href='#'>Siguiente</a></li>";
		}
		
	}
	?>
</ul>
     </div>   
      