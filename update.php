<body background="fondo.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php

include "conexion.php";

    	if (isset($_POST['update'])) {
		$nombre = $_POST['nombre'];
		$user_id = $_POST['user_id'];
		$apellido = $_POST['apellido'];
		$telefono = $_POST['telefono'];
		$direccion = $_POST['direccion'];
		$sexo = $_POST['sexo'];

		$sql = "UPDATE `personal` SET `nombre`='$nombre',`apellido`='$apellido',`telefono`='$telefono',`direccion`='$direccion',`sexo`='$sexo' WHERE `id`='$user_id'";

		$resultados = $conexion->query($sql);

		if ($resultados == TRUE) {
			echo "<h4>SE HA ACTUALIZADO CORRECTAMENTE</h4>";
		}else{
			echo "Error:" . $sql . "<br>" . $conexion->error;
		}
	}
    

  
if (isset($_GET['id'])) {
	$user_id = $_GET['id'];

	$sql = "SELECT * FROM `personal` WHERE `id`='$user_id'";

	$resultados = $conexion->query($sql);

	if ($resultados->num_rows > 0) {
		
		while ($row = $resultados->fetch_assoc()) {
			$nombre = $row['nombre'];
			$apellido = $row['apellido'];
			$telefono = $row['telefono'];
			$direccion  = $row['direccion'];
			$sexo = $row['sexo'];
			$id = $row['id'];
		}

	?>
        <div class="container">
		<br><br><br><br><h2>ACTUALIZAR ALUMNO</h2>
        <form class="row g-3" action="" method="post">
        <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $nombre; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputApellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="apellido" value="<?php echo $apellido; ?>">
        </div>
        <div class="col-md-6">
            <label for="inputApellido" class="form-label">Id:</label>
            <input type="text" class="form-control" name="user_id" value="<?php echo $id; ?>">
        </div>
        <div class="col-6">
            <label for="inputTelefono" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono" value="<?php echo $telefono; ?>">
        </div>
        <div class="col-12">
            <label for="inputDireccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="direccion" value="<?php echo $direccion; ?>">
        </div>
        <div class="col-md-4">
            <label for="inputSexo" class="form-label">Sexo:</label><br>
            <input type="radio" name="sexo" value="hombre" <?php if($sexo == 'hombre'){ echo "checked";} ?> >HOMBRE
		    <input type="radio" name="sexo" value="mujer" <?php if($sexo == 'mujer'){ echo "checked";} ?>>MUJER
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Actualizar" name="update">
            <a class="btn btn-info" href="index.php">Regresar</a>
        </div>
        </form>
        </div>
		</body>
		</html>

	<?php
	} else{
		header('Location: view.php');
	}

}
?>