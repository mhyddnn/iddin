<?php
//menggunakan session
session_start();
/*jika session login sudah dibuat
maka akan diarahkan ke index.php*/
if(isset($_SESSION["login"])) {
  header("Location: index.php");
  exit;
}
//require functions.php
require 'functions.php';
//jika login ditekan maka akan menjalankan syntak dibawahnya
if(isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
//mengambil data berdasarkan username yang dimasukkan user
    $result = mysqli_query($konek, "SELECT * FROM tb_user WHERE username = '$username' ");
// cek username
    if(mysqli_num_rows($result) === 1) {
// cek password
        $row = mysqli_fetch_assoc($result);
        if (
            password_verify($password, $row["password"])) {
              //set session
              $_SESSION["login"] = true;
              header("Location: index.php");
              exit;
            }
    }
//jika tidak masuk akan dihasilkan nilai true pada variabel error
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - Angkasa stadium</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Masuk <br><hr> Angkasa stadium</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
<!-- variabel error akan berjalan dan menghentikan program -->
        <?php if(isset($error)) : ?>
            <p style="color: red; font-style: italic">username / password anda salah</p>
        <?php endif; ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="login">Masuk</button>
        </div>      
    </form>
    <p class="text-center">Belum memiliki akun?<a href="registrasi.php"> Daftar</a></p>
</div>
<!-- Bootstrap core JavaScript -->
 <script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ./ -->
</body>
</html>