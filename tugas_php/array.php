<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Array</title>
</head>
<body class="">

<?php
$data = file_get_contents('data.json');
$data = json_decode($data);
?>

    <div class="container mt-4">
    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">umur</th>
      <th scope="col">Alamat</th>
       <th scope="col">Kelas</th>
        <th scope="col">Nilai</th>
         <th scope="col">Hasil</th>
         
    </tr>
  </thead>
  <tbody>


  <?php foreach ($data as $value) {
      echo '<tr>';
      echo '<td>' . 'No' . $value->No . '</td>';
      echo '<td>' . 'Nama' . $value->Nama . '</td>';
      echo '<td>' . 'Tanggal Lahir' . $value->Tanggal_Lahir . '</td>';
      echo '<td>' . 'umur' . $value->umur . '</td>';
      echo '<td>' . 'Alamat' . $value->Alamat . '</td>';
      echo '<td>' . 'Kelas' . $value->Kelas . '</td>';
      echo '<td>' . 'Nilai' . $value->Nilai . '</td>';
      echo '<td>' . 'Hasil' . $value->Hasil . '</td>';
      echo '</tr>';
  } ?>
  </tbody>
</table>
    </div>
</body>
</html>