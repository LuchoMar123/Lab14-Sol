<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD - Crear</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
</head>
<body background="fondo.jpg">
    <?php
    include "conexion.php";

    if (isset($_POST['submit'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $sexo = $_POST['sexo'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

        $sql = "INSERT INTO `alumno` (`nombre`, `apellido`, `telefono`, `direccion`, `sexo`, `imagen`) values ('$nombre','$apellido','$telefono','$direccion','$sexo','$imagen')";
        
        $resultado = $conexion -> query($sql);
        if ($resultado == TRUE){
            echo "<h4>SE HA REGISTRADO CORRECTAMENTE</h4>";
        } 
        else{
            echo "Ha ocurrido un problema al registrar al alumno" . $sql . "<br>" . $conexion->error;
        }

        $conexion -> close();
    }


    ?>
    <div class="container">
		<br><br><br><br><h2>INGRESAR ALUMNO</h2><br>
        <form class="row g-3" action="" method="post" enctype="multipart/form-data">
        <div class="col-md-6">
            <label for="inputNombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre">
        </div>
        <div class="col-md-6">
            <label for="inputApellido" class="form-label">Apellido:</label>
            <input type="text" class="form-control" name="apellido">
        </div>
        <div class="col-6">
            <label for="inputTelefono" class="form-label">Teléfono:</label>
            <input type="text" class="form-control" name="telefono">
        </div>
        <div class="col-6">
            <label for="inputDireccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" name="direccion">
        </div>
        <div class="col-md-4">
            <label for="inputSexo" class="form-label">Sexo:</label><br>
            <input type="radio" name="sexo" value="hombre">HOMBRE
		    <input type="radio" name="sexo" value="mujer">MUJER
        </div>
        <div class="col-md-4">
            <label for="inputImagen" class="form-label">Imagen:</label>
            <input type="file" class="form-control" name="imagen">
        </div>
        <div class="col-12">
            <input type="submit" class="btn btn-primary" value="Registrar" name="submit">
            <a class="btn btn-info" href="index.php">Regresar</a>
        </div>
        </form>
        </div>
</body>
</html>