<!DOCTYPE html>
<html>
<head>
	<title>CRUD Firebase PHP</title>
</head>

<body>
	<?php
		require_once __DIR__ . "/../src/firebaseLib.php";
		require_once __DIR__ . "/../src/firebaseInterface.php";
		const DEFAULT_URL = 'https://test-62fd1.firebaseio.com';
		const DEFAULT_TOKEN = 'AiLBa2GEKuTT0GE4hAYoLkoaqyeOb1bVIPeAhZQX';
		const DEFAULT_PATH = '/';

		$firebase = new \Firebase\FirebaseLib(DEFAULT_URL, DEFAULT_TOKEN);

		if(isset($_POST['send'])){
			$a = $_POST['user'];
			$firebase->set(DEFAULT_PATH . '/username', $a);
		}

		if(isset($_GET['hapus'])){
			$firebase->delete(DEFAULT_PATH . '/username');
		}

		if(isset($_GET['update'])){
			$d = $_GET['update'];
			$firebase->set(DEFAULT_PATH . '/username', $d);
		}

		$valun = $firebase->get(DEFAULT_PATH . '/username');
	?>

	<form method="post" action="coba.php">
		<label>Username : </label>
		<input type="text" name="user">
		<input type="submit" value="Kirim" name="send">
	</form>

	<form method="get" action="coba.php">
		<input type="text" name="update">
		<input type="submit" name="upd" value="update">
		<br>
		<input type="submit" name="hapus" value="hapus">
	</form>

	<table border="1px"><?php echo "<tr><th>username</th></tr><tr><td>".$valun."</td></tr>";?></table>
</body>
</html>
