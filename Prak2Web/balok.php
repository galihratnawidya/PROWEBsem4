<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas dan Volume Bola</title>
</head>
<body>
<?php
class Bola {
    private $jari;

    public function __construct($r) {
        $this->jari = $r;
    }

    public function hitungLuas() {
        $luasPermukaan = 4 * 3.14 * ($this->jari * $this->jari);
        return $luasPermukaan;
    }

    public function hitungVolume() {
        $volume = 4/3 * 3.14 * ($this->jari * $this->jari * $this->jari);
        return $volume;
    }
}

// Process form data (if submitted)
if (isset($_POST['jari'])) {
    $jari = $_POST['jari'];
    $bola = new Bola($jari);

    $luasPermukaan = $bola->hitungLuas();
    $volume = $bola->hitungVolume();
} else {
    // Handle case where form is not submitted
    $jari = null;
    $luasPermukaan = null;
    $volume = null;
}
?>

<h1>Hitung Luas dan Volume Bola</h1>
<form action="" method="post">
    <label for="jari">Jari-jari:</label>
    <input type="number" id="jari" name="jari" required>

    <button type="submit">Hitung</button>
</form>

<?php
// Display results only if form is submitted
if (isset($jari)) {
    echo "<h3>Hasil Perhitungan</h3>";
    echo "<p>Jari-jari: $jari</p>";
    echo "<p>Luas Permukaan: $luasPermukaan</p>";
    echo "<p>Volume: $volume</p>";
}
?>
</body>
</html>
