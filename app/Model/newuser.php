<?php 
$error = '';
$edit = 0;
function limpiar($x){$x = trim($x);$x = htmlspecialchars($x);$x = stripslashes($x); return $x;}
require('Config/conexion.php'); 
/*if (isset($_GET['id'])) {//actualizar datos
	$id = $_GET['id']; 
	$id = limpiar($id);
	if (!empty($id))  {
		$show = $cnx->query("SELECT * FROM EMPLEADO WHERE id = $id");
		foreach ($show as $x) {
			$edit = 1;
			$idupdate = $id;
			$lote = $x['lote'];
			
		}
		if (empty($lote)) {
			$error .= "No existe el registro";
		}
	}
	else{
		$error .= "No existe el movimiento";
 	}
}*/
require('nuevo_prod.php');

 ?>