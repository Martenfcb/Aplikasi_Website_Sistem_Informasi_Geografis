<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Penduduk</title>
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container col-md-6 mt-4">
        <h1>Edit Data Penduduk Air Haji Tengah</h1>
        <?php
        include('koneksi.php');
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "SELECT * FROM penduduk_air_haji WHERE id = $id";
            $result = mysqli_query($db, $query);
            if ($row = mysqli_fetch_assoc($result)) {
        ?>
                <form action="" method="post" role="form" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $row['id']; ?>">
                    <div class="form-group">
                        <label>Nomor KK</label>
                        <input type="text" name="nomor_kk" required="" class="form-control" value="<?= $row['nomor_kk']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kepala Keluarga</label>
                        <input type="text" name="kepala_keluarga" required="" class="form-control" value="<?= $row['kepala_keluarga']; ?>">
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input type="text" name="nik" required="" class="form-control" value="<?= $row['nik']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Anggota</label>
                        <input type="text" name="jumlah_anggota" required="" class="form-control" value="<?= $row['jumlah_anggota']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control" required="">
                            <option value="Laki-laki" <?= $row['jenis_kelamin'] == 'Laki-laki' ? 'selected' : '' ?>>Laki-laki</option>
                            <option value="Perempuan" <?= $row['jenis_kelamin'] == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="alamat" required="" class="form-control" value="<?= $row['alamat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Kampung</label>
                        <input type="text" name="kampung" required="" class="form-control" value="<?= $row['kampung']; ?>">
                    </div>
                    <div class="form-group">
                        <label>RT</label>
                        <input type="text" name="rt" required="" class="form-control" value="<?= $row['rt']; ?>">
                    </div>
                    <div class="form-group">
                        <label>RW</label>
                        <input type="text" name="rw" required="" class="form-control" value="<?= $row['rw']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Terdaftar</label>
                        <input type="date" name="tanggal_terdaftar" required="" class="form-control" value="<?= $row['tanggal_terdaftar']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" name="lat" required="" class="form-control" value="<?= $row['lat']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" name="lng" required="" class="form-control" value="<?= $row['lng']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Foto</label>
                        <input type="file" name="image" class="form-control">
                        <img src="img/<?= $row['image']; ?>" width="100">
                        <input type="hidden" name="foto_lama" value="<?= $row['image']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit" value="update">Update data</button>
                </form>
        <?php
            }
        }

        if (isset($_POST['submit'])) {
            $id = $_POST['id'];
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
            $foto_lama = $_POST['foto_lama'];

            if ($_FILES['image']['name']) {
                $image = $_FILES['image']['name'];
                $target = "img/" . basename($image);
                if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                    $msg = "Image uploaded successfully";
                } else {
                    $msg = "Failed to upload image";
                }
            } else {
                $image = $foto_lama;
            }

            // Update query with correct table name and columns
            $query_update = "UPDATE penduduk_air_haji_tengah SET 
                nomor_kk='$nomor_kk', 
                kepala_keluarga='$kepala_keluarga', 
                nik='$nik', 
                jumlah_anggota='$jumlah_anggota', 
                jenis_kelamin='$jenis_kelamin', 
                alamat='$alamat', 
                kampung='$kampung', 
                rt='$rt', 
                rw='$rw', 
                tanggal_terdaftar='$tanggal_terdaftar', 
                lat='$lat', 
                lng='$lng', 
                image='$image' 
                WHERE id=$id";

            $result_update = mysqli_query($db, $query_update);

            if ($result_update) {
                echo "<script>alert('Data berhasil diupdate.');window.location='status_penduduk_air_haji_tengah.php';</script>";
            } else {
                echo "Error: " . mysqli_error($db);
            }
        }
        ?>
    </div>
</body>

</html>
