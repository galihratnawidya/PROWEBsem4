<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hitung Luas dan Volume Balok</title>
</head>
<body>
    <h1>Hitung Luas dan Volume Balok</h1>
    <form action="" method="post">
        <label for="panjang">Panjang:</label>
        <input type="number" id="panjang" name="panjang" required>

        <label for="lebar">Lebar:</label>
        <input type="number" id="lebar" name="lebar" required>

        <label for="tinggi">Tinggi:</label>
        <input type="number" id="tinggi" name="tinggi" required>

        <button type="submit">Hitung</button>
    </form>
    <?php
class Balok {
    private $panjang;
    private $lebar;
    private $tinggi;

    public function __construct($panjang, $lebar, $tinggi) {
        $this->panjang = $panjang;
        $this->lebar = $lebar;
        $this->tinggi = $tinggi;
    }

    public function hitungLuas() {
        $luasPermukaan = 2 * ($this->panjang * $this->lebar + $this->panjang * $this->tinggi + $this->lebar * $this->tinggi);
        return $luasPermukaan;
    }

    public function hitungVolume() {
        $volume = $this->panjang * $this->lebar * $this->tinggi;
        return $volume;
    }
}

if (isset($_POST['panjang']) && isset($_POST['lebar']) && isset($_POST['tinggi'])) {
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $tinggi = $_POST['tinggi'];

    $balok = new Balok($panjang, $lebar, $tinggi);

    $luasPermukaan = $balok->hitungLuas();
    $volume = $balok->hitungVolume();

    echo "<h3>Hasil Perhitungan</h3>";
    echo "<p>Panjang: $panjang</p>";
    echo "<p>Lebar: $lebar</p>";
    echo "<p>Tinggi: $tinggi</p>";
    echo "<p>Luas Permukaan: $luasPermukaan</p>";
    echo "<p>Volume: $volume</p>";
} else {
    echo "<p>Semua input harus diisi!</p>";
}
?>
</body>
</html>
