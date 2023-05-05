<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Buku</title>
</head>
<body>
    <?php
    include_once 'connect.php';

    $penerbit = mysqli_query($conn, 'SELECT * FROM penerbit');
    $pengarang = mysqli_query($conn, 'SELECT * FROM pengarang');
    $rak = mysqli_query($conn, 'SELECT * FROM rak');
    ?>
<br>
<a href="index.php">add to home</a>
<br><br>
<tr></tr>
<form action="add.php" method="post" name="form1">
<table width="20%" border=0>
<tr>
    <td>Judul</td>
    <td><input type="text" name="judul"></td>
</tr>
<tr>
    <td>Tahun</td>
    <td><input type="text" name="tahun_terbit"></td>
</tr>
<tr>
    <td>Jumlah</td>
    <td><input type="text" name="jumlah"></td>
</tr>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn"></td>
</tr>
<tr>
    <td>pengarang</td>
    <td>
        <select name="id_pengarang">
            <?php while ($pengarang_data = mysqli_fetch_array($pengarang)) {
                echo "<option value='" .
                    $pengarang_data['id_pengarang'] .
                    "'>" .
                    $pengarang_data['nama_pengarang'] .
                    '</option>';
            } ?>
        </select>
    </td>
</tr>
<tr>
    <td>penerbit</td>
    <td>
        <select name="id_penerbit">
            <?php while ($penerbit_data = mysqli_fetch_array($penerbit)) {
                echo "<option value='" .
                    $penerbit_data['id_penerbit'] .
                    "'>" .
                    $penerbit_data['nama_penerbit'] .
                    '</option>';
            } ?>
        </select>
    </td>
</tr>
<tr>
    <td>Kode Rak</td>
    <td>
        <select name="id_kode_rak">
            <?php while ($kode_rak_data = mysqli_fetch_array($rak)) {
                echo "<option value='" .
                    $kode_rak_data['id_kode_rak'] .
                    "'>" .
                    $kode_rak_data['kode_rak'] .
                    '</option>';
            } ?>
        </select>
    </td>
</tr>
<tr>
    <td><input type="submit" name="submit" value="add"></td>
</tr>
</table>
</form>
<?php if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $Tahun_terbit = $_POST['tahun_terbit'];
    $isbn = $_POST['isbn'];
    $jumlah = $_POST['jumlah'];
    $id_pengarang = $_POST['id_pengarang'];
    $id_penerbit = $_POST['id_penerbit'];
    $rak_kode_rak = $_POST['id_kode_rak'];
    include_once 'connect.php';
    $result = mysqli_query(
        $conn,
        "INSERT INTO buku (`judul`,`tahun_terbit`,`jumlah`,`isbn`,`id_pengarang`,`id_penerbit`,`kode_rak`) VALUES ('$judul','$Tahun_terbit','$jumlah','$isbn','$id_pengarang','$id_penerbit','$rak_kode_rak')"
    );

    header('Location:index.php');
} ?>
</body>
</html>