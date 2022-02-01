<?php 	require_once '../includes.php' ; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="publico/assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="publico/assets/css/producto_compras.css">
		<style type="text/css">
		.Btn-registroinfo{
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="jumbotron">
				<div class="row">
					<div class="col-10">
						 <h1 class="display-4"><?=cafeteria30?></h1>
					</div>
					<div  class="col-2" > 
						<a type="button" class="btn btn-secondary Btn-registroinfo" href="./"><?=cafeteria29?></a>
					</div>
				</div>

		 
		 
		  		<hr class="my-4">
	 	 
				 <div class="row">
				 	
				 </div>
			</div>
		 
		</div>
		<!-- Insertar Aquí contenido -->
		<div class="contenedor"> 
			<div class="slider carousel">
				<div class="row" id="contenedor_productos">
				 
					 
				</div>
				
			 
			</div>
		</div>
	</body>
  
	</div>

	<!-- JavaScript Bundle with Popper -->
	 <script src="publico/assets/js/sweetalert.min.js"></script>  
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="publico/assets/js/productos.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			productos.cargar_productos();
		})
				//Starrr
		$('.starrr').starrr({
		})

		$('.carousel').slick({
		  dots: false,
		  infinite: false,
		  speed: 300,
		  draggable: false,
		  slidesToShow: 4,
		  responsive: [
		    {
		      breakpoint: 1024,
		      settings: {
		        slidesToShow: 3,
		        slidesToScroll: 3,
		        infinite: true,
		        dots: false
		      }
		    },
		    {
		      breakpoint: 800,
		      settings: {
		        slidesToShow: 2,
		        slidesToScroll: 1
		      }
		    },
		    {
		      breakpoint: 600,
		      settings: {
		        slidesToShow: 1,
		        slidesToScroll: 1
		      }
		    },
		  ]
		});

		function comprar(esto){
			var id = esto.getAttribute("data-contol"); 
			cantidad = document.getElementById(id).value;
			productos.comprar(id,cantidad);
			  
		}

	</script>
</body>
</html>