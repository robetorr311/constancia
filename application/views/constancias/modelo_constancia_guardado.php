<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">CREAR O EDITAR MODELO DE CONSTANCIA</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				<label >El Modelo ha sido guardado!!!!</label>	
					<?php	
						$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario');
						echo form_open('constancias/Formato/constancia',$attributes);	
						$generar = array(	'name'        => 'generar',
											'id'          => 'generar',
											'class'		=> 'btn btn-success',
											'value'		=> 'Finalizar');
					?>	
					<input type="hidden" id="hmodelo_constancia" name="hmodelo_constancia" value="<?php echo $hmodelo_constancia; ?>">
				   	<?php
				   		echo form_submit($generar);
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</div>
</section>