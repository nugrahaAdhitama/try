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
        echo "
            <script>
            alert('Email sudah terdaftar');
            </script>
        ";

        return false;
    }

    // cek konfirmasi password benar atau salah
    if($password !== $password2) {
        echo "
            <script>
            alert('Password tidak sesuai');
            </script>
        ";

        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($connectSQL, "INSERT INTO users VALUES (
        '', '$email', '$password', '$hash', '$active'
    )");

    // // mengirimkan email kepada user untuk verifikasi
    // $to = $email;
    // $subject = 'Signup | Verification';
    // $message = `
    //     Terimakasih sudah melakukan registrasi!

    //     Akun anda telah dibuat, anda bisa login setelah melakukan verifikasi dengan menekan url yang ada di bawah

    //     -----------
    //     Tolong tekan url yang ada di bawah ini untuk mengaktivasikan akun anda
    //     http://xiimipa1sman6jakarta.epizy.com/login/verify.php?email='$email'&hash='$hash'
    //     -----------
    // `;
    // $headers = 'From:nugrahaadhitama22@gmail.com';
    // mail($to, $subject, $message, $headers);

    return mysqli_affected_rows($connectSQL);
}


?>