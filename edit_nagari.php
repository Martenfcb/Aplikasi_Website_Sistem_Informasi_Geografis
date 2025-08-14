<!DOCTYPE html>
<html>

<head>
    <?php include('header.php'); ?>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">
    #img_div {
        width: 80%;
        padding: 5px;
        margin: 15px auto;
        border: 1px solid #cbcbcb;

    }

    #img_div:after {
        content: "";
        display: block;
        clear: both;

    }

    img {
        float: center;
        margin: 5px;
        width: 100px;
        height: 125px;

    }
</style>

<body>
    <div class="container col-md-6 mt-4">
        <div class="container mt-4">
            <h1>Update Puskesmas</h1>

        </div>
        <div class="card-body">
            <?php
            if (isset($_GET['id_lokasi'])) {
                $id_lokasi  = $_GET['id_lokasi'];
            } else {
                die("Error. No ID Selected!");
            }
            include "koneksi.php";
            $query = mysqli_query($db, "SELECT * FROM lokasi where $id_lokasi=id_lokasi");
            $data = mysqli_fetch_assoc($query);
            ?>

            <form action="" method="post" role="form" enctype="multipart/form-data">

                <div class="form-group">
                    <center>
                        <div class="img"><?= "<img src='img/" . $data['image'] . "'>"; ?></div>
                    </center>

                    <label>nama</label>
                    <input type="text" name="nama" required="" class="form-control" value="<?= $data['nama']; ?>">
                </div>
                <div class="form-group">
                    <label>Lattitude</label>
                    <input type="text" name="lat" required="" class="form-control" value="<?= $data['lat']; ?>">
                </div>
                <div class="form-group">
                    <label>Longtitude</label>
                    <input type="text" name="ing" required="" class="form-control" value="<?= $data['ing']; ?>">
                </div>
                <div class="form-group">
                    <label>Deskripsi</label>
                    <input type="text" name="des" required="" class="form-control" value="<?= $data['des']; ?>">
                </div>

        </div>
        <button type="submit" class="btn btn-primary" name="submit" value="simpan">Simpan data</button>
        </form>
    </div>
    <?php

    include('koneksi.php');
    $msg = "";
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $lat = $_POST['lat'];
        $ing = $_POST['ing'];
        $des = $_POST['des'];
        // extract($_POST);
        // $image = $_FILES['image']['name'];
        // $image_text = mysqli_real_escape_string($db, $_POST['image_text']);
        // $target = "img/".basename($image);
        // mysqli_query($db, $sql);
        // if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        // $msg = "Image uploaded successfully";
        // 	}else{
        // 		$msg = "Failed to upload image";
        // 			}
        // mysqli_query($db, $sql);
        mysqli_query($db, "update lokasi set nama='$nama', lat='$lat', ing='$ing' ,des='$des' where id_lokasi = '$id_lokasi'") or die(mysqli_error($db));

        echo "<script>alert('data berhasil diupdate.');window.location='status_nagari.php';</script>";
    }
    ?>
    </div>
    </div>
    </div>

</body>

</html>