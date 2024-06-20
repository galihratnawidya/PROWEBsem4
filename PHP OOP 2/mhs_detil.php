<?php
include 'class_db.php';
$db = new Database();

$npm = $_POST['npm'];

$sql = "SELECT * FROM mahasiswa WHERE npm='$npm'";
$dat = $db->datasql($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mahasiswa</title>
</head>
<body>
    <h2>Detil Data Mahasiswa</h2>
    <?php include 'menu.php'; ?>
    <form method="post" action="mhs_proc.php">
        <label for="npm">NPM</label><br>
        <input type="text" id="npm" name="npm"><br>
        
        <label for="nama">Nama</label><br>
        <input type="text" id="nama" name="nama" ><br>
        
        <label for="prodi_id">Prodi</label><br>
        <select id="prodi_id" name="prodi_id">
            <?php
            $sql_pr = "SELECT * FROM prodi";
            $data_pr = $db->fetchdata($sql_pr);
            foreach ($data_pr as $dat_pr) {
                $selected = ($dat_pr['id'] == $dat['prodi_id']) ? 'selected' : '';
                echo "<option value='" . htmlspecialchars($dat_pr['id']) . "' $selected>" . htmlspecialchars($dat_pr['nama']) . "</option>";
            }
            ?>
        </select><br>
        
        <label for="alamat">Alamat</label><br>
        <textarea id="alamat" name="alamat"></textarea><br><br>
        
        <input type="submit" name="submit_delete" value="HAPUS" onclick="return confirm('Yakin hapus data?')">
        <input type="submit" name="submit_edit" value="SIMPAN">
        <input type="hidden" name="npm_old" value="<?= htmlspecialchars($dat['npm']) ?>">
    </form>
</body>
</html>