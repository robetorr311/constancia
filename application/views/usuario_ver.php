<section class="content">
    <?php if (empty($consulta)): ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>¡No encontrado!</b> Estos valores no están registrados en la base de datos.
        </div>
        <div align="center">
            <a href="<?php echo base_url(); ?>index.php/usuario_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
        </div>
    <?php else: ?> 
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Registro de Usuario</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>                                    
                        <th>Usuario:</th>
                        <th>Correo:</th>
                    </tr>
                    <tr>                                 
                        <td><?php echo $consulta->usuario; ?></td>
                        <td><?php echo $consulta->email; ?></td>
                    </tr>
                    <tr>                                    
                        <th>Nombre:</th>
                        <th>Apellido:</th>
                    </tr>
                    <tr>                                 
                        <td><?php echo $consulta->nombre; ?></td>
                        <td><?php echo $consulta->apellido; ?></td>
                    </tr>
                </table>
                <br><br>
                <div align="center">
                    <a href="<?php echo base_url(); ?>index.php/usuario_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
                </div>
            </div>
        </div>
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Grupos:</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table id="areas" class="table">
                    <thead>
                        <tr>
                            <th>Nombre:</th>
                            <th>Descripcion:</th>
                        </tr>
                    </thead>
                    <tbody>                                
                        <?php foreach ($grupos as $item): ?>
                            <tr>
                                <td><?php echo $item->nombre; ?></td>
                                <td><?php echo $item->descripcion; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php endif ?>
</section>