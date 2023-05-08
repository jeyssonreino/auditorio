<?php

include 'conexion.php';
$sql = "SELECT s.id AS id , s.numero AS numero ,s.facultad AS facultad,u.nombre AS universidad, f.nombre AS forma ,t.nombre AS tipo FROM salones s INNER JOIN universidades u ON s.id_universidad = u.id INNER JOIN tipo_salon t ON s.id_tipo_salon = t.id INNER JOIN forma_salon f ON s.id_forma_salon = f.id;";
$resultado = mysqli_query($con, $sql);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="estilos/index.css">

    <title>Auditorio</title>


</head>


<body>
    <div class="container-fluid  ">
        <div class="row ">
            <div class="col-md-3 menu">
                <div class="col-md-12 ">
                    <h1>Menu</h1>
                    <hr>
                </div>
                <div class="col-md-12 opciones">
                    <ul class="nav flex-column ">
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="index.php">Universidades</a>
                        </li>
                        <li class="nav-item opcion">
                            <a class="nav-link aopcion" href="listasalones.php">Salones</a>
                        </li>

                    </ul>
                </div>

            </div>
            <div class="col-md-9 inicio">
                <div>
                    <h1>Listado de salones registrados</h1>
                    <div class="btnguardar" style="display: flex; justify-content: flex-start; margin-top: 10px;">
                        <a href="salones.php"> <input class="btn btn-primary" type="button" value="Guardar"> </a>
                    </div>

                    <table class="table table-dark" style="margin-top: 10px;"> 
                        <thead>
                            <tr>
                                <th  scope="col" >ID</th>
                                <th  scope="col" >Número</th>
                                <th  scope="col" >Universidad</th>
                                <th  scope="col" >Facultad</th>
                                <th  scope="col" >Forma</th>
                                <th  scope="col" >Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                <tr scope="row">
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['numero']; ?></td>
                                    <td><?php echo $fila['universidad']; ?></td>
                                    <td><?php echo $fila['facultad']; ?></td>
                                    <td><?php echo $fila['forma']; ?></td>
                                    <td><?php echo $fila['tipo']; ?></td>
                                    <td>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>