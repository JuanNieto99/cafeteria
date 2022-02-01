<?php require_once '../includes.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
		  	    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="publico/assets/datatables/datatables.min.css"/>
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="publico/assets/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
 <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="publico/assets/font-awesome/css/font-awesome.min.css">
 
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
						 <h1 class="display-4"><?=cafeteria39?></h1>
					</div>
					<div  class="col-2" >
						<a type="button" class="btn btn-secondary Btn-registroinfo" href="registro"><?=cafeteria10?></a>
						<a type="button" class="btn btn-secondary Btn-registroinfo" href="./"><?=cafeteria29?></a>
					</div>
				</div>
		 
		  <hr class="my-4">	 
		  <p class="lead">
		   
			    <div class="row">
			    	<div class="col-12">
			    		 <table id="producto-table" class="table">
			    		 	  <thead>
							    <tr>
							      <th scope="col"><?= cafeteria2 ?></th>
							      <th scope="col"><?= cafeteria3 ?></th>
							      <th scope="col"><?= cafeteria4 ?></th>
							      <th scope="col"><?= cafeteria5 ?></th>
							      <th scope="col"><?= cafeteria6 ?></th>
							      <th scope="col"><?= cafeteria7 ?></th>
							      <th scope="col"><?= cafeteria8 ?></th>
							      <th scope="col"><?= cafeteria9 ?></th>
							    </tr>
							  </thead>
			    		 	
			    		 </table>
			    	</div>
			    	
			    </div> 
		  	</p>
		</div>
	</div>

	<script type="text/javascript" src="publico/assets/js/productos.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.0.js"></script>
	<script type="text/javascript" src="publico/assets/datatables/datatables.min.js"></script>  
 	 <script src="publico/assets/js/sweetalert.min.js"></script>    

	<script type="text/javascript">
			$(document).ready(function() {
				productos.inicio();
			})

	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
	<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>