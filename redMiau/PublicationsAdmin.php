<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!------------Bootstrap-------------->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!------------ -------------->
    <!---------------Alertrs------->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>MiauFace</title>
  </head>
  <body>
  </body>
</html>
<?php
include('conexion.php');

  $public = mysqli_query($conexion, "SELECT * FROM public ORDER by idPublic DESC");
  if (mysqli_num_rows($public) > 0) {
    while ($rowP = mysqli_fetch_assoc($public)) {
      $likes = mysqli_query($conexion, "SELECT * FROM likes WHERE Username = 'ADMIN' AND idPublic = ".$rowP['idPublic']."");
      $countL = mysqli_query($conexion, "SELECT COUNT(*) total FROM likes WHERE idPublic = ".$rowP['idPublic']."");
      $countL2 = mysqli_fetch_assoc($countL);
      if ($rowP['Tex_t'] != NULL && $rowP['Image'] == NULL && $rowP['Video'] == NULL && $rowP['Audio'] == NULL) { //SOLO TEXTO
        if (mysqli_num_rows($likes) == 0){
          echo "
          <div class='card'>
            <div class='card-header'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              ".$rowP['Username']."
            </div>
            <div class='card-body'>
              <blockquote class='blockquote mb-0'>
                <p>".$rowP['Tex_t']."</p>
              </blockquote>
            </div>
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-header'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              ".$rowP['Username']."
            </div>
            <div class='card-body'>
              <blockquote class='blockquote mb-0'>
                <p>".$rowP['Tex_t']."</p>
              </blockquote>
            </div>
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      } elseif ($rowP['Tex_t'] == NULL && $rowP['Image'] != NULL && $rowP['Video'] == NULL && $rowP['Audio'] == NULL) { //SOLO IMAGEN
        if (mysqli_num_rows($likes) == 0){
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
            </div>
            <img src='posts/".$rowP['Image']."' class='card-img-top' alt='...' />
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
            </div>
            <img src='posts/".$rowP['Image']."' class='card-img-top' alt='...' />
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      } elseif ($rowP['Tex_t'] == NULL && $rowP['Image'] == NULL && $rowP['Video'] != NULL && $rowP['Audio'] == NULL) { // SOLO VIDEO
        if(mysqli_num_rows($likes) == 0){
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
              <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            </div>
            <video src='posts/".$rowP['Video']."' class='card-img-top' alt='...' controls></video>
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
              <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            </div>
            <video src='posts/".$rowP['Video']."' class='card-img-top' alt='...' controls></video>
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      } elseif ($rowP['Tex_t'] == NULL && $rowP['Image'] == NULL && $rowP['Video'] == NULL && $rowP['Audio'] != NULL) { //SOLO AUDIO
        if (mysqli_num_rows($likes) == 0) {
          echo "
          <div class='card'>
            <div class='card-header'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              ".$rowP['Username']."
            </div>
            <div class='card-body'>
              <blockquote class='blockquote mb-0'>
                <audio src='posts/".$rowP['Audio']."' preload='auto' controls></audio>
              </blockquote>
            </div>
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-header'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              ".$rowP['Username']."
            </div>
            <div class='card-body'>
              <blockquote class='blockquote mb-0'>
                <audio src='posts/".$rowP['Audio']."' preload='auto' controls></audio>
              </blockquote>
            </div>
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      } elseif ($rowP['Tex_t'] != NULL && $rowP['Image'] != NULL && $rowP['Video'] == NULL && $rowP['Audio'] == NULL) { // TEXTO E IMAGEN
        if (mysqli_num_rows($likes) == 0) {
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
              <p class='card-text'>".$rowP['Tex_t']."</p>
              <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            </div>
            <img src='posts/".$rowP['Image']."' class='card-img-top' alt='...' />
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
              <p class='card-text'>".$rowP['Tex_t']."</p>
              <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            </div>
            <img src='posts/".$rowP['Image']."' class='card-img-top' alt='...' />
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      } elseif ($rowP['Tex_t'] != NULL && $rowP['Image'] == NULL && $rowP['Video'] != NULL && $rowP['Audio'] == NULL) { // TEXTO Y VIDEO
        if (mysqli_num_rows($likes) == 0) {
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
              <p class='card-text'>".$rowP['Tex_t']."</p>
              <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            </div>
            <video src='posts/".$rowP['Video']."' class='card-img-top' alt='...' controls></video>
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-body'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              <h5 class='card-title'>".$rowP['Username']."</h5>
              <p class='card-text'>".$rowP['Tex_t']."</p>
              <p class='card-text'><small class='text-muted'>Last updated 3 mins ago</small></p>
            </div>
            <video src='posts/".$rowP['Video']."' class='card-img-top' alt='...' controls></video>
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      } elseif ($rowP['Tex_t'] != NULL && $rowP['Image'] == NULL && $rowP['Video'] == NULL && $rowP['Audio'] != NULL) { // TEXTO Y AUDIO
        if (mysqli_num_rows($likes) == 0) {
          echo "
          <div class='card'>
            <div class='card-header'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              ".$rowP['Username']."
            </div>
            <div class='card-body'>
              <blockquote class='blockquote mb-0'>
                <p>".$rowP['Tex_t']."</p>
                <audio src='posts/".$rowP['Audio']."' preload='auto' controls></audio>
              </blockquote>
            </div>
            <center><a href='likes.php?idA=".$rowP['idPublic']."'><button type='button' class='btn btn-outline-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        } else {
          echo "
          <div class='card'>
            <div class='card-header'>
            <a href='DeletePublic.php?deletPid=".$rowP['idPublic']."'>
            <button type='button' class='close' aria-label='Close'>
              <span aria-hidden='true'>&times;</span>
            </button>
            </a>
              ".$rowP['Username']."
            </div>
            <div class='card-body'>
              <blockquote class='blockquote mb-0'>
                <p>".$rowP['Tex_t']."</p>
                <audio src='posts/".$rowP['Audio']."' preload='auto' controls></audio>
              </blockquote>
            </div>
            <center><a href='#'><button type='button' class='btn btn-danger'>
            Me gusta
            <svg id='i-heart' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32' width='22' height='22' fill='none' stroke='currentcolor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'>
              <path d='M4 16 C1 12 2 6 7 4 12 2 15 6 16 8 17 6 21 2 26 4 31 6 31 12 28 16 25 20 16 28 16 28 16 28 7 20 4 16 Z' />
            </svg>
            &nbsp;".$rowP['likes']."
            </button></a><center>
          </div>
          ";
        }
      }
    }
  } else {
    echo "
    <div class='card-body text-white bg-warning mb-3'>
      <div class='card-header'>NO POST</div>
      <div class='card-body'>
        <center><h5 class='card-title'>Warning card</h5></center>
      </div>
    </div>
    ";
  }
?>
