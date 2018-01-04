<?php 

$server = "localhost";
$user = "root";
$password = "";
$db = "sismedicgt";

$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn) {
	die('Error de Conexión: ' . mysqli_connect_errno());
}
 ?>