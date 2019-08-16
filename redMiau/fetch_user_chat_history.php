<?php
session_start();
include('conexion.php');

echo fetch_user_chat_history($_SESSION['user'], $_POST['to_user_name'], $conexion);

?>
