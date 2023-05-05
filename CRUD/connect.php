<?php
$servername = 'localhost';
$database = 'perpustakaan';
$username = 'root';
$password = '';

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $database);
// mengecek koneksi
if (!$conn) {
    die('Koneksi gagal: ' . mysqli_connect_error());
}

echo 'Koneksi berhasil' . '<br>';
