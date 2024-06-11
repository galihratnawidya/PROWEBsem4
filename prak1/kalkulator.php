<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Sederhana</title>
    <link rel="stylesheet" href="kalk.css">
</head>
<body>
    <h1>Kalkulator Sederhana</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="number" name="angka1" placeholder=" Angka Pertama">
        <select name="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
        </select>
        <input type="number" name="angka2" placeholder=" Angka Kedua">
        <button type="submit" name="hitung">Hitung</button>
    </form>

    <?php
        if (isset($_POST['hitung'])) {
            $angka1 = $_POST['angka1'];
            $angka2 = $_POST['angka2'];
            $operator = $_POST['operator'];

            switch ($operator) {
                case '+':
                    $hasil = $angka1 + $angka2;
                    break;
                case '-':
                    $hasil = $angka1 - $angka2;
                    break;
                case '*':
                    $hasil = $angka1 * $angka2;
                    break;
                case '/':
                    $hasil = $angka1 / $angka2;
                    break;
                default:
                    $hasil = "Operasi tidak valid";
            }

            echo "Hasil: " . $hasil;
        }
    ?>
</body>
</html>
 