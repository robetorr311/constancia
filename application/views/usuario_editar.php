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
        <?php if (validation_errors()): ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <i class="fa fa-ban"></i>
                <b>¡Error!</b> <?php echo validation_errors(); ?>
            </div>
        <?php endif; ?>
        <form action="<?php echo base_url(); ?>index.php/usuario_controller/editar_guardar" method="post">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Registro de Usuario</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>                                    
                            <th>Usuario:</th>
                            <th>Contaseña:</th>
                        </tr>
                        <tr>                                 
                            <td><input name="usuario" type="text" class="form-control" value="<?php echo $consulta->usuario; ?>" readonly></td>
                            <td><input name="password1" type="password" class="form-control"></td>
                        </tr>
                        <tr>                                    
                            <th>Repita la Contraseña:</th>
                            <th>Nombre:</th>
                        </tr>
                        <tr>                                 
                            <td><input name="password2" type="password" class="form-control"></td>
                            <td><input name="nombre" type="text" class="form-control"  value="<?php echo $consulta->nombre; ?>" required></td>
                        </tr>
                        <tr>                                    
                            <th>Apellido:</th>
                            <th>Correo:</th>
                        </tr>
                        <tr>                                 
                            <td><input name="apellido" type="text" class="form-control" value="<?php echo $consulta->apellido; ?>" required></td>
                            <td><input name="correo" type="text" class="form-control" value="<?php echo $consulta->email; ?>" readonly></td>
                        </tr>
                        <tr>                                    
                            <th>Estado:</th>
                        </tr>
                        <tr>                                 
                            <td><select name="estatus" class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="0" <?php if ($consulta->estatus == 0) echo 'selected'; ?>>Inactivo</option>
                                </select></td>
                        </tr>
                    </table>
                    <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                    <br><br>
                    <div align="center">
                        <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                        <a href="<?php echo base_url(); ?>index.php/usuario_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
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
                    <form action="<?php echo base_url(); ?>index.php/usuario_controller/agregar_grupos_usuario" method="post">
                        <table class="table">
                            <?php if (empty($l_grupos)): ?>
                                <tr>
                                    <td>No existen Grupos.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($l_grupos as $item): ?>
                                    <?php
                                    $existe = 0;
                                    foreach ($grupos as $item2) {
                                        if ($item->id == $item2->id_grupo) {
                                            $existe = 1;
                                        }
                                    }
                                    ?>
                                    <?php if ($existe == 0): ?>
                                        <tr>
                                            <td><input type="checkbox" name="grupos[]" value="<?php echo $item->id; ?>">&nbsp;<?php echo $item->nombre; ?></td>
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
                    <form action="<?php echo base_url(); ?>index.php/usuario_controller/eliminar_grupos_usuario" method="post">
                        <table class="table">
                            <?php if (empty($grupos)): ?>
                                <tr>
                                    <td>No posee Grupos.</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($grupos as $item): ?>
                                    <tr>
                                        <td><input type="checkbox" name="grupos[]" value="<?php echo $item->id; ?>">&nbsp;<?php echo $item->nombre; ?></td>
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