<?php 

$server = "localhost";
$user = "u161321994_123";
$password = "12141618";
$db = "u161321994_123";
$user = "root";
$password = "";
$db = "sismedicgt";

$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn) {
	die('Error de Conexión: ' . mysqli_connect_errno());
}
 ?>