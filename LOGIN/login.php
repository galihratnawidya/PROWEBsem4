<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['is_login'])){
			if($_SESSION['is_login']==0){
				echo "<h2>Login Gagal</h2>";
			}
		}
	?>
	<form method="post" action="login_proses.php">
		<h3>Masukkan username dan password</h3>
		Username <input type="text" name="username">
		<br>Password <input type="password" name="password">
		<br><input type="submit" name="login" value="LOGIN">
	</form>
</body>
</html>