<?php
$manejador="mysql";
$servidor="localhost";
$usuario="u161321994_123";
$pass="12141618";
$base="u161321994_123";
$cadena="$manejador:host=$servidor;dbname=$base";
$cnx = new PDO($cadena,$usuario,$pass);
?>
