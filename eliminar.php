
<?php

include 'conexion.php';


if (isset($_POST['eliminar'])) {
    $id = $_POST['id'];


    $sql = "DELETE FROM universidades WHERE id = $id";
    mysqli_query($con, $sql);


    header('Location: index.php');
    exit;
}
