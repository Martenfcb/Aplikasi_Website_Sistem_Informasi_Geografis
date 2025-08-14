<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>SIG Data Penduduk</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            padding: 20px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
            font-size: 2rem;
            text-align: center;
        }

        .card {
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border: none;
            border-radius: 15px;
            margin-bottom: 20px;
            background-color: #fff;
        }

        .card-header {
            background-color: #007bff;
            color: blue;
            padding: 20px;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 1.2rem;
        }

        .card-header a.btn {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .card-header a.btn:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .card-body {
            padding: 20px;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            border-collapse: collapse;
            font-size: 0.9rem;
        }

        .table th,
        .table td {
            padding: 12px;
            text-align: left;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            background-color: #007bff;
            color: white;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table tbody tr {
            transition: background-color 0.3s ease;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .table tbody tr td a.btn {
            padding: 5px 10px;
            border-radius: 5px;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        .table tbody tr td a.btn-success {
            background-color: #28a745;
        }

        .table tbody tr td a.btn-success:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        .table tbody tr td a.btn-danger {
            background-color: #dc3545;
        }

        .table tbody tr td a.btn-danger:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .footer {
            padding: 20px;
            background-color: #f8f9fa;
            border-top: 1px solid #dee2e6;
            text-align: center;
        }

        .footer .text-muted {
            margin-bottom: 0;
        }

        .footer a {
            color: #007bff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .card-header {
                flex-direction: column;
                align-items: flex-start;
            }

            .card-header a.btn {
                margin-top: 10px;
            }

            h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>

<body class="sb-nav-fixed">
    <?php include('header.php'); ?>
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Data Nagari Kecamatan Linggo Sari Baganti</h1>
            <div class="card mb-4">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Nagari Kecamatan Linggo Sari Baganti <a href="tambah_dataNagari.php" class="btn btn-sm btn-success">Tambah Data Nagari</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Nagari</th>
                                <th>Deskripsi</th>
                                <th>Latitude</th>
                                <th>Longitude</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <?php
                            include('koneksi.php');
                            $no = 1;
                            $query = "SELECT * FROM lokasi";
                            $result = mysqli_query($db, $query);
                            if (!$result) {
                                die("Query Error : " . mysqli_errno($db) . " - " . mysqli_error($db));
                            }
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nama']; ?></td>
                                    <td><?= $row['des']; ?></td>
                                    <td><?= $row['lat']; ?></td>
                                    <td><?= $row['ing']; ?></td>
                                    <td>
                                        <a href="edit_nagari.php?id_lokasi=<?= $row['id_lokasi']; ?>" class="btn btn-sm btn-success">Edit</a>
                                        <a href="hapus.php?id_lokasi=<?= $row['id_lokasi']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin hapus?');">Hapus</a>
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
    <footer class="footer">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Marten Shandra 2024</div>
                <div>
                    <a href="#">Privacy Policy</a>
                    &middot;
                    <a href="#">Terms & Conditions</a>
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
