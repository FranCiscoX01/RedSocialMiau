<?php
session_start();
  include('conexion.php');
  $connt = mysqli_query($conexion, "SELECT * FROM sigin WHERE Username != '".$_SESSION['user']."'");
  while($rowM = mysqli_fetch_assoc($connt)) {
?>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Username</th>
      <th scope="col">Email</th>
      <th scope="col">Chats</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><?php echo $rowM['Username'];?></th>
      <td><?php echo $rowM['Email']; ?></td>
      <td><a class="btn btn-outline-dark text-decoration-none" id="start_chat" data-tousername="<?php echo $rowM['Username'] ?>">Message</a></td>
    </tr>
  </tbody>
</table>
<?php } ?>
