<?php

include '../repositorio/conexion.php';
$sql = "SELECT * FROM universidades";
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
    <link rel="stylesheet" href="../estilos/index.css">
    <link rel="stylesheet" href="estilos/header.css">

    <title>Educación</title>


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
            <div class="col-md-9 inicio">
                <div>
                    <h1>Universidades</h1>
                    <div class="btnguardar" style=" display: flex; justify-content: flex-start;">
                        <a href="universidades.php"> <input class="btn btn-primary" type="button" value="Guardar"> </a>
                    </div>

                    <table class="table table-dark" style="margin-top: 10px;">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Ciudad</th>
                                <th scope="col">Salones</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                <tr scope="row">
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['ciudad']; ?></td>
                                    <td><?php echo $fila['salones']; ?></td>
                                    <td>
                                        <div class="metodos" style="display: flex; justify-content: center; ">
                                            <div style="margin-right: 10px;">
                                                <form method="post" action="editar.php">
                                                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                                    <button class="btn btn-primary" type="submit">Editar</button>
                                                </form>

                                            </div>
                                            <div>
                                                <form method="post" action="../repositorio/eliminar.php">
                                                    <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                                    <button class="btn btn-danger" type="submit" name="eliminar">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>

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