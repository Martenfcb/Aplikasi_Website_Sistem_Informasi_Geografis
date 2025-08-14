<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk Air Haji</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>
<style>
    /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    background-color: #f4f4f9;
    color: #333;
    margin: 0;
    padding: 0;
}

.container-fluid {
    padding: 20px;
}

h1 {
    color: #0066cc;
    text-align: center;
    margin-bottom: 30px;
}

.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    background: #ffffff;
}

/* Card Header */
.card-header {
    background-color: #0066cc;
    color: #fff;
    padding: 15px;
    font-size: 1.2rem;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.card-header .btn {
    border-radius: 5px;
    font-size: 0.9rem;
}

.btn-success {
    background-color: #28a745;
    border: none;
}

.btn-success:hover {
    background-color: #218838;
}

.btn-danger {
    background-color: #dc3545;
    border: none;
}

.btn-danger:hover {
    background-color: #c82333;
}

.table-responsive {
    overflow-x: auto;
}

/* Table Styles */
table {
    width: 100%;
    border-collapse: collapse;
}

thead {
    background-color: #0066cc;
    color: #fff;
}

th, td {
    padding: 15px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

tbody tr:hover {
    background-color: #e9f5ff;
}

/* Responsive Design */
@media (max-width: 768px) {
    .card-header {
        font-size: 1rem;
        padding: 10px;
    }

    th, td {
        padding: 10px;
    }

    .card-header .btn {
        font-size: 0.8rem;
        padding: 5px 10px;
    }
}

</style>
<body class="sb-nav-fixed">
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Penduduk  Muara Gadang Air Haji</h1>
        </div>
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-table me-1"></i> Data Penduduk  Muara Gadang Air Haji</span>
                <a href="tambah_penduduk_muara_gadang_air_haji.php" class="btn btn-sm btn-success">Tambah Data Penduduk</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="datatablesSimple" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>No KK</th>
                                <th>Kepala Keluarga</th>
                                <th>NIK</th>
                                <th>Jumlah Anggota</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat</th>
                                <th>Kampung</th>
                                <th>RT</th>
                                <th>RW</th>
                                <th>Tanggal Terdaftar</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Foto</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                       
                        <tbody>
                            <?php
                            include('koneksi.php');
                            $no = 1;
                            $query = "SELECT * FROM penduduk_muara_gadang";
                            $result = mysqli_query($db, $query);

                            if (!$result) {
                                die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
                            }

                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nomor_kk']; ?></td>
                                    <td><?= $row['kepala_keluarga']; ?></td>
                                    <td><?= $row['nik']; ?></td>
                                    <td><?= $row['jumlah_anggota']; ?></td>
                                    <td><?= $row['jenis_kelamin']; ?></td>
                                    <td><?= $row['alamat']; ?></td>
                                    <td><?= $row['kampung']; ?></td>
                                    <td><?= $row['rt']; ?></td>
                                    <td><?= $row['rw']; ?></td>
                                    <td><?= $row['tanggal_terdaftar']; ?></td>
                                    <td><?= $row['lat']; ?></td>
                                    <td><?= $row['lng']; ?></td>
                                    <td><?= "<img src='img/" . $row['image'] . "' width='100'>"; ?></td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="edit_muara_gadang_air_haji.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-success me-1">Edit</a>
                                            <a href="hapus_muara_gadang.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus?');">Hapus</a>
                                        </div>
                                    </td>
                                </tr>
                            <?php $no++;
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Marten Shandra 2024</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms &amp; Conditions</a>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>
