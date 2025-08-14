-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2024 pada 03.10
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` int(11) NOT NULL,
  `lat` float NOT NULL,
  `ing` float NOT NULL,
  `nama` varchar(50) NOT NULL,
  `des` text NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_text` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `lat`, `ing`, `nama`, `des`, `image`, `image_text`) VALUES
(39, -1.92845, 100.889, 'dasd', 'cdeeafa', 'aulia.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk`
--

CREATE TABLE `penduduk` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_air_haji`
--

CREATE TABLE `penduduk_air_haji` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(16) DEFAULT NULL,
  `kepala_keluarga` varchar(100) DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `jumlah_anggota` int(11) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kampung` varchar(100) DEFAULT NULL,
  `rt` int(11) DEFAULT NULL,
  `rw` int(11) DEFAULT NULL,
  `tanggal_terdaftar` date DEFAULT NULL,
  `lat` float DEFAULT NULL,
  `lng` float DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk_air_haji`
--

INSERT INTO `penduduk_air_haji` (`id`, `nomor_kk`, `kepala_keluarga`, `nik`, `jumlah_anggota`, `jenis_kelamin`, `alamat`, `kampung`, `rt`, `rw`, `tanggal_terdaftar`, `lat`, `lng`, `image`) VALUES
(1, ' 454515154151561', 'saya', '165416515616', 3, 'Laki-laki', 'dasdasdfasfaf', 'pertamina', 0, 0, '2024-07-07', -1.86524, 100.849, 'aulia.jpg'),
(3, ' 454515154151561', 'sayasasa', '3198130813123', 22, 'Perempuan', '222', '22', 22, 22, '2024-07-11', -1.86524, 100.854, 'ad_petugas_tambah_data.png'),
(4, ' 454515154151561', 'fff', '165416515616', 2, 'Laki-laki', 'muara jambu', 'gtgt', 0, 0, '2024-07-17', -1.92845, 100.854, 'admin melihat data penduduk.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_air_haji_barat`
--

CREATE TABLE `penduduk_air_haji_barat` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk_air_haji_barat`
--

INSERT INTO `penduduk_air_haji_barat` (`id`, `nomor_kk`, `kepala_keluarga`, `nik`, `jumlah_anggota`, `jenis_kelamin`, `alamat`, `kampung`, `rt`, `rw`, `tanggal_terdaftar`, `lat`, `lng`, `image`) VALUES
(0, ' 454515154151561563', 'dasdsadas', 'dsad', 3, 'Perempuan', 'dadsa', 'dadsad', 'dasda', 'dsad', '2024-07-19', -1.86926000, 100.85358000, 'pasar lama air haji.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_air_haji_tengah`
--

CREATE TABLE `penduduk_air_haji_tengah` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_air_haji_tenggara`
--

CREATE TABLE `penduduk_air_haji_tenggara` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_lagan_hilir`
--

CREATE TABLE `penduduk_lagan_hilir` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_lagan_mudik`
--

CREATE TABLE `penduduk_lagan_mudik` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_muara_gadang`
--

CREATE TABLE `penduduk_muara_gadang` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_muara_kandis`
--

CREATE TABLE `penduduk_muara_kandis` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk_muara_kandis`
--

INSERT INTO `penduduk_muara_kandis` (`id`, `nomor_kk`, `kepala_keluarga`, `nik`, `jumlah_anggota`, `jenis_kelamin`, `alamat`, `kampung`, `rt`, `rw`, `tanggal_terdaftar`, `lat`, `lng`, `image`) VALUES
(0, ' 45451515415156156', 'ddsadasd', '3224254235', 2, 'Perempuan', 'dsadasddsad', 'dsadsad', '3423', '4234', '2024-07-19', -1.86524000, 100.85241000, 'activity_diagram admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_padang_xi`
--

CREATE TABLE `penduduk_padang_xi` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_pasar_bukit`
--

CREATE TABLE `penduduk_pasar_bukit` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_pasar_lama`
--

CREATE TABLE `penduduk_pasar_lama` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk_pasar_lama`
--

INSERT INTO `penduduk_pasar_lama` (`id`, `nomor_kk`, `kepala_keluarga`, `nik`, `jumlah_anggota`, `jenis_kelamin`, `alamat`, `kampung`, `rt`, `rw`, `tanggal_terdaftar`, `lat`, `lng`, `image`) VALUES
(0, '1232131231231', 'fani', '41421412', 3, 'Perempuan', 'muara', 'jambu', '3', '33', '2024-07-19', -1.86813000, 100.85355000, 'pasar lama air haji.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_pungasan_timur`
--

CREATE TABLE `penduduk_pungasan_timur` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_punggasan`
--

CREATE TABLE `penduduk_punggasan` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_punggasan_utara`
--

CREATE TABLE `penduduk_punggasan_utara` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `penduduk_punggasan_utara`
--

INSERT INTO `penduduk_punggasan_utara` (`id`, `nomor_kk`, `kepala_keluarga`, `nik`, `jumlah_anggota`, `jenis_kelamin`, `alamat`, `kampung`, `rt`, `rw`, `tanggal_terdaftar`, `lat`, `lng`, `image`) VALUES
(0, ' 454515154151561563', 'saya', 'dsadad', 342, 'Laki-laki', 'dsada', 'dasda', '-', '-', '2024-07-25', -1.92845000, 100.85355000, 'aulia.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_rantau_simalenang`
--

CREATE TABLE `penduduk_rantau_simalenang` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penduduk_sungai_sirah`
--

CREATE TABLE `penduduk_sungai_sirah` (
  `id` int(11) NOT NULL,
  `nomor_kk` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `jumlah_anggota` int(11) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `kampung` varchar(50) NOT NULL,
  `rt` varchar(5) NOT NULL,
  `rw` varchar(5) NOT NULL,
  `tanggal_terdaftar` date NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lng` decimal(11,8) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `userpenduduk`
--

CREATE TABLE `userpenduduk` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','petugas','penduduk') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `userpenduduk`
--

INSERT INTO `userpenduduk` (`id`, `username`, `password`, `role`) VALUES
(1, 'petugas', 'afb91ef692fd08c445e8cb1bab2ccf9c', 'penduduk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'petugas', 'petugas', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indeks untuk tabel `penduduk_air_haji`
--
ALTER TABLE `penduduk_air_haji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_air_haji_barat`
--
ALTER TABLE `penduduk_air_haji_barat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_air_haji_tengah`
--
ALTER TABLE `penduduk_air_haji_tengah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_air_haji_tenggara`
--
ALTER TABLE `penduduk_air_haji_tenggara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_lagan_hilir`
--
ALTER TABLE `penduduk_lagan_hilir`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_lagan_mudik`
--
ALTER TABLE `penduduk_lagan_mudik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_muara_gadang`
--
ALTER TABLE `penduduk_muara_gadang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_muara_kandis`
--
ALTER TABLE `penduduk_muara_kandis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_padang_xi`
--
ALTER TABLE `penduduk_padang_xi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_pasar_bukit`
--
ALTER TABLE `penduduk_pasar_bukit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_pasar_lama`
--
ALTER TABLE `penduduk_pasar_lama`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_pungasan_timur`
--
ALTER TABLE `penduduk_pungasan_timur`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_punggasan`
--
ALTER TABLE `penduduk_punggasan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_punggasan_utara`
--
ALTER TABLE `penduduk_punggasan_utara`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_rantau_simalenang`
--
ALTER TABLE `penduduk_rantau_simalenang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penduduk_sungai_sirah`
--
ALTER TABLE `penduduk_sungai_sirah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `userpenduduk`
--
ALTER TABLE `userpenduduk`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id_lokasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `penduduk_air_haji`
--
ALTER TABLE `penduduk_air_haji`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `userpenduduk`
--
ALTER TABLE `userpenduduk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
