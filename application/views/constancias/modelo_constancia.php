<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/AdminLTE/demo.js" type="text/javascript"></script>        
<script src="<?php echo base_url(); ?>assets/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/constancias/modelo_constancia.js" type="text/javascript"></script>   
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
				<div class="box-header bg-blue">
					<h3 class="box-title">CREAR O EDITAR MODELO DE CONSTANCIA</h3>
				</div><!-- /.box-header -->
				<!-- form start -->
					<?php
						if (empty($encabezado)) { $encabezado=""; } 
						if (empty($contenido)) { $contenido=""; } 
						if (empty($pie)) { $pie=""; } 
						if (empty($nomina)) { $nomina=""; } 
						if (empty($trabajador)) { $trabajador=""; } 
						if (empty($constancia)) { $constancia=""; } 						
						if (empty($error)) { $error=""; } 
						echo $error;
						$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario', 'enctype' => 'multipart/form-data');
						echo form_open('constancias/Formato/guardar',$attributes);
					?>
					<div class="callout callout-info">
						<div class="form-group" >

						<label for="logo1" class="text-blue">LOGO PRINCIPAL</label>
							<input type="file" name="logo1" > 
							<p class="help-block"></p> 
						</div>
						<div class="form-group">
						<label for="logo2"  class="text-blue">LOGO SECUNDARIO</label>
							<input type="file" name="logo2" > 
							<p class="help-block"></p> 
						</div>
						<div class="form-group">
						<label  class="text-blue" for="encabezado">ENCABEZADO</label>
                            <textarea id="encabezado" name="encabezado" rows="10" cols="80">
                            <?php echo $encabezado; ?>
                            </textarea>
						<p class="help-block"></p> 
						</div>
                                                                							
						<div class="form-group">
						<label  class="text-blue" for="contenido">CONTENIDO</label>
                            <textarea id="contenido" name="contenido" rows="10" cols="80">
                            <?php echo $contenido; ?>
                            </textarea>
						<p class="help-block"></p> 
						</div>
						<div class="form-group">
						<label  class="text-blue" for="pie">PIE</label>
                            <textarea id="pie" name="pie" rows="10" cols="80">
                            <?php echo $contenido; ?>
                            </textarea>
						<p class="help-block"></p> 
						</div>
				        <script type="text/javascript">
				            $(function() {
				                // Replace the <textarea id="contenido"> with a CKEditor
				                // instance, using default configuration.
								var configcontenido = { extraPlugins: 'nombre,cedula,departamento,cargo,ingreso,anio,firmante,cargofirmante,conceptos,fechaactual,justify',toolbar: [{ name: 'insert', items: [ 'NumberedList', 'BulletedList','-','nombre','cedula','departamento','cargo','ingreso','anio','firmante','cargofirmante','conceptos','fechaactual' ] },{ name: 'basicstyles', items: [ 'Bold', 'Italic','Underline' ] },{ name: 'alignment', items : [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] }] };
								var configencabezado = { extraPlugins: 'justify',toolbar: [{ name: 'insert', items: [ 'NumberedList', 'BulletedList' ] },{ name: 'basicstyles', items: [ 'Bold', 'Italic','Underline' ] },{ name: 'alignment', items : [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] }] };
								var configpie = { extraPlugins: 'justify',toolbar: [{ name: 'insert', items: [ 'NumberedList', 'BulletedList'] },{ name: 'basicstyles', items: [ 'Bold', 'Italic','Underline' ] },{ name: 'alignment', items : [ 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock' ] }] };
								CKEDITOR.replace( 'contenido', configcontenido );			
								CKEDITOR.replace( 'pie', configpie);	
								CKEDITOR.replace( 'encabezado', configencabezado);							
				                //bootstrap WYSIHTML5 - text editor
				                $(".textarea").wysihtml5();
				                CKEDITOR.config.disableNativeSpellChecker = true;
				            });
				        </script> 						
						<div class="form-group">
						<label  class="text-blue" for="nomina">TIPO DE NOMINA</label>
                            <select id="nomina" name="nomina">
                            <?php echo $nomina; ?>
                            </select>
						<p class="help-block"></p> 
						</div>													
						<div class="form-group">
						<label  class="text-blue" for="trabajador">TIPO DE TRABAJADOR</label>
                            <select id="trabajador" name="trabajador">
                            <?php echo $trabajador; ?>
                            </select>
						<p class="help-block"></p> 
						</div>													
						<div class="form-group">
						<label  class="text-blue" for="constancia">TIPO DE CONSTANCIA</label>
                            <select id="constancia" name="constancia">
                            <?php echo $constancia; ?>
                            </select>
						<p class="help-block"></p> 
						</div>	
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn bg-blue">Guardar</button>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>
</section><!-- /.content -->

 