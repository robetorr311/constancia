<section class="content">
	<div class="row">
		<!-- left column -->
		<div class="col-md-12">
			<!-- general form elements -->
			<div class="box box-primary">
				<div class="box-header">
					<h3 class="box-title">FIRMA DE CONSTANCIA</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
				<label ><H3> ACTUALIZADA!!</H3></label>	
					<?php	
						$attributes = array('method' => 'post', 'id' => 'formulario', 'name' => 'formulario');
						echo form_open('constancias/Firma/index',$attributes);	
						$generar = array(	'name'        => 'generar',
											'id'          => 'generar',
											'class'		=> 'btn btn-success',
											'value'		=> 'Finalizar');
					?>	
				   	<?php
				   		echo form_submit($generar);
						echo form_close();
					?>
				</div>
			</div>
		</div>
	</div>
</section>