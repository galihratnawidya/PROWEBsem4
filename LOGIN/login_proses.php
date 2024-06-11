<?php
session_start();
include 'class_db.php';
$db = new database();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM login
		WHERE username='$username' 
		AND password=MD5('$password')";

if($db->jumrec($sql)==1){
	echo "Login Berhasil";
	$dat = $db->datasql($sql);
	$nama = $dat['nama'];
	$_SESSION['ses_username'] = $username;
	$_SESSION['ses_nama'] = $nama;
	header("Location: home.php");
}
else{
	echo "Login Gagal";
	$_SESSION['is_login'] = 0;
	header("Location: login.php");
}
?>