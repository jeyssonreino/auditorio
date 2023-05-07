<?php
session_start();

if (!$_SESSION['usuario']) {
    header('Location:login.php');
    die();
}


include('conexion.php');

$validar = "SELECT * FROM `colegios` WHERE 1;";
$existe = $con->query($validar);
$can = $existe->num_rows;

if ($can == 0) {
    echo "No se encontraron registros para mostrar";
    $con->close();
} else {




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
        <link rel="stylesheet" href="estilos/listados.css">


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

                <div class="col-md-9 contenedor">
                    <div class="titulo">
                        <h1>Listado</h1>
                    </div>
                    <form method="POST" action="#">
                        <div class="form-group row item">
                            <label for="colegio" class="col-2    col-form-label">Colegios: </label>
                            <div class="col-3">
                                <select class="form-select" name="colegio">
                                    <?php while ($fila = mysqli_fetch_array($existe)) { ?>

                                        <option value="<?php echo  $fila['idcol']; ?>"><?php echo  $fila['cnom']; ?></option>
                                <?php }
                                } ?>

                                </select>
                            </div>
                            <div class="  col-1 ">
                                <button name="submit" type="submit" class="btn btn-primary">Buscar</button>
                            </div>


                        </div>
                    </form>
                    <?php
                    if (isset($_POST['colegio'])) {
                        $idcol = $_POST['colegio'];

                        $sql = "SELECT * FROM `estudiantes` WHERE `eidcol` = '$idcol';";
                        $query = $con->query($sql);
                        $cantidad = $query->num_rows;
                        $contador = 0;

                        if ($cantidad) {
                    ?>
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        No
                                                    </th>
                                                    <th>
                                                        Id
                                                    </th>
                                                    <th>
                                                        Estudiante
                                                    </th>
                                                    <th>
                                                        Dirección
                                                    </th>
                                                    <th>
                                                        Cel
                                                    </th>
                                                    <th>
                                                        E-mail
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php while ($estudiantes = mysqli_fetch_array($query)) {
                                                    $contador++;
                                                ?>


                                                    <tr class="table-success">
                                                        <td>
                                                            <?php echo "$contador"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "$estudiantes[idest]"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "$estudiantes[enom]" . " " . "$estudiantes[epal]"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "$estudiantes[edir]"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "$estudiantes[ecel]"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "$estudiantes[email]"; ?>
                                                        </td>
                                                    </tr>


                                            <?php }
                                            } ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <form method="POST" action="reporte.php">
                                <div class="form-group row item">
                                    <div class="offset-4 col-8">
                                        <input type="hidden" name="colegio" value="<?php echo $idcol ?>">
                                        <button name="submit" type="submit" class="btn btn-primary">Reporte PDF</button>
                                    </div>
                            </form>
                        <?php
                        $con->close();
                    }
                        ?>
                </div>
            </div>

    </body>



    </html>