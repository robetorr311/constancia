<!-- DATA TABLES -->
<link href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<section class="content">
    <form action="<?php echo base_url(); ?>index.php/area_controller/nuevo_guardar" method="post">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Registro de Area</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <tr>                                    
                        <th>Nombre:</th>
                    </tr>
                    <tr>                                 
                        <td><input name="nombre" type="text" class="form-control" required></td>
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
                        <?php foreach ($consulta as $item): ?>
                            <tr>
                                <td align="center"><input type="radio" name="hpadre" value="<?php echo $item->id; ?>"></td>
                                <td><?php echo $item->ruta; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <br><br>
                <div align="center">
                    <button class="btn btn-success" type="submit" data-toggle="tooltip" data-placement="top" title="Guardar"><i class="glyphicon glyphicon-ok"></i></button>
                    <a href="<?php echo base_url(); ?>index.php/area_controller/index"><span class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Cancelar"><i class="glyphicon glyphicon-remove"></i></span></a>
                    <br><br>
                </div>
            </div>
        </div>
    </form>
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