<?php

require_once 'bangun_datar.php';

$luas = new Luas_Bangun_datar();

#hitung  Luas Persegi Panjang
$p = 4;
$l = 5;
echo $luas->persegi_panjang($p, $l);

#output 20

?>
