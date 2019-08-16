<?php session_start(); ?>
<?php include('conexion.php'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>MiauFace</title>
    <!------------Bootstrap-------------->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!------------ -------------->
    <!---------------Alertrs------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!--------------------------->
  </head>
  <body>
    <nav class="navbar navbar-light bg-light">
      <a class="navbar-brand" href="index.php">MiauFace</a>
      <form class="form-inline" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <input class="form-control mr-sm-2" type="email" placeholder="Email" aria-label="Search" id="emailL" name="emailL">
        <input class="form-control mr-sm-2" type="password" placeholder="Password" aria-label="Search" id="passwL" name="passwL">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id="login" name="login">Log In</button>
      </form>
    </nav>
    <br>
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="card rounded-circle">
            <div class="card-body rounded-circle">
              <center><img src="miau.jpeg" class="rounded-circle"/></center>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-body">
              <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"> <!------------Form--->
                <center><h1>Register</h1></center>
                <div class="form-group">
                  <label for="inputAddress">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Pedro" required>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Last Name</label>
                  <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Gonzalez" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="example@example.com" required>
                  </div>
                  <div class="form-group col-md-6">
                    <label for="inputPassword4">Password</label>
                    <input type="password" class="form-control" id="passw" name="passw" placeholder="12345" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputAddress">Username</label>
                  <input type="text" class="form-control" id="user" name="user" placeholder="pedroG1" required>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="inputCity">Number Phone</label>
                    <input type="text" maxlength="10" class="form-control" placeholder="5532132132" id="phone" name="phone" required>
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputState">Occupation</label>
                    <select id="occupation" name="occupation" class="form-control">
                      <option selected disabled value="">Choose...</option>
                      <option value="Student">Student</option>
                      <option value="Employee">Employee</option>
                      <option value="Other">Other</option>
                    </select>
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputZip" hidden>Zip</label>
                    <input type="text" class="form-control" id="inputZip" hidden>
                  </div>
                </div>
                <div class="form-group">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                    <label class="form-check-label" for="gridCheck">
                      Accept Terms and Conditions
                    </label>
                  </div>
                </div>
                <button name="signin" id="signin" type="submit" class="btn btn-primary">Sign in</button>
              </form>
              <?php
                if (isset($_POST['signin'])) {
                  // code...
                  if ($_POST['name'] != "" && $_POST['lastname'] != "" && $_POST['email'] != "" && $_POST['passw'] != "" && $_POST['user'] != "" && $_POST['phone'] != "" && (!empty($_POST['occupation'])) && $_POST['terms'] != "off") {
                    $signin = mysqli_query($conexion, "INSERT INTO sigin VALUES(NULL, '".$_POST['name']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['passw']."', '".$_POST['user']."', '".$_POST['phone']."', '".$_POST['occupation']."', '".$_POST['terms']."');");
                    $login = mysqli_query($conexion, "INSERT INTO login VALUES(NULL, '".$_POST['email']."', '".$_POST['passw']."');");
                    if($signin && $login){
                      echo "<script> swal('Successful registration!', 'You clicked the button!', 'success'); </script>";
                    } else {
                      echo "<script> swal('Sign Up failed!', 'You clicked the button!', 'error'); </script>";
                    }
                  } else {
                    echo "<script> swal('Sign Up failed!', 'You clicked the button!', 'error'); </script>";
                  }
                } else if (isset($_POST['login'])) {
                  if ($_POST['emailL'] != "" && $_POST['passwL'] != "") {
                    $consultaL = mysqli_query($conexion, "SELECT * FROM login WHERE Email = '".$_POST['emailL']."' AND Password = '".$_POST['passwL']."'");
                    if (mysqli_num_rows($consultaL) > 0) {
                      if ($_POST['emailL'] == "admin@admin.com" && $_POST['passwL'] == "admin") {
                        echo "<script> swal('Welcome Admin!', 'You clicked the button!', 'success').then((value) => { window.location='HomeAdmin.php'; }); </script>";
                      } else {
                        $ses = mysqli_query($conexion, "SELECT * FROM sigin WHERE Email = '".$_POST['emailL']."' AND Password = '".$_POST['passwL']."'");
                        while ($rowS = mysqli_fetch_assoc($ses)) {
                          $_SESSION['user'] = $rowS['Username'];
                        }
                        echo "<script> swal('Welcome User!', 'You clicked the button!', 'success').then((value) => { window.location='Home.php'; }); </script>";
                      }
                    } else {
                      echo "<script> swal('Log In failed!', 'You clicked the button!', 'error'); </script>";
                    }
                  }
                }
               ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
