<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>        
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/constancias/usuarios.js" type="text/javascript"></script>   
<link href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />

<section class="content">
<div id="formulario">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
					<div class="box box-primary">
						<div class="box-header bg-navy">
							<h3 class="box-title">USUARIOS DEL SISTEMA</h3>
						</div><!-- /.box-header -->
						<?php
							if (empty($usuario)) { $usuario=""; } 				
						?>
						<form name="formulario" id="formulario" action = "Usuarios/guardar" method="post">
						<div class="callout callout-info">												
							<label class="text-navy" for="usuario">USUARIOS</label>
                            <select id="usuario" name="usuario">
                            <?php echo $usuario; ?>
                            </select>
							<p class="help-block"></p> 
						</div>	
						<div class="box-footer">
							<button type="submit" class="btn bg-navy">Agregar</button>
						</div>						
						</form>
					</div><!-- /.box-body -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</section>