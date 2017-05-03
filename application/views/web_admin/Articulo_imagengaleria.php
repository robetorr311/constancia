<br>
<?php

	foreach ($fotos as $items): 
	
		echo "
		<div class='col-md-6'>
			<a class='thumbnail'>
				<img alt='' src='".base_url().$ruta."/".$items."'>
			</a>
		</div>   
		";

	endforeach;
	
?>

           
	