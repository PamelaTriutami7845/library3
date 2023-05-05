<?php

include_once 'connect.php';
$qry =
    'SELECT buku.*, nama_pengarang,nama_penerbit FROM buku INNER JOIN pengarang ON pengarang.id_pengarang = buku.id_pengarang INNER JOIN penerbit ON penerbit.id_penerbit = buku.id_penerbit INNER JOIN rak ON rak.kode_rak = buku.kode_rak order by judul asc';
$buku = mysqli_query($conn, $qry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <a href="index.php">Buku</a> |
        <a href="#">penerbit</a> |
        <a href="#">pengarang</a>
    </center>
           <hr>
    <a href="add.php">add New Buku</a>

<br><br>
    <Table width="80%" border=1>
        <tr>
            <th>Judul</th>
            <th>Tahun</th>
            <th>Jumlah</th>
            <th>ISBN</th>
            <th>Pengarang</th>
            <th>Penerbit</th>
             <th>kode rak</th>
            <th>Aksi</th>
        </tr>

        <?php while ($buku_data = mysqli_fetch_array($buku)) {
            echo '<tr>';
            echo '<td>' . $buku_data['judul'] . '</td>';
            echo '<td>' . $buku_data['tahun_terbit'] . '</td>';
            echo '<td>' . $buku_data['jumlah'] . '</td>';
            echo '<td>' . $buku_data['isbn'] . '</td>';
            echo '<td>' . $buku_data['nama_pengarang'] . '</td>';
            echo '<td>' . $buku_data['nama_penerbit'] . '</td>';
            echo '<td>' . $buku_data['kode_rak'] . '</td>';
            echo '<td><a href="edit.php?isbn=' .
                $buku_data['isbn'] .
                '">Edit</a>||<a href="delete.php?isbn=' .
                $buku_data['isbn'] .
                '">Delete</a></td>';
        } ?>
    </Table>
</body>
</html>