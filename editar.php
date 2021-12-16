<center>
<?php

	include 'cabecera.php';

	include 'conexion.php';


	if ($_POST) {
		$id  = $_POST['id'];
		$nom = $_POST['nom'];
		$dep = $_POST['dep'];

		$sql = "UPDATE ciudades 
				SET nombre = '$nom',
				departamento = '$dep'
				WHERE id = $id";

		$res = mysqli_query($conexion, $sql);				

		header('location: ver_ciudades.php?editado=true');

	}

	$id = $_GET['id'];
	$sql = "SELECT * FROM ciudades WHERE id = $id";
	$res = mysqli_query($conexion, $sql);

	$ciudad = mysqli_fetch_assoc($res);

?>

<form style="width: 300px;" method="POST">
	<input name="id" value="<?php echo $ciudad['id']; ?>" class="form-control" readonly> <br><br>
	<input name="nom" value="<?php echo $ciudad['nombre']; ?>" placeholder="Nombre" class="form-control"> <br><br>
	<input name="dep" value="<?php echo $ciudad['departamento']; ?>" placeholder="Departamento" class="form-control"> <br><br>
	<input type="submit" class="btn btn-success">
	<input type="reset" class="btn btn-info">
	<a href="ver_ciudades.php" class="btn btn-warning">Cancelar</a>
</form>

</center>