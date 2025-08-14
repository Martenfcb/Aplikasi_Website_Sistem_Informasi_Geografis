<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM penduduk_sungai_sirah WHERE id = $id";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.');window.location='status_penduduk_sei_sirah_air_haji.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.');window.location='index.php';</script>";
    }
}
?>

