<?php
session_start();
if(isset($_GET["page"])){
	$page=$_GET["page"];
	//$enit=$_GET["nit"];
}else{
	$page=0;
}
require_once '../Config/conexion.php';
require_once '../Model/Producto.php';
switch($page){
	case 1:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Producto Agregado';
		$json['success'] = true;
	
		if (isset($_POST['producto_id']) && $_POST['producto_id']!='' && isset($_POST['cantidad']) && $_POST['cantidad']!='') {
			try {
				$cantidad = $_POST['cantidad'];
				$producto_id = $_POST['producto_id'];
				
				$resultado_producto = $objProducto->getById($producto_id);
				$producto = $resultado_producto->fetchObject();
				$descripcion = $producto->descripcion;
				$precio = $producto->precio;
				
				$subtotal = $cantidad * $precio;
				
				$_SESSION['detalle'][$producto_id] = array('id'=>$producto_id, 'producto'=>$descripcion, 'cantidad'=>$cantidad, 'precio'=>$precio, 'subtotal'=>$subtotal);
				$json['success'] = true;
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'Ingrese un producto y/o ingrese cantidad';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
	case 2:
		$json = array();
		$json['msj'] = 'Producto Eliminado';
		$json['success'] = true;
	
		if (isset($_POST['id'])) {
			try {
				unset($_SESSION['detalle'][$_POST['id']]);
				$json['success'] = true;
	
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}
		break;
		
	case 3:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		$json['idventa'] = '';
	
		if (count($_SESSION['detalle'])>0) {
			try {
				$objProducto->guardarVenta();
				$registro_ultima_venta = $objProducto->getUltimaVenta();
				$result_ultima_venta = $registro_ultima_venta->fetchObject();
				$idventa = $result_ultima_venta->ultimo;
				$g_corr= $result_ultima_venta->ultimo;
				foreach($_SESSION['detalle'] as $detalle):
					$idproducto = $detalle['id'];
					$cantidad = $detalle['cantidad'];
					$precio = $detalle['precio'];
					$subtotal = $detalle['subtotal'];
					$objProducto->guardarDetalleVenta($idventa, $idproducto, $cantidad, $precio, $subtotal);
				endforeach;
				
				$_SESSION['detalle'] = array();
						
				$json['success'] = true;
				$json['idventa'] = $idventa;
				$json['msj'] = 'Guardado correctamente: '. $idventa;
				echo json_encode($json);
	
			} catch (PDOException $e) {
				$json['msj'] = $e->getMessage();
				$json['success'] = false;
				echo json_encode($json);
			}
		}else{
			$json['msj'] = 'No hay productos agregados';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
	case 4:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Documentos cargados';
		$json['success'] = true;
		if (isset($_GET['tipodoc'])){
			$elnit = $_GET['nit'];
			if ($elnit=="CF" or $elnit =="cf")
				{
					$json['msj'] = 'cf.php';
					$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>'Consumidor Final', 'direccion'=>'Ciudad');
					$json['success'] = true;
					echo json_encode($json);
				}
				else
				{
				try {
					$datos_cliente = $objProducto->ObtenerNit($elnit);
					//echo $datos_cliente;
					$cuenta = $datos_cliente->rowCount();
					$cliente = $datos_cliente->fetchObject();
					if ($cuenta>0){
						
						$nit = $cliente->NIT;
						$nombre = $cliente->RazonSocial;
						$direccion= $cliente->Direccion;
						if (!empty($nit)) 
							{
								$envial = 1;
								$json['msj'] = "info_nit.php?idnit=$elnit&redireccion=info_nit.php"; //idnit lo envio por GET Para avisar al nit.php de que nit estoy hablando
							}
							if (empty($nit)) {
								$json['msj'] = "nuevo_cliente.php";
							}
						$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>$nombre, 'direccion'=>$direccion);
						$json['success'] = true;
						echo json_encode($json);
					}
					else{
						$json['msj'] = "nuevo_cliente.php";
						$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>'', 'direccion'=>'');
						$json['success'] = true;
						echo json_encode($json);
					}
				} catch (PDOException $e) {
					$json['msj'] = "Error: - ". $e->getMessage();
					$json['success'] = false;
					echo json_encode($json);
				}
			}
		}else{
			$json['msj'] = 'Nit no valido';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
	case 5:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Cliente agregado';
		$json['success'] = true;
		if (isset($_GET['nit'])){
			$elnit = $_GET['nit'];
			if ($elnit=="CF" or $elnit =="cf")
				{
					$json['msj'] = 'cf.php';
					$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>'Consumidor Final', 'direccion'=>'Ciudad');
					$json['success'] = true;
					echo json_encode($json);
				}
				else
				{
				try {
					$datos_cliente = $objProducto->ObtenerNit($elnit);
					//echo $datos_cliente;
					$cuenta = $datos_cliente->rowCount();
					$cliente = $datos_cliente->fetchObject();
					if ($cuenta>0){
						
						$nit = $cliente->NIT;
						$nombre = $cliente->RazonSocial;
						$direccion= $cliente->Direccion;
						if (!empty($nit)) 
							{
								$envial = 1;
								$json['msj'] = "info_nit.php?idnit=$elnit&redireccion=info_nit.php"; //idnit lo envio por GET Para avisar al nit.php de que nit estoy hablando
							}
							if (empty($nit)) {
								$json['msj'] = "nuevo_cliente.php";
							}
						$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>$nombre, 'direccion'=>$direccion);
						$json['success'] = true;
						echo json_encode($json);
					}
					else{
						$json['msj'] = "nuevo_cliente.php?nonit=$elnit";
						$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>'', 'direccion'=>'');
						$json['success'] = true;
						echo json_encode($json);
					}
				} catch (PDOException $e) {
					$json['msj'] = "Error: - ". $e->getMessage();
					$json['success'] = false;
					echo json_encode($json);
				}
			}
		}else{
			$json['msj'] = 'Nit no valido';
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 6:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		try {
			$descripcion= $_GET['descripcion'];
			$idprov= $_GET['idprov'];
			$idpresentacion= $_GET['idpresentacion'];
			$tipomedicamento= $_GET['tipomedicamento'];
			$afecto = $_GET['afecto'];
			$precio =$_GET['precio'];
			$precioa =$_GET['precioa'];
			$preciob =$_GET['preciob'];
			$precioc =$_GET['precioc'];
			$preciod =$_GET['preciod'];
			$precioe =$_GET['precioe'];
			$preciof =$_GET['preciof'];
			$idempresa= $_GET['idempresa'];
			$objProducto->guardarproducto($descripcion, $precio, $idprov, $idpresentacion, $tipomedicamento, $afecto,$precioa,$preciob,$precioc,$preciod,$precioe,$preciof,$idempresa);
			$json['success'] = true;
			$json['msj'] = 'Guardado correctamente';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;

	case 7:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		try {
			$iddetalle =$_GET['iddetalle'];
			$estado =$_GET['estado'];
			$valor= $_GET['valor'];
			if ($estado=="DSP"){ 
				$objProducto->marcar_detalle_d($iddetalle,$valor);
			}
			if ($estado=="REV"){ 
				$objProducto->marcar_detalle_r($iddetalle,$valor);
			}


			
			$json['success'] = true;
			$json['msj'] = 'Guardado correctamente: ';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;	
	case 8:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		try {
			$lote =$_GET['lote'];
			$fechavence =$_GET['fechavence'];
			$fechaingreso = $_GET['fechaingreso'];
			$documento =$_GET['documento'];
			$idproducto= $_GET['idproducto'];
			$cantidad= $_GET['cantidad'];
			$usuario =$_GET['usuario'];
			$serie_fac =$_GET['serie_fac'];
			$id_proveedor= $_GET['id_proveedor'];
			$id_bodega =$_GET['id_bodega'];
			$preciounitario =$_GET['preciounitario'];
			$objProducto->addproducto($lote, $fechavence, $fechaingreso, $documento, $idproducto, $cantidad, $usuario, $serie_fac, $id_proveedor, $id_bodega, $preciounitario);
			$json['success'] = true;
			$json['msj'] = 'Guardado correctamente: ';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
	case 9:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		try {
			$idupdate = $_GET['idupdate'];
			$lote =$_GET['lote'];
			$fechavence =$_GET['fechavence'];
			$fechaingreso = $_GET['fechaingreso'];
			$documento =$_GET['documento'];
			$idproducto= $_GET['idproducto'];
			$cantidad= $_GET['cantidad'];
			$usuario =$_GET['usuario'];
			$serie_fac =$_GET['serie_fac'];
			$id_proveedor= $_GET['id_proveedor'];
			$id_bodega =$_GET['id_bodega'];
			$preciounitario =$_GET['preciounitario'];
			$objProducto->addproductoupdate($lote, $fechavence, $fechaingreso, $documento, $idproducto, $cantidad, $usuario, $serie_fac, $id_proveedor, $id_bodega, $preciounitario, $idupdate);
			$json['success'] = true;
			$json['msj'] = 'Actualizado correctamente: ';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
		
	case 10:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Documento Enviado correctamente';
		$json['success'] = true;
		try {
			$iddoc = $_GET['iddoc'];
			$estado =$_GET['estado'];
			
			if ($estado=="DSP"){ 
				$objProducto->actualiza_estado($iddoc, 'REV');
				
			}
			if ($estado=="REV"){ 
				$objProducto->actualiza_estado($iddoc, 'IMP');
			}
			if ($estado=="IMP"){ 
				$objProducto->actualiza_estado($iddoc, 'FAC');
			}

			$json['success'] = true;
			$json['msj'] = 'Documento Enviado correctamente: ';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
	case 11:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Guardado correctamente';
		$json['success'] = true;
		try {
			$nombre =$_GET['nombre'];
			$usuario =$_GET['usuario'];
			$password = $_GET['password'];
			$pic = $_GET['pic'];
			$objProducto->adduser($usuario, $password,$nombre, $pic);
			$json['success'] = true;
			$json['msj'] = 'Guardado correctamente: ';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
		case 12:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Actualizado correctamente';
		$json['success'] = true;
		try {
			$nombre =$_GET['nombre'];
			$usuario =$_GET['usuario'];
			$password = $_GET['password'];
			$pic = $_GET['pic'];
			$id = $_GET['id'];
			$objProducto->updateuser($usuario, $password,$nombre, $pic, $id);
			$json['success'] = true;
			$json['msj'] = 'Actualizado correctamente: ';
			echo json_encode($json);
		} catch (PDOException $e) {
			$json['msj'] = $e->getMessage();
			$json['success'] = false;
			echo json_encode($json);
		}
		break;
			
}
?>
