<?php 
$dato = 0; //no se ha creado nada
require('Config/conexion.php');
//nit
if (isset($_GET['idnit'])) {
	$nit = $_GET['idnit'];
	if (!empty($nit)) {
		$muestra = $cnx->query("SELECT * FROM cliente WHERE NIT = $nit");
		foreach ($muestra as $mm) {
			$nombre = $mm['Nombres'];
			$apellido = $mm['Apellidos'];
			$direccion = $mm['Direccion'];
			$nombre = $nombre." ".$apellido;
		}
		if (empty($nombre)) {
			//no existe el nombre, no hay asociado un nit al nombre
			$dato = 1;
		}else{
			$dato = 2; //si existen
		}

	}
}
if (isset($_GET['nonit'])) {
	$nonit = $_GET['nonit'];
}
//nuevo_prod.php
$present = $cnx->query("SELECT * FROM presentacion WHERE activo = 'S'");
$provv = $cnx->query("SELECT * FROM proveedores WHERE activo = 1");
$tipo_medic = $cnx->query("SELECT * FROM tipo_medic");
function presentacion($x){foreach ($x as $pre) {$id_p = $pre['Id_presenta'];$presentacion_p = $pre['Presentacion'];echo "<option value='$id_p'>$presentacion_p</option>";}}
function proveedores($x){foreach ($x as $prov) {$idprov = $prov['idprov'];$proveedor = $prov['nombre'];echo "<option value='$idprov'>$proveedor</option>";}}
function tipomedicamento($x){foreach ($x as $tipe) {$tipo_medic = $tipe['tipo_medic'];$descripcion = $tipe['descripcion'];echo "<option value='$tipo_medic'>$descripcion</option>";}}





 ?>
