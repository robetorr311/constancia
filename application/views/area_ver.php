<section class="content">
    <?php if (empty($consulta)): ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>¡No encontrado!</b> Estos valores no están registrados en la base de datos.
        </div>
        <div align="center">
            <a href="<?php echo base_url(); ?>index.php/area_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
        </div>
    <?php else: ?> 
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Registro de Area</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Nombre:</th>                                
                        <th>Ruta:</th>
                    </tr>
                    <tr>
                        <td><?php echo $consulta->espacio ?></td>
                        <td><?php echo $consulta->ruta ?></td>
                    </tr>
                </table>
                <br>
                <div align="center">
                    <a href="<?php echo base_url(); ?>index.php/area_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>