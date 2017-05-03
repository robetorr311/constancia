<!-- DATA TABLES -->
<link href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
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
                <h3 class="box-title">Menu</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <form action="<?php echo base_url(); ?>index.php/menu_controller/editar_guardar" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="titulo">Titulo:</label><br>
                            <input name="titulo" id="titulo" type="text" class="form-control" value="<?php echo $consulta->titulo; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="descripcion">Descripcion:</label><br>
                            <input name="descripcion" id="descripcion" type="text" class="form-control" value="<?php echo $consulta->descripcion; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="icono">Icono:</label><br>
                            <input name="icono" id="icono" type="text" class="form-control" value="<?php echo $consulta->icono; ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="url">URL:</label><br>
                            <input name="url" id="url" type="text" class="form-control" value="<?php echo $consulta->url; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="orden">Orden:</label><br>
                            <input name="orden" id="orden" type="text" class="form-control" value="<?php echo $consulta->orden; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="hpadre">Padre:</label><br>
                            <select name="hpadre" id="hpadre" class="form-control">
                                <option value="">Sin Id Padre</option>
                                <?php foreach ($menus_padres as $item): ?>
                                    <option value="<?php echo $item->id; ?>" <?php if ($item->id == $consulta->hpadre) echo 'selected'; ?>><?php echo $item->titulo; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <br><br><br>
                    <div class="row">
                        <div class="col-md-12">
                            <table id="areas" class="table">
                                <thead>
                                    <tr>
                                        <th width=5%>Marcar:</th>
                                        <th>Ruta:</th>                            
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($metodos as $item):
                                        $ruta = pg_array_parse($item->arr_ruta);
                                        ?>
                                        <?php if ($ruta[1] == $consulta->idsistema): ?>
                                            <tr>
                                                <td align="center"><input type="radio" name="harea" value="<?php echo $item->id; ?>" <?php if ($item->id == $consulta->harea) echo 'checked'; ?>></td>
                                                <td><?php echo $item->ruta; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <input type="hidden" name="id_area" value="<?php echo $consulta->harea; ?>">
                    <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                    <br><br>
                    <div align="center">
                        <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                        <a href="<?php echo base_url(); ?>index.php/menu_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                        <br><br>
                    </div>
                </form>
                <br><br>
                <div class="row">
                    <div class="col-md-2 col-lg-offset-5">
                        <a class="btn btn-app" href="<?php echo base_url(); ?>index.php/menu_controller/nuevo">
                            <i class="fa fa-repeat"></i> Borrar
                        </a>
                    </div></div>
                <br>            
            </div>
        </div>
    <?php endif ?>
</section>
<script type="text/javascript">
    $(function () {
        $('#areas').dataTable({
            "oPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false,
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]]
        });
    });
</script>