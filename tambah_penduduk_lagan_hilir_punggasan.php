<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Tambah Data Penduduk</title>
    <!-- Tambahkan pustaka Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

    <!-- Atur ukuran peta dengan CSS -->
    <style>
        #map {
            height: 520px;
        }

        img {
            height: 100px;
            width: 200px;
        }
    </style>
</head>

<body>
    <?php include("header.php"); ?>

    <div class="container col-md-6 mt-4">
        <h1>Tambah Data Penduduk</h1>
        <form action="" method="post" role="form" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nomor KK</label>
                <input type="text" name="nomor_kk" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Kepala Keluarga</label>
                <input type="text" name="kepala_keluarga" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Jumlah Anggota</label>
                <input type="number" name="jumlah_anggota" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Jenis Kelamin</label>
                <select name="jenis_kelamin" required="" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" name="alamat" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Kampung</label>
                <input type="text" name="kampung" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>RT</label>
                <input type="text" name="rt" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>RW</label>
                <input type="text" name="rw" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Tanggal Terdaftar</label>
                <input type="date" name="tanggal_terdaftar" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Latitude</label>
                <input type="text" name="lat" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Longitude</label>
                <input type="text" name="lng" required="" class="form-control">
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="image" required="" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
        </form>

        <?php
        include('koneksi.php');

        if (isset($_POST['submit'])) {

            $nomor_kk = $_POST['nomor_kk'];
            $kepala_keluarga = $_POST['kepala_keluarga'];
            $nik = $_POST['nik'];
            $jumlah_anggota = $_POST['jumlah_anggota'];
            $jenis_kelamin = $_POST['jenis_kelamin'];
            $alamat = $_POST['alamat'];
            $kampung = $_POST['kampung'];
            $rt = $_POST['rt'];
            $rw = $_POST['rw'];
            $tanggal_terdaftar = $_POST['tanggal_terdaftar'];
            $lat = $_POST['lat'];
            $lng = $_POST['lng'];
            $image = $_FILES['image']['name'];
            $target = "img/" . basename($image);

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                $msg = "Image uploaded successfully";
            } else {
                $msg = "Failed to upload image";
            }

            // Simpan data penduduk
            $query_insert_data = "INSERT INTO penduduk_lagan_hilir (nomor_kk, kepala_keluarga, nik, jumlah_anggota, jenis_kelamin, alamat, kampung, rt, rw, tanggal_terdaftar, lat, lng, image) VALUES ('$nomor_kk', '$kepala_keluarga', '$nik', '$jumlah_anggota', '$jenis_kelamin', '$alamat', '$kampung', '$rt', '$rw', '$tanggal_terdaftar', '$lat', '$lng', '$image')";
            $result_insert_data = mysqli_query($db, $query_insert_data) or die(mysqli_error($db));

            echo "<script>alert('Data berhasil disimpan.');window.location='status_penduduk_lagan_hilir_punggasan.php';</script>";
        }
        ?>
    </div>

    <!-- Tambahkan elemen HTML untuk menampilkan peta -->
    <div id="map"></div>

    <!-- Tambahkan pustaka Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>

    <!-- Atur script untuk menampilkan peta -->
    <script>
       var map = L.map('map').setView([-1.8433040057904144, 100.86507040134401], 14);

// Tambahkan layer peta dasar (misalnya OpenStreetMap)
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© OpenStreetMap contributors'
}).addTo(map);



        // Tambahkan layer peta dasar
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Tampilkan marker untuk setiap lokasi penduduk
        <?php
        include('koneksi.php');
        $query = mysqli_query($db, "SELECT * FROM penduduk_lagan_hilir");
        $data = mysqli_fetch_all($query, MYSQLI_ASSOC);
        if (isset($data)) {
            foreach ($data as $row) {
                $kepala_keluarga = $row['kepala_keluarga'];
                $lat = $row['lat'];
                $lng = $row['lng'];
                $alamat = $row['alamat'];
                $image = $row['image'];
                echo "L.marker([$lat, $lng]).addTo(map)
                    .bindPopup(\"<h4>$kepala_keluarga</h4><p>$alamat</p> <img src='img/$image' style='width: 100px;'>\");";
            }
        }
        ?>
    </script>

    <footer class="py-4 bg-light mt-auto">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between small">
                <div class="text-muted">Copyright &copy; Marten Shandra 2024</div>
            </div>
        </div>
    </footer>

</body>

</html>
