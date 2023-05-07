<?php

include 'conexion.php';
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
    <link rel="stylesheet" href="estilos/index.css">

    <title>Educación</title>


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
                    <h1>Universidades</h1>
                    <div>
                        <a href="universidades.php"> <input type="button" value="Guardar"> </a>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Ciudad</th>
                                <th>Salones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>
                                <tr>
                                    <td><?php echo $fila['id']; ?></td>
                                    <td><?php echo $fila['nombre']; ?></td>
                                    <td><?php echo $fila['ciudad']; ?></td>
                                    <td><?php echo $fila['salones']; ?></td>
                                    <td>
                                        <div>
                                            <form method="post" action="editar.php">
                                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                                <button type="submit">Editar</button>
                                            </form>
                                            <form method="post" action="eliminar.php">
                                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                                <button type="submit" name="eliminar">Eliminar</button>
                                            </form>
                                            <form method="post" action="salones.php">
                                                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">
                                                <button type="submit" name="registrar">Registrar salones</button>
                                    
                                            </form>

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