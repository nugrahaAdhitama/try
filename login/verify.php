<?php
// konek ke halaman functions.php
require '../functions/functions.php';

// cek ada email atau hash di url
if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
    // Verify data
    $email = mysql_escape_string($_GET['email']); // Set email variable
    $hash = mysql_escape_string($_GET['hash']);
}

$users = query("SELECT email, hash, active, FROM users WHERE email='$email' AND hash='$hash' AND active='0'");
$match = mysqli_num_rows($users);

if($match > 0) {
    query("UPDATE users SET active='1' WHERE email='$email' AND hash='$hash' AND active='0'") 
}

echo $match;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verikasi Akun</title>
</head>
<body>
    
    <h1>Verifikasi Akun</h1>

</body>
</html> 