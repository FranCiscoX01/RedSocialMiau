<?php
include('conexion.php');




$deleteP = mysqli_query($conexion, "DELETE FROM public WHERE idPublic = '".$_GET['deletPid']."'");
$deleteL = mysqli_query($conexion, "DELETE FROM likes WHERE idPublic = '".$_GET['deletPid']."'");

if ($deleteL && $deleteP) {
  header('Location: HomeAdmin.php');
}

 ?>
