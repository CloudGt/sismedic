<?php 
$send = htmlspecialchars($_SERVER['PHP_SELF']);
	if (isset($_POST['new'])) 
	{
		require('Config/conexion.php');
		function limpiar($x){$x = trim($x);$x = htmlspecialchars($x);$x = stripcslashes($x);}
		$nombre = $_POST['nombre']; $nombre = limpiar($nombre);
		$direccion = $_POST['direccion']; $direccion = limpiar($direccion);
		$telefono = $_POST['telefono']; $telefono = limpiar($telefono);
		$credito = $_POST['credito']; $credito = limpiar($credito);
		$dias_credito = $_POST['dias_credito']; $dias_credito = limpiar($dias_credito);
		$nit = $_POST['nit']; $nit = limpiar($nit);
		$pais = $_POST['pais']; $pais = limpiar($pais);
		$nota = $_POST['nota']; $nota = limpiar($nota);

	}else{
		//error
	}


 ?>