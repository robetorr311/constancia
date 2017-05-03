<!-- CKEDITOR -->
<script src="<?php echo base_url(); ?>assets/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- INPUTMASK -->
<script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/input-mask/jquery.inputmask.date.extensions.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript" >
</script> 

<script type="text/javascript">  

$(document).ready( function() 
{
	

	CKEDITOR.replace('articulo_contenido');
	CKEDITOR.replace('articulo_contenido2');
	$(document).on('click', '#btnlimpiarimg', function() {
		$('#articulo_imagen').val('');
	});
	$(document).on('click', '#btnlimpiargal', function() {
		$('#articulo_galeria').val('');
	});
	$('[data-mask]').inputmask();	
	$(document).on('click', '#btnimagen', function() {
		var ruta = '<?php echo MANEJADOR_WEB_RUTA_ARTICULOS; ?>';
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
	
	$(document).on('click', '#btngaleria', function() {
		
		var ruta = '<?php echo MANEJADOR_WEB_RUTA_GALERIAS; ?>';
		var page = '1';
		$.post(base_url + '/<?php echo MANEJADOR_WEB; ?>/Articulo_controller/mostrar_galerias/',{'ruta': ruta, 'page': page},function (result)
		{
			bootbox.hideAll();
			/*bootbox*/
			bootbox.dialog({
				message: result,
				title: "Seleccionar Galeria",
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
	if ($consulta->destacado == "t") { $destacado = "checked='checked' /";} else {$destacado = " /";}
	$resultado = array(
		$consulta->titulo,
		$consulta->idcategoria,
		$consulta->imagen,
		$consulta->galeria,
		fecha_salida($consulta->fecha),
		substr($consulta->fecha,11,8),
		$consulta->descripcion,
		$consulta->descripcionlarga,
		$activo,
		$destacado,
		$consulta->id
		
	);
}
else
{
$resultado = array(
		"",
		"",
		"",
		"",
		date("d/m/Y"),
		date("H:i:s"),
		"",
		"",
		"",
		"",
		""
	);
}
?>
<section class="content">
	<form action="<?php echo base_url(); ?>index.php/<?php echo MANEJADOR_WEB; ?>/articulo_controller/guardar" method="post">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $titulo; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <label for="articulo_titulo">
                              <input type="hidden" name="articulo_id" id="articulo_id" value="<?php echo $resultado[10]; ?>">
                            Título</label>
                            <input name="articulo_titulo" id="articulo_titulo" type="text" class="form-control" placeholder="Titulo (100 caracteres)" title='Titulo del Articulo (Requerido)' maxlength="100" <?php echo $valores; ?> value="<?php echo $resultado[0]; ?>" required>
                        </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
                <div class="row">
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <label for="articulo_categoria">Categoría</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sort-amount-desc"></i>
                                </div>
                           		<select name="articulo_categoria" title='Categoria del Articulo (Requerido)' class="form-control" <?php echo $valores; ?>>
                                
   							<?php foreach ($categoria as $item): ?>
                            <option value="<?php echo $item->id; ?>" <?php if ($item->id == $resultado[1]) {echo "selected='selected'";} else {echo "";} ?>><?php echo $item->nombre; ?></option>
                        <?php endforeach; ?>                              
                    
                           		</select>
                         	</div> 
                        </div>
                    </div><!-- /col-md-6 -->
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <label for="articulo_imagen">Imagen</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-picture-o"></i>
                                </div>
                                <input name="articulo_imagen" type="text" class="form-control" id="articulo_imagen" placeholder="Imagen" title='Imagen del Articulo (Requerido)' value="<?php echo $resultado[2]; ?>" readonly required>
                                <span class="input-group-btn">
                                <button id="btnimagen" class="btn btn-primary btn-flat" type="button"  <?php echo $valores; ?> ><i class="fa fa-picture-o"></i> Seleccionar</button>
                                <button id="btnlimpiarimg" class="btn btn-danger btn-flat" type="button" <?php echo $valores; ?> ><i class="fa fa-eraser"></i></button>
                                </span>
                            </div>
                        </div>
                    </div><!-- /col-md-6 -->
                </div><!-- /row -->
                <div class="row">
                    <div class="col-md-3 column">
                        <div class="form-group">
                            <label for="articulo_fecha">Fecha</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                             	<input name="articulo_fecha" type="text" class="form-control" value="<?php echo $resultado[4]; ?>"  data-inputmask="'alias': 'dd/mm/yyyy'" data-mask required title='Fecha del Articulo (Requerido)' <?php echo $valores; ?>>
                         	</div>
                            
                        </div>
                    </div><!-- /col-md-3 -->
                    <div class="col-md-3 column">
                        <div class="form-group">
                            <label for="articulo_hora">Hora</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                             	<input name="articulo_hora" type="text" class="form-control"   value="<?php echo $resultado[5]; ?>" required title='Hora del Articulo (Requerido)' <?php echo $valores; ?>>
                         	</div>
                            
                        </div>
                    </div><!-- /col-md-3 -->
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <label for="articulo_galeria">Galería</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-folder-open-o"></i>
                                </div>
                                <input name="articulo_galeria" id="articulo_galeria" type="text" class="form-control" placeholder="Galeria" title='Galeria del Articulo' readonly value="<?php echo $resultado[3]; ?>">
                                <span class="input-group-btn">
                                <button id="btngaleria" class="btn btn-primary btn-flat" type="button" <?php echo $valores; ?>><i class="fa fa-folder-open-o"></i> Seleccionar</button>
                                <button id="btnlimpiargal" class="btn btn-danger btn-flat" type="button" <?php echo $valores; ?>><i class="fa fa-eraser"></i></button>
                                </span>
                            </div>
                        </div>
                    </div><!-- /col-md-6 -->
                </div><!-- /row -->
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                           <label for="articulo_contenido">Inicio del Contenido</label>
                           <textarea name="articulo_contenido" id="articulo_contenido" cols="1" rows="3" class="form-control" placeholder="Contenido (desarrollo del articulo)" required title='Contenido Inicial del Articulo (Requerido)' <?php echo $valores; ?> ><?php echo $resultado[6]; ?></textarea>
                        </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <label for="articulo_contenido2">Continuacion del Contenido</label>
                           <textarea name="articulo_contenido2" id="articulo_contenido2" cols="1" rows="7" class="form-control" placeholder="Contenido (desarrollo del articulo)" title="Contenido (desarrollo del articulo)" <?php echo $valores; ?> > <?php echo $resultado[7]; ?></textarea>
                        </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
				<div class="row">
                    <div class="col-md-6 column">
                        <div class="form-group">
                            <label for="articulo_activo">Activo</label>
                            <div class="checkbox">
                                 <input type="checkbox" name="articulo_activo" id="articulo_activo" title="Articulo Activo" <?php echo $valores; ?> <?php echo $resultado[8]; ?>>
                            </div>
                        </div>
                    </div><!-- /col-md-6 -->
                    <div class="col-md-6 column">
                        <div class="form-group">
                           <label for="articulo_destacado">Destacado</label>
                            <div class="checkbox">
                                 <input type="checkbox" title="Articulo Destacado" name="articulo_destacado" id="articulo_destacado" <?php echo $valores; ?> <?php echo $resultado[9]; ?>>
                            </div>
                        </div>
                    </div><!-- /col-md-6 -->
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


