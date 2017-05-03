<!-- CKEDITOR -->




<section class="content">
<?=$error;?>
<?=form_open_multipart('upload/do_upload'); ?>
	
		<div class="box">
            <div class="box-header">
                <h3 class="box-title"><?php echo "subir archivos"; ?></h3>
            </div><!-- /box-header -->
            <div class="box-body">
            	
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
                        <div class="form-group">
                           
                            <input type="file" name="userfile" size="20" />
                        </div>
                    </div><!-- /col-md-12 -->
                </div><!-- /row -->
                
               
               
				
            </div><!-- /box-body -->
            
            <div class="box-footer">
            <button type='submit' class='btn btn-success' value='upload'><i class='fa fa-save'></i> Subir Archivo</button>
            <button type='reset' class='btn btn-danger'><i class='fa fa-eraser'></i> Limpiar</button>
            
            </div><!-- /box-footer -->
        </div>
    </form>
</section>




