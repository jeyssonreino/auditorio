<?php
include('conexion.php');

$id_v = $_POST['id_v'];
if (isset($id_v)){

    $sql_r="SELECT *
      from tipo_salon
      where id_forma_salon=$id_v";
    $result_r=mysqli_query($con,$sql_r);
  
      while ($ver_r=mysqli_fetch_row($result_r)) {
        echo '<option value='."$ver_r[0]".'>'."$ver_r[1]".'</option>';
      }
  }