<section class="content">
    <?php if (empty($consulta)): ?>
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <b>¡No encontrado!</b> Estos valores no están registrados en la base de datos.
        </div>
        <div align="center">
            <a href="<?php echo base_url(); ?>index.php/grupo_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
        </div>
    <?php else: ?> 
        <form action="<?php echo base_url(); ?>index.php/grupo_controller/editar_guardar" method="post">
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
                            <td><input name="nombre" type="text" class="form-control" value="<?php echo $consulta->nombre; ?>" required></td>
                            <td><input name="descripcion" type="text" class="form-control" value="<?php echo $consulta->descripcion; ?>"></td>
                        </tr>
                    </table>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                    <div align="center">
                        <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                        <a href="<?php echo base_url(); ?>index.php/grupo_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                        <br><br>
                    </div>
                </div>
            </div>
        </form>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab">Agregar</a></li>
                <li class=""><a href="#tab_2" data-toggle="tab">Eliminar</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <form action="<?php echo base_url(); ?>index.php/grupo_controller/agregar_area" method="post">
                        <table class="table">
                            <?php if (empty($l_areas)): ?>
                                <tr>
                                    <td>No existen áreas.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($l_areas as $item): ?>
                                    <?php
                                    $existe = 0;
                                    foreach ($areas as $item2) {
                                        if ($item->id == $item2->rut_id) {
                                            $existe = 1;
                                        }
                                    }
                                    ?>
                                    <?php if ($existe == 0): ?>
                                        <tr>
                                            <td><input type="checkbox" name="areas[]" value="<?php echo $item->id; ?>">&nbsp;<?php echo $item->ruta; ?></td>
                                        </tr>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                        <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                        <div align="center">
                            <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                            <br><br>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <form action="<?php echo base_url(); ?>index.php/grupo_controller/eliminar_area" method="post">
                        <table class="table">
                            <?php if (empty($areas)): ?>
                                <tr>
                                    <td>No posee áreas.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($areas as $item): ?>
                                    <tr>
                                        <td><input type="checkbox" name="areas[]" value="<?php echo $item->ga_id; ?>">&nbsp;<?php echo $item->rut_ruta; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </table>
                        <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                        <div align="center">
                            <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                            <br><br>
                        </div>
                    </form>
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div>

    <?php endif; ?>
</section>