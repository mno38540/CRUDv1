<?php

	include 'conexion.php';

	$id = $_GET['id'];

	$sql = "DELETE FROM ciudades WHERE id = $id";

	mysqli_query($conexion, $sql);

	header('location: ver_ciudades.php?mensaje=true');

?>