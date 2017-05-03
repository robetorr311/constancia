<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>        
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<link href="<?php echo base_url(); ?>assets/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> 
<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<?php
	if (empty($nombre)){	$nombre=""; } 
	if (empty($cargo)){	$cargo=""; } 
	if (empty($ruta)){	$ruta=""; }
	$director=$registro[0]; 
	$cargodirector=$registro[1]; 
	$ruta=$registro[2];
?>	 
<section class="content">
<div id="formulario">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header bg-light-blue">
					<h3 class="box-title">ACTUALIZAR FIRMA DE CONSTANCIA</h3>
				</div><!-- /.box-header -->
					<form name="formulario" id="formulario" method="post" action="Firma/actualizar" enctype='multipart/form-data'>
					<div class="callout callout-info">			
						<div class="form-group">
						<label class="text-light-blue" for="director">NOMBRE DE DIRECTOR</label>
							<input type="text" name="director" id="director" value="<?php echo $director; ?>">
						<p class="help-block"></p> 
						</div>													
						<div class="form-group">
						<label class="text-light-blue" for="cargo">CARGO</label>
							<input type="text" name="cargodirector" id="cargodirector" value="<?php echo $cargodirector; ?>">
						<p class="help-block"></p> 
						</div>													
						<div class="form-group">

						<label class="text-light-blue" for="archivo">FIRMA DE CONSTANCIA</label>
							<input type="file" name="archivo"> 
							<p class="help-block"></p>
							<img src="<?php 
										$ruta=substr($ruta, 26);
										echo base_url().$ruta; 
										?>"
										> <---- Firma Actual
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn bg-light-blue">Actualizar</button>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</section>
