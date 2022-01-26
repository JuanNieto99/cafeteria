var productos =
{
	inicio:function(){
		productos.lista_productos();
		productos.registrar_producto();
		productos.modificar_producto();
		
	},lista_productos:function(){
	 
			 var table =  $('#producto-table').DataTable({
			    //para cambiar el lenguaje a español
			        "language": {
			                "lengthMenu": "Mostrar _MENU_ registros",
			                "zeroRecords": "No se encontraron resultados",
			                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
			                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
			                "sSearch": "Buscar:",
			                "oPaginate": {
			                    "sFirst": "Primero",
			                    "sLast":"Último",
			                    "sNext":"Siguiente",
			                    "sPrevious": "Anterior"
						     },
						     "sProcessing":"Procesando...",
			            }, 
					    "ajax": {
					    	"url":"publico/controlador/controladorProducto.php?case=lista_productos"
					   		 
					   	},  
				        "scrollCollapse": true,
				        "info":           true,
				        "paging":         true,
				         "pageLength": 25,
				        order: [[ 1, "desc" ]],
				         "columns":[
			                {"data": "nombre"},
			                {"data": "referencia"},
			                {"data": "precio"},
			                {"data": "peso"},
			                {"data": "categoria"},
			                {"data": "stock"},
			                {"data": "fecha"},
			             
			                {"data": "opcion"}
			            ]  
			    });     
			  
					table.on('draw', function(){
					 
					$(".eliminar").on('click', function(){
						 
				      	var id = $(this).attr('data-control');
				       productos.eliminar(id,table)
				   	})
				})
		    

			  
	},registrar_producto:function()
	{

		$('form[name="registrarProducto"]').submit(function(){
			 
			 $.ajax({
			 	url:'publico/controlador/controladorProducto.php',
			 	type :'POST',
			 	data : $('form[name="registrarProducto"]').serialize(),
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data)); 
 

			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	  
			 	 	$("#nombre").val("");
			 	 	$("#referencia").val("");
			 	 	$("#precio").val("");
			 	 	$("#peso").val("");
			 	 	$("#categoria").val("");
			 	 	$("#stock").val("");
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })

			 return false;
		})
	},eliminar:function(id,table)
	{
		swal({
		  title: "¿Estas seguro de eliminar este producto?",
		  text: "No lo podras recuperar",
		  icon: "warning",
		  buttons: true,
		  dangerMode: true,
		})
		.then((willDelete) => {
			if (willDelete) {
				$.ajax({
			 	url:'publico/controlador/controladorProducto.php',
			 	type :'POST',
			 	data :{'case':'eliminar','id':id},
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data));  
   					 $('#producto-table').DataTable().ajax.reload();
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })
			}
		 	
		});
	},modificar_producto:function()
	{
		$('form[name="editarProducto"]').submit(function(){
			$("#subir_productos").click();
			 //alert('asd')
			 $.ajax({
			 	url:'publico/controlador/controladorProducto.php',
			 	type :'POST',
			 	data : $('form[name="editarProducto"]').serialize(),
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data)); 
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })

			 return false;
		})
	}, comprar:function(id,cantidad){

				$.ajax({
			 	url:'publico/controlador/controladorProducto.php',
			 	type :'POST',
			 	data :{'case':'comprar','id':id,'cantidad':cantidad},
			 	success:function(data)
			 	{
			 		 
			 		 data = JSON.parse(JSON.stringify(data));  
			 		 swal(data.mensaje.titulo, data.mensaje.texto, data.mensaje.tipo);
			 		 productos.cargar_productos();
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })
			 
	},cargar_productos:function(){

				$.ajax({
			 		url:'publico/controlador/controladorProducto.php',
			 		type :'POST',
			 		data :{'case':'listarTiendaProductos' },
			 	success:function(data)
			 	{
			 		 
			 		$("#contenedor_productos").html(data.adjunto)
			 	 
			 	},error:function(data)
			 	{
			 		alert('error')	
			 	} 

			 })
			 
	}
}