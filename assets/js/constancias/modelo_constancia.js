            function atras(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/constancias/Formato/atras", 
						 data: {inicio: $("#inicio").val(), hcentro: $("#centro").val()},
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function adelante(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/constancias/Formato/adelante", 
						 data: {inicio: $("#inicio").val(), hcentro: $("#centro").val() },
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function registro(id){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/constancias/Formato/registro", 
						 data: {id: id},
						 success: function(data){ 
								  var container = $('#formulario'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }  
            function eliminar(id){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/constancias/Formato/eliminar", 
						 data: {id: id, inicio: $("#inicio").val(), hcentro: $("#centro").val() },
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            } 
