<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Selamat Datang</h1>
	<?php
		session_start();
		echo 'username: '.$_SESSION['ses_username'];
		echo '<br>Nama: '.$_SESSION['ses_nama'];

		include 'class_db.php';
		$db = new database();
		$sql = "SELECT MHS.*, PR.nama as pr_nama
				FROM mahasiswa MHS 
				JOIN prodi PR ON MHS.prodi_id=PR.id 
				ORDER BY MHS.nama";
		$data = $db->fetchdata($sql);
		$i = 0;
		foreach($data as $dat){
			$i++;
			echo '<br>'.$i.'. '.$dat['nama'].' | '.$dat['pr_nama'];
		}
	?>
	<br><br><a href="logout.php">Logout</a>
</body>
</html>