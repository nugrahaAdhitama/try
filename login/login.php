<?php
// konek ke halaman functions.php
require '../functions/functions.php';

// cek apakah tombol login sudah ditekan
if(isset($_POST["login"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    // cek email apakah ada di database
    $result = mysqli_query($connectSQL, "SELECT * FROM users WHERE email = '$email'");

    if( mysqli_num_rows($result) === 1 ) {

        // cek password
        $user = mysqli_fetch_assoc($result);
        if(password_verify($password, $user["password"])) {
            header("Location: ../index.php");
            exit;
        }

    } else {
        $msgFail = "Email atau password salah";
    }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gagal Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- MY CSS -->
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    
    <!-- Jika login gagal -->
    <?php if(isset($msgFail)) : ?>
    <main class="fail-login">
        <div class="box">
            <div class="inner-box">
                <div class="forms-wrap">
                    <div class="login-form gatau" autocomplete="off" method="post">
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
                    <img src="../img/illustration/login-fail.svg" alt="login-illustration" class="image img-1">
                </div>
            </div>
        </div>
    </main>
  <?php endif; ?>
    <!-- Akhir dari login gagal -->

</body>
</html>