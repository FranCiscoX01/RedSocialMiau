<?php
session_start();
include('conexion.php');


if ($_GET['idA'] == "" && $_GET['id'] != "") {
  $lk1 = mysqli_query($conexion, "INSERT INTO likes (idPublic, Username) VALUES ('".$_GET['id']."', '".$_SESSION['user']."');") or die(mysqli_error());
  $lk2 = mysqli_query($conexion, "UPDATE public SET likes = likes + 1 WHERE idPublic = '".$_GET['id']."'") or die(mysqli_error());

  if ($lk1 && $lk2) {
    header('Location: Home.php');
  }
} elseif ($_GET['idA'] != "" && $_GET['id'] == "") {
  $lk1 = mysqli_query($conexion, "INSERT INTO likes (idPublic, Username) VALUES ('".$_GET['idA']."', 'ADMIN');") or die(mysqli_error());
  $lk2 = mysqli_query($conexion, "UPDATE public SET likes = likes + 1 WHERE idPublic = '".$_GET['idA']."'") or die(mysqli_error());

  if ($lk1 && $lk2) {
    header('Location: HomeAdmin.php');
  }
}
?>
