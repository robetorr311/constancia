<section class="content">
<div class="box">
    <div class="box-header">
        <h3 class="box-title"><?php echo "Previsualizar Articulo"; ?></h3>
    </div><!-- /box-header -->
    <div class="box-body"> 
    <div class="row">
    	<div class="col-md-2 column">
        </div>
    	<div class="text-center col-md-8 column">
		<img src="http://localhost/plantilla-migracion/uploads/web/articulos/<?php echo $consulta->imagen;?>" class="img-responsive"/>
        </div>
        <div class="col-md-2 column">
        </div>
        </div>
    	<h3 class="text-center"> <?php echo $consulta->titulo;?></h3>
 		<p><small><?php echo fecha_salida($consulta->fecha);?> / <?php echo substr($consulta->fecha,11,8);?></small></p>
		<div class="text-justify">
      		<?php echo $consulta->descripcion;?>
      		<?php echo $consulta->descripcionlarga;?>
     	</div>
 	</div>
    <div class="box-footer"> 
    </div>
    
</section>
