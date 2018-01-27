<?php 
$dato = 0; //no se ha creado nada
if (isset($_GET['idnit'])) {
	$nit = $_GET['idnit'];
	if (!empty($nit)) {
		require('Config/conexion.php');
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

 ?>