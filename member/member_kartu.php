<?php
//require functions.php
require 'functions.php';
//jika btnCETAK ditekan maka akan menjalankan syntak dibawahnya
if(isset($_POST["btnCETAK"])) {
//jika function tambah_member mengembalikan nilai lebih dari 0 maka akan menjalankan syantak dibawahya
  if(tambah_member($_POST) > 0)
  {
    echo "<script>alert('Simpan Berhasil, dan kartu akan dicetak')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=member_cetak'>";
  }else{
    echo "<script>alert('Simpan Gagal, dan kartu gagal dicetak')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=lapangan_beranda'>";
  }
}
?>
<form action="" method="post" enctype="multipart/form-data">
  <center><h2>TAMBAH MEMBER DAN CETAK KARTU</h2></center>
  <form>
    <div class="form-group">
      <label for="txtNama">Nama member </label>
      <input type="text" class="form-control" placeholder="Masukkan nama member" name="txtNama" id="txtNama" required="">
    </div>
    <div class="form-group">
      <label for="txtAlamat">Alamat</label>
      <input type="text-area" class="form-control" placeholder="Masukkan alamat member" name="txtAlamat" id="txtAlamat" required="">
    </div> 
    <div class="form-group">
      <label for="txtNo">No hp / WhatsApp</label>
      <input type="number" class="form-control" placeholder="Masukkan no hp / whatsapp" name="txtNo" id="txtNo" required="">
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="btnCETAK">SIMPAN dan CETAK</button>
      <a href="?halaman=beranda" class="btn btn-dark btn-sm">BATAL</a>
    </div>
</form>