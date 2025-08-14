<?php
include 'koneksi.php';

$id = $_POST['id'];
$tabel = $_POST['tabel'];

$query = "SELECT * FROM $tabel WHERE id = $id";
$result = $db->query($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo "<h5>ID: {$row['id']}</h5>";
    echo "<p>No KK: {$row['nomor_kk']}</p>";
    echo "<p>Kepala Keluarga: {$row['kepala_keluarga']}</p>";
    echo "<p>Jumlah Anggota Keluarga: {$row['jumlah_anggota']}</p>";
    echo "<p>Nik: {$row['nik']}</p>";
    echo "<p>Jenis Kelamin: {$row['jenis_kelamin']}</p>";
    echo "<p>Alamat: {$row['alamat']}</p>";
    echo "<p>Kampung: {$row['kampung']}</p>";
    echo "<p>RT: {$row['rt']}</p>";
    echo "<p>RW: {$row['rw']}</p>";
    echo "<p>Tanggal Terdaftar: {$row['tanggal_terdaftar']}</p>";
    echo "<p>Latitude: {$row['lat']}</p>";
    echo "<p>Longitude: {$row['lng']}</p>";


} else {
    echo "<p>Data tidak ditemukan.</p>";
}

$db->close();
?>
