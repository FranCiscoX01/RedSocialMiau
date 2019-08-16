<?php
include('conexion.php');

$consUC = mysqli_query($conexion, "SELECT * FROM public WHERE Username = '".$_GET['user']."'");
$consUP = mysqli_query($conexion, "SELECT * FROM chat WHERE from_user = '".$_GET['user']."' OR to_user = '".$_GET['user']."'");
$consULi = mysqli_query($conexion, "SELECT * FROM ikes WHERE Username = '".$_GET['user']."'");

$deleteUS = mysqli_query($conexion, "DELETE FROM sigin WHERE Email = '".$_GET['ema']."' AND Username = '".$_GET['user']."'");
$deleteULo = mysqli_query($conexion, "DELETE FROM login WHERE Email = '".$_GET['ema']."'");
$deleteUP = mysqli_query($conexion, "DELETE FROM public WHERE Username = '".$_GET['user']."'");
$deleteULi = mysqli_query($conexion, "DELETE FROM likes WHERE Username = '".$_GET['user']."'");
$deleteUC = mysqli_query($conexion, "DELETE FROM chat WHERE from_user = '".$_GET['user']."' OR to_user = '".$_GET['user']."'");

if ($deleteUS && $deleteULo && $deleteUC && $deleteUP && $deleteULi) {
    header('Location: Stadistics.php');
}



?>
