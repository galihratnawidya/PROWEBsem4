<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Konversi Nilai</title>
  <link rel="stylesheet" href="konversi.css">
</head>
<body>
  <div class="contai">
  <h1>Konversi Nilai</h1>
  <div class="container">
    <form id="form" action="#" method="post">
    Nilai Angka
      <input type="number" name="nilai" value="<?php if(isset($_POST['nilai'])){ echo $_POST['nilai']; }?>">
      <button type="submit">Konversi</button>
    </form>

    <?php
    $huruf = " ";
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nilai'])) {
        $nilai = $_POST['nilai'];

        if ($nilai >= 90) {
            $huruf = "A";
        } elseif ($nilai >= 80) {
            $huruf = "B+";
        } elseif ($nilai >= 70) {
            $huruf = "B";
        } elseif ($nilai >= 60) {
            $huruf = "C+";
        } elseif ($nilai >= 50) {
            $huruf = "C";
        } else {
            $huruf = "D";
        }
    }
    ?>
    
    Nilai Huruf
    <input type="text" id="hasil" value="<?php echo $huruf; ?>">
    
  </div>
</div>

</body>
</html>