<?php
include 'class_db.php'; 
$db = new Database();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Mahasiswa</title>
</head>
<body>
    <h2>Tambah Data Mahasiswa</h2>
    <?php include 'menu.php'; ?>

    <?php
    // Periksa apakah ada pesan error
    if (isset($error_message)) {
        echo "<p style='color:red;'>$error_message</p>";
    }
    ?>

    <form method="post" action="mhs_proc.php">
        <label for="npm">NPM</label><br>
        <input type="text" id="npm" name="npm"><br>

        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama"><br>

        <label for="prodi_id">Prodi</label><br>
        <select id="prodi_id" name="prodi_id">
        <?php
        $sql_pr = "SELECT * FROM prodi";  
        $data_pr = $db->fetchdata($sql_pr);
        foreach ($data_pr as $dat_pr) {
            echo "<option value='" . htmlspecialchars($dat_pr['id']) . "'>" . htmlspecialchars($dat_pr['nama']) . "</option>";
        }
        ?>
        </select><br>

        <label for="alamat">Alamat</label><br>
        <textarea id="alamat" name="alamat"></textarea><br><br>

        <input type="submit" name="submit_add" value="SIMPAN">
    </form>
</body>
</html>