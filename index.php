<?php
//menggunakan session
session_start();
/*jika session login belum dibuat
maka akan diarahkan ke login.php*/
if(!isset($_SESSION["login"])){
  header("Location: login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Angkasa - Futsal stadium</title>

<!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
  <link href="css/simple-sidebar.css" rel="stylesheet">
</head>
<body>
  <div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="sidebar bg-light border-right" id="sidebar-wrapper">
    <div class="sidebar-heading"><a href="index.php"><small><b>Angkasa</b> - Futsal stadium</a></div></small>
      <div class="list-group list-group-flush-secondary">
        <a href="?halaman=beranda" class="list-group-item list-group-item-action bg-light">🏠 Beranda</a>
        <a href="?halaman=lapangan_tampil" class="list-group-item list-group-item-action bg-light">🗂 Data Lapangan</a>
        <a href="?halaman=sewa_tambah" class="list-group-item list-group-item-action bg-light">📝 Data Sewa</a>
        <a href="?halaman=pembayaran_tampil" class="list-group-item list-group-item-action bg-light">💵 Data Pembayaran</a>
        <a href="?halaman=laporan_cetak" class="list-group-item list-group-item-action bg-light">🖨 Laporan Sewa</a>
        <a href="?halaman=member_kartu" class="list-group-item list-group-item-action bg-light">💳 Kartu Member</a>
      </div>
      <br>
      <center><a href="logout.php" class="btn btn-danger">👨‍💻 <b>Keluar</b></a></center>
    </div>
<!-- /#sidebar-wrapper -->
<!-- Page Content -->
    <div class="container">
      <div id="page-content-wrapper">
        <nav class="navbar-lg navbar-light bg-light border-bottom mt-2">
          <button class="btnmenu btn btn-secondary mb-2" id="menu-toggle"> Menu 📄</button>
        </nav>
          <?php
          if(isset($_GET['halaman'])){
            $hal = $_GET['halaman'];
            switch ($hal) {
              case 'beranda': // jika memanggil halaman=beranda maka..
                include "lapangan_beranda.php"; // menampilkan halaman file beranda.php
              break;
              case 'lapangan_tampil':
                include "lapangan/lapangan_tampil.php";
              break;
              case 'lapangan_tambah':
                include "lapangan/lapangan_tambah.php";
              break;
              case 'lapangan_ubah':
                include "lapangan/lapangan_ubah.php";
              break;
              case 'lapangan_hapus':
                include "lapangan/lapangan_hapus.php";
              break;
              case 'sewa_tambah':
                include "sewa/sewa_tambah.php";
              break;
              case 'pembayaran_tampil';
                include "pembayaran/pembayaran_tampil.php";
              break;
              case 'pembayaran_cetak';
                  include "pembayaran/pembayaran_cetak.php";
              break;
              case 'pembayaran_ubah';
                  include "pembayaran/pembayaran_ubah.php";
              break;
              case 'pembayaran_hapus';
                  include "pembayaran/pembayaran_hapus.php";
              break;
              case 'laporan_cetak';
                  include "laporan/laporan_cetak.php";
              break;
              case 'member_kartu';
                  include "member/member_kartu.php";
              break;
              case 'member_cetak';
                  include "member/member_cetak.php";
              break;
              default:
              echo "<center><h3> ERROR ! </h3></center>";
              break;
            }
          }else{ //jika tidak memanggil halaman apapun maka
            include "lapangan_beranda.php";
          }
          ?>
          <div class="row footer">
            <div class="col text-center">
            <p>  Universitas Muria Kudus 💙 <i>Sistem Informasi</i>
            <br>
            2020 - Ahmad Muhyiddin 201853004</p>
            </div>
          </div>
      </div>
    </div>
<!-- /#page-content-wrapper -->
  </div>
<!-- /#wrapper -->
<!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Date Picker jQuery UI -->
  <link rel="stylesheet" href="vendor/jquery/jquery-ui.css">
  <script src="vendor/jquery/jquery-1.12.4.js"></script>
  <script src="vendor/jquery/jquery-ui.js"></script>
  <script>
// Menu Toggle Script
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
// date picker
    $( function() {
    $( "#txtTanggalSewa" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );
// isian otomastis nama lapangan, harga setelah lapangan dipilih
    $("#txtLapangan").on("change", function(){
// ambil nilai
      var lapangan = $("#txtLapangan option:selected").attr("lapangan");
      var harga = $("#txtLapangan option:selected").attr("harga");
//pindahkan nilai ke input
      $("#txtNamaLapangan").val(lapangan);
      $("#txtHargaSewa").val(harga);
    });
// total bayar
    $("#txtDurasiSewa").keyup(function(){
        var harga = $("#txtHargaSewa").val();
        var durasi = $("#txtDurasiSewa").val();

        $("#txtUangTotal").val(durasi * harga);
    });
// uang kembalian
    $("#txtUangBayar").keyup(function(){
        var total = $("#txtUangTotal").val();
        var bayar = $("#txtUangBayar").val();

        $("#txtUangKembalian").val(bayar - total);
    });
  </script>
</body>
</html>
