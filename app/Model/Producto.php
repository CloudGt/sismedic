<?php
class Producto
{
	function get(){
		$sql = "SELECT * FROM producto";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getById($id){
		$sql = "SELECT * FROM producto WHERE id=$id";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function guardarVenta(){
		$sql = "INSERT INTO venta (fecha) values (NOW())";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getUltimaVenta()
	{
		$sql = "SELECT LPAD(LAST_INSERT_ID(), 6, '0') as ultimo";
		//$sql = "SELECT Orden+1  as ultimo from T_correlativos where periodo= 0";

		global $cnx;
		return $cnx->query($sql);
	}
	
	function guardarDetalleVenta($idventa,$idproducto,$cantidad,$precio,$subtotal){
		$sql = "INSERT INTO venta_detalle (idventa,idproducto,cantidad,precio,subtotal) values ($idventa,$idproducto,$cantidad,'$precio','$subtotal')";
		global $cnx;
		return $cnx->query($sql);
	}
	
	function getDetalleVenta($idventa){
		$sql = "SELECT p.descripcion as producto, vd.cantidad as cantidad, vd.precio as precio, vd.estado as estado, vd.chk as chk FROM venta_detalle vd
		INNER JOIN producto p 
		ON vd.idproducto = p.id
		WHERE idventa = $idventa";
		global $cnx;
		return $cnx->query($sql);
	}

	function ObtenerNit($xnit)
	{
		$sql = "SELECT * FROM cliente WHERE NIT = '$xnit'";
		global $cnx;
		return $cnx->query($sql);
	}
	function ObtenerDocumentos($tipodoc)
	{
		$sql = "SELECT DISTINCT v.*,LPAD(id, 6, '0') as xdoc, c.RazonSocial AS cliente, TIMESTAMPDIFF(MINUTE, v.FECHAOP, CURRENT_TIMESTAMP()) as hace FROM venta v inner join cliente c on v.nit_dpi= c.Nit2 WHERE estado = '$tipodoc' order by v.id desc";

		global $cnx;
		return $cnx->query($sql);
	}
	function ObtenerEXISTENCIAS()
	{
		$sql = "--";

		global $cnx;
		return $cnx->query($sql);
	}

	function guardarproducto($descripcion, $precio, $idprov, $idpresentacion, $tipomedicamento, $afecto,$precioa,$preciob,$precioc,$preciod,$precioe,$preciof,$idempresa)
	{	$sql = "INSERT INTO `producto` (`id`, `descripcion`, `precio`, `precioa`, `preciob`, `precioc`, `preciod`, `precioe`, `preciof`, `idprov`, `idpresentacion`, `tipomedicamento`, `afecto`, `empresa`) VALUES (NULL, '$descripcion', '$precio', '$precioa', '$preciob', '$precioc', '$preciod', '$precioe', '$preciof', '$idprov', '$idpresentacion', '$tipomedicamento', '$afecto', '$idempresa')";
		global $cnx;
		return $cnx->query($sql);
	}

	function marcar_detalle_d($iddetalle,$valor)
	{
		$sql = "UPDATE venta_detalle SET chk_despacho= $valor where id= $iddetalle" ;
		global $cnx;
		return $cnx->query($sql);
	}


	function marcar_detalle_r($iddetalle,$valor)
	{
		$sql = "UPDATE venta_detalle SET chk_revision= $valor where id= $iddetalle" ;
		global $cnx;
		return $cnx->query($sql);
	}

	function actualiza_estado($iddoc,$estado)
	{
		$sql = "UPDATE venta SET estado= '$estado' where ID= $iddoc";
		global $cnx;
		return $cnx->query($sql);
	}

	
	function addproducto($lote, $fechavence, $fechaingreso, $documento, $idproducto, $cantidad, $usuario, $serie_fac, $id_proveedor, $id_bodega, $preciounitario)
	{
		$sql = "INSERT INTO `lotes_kardex` (`id`, `lote`, `fechavence`, `fechaingreso`, `documento`, `idproducto`, `cantidad`, `usuario`, `serie_fac`, `idproveedor`, `id_bodega`, `preciounitario`) VALUES (NULL, '$lote', '$fechavence', '$fechaingreso', '$documento', '$idproducto', '$cantidad', '$usuario', '$serie_fac', '$id_proveedor', '$id_bodega', '$preciounitario')";
		global $cnx;
		return $cnx->query($sql);
	}
	function addproductoupdate($lote, $fechavence, $fechaingreso, $documento, $idproducto, $cantidad, $usuario, $serie_fac, $id_proveedor, $id_bodega, $preciounitario, $idupdate)
	{
		$sql = "UPDATE `lotes_kardex` SET `lote` = '$lote', `fechavence` = '$fechavence', `fechaingreso` = '$fechaingreso', `documento` = '$documento', `idproducto` = '$idproducto', `cantidad` = '$cantidad', `usuario` = '$usuario', `serie_fac` = '$serie_fac', `idproveedor` = '$id_proveedor', `id_bodega` = '$id_bodega', `preciounitario` = '$preciounitario' WHERE `lotes_kardex`.`id` = '$idupdate'";
		global $cnx;
		return $cnx->query($sql);
	}
	function adduser($usuario,$password,$nombre,$pic)
	{
		$password = sha1($password); //encriptar la password
		$usuario = trim($usuario);
		if (!empty($_FILES['xpic']['tmp_name'])) 
					{
						$name = $usuario;
						$type = $_FILES['xpic']['type'];
						$xpic = 'assets/img/profile/';
						opendir($xpic);
						$g_imagenes = $xpic.$name;
						if ($type == 'image/jpeg' or $type == 'image/png' or $type == 'image/jpg')//si el tipo es correcto
						{
						copy($_FILES['xpic']['tmp_name'], $g_imagenes);//esto es de la imagen lo pongo aqui sino guarda la imagen aunque no se guarde el post
						}else{
							$error = 1;
						}
					}
		$sql = "INSERT INTO `empleado` (`IDUSUARIO`, `usuario`, `password`, `nombre`, `activo`, `id_puesto`) VALUES (NULL, '$usuario', '$password', '$nombre', '0', '0');";
		echo $sql;
		global $cnx;
		return $cnx->query($sql);
	}
	function updateuser($usuario, $password, $nombre, $pic, $id){
		global $cnx;
		$usuario = trim($usuario);
		if (!empty($password)) {
			$password = sha1($password);
			$sql = "UPDATE `empleado` SET `USUARIO` = '$usuario', `PASSWORD` = '$password', `NOMBRE` = '$nombre' WHERE `empleado`.`IDUSUARIO` = $id";
		}else{
		$sql = "UPDATE `empleado` SET `USUARIO` = '$usuario', `NOMBRE` = '$nombre' WHERE `empleado`.`IDUSUARIO` = $id";
		}
		echo $sql;
		return $cnx->query($sql);
	}
	
}

