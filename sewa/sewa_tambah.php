<?php
//require functions.php
require 'functions.php';
if(isset($_POST["btnSEWA"])) {
//jika function tambah_sewa mengembalikan nilai lebih dari 0 maka akan menjalankan script dibawahya
  if(tambah_sewa($_POST) > 0)
  {
    echo "<script>alert('Sewa Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembayaran_tampil'>";
  }else{
    echo "<script>alert('Sewa Gagal Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=lapangan_beranda'>";
  }
}
?>
<center><h2>TAMBAH DATA SEWA</h2></center>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label for="txtNamaTim">Nama Tim</label>
      <input type="text" class="form-control" placeholder="Masukkan nama tim" name="txtNamaTim" id="txtNamaTim" required="">
    </div>
    <div class="form-group">
      <label for="txtTanggalSewa">Tanggal Sewa</label>
      <input class="form-control" name="txtTanggalSewa" id="txtTanggalSewa" required="">
    </div>
    <div class="form-group">
      <label for="txtWaktuSewa">Jam Sewa</label>
      <input class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');echo date("H:I:s");?>" name="txtWaktuSewa" id="txtWaktuSewa" required="">
    </div>
    <div class="lapangan">
<!-- dropdown -->
      <div class="form-group">
        <label for="txtLapangan" class="control-label">Lapangan</label>
        <select class="form-control" id="txtLapangan" name="txtLapangan" required>
          <option value="" disable>--- pilih lapangan ---</option>
<!-- menampilkan nama_lapangan dari tb_lapangan -->
          <?php 
          $lapangan = mysqli_query($konek, "SELECT * FROM tb_lapangan");
          while($data = mysqli_fetch_array($lapangan)){
            echo '<option lapangan ="'.$data['nama_lapangan'].'"
            harga ="'.$data['harga'].'">
            '.$data['nama_lapangan'].'
            </option>';
          }
          ?>
        </select>
      </div>
    <div class="form-group">
      <label for="txtDurasiSewa">Durasi</label>
      <input type="number" class="form-control" placeholder="Masukkan durasi sewa" name="txtDurasiSewa" id="txtDurasiSewa" required="">
    </div>
    <div class="form-row">
      <div class="form-group col-md-4">
        <label for="txtNamaLapangan">Nama Lapangan</label>
        <input type="text" class="form-control" name="txtNamaLapangan" id="txtNamaLapangan" readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="txtHargaSewa">Harga Sewa</label>
        <input type="number" class="form-control" name="txtHargaSewa" id="txtHargaSewa" readonly>
      </div>
      <div class="form-group col-md-4">
        <label for="txtUangTotal">Total</label>
        <input type="number" class="form-control" name="txtUangTotal" id="txtUangTotal" readonly>
    </div>
    </div>
    <div class="form-row">
      <div class="form-group col-md-6">
        <label for="txtUangBayar">Uang Bayar</label>
        <input type="number" class="form-control" name="txtUangBayar" id="txtUangBayar" required="" placeholder="Masukkan uang pelanggan">
      </div>
      <div class="form-group col-md-6">
        <label for="txtUangKembalian">Uang Kembalian</label>
        <input type="number" class="form-control" name="txtUangKembalian" id="txtUangKembalian" required="" readonly="">
      </div>
    </div>
</form>
<!-- untuk botol sewa dan tombol batal -->
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="btnSEWA">SEWA</button>
      <a href="?halaman=beranda" class="btn btn-dark btn-sm">BATAL</a>
    </div>