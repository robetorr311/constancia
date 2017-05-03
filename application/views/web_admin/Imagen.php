<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript" >
</script> 
<script type="text/javascript">  

$(document).ready( function() 
{
	$(document).on('click', '#btneliminarimagenes', function() {
		var nombres = [];
		var valor = $('#imagen_rutae').val();
		$("input[type=checkbox]:checked").each( function ()
		{
			nombres.push($(this).attr('id'));
		})
		$('#msg').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Imagen_controller/eliminar_imagenes', {'nombres': nombres, 'tipo': valor});
		$('#imagenes').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Imagen_controller/mostrar_imagenes', {'ruta': ruta, 'page': page});

		
		
	
		
		/*$.post(base_url + '/<?php /*echo MANEJADOR_WEB; */ ?>/Imagen_controller/eliminar_imagenes/',{'nombres': nombres, 'tipo': valor },function (result)
		{
			alert(result);
		})*/
		
		
	});
	
	$(document).on('change', '.sellicombo', function() {
		var valor = $('#imagen_rutae').val();
		
		if ((valor == 'articulos') || (valor == 'banners'))
		{
			if (valor == 'articulos')
			{
				var ruta = '<?php echo MANEJADOR_WEB_RUTA_ARTICULOS; ?>'
			}
			if (valor == 'banners')
			{
				var ruta = '<?php echo MANEJADOR_WEB_RUTA_BANNERS; ?>'
			}
		}
		else
		{
			var ruta = '<?php echo MANEJADOR_WEB_RUTA_GALERIAS; ?>'+valor+'/'
			
		}
		
		var page = 1;
		
		$('#imagenes').load(base_url + '/<?php echo MANEJADOR_WEB; ?>/Imagen_controller/mostrar_imagenes', {'ruta': ruta, 'page': page});
		
		})
	
		
		
	
});
</script>
<div id="msg"></div>

<section class="content">
<form action="<?php echo base_url(); ?>index.php/<?php echo MANEJADOR_WEB; ?>/imagen_controller/subir" method="post">
    <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo "Subir Imagenes"; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                	<div class="col-md-12 column">
                        <div class="form-group">
                            <label for="articulo_categoria">Categoría</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sort-amount-desc"></i>
                                </div>
                           		<select name="imagen_ruta" id="imagen_ruta" title='Categoria del Articulo (Requerido)' class="form-control">
                                <option value="articulos" >articulos</option>
                                <option value="banners" >banners</option>
   							<?php foreach ($carpetas as $item):?>
                            
                            <option value="<?php echo $item; ?>" ><?php echo $item; ?></option>
                        <?php endforeach; ?>                              
                    
                           		</select>
                         	</div> 
                        </div>
                    </div>
                    
				</div>
                <div class="row">
                	<div class="col-md-12 column">
                        <div id="adjuntos" >
                            <input name="archivos[]" type="file"  required />
                           
                        </div>
            			<a href="#" onclick="addCampo()">Subir otro archivo</a>
                    </div>
                </div>
            </div><!-- /box-body -->
            
            <div class="box-footer">
            <button type='submit' class='btn btn-success'><i class='fa fa-save'></i> Subir</button>
            <button type='reset' class='btn btn-danger'><i class='fa fa-eraser'></i> Limpiar</button>
            
            </div><!-- /box-footer -->
        </div>
    </form>
  <!-- --------------------------------------------------------- -->  
    <!-- --------------------------------------------------------- -->  
      <!-- -----------subir imagenes hasta aca-------------------------------- -->  
        <!-- --------------------------------------------------------- -->  
          <!-- --------------------------------------------------------- -->  
    
    
     <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo "Eliminar Imagenes"; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                	<div class="col-md-12 column">
                        <div class="form-group">
                            <label for="articulo_categoria">Galería</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sort-amount-desc"></i>
                                </div>
                           		<select name="imagen_rutae" id="imagen_rutae" title='Categoria del Articulo (Requerido)' class="form-control sellicombo">
                                <option value="articulos" >articulos</option>
                                <option value="banners" >banners</option>
   							<?php foreach ($carpetas as $item):?>
                            
                            <option value="<?php echo $item; ?>" ><?php echo $item; ?></option>
                        <?php endforeach; ?>                              
                    
                           		</select>
                         	</div> 
                        </div>
                    </div>
                    
				</div>
                 <div id="imagenes"></div>
            </div><!-- /box-body -->
            
            <div class="box-footer">
            <button id="btneliminarimagenes" type='submit' class='btn btn-success '><i class='fa fa-save'></i> Eliminar</button>
            <button type='reset' class='btn btn-danger'><i class='fa fa-eraser'></i> Limpiar</button>
            
            </div><!-- /box-footer -->
        </div>
      <!-- --------------------------------------------------------- -->  
    <!-- --------------------------------------------------------- -->  
      <!-- -----------eliminar imagenes hasta aca------------------- -->  
        <!-- --------------------------------------------------------- -->  
          <!-- --------------------------------------------------------- -->  
          
          
          	<form action="<?php echo base_url(); ?>index.php/<?php echo MANEJADOR_WEB; ?>/imagen_controller/crear" method="post">
		<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo "Crear Galeria"; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                	<div class="col-md-12 column">
                        <div class="form-group">
                            <label for="imagen_ruta">Directorio</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sort-amount-desc"></i>
                                </div>
                           		<input name="imagen_ruta" id="imagen_ruta" type="text" class="form-control" placeholder="Directorio (30 caracteres)" title='Directorio (Requerido)' maxlength="`30" >
                         	</div>
                              
                        </div>
                    </div>
				</div>
            </div><!-- /box-body -->
            
            <div class="box-footer">
            
			
				<button type='submit' class='btn btn-success'><i class='fa fa-save'></i> Crear</button>
            <button type='reset' class='btn btn-danger'><i class='fa fa-eraser'></i> Limpiar</button>
            
            </div><!-- /box-footer -->
        </div>
       </form>
          <!-- --------------------------------------------------------- -->  
    <!-- --------------------------------------------------------- -->  
      <!-- -----------crear directorio hasta aca------------------- -->  
        <!-- --------------------------------------------------------- -->  
          <!-- --------------------------------------------------------- -->  
            <form action="<?php echo base_url(); ?>index.php/<?php echo MANEJADOR_WEB; ?>/imagen_controller/eliminar" method="post">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo "Eliminar Galeria"; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	<?php if (empty($msg_error)){} else {echo $msg_error;} ?>
                <div class="row">
                	<div class="col-md-12 column">
                        <div class="form-group">
                            <label for="imagen_rutae">Directorio</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-sort-amount-desc"></i>
                                </div>
                           		<select name="imagen_rutae" id="imagen_rutae" class="form-control">
                                
   							<?php foreach ($carpetas as $item):?>
                            
                            <option value="<?php echo $item; ?>" ><?php echo $item; ?></option>
                        <?php endforeach; ?>                              
                    
                           		</select>
                         	</div> 
                        </div>
                    </div>
				</div>
            </div><!-- /box-body -->
            
            <div class="box-footer">
            <button type='submit' class='btn btn-success'><i class='fa fa-save'></i> Eliminar</button>
            <button type='reset' class='btn btn-danger'><i class='fa fa-eraser'></i> Limpiar</button>
			
			
	
            
            </div><!-- /box-footer -->
        </div>
    </form>
    
    
</section>

<script type="text/javascript">
var numero = 0; //Esta es una variable de control para mantener nombres
            //diferentes de cada campo creado dinamicamente.
evento = function (evt) { //esta funcion nos devuelve el tipo de evento disparado
   return (!evt) ? event : evt;
}

//Aqui se hace lamagia... jejeje, esta funcion crea dinamicamente los nuevos campos file
addCampo = function () { 
//Creamos un nuevo div para que contenga el nuevo campo
   nDiv = document.createElement('div');
//con esto se establece la clase de la div
   nDiv.className = 'archivo';
//este es el id de la div, aqui la utilidad de la variable numero
//nos permite darle un id unico
   nDiv.id = 'file' + (++numero);
//creamos el input para el formulario:
   nCampo = document.createElement('input');
//le damos un nombre, es importante que lo nombren como vector, pues todos los campos
//compartiran el nombre en un arreglo, asi es mas facil procesar posteriormente con php
   nCampo.name = 'archivos[]';
//Establecemos el tipo de campo
   nCampo.type = 'file';   
   nCampo.required = 'required'; 
    nCampo.className = 'cajamediana';
//Ahora creamos un link para poder eliminar un campo que ya no deseemos
   a = document.createElement('a');
//El link debe tener el mismo nombre de la div padre, para efectos de localizarla y eliminarla
   a.name = nDiv.id;
//Este link no debe ir a ningun lado
   a.href = '#';
//Establecemos que dispare esta funcion en click
   a.onclick = elimCamp;
//Con esto ponemos el texto del link
   a.innerHTML = ' Eliminar';
//Bien es el momento de integrar lo que hemos creado al documento,
//primero usamos la función appendChild para adicionar el campo file nuevo
   nDiv.appendChild(nCampo);
//Adicionamos el Link
   nDiv.appendChild(a);
//Ahora si recuerdan, en el html hay una div cuyo id es 'adjuntos', bien
//con esta función obtenemos una referencia a ella para usar de nuevo appendChild
//y adicionar la div que hemos creado, la cual contiene el campo file con su link de eliminación:
   container = document.getElementById('adjuntos');
   container.appendChild(nDiv);
}
//con esta función eliminamos el campo cuyo link de eliminación sea presionado
elimCamp = function (evt){
   evt = evento(evt);
   nCampo = rObj(evt);
   div = document.getElementById(nCampo.name);
   div.parentNode.removeChild(div);
}
//con esta función recuperamos una instancia del objeto que disparo el evento
rObj = function (evt) { 
   return evt.srcElement ?  evt.srcElement : evt.target;
}
</script>


