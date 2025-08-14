<?php
//session_start();
//if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//header("location: loginUser.php");
//exit;
//}
 //session_start();
//if($_SESSION['status']!="login"){
 //	header("location:login.php?pesan=belum_login");
 //}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>SIG</title>
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



<style>
	html,
	body {
		font-family: 'Roboto', sans-serif;
		margin-left: 20px;
		margin-right: 20px;
		margin-top: 50px;
	}

	.borderright {
		border-right: 2px solid silver;
	}

	.borderleft {
		border-left: 2px solid silver;
	}
</style>

<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="col-2">
			<a class="navbar-brand" href="index.php">Dashboard SIG_Lisba</a>
			<button class="navbar-toggler navbar-toggler-icon" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			</button>
		</div>
		<div class="col-10">
			<div class="collapse navbar-collapse justify-content-end" id="navbarText">
				<ul class="navbar-nav">
					<a class="nav-link" href="index.php" id="navbardrop">Home</a>
					<a class="nav-link" href="halaman_admin.php" id="navbardrop">Dashboard</a>
                    <li class="nav-item dropdown borderleft">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Kelola Data Penduduk
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="status_penduduk_air_haji.php">Data Penduduk Air Haji</a>
                                <a class="dropdown-item" href="status_penduduk_airhaji_barat.php">Data Penduduk Air Haji Barat</a>
                                <a class="dropdown-item" href="status_penduduk_air_haji_tengah.php">Data Penduduk Air Haji Tengah</a>
                                <a class="dropdown-item" href="status_penduduk_air_haji_tenggara.php">Data Penduduk Air Haji Tenggara</a>
                                <a class="dropdown-item" href="status_penduduk_pasar_lama_muara_air_haji.php">Pasar Lama Muara Air Haji</a>
                                <a class="dropdown-item" href="status_penduduk_muara_gadang_air_haji.php">Muara Gadang Air Haji</a>
                                <a class="dropdown-item" href="status_penduduk_pasar_bukit_air_haji.php">Pasar Bukit Air Haji</a>
                                <a class="dropdown-item" href="status_penduduk_sei_sirah_air_haji.php">Sei Sirah Air Haji</a>
                                <a class="dropdown-item" href="status_penduduk_rantau_simalenang_air_haji.php">Rantau Simalenang Air Haji</a>
                                <a class="dropdown-item" href="status_penduduk_punggasan.php">Punggasan</a>
                                <a class="dropdown-item" href="status_penduduk_punggasan_timur.php">Punggasan Timur</a>
                                <a class="dropdown-item" href="status_penduduk_punggasan_utara.php">Punggasan Utara</a>
                                <a class="dropdown-item" href="status_penduduk_padang_xi_punggasan.php">Padang XI Punggasan</a>
                                <a class="dropdown-item" href="status_penduduk_muara_kandis_punggasan.php">Muara Kandis Punggasan</a>
                                <a class="dropdown-item" href="status_penduduk_lagan_hilir_punggasan.php">Lagan Hilir Punggasan</a>
                                <a class="dropdown-item" href="status_penduduk_lagan_mudik_punggasan.php">Lagan Mudik Punggasan</a>
                            </div>


						</li>

						<li class="nav-item">
                   			 <a class="nav-link" href="status_penduduk_semua.php">Lihat Semuah Data Penduduk</a>
                		</li>

						<li class="nav-item">
                   			 <a class="nav-link" href="add_user.php">Kelola Data Pengguna</a>
                		</li>

							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle borderleft" href="logout.php" id="navbardrop" data-toggle="dropdown">Sign Out</a>
								<div class="dropdown-menu">
									<a href="logout.php" class="dropdown-item">Sign Out</a>
								</div>
							</li> 
						</ul>
			</div>
		</div>
	</nav>
	

</body>

</html>