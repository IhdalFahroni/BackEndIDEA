-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Jun 2025 pada 11.48
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
-- Database: `lombokrec`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `ID_akun` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `foto_profil` varchar(500) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_depan` tinytext NOT NULL,
  `nama_belakang` tinytext NOT NULL,
  `is_pemilik` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`ID_akun`, `username`, `foto_profil`, `password`, `email`, `nama_depan`, `nama_belakang`, `is_pemilik`, `is_admin`) VALUES
(1, 'admin', NULL, 'admin123', 'admin@gmail.com', 'Admin', 'Admin', 0, 1),
(2, 'enjiji', 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\profil.jpg', 'enji123', 'anggijuwita@gmail.com', 'Anggi', 'Juwita', 0, 0),
(3, 'ihdal_f', NULL, 'ihdal123', 'ihdalfahroni@gmail.com', 'Ihdal', 'Fahroni', 0, 0),
(4, 'vivivi', NULL, 'devita123', 'devitaamalia@gmail.com', 'Devita', 'Amalia', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_klaim`
--

CREATE TABLE `form_klaim` (
  `ID_formKlaim` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `nama_lengkap` tinytext NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dokumen_pendukung` varchar(500) DEFAULT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pengajuantempat`
--

CREATE TABLE `form_pengajuantempat` (
  `ID_formPengajuanTempat` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `kabupatan_kota` enum('mataram','lombok_barat','lombok_tengah','lombok_timur','lombok_utara') NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `nama_jalan` varchar(255) NOT NULL,
  `kategori` enum('tourist_destination','culinary') NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `google_maps` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `ID_menu` int(11) NOT NULL,
  `ID_tempat` int(11) NOT NULL,
  `foto_menu` varchar(500) DEFAULT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `deskripsi_menu` varchar(500) NOT NULL,
  `harga_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`ID_menu`, `ID_tempat`, `foto_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`) VALUES
(1, 2, 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\Pelecing.png', 'Pelecing Kangkung', 'Kale(kangkung) blanched (or steamed) and served cold with spicy tomato chili sauce', 10000),
(2, 2, NULL, 'Nasi Puyung', 'A dish consisting of white rice, spicy shredded chicken, dried shredded chicken, plus fried peanuts and soybeans', 20000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `ID_notif` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `isi_notif` text NOT NULL,
  `tanggal_jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `ID_promo` int(11) NOT NULL,
  `ID_tempat` int(11) NOT NULL,
  `nama_promo` varchar(255) NOT NULL,
  `deskripsi_promo` varchar(500) NOT NULL,
  `valid_until` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`ID_promo`, `ID_tempat`, `nama_promo`, `deskripsi_promo`, `valid_until`) VALUES
(1, 2, 'Buy 2 Get 3', 'Buy 2 serving get 3 serving of Es Campur', '2025-10-01'),
(2, 2, 'Discount 10%', 'Every purchase over Rp100.000', '2025-07-31');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `ID_review` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `ID_tempat` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `rating` decimal(5,2) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`ID_review`, `ID_akun`, `ID_tempat`, `komentar`, `rating`, `foto`, `waktu`) VALUES
(1, 3, 1, 'Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. \r\nPantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan \r\nderetan warung yang menyajikan makanan lokal dan minuman segar.', 4.50, 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\review_selong_belanak.png', '2025-06-09 08:00:00'),
(2, 3, 2, 'Pegawainya ramah, pagi2 menu sudah banyak yang siap, tempatnya bersih, kalau untuk rasa saya agak kurang cocok, makanan yang saya pesan rawon dan gulai kambing.', 4.70, 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\review_sumberRejeki.png', '2025-06-09 03:09:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `ID_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `kabupaten_kota` enum('mataram','lombok_barat','lombok_tengah','lombok_timur','lombok_utara') NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `nama_jalan` varchar(255) NOT NULL,
  `kategori` enum('tourist_destination','culinary') NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `google_maps` varchar(255) NOT NULL,
  `harga_tiket` int(11) DEFAULT NULL,
  `ID_akun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tempat`
--

INSERT INTO `tempat` (`ID_tempat`, `nama_tempat`, `kabupaten_kota`, `kecamatan`, `kelurahan`, `nama_jalan`, `kategori`, `deskripsi`, `foto`, `google_maps`, `harga_tiket`, `ID_akun`) VALUES
(1, 'Selong Belanak Beach', 'lombok_tengah', 'West Praya ', 'Selong Belanak', 'Selong Belanak Street', 'tourist_destination', 'Selong Belanak Beach is one of the most stunning beach destinations in Lombok, West Nusa Tenggara. This beach is perfect for travelers looking to relax, soak up the sun, or learn to surf, as the waves at the end of the beach are calm enough for beginners. Along the beach, visitors can also find a row of stalls serving local food and refreshing drinks. The main attraction at Selong Belanak Beach is the sunset view.', 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\SelongBelanakPic.png', 'https://maps.app.goo.gl/64PXP5dDJuWBxW5W6', NULL, NULL),
(2, 'RM Sumber Rejeki', 'lombok_tengah', 'Praya', 'Panjisari', 'Mareje Street', 'culinary', 'RM Sumber Rejeki is a traditional Indonesian restaurant that serves various home-style dishes with authentic flavors. The signature dishes at RM Sumber Rejeki include fried chicken, grilled fish, sour vegetable soup, tempeh with chili sauce, and a spicy chili sauce that is sure to tantalize your taste buds. The restaurant\'s simple yet comfortable atmosphere makes dining here an enjoyable experience, perfect for family lunches or group meals with tourists. The friendly and efficient service at RM Sumber Rejeki is another major draw, attracting many customers.', 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\sumber_rejeki.png', 'https://maps.app.goo.gl/aEu7SmWdVg7CFdYE7', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_akun`);

--
-- Indeks untuk tabel `form_klaim`
--
ALTER TABLE `form_klaim`
  ADD PRIMARY KEY (`ID_formKlaim`),
  ADD KEY `form_klaim_ibfk_1` (`ID_akun`);

--
-- Indeks untuk tabel `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  ADD PRIMARY KEY (`ID_formPengajuanTempat`),
  ADD KEY `form_pengajuantempat_ibfk_1` (`ID_akun`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_menu`),
  ADD KEY `ID_tempat` (`ID_tempat`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`ID_notif`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- Indeks untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_promo`),
  ADD KEY `promo_ibfk_1` (`ID_tempat`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID_review`),
  ADD KEY `review_ibfk_1` (`ID_akun`),
  ADD KEY `ID_tempat` (`ID_tempat`);

--
-- Indeks untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`ID_tempat`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `form_klaim`
--
ALTER TABLE `form_klaim`
  MODIFY `ID_formKlaim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  MODIFY `ID_formPengajuanTempat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_notif` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `ID_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `ID_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form_klaim`
--
ALTER TABLE `form_klaim`
  ADD CONSTRAINT `form_klaim_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  ADD CONSTRAINT `form_pengajuantempat_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`);

--
-- Ketidakleluasaan untuk tabel `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
