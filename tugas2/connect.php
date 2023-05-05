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

// mengambil data dari database
$sql = 'SELECT * FROM buku';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo 'Buku:' . $row['isbn'] . ' ' . $row['judul'] . '<br>';
    }
} else {
    echo 'result 0';
}
$conn->close();
?>
