-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jul 2025 pada 08.13
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
  `password` varchar(255) NOT NULL,
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
(1, 'admin', NULL, '$2y$10$07UmwluqUZuJyELThW2jBO4oyWKYuyUWHQQM4ph1lnYWulwBOfhYi', 'admin@gmail.com', 'Admin', 'Admin', 0, 1),
(3, 'idalpemilik', NULL, '$2y$10$PII5TyM1zIX5LcDuBayQfeNljaP4lJgC9Adl.EPJCD0iu/y11CT3W', 'ihdalfahroni@gmail.com', 'Ihdal', 'Fahroni', 1, 0),
(4, 'vivivivi', NULL, '$2y$10$65DYa8atJhLqyztBtKupO.BJYZc0ZHVv8uFKyOQ/6m8EeGd7aKki2', 'devitaamalia@gmail.com', 'Devita', 'Amalia', 0, 0),
(12, 'enjikeren', NULL, '$2y$10$zAzVn5nZchFCQS.0APuaUuM82MjG.mXSITioGq7GAzmWcLwMQm2gS', 'enji@keren', 'enji', 'juwitaaa', 1, 0),
(13, 'jakejake', '1750662860_60e96f4f7f979c8e33be.png', '$2y$10$wIzYZosOQJFtO2M4REfvHeG4vNZAfp.GsRYtcFZW1oL4KzrER99S.', 'jakeperalta@gmail.com', 'jake', 'peralta', 0, 0),
(14, 'lindakeren', '1750665350_0104f0add5f84cf3b0d4.jpg', '$2y$10$Fw.Q8EgZdw2baHgEsRgTQ.SVoMj1Fv8da1SHA7k.ioftzwhPzA8DC', 'lindameivia@123', 'linda', 'meivia', 1, 0),
(15, 'halohalo', NULL, '$2y$10$mCABOFzQCqaVUZUrdUzHQeW.zIY13iDH891nvwCFUz6gjs3BLY5Fq', 'halo@123', 'halo', 'keren', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_klaim`
--

CREATE TABLE `form_klaim` (
  `ID_formKlaim` int(11) NOT NULL,
  `ID_akun` int(11) DEFAULT NULL,
  `ID_tempat` int(11) NOT NULL,
  `nama_lengkap` tinytext NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `npwp` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dokumen_pendukung` varchar(500) DEFAULT NULL,
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_klaim`
--

INSERT INTO `form_klaim` (`ID_formKlaim`, `ID_akun`, `ID_tempat`, `nama_lengkap`, `no_hp`, `npwp`, `email`, `dokumen_pendukung`, `is_verified`) VALUES
(2, 12, 2, 'anggijuwita', '123', '123', 'angg@123', '1750573768_2a978a9f4f5d6436809e.png', 1),
(3, 12, 7, 'anggijuiwta', '123', '123', 'ang@123', '1750587598_8f7f335d2ffc3c37e499.png', 1),
(4, 12, 9, 'anggijuwita', '123', '123', 'ang@123', '1750587621_6f27759d295fee5b40f5.png', 2),
(5, 14, 5, 'Linda Meivia', '08890065808', '12345', 'lindameivia@123', '1750665539_f096396cc6bfa2b97a70.png', 2),
(6, 14, 6, 'Linda Meivia', '12345', '12345', 'lindakeren@123', '1750666396_2bd5854ed60bb2d82193.png', 2),
(7, 14, 7, 'linda meivia', '123', '123', 'linda@123', '1750675443_9f6179b15f4951c63a86.png', 2),
(8, 12, 8, 'anggi juwita', '123', '123', 'anggi@123', '1750814328_0a900e259db95b305498.png', 2),
(9, 15, 24, 'Halohalo', '123', '123', 'halo@123', '1750835287_8fabe72f136bb905579a.png', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `form_pengajuantempat`
--

CREATE TABLE `form_pengajuantempat` (
  `ID_formPengajuanTempat` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `kabupaten_kota` enum('Mataram','Lombok Barat','Lombok Tengah','Lombok Timur','Lombok Utara') NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `nama_jalan` varchar(255) NOT NULL,
  `kategori` enum('tourist_destination','culinary') NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `harga_tiket` int(20) DEFAULT NULL,
  `google_maps` varchar(255) NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `form_pengajuantempat`
--

INSERT INTO `form_pengajuantempat` (`ID_formPengajuanTempat`, `ID_akun`, `nama_tempat`, `kabupaten_kota`, `kecamatan`, `kelurahan`, `nama_jalan`, `kategori`, `foto`, `deskripsi`, `harga_tiket`, `google_maps`, `is_verified`) VALUES
(9, 4, 'University Mataram', 'Mataram', 'Mataram', 'Mataram', 'Mataram', 'tourist_destination', NULL, 'Place to study', 0, 'https://maps.app.goo.gl/HEwVdnt4FUnoi9LF9', 1),
(10, 14, 'Pantai Senggigi', 'Lombok Barat', 'Senggigi', 'Senggigi', 'Jalan Raya Senggigi', 'tourist_destination', '1750665452_16445664a588bc3698f9.png', 'Pantai pasir putih', 0, 'https://maps.app.goo.gl/X64zuWLase3ZAKQS8', 2),
(11, 12, 'Kebalen', 'Mataram', 'Mataram', 'Punia', 'Jalan Majapahit', 'culinary', NULL, 'Tempat makan', 0, 'https://maps.app.goo.gl/QVMMBosr6k7AdEXL9', 2);

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
(1, 2, 'Pelecing.png', 'Pelecing Kangkung', 'Kale(kangkung) blanched (or steamed) and served cold with spicy tomato chili sauce', 10000),
(4, 2, NULL, 'Nasi Puyung', 'soalnya gaada isinya', 0);

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

--
-- Dumping data untuk tabel `notifikasi`
--

INSERT INTO `notifikasi` (`ID_notif`, `ID_akun`, `header`, `isi_notif`, `tanggal_jam`) VALUES
(21, 1, 'Request for new place addition', 'vivivivi has submitted a request to add a new place.', '2025-06-23 13:54:47'),
(22, 1, 'Request for new place addition', 'lindakeren has submitted a request to add a new place.', '2025-06-23 15:57:32'),
(23, 1, 'Request for culinary site claim', 'lindakeren has submitted a request to claim a culinary site.', '2025-06-23 15:58:59'),
(24, 3, 'Your review has been deleted', 'Your review has been deleted because offensive.', '2025-06-23 16:00:34'),
(25, 14, 'New place Approved', 'Request for \'Pantai Senggigi\' has been approved. You can search for \'Pantai Senggigi\' from now on.', '2025-06-23 16:02:17'),
(26, 14, 'Claim Approved', 'Claim for \'Elamu Lombok\' has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on.', '2025-06-23 16:03:23'),
(27, 1, 'Request for culinary site claim', 'lindakeren has submitted a request to claim a culinary site.', '2025-06-23 16:13:16'),
(28, 14, 'Claim Approved', 'Claim for \'Boom Burger\' has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on.', '2025-06-23 16:13:53'),
(29, 1, 'Request for culinary site claim', 'lindakeren has submitted a request to claim a culinary site.', '2025-06-23 18:44:03'),
(30, 14, 'Claim Approved', 'Claim for \'The Breakery\' has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on.', '2025-06-23 18:44:25'),
(31, 1, 'Request for culinary site claim', 'enjikeren has submitted a request to claim a culinary site.', '2025-06-25 09:18:48'),
(32, 14, 'Your review has been deleted', 'Your review has been deleted because offensive.', '2025-06-25 09:19:55'),
(33, 12, 'Claim Approved', 'Claim for \'Verve Beach Club\' has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on.', '2025-06-25 09:21:56'),
(34, 1, 'Request for new place addition', 'enjikeren has submitted a request to add a new place.', '2025-06-25 09:24:57'),
(35, 12, 'New place Approved', 'Request for \'Kebalen\' has been approved. You can search for \'Kebalen\' from now on.', '2025-06-25 09:25:26'),
(36, 1, 'Request for culinary site claim', 'halohalo has submitted a request to claim a culinary site.', '2025-06-25 15:08:07'),
(37, 15, 'Claim Approved', 'Claim for \'Kebalen\' has been approved. You can edit the information about the culinary site such as place description, menu and promo from now on.', '2025-06-25 15:08:32'),
(38, 4, 'New place Denied', 'Request for \'University Mataram\' has been denied. Please check the information you provide.', '2025-07-01 10:58:10');

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
(4, 2, 'Discount 100%', 'gratiisss', '2025-06-24');

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
(1, 3, 1, 'Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. \r\nPantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan \r\nderetan warung yang menyajikan makanan lokal dan minuman segar.', 4.50, 'review_selong_belanak.png', '2025-06-09 08:00:00'),
(2, 3, 2, 'Pegawainya ramah, pagi2 menu sudah banyak yang siap, tempatnya bersih, kalau untuk rasa saya agak kurang cocok, makanan yang saya pesan rawon dan gulai kambing.', 4.70, 'review_sumberRejeki.png', '2025-06-09 03:09:58'),
(8, 4, 2, 'Rumah makan ramah pembeli, ramah harga juga', 4.90, NULL, '2025-06-23 13:47:06'),
(10, 12, 3, 'sangat bagusss', 5.00, NULL, '2025-06-23 21:45:14'),
(11, 14, 7, 'sangat enak croissantnya', 4.90, NULL, '2025-06-24 21:35:56'),
(12, 13, 3, 'Tempatnya bagus sekali, tetapi jalannya sangat jauh dari parkiran ke atas bukitnya', 3.00, '1751336656_12e1fa67aa6315534ee4.png', '2025-07-01 10:24:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tempat`
--

CREATE TABLE `tempat` (
  `ID_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `kabupaten_kota` enum('Mataram','Lombok Barat','Lombok Tengah','Lombok Timur','Lombok Utara') NOT NULL,
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
(1, 'Selong Belanak Beach', 'Lombok Tengah', 'West Praya ', 'Selong Belanak', 'Selong Belanak Street', 'tourist_destination', 'Selong Belanak Beach is one of the most stunning beach destinations in Lombok, West Nusa Tenggara. This beach is perfect for travelers looking to relax, soak up the sun, or learn to surf, as the waves at the end of the beach are calm enough for beginners. Along the beach, visitors can also find a row of stalls serving local food and refreshing drinks. The main attraction at Selong Belanak Beach is the sunset view.', 'SelongBelanakPic.png', 'https://maps.app.goo.gl/64PXP5dDJuWBxW5W6', 10000, NULL),
(2, 'Rumah Makan Sumber Rejeki', 'Lombok Tengah', 'Praya', 'Panjisari', 'Mareje Street', 'culinary', 'RM Sumber Rejeki is a traditional Indonesian restaurant that serves various home-style dishes with authentic flavors. The signature dishes at RM Sumber Rejeki include fried chicken, grilled fish, sour vegetable soup, tempeh with chili sauce, and a spicy chili sauce that is sure to tantalize your taste buds. The restaurant\'s simple yet comfortable atmosphere makes dining here an enjoyable experience, perfect for family lunches or group meals with tourists. The friendly and efficient service at RM Sumber Rejeki is another major draw, attracting many customers.', 'sumber_rejeki.png', 'https://maps.app.goo.gl/aEu7SmWdVg7CFdYE7', NULL, 3),
(3, 'Merese Hill', 'Lombok Tengah', 'Pujut', 'Kuta', 'Jalan Kuta Lombok', 'tourist_destination', 'Bukit Merese showcases the beauty of the sea view with its stunning white sand with a vast expanse of grass. Its beauty also gives a more organic impression supported by the many buffaloes that roam around the hills.\r\nBukit Merese is one of the best locations in Lombok to enjoy the beauty of sunrise and sunset. This area presents a variety of natural beauty in one, including white sand beaches, mesmerizing blue seas, rolling hills, and vast green pastures accompanied by several buffaloes.', 'BukitMerese.jpg', 'https://maps.app.goo.gl/cQqnxCGfjcndYBuU7', 10000, NULL),
(4, 'Tanjung Aan Beach', 'Lombok Tengah', 'Pujut', 'Kuta', 'Jalan Kuta Lombok', 'tourist_destination', 'Tanjung Aan Beach is directly facing the Indian Ocean, has a long curved coastline of about 2 km distance. beaches are usually small and fine grains but here the grains of sand are large rounds like peppercorns. This beach destination is perfect for those of you who like to swim and enjoy the beauty of the beach. The reason is, the waves there are quite calm and have a fairly shallow depth.', 'TanjungAan.png', 'https://maps.app.goo.gl/CtRrETyoBse73ZKy9', 10000, NULL),
(5, 'Elamu Lombok', 'Lombok Tengah', 'Pujut', 'Kuta', 'Jl. Pariwisata Pantai Kuta', 'culinary', 'Elamu is a Greek home-cooking restaurant located in Kuta, Lombok. We offer authentic Greek cuisine and beverages, creating an atmosphere reminiscent of the ambiance in Greece.', 'ElamuLombok.png', 'https://maps.app.goo.gl/S3f71q8w9tDE2Bh58', NULL, 14),
(6, 'Boom Burger', 'Lombok Tengah', 'Pujut', 'Kuta', 'Jl. Pariwisata Kuta', 'culinary', 'This warung selling burgers and kebab, also some drinks, and fries. This warung open from 5.30 PM until late. ', 'BoomBurger.png', 'https://maps.app.goo.gl/aCfG3cA9Jfo4Ncxo8', NULL, 14),
(7, 'The Breakery', 'Lombok Tengah', 'Pujut', 'Kuta', 'Jalan Raya Kuta', 'culinary', 'The Breakery is located in Kuta, Lombok. This cafe is the only one cafe that provide fresh french bakery and pastry. Also, we provide many types of bread and coffee. This bakery have the best croissant in town. A small Paris in kuta, best pastry and croissant so far in lombok. Fresh ans warm everymorning with awsome coffee, was perfect for my breaky.', 'TheBreakery.png', 'https://maps.app.goo.gl/kTiUvAbWNyvUzdn48', NULL, 14),
(8, 'Verve Beach Club', 'Lombok Barat', 'Batu Layar', 'Senggigi', 'Jalan Raya Senggigi', 'culinary', 'Beach Club and Pizzaria The biggest and best pizza on Lombok together with the coldest drinks and an amazing dessert menu', 'Verve.png', 'https://maps.app.goo.gl/VxVza5EeLfWkzPAn8', NULL, 12),
(9, 'Cantina Mexicana', 'Lombok Tengah', 'Pujut', 'Kuta', 'Jalan Raya Kuta', 'culinary', 'Cantina Mexicana is a restaurant that serves Tex-Mex cuisine, a fusion of Northern Mexican and American dishes, with Spanish influences. They are known for a variety of quick and delicious dishes, such as tacos and tortilla-based dishes. Cantina Mexicana also offers multigrain tortillas that are popular for kebabs, burritos, tacos and enchiladas.', 'CantinaMexicana.png', 'https://maps.app.goo.gl/XvFDqJyPSREQcToM6', NULL, 12),
(10, 'Mawun Beach', 'Lombok Tengah', 'Pujut', 'Tumpak', 'Jalan Pantai Mawun', 'tourist_destination', 'Pantai dengan pasir putih, ombak yang tidak terlalu besar, sangat cocok untuk berenang dan surfing', 'MawunBeach.png', 'https://maps.app.goo.gl/k8QYDQH8jSt6PWB48', 10000, NULL),
(11, 'Pandanan Beach', 'Lombok Utara', 'Pemenang', 'Malaka', 'Jalan Raya Malimbu', 'tourist_destination', 'Pantai dengan pasir putih, bisa menyewa kano untuk ke tengah pantai, pantai yang cocok untuk berenang.', 'PandananBeach.png', 'https://maps.app.goo.gl/2f5wxFsxxkbde4MH7', 10000, NULL),
(12, 'Mount Rinjani', 'Lombok Timur', 'Sembalun', 'Sembalun Lawang', 'Jalan Sembalun Bubung', 'tourist_destination', 'Mount Rinjani is the second highest active volcano in Indonesia, reaching an altitude of 3,726 meters above sea level. Located on the island of Lombok, West Nusa Tenggara, the mountain is a favorite of hikers for its stunning natural beauty. Mount Rinjani has a large crater, Segara Anak, and a crater lake with incredible views.', 'RinjaniPic.png', 'https://maps.app.goo.gl/soaY1LDmuyZpC1CE8', 150000, NULL),
(17, 'Gili Kondo', 'Lombok Timur', 'Sambelia', 'Gili Kondo', 'Gili Kondo', 'tourist_destination', 'Gili dengan pasir putih, dan hutan kecil dengan pepohonan hijau, air pantai biru muda yang sangat jernih.', '1750480620_7fcc98288ae92794be6e.png', 'https://maps.app.goo.gl/yrTALvkEg5eJ3pgZ7', 150000, NULL),
(18, 'Taman Wisata Pusuk Sembalun', 'Lombok Timur', 'Sembalun', 'Sembalun Bumbung', 'Jalan Wisata Gunung Rinjani', 'tourist_destination', 'Bukit yang dikelilingi oleh bukit-bukit lain di sekeliling Gunung Rinjani, dengan kabut dan hawa dingin yang sangat khas dari tempat wisata ini.', '1750479438_35ff0ef1c17cd6aab9aa.png', 'https://maps.app.goo.gl/tpVyGRt51nnEEXeS8', 10000, NULL),
(22, 'Gili Goleng', 'Lombok Barat', 'Sekotong', 'Batu Putih', 'Labuan Poh', 'tourist_destination', 'Gili yang sangat sepi cocok untuk keluarga', '1750656193_c88a0d969507b3215c9f.png', 'https://maps.app.goo.gl/nfGeyUvFmk5quaZN8', 200000, NULL),
(23, 'Pantai Senggigi', 'Lombok Barat', 'Senggigi', 'Senggigi', 'Jalan Raya Senggigi', 'tourist_destination', 'Pantai pasir putih', '1750665452_16445664a588bc3698f9.png', 'https://maps.app.goo.gl/X64zuWLase3ZAKQS8', 0, NULL),
(24, 'Kebalen', 'Mataram', 'Mataram', 'Punia', 'Jalan Majapahit', 'culinary', 'Tempat makan', NULL, 'https://maps.app.goo.gl/QVMMBosr6k7AdEXL9', 0, 15),
(25, 'Bakso Widodo', 'Mataram', 'Mataram Timur', 'Cemara', 'Jalan Hos Cokroaminoto', 'culinary', 'Bakso enak', 'bakso_widodo.png', 'https://maps.app.goo.gl/hCau57WbmrPEercz6', NULL, NULL);

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
  ADD KEY `form_klaim_ibfk_1` (`ID_akun`),
  ADD KEY `form_klaim_ibfk_2` (`ID_tempat`);

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
  ADD KEY `tempat_ibfk_1` (`ID_akun`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `form_klaim`
--
ALTER TABLE `form_klaim`
  MODIFY `ID_formKlaim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  MODIFY `ID_formPengajuanTempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `ID_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tempat`
--
ALTER TABLE `tempat`
  MODIFY `ID_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `form_klaim`
--
ALTER TABLE `form_klaim`
  ADD CONSTRAINT `form_klaim_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_klaim_ibfk_2` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`);

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
  ADD CONSTRAINT `tempat_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
