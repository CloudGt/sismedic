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
		brvaeak;

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
	case 5:
		$objProducto = new Producto();
		$json = array();
		$json['msj'] = 'Cliente agregado';
		$json['success'] = true;
		if (isset($_GET['nit'])){
			$elnit = $_GET['nit'];
			if ($elnit=="CF")
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
					$cliente = $datos_cliente->fetchObject();
					$nit = $cliente->NIT;
					$nombre = $cliente->RazonSocial;
					$direccion= $cliente->Direccion;
					if (!empty($nit)) 
						{
							$json['msj'] = 'info_nit.php';
							
						}else
						{
							$json['msj'] = 'nuevo_cliente.php';
						}
					$_SESSION['detalle_cliente'][$elnit] = array('nit'=>$elnit, 'nombre'=>$nombre, 'direccion'=>$direccion);
					$json['success'] = true;
					echo json_encode($json);
				} catch (PDOException $e) {
					$json['msj'] = "Error: ". $e->getMessage();
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


}
?>



