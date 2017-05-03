$(document).ready(function() 
{
	
	
	$('#ssistema').change(function()	
	{
		
		var menu = $('#ssistema').val();
		
		$.ajax({
			
			type: 'GET',
			url: 'http://localhost/intranet-admin/index.php/inicio/index/menu/'+menu+'',
			success: function(data) {
				
						$('#sistemamenu').html(data);
						/*alert(data);*/
						
					
				}
			})
			return false;	
				
	});
});// JavaScript Document