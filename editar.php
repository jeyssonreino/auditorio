

<?php
if (isset($_POST['id'])) {
    include('conexion.php');
    $id = $_POST['id'];
    $validar = "SELECT * FROM `universidades` WHERE `id` = '$id'";
    $existe = $con->query($validar);
    $can = $existe->num_rows;
    if ($can == 1) {
        while ($lista = $existe->fetch_assoc()) {
            echo "<div class='col-12' style='margin: 20px 0px 0px 20px;'>";
            echo "<form action='actualizar.php' method='POST'>";
            echo "<input id='id' name='id' type='hidden' required='required' class='form-control col-3' value=" . $lista["id"] . "><br>";
            echo "<input id='nombre' name='nombre' type='text' required='required' class='form-control col-3' value=" . $lista["nombre"] . "><br>";
            echo "<input id='ciudad' name='ciudad' type='text' required='required' class='form-control col-3' value=" . $lista["ciudad"] . "><br>";
            echo "<input id='salones' name='salones' type='text' required='required' class='form-control col-3' value=" . $lista["salones"] . "><br>";

            echo "<input type='submit' value='Actualizar' class='btn btn-warning'>
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