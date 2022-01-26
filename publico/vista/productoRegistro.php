<?php require_once '../includes.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="publico/assets/font-awesome/css/font-awesome.min.css">
 
	<style type="text/css">
		.Btn-registroinfo{
			margin-top: 10px;
		}

		.Btn-registroProducto{
			 width: 10%;

		}
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="jumbotron">
			<div class="row">
				<div class="col-10">
					 <h1 class="display-4"><?=cafeteria17?></h1>
				</div>
				<div  class="col-2" >
					<a type="button" class="btn btn-secondary Btn-registroinfo" href="lista"><?=cafeteria16	?></a>
				</div>
			</div>
		 
		  <hr class="my-4">	 
		  <p class="lead">
		   
 			<form name="registrarProducto">
 				<div class="row">
 					<div class="col-4">
 						<label for="nombre"><?=cafeteria2?></label>
 						<input type="text" name="nombre"  id="nombre" class="form-control">
 					</div>
 					<div class="col-4">
 						<label for="referencia"><?=cafeteria3?></label>
 						<input type="text" name="referencia" id="referencia" class="form-control">
 					</div>
 					<div class="col-4">
 						<label for="precio"><?=cafeteria4?></label>
 						<input type="number" name="precio"  id="precio" class="form-control">
 					</div>
 					
 				</div>
 				<br>
 				<div class="row">
 					<div class="col-4">
 						<label for="peso"><?=cafeteria5?></label>
 						<input type="number" name="peso" id="peso" class="form-control">
 					</div>
 					<div class="col-4">
 						<label for="categoria"><?=cafeteria6?></label>
 						<input type="text" name="categoria" id="categoria" class="form-control">
 					</div>
 					<div class="col-4">
 						<label for="stock"><?=cafeteria7?></label>
 						<input type="number" name="stock" id="stock" class="form-control">
 						<input type="hidden" name="case" value="registrar_producto">
 					</div>
 				</div>
 				<br>

 				<button type="submit" class="btn-success btn form-control Btn-registroProducto" ><?=cafeteria18?></button>
 			</form>
		   

		  </p>
		</div>
		 


		
	</div>

	<script type="text/javascript" src="publico/assets/js/productos.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
 	 
	<script src="publico/assets/js/sweetalert.min.js"></script>  
	<script type="text/javascript">
			$(document).ready(function() {
				productos.registrar_producto();
			})
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>