<?php
session_start();
require 'functions.php';

// cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key']) ) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  // ambil username berdasarkan id
  $result = mysqli_query($conn,"SELECT username FROM user WHERE id  = $id");
  $row = mysqli_fetch_assoc($result);

  // cek cookie dan username
  if( $key === hash('sha256', $row['username']) ) {
    $_SESSION['login'] = true;
  }
}

if( isset($_SESSION["login"]) ) {
  header("Location: index.php");
  exit;
}  

if( isset($_POST["login"]) ) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // cek username
  if( mysqli_num_rows($result) === 1) {

    // cek password
    $row = mysqli_fetch_assoc($result);
    if( password_verify($password, $row["password"]) ) {
      // set session  
      $_SESSION["login"] = true;

      // cek remember me
      if( isset($_POST['remember']) ) {
        // buat cookie
        setcookie('id', $row['id'], time()+60);
        setcookie('key',hash('sha256', $row['username']), time()+60);
      }

      header("Location: index.php");
      exit;
    }
  
  }
  $error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Halaman Login</title>
  <link rel="stylesheet" href="css/login.css">
</head>
<body class="body">

  <h1 class="h1">Halaman Login</h1>

  <form action="" method="post" class="form">
  <p class="tulisan_login">silakan login</p>
<div class="kotak_login">
    <ul class="ul">
      <li>
        <label for="username" class="label">Username :</label>
        <input type="text" name="username" id="username" class="input">
      </li>
      <li>
        <label for="password" class="label">Password :</label>
        <input type="password" name="password" id="password" class="input">
      </li>
      <br>
      <li>
        <input type="checkbox" name="remember" id="remember">
        <label for="remember" >Remember me</label>
      </li>
      <?php if( isset($error) ) : ?>
    <p class="p">username / password salah</p>
    <?php endif; ?>
      <li>
        <button type="submit" name="login" class="button">Login</button>
      </li>
      
       <a href="registrasi.php"><div class="register">Registrasi</div></a>
      
    </ul>
    </div>
  </form>
</body>
</html>