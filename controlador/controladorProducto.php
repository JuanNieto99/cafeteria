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
	 		 for ($i=0; $i <count($lista) ; $i++) { 
	 		 	 $opciones = ' 
	          	<div style="text-aling:center">
	          		<a href="#" class="eliminar"  data-control="'.Encryptar::encrypt_($lista[$i]["id"]).'" ><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px;color:red" ></i></a>
		 			<a href="editar-'.Encryptar::encrypt_($lista[$i]["id"]).'"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
	          	</div> 
				 '; 
	          
	          	 $data["data"][] = array_map('utf8_encode',  array('nombre' =>utf8_decode($lista[$i]["nombre"])  ,'precio' =>number_format($lista[$i]["precio"],2,',','.'), 'categoria' => utf8_decode( $lista[$i]["categoria"]) ,'stock' =>$lista[$i]["stock"],'referencia' =>$lista[$i]["referencia"],'peso' =>$lista[$i]["peso"] ,'fecha' =>$lista[$i]["fecha"],'opcion' =>$opciones) );
	 		 }

	 		 if (count($lista)==0) {
	 		 	 $data["data"][] = [];
	 		 }
	 
	           
	        $lista = $data;		 
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

						$lista = Modelproducto::lista();
						$productos ="";
						for ($i=0; $i < count($lista) ; $i++) {
								
							$productos .="
						 	 	<div class='col-lg-3'>
						 	 		<div class='producto item'>
										<div class='contenedor-imagen'>
											<a href='#' class='link'></a>
											<img style='width:200px' src='https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT_pF8GnmChSFfzXblcYqo8-rCIiaZ21m7BUg&usqp=CAU'> 
										</div>				
										<div class='datos'>
											<div class='starrr'></div>
										 
											<h3><a href='#'> ".$lista[$i]["nombre"]."</a></h3>
								 
											<small>  ".cafeteria32.$lista[$i]["peso"]."</small>
									 
										 
										</div
										<div class='precios'>
											<div class='internet'>
											<div class='row'>
												<div class='col-6'>
													<small>".cafeteria33.$lista[$i]["stock"]."</small>
												</div>
												<div class='col-6'>
													<small>".cafeteria35."</small>
													<input type='numer' class='form-control' id='".Encryptar::encrypt_($lista[$i]["id"])."' value='1'>
												</div>
											</div>
											
											<span style='color:red;font-size:25px;font-family:bold'>$ ".$lista[$i]["precio"]."</span>
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
										 
										    transition: all ease-in-out 0.3s;' onclick='comprar(this)'  data-contol='".Encryptar::encrypt_($lista[$i]["id"])."'><i class='fa fa-shopping-cart'></i> </a>
									</div>
									</div>";
						}

 
					 
					$data = array('retorno' =>$productos , 'mensaje'  =>array() ,'continuar' =>true );
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