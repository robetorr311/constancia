<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript" >
</script> 

<script type="text/javascript">  

$(document).ready( function() 
{
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
		/* Escoger la carpeta de galeria par ala noticias*/
	$(document).on('click', '.btnsel', function() {
		$('#articulo_galeria').val($(this).attr('id'));
		bootbox.hideAll();
	});
	
	
	$(document).on('click', '.selcar', function() {
		var ruta = '<?php echo MANEJADOR_WEB_RUTA_GALERIAS; ?>';
		var page = $(this).attr('id');
		$('#lista').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Articulo_controller/mostrar_galerias', {'ruta': ruta, 'page': page});
		
		})
	
	$(document).on('click', '.selim', function() {
		var ruta = '<?php echo MANEJADOR_WEB_RUTA_GALERIAS; ?>'+$(this).attr('id');
		$('#imagenes').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Articulo_controller/mostrar_imagenesgal', {'ruta': ruta});
		})
		
		
	
});
</script>

<div id="lista"> 



<?php
$registros = 6;

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

echo"<div class='col-md-12'><div class='col-md-6'>";

if($total_registros) 
{
	foreach ($fotos as $items): 
	
		echo "
		
		<p>
			<div class='btn-group'>
				<button class='btn btn-flat selim' id='".$items."' data-toggle='tooltip'  data-placement='top' title='Ver imagenes de ".$items."'><i class='fa fa-folder-open-o'></i></button>
				<button class='btn btn-primary btnsel btn-flat' id='".$items."'>".$items."</button>
			</div>
		</p>
		  
		";

	endforeach;
	
}

echo"</div> <div id='imagenes' class='col-md-6'>

</div></div>";
?>

   
           
	
		



<div class="text-center">
			<ul class="pagination">
      <?php    
        if($total_registros) {
		
		
		
		if(($pagina - 1) > 0) {
			echo "<li class='selcar' id='".($pagina-1)."'><a  id='".($pagina-1)."' href='#'>Anterior</a></li>";
		}
		
		for ($i=1; $i<=$total_paginas; $i++){ 
			if ($pagina == $i) 
				echo "<li class='active selcar' id='".$i."'><a  id='".$i."' href='#'>$i</a></li> "; 
			else
				echo "<li class='selcar' id='".$i."'><a id='".$i."' href='#'>$i</a></li> "; 
		}
	  
		if(($pagina + 1)<=$total_paginas) {
			echo "<li class='selcar' id='".($pagina+1)."'><a id='".($pagina+1)."' href='#'>Siguiente</a></li>";
		}
		
	}
	?>

     </div>   
      