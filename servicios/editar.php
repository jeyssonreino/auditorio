<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../estilos/index.css">

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




            <div class="col-md-9 inicio" style="width: 50%; margin-left: 10%; margin-top: 10px;">
            <div>
                <h1>Editar registro de universidad</h1>
            </div>
                <?php
                if (isset($_POST['id'])) {
                    include('../repositorio/conexion.php');
                    $id = $_POST['id'];
                    $validar = "SELECT * FROM `universidades` WHERE `id` = '$id'";
                    $existe = $con->query($validar);
                    $can = $existe->num_rows;
                    if ($can == 1) {
                        while ($lista = $existe->fetch_assoc()) {
                            echo "<div class='col-12' style='margin: 20px 0px 0px 20px;'>";
                            echo "<form action='../repositorio/actualizar.php' method='POST'>";
                            echo "<input id='id' name='id' type='hidden' required='required' class='form-control col-3' value=" . $lista["id"] . "><br>";
                            echo "<input id='nombre' name='nombre' type='text' required='required' class='form-control col-3' value=" . $lista["nombre"] . "><br>";
                            echo "<input id='ciudad' name='ciudad' type='text' required='required' class='form-control col-3' value=" . $lista["ciudad"] . "><br>";
                            echo "<input id='salones' name='salones' type='text' required='required' class='form-control col-3' value=" . $lista["salones"] . "><br>";

                            echo "<input type='submit' value='Actualizar' class='btn btn-primary''>
            </form>";
                            echo "</div>";
                        }
                    } else {
                        echo "<div class='col-12' style='margin: 20px 0px 0px 20px;'>";
                        echo "No registro con ID: " . $id . " No existe";
                        echo "</div>";
                        $con->close();
                    }
                }
                ?>
            </div>





        </div>
    </div>







</body>

</html>