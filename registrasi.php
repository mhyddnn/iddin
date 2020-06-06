<?php
//require functions.php
require 'functions.php';
//jika register ditekan maka akan menjalankan syntak dibawahnya
if(isset($_POST["register"]) ) {
//jika registrai menghasilkan nilai lebih dari 0 akan menjalankan syntax dibawahnya
    if(registrasi($_POST) > 0 ) {
        echo "<script>
        alert('user baru berhasil ditambahkan');
        </script>";
    } else {
        echo mysqli_error($konek);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar - Angkasa stadium</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-form">
    <form action="" method="post">
        <h2 class="text-center">Daftar <br><hr> Angkasa stadium</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="username" id="username" autofocus>
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Ulangi password" name="password2" id="password2">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block" name="register">Daftar</button>
        </div>      
    </form>
    <p class="text-center">Sudah memiliki akun? <a href="login.php">Masuk</a></p>
</div>
<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ./ -->
</body>
</html>