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


?>