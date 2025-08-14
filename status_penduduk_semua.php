<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Penduduk</title>
    <link rel="stylesheet" href="status_penduduk_semuaa.css">
  
    <script>
        function showModal(id) {
            var modal = document.getElementById("modal-" + id);
            modal.style.display = "block";
        }

        function closeModal(id) {
            var modal = document.getElementById("modal-" + id);
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modals = document.getElementsByClassName("modal");
            for (var i = 0; i < modals.length; i++) {
                if (event.target == modals[i]) {
                    modals[i].style.display = "none";
                }
            }
        }
    </script>
</head>
<style>
    button {
    display: inline-block;
    margin: 20px 0;
    padding: 12px 24px;
    background-color: #007bff;
    color: #ffffff;
    border: none;
    border-radius: 50px;
    cursor: pointer;
    font-size: 1.1em;
    font-weight: 600;
    text-align: center;
    text-decoration: none;
    transition: all 0.3s ease;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
}

button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}

button a {
    color: #ffffff;
    text-decoration: none;
}

button a:hover {
    text-decoration: none;
}

</style>
<body>
    <?php include('header.php'); ?>
    <div class="container">
        <form class="filter-form" method="get" action="">
            <select name="wilayah">
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
                <option value="Pungasan Timur">Punggasan Timur</option>
                <option value="Punggasan Utara">Punggasan Utara</option>
                <option value="Padang XI Punggasan">Padang XI Punggasan</option>
                <option value="Muara Kandis Punggasan">Muara Kandis Punggasan</option>
                <option value="Lagan Hilir Punggasan">Lagan Hilir Punggasan</option>
                <option value="Lagan Mudik Punggasan">Lagan Mudik Punggasan</option>
            </select>
            <input type="text" name="search" placeholder="Cari Nama atau NIK">
            <button type="submit">Filter</button>
        </form>
        <div class="table-wrapper">
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

            // Ambil data dari query filter jika ada
            $search = isset($_GET['search']) ? mysqli_real_escape_string($db, $_GET['search']) : '';
            $wilayah_filter = isset($_GET['wilayah']) ? mysqli_real_escape_string($db, $_GET['wilayah']) : '';

            // Query untuk mengambil data dari semua tabel penduduk
            $sql = "";
            $total_penduduk = 0;
            foreach ($tabel_list as $tabel => $wilayah) {
                if ($wilayah_filter && $wilayah !== $wilayah_filter) {
                    continue;
                }
                $sql .= "SELECT *, '$wilayah' as wilayah FROM $tabel";
                if ($search) {
                    $sql .= " WHERE kepala_keluarga LIKE '%$search%' OR nik LIKE '%$search%'";
                }
                $sql .= " UNION ";
                
                // Query tambahan untuk menghitung jumlah penduduk dari tabel
                $count_sql = "SELECT COUNT(*) as total FROM $tabel";
                if ($search) {
                    $count_sql .= " WHERE kepala_keluarga LIKE '%$search%' OR nik LIKE '%$search%'";
                }
                $count_result = $db->query($count_sql);
                if ($count_result && $count_row = $count_result->fetch_assoc()) {
                    $total_penduduk += $count_row['total'];
                }
            }
            $sql = rtrim($sql, ' UNION ');

            $result = $db->query($sql);

            if ($result->num_rows > 0) {
                $no = 1; // Inisialisasi variabel $no
                echo "<h2>Total Semuah Data Penduduk: $total_penduduk</h2>";
                echo "<h2>Data Penduduk $wilayah_filter</h2>";
                echo "<table>
                        <tr>
                            <th>No</th>
                            <th>Nomor KK</th>
                            <th>Kepala Keluarga</th>
                            <th>NIK</th>
                            <th>Jumlah Anggota</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>                           
                            <th>Detail</th>
                        </tr>";
                        while($row = $result->fetch_assoc()) {
                            $id = $row["id"];
                            echo "<tr>
                                    <td>" . $no++ . "</td>
                                    <td>" . $row["nomor_kk"] . "</td>
                                    <td>" . $row["kepala_keluarga"] . "</td>
                                    <td>" . $row["nik"] . "</td>
                                    <td>" . $row["jumlah_anggota"] . "</td>
                                    <td>" . $row["jenis_kelamin"] . "</td>
                                    <td>" . $row["alamat"] . "</td>                                    
                                    <td><button type='button' onclick='showModal($id)'>Detail</button></td>
                                    </tr>
                                    <div id='modal-$id' class='modal'>
                                    <div class='modal-content'>
                                    <span class='close' onclick='closeModal($id)'>×</span>
                                    <h3>Detail Penduduk</h3>
                                    <form class='modal-form'>
                                    <label for='id-$id'>ID:</label>
                                    <input type='text' id='id-$id' value='" . $row["id"] . "' readonly>
                                    <label for='nomor_kk-$id'>Nomor KK:</label>
                                    <input type='text' id='nomor_kk-$id' value='" . $row["nomor_kk"] . "' readonly>
                                    <label for='kepala_keluarga-$id'>Kepala Keluarga:</label>
                                    <input type='text' id='kepala_keluarga-$id' value='" . $row["kepala_keluarga"] . "' readonly>
                                    <label for='nik-$id'>NIK:</label>
                                    <input type='text' id='nik-$id' value='" . $row["nik"] . "' readonly>
                                    <label for='jumlah_anggota-$id'>Jumlah Anggota:</label>
                                    <input type='text' id='jumlah_anggota-$id' value='" . $row["jumlah_anggota"] . "' readonly>
                                    <label for='jenis_kelamin-$id'>Jenis Kelamin:</label>
                                    <input type='text' id='jenis_kelamin-$id' value='" . $row["jenis_kelamin"] . "' readonly>
                                    <label for='alamat-$id'>Alamat:</label>
                                    <input type='text' id='alamat-$id' value='" . $row["alamat"] . "' readonly> 
                                     <label for='kampung-$id'>Kampung:</label>
                                    <input type='text' id='kampung-$id' value='" . $row["kampung"] . "' readonly> 
                                      <label for='rt-$id'>Rt:</label>
                                    <input type='text' id='rt-$id' value='" . $row["rt"] . "' readonly> 
                                      <label for='rw-$id'>Rw:</label>
                                    <input type='text' id='rw-$id' value='" . $row["rw"] . "' readonly> 
                                       <label for='tanggal_terdaftar-$id'>Tanggal Terdaftar:</label>
                                    <input type='text' id='tanggal_terdaftar-$id' value='" . $row["tanggal_terdaftar"] . "' readonly> 
                                    </form>
                                    </div>
                                    </div>";
                        }
                        echo "</table>";
            } else {
                echo "<p>Data tidak ditemukan</p>";
            }
            $db->close();
            ?>
        </div>
    </div>
</body>
</html>
