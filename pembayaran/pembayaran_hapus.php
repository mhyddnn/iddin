<?php
//require functions.php
require 'functions.php';
// mengambil id dari id yang dipilih
$id_sewa = $_GET["id_sewa"];
//jika function hapus_sewa mengembalikan nilai lebih dari 0 maka akan menjalankan syantak dibawahya
  if(hapus_sewa($id_sewa) > 0) {
    echo "<script>alert('Hapus Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembayaran_tampil'>";
  }else{
    echo "<script>alert('Hapus Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembayaran_tampil'>";
  }
?>