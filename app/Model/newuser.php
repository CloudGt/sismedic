<?php 
$error = '';
$edit = 0;
function limpiar($x){$x = trim($x);$x = htmlspecialchars($x);$x = stripslashes($x); return $x;}
require('Config/conexion.php'); 
/*Traer usuarios*/
$info = $cnx->query("SELECT * FROM empleado");
function tabla($x){
foreach ($x as $xx) {
	$nombre = $xx['NOMBRE'];
	$usuario = $xx['USUARIO'];
	$estado = $xx['ACTIVO']; //1 si 0 no
	if ($estado == 1) {
			$estado = "<div class='activo'></div>";
		}else{
			$estado = "<div class='noactivo'></div>";
		}
	echo "<tr>
	<th>$nombre</th>
	<th>$usuario</th>
	<th>$estado</th>
	</tr>";
}
}
/*Fin traer usuarios*/
/*Actualizar datos*/
if (isset($_GET['id'])) {//actualizar datos
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
}
 ?>