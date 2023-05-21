<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilos/index.css">
    <link rel="stylesheet" href="../estilos/colegios.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <title>Auditorio</title>
</head>


<body>

<div class="container-fluid  ">
        <div class="row ">
            <div class="col-md-3 menu" style="background-color:#222f3e; color: white;">
                <div class="col-md-12 ">
                    <h1>Menu</h1>
                    <hr>
                </div>
                <div class="col-md-12 opciones" style="background-color: #222f3e; color: whitesmoke;">
                    <ul class="nav flex-column ">
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion"  style=" color: whitesmoke;"href="index.php">Universidades</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" style=" color: whitesmoke;" href="listasalones.php">Salones</a>
                        </li>

                    </ul>
                </div>

            </div>

                <div class="col-md-9 contenedor" style="margin-top: 60px;">
                    <div class="titulo">
                        <h1>Registrar universidad</h1>
                    </div>
                    <form method="POST" action="#">
                        <div class="form-group row item">
                            <label class="col-4 col-form-label" for="id">Id:</label>
                            <div class="col-8">
                                <input id="id" name="id" type="number" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row item">
                            <label for="nombre" class="col-4 col-form-label">Nombre:</label>
                            <div class="col-8">
                                <input id="nombre" name="nombre" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row item">
                            <label for="ciudad" class="col-4 col-form-label">Ciudad:</label>
                            <div class="col-8">
                                <input id="ciudad" name="ciudad" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row item">
                            <label for="salones" class="col-4 col-form-label">Número de salones:</label>
                            <div class="col-8">
                                <input id="salones" name="salones" type="number" class="form-control" required>
                            </div>
                        </div>

                        <div class="form-group row item">
                            <div class="offset-4 col-8">
                                <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </div>
                    </form>
                </div>

       

        </div>
    </div>

</body>


<?php

if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['ciudad'])  && isset($_POST['salones'])) {

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $ciudad = $_POST['ciudad'];
    $salones = $_POST['salones'];

    include('../repositorio/conexion.php');
    $validar = "SELECT * FROM `universidades` WHERE `id` = '$id'";
    $existe = $con->query($validar);
    $cantidad = $existe->num_rows;
    if ($cantidad == 0) {
        $sql = "INSERT INTO `universidades`(`id`, `nombre`, `ciudad`, `salones`) VALUES ('$id','$nombre','$ciudad','$salones')";
        $query = $con->query($sql);
        if ($query) {
            echo "<script>swal('¡Universidad guardada exitosamente!')</script>";
        } else {
            echo "<script>swal('¡Error al guardar la universidad')</script>";
        }
    } else {
        echo "<script>swal('¡La universidad ya se encuentra registrado!')</script>";
    }
    $con->close();
}


?>

</html>