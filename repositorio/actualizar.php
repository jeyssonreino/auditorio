<?php 

$id = $_POST['id'];
$nombre = $_POST['nombre'];
$ciudad = $_POST['ciudad'];
$salones = $_POST['salones'];

include('../repositorio/conexion.php');
$sql = "UPDATE `universidades` SET `id`='$id',`nombre`='$nombre',`ciudad`='$ciudad',`salones`='$salones' WHERE `id` = '$id'";
$con->query($sql);
if($con){
    echo "Actualizado correctamente <br>";
    echo "<a href= '../servicios/index.php'><button>Regresar </button></a>";
}else{
    echo "Error para actualizar";
    echo "<a href= '../servicios/index.php'><button>Regresar </button></a>";
    $con->close();
}

?>