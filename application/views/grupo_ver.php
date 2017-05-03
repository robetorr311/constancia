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
            <a href="<?php echo base_url(); ?>index.php/grupo_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
        </div>
    <?php else: ?> 
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
                        <td><?php echo $consulta->nombre ?></td>
                        <td><?php echo $consulta->descripcion ?></td>
                    </tr>
                </table>
                <br>
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
                            <th>Ruta:</th>                            
                        </tr>
                    </thead>
                    <tbody>                                
                        <?php foreach ($areas as $item): ?>
                            <tr>
                                <td><?php echo $item->rut_ruta; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br>
                <div align="center">
                    <a href="<?php echo base_url(); ?>index.php/grupo_controller/index"><span class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Ver registros"><i class="glyphicon glyphicon-list"></i></span></a>
                </div>
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