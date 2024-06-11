<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konversi Nilai Angka ke Huruf</title>
</head>
<body>
    <h1>Konversi Nilai Angka ke Huruf</h1>
    <form action=" " method="post">
        <label for="nilai">Nilai Angka:</label>
        <input type="number" id="nilai" name="nilai" required>

        <button type="submit">Konversi</button>
    </form>
    <?php
class KonversiNilai {
    private $nilaiAngka;

    public function __construct($nilaiAngka) {
        $this->nilaiAngka = $nilaiAngka;
    }

    public function konversiNilaiHuruf() {
        if ($this->nilaiAngka >= 90 && $this->nilaiAngka <= 100) {
            return "A";
        } elseif ($this->nilaiAngka >= 80 && $this->nilaiAngka < 90) {
            return "B";
        } elseif ($this->nilaiAngka >= 70 && $this->nilaiAngka < 80) {
            return "C";
        } elseif ($this->nilaiAngka >= 60 && $this->nilaiAngka < 70) {
            return "D";
        } else {
            return "E";
        }
    }
}

if (isset($_POST['nilai'])) {
    $nilaiAngka = $_POST['nilai'];
    $konversiNilai = new KonversiNilai($nilaiAngka);
    $nilaiHuruf = $konversiNilai->konversiNilaiHuruf();

    echo "<h3>Hasil Konversi</h3>";
    echo "<p>Nilai Angka: $nilaiAngka</p>";
    echo "<p>Nilai Huruf: $nilaiHuruf</p>";
} else {
    echo "<p>Masukkan nilai angka terlebih dahulu!</p>";
}
?>
</body>
</html>
