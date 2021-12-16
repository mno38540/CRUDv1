<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<?php include 'cabecera.php'; ?>
		<form style="width: 300px;">
			<input name="nom" placeholder="Nombre" class="form-control"> <br><br>
			<input name="dep" placeholder="Departamento" class="form-control"> <br><br>
			<input type="submit" class="btn btn-success">
		</form>
	</center>
	<?php

		if ($_GET) {

			include 'conexion.php';
			
			$nombre = $_GET['nom'];
			$depto = $_GET['dep'];

			$sql = "INSERT INTO ciudades(nombre, departamento) 
						VALUES('$nombre', '$depto')";
			
			$result = mysqli_query($conexion, $sql) or die('Error... '.mysqli_error($conexion));

			header('location: ver_ciudades.php?insert=true');
		}
	?>

	<?php include 'pie.php'; ?>

</body>
</html>




