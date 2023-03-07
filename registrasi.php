<?php 
require 'functions.php';

if( isset($_POST["register"]) ) {
	if(registrasi($_POST) > 0 ) {
		echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
	} else {
		echo mysqli_error($conn);
	}

}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Halaman Registrasi</title>
	<link rel="stylesheet" href="css/regis.css"
</head>
<body class="body">

<h1 class="h1">Halaman Registrasi</h1>

<form action="" method="post" class="form">
<p class="p">silakan Registrasi</p>
	<div class="kotak_register">
	<ul class="ul">
		<li>
			<label for="username" class="label">username :</label>
			<input type="text" name="username" id="username" class="input">
		</li>
		<li>
			<label for="password" class="label">password :</label>
			<input type="password" name="password" id="password" class="input">
		</li>
		<li>
			<label for="password2" class="label">konfirmasi password :</label>
			<input type="password" name="password2" id="password2" class="input">
		</li>
		<li>
			<button type="submit" name="register" class="button">Register!</button>
		</li>
		<li>
			<a href="login.php"> <div class="back">Back</div> </a>
	</li>
	</ul>
	</div>
</form>

</body>
</html>



