<?php 
$dato = 0; //no se ha creado nada
require('Config/conexion.php');
//nuevo_prod.php
$casa_medica = $cnx->query("SELECT * FROM casa_medica WHERE activo = 1");
$producto = $cnx->query("SELECT * FROM producto");
$usuario = $_SESSION['username'];
$bodega = $cnx->query("SELECT * FROM bodegas WHERE activo = 'S'");
function casa_medica($x){foreach ($x as $xx) {$idprov = $xx['idprov'];$nombre = $xx['nombre'];echo "<option value='$idprov'>$nombre</option>";}}
function producto($x){foreach ($x as $xx) {$idprod = $xx['id'];$descripcion = $xx['descripcion'];echo "<option calue='$idprod'>$descripcion</option>";}}
function bodega($x){foreach ($x as $xx) {$idbod = $xx['id_bodega'];$descripcion = $xx['descripcion'];echo "<option value='$idbod'>$descripcion</option>";}}



 ?>