<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body background="fondo.jpg">
    <br><div class="container">
        <center><h1>LISTADO DE ALUMNOS</h1><br></center>
        <?php
        include ("conexion.php");
        $sql = "SELECT * FROM alumno";
        $resultado = $conexion-> query($sql);
        ?>
        <center><a class="btn btn-info" href="create.php"><b>REGISTRAR ALUMNO</b></a></center><br><br>
    <table class="table table-dark table-striped" border="5">
            <thead>
                <tr>
                    <th>CÓDIGO</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TELÉFONO</th>
                    <th>DIRECCIÓN</th>
                    <th>SEXO</th>
                    <th>IMAGEN</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if ($resultado -> num_rows > 0){
                    while ( $filas = $resultado -> fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['nombre'] ?></td>
                    <td><?php echo $filas['apellido'] ?></td>
                    <td><?php echo $filas['telefono'] ?></td>
                    <td><?php echo $filas['direccion'] ?></td>
                    <td><?php echo $filas['sexo'] ?></td>
                    <td><img height="50px" src="data:image/jpg;base64,<?php echo base64_encode($filas['imagen']);?>"/></td>
                    <td><a class="btn btn-info" href="update.php?id=<?php echo $filas['id']; ?>">Editar</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $filas['id']; ?>">Eliminar</a></td>
                </tr>
                <?php                         
                    }
                } 
                ?>
            </tbody>
        </table>
</body>
</html>