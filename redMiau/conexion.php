<?php

$conexion = mysqli_connect( "localhost", "root", "", "redmiau") or die(mysqli_error($conexion));

function fetch_user_chat_history($from_user, $to_user, $conexion)
{
 $query = "SELECT * FROM chat WHERE (from_user = '".$from_user."' AND to_user = '".$to_user."') OR (from_user = '".$to_user."' AND to_user = '".$from_user."')";

 $statement = mysqli_query($conexion, $query);
 //$result = $statement->fetch_assoc();
 $output = '<ul class="list-unstyled">';
 while($row = mysqli_fetch_assoc($statement))
 {
  $user_name = '';
  if($row['from_user'] == $from_user)
  {
   $user_name = '<b class="text-success">You</b>';
  }
  else
  {
   $user_name = '<b class="text-danger">'.$row['from_user'].'</b>';
  }
  $output .= '
  <li style="border-bottom:1px dotted #ccc">
   <p>'.$user_name.' - '.$row['message'].'
   </p>
  </li>
  ';
 }
 $output .= '</ul>';
 return $output;
}

 ?>
