<!-- CKEDITOR -->
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript" >
</script> 

<script type="text/javascript">  

$(document).ready( function() 
{
	
	$(document).on('click', '#btnlimpiarimg', function() {
		$('#articulo_imagen').val('');
	});
	$(document).on('click', '#btnimagen', function() {
		var ruta = '<?php echo MANEJADOR_WEB_RUTA_BANNERS; ?>';
		var page = '1';
		$.post(base_url + '/<?php echo MANEJADOR_WEB; ?>/Articulo_controller/mostrar_imagenes/',{'ruta': ruta, 'page': page},function (result)
		{
			bootbox.hideAll();
			/*bootbox*/
			bootbox.dialog({
				message: result,
				title: "Seleccionar Imagen",
				show:true,
				backdrop: true,
				closeButton: true,
				animate: true
			})
			/*bootbox*/
		})
		
	});

});
</script>

<?php 
if ($articulo > 0) 
{ 
	if ($consulta->activo == "t") { $activo = "checked='checked' /";} else {$activo = " /";}
	if ($consulta->enlaceexterno == "t") { $enlaceexterno = "checked='checked' /";} else {$enlaceexterno = " /";}
	if ($consulta->principal == "t") { $principal = "checked='checked' /";} else {$principal = " /";}
	$resultado = array(
		$consulta->id,
		$consulta->texto,
		$consulta->link,
		$consulta->imagen,
		$activo,
		$enlaceexterno,
		$principal
		
	);
}
else
{
$resultado = array(
		"",
		"",
		"",
		"",
		"",
		"",
		""
		
	);
}
?>
<section class="content">
	<form action="<?php echo base_url(); ?>index.php/<?php echo MANEJADOR_WEB; ?>/banner_controller/guardar" method="post">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $titulo; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <label for="banner_titulo">
                              <input type="hidden" name="banner_id" id="banner_id" value="<?php echo $resultado[0]; ?>">
                            Título</label>
                            <input name="banner_titulo" id="banner_titulo" type="text" class="form-control" placeholder="Titulo (100 caracteres)" title='Titulo del Banner (Requerido)' maxlength="100" <?php echo $valores; ?> value="<?php echo $resultado[1]; ?>" required>
                        </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <label for="banner_link">
                            Link</label>
                            <input name="banner_link" id="banner_link" type="text" class="form-control" placeholder="Link del Banner (200 caracteres)" title='Link del Banner (Requerido)' maxlength="200" <?php echo $valores; ?> value="<?php echo $resultado[2]; ?>" required>
                        </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
                <div class="row">
                    <div class="col-md-6 column">       
                        <div class="form-group">
                            <label for="banner_imagen">Imagen</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-picture-o"></i>
                                </div>
                                <input name="articulo_imagen" type="text" class="form-control" id="articulo_imagen" placeholder="Imagen" title='Imagen del Banner (Requerido)' value="<?php echo $resultado[3]; ?>" readonly required>
                                <span class="input-group-btn">
                                <button id="btnimagen" class="btn btn-primary btn-flat" type="button"  <?php echo $valores; ?> ><i class="fa fa-picture-o"></i> Seleccionar</button>
                                <button id="btnlimpiarimg" class="btn btn-danger btn-flat" type="button" <?php echo $valores; ?> ><i class="fa fa-eraser"></i></button>
                                </span>
                            </div>
                        </div>
                    </div><!-- /col-md-6 -->
                   	<div class="col-md-2 column"> 
                    	 <div class="form-group">
                            <label for="banner_activo">Activo</label>
                            <div class="checkbox">
                                 <input type="checkbox" name="banner_activo" id="banner_activo" title="Banner Activo" <?php echo $valores; ?> <?php echo $resultado[4]; ?>>
                            </div>
                        </div>
                 	</div>
                  	<div class="col-md-2 column"> 
                     	<div class="form-group">
                            <label for="banner_enlace">Enlace Externo</label>
                            <div class="checkbox">
                                 <input type="checkbox" name="banner_enlace" id="banner_enlace" title="Banenr Enlace" <?php echo $valores; ?> <?php echo $resultado[5]; ?>>
                            </div>
                        </div>
                 	</div>
                 	<div class="col-md-2 column"> 
                     <div class="form-group">
                            <label for="banner_principal">Principal</label>
                            <div class="checkbox">
                                 <input type="checkbox" name="banner_principal" id="banner_principal" title="Banner Principal" <?php echo $valores; ?> <?php echo $resultado[6]; ?>>
                            </div>
                        </div>
                 	</div>
                	</div><!-- /row -->
               
      
				
            </div><!-- /box-body -->
            
            <div class="box-footer">
            <?php 
			if ($valores == "" or empty($valores))
			{
				echo "<button type='submit' class='btn btn-success'><i class='fa fa-save'></i> Guardar</button>
            <button type='reset' class='btn btn-danger'><i class='fa fa-eraser'></i> Limpiar</button>";
			}
			
			?>
            
            </div><!-- /box-footer -->
        </div>
    </form>
</section>

<script type="text/javascript">
	$(function() {
		
	});
</script>


