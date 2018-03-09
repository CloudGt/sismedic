<?php 
require('Config/conexion.php');
$send = htmlspecialchars($_SERVER['PHP_SELF']);
$error = 0;
$info = $cnx->query("SELECT * FROM proveedores");
function tabla($x){
	foreach ($x as $xx) {
		$nombre = $xx['nombre'];
		$direccion = $xx['direccion'];
		$telefono = $xx['telefono'];
		$credito = $xx['credito'];
		$dias_credito = $xx['dias_credito'];
		$nit = $xx['nit'];
		$pais =  $xx['pais'];
		$nota = $xx['nota'];
		$estado = $xx['activo'];
		$p_fecha = $xx['fechaop'];
		$p_fecha = substr($p_fecha, 0, -9); $fecha_dia = substr($p_fecha, -2, 8); $fecha_mes = substr($p_fecha, 5, 2); $fecha_anio = substr($p_fecha, 0, 4);  //configuro la fecha d/m/a
				switch ($fecha_mes) 
				{ //el case es para cambiar de 01 a enero y todos los meses
					case '01':$fecha_mes = 'ene.';break;case '02':$fecha_mes = 'feb.';break;case '03':$fecha_mes = 'mar.';break;case '04':$fecha_mes = 'abr.';break;case '05':$fecha_mes = 'mayo.';break;case '06':$fecha_mes = 'jun.';break;case '07':$fecha_mes = 'jul.';break;case '08':$fecha_mes = 'ago.';break;case '09':$fecha_mes = 'sep.';break;case '10':$fecha_mes = 'oct.';break;case '11':$fecha_mes = 'nov.';break;case '12':$fecha_mes = 'dic.';break;default:break;
				}//configuracion para que la fecha quede bien
				$p_fecha = $fecha_dia.' '.$fecha_mes.' '.$fecha_anio;
		if ($estado == 1) {
			$estado = "<div class='activo'></div>";
		}else{
			$estado = "<div class='noactivo'></div>";
		}
		echo "
			<tr>
			<th>$nombre</th>
			<th>$direccion</th>
			<th>$telefono</th>
			<th>$nit	</th>
			<th>$credito</th>
			<th>$dias_credito</th>
			<th>$pais	</th>
			<th>$nota	</th>
			<th>$estado	</th>
			<th>$p_fecha	</th>
			<th><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#viewproveedor'>Editar</button></th>
			</tr>
		";

	}
}









	if (isset($_POST['new'])) 
	{
		function limpiar($x){$x = trim($x);$x = htmlspecialchars($x);$x = stripcslashes($x);return $x;}
		$nombre = $_POST['nombre']; $nombre = limpiar($nombre);
		$direccion = $_POST['direccion']; $direccion = limpiar($direccion);
		$telefono = $_POST['telefono']; $telefono = limpiar($telefono);
		$credito = $_POST['credito']; $credito = limpiar($credito);
		$dias_credito = $_POST['dias_credito']; $dias_credito = limpiar($dias_credito);
		$nit = $_POST['nit']; $nit = limpiar($nit);
		$pais = $_POST['pais']; if ($pais == 1) {$error = 1;}//si dejan sin seleccionar el pais da error 1
		$nota = $_POST['nota']; $nota = limpiar($nota);
		$estado = 1;
		if ($error == 0) 
		{
			$guardar = $cnx->query("INSERT INTO `proveedores` (`idprov`, `nombre`, `direccion`, `telefono`, `credito`, `dias_credito`, `nit`, `pais`, `nota`, `activo`) VALUES (NULL, '$nombre', '$direccion', '$telefono', '$credito', '$dias_credito', '$nit', '$pais', '$nota', '$estado');");
			if ($guardar == true) 
			{
				//header("Location: principal.php");
				
				echo '
				<script type="text/javascript">
				$("#contenidos").load("manejo_prov.php");
				<script>';
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