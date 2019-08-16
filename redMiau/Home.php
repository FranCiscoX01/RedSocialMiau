<?php session_start(); ?>
<?php include('conexion.php'); ?>
<?php error_reporting(0); ?>
<?php $warningU = mysqli_query($conexion, "SELECT * FROM sigin WHERE Username = '".$_SESSION['user']."'"); ?>
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
  <script src="http://code.jquery.com/jquery-latest.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      var refreshId = setInterval(function() {
        $("#Publications").load('Publications.php');
      }, 500);
    });
    $.ajaxSetup({ cache: false });
  </script>
  <body>
    <?php if(mysqli_num_rows($warningU) > 0) { ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="Home.php">
        <svg id="i-user" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
          <path d="M22 11 C22 16 19 20 16 20 13 20 10 16 10 11 10 6 12 3 16 3 20 3 22 6 22 11 Z M4 30 L28 30 C28 21 22 20 16 20 10 20 4 21 4 30 Z" />
        </svg>
        <?php echo $_SESSION['user']; ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link active" href="Home.php">
            <svg id="i-home" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M12 20 L12 30 4 30 4 12 16 2 28 12 28 30 20 30 20 20 Z" />
            </svg>
            Home <span class="sr-only">(current)</span>
          </a>
          <a class="nav-item nav-link" href="CloseSession.php">
            <svg id="i-signout" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M28 16 L8 16 M20 8 L28 16 20 24 M11 28 L3 28 3 4 11 4" />
            </svg>
            Log Out
          </a>
          <a class="nav-item nav-link" href="Chat.php">
            <svg id="i-msg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
              <path d="M2 4 L30 4 30 22 16 22 8 29 8 22 2 22 Z" />
            </svg>
            Message
          </a>
        </div>
      </div>
    </nav>
    <br>
    <div class="container">
      <div class="card">
        <h5 class="card-header">
          POST&nbsp;
          <svg id="i-compose" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="22" height="22" fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
            <path d="M27 15 L27 30 2 30 2 5 17 5 M30 6 L26 2 9 19 7 25 13 23 Z M22 6 L26 10 Z M9 19 L13 23 Z" />
          </svg>
        </h5>
        <div class="card-body">
          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data"><!------------form------>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Text</label>
              <textarea class="form-control" id="posttext" name="posttext" rows="3"></textarea>
            </div>
            <div class="custom-file">
              <input type="file" id="upfile" name="upfile">
            </div>
            <div class="custom-file">
              <input type="text" id="userpost" name="userpost" value="<?php echo $_SESSION['user']; ?>" hidden>
            </div>
            <br>
            <br>
            <center><button id="ppost" value="PublicPost" name="ppost" type="submit" class="btn btn-outline-info">Post</button></center>
          </form>
          <?php
            if (isset($_POST['ppost']) && $_POST['ppost'] == "PublicPost" && ($_POST['posttext'] != "" || $_FILES['upfile']['name'] != "")) {
              $route = "posts/";
              $finalname = trim($_FILES['upfile']['name']);
              $finalname = str_replace(" ", "", $finalname);
              $upload = $route . $finalname;
              $type = end(explode(".", $finalname));

              if ($_FILES['upfile']['tmp_name'] != "" && $_POST['posttext'] != "") {
                if ($type == "jpeg" || $type == "png" || $type == "jpg" || $type == "gif") {
                  $imgP = mysqli_query($conexion, "INSERT INTO public (Username, Tex_t, Image, likes) VALUES('".$_POST['userpost']."', '".$_POST['posttext']."', '".$finalname."', 0);");
                } elseif ($type == "mp3") {
                  $audP = mysqli_query($conexion, "INSERT INTO public (Username, Tex_t, Audio, likes) VALUES('".$_POST['userpost']."', '".$_POST['posttext']."', '".$finalname."', 0);");
                } elseif ($type == "mp4") {
                  $vidP = mysqli_query($conexion, "INSERT INTO public (Username, Tex_t, Video, likes) VALUES('".$_POST['userpost']."', '".$_POST['posttext']."', '".$finalname."', 0);");
                } else {
                  echo "<script> swal('File not Allowed!', 'You clicked the button!', 'error').then((value) => { window.location='HomeAdmin.php'; }); </script>";
                }
              } elseif ($_FILES['upfile']['tmp_name'] == "" && $_POST['posttext'] != "") {
                $textP = mysqli_query($conexion, "INSERT INTO public (Username, Tex_t, likes) VALUES('".$_POST['userpost']."', '".$_POST['posttext']."', 0);");
              } elseif ($_FILES['upfile']['tmp_name'] != "" && $_POST['posttext'] == "") {
                if ($type == "jpeg" || $type == "png" || $type == "jpg" || $type == "gif") {
                  $imgP = mysqli_query($conexion, "INSERT INTO public (Username, Image, likes) VALUES('".$_POST['userpost']."', '".$finalname."', 0);");
                } elseif ($type == "mp3") {
                  $audP = mysqli_query($conexion, "INSERT INTO public (Username, Audio, likes) VALUES('".$_POST['userpost']."', '".$finalname."', 0);");
                } elseif ($type == "mp4") {
                  $vidP = mysqli_query($conexion, "INSERT INTO public (Username, Video, likes) VALUES('".$_POST['userpost']."', '".$finalname."', 0);");
                } else {
                  echo "<script> swal('File not Allowed!', 'You clicked the button!', 'error').then((value) => { window.location='HomeAdmin.php'; }); </script>";
                }
              }

              if (move_uploaded_file($_FILES['upfile']['tmp_name'], $upload)) {
                if ($imgP || $audP || $vidP) {
                  echo "<script> swal('Successful post!', 'You clicked the button!', 'success').then((value) => { window.location='Home.php'; }); </script>";
                } else {
                  echo "<script> swal('Post Fail!', 'You clicked the button!', 'error').then((value) => { window.location='Home.php'; }); </script>";
                }
              } elseif ($_POST['posttext'] != "" && $_FILES['upfile']['tmp_name'] == "") {
                echo "<script> swal('Successful post!', 'You clicked the button!', 'success').then((value) => { window.location='Home.php'; }); </script>";
              } else {
                echo "<script> swal('Upload File Fail!', 'You clicked the button!', 'error').then((value) => { window.location='Home.php'; }); </script>";
              }
            }
          ?>
        </div>
      </div>
    </div>
    <hr width="1200px">
    <center><h1>Publications</h1></center>
    <div class="container" id="Publications">

    </div>
    <?php
    } else {
      echo "<script> swal('Your Account was Delete!', 'You clicked the button!', 'error').then((value) => { window.location='index.php'; }); </script>";
    }
    ?>
  </body>
</html>
