<?php 
$error = '';
$edit = 0;
function limpiar($x){$x = trim($x);$x = htmlspecialchars($x);$x = stripslashes($x); return $x;}
require('Config/conexion.php');
if (isset($_GET['id'])) {
	$id = $_GET['id']; $id = limpiar($id);
	if (!empty($id) && is_numeric($id)) {
		$show = $cnx->query("SELECT * FROM lotes_kardex WHERE id = $id");
		foreach ($show as $x) {
			$edit = 1;
			$idupdate = $id;
			$lote = $x['lote'];
			$fechavence = $x['fechavence'];
			$fechaingreso = $x['fechaingreso'];
			$documento = $x['documento'];
			$idproducto = $x['idproducto'];
			$nproducto = $cnx->query("SELECT descripcion FROM producto WHERE id = $idproducto");
			foreach ($nproducto as $xxx) {
				$n_producto = $xxx['descripcion'];
			}
			$cantidad = $x['cantidad'];
			$usuario_edit = $x['usuario'];
			$nusuario = $cnx->query("SELECT USUARIO FROM EMPLEADO WHERE NIP = $usuario_edit");
			foreach ($nusuario as $yy) {
				$n_usuario = $yy['USUARIO'];
			}
			$serie_fac = $x['serie_fac'];
			$idproveedor = $x['idproveedor'];
			$n_prov = $cnx->query("SELECT nombre FROM casa_medica WHERE idprov = $id");
			foreach ($n_prov as $xx) {
				$n_proveedor = $xx['nombre'];
			}
			$id_bodega = $x['id_bodega'];
			$nbodega = $cnx->query("SELECT descripcion FROM bodegas WHERE id_bodega = $id_bodega");
			foreach ($nbodega as $y) {
				$n_bodega = $y['descripcion'];
			}
			$preciounitario = $x['preciounitario'];
		}
		if (empty($lote)) {
			$error .= "No existe el registro";
		}
	}else{
		$error .= "Error en el registro";
 	}
}
//nuevo_prod.php
$casa_medica = $cnx->query("SELECT * FROM casa_medica WHERE activo = 1");
$producto = $cnx->query("SELECT * FROM producto");
$usuario = $_SESSION['username'];
$id_usuario = $_SESSION['usern'];
$bodega = $cnx->query("SELECT * FROM bodegas WHERE activo = 'S'");
function casa_medica($x){foreach ($x as $xx) {$idprov = $xx['idprov'];$nombre = $xx['nombre'];echo "<option value='$idprov'>$nombre</option>";}}
function producto($x){foreach ($x as $xx) {$idprod = $xx['id'];$descripcion = $xx['descripcion'];echo "<option calue='$idprod'>$descripcion</option>";}}
function bodega($x){foreach ($x as $xx) {$idbod = $xx['id_bodega'];$descripcion = $xx['descripcion'];echo "<option value='$idbod'>$descripcion</option>";}}



 ?>