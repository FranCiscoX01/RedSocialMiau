<?php
session_start();

include('conexion.php');

$data = array(
 ':to_user_id'  => $_POST['to_user_name'],
 ':from_user_id'  => $_SESSION['user'],
 ':chat_message'  => $_POST['chat_message']
);

$query = "INSERT INTO chat (from_user, to_user, message) VALUES ('".$_SESSION['user']."', '".$_POST['to_user_name']."', '".$_POST['chat_message']."')";

$statement = $conexion->prepare($query);
$statement->execute();
//if()
//{
 echo fetch_user_chat_history($_SESSION['user'], $_POST['to_user_name'], $conexion);
//}

?>
