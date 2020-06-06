<?php
//require functions.php
require 'functions.php';
// mengambil id_sewa dari id_sewa yang dipilih
$id_sewa = $_GET['id_sewa'];
/*query berdasarkan id_sewa
dengan dimulai dari index ke nol
*/
$pembayaran = query("SELECT * FROM tb_sewa WHERE id_sewa = $id_sewa")[0];
if(isset($_POST["btnUBAH"])) {
//jika function ubah mengembalikan nilai lebih dari 0 maka akan menjalankan script dibawahya
  if(ubah_pembayaran($_POST) > 0)
  {
    echo "<script>alert('Ubah Berhasil')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembayaran_tampil'>";
  }else{
    echo "<script>alert('Ubah Gagal')</script>";
    echo "<meta http-equiv='refresh' content='0;url=index.php?halaman=pembayaran_tampil'>";
  }
}
?>
<form action="" method="post" enctype="multipart/form-data" role="form">
  <center><h2>UBAH DATA PEMBAYARAN</h2></center>
<!-- sewa -->
<!-- mengambil id_sewa dengan type hidden untuk tidak dilihat oleh user -->
    <input type="hidden" name="id_sewa" value="<?=$pembayaran["id_sewa"];?>">
    <div class="form-group">
      <label for="txtNamaTim">Nama Tim :</label>
      <input type="text" class="form-control" placeholder="Masukkan Nama Tim" name="txtNamaTim" id="txtNamaTim" required="" value="<?=$pembayaran["nama_tim"];?>">
    </div>
    <div class="form-group">
      <label for="txtTanggalSewa">Tanggal Sewa :</label>
      <input class="form-control" name="txtTanggalSewa" id="txtTanggalSewa" required="" value="">
    </div>
    <div class="form-group">
      <label for="txtWaktuSewa">Jam Sewa :</label>
      <input class="form-control" value="<?php date_default_timezone_set('Asia/Jakarta');echo date("H:I:s");?>" name="txtWaktuSewa" id="txtWaktuSewa" required="" value="<?=$pembayaran["jam_sewa"];?>">
    </div>
<!--dropdown  -->
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
      <label for="txtDurasiSewa">Durasi :</label>
      <input type="number" class="form-control" placeholder="Masukkan durasi sewa" name="txtDurasiSewa" id="txtDurasiSewa" required="" value="<?=$pembayaran["durasi"];?>">
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
<!-- untuk tombol ubah dan tombol batal -->
    <div class="form-group">
      <button type="submit" class="btn btn-success btn-sm" name="btnUBAH">UBAH</button>
      <a href="?halaman=pembayaran_tampil" class="btn btn-dark btn-sm">BATAL</a>
    </div>
</form>