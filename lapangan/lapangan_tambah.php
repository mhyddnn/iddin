<?php
//require functions.php
require 'functions.php';
//jika btnSIMPAN ditekan maka akan menjalankan syntak dibawahnya
if(isset($_POST["btnSIMPAN"])) {
//jika function hapus mengembalikan nilai lebih dari 0 maka akan menjalankan syantak dibawahya
  if(tambah($_POST) > 0)
  {
    echo "<script>alert('Simpan Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=lapangan_tampil'>";
  }else{
    echo "<script>alert('Simpan Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=lapangan_tampil'>";
  }
}
?>
<form action="" method="post" enctype="multipart/form-data">
  <center><h2>TAMBAH DATA LAPANGAN</h2></center>
  <form>
    <div class="form-group">
      <label for="txtFotoLapangan">Foto Lapangan</label>
      <input type="file" class="form-control-file" name="txtFotoLapangan" id="txtFotoLapangan">
    </div>
    <div class="form-group">
      <label for="txtNamaLapangan">Nama Lapangan</label>
      <input type="text" class="form-control" placeholder="Masukkan Nama Lapangan" name="txtNamaLapangan" id="txtNamaLapangan" required="">
    </div>
    <div class="form-group">
      <label for="txtWaktu">Waktu</label>
      <input type="number" class="form-control" placeholder="Masukkan Waktu / Jam" name="txtWaktu" id="txtWaktu" required="">
    </div> 
    <div class="form-group">
      <label for="txtHarga">Harga</label>
      <input type="number" class="form-control" placeholder="Masukkan Harga" name="txtHarga" id="txtHarga" required="">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="btnSIMPAN">SIMPAN</button>
      <a href="?halaman=lapangan_tampil" class="btn btn-dark btn-sm">BATAL</a>
    </div>
</form>