<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>        
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
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
				<div class="box-header bg-aqua">
					<h3 class="box-title">GENERAR CONSTANCIA DE TRABAJO</h3>
				</div><!-- /.box-header -->
				<?php
						if (empty($constancia)) { $constancia=""; } 				
				?>
					<form name="formulario" id="formulario" method="post" action="Generar/constancia">
					<div class="callout callout-info">			
						<div class="form-group">
						<label class="text-aqua" for="cedula">INGRESE SU NUMERO DE CEDULA</label>
							<input type="text" name="cedula" id="cedula">
						<p class="help-block"></p> 
						</div>													
						<label class="text-aqua" for="constancia">TIPO DE CONSTANCIA</label>
                            <select id="constancia" name="constancia">
                            <?php echo $constancia; ?>
                            </select>
						<p class="help-block"></p> 
					</div>	
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn bg-aqua">Generar</button>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</section>
