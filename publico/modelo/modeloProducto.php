<?php 
	include '../includes.php';
	header('Content-Type: application/json; charset=utf-8');
	 
	class Modelproducto  
	{
		
		 public function registrar($nombre,$referencia,$stock,$precio ,$peso,$categoria  )
		 {
		 	 $fechaActual = date('Y-m-d H:i:s');
		 	 $sql="INSERT INTO `producto`( `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha`) VALUES   ('".$nombre."','".$referencia."','".$precio."','".$peso."','".$categoria."','".$stock."' ,'".$fechaActual."' ) ";

		 	 $conexiondb = conexion();
		 	 $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();

		 	 return $retorno;
		 }

		 public function lista()
		 {
		 	$conexiondb = conexion(); 
	   		$vista = 'vista_lista_productos';
 
	        $sql = "SELECT `id`, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`, `fecha` FROM `producto` WHERE estado='1'";
	        $retorno = $conexiondb->query($sql);
	       	
	       	if ($retorno->num_rows==0) {
	       		 $data["data"][] = [];
	       	}else{
	         	 
	          while ($r = $retorno->fetch_assoc()) {
	          	$opciones = ' 
	          	<div style="text-aling:center">
	          		<a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($r["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
		 			<a href="editar-'.Encryptar::encrypt_($r["id"]).'"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
	          	</div> 
				 ';
	         
	          
	    
	          	 $data["data"][] = array_map('utf8_encode',  array('nombre' =>utf8_decode($r["nombre"])  ,'precio' =>number_format($r["precio"],2,',','.'), 'categoria' => utf8_decode( $r["categoria"]) ,'stock' =>$r["stock"],'referencia' =>$r["referencia"],'peso' =>$r["peso"] ,'fecha' =>$r["fecha"],'opcion' =>$opciones) ); 
	    
	            }
	          
	   		 $conexiondb->close();

	   	  
	         return   $data;
 
			}
		}

		 public function eliminar($id){
		 	$sql = "UPDATE `producto` SET  `estado`='0'  WHERE `id`=".$id;
		 	$conexiondb = conexion();
 			$retorno = $conexiondb->query($sql);
		 	$conexiondb->close();
		 	
		 	return $retorno; 
		 }

		public function modificar($id,$nombre,$referencia,$stock,$precio ,$peso,$categoria){
		 	$sql =  "UPDATE `producto` SET  `nombre`='$nombre',`referencia`='$referencia',`precio`='$precio',`peso`='$peso',`categoria`='$categoria',`stock`='$stock'  WHERE `id`=$id";
		  
		 	$conexiondb = conexion();
 			 $retorno = $conexiondb->query($sql);
		 	 $conexiondb->close();
		 	 return $retorno; 
		 }

		 public function cargar_productos_compra()
		 {
		 	$conexion = conexion();
		 	$sql = "SELECT id, `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`  FROM `producto` WHERE `estado`='1' " ;
		 	$data = $conexion->query($sql);
		  	$productos ="";
		  	if (!$data ) {
		  		$productos = "<h2>".cafeteria34."</h2>";
		  	}
		 	while ($consu = $data->fetch_assoc()) {

		 	 	$productos .="
		 	 	<div class='col-lg-3'>
		 	 		<div class='producto item'>
						<div class='contenedor-imagen'>
							<a href='#' class='link'></a>
							<img style='width:200px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_pF8GnmChSFfzXblcYqo8-rCIiaZ21m7BUg&usqp=CAU'> 
						</div>				
						<div class='datos'>
							<div class='starrr'></div>
						 
							<h3><a href='#'> ".$consu["nombre"]."</a></h3>
				 
							<small>  ".cafeteria32.$consu["peso"]."</small>
					 
						 
						</div
						<div class='precios'>
							<div class='internet'>
							<div class='row'>
								<div class='col-6'>
									<small>".cafeteria33.$consu["stock"]."</small>
								</div>
								<div class='col-6'>
									<small>".cafeteria35."</small>
									<input type='numer' class='form-control' id='".Encryptar::encrypt_($consu["id"])."' value='1'>
								</div>
							</div>
							
							<span style='color:red;font-size:25px;font-family:bold'>$ ".$consu["precio"]."</span>
							</div>
						 
						</div>
						<a href='#' class='btn-carrito' style='display: block;
						    text-align: center;
						    padding: 15px;
						    background: #9751ff;
						    width: 80%;
						    margin: 0 auto;
						    border-radius: 100px;
						    color: #fff;
						 
						    transition: all ease-in-out 0.3s;' onclick='comprar(this)'  data-contol='".Encryptar::encrypt_($consu["id"])."'><i class='fa fa-shopping-cart'></i> </a>
					</div>
					</div>";
		 	}
 
			$conexion->close();

			return $productos ;
	 	}

 
	 }
 ?>