<!-- CKEDITOR -->



<?php 
if ($articulo > 0) 
{ 
	
	$resultado = array(
		$consulta->id,
		$consulta->nombre,
		$consulta->link
		
		
	);
}
else
{
$resultado = array(
		"",
		"",
		""
	);
}
?>
<section class="content">
	<form action="<?php echo base_url(); ?>index.php/<?php echo MANEJADOR_WEB; ?>/video_controller/guardar" method="post">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo $titulo; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <label for="video_titulo">
                              <input type="hidden" name="video_id" id="video_id" value="<?php echo $resultado[0]; ?>">
                            Título</label>
                            <input name="video_titulo" id="video_titulo" type="text" class="form-control" placeholder="Titulo del Video (100 caracteres)" title='Titulo del Video (Requerido)' maxlength="100" <?php echo $valores; ?> value="<?php echo $resultado[1]; ?>" required>
                        </div>
                    </div>
                  </div> 
                   <div class="row">
                    <div class="col-md-12 column">
                        <div class="form-group">
                            <label for="video_link">
                            Link</label>
                            <input name="video_link" id="video_link" type="text" class="form-control" placeholder="Link (100 caracteres)" title='Link del video (Requerido)' maxlength="100" <?php echo $valores; ?> value="<?php echo $resultado[2]; ?>" required>
                        </div>
                    </div>
                  </div>              
      
				
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


