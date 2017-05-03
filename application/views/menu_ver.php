<section class="content">
    <?php if (empty($consulta)): ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>¡No encontrado!</b> Estos valores no están registrados en la base de datos.
        </div>
        <div align="center">
            <a href="<?php echo base_url(); ?>index.php/menu_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
        </div>
    <?php else: ?> 
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Registro de Area</h3>
            </div><!-- /.box-header -->
            <div class="box-body">

                <table class="table table-bordered table-striped">
                    <tr>
                        <th>Titulo:</th>                                
                        <th>Descripcion:</th>
                        <th>Icono:</th>
                    </tr>
                    <tr>
                        <td><?php echo $consulta->titulo; ?></td>
                        <td><?php echo $consulta->descripcion; ?></td>
                        <td><?php echo $consulta->icono; ?>&nbsp;<i class="<?php echo $consulta->icono; ?>"></i></td>
                    </tr>
                    <tr>
                        <th>Area:</th>                                
                        <th>URL:</th>
                        <th>Padre:</th>
                    </tr>
                    <tr>
                        <td><?php
                            if (empty($metodo->ruta)) {
                                echo 'No tiene Ruta';
                            } else {
                                echo $metodo->ruta;
                            }
                            ?></td>
                        <td><?php echo $consulta->url; ?></td>
                        <td><?php
                            if (empty($padre->titulo)) {
                                echo 'No tiene Id Padre';
                            } else {
                                echo $padre->titulo;
                            }
                            ?></td>
                    </tr>
                </table>
                <br>
                <div align="center">
                    <a href="<?php echo base_url(); ?>index.php/menu_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
                </div>
            </div>
        </div>
    <?php endif ?>
</section>