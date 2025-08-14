<?php
include 'koneksi.php';
$id_lokasi = $_GET['id_lokasi'];
$datas = mysqli_query($db, "delete from lokasi where id_lokasi ='$id_lokasi'") or die(mysqli_error($koneksi));
echo "<script>alert('data berhasil dihapus.');window.location='status_nagari.php';</script>";
