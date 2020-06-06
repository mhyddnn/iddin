<?php
//require functions.php
require 'functions.php';
// mengambil id dari id yang dipilih
$id_sewa = $_GET['id_sewa'];
/*query untuk menampikan data
berdasarkan id yang diklik oleh user
*/
$pembayaran = mysqli_query($konek,"SELECT * FROM tb_sewa WHERE id_sewa='$id_sewa'");
?>
<!-- style display none untuk agar yang dicetak hanya isi tabel  -->
<style>
@media print {
  .btnmenu {
    display: none;
  }
  .sidebar {
    display: none;
  }
  .no {
    display: none;
  }
}
</style>
<center>===== N O T A P E M B A Y A R A N =====</center>
<table class="table table-hover">
  <thead>
    <tr>
    <th>NAMA TIM</th>
    <th>NAMA LAPANGAN</th>
    <th>TANGGAL</th>
    <th>JAM</th>
    </tr>
  </thead>
<tbody>
  <tr>
  <?php $i = 1; ?>
  <?php foreach( $pembayaran as $row) : ?>
    <td class="no"><?= $i; ?></td>
    <td><?=$row['nama_tim'];?></td>
    <td><?=$row['lapangan'];?></td>
    <td><?=$row['tanggal_sewa'];?></td>
    <td><?=$row['jam_sewa'];?></td>
  </tr>
  <?php $i++; ?>
  <?php endforeach; ?>
</tbody>
</table>
<center>-------------------- LUNAS ------------------- </center>
<center>-------------------- Angkasa Futsal Stadium ------------------- </center>
<center>-------------------- Terima Kasih ------------------- </center>
<br><br><br>
<u>Pegawai Angkasa - Futsal Stadium</u>
<br>
<small class="tanggal">dicetak pada tanggal <?=date("d M Y");?></small>
<script>
window.print();
</script>