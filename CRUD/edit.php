<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>edit data</title>
</head>
<body>
    <?php
    include 'connect.php';
    $isbn = $_GET['isbn'];
    $buku = mysqli_query($conn, "SELECT * FROM buku WHERE isbn='$isbn'");
    $penerbit = mysqli_query($conn, 'SELECT * FROM penerbit');
    $pengarang = mysqli_query($conn, 'SELECT * FROM pengarang');

    while ($buku_data = mysqli_fetch_array($buku)) {
        $judul = $buku_data['judul'];
        $tahun = $buku_data['tahun_terbit'];
        $jumlah = $buku_data['jumlah'];
        $isbn = $buku_data['isbn'];
        $id_pengarang = $buku_data['id_pengarang'];
        $id_penerbit = $buku_data['id_penerbit'];
        $kode_rak = $buku_data['kode_rak'];
    }
    ?>
<form action="edit.php?isbn=<?php echo $isbn; ?>" method="post">
<table width="20%" border=0>
<tr>
    <td>Judul</td>
    <td><input type="text" name="judul" value="<?php echo $judul; ?>"></td>
</tr>
<tr>
    <td>Tahun</td>
    <td><input type="text" name="tahun_terbit" value="<?php echo $tahun; ?>"></td>
</tr>
<tr>
    <td>Jumlah</td>
    <td><input type="text" name="jumlah" value="<?php echo $jumlah; ?>"></td>
</tr>
<tr>
    <td>ISBN</td>
    <td><input type="text" name="isbn" value="<?php echo $isbn; ?>"></td>
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
    <td>rak_kode_rak</td>
    <td><input type="text" name="kode_rak" value="<?php echo $kode_rak; ?>"></td>
</tr>
<tr>
    <td><input type="submit" name="submit"></td>
</tr>
<a href="index.php">back</a>
</table>
</form>

		<?php
  error_reporting(0);
  if (isset($_POST['submit'])) {
      $judul = $_POST['judul'];
      $Tahun_terbit = $_POST['tahun_terbit'];
      $isbn = $_POST['isbn'];
      $jumlah = $_POST['jumlah'];
      $id_penerbit = $_POST['id_penerbit'];
      $id_pengarang = $_POST['id_pengarang'];
      $kode_rak = $_POST['kode_rak'];

      ($sql = mysqli_query(
          $conn,
          "UPDATE buku SET judul='$judul', tahun_terbit = '$Tahun_terbit', jumlah='$jumlah',id_penerbit='$id_penerbit', id_pengarang='$id_pengarang', kode_rak='$kode_rak' WHERE isbn ='$isbn' "
      )) or die(mysqli_error($conn));

      if ($sql) {
          echo '<script>alert("Berhasil menyimpan data."); document.location="edit.php?isbn=' .
              $isbn .
              '";</script>';
      } else {
          echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
      }
  }
  ?>
</body>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>
