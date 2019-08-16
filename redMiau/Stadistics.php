<?php session_start(); ?>
<?php include('conexion.php'); ?>
<?php error_reporting(0); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MiauFace</title>
    <!------------Bootstrap-------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!------------ -------------->
    <!---------------Alertrs------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--------------------------->
  </head>
  <?php $users = mysqli_query($conexion, "SELECT * FROM sigin"); ?>
  <?php $chats = mysqli_query($conexion, "SELECT * FROM chat"); ?>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="HomeAdmin.php">
        <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
        </svg>
        ADMIN
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="HomeAdmin.php">
            <svg id="i-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M12 20 L12 30 4 30 4 12 16 2 28 12 28 30 20 30 20 20 Z" />
            </svg>
            Home
          </a>
          <a class="nav-item nav-link" href="CloseSession.php">
            <svg id="i-signout" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
            </svg>
            Log Out
          </a>
          <a class="nav-item nav-link active" href="Stadistics.php">
            <svg id="i-clipboard" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                <path d="M12 2 L12 6 20 6 20 2 12 2 Z M11 4 L6 4 6 30 26 30 26 4 21 4" />
            </svg>
            Stadistics <span class="sr-only">(current)</span>
          </a>
        </div>
      </div>
    </nav>
    <br>
    <div class="container">
      <h1 class="display-4">Users</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Occupation</th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <?php while($rowU = mysqli_fetch_assoc($users)) { ?>
            <tr>
              <th scope="row"><?php echo $rowU['Name'] ?></th>
              <td><?php echo $rowU['LastName'] ?></td>
              <td><?php echo $rowU['Username'] ?></td>
              <td><?php echo $rowU['Email'] ?></td>
              <td><?php echo $rowU['Occupation'] ?></td>
              <?php echo "<td><a href='DeleteUser.php?ema=".$rowU['Email']."&user=".$rowU['Username']."'><button type='button' class='btn btn-danger'>Delete</button></a></td>"; ?>
            </tr>
          <?php } ?>
        </tbody>
      </table>
      <br><br>
      <h1 class="display-4">Chats</h1>
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">From</th>
            <th scope="col">To</th>
            <th scope="col">message</th>
          </tr>
        </thead>
        <tbody>
          <?php while($rowC = mysqli_fetch_assoc($chats)) { ?>
            <tr>
              <th><?php echo $rowC['from_user'] ?></th>
              <td><?php echo $rowC['to_user'] ?></td>
              <td><?php echo $rowC['message'] ?></td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
