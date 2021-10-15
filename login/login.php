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

    }

    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>