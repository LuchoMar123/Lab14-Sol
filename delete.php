<body background="fondo.jpg">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<?php
    include "conexion.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql  = "DELETE FROM `alumno` WHERE `id`= '$user_id'";

        $resultados = $conexion->query($sql);
        if ($resultados == TRUE) {

            echo "<h4>SE HA ELIMINADO CORRECTAMENTE</h4>";
          
    	}else{
			echo "Error:" . $sql . "<br>" . $conexion->error;
		
    }
}
?>
<br><br><br><br><br><br><br><br><br><br><br>    <center><a class="btn btn-info" href="index.php"><b>REGRESAR AL LISTADO</b></a></center><br><br>
</body>