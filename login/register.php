<?php
// konek ke halaman functions.php
require '../functions/functions.php';

// cek button sudah ditekan atau belum
if(isset($_POST["register"])){
    
    if( register($_POST) > 0 ){
        $msg = "Akun berhasil dibuat, silahkan cek email untuk melakukan verifikasi!";
    } else {
        echo mysqli_error($connectSQL);
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register</title>
</head>
<body>
    
    <?php if(isset($msg)) : ?>
        <section class="jumbotron text-center" id="jumbotron">
            <div class="container">
              <div class="row text-center justify-content-evenly align-items-center d-flex flex-row-reverse">
                <div class="col-md-12">
                  <p class="lead"><?= $msg; ?></p>
                </div>
              </div>
            </div>
        </section>
    <?php endif; ?>

</body>
</html>