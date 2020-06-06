<?php
//require functions.php
require 'functions.php';
$lapangan = query("SELECT * FROM tb_lapangan");
/*jika btnCARI di tekan maka
akan menjalankan function cari_lapangan
yang akan menampilkan data sesuai keyword*/
if(isset($_POST["btnCARI"])) {
  $lapangan = cari_lapangan($_POST["txtKeyword"]);
}
?>
<center>
<h2>DATA LAPANGAN</h2>
<!-- link ke lapangan_tambah -->
<a href="?halaman=lapangan_tambah" class="btn btn-primary btn-sm">Tambah Data</a>
</center>
<br>
<!-- form pencarian -->
<form class="form-inline my-2 my-lg-0 row-reverse" method="post">
  <div class="form-group mx-sm-3 mb-2" >
    <input type="text" class="form-control" id="cari" name="txtKeyword" placeholder="Cari data lapangan" autofocus autocomplete="off">
  </div>
  <button type="submit" name="btnCARI" class="btn bg-success text-white mb-2">Cari</button>
</form>
<table class="table table-hover">
  <thead>
    <tr>
    <th>NO</th>
    <th>FOTO</th>
    <th>NAMA LAPANGAN</th>
    <th>WAKTU / JAM</th>
    <th>HARGA</th>
    <th>AKSI</th>
    </tr>
  </thead>
<tbody>
  <tr>
  <?php $i = 1; ?>
<!-- melakukan perulangan data sesuai jumlah data yang ada didatabase -->
  <?php foreach( $lapangan as $row) : ?>
    <td><?= $i; ?></td>
    <td><img src="img/imgserver/<?=$row['foto'];?>"width="100px"></td>
    <td><?=$row['nama_lapangan'];?></td>
    <td><?=$row['waktu'];?></td>
    <td>RP. <?='number_format'($row['harga']);?></td>
<!-- untuk tombol ubah dan tombol hapus -->
    <td>
    <a href="?halaman=lapangan_ubah&id=<?=$row['id'];?>" class="btn btn-warning btn-sm">Ubah</a>
    <a href="?halaman=lapangan_hapus&id=<?=$row['id'];?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" class="btn btn-danger btn-sm">Hapus</a>
    </td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
</tbody>
</table>