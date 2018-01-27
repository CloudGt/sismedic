<?php 
$send = htmlspecialchars($_SERVER['PHP_SELF']);
$error = 0;
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
		$pais = $_POST['pais']; if ($pais == 1) {$error = 1;}//si dejan sin seleccionar el pais da error 1
		$nota = $_POST['nota']; $nota = limpiar($nota);
		$estado = 1;
		if ($error == 0) {
			$guardar = $cnx->query("INSERT INTO `proveedores` (`idprov`, `nombre`, `direccion`, `telefono`, `credito`, `dias_credito`, `nit`, `pais`, `nota`, `activo`, `fechaop`) VALUES (NULL, '$nombre', '$direccion', '$telefono', '$credito', '$dias_credito', '$nit', '$pais', '$nota', '1'");
			if ($guardar) {
			header("Location: principal.php");
		}else{
			echo "Error al guardar el dato.";
		}
		}if ($error == 1) {
			echo "Error con los datos.";
		}
		

	}else{
		//error
	}


 ?>