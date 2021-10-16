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

    <?php if(isset($msg)) : ?>
    <title>Akun berhasil dibuat!</title>
    <?php endif; ?>

    <?php if(isset($msgFail)) : ?>
    <title>Akun gagal dibuat!</title>
    <?php endif; ?>
  </head>
  <body>

  <!-- Kalo registrasi berhasil tampilkan ini -->
  <?php if(isset($msg)) : ?>
    <main class="success-registration">
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <div action="register.php" class="login-form gatau" autocomplete="off" method="post">
                        <div class="logo">
                            <img src="../img/logo/LogoSma6Jakarta.jpg" alt="">
                            <h3>XII MIPA 1</h3>
                        </div>

                        <div class="heading">
                            <div class="alert alert-success" role="alert">
                                <?= $msg; ?>
                            </div>
                        </div>

                        <div class="actual-form">
                            <a href="index.html"><button class="login-btn">OK!</button></a>
                        </div>
                    </div>
                </div>
    
                <div class="panels-wrap">
                    <img src="../img/illustration/registration-success.svg" alt="login-illustration" class="image img-1">
                </div>
            </div>
        </div>
    </main>
  <?php endif; ?>
  <!-- Akhir dari registrasi berhasil -->

  <!-- Jika registrasi gagal tampilkan ini -->
  <?php if(isset($msgFail)) : ?>
    <main class="fail-registration">
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <div action="register.php" class="login-form gatau" autocomplete="off" method="post">
                        <div class="logo">
                            <img src="../img/logo/LogoSma6Jakarta.jpg" alt="">
                            <h3>XII MIPA 1</h3>
                        </div>

                        <div class="heading">
                            <div class="alert alert-danger" role="alert">
                                <?= $msgFail; ?>
                            </div>
                        </div>

                        <div class="actual-form">
                            <a href="index.html"><button class="fail-btn">OK!</button></a>
                        </div>
                    </div>
                </div>
    
                <div class="panels-wrap">
                    <img src="../img/illustration/registration-fail.svg" alt="login-illustration" class="image img-1">
                </div>
            </div>
        </div>
    </main>
  <?php endif; ?>
  <!-- Akhir dari registrasi gagal -->
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