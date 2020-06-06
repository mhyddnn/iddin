<?php
//menggunakan session
session_start();
//session diisi array kosong
$_SESSION = [];
//session tidak dicetak
session_unset();
//session dihapus
session_destroy();
//diarahkan ke index.php
header("Location: index.php");
?>