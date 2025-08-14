<!DOCTYPE html>
<html>
<head>
    <title>Form Pendataan Penduduk</title>
</head>
<style>
  /* Reset CSS */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Global Styles */
body {
    font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
    background: linear-gradient(to right, #6A82FB, #FC5C7D);
    color: #333;
    line-height: 1.6;
    padding: 20px;
}

/* Form Container */
form {
    max-width: 800px;
    margin: 20px auto;
    background: #fff;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
}

/* Form Header */
h2 {
    text-align: center;
    margin-bottom: 30px;
    color: #333;
    font-size: 2em;
    text-transform: uppercase;
    letter-spacing: 2px;
}

/* Fieldset */
fieldset {
    margin-bottom: 20px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 10px;
}

/* Legend */
legend {
    padding: 0 10px;
    font-size: 1.2em;
    color: #FC5C7D;
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Labels and Inputs */
label {
    display: block;
    margin-bottom: 8px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="number"],
input[type="date"],
input[type="file"],
select,
textarea {
    width: 100%;
    padding: 12px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 1em;
    transition: border-color 0.3s ease;
}

input[type="text"]:focus,
input[type="number"]:focus,
input[type="date"]:focus,
input[type="file"]:focus,
select:focus,
textarea:focus {
    border-color: #FC5C7D;
}

/* Textarea */
textarea {
    resize: vertical;
    height: 100px;
}

/* Submit Button */
input[type="submit"] {
    display: block;
    width: 100%;
    padding: 15px;
    background: linear-gradient(to right, #FC5C7D, #6A82FB);
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1.2em;
    cursor: pointer;
    transition: background 0.3s ease;
}

input[type="submit"]:hover {
    background: linear-gradient(to right, #6A82FB, #FC5C7D);
}

/* Responsive Design */
@media (max-width: 600px) {
    form {
        padding: 20px;
    }

    fieldset {
        padding: 10px;
    }

    legend {
        font-size: 1em;
    }

    input[type="submit"] {
        padding: 10px;
        font-size: 1em;
    }
}
  
</style>
<body>
    <h2>Form Pendataan Penduduk</h2>
    <form action="/submit_data" method="POST" enctype="multipart/form-data">
        <!-- Umum -->
        <fieldset>
            <legend>Data Umum</legend>
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" required><br><br>

            <label for="nik">NIK:</label>
            <input type="text" id="nik" name="nik" required><br><br>

            <label for="tanggal_lahir">Tanggal Lahir:</label>
            <input type="date" id="tanggal_lahir" name="tanggal_lahir" required><br><br>

            <label for="jenis_kelamin">Jenis Kelamin:</label>
            <select id="jenis_kelamin" name="jenis_kelamin" required>
                <option value="laki_laki">Laki-laki</option>
                <option value="perempuan">Perempuan</option>
            </select><br><br>

            <label for="foto_umum">Unggah Foto:</label>
            <input type="file" id="foto_umum" name="foto_umum" accept="image/*"><br><br>
        </fieldset>

        <!-- Pengeluaran -->
        <fieldset>
            <legend>Pengeluaran</legend>
            <label for="pengeluaran_bulanan">Pengeluaran Bulanan:</label>
            <input type="number" id="pengeluaran_bulanan" name="pengeluaran_bulanan" required><br><br>

            <label for="pengeluaran_kebutuhan_pokok">Pengeluaran Kebutuhan Pokok:</label>
            <input type="number" id="pengeluaran_kebutuhan_pokok" name="pengeluaran_kebutuhan_pokok" required><br><br>

            <label for="pengeluaran_lainnya">Pengeluaran Lainnya:</label>
            <input type="number" id="pengeluaran_lainnya" name="pengeluaran_lainnya"><br><br>

            <label for="foto_pengeluaran">Unggah Foto:</label>
            <input type="file" id="foto_pengeluaran" name="foto_pengeluaran" accept="image/*"><br><br>
        </fieldset>

        <!-- Rumah Tempat Tinggal dan Lingkungan -->
        <fieldset>
            <legend>Rumah Tempat Tinggal dan Lingkungan</legend>
            <label for="alamat">Alamat:</label>
            <input type="text" id="alamat" name="alamat" required><br><br>

            <label for="jenis_rumah">Jenis Rumah:</label>
            <input type="text" id="jenis_rumah" name="jenis_rumah" required><br><br>

            <label for="status_kepemilikan">Status Kepemilikan:</label>
            <input type="text" id="status_kepemilikan" name="status_kepemilikan" required><br><br>

            <label for="kondisi_rumah">Kondisi Rumah:</label>
            <input type="text" id="kondisi_rumah" name="kondisi_rumah" required><br><br>

            <label for="foto_rumah">Unggah Foto:</label>
            <input type="file" id="foto_rumah" name="foto_rumah" accept="image/*"><br><br>
        </fieldset>

        <!-- Bantuan yang Diterima -->
        <fieldset>
            <legend>Bantuan yang Diterima</legend>
            <label for="jenis_bantuan">Jenis Bantuan:</label>
            <input type="text" id="jenis_bantuan" name="jenis_bantuan" required><br><br>

            <label for="sumber_bantuan">Sumber Bantuan:</label>
            <input type="text" id="sumber_bantuan" name="sumber_bantuan" required><br><br>

            <label for="nilai_bantuan">Nilai Bantuan:</label>
            <input type="number" id="nilai_bantuan" name="nilai_bantuan" required><br><br>

            <label for="foto_bantuan">Unggah Foto:</label>
            <input type="file" id="foto_bantuan" name="foto_bantuan" accept="image/*"><br><br>
        </fieldset>

        <!-- Data Pendukung -->
        <fieldset>
            <legend>Data Pendukung</legend>
            <label for="dokumen_pendukung">Dokumen Pendukung:</label>
            <input type="file" id="dokumen_pendukung" name="dokumen_pendukung" accept="application/pdf, image/*"><br><br>

            <label for="catatan_tambahan">Catatan Tambahan:</label>
            <textarea id="catatan_tambahan" name="catatan_tambahan"></textarea><br><br>

            <label for="foto_data_pendukung">Unggah Foto:</label>
            <input type="file" id="foto_data_pendukung" name="foto_data_pendukung" accept="image/*"><br><br>
        </fieldset>

        <!-- Koordinat Geografis -->
        <fieldset>
            <legend>Koordinat Geografis</legend>
            <label for="latitude">Latitude:</label>
            <input type="text" id="latitude" name="latitude" required><br><br>

            <label for="longitude">Longitude:</label>
            <input type="text" id="longitude" name="longitude" required><br><br>

            <label for="foto_koordinat">Unggah Foto:</label>
            <input type="file" id="foto_koordinat" name="foto_koordinat" accept="image/*"><br><br>
        </fieldset>

        <input type="submit" value="Submit">
    </form>
</body>
</html>
