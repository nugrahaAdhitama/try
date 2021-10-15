<?php
// konek ke halaman functions.php
require '../functions/functions.php';

// cek button sudah ditekan atau belum
if(isset($_POST["register"])){
    
    if( register($_POST) > 0 ){
        $msg = "Akun berhasil dibuat, silahkan login!";
    } else {
        $msgFail = "Email sudah terdaftar atau password tidak sesuai";
    }

}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- MY CSS -->
    <link rel="stylesheet" href="css/register.css">

    <title>Akun berhasil dibuat!</title>
  </head>
  <body>
  <?php if(isset($msg)) : ?>
  <section class="alert-wrapper">
      <div class="container">
          <div class="row text-center inner-container">
              <div class="col-md-12 alert-content-wrapper">
                    <div class="alert alert-info alert-content" role="alert">
                        <?= $msg; ?>
                    </div>
                    <a href="../index.php" class="button"><button class="button btn btn-success" id="btn">Ok!</button></a>
              </div>
          </div>
      </div>
  </section>
  <?php endif; ?>

  <?php if(isset($msgFail)) : ?>
  <section class="alert-wrapper">
      <div class="container">
          <div class="row text-center inner-container">
              <div class="col-md-12 alert-content-wrapper">
                    <div class="alert alert-danger alert-content" role="alert">
                        <?= $msgFail; ?>
                    </div>
                    <a href="index.html" class="button"><button class="button btn btn-danger" id="btn">Ok!</button></a>
              </div>
          </div>
      </div>
  </section>
  <?php endif; ?>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>