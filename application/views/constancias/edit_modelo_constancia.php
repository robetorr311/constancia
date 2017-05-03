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
						if (empty($error)) { $error=""; } 
						if (empty($id)){	$id=""; } 
						if (empty($htipotrabajador)){	$htipotrabajador=""; } 
						if (empty($htiponomina)){	$htiponomina=""; } 
						if (empty($hlogo1)){	$hlogo1=""; } 
						if (empty($hlogo2)){	$hlogo2=""; } 
						if (empty($encabezado)){	$encabezado=""; } 
						if (empty($contenido)){	$contenido=""; } 
						if (empty($pie)){	$pie=""; } 
						if (empty($htipoconstancia)){	$htipoconstancia=""; } 
						if (empty($tipotrabajador)){	$tipotrabajador=""; } 
						if (empty($tiponomina)){	$tiponomina=""; } 
						if (empty($tipoconstancia)){	$tipoconstancia=""; }
						$id=$registro[0]; 
						$htipotrabajador=$registro[1]; 
						$htiponomina=$registro[2]; 
						$hlogo1=$registro[3]; 
						$hlogo2=$registro[4]; 
						$encabezado=$registro[5]; 
						$contenido=$registro[6]; 
						$pie=$registro[7]; 
						$htipoconstancia=$registro[8]; 
						$trabajador=$registro[9]; 
						$nomina=$registro[10]; 
						$constancia=$registro[11];		
						echo $error;
						$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario', 'enctype' => 'multipart/form-data');
						echo form_open('constancias/Formato/actualizar',$attributes);
						echo form_hidden('id',$id);								
					?>
					<div class="callout callout-info">
						<div class="form-group">

						<label class="text-blue" for="logo1">LOGO PRINCIPAL</label>
							<input type="file" name="logo1" > 
							<p class="help-block"></p> 
						</div>
						<div class="form-group">
						<label class="text-blue" for="logo2">LOGO SECUNDARIO</label>
							<input type="file" name="logo2" > 
							<p class="help-block"></p> 
						</div>
						<div class="form-group">
						<label class="text-blue" for="encabezado">ENCABEZADO</label>
                            <textarea id="encabezado" name="encabezado" rows="10" cols="80">
                            <?php echo $encabezado; ?>
                            </textarea>
						<p class="help-block"></p> 
						</div>
                                                                							
						<div class="form-group">
						<label class="text-blue" for="contenido">CONTENIDO</label>
                            <textarea id="contenido" name="contenido" rows="10" cols="80">
                            <?php echo $contenido; ?>
                            </textarea>
						<p class="help-block"></p> 
						</div>
						<div class="form-group">
						<label class="text-blue" for="pie">PIE</label>
                            <textarea id="pie" name="pie" rows="10" cols="80">
                            <?php echo $pie; ?>
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
						<label class="text-blue" for="nomina">TIPO DE NOMINA</label>
                            <select id="nomina" name="nomina">
                            <?php echo $nomina; ?>
                            </select>
						<p class="help-block"></p> 
						</div>													
						<div class="form-group">
						<label class="text-blue" for="trabajador">TIPO DE TRABAJADOR</label>
                            <select id="trabajador" name="trabajador">
                            <?php echo $trabajador; ?>
                            </select>
						<p class="help-block"></p> 
						</div>													
						<div class="form-group">
						<label class="text-blue" for="constancia">TIPO DE CONSTANCIA</label>
                            <select id="constancia" name="constancia">
                            <?php echo $constancia; ?>
                            </select>
						<p class="help-block"></p> 
						</div>	
					</div><!-- /.box-body -->

					<div class="box-footer">
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>
			</div><!-- /.box -->
		</div><!-- /.col -->
	</div><!-- /.row -->
</div>