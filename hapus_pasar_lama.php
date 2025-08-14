<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM penduduk_pasar_lama WHERE id = $id";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.');window.location='status_penduduk_pasar_lama_air_haji.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.');window.location='index.php';</script>";
    }
}
?>

