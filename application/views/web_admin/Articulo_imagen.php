<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript" >
</script> 

<script type="text/javascript">  

$(document).ready( function() 
{
	$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
		
	$(document).on('click', '.thumbnail', function() {
		$('#articulo_imagen').val($(this).attr('id'));
		bootbox.hideAll();
	});
	$(document).on('click', '.selli', function() {
		var ruta = '<?php echo $ruta; ?>';
		var page = $(this).attr('id');
		$('#prueba').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Articulo_controller/mostrar_imagenes', {'ruta': ruta, 'page': page});
		
		})
	
		
		
	
});
</script>
<?php /*print_r($modificacion); */ ?>
<div id="prueba"> 



<?php
$registros = 12;

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
		<div class='col-md-3'>
			<a href='#' class='thumbnail' id='".$items."'>
				<img alt='' src='".base_url().$ruta.$items."' data-toggle='tooltip'  data-placement='top' title='".$items."'>
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
      