<section class="content">
    <?php if (validation_errors()): ?>
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <i class="fa fa-ban"></i>
            <b>¡Error!</b> <?php echo validation_errors(); ?>
        </div>
    <?php endif; ?>
    <form action="<?php echo base_url(); ?>index.php/usuario_controller/nuevo_guardar" method="post">
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
                        <td><input name="usuario" type="text" class="form-control" value="<?php echo set_value('usuario'); ?>" required></td>
                        <td><input name="password1" type="password" class="form-control" required></td>
                    </tr>
                    <tr>                                    
                        <th>Repita la Contraseña:</th>
                        <th>Nombre:</th>
                    </tr>
                    <tr>                                 
                        <td><input name="password2" type="password" class="form-control" required></td>
                        <td><input name="nombre" type="text" class="form-control"  value="<?php echo set_value('nombre'); ?>" required></td>
                    </tr>
                    <tr>                                    
                        <th>Apellido:</th>
                        <th>Correo:</th>
                    </tr>
                    <tr>                                 
                        <td><input name="apellido" type="text" class="form-control" value="<?php echo set_value('apellido'); ?>" required></td>
                        <td><input name="correo" type="text" class="form-control" value="<?php echo set_value('correo'); ?>"></td>
                    </tr>
                </table>
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
                            <th width=5%>Marcar:</th>
                            <th>Nombre:</th>
                            <th>Descripcion:</th>
                        </tr>
                    </thead>
                    <tbody>                                
                        <?php foreach ($grupos as $item): ?>
                            <tr>
                                <td align="center"><input type="checkbox" name="grupos[]" value="<?php echo $item->id; ?>"></td>
                                <td><?php echo $item->nombre; ?></td>
                                <td><?php echo $item->descripcion; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <br><br>
            <div align="center">
                <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                <a href="<?php echo base_url(); ?>index.php/usuario_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                <br><br>
            </div>
        </div>
    </form>
</section>