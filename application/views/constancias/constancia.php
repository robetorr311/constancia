	<?php
		if (empty($encabezado)){	$encabezado=""; }
		if (empty($contenido)){	$contenido=""; }
		if (empty($pie)){	$pie=""; }
		if (empty($ruta1)){	$ruta1=""; }
		if (empty($ruta2)){	$ruta2=""; }
	?>
	<page backtop="25mm" backbottom="2mm" >
	<page_header>
	<table border="0" width="100%"><tr><td><img src="<?php echo base_url().$ruta1; ?>" ></td><td><?php echo $encabezado; ?></td><td><img src="<?php echo base_url().$ruta2; ?>" ></td></tr></table> 
	</page_header>
	<table border="0" width="100%"><tr><td><?php echo $contenido; ?></td></tr></table> 
	<page_footer>
	<table border="0" width="100%"><tr><td><?php echo $pie; ?> </td></tr></table>
	</page_footer>
	</page>