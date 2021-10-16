<?php
// koneksi ke database
$connectSQL = mysqli_connect("localhost", "root", "", "literasi_xiimipa1");

error_reporting(0);

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

// membuat function upload
function upload($data) {
    global $connectSQL;

    // ambil data dari tiap elemen dalam form
    $namaLengkap = htmlspecialchars($data["namaLengkap"]);
    $namaPanggilan = htmlspecialchars($data["namaPanggilan"]);
    $instagram = htmlspecialchars($data["instagram"]);
    $judulKarya = $data["judulKarya"];

    // upload file
    $judulKarya = uploadFile();
    if( !$judulKarya ) {
        return false;
    }

    // tambahkan file baru ke database
    return mysqli_query($connectSQL, "INSERT INTO penulis(nama_lengkap, nama_panggilan, instagram, judul_karya) VALUES('$namaLengkap', '$namaPanggilan', '$instagram', '$judulKarya')");
}

// membuat function upload file
function uploadFile() {
    $namaFile = $_FILES['judulKarya']['name'];
    $ukuranFile = $_FILES['judulKarya']['size'];
    $error = $_FILES['judulKarya']['error'];
    $tmpName = $_FILES['judulKarya']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if( $error === 4 ) {
        echo "
            <script>
            alert('Pilih file terlebih dahulu');
            </script>
        ";
        return false;
    }

    // cek apakah yang diupload berupa docx, pdf atau bukan
    $ekstensiValid = ['docx', 'pdf'];
    $ekstensiFile = explode('.', $namaFile);
    $ekstensiFile = strtolower(end($ekstensiFile));
    if(!in_array($ekstensiFile, $ekstensiValid)) {
        echo "
        <script>
        alert('Harap upload file berupa pdf atau docx');
        </script>
    ";
    return false;
    }

    // cek ukuran gambar yang diupload
    if($ukuranFile > 10000000) {
        echo "
            <script>
            alert('Ukuran file anda terlalu besar');
            </script>
        ";
        return false;
    }

    // lolos pengecekan file siap diupload
    // generate random number
    $namaFileBaru = uniqid();
    $namaFileBaru .= '-';
    // panggil nama user
    $namaUser = $_POST["namaPanggilan"];
    $namaFileBaru .= $namaUser;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, '../file/literasi/' . $namaFileBaru);

    return $namaFileBaru;
}


?>