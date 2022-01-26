<?php 
	include '../modelo/modeloProducto.php'; 
	empty($_POST["case"])?$case=NULL:$case=$_POST["case"];
	if ($case==NULL) {
		empty($_GET["case"])?$case=NULL:$case=$_GET["case"];
	}
	$retorno = array();
	switch ($case) {
			case 'lista_productos':
 
			$lista = Modelproducto::lista();
	 
			 
			break;
			case 'registrar_producto':
				$nombre =  ($_POST["nombre"]);
				$referencia =  ($_POST["referencia"]);
				$precio =  ($_POST["precio"]);
				$peso =  ($_POST["peso"]);
				$categoria =  ($_POST["categoria"]);
		 		$stock =  ($_POST["stock"]);
		 
 				if (empty($nombre) || empty($referencia)  || empty($precio)  || empty($categoria)  || empty($stock)  || empty($peso)) {
 			 			$mensaje = array('texto' =>cafeteria23 ,"titulo"=>cafeteria21,'tipo'=>'error' );
 				}else{
 					$mensaje = array('texto' =>cafeteria22 ,"titulo"=>cafeteria21,'tipo'=>'error' );
					if(Modelproducto::registrar($nombre,$referencia,$stock,$precio ,$peso,$categoria))
					{
						$mensaje = array('texto' =>cafeteria20 ,"titulo"=>cafeteria19,'tipo'=>'success' );
					}
 				}


				
				 
				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			break;
			case 'eliminar':
				 $id =Encryptar::decrypt_( ($_POST["id"]));
				 $mensaje = array('texto' =>cafeteria27 ,"titulo"=>cafeteria21,'tipo'=>'error' );
				if(Modelproducto::eliminar($id))
				{
					$mensaje = array('texto' =>cafeteria28 ,"titulo"=>cafeteria19,'tipo'=>'success' );
				}
				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
			break;
			case 'modificar_producto':
				$id =Encryptar::decrypt_( ($_POST["id"]));
				$nombre =  ($_POST["nombre"]);
				$referencia =  ($_POST["referencia"]);
				$precio =  ($_POST["precio"]);
				$peso =  ($_POST["peso"]);
				$categoria =  ($_POST["categoria"]);
		 		$stock =  ($_POST["stock"]);
		 
 				if (empty($nombre) || empty($referencia)  || empty($precio)  || empty($categoria)  || empty($stock)  || empty($peso)) {
 			 			$mensaje = array('texto' =>cafeteria23 ,"titulo"=>cafeteria21,'tipo'=>'error' );
 				}else{
 				 	 $mensaje = array('texto' =>cafeteria26 ,"titulo"=>cafeteria21,'tipo'=>'error' );
					if(Modelproducto::modificar($id,$nombre,$referencia,$stock,$precio ,$peso,$categoria))
					{
						$mensaje = array('texto' =>cafeteria25 ,"titulo"=>cafeteria19,'tipo'=>'success' );
					}
 				}
				
				
				$data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
				break;
				case 'comprar':
					$id =Encryptar::decrypt_( ($_POST["id"]));
					$cantidad =  ($_POST["cantidad"]);
					$stock = consultar_datos_producto($id)["stock"];
					$nuevo_stock = $stock-$cantidad;
					$continuar = true;
					if ($nuevo_stock<0) {
						$mensaje = array('texto' =>cafeteria36 ,"titulo"=>cafeteria21,'tipo'=>'warning' );
						$continuar = false;
					}

					if ($cantidad<1) {
						$mensaje = array('texto' =>cafeteria37 ,"titulo"=>cafeteria21,'tipo'=>'warning' );
						$continuar = false;
					}
 
					if ($continuar) {
						  actualizar_stock($id,$nuevo_stock);
						  guardar_venta($id,$cantidad);
						  $mensaje = array('texto' =>cafeteria38 ,"titulo"=>cafeteria19,'tipo'=>'success' );
					}
					 $data = array('retorno' =>'' , 'mensaje'  =>$mensaje ,'continuar' =>true );
				break;
				case 'listarTiendaProductos':
					 
					$data = array('retorno' =>Modelproducto::cargar_productos_compra() , 'mensaje'  =>array() ,'continuar' =>true );
				break;
 
					
				default:
					 $data = array('retorno' =>array() , 'mensaje'  =>array() ,'continuar' =>false );
				break;
	}

	
 	if ($case!='lista_productos') {
 		$retorno["iniciar"]=$data["continuar"] ;$retorno["mensaje"]=$data["mensaje"];$retorno["adjunto"]=$data["retorno"];

		echo json_encode( $retorno);
 	}else{
 		echo json_encode( $lista);
 	}
	
	 
 ?>