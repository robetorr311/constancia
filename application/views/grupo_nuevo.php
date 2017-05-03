<section class="content">    
    <form action="<?php echo base_url(); ?>index.php/grupo_controller/nuevo_guardar" method="post">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Registro de Grupo</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>                                    
                        <th>Nombre:</th>
                        <th>Descripcion:</th>
                    </tr>
                    <tr>                                 
                        <td><input name="nombre" type="text" class="form-control" required></td>
                        <td><input name="descripcion" type="text" class="form-control"></td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Areas:</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="areas" class="table">
                    <thead>
                        <tr>
                            <th width=5%>Marcar:</th>
                            <th>Ruta:</th>                            
                        </tr>
                    </thead>
                    <tbody>                                
                        <?php foreach ($consulta as $item): ?>
                            <tr>
                                <td align="center"><input type="checkbox" name="areas[]" value="<?php echo $item->id; ?>"></td>
                                <td><?php echo $item->ruta; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br>
                <div align="center">
                    <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                    <a href="<?php echo base_url(); ?>index.php/grupo_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
</section>