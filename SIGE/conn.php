<?php
$mysqli = new mysqli("localhost","res","","residencias");

if (mysqli_connect_errno()) {
	echo 'Conexion fallida:', mysqli_connect_errno();
	exit();
}

?>