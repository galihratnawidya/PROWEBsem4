mhs_proc.php
<?php
include './class_db.php';

$db = new database();

if (isset($_POST['submit_tambah'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi_id = $_POST['prodi_id'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (npm, nama, alamat, prodi_id) VALUES ('$npm','$nama','$alamat','$prodi_id')";
    if (!$db->sqlquery($sql)) {
        die('insert data gagal' . $sql);
    } else {
        header("location: mhs.php");
        exit();
    }
}

if (isset($_POST['submit_ubah'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $prodi_id = $_POST['prodi_id'];
    $alamat = $_POST['alamat'];

    $npm_old = $_POST['npm_old'];

    $sql  = "UPDATE mahasiswa SET npm='$npm', nama='$nama', alamat='$alamat', prodi_id='$prodi_id' WHERE npm='$npm_old'";
    if (!$db->sqlquery($sql)) {
        die('Update Gagal' . $sql);
    } else {
        header("location: mhs.php");
        exit();
    }
}

if (isset($_POST['submit_hapus'])) {
    $npm_old = $_POST['npm_old'];

    $sql = "DELETE FROM mahasiswa WHERE npm='$npm_old'";
    if (!$db->sqlquery($sql)) {
        die('Delete Gagal' . $sql);
    } else {
        header("location: mhs.php");
        exit();
    }
}