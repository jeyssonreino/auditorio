<?php 
include('conexion.php');

$id_universidad = $_POST['id'];

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
    <link rel="stylesheet" href="estilos/colegios.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>

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
            <div class="col-md-9 contenedor">
                <div class="titulo">
                    <h1>Registrar solones</h1>
                </div>
                <form method="POST" action="#">
                    <div class="form-group row item">
                        <label class="col-4 col-form-label" for="id">Id</label>
                        <div class="col-8">
                            <input id="id" name="id" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="numero" class="col-4 col-form-label">Numero</label>
                        <div class="col-8">
                            <input id="numero" name="numero" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="facultad" class="col-4 col-form-label">Facultad</label>
                        <div class="col-8">
                            <input id="facultad" name="facultad" type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="form-group row item">
                        <label for="facultad" class="col-4 col-form-label">Forma del salon</label>
                        <select id="forma" name="forma">
                            <option value="">Selecciona una forma de salon</option>
                            <?php

                            include('conexion.php');
                            $query = "SELECT * FROM forma_salon";
                            $result = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
                            }
                            ?>
                        </select>
                    </div>
                    </select>
                    <div>
                        <label for="facultad" class="col-4 col-form-label">Tipo del salon</label>
                        <select id="tipo" name="tipo">
                            <option value="">Selecciona</option>
                        </select>
                    </div>




                    <script>
                        $(document).ready(function() {
                                    $("#forma").on('change', function() {
                                        var id = $('#forma').val();
                                        // alert(valor_r);
                                        $.ajax({
                                            type: "POST",
                                            url: "informacion.php",
                                            data: {
                                                'id_v': id
                                            },
                                            success: function(r) {
                                                $('#tipo').html(r);
                                            }
                                        });
                                    });
                                });   
                               
                    </script>





                    <div class="form-group row item">
                        <div class="offset-4 col-8">
                            <button name="submit" type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>


<?php

if (isset($_POST['id']) && isset($_POST['numero']) && isset($_POST['facultad'])  && isset($_POST['forma']) && isset($_POST['tipo'])) {

    $id = $_POST['id'];
    $numero = $_POST['numero'];
    $facultad = $_POST['facultad'];
    $forma = $_POST['forma'];
    $tipo = $_POST['tipo'];

    include('conexion.php');
    $validar = "SELECT * FROM `salones` WHERE `id` = '$id'";
    $existe = $con->query($validar);
    $cantidad = $existe->num_rows;
    if ($cantidad == 0) {
        $sql = "INSERT INTO `salones`(`id`, `numero`, `facultad`, `id_forma_salon`,`id_tipo_salon`, `id_universidad`) VALUES ('$id','$numero','$facultad','$forma','$tipo', '$id_universidad')";
        $query = $con->query($sql);
        if ($query) {
            echo "<script>swal('¡Salon registrado exitosamente!')</script>";
        } else {
            echo "<script>swal('¡Error al guardar el salon')</script>";
        }
    } else {
        echo "<script>swal('¡El salon ya se encuentra registrado!')</script>";
    }
    $con->close();
}




?>

</html>