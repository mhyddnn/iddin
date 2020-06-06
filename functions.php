<?php
//koneksi ke database
$konek = mysqli_connect("localhost","root","","db_lapangan");
//function query
function query($query) {
  global $konek;
  $result = mysqli_query($konek, $query);
  $rows = [];
  while($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}
// function tambah
function tambah($data) {
  global $konek;
  $nama_lapangan = $data['txtNamaLapangan'];
  $waktu = $data['txtWaktu'];
  $harga = $data['txtHarga'];
// upload foto lapangan
  $foto = upload(); {
    if(!$foto) {
      return false;
    }
  }
//insert
  $query = "INSERT INTO tb_lapangan
                VALUES
                ('', '$foto','$nama_lapangan', $waktu, $harga)
                ";
  mysqli_query($konek,$query);
//mengembalikan nilai
  return mysqli_affected_rows($konek);
}
// funtion upload
function upload() {
  $namaFile = $_FILES['txtFotoLapangan']['name'];
  $ukuranFile = $_FILES['txtFotoLapangan']['size'];
  $error = $_FILES['txtFotoLapangan']['error'];
  $tmpName = $_FILES['txtFotoLapangan']['tmp_name'];
//cek apakah tidak ada gambar yang diupload
  if($error === 4) {
    echo "<script>alert('Silahkan masukkan foto lapangan')</script>";
// mengembalikan nilai false agar operasi gagal
    return false;
  }
//cek apakah yang diupload gambar atau tidak
  $ekstensiFotoValid = ['jpg','jpeg','png'];
  $ekstensiFoto = explode('.', $namaFile);
  $ekstensiFoto = strtolower(end($ekstensiFoto));

  if(!in_array($ekstensiFoto, $ekstensiFotoValid)) {
    echo "<script>alert('Yang anda upload bukan foto')</script>";
// mengembalikan nilai false agar operasi gagal
    return false;
  }
//cek jika ukurannya terlalu besar
  if($ukuranFile > 1000000) {
    echo "<script>alert('Ukuran foto terlalu besar')</script>";
// mengembalikan nilai false agar operasi gagal
    return false;
  }
//lolos pengecekan, gambar siap diupload
// generate nama foto baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiFoto;
  move_uploaded_file($tmpName, 'img/imgserver/' . $namaFileBaru);
  return $namaFileBaru;
}
// function untuk hapus data lapangan
function hapus($id){
  global $konek;
  $query = "DELETE FROM tb_lapangan WHERE id = $id";
  mysqli_query($konek, $query);
//mengembalikan nilai
  return mysqli_affected_rows($konek);
}
//function untuk ubah
function ubah($data) {
  global $konek;
  $id = $data["id"];
  $foto_lama = $data['txtFotoLapanganLama'];
  $nama_lapangan = $data['txtNamaLapangan'];
  $waktu = $data['txtWaktu'];
  $harga = $data['txtHarga'];
//cek apakah pilih gambar baru tidak
  if($_FILES['txtFotoLapangan']['error'] === 4) {
    $foto = $foto_lama;
  } else {
//pilih foto baru maka akan ke function upload 
    $foto = upload();
  }

  $query = "UPDATE tb_lapangan SET
                foto = '$foto',
                nama_lapangan = '$nama_lapangan',
                waktu = '$waktu',
                harga = '$harga'
            WHERE id =$id
                ";
  mysqli_query($konek,$query);
  return mysqli_affected_rows($konek);
}
//function tambah_sewa
function tambah_sewa($data) {
  global $konek;
  $nama_tim = $data['txtNamaTim'];
  $tanggal_sewa = $data['txtTanggalSewa'];
  $jam_sewa = $data['txtWaktuSewa'];
  $durasi_sewa = $data['txtDurasiSewa'];
  $lapangan = $data['txtNamaLapangan'];
  $harga_sewa = $data['txtHargaSewa'];
  $total_sewa = $data['txtUangTotal'];

  $query = "INSERT INTO tb_sewa
                VALUES
                ('', '$nama_tim','$tanggal_sewa', '$jam_sewa', '$durasi_sewa', '$lapangan', '$harga_sewa', '$total_sewa')
                ";
  mysqli_query($konek,$query);

  return mysqli_affected_rows($konek);
}
//function ubah_pembayaran
function ubah_pembayaran($data) {
  global $konek;
  $id_sewa = $data['id_sewa'];
  $nama_tim = $data['txtNamaTim'];
  $tanggal_sewa = $data['txtTanggalSewa'];
  $jam_sewa = $data['txtWaktuSewa'];
  $durasi_sewa = $data['txtDurasiSewa'];
  $lapangan = $data['txtNamaLapangan'];
  $harga_sewa = $data['txtHargaSewa'];
  $total_sewa = $data['txtUangTotal'];
  $query = "UPDATE tb_sewa SET
                nama_tim = '$nama_tim',
                tanggal_sewa = '$tanggal_sewa',
                jam_sewa = '$jam_sewa',
                durasi_sewa = '$durasi_sewa',
                lapangan = '$lapangan',
                harga_sewa = '$harga_sewa',
                total_sewa = '$total_sewa'
            WHERE id_sewa =$id_sewa
                ";
  mysqli_query($konek,$query);

  return mysqli_affected_rows($konek);
}

function hapus_sewa($id_sewa){
  global $konek;
  $query = "DELETE FROM tb_sewa WHERE id_sewa = $id_sewa";
  mysqli_query($konek, $query);

  return mysqli_affected_rows($konek);
}

function cari($keyword) {
  $query = "SELECT * FROM tb_sewa
              WHERE
            nama_tim LIKE '%$keyword%' OR
            lapangan LIKE '%$keyword%' OR
            total_sewa LIKE '%$keyword%' OR
            tanggal_sewa LIKE '%$keyword%'
          ";
          return query($query);
}

function cari_lapangan($keyword) {
  $query = "SELECT * FROM tb_lapangan
              WHERE
            nama_lapangan LIKE '%$keyword%' OR
            waktu LIKE '%$keyword%' OR
            harga LIKE '%$keyword%'
          ";
          return query($query);
}

function registrasi($data) {
  global $konek;
  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($konek, $data["password"]);
  $password2 = mysqli_real_escape_string($konek, $data["password2"]);
 
 // cek username sudah ada atau belum
 $result = mysqli_query($konek, "SELECT username FROM tb_user WHERE username = '$username'");
 if(mysqli_fetch_assoc($result)) {
     echo "<script>
     alert('username sudah terdaftar')
     </script>";
     return false;
 }
 
  // cek konfirmasi password
 if($password !== $password2) {
     echo "<script>
     alert('Konfirmasi password tidak sesuai')</script>";
     return false;
 }

 // enkripsi password
 $password = password_hash($password, PASSWORD_DEFAULT);

 // tambahkan userbaru ke database
 mysqli_query($konek, "INSERT INTO tb_user VALUES('', '$username', '$password')");
 return mysqli_affected_rows($konek);
}

function tambah_member($data) {
  global $konek;
  $nama_member = $data['txtNama'];
  $alamat_member = $data['txtAlamat'];
  $no_hp = $data['txtNo'];

  $query = "INSERT INTO tb_member
                VALUES
                ('', '$nama_member','$alamat_member','$no_hp')
                ";
  mysqli_query($konek,$query);

  return mysqli_affected_rows($konek);
}
?>