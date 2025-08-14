<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'petugas') {
    header("Location: login.php");
    exit();
}

// Mengimpor file koneksi
include 'koneksi.php';

// Menghitung total jumlah data penduduk dari semua tabel
$jumlahPenduduk = 0;
$tabel_list = [
    'penduduk_air_haji' => 'Air Haji',
    'penduduk_air_haji_barat' => 'Air Haji Barat',
    'penduduk_air_haji_tengah' => 'Air Haji Tengah',
    'penduduk_air_haji_tenggara' => 'Air Haji Tenggara',
    'penduduk_pasar_lama' => 'Pasar Lama Muara Air Haji',
    'penduduk_muara_gadang' => 'Muara Gadang Air Haji',
    'penduduk_pasar_bukit' => 'Pasar Bukit Air Haji',
    'penduduk_sungai_sirah' => 'Sei Sirah Air Haji',
    'penduduk_rantau_simalenang' => 'Rantau Simalenang Air Haji',
    'penduduk_punggasan' => 'Punggasan',
    'penduduk_pungasan_timur' => 'Pungasan Timur',
    'penduduk_punggasan_utara' => 'Punggasan Utara',
    'penduduk_padang_xi' => 'Padang XI Punggasan',
    'penduduk_muara_kandis' => 'Muara Kandis Punggasan',
    'penduduk_lagan_hilir' => 'Lagan Hilir Punggasan',
    'penduduk_lagan_mudik' => 'Lagan Mudik Punggasan'
];

// Ambil data koordinat dari tabel
$titik_data = [];
foreach ($tabel_list as $tabel => $wilayah) {
    $result = $db->query("SELECT lat, lng, kepala_keluarga FROM $tabel");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $titik_data[] = [
                'lat' => $row['lat'],
                'lng' => $row['lng'],
                'kepala_keluarga' => $row['kepala_keluarga']
            ];
        }
    }
}

// Encode data titik ke format JSON
$titik_json = json_encode($titik_data);

// Menghitung total jumlah data penduduk
foreach ($tabel_list as $tabel => $wilayah) {
    $result = $db->query("SELECT COUNT(*) AS total FROM $tabel");
    if ($result) {
        $row = $result->fetch_assoc();
        $jumlahPenduduk += $row['total'];
    }
}

// Menghitung total jumlah pengguna
$resultPengguna = $db->query("SELECT COUNT(*) AS total FROM users");
$rowPengguna = $resultPengguna->fetch_assoc();
$jumlahPengguna = $rowPengguna['total'];

// Tutup koneksi
$db->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Petugas Dashboard - GIS Penduduk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/petugasss.css">
</head>
<body>
<div id="sidebar" class="d-flex flex-column">
    <h4 class="text-center py-3">Petugas Dashboard</h4>
    <nav class="nav flex-column px-3">
        <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="#dashboard">Dashboard</a>
        <a class="nav-link" href="#data-penduduk">Melihat Data Penduduk</a>
        <a class="nav-link" href="logout.php">Logout</a>
    </nav>
</div>

<div id="content">
    <h1 id="dashboard">Dashboard</h1>
    <p>Selamat datang di dashboard admin. Di sini Anda dapat mengelola data penduduk dan pengguna.</p> <br><br>
    <div class="container">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card bg-light h-100">
                <div class="card-body">
                    <h5 class="card-title">Total Data Penduduk</h5>
                    <p class="card-text"><?php echo $jumlahPenduduk; ?> Orang</p>
                    <a href="print_report.php" class="btn btn-success">Cetak Laporan</a>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="mapid" style="height: 500px; width: 100%; margin-top: 20px;"></div>

    <h2 id="data-penduduk">Data Penduduk</h2>
    <div class="container">
        <form class="filter-form" method="get" action="">
            <div class="form-row">
                <div class="col">
                    <select name="wilayah" class="form-control mb-3">
                        <option value="">Pilih Wilayah</option>
                        <option value="Air Haji">Air Haji</option>
                        <option value="Air Haji Barat">Air Haji Barat</option>
                        <option value="Air Haji Tengah">Air Haji Tengah</option>
                        <option value="Air Haji Tenggara">Air Haji Tenggara</option>
                        <option value="Pasar Lama Muara Air Haji">Pasar Lama Muara Air Haji</option>
                        <option value="Muara Gadang Air Haji">Muara Gadang Air Haji</option>
                        <option value="Pasar Bukit Air Haji">Pasar Bukit Air Haji</option>
                        <option value="Sei Sirah Air Haji">Sei Sirah Air Haji</option>
                        <option value="Rantau Simalenang Air Haji">Rantau Simalenang Air Haji</option>
                        <option value="Punggasan">Punggasan</option>
                        <option value="Punggasan Timur">Punggasan Timur</option>
                        <option value="Punggasan Utara">Punggasan Utara</option>
                        <option value="Padang XI Punggasan">Padang XI Punggasan</option>
                        <option value="Muara Kandis Punggasan">Muara Kandis Punggasan</option>
                        <option value="Lagan Hilir Punggasan">Lagan Hilir Punggasan</option>
                        <option value="Lagan Mudik Punggasan">Lagan Mudik Punggasan</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" name="nama" class="form-control mb-3" placeholder="Cari Nama">
                </div>
                <div class="col">
                    <button type="submit" class="btn btn-primary mb-3">Filter</button>
                </div>
            </div>
        </form>

        

        <div class="table-wrapper">
            <?php
            // Mengimpor file koneksi
            include 'koneksi.php';

            // Ambil data dari query filter jika ada
            $wilayah_filter = isset($_GET['wilayah']) ? mysqli_real_escape_string($db, $_GET['wilayah']) : '';
            $nama_filter = isset($_GET['nama']) ? mysqli_real_escape_string($db, $_GET['nama']) : '';

            // Query untuk mengambil data dari semua tabel penduduk
            $sql = "";
            foreach ($tabel_list as $tabel => $wilayah) {
                if ($wilayah_filter && $wilayah !== $wilayah_filter) {
                    continue;
                }
                $sql .= "SELECT *, '$wilayah' as wilayah, '$tabel' as tabel FROM $tabel WHERE kepala_keluarga LIKE '%$nama_filter%' UNION ";
            }
            $sql = rtrim($sql, ' UNION ');

            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                echo "<h2>Data Penduduk " . ($wilayah_filter ? $wilayah_filter : "Semua Wilayah") . "</h2>";
                echo "<table class='table table-striped'>";
                echo "<thead>
                          <tr>
                            <th>ID</th>
                            <th>No KK</th>
                            <th>Kepala Keluarga</th>
                            <th>Jumlah Anggota Keluarga</th>
                            <th>Wilayah</th>
                            <th>Detail</th>
                          </tr>
                        </thead>
                        <tbody>";

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['nomor_kk']}</td>
                            <td>{$row['kepala_keluarga']}</td>
                            <td>{$row['jumlah_anggota']}</td>
                            <td>{$row['wilayah']}</td>
                            <td><button class='btn btn-primary detail-btn' data-id='{$row['id']}' data-tabel='{$row['tabel']}'>Detail</button></td>
                          </tr>";
                }
                echo "</tbody></table>";
            } else {
                echo "<p>Tidak ada data penduduk yang ditemukan.</p>";
            }

            // Tutup koneksi
            $db->close();
            ?>
        </div>
    </div>
</div>

<!-- Modal untuk Detail -->
<div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel">Detail Penduduk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Konten detail akan dimuat di sini -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<footer class="bg-light text-center py-3">
    <p>&copy; <?php echo date('Y'); ?> Sistem Informasi Geografis. All rights reserved.</p>
</footer>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var map = L.map('mapid').setView([-1.8365869805376422, 100.97300055553691], 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var titikData = <?php echo $titik_json; ?>;
    titikData.forEach(function(titik) {
        L.marker([titik.lat, titik.lng])
            .addTo(map)
            .bindPopup('<b>Kepala Keluarga: ' + titik.kepala_keluarga + '</b>');
    });

    $(document).ready(function() {
        $('.detail-btn').on('click', function() {
            var id = $(this).data('id');
            var tabel = $(this).data('tabel');

            $.ajax({
                url: 'detail.php',
                type: 'POST',
                data: { id: id, tabel: tabel },
                success: function(data) {
                    $('#detailModal .modal-body').html(data);
                    $('#detailModal').modal('show');
                }
            });
        });
    });
</script>



</body>
</html>

