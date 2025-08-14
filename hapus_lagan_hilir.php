<?php
include('koneksi.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM penduduk_lagan_hilir WHERE id = $id";
    $result = mysqli_query($db, $query);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.');window.location='status_penduduk_lagan_hilir_punggasan.php';</script>";
    } else {
        echo "<script>alert('Data gagal dihapus.');window.location='index.php';</script>";
    }
}
?>

