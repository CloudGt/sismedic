<?php 
$dato = 0; //no se ha creado nada
require('Config/conexion.php');
//nuevo_prod.php
$present = $cnx->query("SELECT * FROM presentacion WHERE activo = 'S'");
$provv = $cnx->query("SELECT * FROM casa_medica WHERE activo = 1");
$tipo_medic = $cnx->query("SELECT * FROM tipo_medic");
$empresa = $cnx->query("SELECT * FROM empresas");
function empresa($x){foreach ($x as $xx) {$idempresa = $xx['idempresa'];$empresa = $xx['empresa'];echo "<option value='$idempresa'>$empresa</option>";}}
function presentacion($x){foreach ($x as $pre) {$id_p = $pre['Id_presenta'];$presentacion_p = $pre['Presentacion'];echo "<option value='$id_p'>$presentacion_p</option>";}}
function casa_medica($x){foreach ($x as $prov) {$idprov = $prov['idprov'];$proveedor = $prov['nombre'];echo "<option value='$idprov'>$proveedor</option>";}}
function tipomedicamento($x){foreach ($x as $tipe) {$tipo_medic = $tipe['tipo_medic'];$descripcion = $tipe['descripcion'];echo "<option value='$tipo_medic'>$descripcion</option>";}}
 ?>