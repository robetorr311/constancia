<!DOCTYPE html>
<html class="bg-black">
    <head>
        <meta charset="UTF-8">
        <title>Sistema de Gestión Integral de la Secretaria de Salud del Estado Aragua</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.blockUI.js" type="text/javascript"></script>

    </head>
    <body class="bg-black">
        <div class="form-box" id="login-box">
            <div name="login" class="header">Oficina Virtual</div>
            <form action="<?php echo base_url(); ?>index.php/login/iniciar_sesion" method="post">
                <div class="body bg-gray">
                	<?php if ($this->session->flashdata('data')): ?>
            
                <div class="alert alert-danger alert-dismissable">
                   
                    <b>¡Error!</b> <?php echo $this->session->flashdata('data'); ?>
                </div>
           
        <?php endif;
		 ?>
                    <div class="form-group">
                        <input type="text" name="usuario" class="form-control" placeholder="Usuario o Cedula" required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                    </div>       
                </div>
                <div class="footer">                                                               
                    <button type="submit" class="btn bg-blue btn-block">Iniciar sesión</button>  

                    <p class= "text-center"><a href="register.html" class="text-center">Registrarse</a> | <a href="olvido.html">¿Has Olvidado Tu Contraseña?</a></p>

                    
                </div>
            </form>
  
            <div class="margin text-center">
                <small>© Copyright 2015 | Todos Los Derechos Reservados | Secretaria Sectorial del Poder Popular para la Salud | Version 1.0</small>
                

            </div>
        </div>
       
        
    </body>
</html>
