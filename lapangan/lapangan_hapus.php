<?php
//require functions.php
require 'functions.php';
$id = $_GET["id"];
//jika function hapus mengembalikan nilai lebih dari 0 maka akan menjalankan script dibawahya
  if(hapus($id) > 0) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=lapangan_tampil'>";
  }else{
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=lapangan_tampil'>";
  }
?>