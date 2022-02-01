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
	       	$array = array(); 
	       	while ($r = $retorno->fetch_assoc()) {
	       		array_push($array, array("id"=> $r["id"],'nombre' =>$r["nombre"]  ,'precio' =>$r["precio"], 'categoria' =>  $r["categoria"] ,'stock' =>$r["stock"],'referencia' =>$r["referencia"],'peso' =>$r["peso"] ,'fecha' =>$r["fecha"]));
	       	}

	          
	   		$conexiondb->close();

	        return   $array;
 
			
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
 
	 }
 ?>