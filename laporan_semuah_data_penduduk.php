<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Penduduk</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7f9;
            color: #333;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            font-size: 2.5em;
            color: #007bff;
            margin: 0 0 20px 0;
            font-weight: 600;
        }
        button {
            display: block;
            margin: 20px auto;
            padding: 12px 24px;
            background-color: #28a745;
            color: #ffffff;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 1.1em;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }
        button:hover {
            background-color: #218838;
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #e9ecef;
        }
        th {
            font-weight: 600;
        }
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tbody tr:hover {
            background-color: #e2e6ea;
        }
        h2 {
            font-size: 2em;
            color: #0056b3;
            margin: 30px 0 10px 0;
            font-weight: 600;
            border-bottom: 2px solid #007bff;
            padding-bottom: 10px;
        }
        .page-break {
            page-break-before: always;
        }
        @media print {
            body {
                background-color: #ffffff;
                color: #000000;
            }
            .container {
                width: 100%;
                padding: 0;
                box-shadow: none;
            }
            button {
                display: none;
            }
            table {
                border: 1px solid #000000;
                box-shadow: none;
            }
            table thead {
                background-color: #007bff;
                color: #ffffff;
            }
        }
    </style>
</head>
<body>
<?php include('header.php'); ?>
    <h1>Laporan Data Penduduk Kecamatan Linggo Sari Baganti</h1> <br>
    <button onclick="window.print()">Cetak Seluruh Laporan</button> <br> 

    <?php
    // Mengimpor file koneksi
    include 'koneksi.php';

    // List tabel yang digunakan dalam query
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

    // Ambil data dari setiap tabel dan tampilkan
    foreach ($tabel_list as $tabel => $wilayah) {
        echo "<h2>$wilayah</h2>";
        $sql = "SELECT * FROM $tabel";
        $result = $db->query($sql);

        if ($result->num_rows > 0) {
            echo "<table>
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
                    </tr>";
                    $no = 1;
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $no++ . "</td>
                                <td>" . $row["nomor_kk"] . "</td>
                                <td>" . $row["kepala_keluarga"] . "</td>
                                <td>" . $row["nik"] . "</td>
                                <td>" . $row["jumlah_anggota"] . "</td>
                                <td>" . $row["jenis_kelamin"] . "</td>
                                <td>" . $row["alamat"] . "</td>
                                <td>" . $row["kampung"] . "</td>
                                <td>" . $row["rt"] . "</td>
                                <td>" . $row["rw"] . "</td>
                                <td>" . $row["tanggal_terdaftar"] . "</td>
                              </tr>";
                    }
                    echo "</table>";
        } else {
            echo "<p>Data tidak ditemukan di wilayah $wilayah</p>";
        }
        echo '<div class="page-break"></div>';
    }

    $db->close();
    ?>
</body>
</html>
