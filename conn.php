<?php
// koneksi ke database mySQL
$koneksi = mysqli_connect("localhost","root","","akademik_db");

// cek koneksi ke database, jika gagal akan tampil pesan error
if (mysqli_connect_errno()){
    echo "Gagal melakukan koneksi ke MySQL: " . mysqli_connect_error();
}
?>