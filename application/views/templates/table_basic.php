<!-- DATA TABLES -->
<link href="<?php echo base_url(); ?>assets/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
<link href="../../../assets/css/bootstrap.css" rel="stylesheet" type="text/css">
<!-- DATA TABLES SCRIPT -->
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/plugins/datatables/date-eu.js" type="text/javascript"></script>


<script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript" >
</script> 

<script type="text/javascript">  
$(document).ready( function() 
{
	$(document).on('click', '#thumbnail', function() {
				alert("muestra imagen");
	});
});
</script>
<!-- Main content -->
<section class="content">
    <div class="col-xs-12">
        <div class="box box-default">
          <div class="box-header">
				<h3 class="box-title"><?php echo $titulo; ?></h3>
            </div><!-- /.box-header -->
                <div class="tabla-botones">
                    <div class="btn-group">
                    <?php 
                        for($i=0;$i<count($header_button);$i++): 
                            echo anchor($controller.'/'.$header_button[$i][0], "<button id='".$header_button[$i][0]."' name='".$header_button[$i][0]."' type='button' class='btn ".$header_button[$i][2]."' title='".$header_button[$i][1]."'><i class='".$header_button[$i][3]."'></i> ".$header_button[$i][1]."</button>");
                        endfor; 
                    ?>
                    </div>
           		</div>
            <div class="box-body table-responsive">
              
                <?php $acum = 1; ?>
                <table id="<?php echo $table_id; ?>" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <!-- <th>Nro</th> -->
                            <?php foreach ($table_headers as $item): ?>
                            <th><?php echo $item[1]; ?></th>
                            <?php endforeach; ?>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>                                
                        <?php foreach ($resultset as $row): ?>
                        
                        
                        
                        
                            <tr>
                                <!-- <td><?php echo $acum; ?></td> -->
                                <?php for($i=0;$i<count($table_headers);$i++): ?>
                                <td>
								<?php 
								  	$prop=$table_headers[$i][0]; 
									$func=$table_headers[$i][2];
									
									if (($func == NULL) or empty($func))
									{
										echo $row->$prop;
									}
									else
									{
										
										$pos = 0;
										$pos = strpos($func, "&");
										if ($pos > 0) 
										{ 
											$funcion = substr($func,0,$pos);
											$ruta = substr($func,$pos+1,strlen($func));
										}
										else 
										{
											$funcion = $func;
										}
										
										for($w=0;$w<count($table_function);$w++):
											if ($funcion == $table_function[$w])
											{
												if ($pos > 0) 
												{ 
													echo $funcion($ruta,$row->$prop);
												}
												else 
												{
													echo $funcion($row->$prop);
												}
												
											}
										endfor;
										
									}
									
									 
								?>
                                </td>
                                <?php endfor; ?>
                                <td align="center">
                                <div class="btn-group">
									 <?php 
                                        for($i=0;$i<count($table_button);$i++): 
											
											echo anchor($controller.'/'.$table_button[$i][0].'/'.$row->id, "<button id='".$row->id."' name='".$row->id."' type='button' class='btn ".$table_button[$i][2]." btn-sm' title='".$table_button[$i][1]."'><i class='".$table_button[$i][3]."'></i></button>");
											
                                           
                                        endfor; 
                                    ?>
                               	</div>
								
                                </td>
                            </tr>
                            <?php $acum++; ?>
                          <?php endforeach; ?>
                    </tbody>
                    
                </table>
            </div><!-- /.box-body -->
            <div class="box-footer">
				
            </div><!-- /.box-header -->
        </div><!-- /.box -->

    </div>

</section><!-- /.content -->


<!-- page script -->

<script type="text/javascript">
    $(function () {
        $('#<?php echo $table_id; ?>').dataTable({
            "oPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": true,      
            "lengthMenu": [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
			"columnDefs": [ { type: 'date-eu', targets: 0 } ]
        });
    });

</script>

