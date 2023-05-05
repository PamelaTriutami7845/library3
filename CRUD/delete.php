<?php
include_once 'connect.php';
// menangkap id_buku di url
$isbn = $_GET['isbn'];

$result = mysqli_query($conn, "DELETE FROM buku WHERE isbn = '$isbn'");
header('Location:index.php');

?>
