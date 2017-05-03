<link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-6">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">Subir Logo de Constancia</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
					<?php
						if (empty($error)) { $error=""; } 
						echo $error;
						$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario', 'enctype' => 'multipart/form-data');
						echo form_open('constancias/Formato/cargar_archivo',$attributes);
					?>
					<div class="box-body">
						<div class="form-group">
						<label for="archivo">File input</label>
							<input type="file" name="userfile">
							<p class="help-block">Example block-level help text here.</p>
						</div>
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</section><!-- /.content -->
