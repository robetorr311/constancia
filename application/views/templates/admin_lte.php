<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title><?php echo $sys_title ?></title>
        
        <script type="text/javascript">
			/**
			* Esta variable nos permite usar la base URL en todos los
			* demás scripts.
			**/
			var base_url = "<?php echo site_url(); ?>";
		</script>


        <!-- bootstrap 3.0.2 -->
        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- font Awesome -->
        <link href="<?php echo base_url(); ?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="<?php echo base_url(); ?>assets/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url(); ?>assets/css/AdminLTE.css" rel="stylesheet" type="text/css" />
        <!-- Custom -->
        <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css" />

        <!-- jQuery 2.0.2 -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/js/AdminLTE/app.js" type="text/javascript"></script> 
        <script src="<?php echo base_url(); ?>assets/js/personalizado.js" type="text/javascript"></script>   

    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="<?php echo base_url(); ?>index.php/inicio" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                Oficina Virtual
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Ocultar Navegación</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="dropdown user user-menu">
                        	<?php $this->load->view('templates/select_system'); ?>
                          </li>
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>&nbsp;
                                <span><?php echo $usr_nombre; ?><i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Perfil</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?php echo site_url('login/cerrar_sesion'); ?>" class="btn btn-default btn-flat">Cerrar Sesión</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

<!-------------------------SIDEBAR------------------------------------->

		<div class="wrapper row-offcanvas row-offcanvas-left">
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="left-side sidebar-offcanvas">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<?php $this->load->view('templates/side_menu'); ?>
					</ul>
				</section>
				<!-- /.sidebar -->
			</aside>

			<!-- Right side column. Contains the navbar and content of the page -->
			<aside class="right-side">
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<?php $this->load->view('templates/content_header'); ?>
				</section>

				<script>
		//            LLamado para dejar estatico el header y sidebar
					change_layout();

				</script>

<?php echo $msg_valid ?>

<!---------------------------MAIN CONTENT------------------------------>
<?php echo $main ?>


<!---------------------------FOOTER------------------------------------>

			<!-- Cierre Sidebar y contenido -->
			</aside><!-- /.right-side -->
		</div><!-- ./wrapper -->
    </body>
</html>
