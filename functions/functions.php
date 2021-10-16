<?php
// koneksi ke database
$connectSQL = mysqli_connect("sql101.epizy.com", "epiz_30052651", "wvRBbnW3CbD", "epiz_30052651_literasixiimipa1");

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

// membuat function register
function register($data) {
    global $connectSQL;

    $email = mysqli_real_escape_string($connectSQL, strtolower($data["email"]));
    $password = mysqli_real_escape_string($connectSQL, $data["password"]);
    $password2 = mysqli_real_escape_string($connectSQL, $data["password2"]);

    // cek email sudah ada atau belum
    $result = mysqli_query("SELECT email FROM users WHERE email='$email'");
    if(mysqli_fetch_assoc($result)) {
        return false;
    }

    // cek konfirmasi password
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

    // ambil data dari tiap elemen di form
    $fullName = mysqli_real_escape_string($connectSQL, htmlspecialchars($data["fullName"]));
    $nickName = mysqli_real_escape_string($connectSQL, htmlspecialchars($data["nickName"]));
    $instagram = mysqli_real_escape_string($connectSQL, htmlspecialchars($data["instagram"]));
    $fileLiterasi = $data["fileLiterasi"];

    // upload file
    $fileLiterasi = uploadFile();
    if( !$fileLiterasi ) {
        return false;
    }

    // insert data ke database
    $query = "INSERT INTO penulis (nama_lengkap, nama_panggilan, instagram, judul_karya) VALUES('$fullName', '$nickName', '$instagram', '$fileLiterasi')";

    return mysqli_query($connectSQL, $query);

    
}

// membuat function upload file
function uploadFile() {
    $namaFile = $_FILES['fileLiterasi']['name'];
    $ukuranFile = $_FILES['fileLiterasi']['size'];
    $error = $_FILES['fileLiterasi']['error'];
    $tmpName = $_FILES['fileLiterasi']['tmp_name'];

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
    $namaUser = $_POST["fullName"];
    $namaFileBaru .= $namaUser;
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFile;

    move_uploaded_file($tmpName, '../file/literasi/' . $namaFileBaru);

    return $namaFileBaru;
}


?>