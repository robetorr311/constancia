<section class="content">
    <div class="row">

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-right box-tools">                                        
                    </div><!-- /. tools -->
                    <i class="fa fa-bar-chart-o"></i>
                    <h3 class="box-title">BIENVENIDO AL SISTEMA DE INFORMACION PARA GENERAR CONSTANCIAS DE TRABAJO</h3>
                </div>
				
                <div class="box-body">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
						<?php
							if (empty($boxformato)) { $boxformato=""; }
							if (empty($boxgenerar)) { $boxgenerar=""; }	
                            if (empty($boxcentros)) { $boxcentros=""; }                             
                            $boxgenerar.="<div class=\"col-lg-3 col-xs-6\">";
                            $boxgenerar.="<div class=\"small-box bg-aqua\"><div class=\"inner\"><h3></h3><p>GENERAR CONSTANCIA<br><br></p></div>";
                            $boxgenerar.="<div class=\"icon\"><i class=\"ion ion-ios7-pricetag-outline\"></i></div>";
                            $boxgenerar.="<a href=\"".base_url()."index.php/constancias/Generar\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";								
							$boxformato.="<div class=\"col-lg-3 col-xs-6\">";
							$boxformato.="<div class=\"small-box bg-blue\"><div class=\"inner\"><h3></h3><p>CREAR O EDITAR MODELO DE CONSTANCIA</p></div>";
							$boxformato.="<div class=\"icon\"><i class=\"ion ion-ios7-pricetag-outline\"></i></div>";
							$boxformato.="<a href=\"".base_url()."index.php/constancias/Formato\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";
							$boxcentros.="<div class=\"col-lg-3 col-xs-6\">";
							$boxcentros.="<div class=\"small-box bg-light-blue\"><div class=\"inner\"><h3></h3><p>FIRMA DE CONSTANCIA<br><br></p></div>";
							$boxcentros.="<div class=\"icon\"><i class=\"ion ion-ios7-pricetag-outline\"></i></div>";
							$boxcentros.="<a href=\"".base_url()."index.php/constancias/Firma\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";
							if (empty($boxusuario)) { $boxusuario=""; }
							$boxusuario.="<div class=\"col-lg-3 col-xs-6\">";
							$boxusuario.="<div class=\"small-box bg-navy\"><div class=\"inner\"><h3></h3><p>USUARIOS<br><br></p></div>";
							$boxusuario.="<div class=\"icon\"><i class=\"ion ion-person-add\"></i></div>";
							$boxusuario.="<a href=\"".base_url()."index.php/constancias/Usuarios\" class=\"small-box-footer\">Click Aqui <i class=\"fa fa-arrow-circle-right\"></i></a></div></div>";										
                            echo $boxgenerar;
                            if ($acc==true)	{
                                echo $boxformato;
                                echo $boxcentros;
                                echo $boxusuario;                                
                            }						
							
														
                        ?>
                       </div><!-- /.row -->
                </div><!-- /.box-body-->
			</div><!-- /.box -->
        </div><!-- /.col -->    
     </div>    

</section>
