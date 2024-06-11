<?php

// Inisialisasi variabel untuk menyimpan bilangan
$bilangan = array(1, 3, 5, 7, 9, 21, 23, 25, 27, 29, 28, 26, 24, 22, 20, 20, 8, 6, 4, 2);

// Hitung jumlah bilangan
$jumlahBilangan = count($bilangan);

// Gunakan perulangan for untuk menampilkan bilangan
for ($i = 0; $i < $jumlahBilangan; $i++) {
  echo $bilangan[$i] . ", ";
}

?>
