<?php

// Definisikan tabel konversi nilai
$konversiNilai = [
    "A" => 100,
    "B" => 80,
    "C" => 70,
    "D" => 60,
    "E" => 50,
];

// Masukkan nilai mata kuliah yang ingin dikonversi
$nilaiMataKuliah = "B";

// Periksa apakah nilai mata kuliah ada di tabel konversi
if (isset($konversiNilai[$nilaiMataKuliah])) {
    // Konversi nilai mata kuliah
    $nilaiAngka = $konversiNilai[$nilaiMataKuliah];
    
    // Tampilkan hasil konversi
    echo "Nilai mata kuliah $nilaiMataKuliah setara dengan nilai angka $nilaiAngka";
} else {
    // Nilai mata kuliah tidak ditemukan
    echo "Nilai mata kuliah $nilaiMataKuliah tidak ditemukan dalam tabel konversi";
}

?>
 
