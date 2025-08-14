<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sig";

$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk mengambil jumlah penduduk
$queryAirHaji = "SELECT COUNT(*) as jumlah FROM penduduk_air_haji";
$queryAirHajiBarat = "SELECT COUNT(*) as jumlah FROM penduduk_air_haji_barat";
$queryAirHajiTengah = "SELECT COUNT(*) as jumlah FROM penduduk_air_haji_tengah";
$queryAirHajiTenggara = "SELECT COUNT(*) as jumlah FROM penduduk_air_haji_tenggara";
$queryPasarLamaMuaraAirHaji = "SELECT COUNT(*) as jumlah FROM penduduk_pasar_lama";
$queryMuaraGadangAirHaji = "SELECT COUNT(*) as jumlah FROM penduduk_muara_gadang";
$queryPasarBukitAirHaji = "SELECT COUNT(*) as jumlah FROM penduduk_pasar_bukit";
$querySeiSirahAirHaji = "SELECT COUNT(*) as jumlah FROM penduduk_sungai_sirah";
$queryRantauSimalenangAirHaji = "SELECT COUNT(*) as jumlah FROM penduduk_rantau_simalenang";
$queryPunggasan = "SELECT COUNT(*) as jumlah FROM penduduk_punggasan";
$queryPungasanTimur = "SELECT COUNT(*) as jumlah FROM penduduk_pungasan_timur";
$queryPunggasanUtara = "SELECT COUNT(*) as jumlah FROM penduduk_punggasan_utara";
$queryPadangXI = "SELECT COUNT(*) as jumlah FROM penduduk_padang_xi";
$queryMuaraKandisPunggasan = "SELECT COUNT(*) as jumlah FROM penduduk_muara_kandis";
$queryLaganHilirPunggasan = "SELECT COUNT(*) as jumlah FROM penduduk_lagan_hilir";
$queryLaganMudikPunggasan = "SELECT COUNT(*) as jumlah FROM penduduk_lagan_mudik";

// Eksekusi query dan ambil hasilnya
$resultAirHaji = $conn->query($queryAirHaji);
$resultAirHajiBarat = $conn->query($queryAirHajiBarat);
$resultAirHajiTengah = $conn->query($queryAirHajiTengah);
$resultAirHajiTenggara = $conn->query($queryAirHajiTenggara);
$resultPasarLamaMuaraAirHaji = $conn->query($queryPasarLamaMuaraAirHaji);
$resultMuaraGadangAirHaji = $conn->query($queryMuaraGadangAirHaji);
$resultPasarBukitAirHaji = $conn->query($queryPasarBukitAirHaji);
$resultSeiSirahAirHaji = $conn->query($querySeiSirahAirHaji);
$resultRantauSimalenangAirHaji = $conn->query($queryRantauSimalenangAirHaji);
$resultPunggasan = $conn->query($queryPunggasan);
$resultPungasanTimur = $conn->query($queryPungasanTimur);
$resultPunggasanUtara = $conn->query($queryPunggasanUtara);
$resultPadangXI = $conn->query($queryPadangXI);
$resultMuaraKandisPunggasan = $conn->query($queryMuaraKandisPunggasan);
$resultLaganHilirPunggasan = $conn->query($queryLaganHilirPunggasan);
$resultLaganMudikPunggasan = $conn->query($queryLaganMudikPunggasan);

$jumlahPendudukAirHaji = $resultAirHaji->fetch_assoc()['jumlah'];
$jumlahPendudukAirHajiBarat = $resultAirHajiBarat->fetch_assoc()['jumlah'];
$jumlahPendudukAirHajiTengah = $resultAirHajiTengah->fetch_assoc()['jumlah'];
$jumlahPendudukAirHajiTenggara = $resultAirHajiTenggara->fetch_assoc()['jumlah'];
$jumlahPendudukPasarLamaMuaraAirHaji = $resultPasarLamaMuaraAirHaji->fetch_assoc()['jumlah'];
$jumlahPendudukMuaraGadangAirHaji = $resultMuaraGadangAirHaji->fetch_assoc()['jumlah'];
$jumlahPendudukPasarBukitAirHaji = $resultPasarBukitAirHaji->fetch_assoc()['jumlah'];
$jumlahPendudukSeiSirahAirHaji = $resultSeiSirahAirHaji->fetch_assoc()['jumlah'];
$jumlahPendudukRantauSimalenangAirHaji = $resultRantauSimalenangAirHaji->fetch_assoc()['jumlah'];
$jumlahPendudukPunggasan = $resultPunggasan->fetch_assoc()['jumlah'];
$jumlahPendudukPungasanTimur = $resultPungasanTimur->fetch_assoc()['jumlah'];
$jumlahPendudukPunggasanUtara = $resultPunggasanUtara->fetch_assoc()['jumlah'];
$jumlahPendudukPadangXI = $resultPadangXI->fetch_assoc()['jumlah'];
$jumlahPendudukMuaraKandisPunggasan = $resultMuaraKandisPunggasan->fetch_assoc()['jumlah'];
$jumlahPendudukLaganHilirPunggasan = $resultLaganHilirPunggasan->fetch_assoc()['jumlah'];
$jumlahPendudukLaganMudikPunggasan = $resultLaganMudikPunggasan->fetch_assoc()['jumlah'];

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Petugas - Data Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="petugas.css">
</head>
<body>
    <?php include('header.php'); ?>
  
  <div id="map"></div>

  
  <div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard Petugas</h1>
            <div class="row">
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Air Haji</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Air Haji.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukAirHaji; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_air_haji.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Air Haji Barat</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Air Haji Barat.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukAirHajiBarat; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_airhaji_barat.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Air Haji Tengah</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Air Haji Tengah.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukAirHajiTengah; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_air_haji_tengah.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Air Haji Tenggara</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Air Haji Tenggara.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukAirHajiTenggara; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_air_haji_tenggara.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Pasar Lama Muara Air Haji</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Pasar Lama Muara Air Haji.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukPasarLamaMuaraAirHaji; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_pasar_lama_muara_air_haji.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-secondary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Muara Gadang Air Haji</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Muara Gadang Air Haji.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukMuaraGadangAirHaji; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_muara_gadang_air_haji.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-dark h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Pasar Bukit Air Haji</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Pasar Bukit Air Haji.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukPasarBukitAirHaji; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_pasar_bukit_air_haji.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-primary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Sei Sirah Air Haji</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Sei Sirah Air Haji.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukSeiSirahAirHaji; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_sei_sirah_air_haji.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-success h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Rantau Simalenang Air Haji</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Rantau Simalenang Air Haji.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukRantauSimalenangAirHaji; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_rantau_simalenang_air_haji.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-info h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Punggasan</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Punggasan.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukPunggasan; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_punggasan.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-danger h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Punggasan Timur</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Punggasan Timur.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukPungasanTimur; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_punggasan_timur.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-warning h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Punggasan Utara</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Punggasan Utara.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukPunggasanUtara; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_punggasan_utara.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-secondary h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Padang XI</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Padang XI.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukPadangXI; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_padang_xi.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 mb-4">
                    <div class="card text-white bg-dark h-100">
                        <div class="card-body">
                            <h5 class="card-title">Data Penduduk Muara Kandis Punggasan</h5>
                            <p class="card-text">Kelola data penduduk untuk nagari Muara Kandis Punggasan.</p>
                            <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukMuaraKandisPunggasan; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a href="status_penduduk_muara_kandis_punggasan.php" class="btn btn-light">Lihat Data</a>
                            <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 mb-4">
                        <div class="card text-white bg-primary h-100">
                        <div class="card-body">
                        <h5 class="card-title">Data Penduduk Lagan Hilir Punggasan</h5>
                        <p class="card-text">Kelola data penduduk untuk nagari Lagan Hilir Punggasan.</p>
                        <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukLaganHilirPunggasan; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="status_penduduk_lagan_hilir_punggasan.php" class="btn btn-light">Lihat Data</a>
                        <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                        </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 mb-4">
                        <div class="card text-white bg-success h-100">
                        <div class="card-body">
                        <h5 class="card-title">Data Penduduk Lagan Mudik Punggasan</h5>
                        <p class="card-text">Kelola data penduduk untuk nagari Lagan Mudik Punggasan.</p>
                        <p class="card-text">Jumlah Penduduk: <?php echo $jumlahPendudukLaganMudikPunggasan; ?></p>
                        </div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                        <a href="status_penduduk_lagan_mudik_punggasan.php" class="btn btn-light">Lihat Data</a>
                        <div class="small"><i class="fa-solid fa-users"></i></div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </div>
                        </main>
            <footer class="py-4 mt-auto bg-dark">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; Marten Shandra 2024</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot; <a href="#">Terms & Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script></body>

</html>
