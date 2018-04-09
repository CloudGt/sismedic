<?php 
require('Config/conexion.php');
$send = htmlspecialchars($_SERVER['PHP_SELF']);
$error = 0;
$info = $cnx->query("select p.id as idprod, p.descripcion as producto , cm.nombre as casa_medica, p.preciof as preciopublico, existencia, pr.presentacion,emp.empresa,tm.descripcion as tipo_medic,0 as opcion from producto p inner join tipo_medic tm on p.tipomedicamento= tm.id inner join casa_medica cm on p.idprov= cm.idprov inner join presentacion pr on p.idpresentacion= pr.id_presenta inner join empresas emp on p.empresa= emp.idempresa");
function inventario($info){
	foreach ($info as $xx) {
		$idprod	 = $xx['idprod'];
		$producto	 = $xx['producto'];
		$casa_medica = $xx['casa_medica'];
		$preciopublico = $xx['preciopublico'];
		$existencia = $xx['existencia'];
		$presentacion = $xx['presentacion'];
		$empresa = $xx['empresa'];
		$tipo_medic =  $xx['tipo_medic'];
		$opcion = $xx['opcion'];
		echo "
			<tr>
			<th>$idprod</th>
			<th>$producto</th>
			<th>$casa_medica</th>
			<th>$preciopublico</th>
			<th>$existencia	</th>
			<th>$presentacion</th>
			<th>$empresa</th>
			<th>$tipo_medic	</th>
			<th><button type='button' class='btn btn-primary' data-toggle='modal' data-target='#addproducto'>Editar</button></th>
			</tr>
		";

	}
}

 ?>