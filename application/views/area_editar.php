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
            <a href="<?php echo base_url(); ?>index.php/area_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
        </div>
    <?php else: ?> 
        <form action="<?php echo base_url(); ?>index.php/area_controller/editar_guardar" method="post">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Editor de Area</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <tr>                                    
                            <th>Nombre:</th>
                        </tr>
                        <tr>                                 
                            <td><input name="nombre" type="text" class="form-control" value="<?php echo $consulta->espacio; ?>" required></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Id Padre:</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <table id="padres" class="table">
                        <thead>
                            <tr>
                                <th width=5%>Marcar:</th>
                                <th>Ruta:</th>                            
                            </tr>
                        </thead>
                        <tbody>                                
                            <?php foreach ($padres as $item): ?>
                                <tr>
                                    <td align="center"><input type="radio" name="hpadre" value="<?php echo $item->id; ?>" <?php if ($item->id == $consulta->id_padre) echo 'checked'; ?>></td>
                                    <td><?php echo $item->ruta; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br><br>
                    <input type="hidden" name="id" value="<?php echo $consulta->id; ?>">
                    <div align="center">
                        <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                        <a href="<?php echo base_url(); ?>index.php/area_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                        <br><br>
                    </div>
                </div>
            </div>
        </form>
    <?php endif ?>
</section>
<script type="text/javascript">
    $(function () {
        $('#padres').dataTable({
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