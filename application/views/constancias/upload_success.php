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
				echo $error;?>
				<?php echo form_open_multipart('constancias/Formato/index'); ?>
					<div class="box-body">
						<div class="form-group">
						<label for="exampleInputFile">File input</label>
							<!--<input type="file" id="exampleInputFile"> 
							<p class="help-block">Example block-level help text here.</p> -->
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
