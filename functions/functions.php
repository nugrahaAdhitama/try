<?php
// koneksi ke database
$connectSQL = mysqli_connect("localhost", "root", "", "literasi_xiimipa1");

// query data dari database
function query($query) {
    global $connectSQL;

    $result = mysqli_query($connectSQL, $query);

    $rows=[];
    while( $row = mysqli_fetch_assoc($result) ) {
        $rows[] = $row;
    };

    return $rows;
}

// membuat function registrasi
function register ($data) {
    global $connectSQL;

    $email = mysqli_real_escape_string($connectSQL, $data["email"]);
    $password = mysqli_real_escape_string($connectSQL, $data["password"]);
    $password2 = mysqli_real_escape_string($connectSQL, $data["password2"]);
    $hash = sha1(rand(0,1000));
    $active = 0;

    // cek email sudah ada atau belum
    $result = mysqli_query($connectSQL, "SELECT email FROM users WHERE email = '$email'");
    if(mysqli_fetch_assoc($result)) {
        return false;
    }

    // cek konfirmasi password benar atau salah
    if($password !== $password2) {
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    return mysqli_query($connectSQL, "INSERT INTO users(email, password) VALUES('$email', '$password')");
}


?>