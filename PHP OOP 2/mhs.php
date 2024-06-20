<?php
include 'class_db.php';
$db = new Database();

$sql = "SELECT * FROM mahasiswa";
$data = $db->fetchdata($sql);

// Proses Edit Data
if (isset($_POST['submit_edit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi_id = $_POST['prodi_id'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE mahasiswa SET nama = '$nama', prodi_id = '$prodi_id', alamat = '$alamat' WHERE npm = '$npm'";
    if ($db->sqlquery($sql)) {
        header("Location: mhs.php");
        exit;
    } else {
        $error_message = "Gagal mengupdate data: " . $sql;
    }
}

// Proses Hapus Data
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
    $npm = $_GET['npm'];
    $sql = "DELETE FROM mahasiswa WHERE npm = '$npm'";
    if ($db->sqlquery($sql)) {
        header("Location: mhs.php");
        exit;
    } else {
        $error_message = "Gagal menghapus data: " . $sql;
    }
}

// Proses Tambah Data
if (isset($_POST['submit_add'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi_id = $_POST['prodi_id'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (npm, nama, prodi_id, alamat) VALUES ('$npm', '$nama', '$prodi_id', '$alamat')";
    if ($db->sqlquery($sql)) {
        header("Location: mhs.php");
        exit;
    } else {
        $error_message = "Gagal menambahkan data: " . $sql;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Daftar Mahasiswa</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <?php include 'menu.php'; ?>

    <?php if (isset($error_message)) { ?>
        <p style="color: red;"><?= $error_message ?></p>
    <?php } ?>
    <table width="50%" height="5%" border="1">
        <tr>
            <th>NPM</th>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($data as $row) { ?>
        <tr>
            <td><?= htmlspecialchars($row['npm']) ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['prodi_id']) ?></td>
            <td><?= htmlspecialchars($row['alamat']) ?></td>
            <td>
                <a href="mhs.php?action=detail&npm=<?= htmlspecialchars($row['npm']) ?>">LIHAT</a>
                <a href="mhs.php?action=edit&npm=<?= htmlspecialchars($row['npm']) ?>">EDIT</a>
                <a href="mhs.php?action=delete&npm=<?= htmlspecialchars($row['npm']) ?>" onclick="return confirm('Yakin hapus data?')">HAPUS</a>
            </td>
        </tr>
        <?php } ?>
    </table>

    <?php if (isset($_GET['action']) && $_GET['action'] == 'edit') { ?>
        <h2>Edit Data Mahasiswa</h2>
        <form method="post" action="mhs.php">
            <input type="hidden" name="npm" value="<?= htmlspecialchars($_GET['npm']) ?>">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="prodi_id">Prodi ID:</label>
            <input type="text" id="prodi_id" name="prodi_id" required><br>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea><br>

            <button type="submit" name="submit_edit">Simpan</button>
        </form>
    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'detail') { ?>
        <?php
        $npm = $_GET['npm'];
        $sql = "SELECT * FROM mahasiswa WHERE npm = '$npm'";
        $result = $db->sqlquery($sql);
        $data = $result->fetch_assoc();
        ?>
        <h2>Detail Mahasiswa</h2>
        <p>NPM: <?= htmlspecialchars($data['npm']) ?></p>
        <p>Nama: <?= htmlspecialchars($data['nama']) ?></p>
        <p>Prodi ID: <?= htmlspecialchars($data['prodi_id']) ?></p>
        <p>Alamat: <?= htmlspecialchars($data['alamat']) ?></p>
    <?php } elseif (isset($_GET['action']) && $_GET['action'] == 'add') { ?>
        <h2>Tambah Data Mahasiswa</h2>
        <form method="post" action="mhs.php">
            <label for="npm">NPM:</label>
            <input type="text" id="npm" name="npm" required><br>

            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br>

            <label for="prodi_id">Prodi ID:</label>
            <input type="text" id="prodi_id" name="prodi_id" required><br>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" required></textarea><br>

            <button type="submit" name="submit_add">Simpan</button>
        </form>
    <?php } ?>
</body>
</html>