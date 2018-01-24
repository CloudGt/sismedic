<?php
$manejador="mysql";
$servidor="localhost";
$usuario="root";
$pass="";
$base="sismedicgt";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass);
?>