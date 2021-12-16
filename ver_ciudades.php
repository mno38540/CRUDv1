<html>
<head>
	<title></title>
</head>
<body>
	<center>
		<?php
			include 'cabecera.php';

			if ($_GET) {
				if (@$_GET['insert'] == true) {
					echo "<div style='width:60%;' class='alert alert-success' role='alert'>
							Registro <b>Creada</b> Exitosamente!
						  </div>";
				}else if(@$_GET['mensaje'] == true) {
					echo "<div style='width:60%;' class='alert alert-danger' role='alert'>
							Registro <b>Eliminado</b> Exitosamente!
						  </div>";
				}else if(@$_GET['editado'] == true) {
					echo "<div style='width:60%;' class='alert alert-info' role='alert'>
							Registro <b>Actualizado</b> Exitosamente!
						  </div>";
				}
			}

			include 'conexion.php';

			$sql = "SELECT * FROM ciudades ORDER BY id";
			$result = mysqli_query($conexion, $sql) or die('Error... '.mysqli_error($conexion));

			$sql2 = "SELECT max(id) as 'ultimo' FROM ciudades";
			$result2 = mysqli_query($conexion, $sql2) or die('Error... '.mysql_error($conexion));

			$id = mysqli_fetch_assoc($result2);



			echo "<table style='width:60%;' class='table table-striped table-bordered'>
					<tr>
						<th>ID</th>
						<th>NOMBRE</th>
						<th>DEPARTAMENTO</th>
						<th>ELIMINAR</th>
					</tr>";
			while( $registro = mysqli_fetch_assoc($result)){
				if ($id['ultimo'] == $registro['id'] AND $_GET ) {
					echo "<tr bgcolor='green'>";
					echo "<td>".$registro['id']."</td>";
					echo "<td>".$registro['nombre']."</td>";
					echo "<td>".$registro['departamento']."</td>";
					echo "<td> 
							<a href='editar.php?id={$registro['id']}' title='Editar' class='btn btn-warning'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a> 
							<a href='eliminar.php?id={$registro['id']}' title='Eliminar' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> 
						</td>";
					echo "</tr>";
				}else{
					echo "<tr>";
					echo "<td>".$registro['id']."</td>";
					echo "<td>".$registro['nombre']."</td>";
					echo "<td>".$registro['departamento']."</td>";
					echo "<td> 
							<a href='editar.php?id={$registro['id']}' title='Editar' class='btn btn-warning'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span></a> 
							<a href='eliminar.php?id={$registro['id']}' title='Eliminar' class='btn btn-danger'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a> 
						</td>";
					echo "</tr>";
				}
			}
			echo "</table>";
		?>
	</center>

	<?php include 'pie.php'; ?>

</body>
</html>