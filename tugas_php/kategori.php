<?php if ($_POST != null) {
    $h = empty($_POST['tinggi']) ? 0 : $_POST['tinggi'];
    $w = empty($_POST['beratbadan']) ? 0 : $_POST['beratbadan'];
    $nama = empty($_POST['nama']) ? 0 : $_POST['nama'];
    $index = 0;
    if ($h != 0 && $w != 0) {
        $index = round(($w / ($h * $h)) * 703, 2);
    }

    $bmi = '';

    if ($index < 18.5) {
        $bmi = $index . ' anda termasuk kurus';
    } elseif ($index < 18.5 && $index < 24.9) {
        $bmi = $index . ' anda termasuk normal';
    } elseif ($index < 25 && $index < 29.9) {
        $bmi = $index . ' anda termasuk kegemukan';
    } else {
        $bmi = $index . ' anda termasuk gemuk sekali';
    }
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Menghitung BMI</title>
</head>
<body>
    <form class="m-4 p-4" method="post">
    <h2>Check Your BMI</h2>
    <!-- nama -->
        <div class="input-group flex-nowrap pb-2">
        <span class="input-group-text" id="addon-wrapping">Nama</span>
        <input type="text" class="form-control" placeholder="Nama" aria-label="Username" name="nama" aria-describedby="addon-wrapping">
        </div>
<!-- berat badan -->
        <div class="input-group flex-nowrap pb-2">
        <span class="input-group-text" id="addon-wrapping">Tinggi</span>
        <input type="text" class="form-control" name="tinggi" placeholder="Tinggi" aria-label="Username" aria-describedby="addon-wrapping">
        </div>
<!-- tinggi badan -->
        <div class="input-group flex-nowrap pb-2">
        <span class="input-group-text" id="addon-wrapping">Berat Badan</span>
        <input type="text" name="beratbadan" class="form-control" placeholder="Berat Badan" aria-label="Username" aria-describedby="addon-wrapping">
        </div>

            <div class="submit pb-2">
        <input type="submit" name="submit" value="Check BMI">
        <input type="reset" value="Clear">
    </div>
            <div role="alert" id="bmi">
            <?php
            error_reporting(0);
            echo "<span class='pass'>halo, $nama. Nilai BMI anda adalah : " .
                $bmi .
                ' ' .
                '</span>';
            ?>    
        </div>
    </form>
</body>
</html>


