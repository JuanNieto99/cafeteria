<?php 
	
	 function validar_existencia_vista($vista)
	 {
	 	$conexion = conexion();
	 	$retorno = false;
	 	if($conexion->query("DESCRIBE `".$vista."`")) {
		$retorno = true;
		}
		$conexion->close();

		return $retorno ;
	 }

	 function consultar_datos_producto($id){
	 	$conexion = conexion();
	 	$sql = "SELECT  `nombre`, `referencia`, `precio`, `peso`, `categoria`, `stock`  FROM `producto` WHERE `estado`='1' and id = $id" ;
	 	$data = $conexion->query($sql);
	 	$consu = $data->fetch_assoc();
	 	$array = array("nombre"=>$consu["nombre"],"referencia"=>$consu["referencia"],"precio"=>$consu["precio"],"peso"=>$consu["peso"],"categoria"=>$consu["categoria"],"stock"=>$consu["stock"] );
		
		$conexion->close();

		return $array ;
	 }

	

	 function actualizar_stock($id,$cantidad_nueva)
	 {
	 	$sql=" UPDATE `producto` SET  `stock`=$cantidad_nueva  WHERE `id`=$id";
	 	$conexion = conexion(); 
	 	$data = $conexion->query($sql); 
		$conexion->close();

		return $data;
 
	 }

	 function guardar_venta($id,$cantidad){
	 	$sql="INSERT INTO `ventas`(  `id_producto`, `cantidad` )  VALUES ('".$id."','".$cantidad."')";
	 	$conexion = conexion(); 
	 	$data = $conexion->query($sql); 
		$conexion->close();

		return $data;
	 }

 ?>