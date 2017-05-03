            function atras(){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/constancias/Usuarios/atras", 
						 data: {inicio: $("#inicio").val()},
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
						 url: base_url + "/constancias/Usuarios/adelante", 
						 data: {inicio: $("#inicio").val() },
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
            function eliminar(id){
					 $.ajax({
						 type: "POST",
						 url: base_url + "/constancias/Usuarios/eliminar", 
						 data: {id: id, inicio: $("#inicio").val() },
						 success: function(data){ 
								  var container = $('#contenidolista'); 
									  if(data){
											container.html(data);
									  }
								  }
						 });
            }
