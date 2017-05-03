<!-- DATA TABLES -->
<link href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Menu</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-6">
                    <form action="<?php echo base_url(); ?>index.php/menu_controller/nuevo" method="post">
                        <label for="sistema">Sistema:</label>
                        <div class="input-group input-group-sm">
                            <select name="id_sistema" id="sistema" class="form-control" <?php
                            if ($bloqueo > 0) {
                                echo 'disabled';
                            }
                            ?>>
                                        <?php
                                        foreach ($areas as $item):
                                            $ruta = pg_array_parse($item->arr_ruta);
                                            ?>
                                    <optgroup label="<?php echo $item->espacio ?>">

                                        <?php foreach ($sistemas as $item2): ?>
                                            <?php
                                            $ruta2 = pg_array_parse($item2->arr_ruta);
                                            if ($ruta2[0] == $ruta[0]):
                                                ?>
                                                <option value="<?php echo $item2->id; ?>"<?php
                                                if (isset($id_sistema) && $item2->id == $id_sistema) {
                                                    echo' selected';
                                                }
                                                ?>><?php echo $item2->espacio; ?></option>
                                                    <?php endif; ?>
                                                <?php endforeach; ?>
                                    </optgroup>
                                <?php endforeach; ?>
                            </select>                            
                            <span class="input-group-btn">
                                <button class="btn" type="submit" data-toggle="tooltip" data-placement="top" title="Buscar" <?php
                                if ($bloqueo > 0) {
                                    echo 'disabled';
                                }
                                ?>><i class="fa fa-search"></i></button>
                            </span></div></form></div>                
            </div>
            <br><br>
            <?php if (!empty($menus)): ?>
                <form action="<?php echo base_url(); ?>index.php/menu_controller/nuevo_guardar" method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="titulo">Titulo:</label><br>
                            <input name="titulo" id="titulo" type="text" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="descripcion">Descripcion:</label><br>
                            <input name="descripcion" id="descripcion" type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="icono">Icono:</label><br>
                            <input name="icono" id="icono" type="text" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="url">URL:</label><br>
                            <input name="url" id="url" type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="orden">Orden:</label><br>
                            <input name="orden" id="orden" type="text" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="hpadre">Padre:</label><br>
                            <select name="hpadre" id="hpadre" class="form-control">
                                <option value="">Sin Id Padre</option>
                                <?php foreach ($menus_padres as $item): ?>
                                    <option value="<?php echo $item->id; ?>"><?php echo $item->titulo; ?></option>
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
                                        <?php if ($ruta[1] == $id_sistema): ?>
                                            <tr>
                                                <td align="center"><input type="radio" name="harea" value="<?php echo $item->id; ?>"></td>
                                                <td><?php echo $item->ruta; ?></td>
                                            </tr>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div> 
                    </div>
                    <input type="hidden" name="id_sistema" value="<?php echo $id_sistema ?>">
                    <br><br>
                    <div align="center">
                        <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                        <a href="<?php echo base_url(); ?>index.php/menu_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                        <br><br>
                    </div>
                </form>
            <?php endif; ?>
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