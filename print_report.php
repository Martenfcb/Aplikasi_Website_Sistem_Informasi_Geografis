<?php
session_start();

// Cek apakah user sudah login dan memiliki hak akses
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'petugas') {
    header("Location: login.php");
    exit();
}

// Mengimpor file koneksi
include 'koneksi.php';

// Daftar tabel penduduk dan wilayahnya
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

// Pilih wilayah yang dipilih dari formulir
$wilayah_pilihan = isset($_POST['wilayah']) ? $_POST['wilayah'] : '';

// Ambil data dari tabel penduduk yang dipilih
$data_penduduk = [];
if ($wilayah_pilihan && array_key_exists($wilayah_pilihan, $tabel_list)) {
    $tabel = $wilayah_pilihan;
    $wilayah = $tabel_list[$tabel];
    $result = $db->query("SELECT *, '$wilayah' as wilayah FROM $tabel");
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data_penduduk[] = $row;
        }
    }
}

// Tutup koneksi
$db->close();

// Ambil tanggal saat ini
$tanggal = date('d F Y');
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Penduduk</title>
    <link rel="stylesheet" href="css/printt.css">
    <script>
        function printReport() {
            window.print();
        }
    </script>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <ul>
            <li><a href="halaman_petugas.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>

    <div class="container">
        <div class="header">
            <h1>Laporan Data Penduduk</h1>
            <p>Tanggal: <?php echo $tanggal; ?></p>
            <a href="javascript:printReport();" class="print-btn">Cetak Laporan</a>
        </div>

        <form method="POST" action="">
            <label for="wilayah">Pilih Wilayah:</label>
            <select name="wilayah" id="wilayah">
                <option value="">-- Pilih Wilayah --</option>
                <?php foreach ($tabel_list as $key => $value): ?>
                    <option value="<?php echo $key; ?>" <?php echo ($wilayah_pilihan == $key) ? 'selected' : ''; ?>>
                        <?php echo $value; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Tampilkan</button>
        </form>

        <?php if ($data_penduduk): ?>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor KK</th>
                        <th>Kepala Keluarga</th>
                        <th>NIK</th>
                        <th>Jumlah Anggota</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Kampung</th>
                        <th>Rt</th>
                        <th>Rw</th>
                        <th>Tanggal Terdaftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($data_penduduk as $penduduk): ?>
                        <tr>
                            <td><?php echo $no++; ?></td>
                            <td><?php echo $penduduk['nomor_kk']; ?></td>
                            <td><?php echo $penduduk['kepala_keluarga']; ?></td>
                            <td><?php echo $penduduk['nik']; ?></td>
                            <td><?php echo $penduduk['jumlah_anggota']; ?></td>
                            <td><?php echo $penduduk['jenis_kelamin']; ?></td>
                            <td><?php echo $penduduk['alamat']; ?></td>
                            <td><?php echo $penduduk['kampung']; ?></td>
                            <td><?php echo $penduduk['rt']; ?></td>
                            <td><?php echo $penduduk['rw']; ?></td>
                            <td><?php echo $penduduk['tanggal_terdaftar']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        <?php
// Ambil tanggal saat ini
$tanggal = date('d F Y');

// Lokasi
$lokasi = 'Linggo Sari Baganti';
?>

<div class="signature">
    <p>Linggo Sari Baganti, <?php echo $tanggal; ?></p>
    <p>Kepala Camat</p> <br><br><br>
    <p><b>(BUSRASOL JALISMAN, SH)</b></p>
    <p>NIP. 19661231 198903 1 062</p>
</div>

</body>
</html>
