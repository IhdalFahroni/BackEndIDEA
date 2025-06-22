-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 10:05 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
-- Table structure for table `akun`
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
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`ID_akun`, `username`, `foto_profil`, `password`, `email`, `nama_depan`, `nama_belakang`, `is_pemilik`, `is_admin`) VALUES
(1, 'admin', NULL, '$2y$10$07UmwluqUZuJyELThW2jBO4oyWKYuyUWHQQM4ph1lnYWulwBOfhYi', 'admin@gmail.com', 'Admin', 'Admin', 0, 1),
(3, 'idalpemilik', NULL, '$2y$10$9D0/HOyGwMKoVGVhgQ0vQeQajOWGC3eU2r.A0piWI.r4wdfo/3GDu', 'ihdalfahroni@gmail.com', 'Ihdal', 'Fahroni', 1, 0),
(4, 'vivivi', NULL, '$2y$10$DOuBOqln9RMpioTHDoTITu5P3u2uHRDf2aQhNNOw6mk.iV6w6atjC', 'devitaamalia@gmail.com', 'Devita', 'Amalia', 0, 0),
(12, 'enjikeren', NULL, '$2y$10$zAzVn5nZchFCQS.0APuaUuM82MjG.mXSITioGq7GAzmWcLwMQm2gS', 'enji@keren', 'enji', 'juwitaaa', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_klaim`
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
-- Dumping data for table `form_klaim`
--

INSERT INTO `form_klaim` (`ID_formKlaim`, `ID_akun`, `ID_tempat`, `nama_lengkap`, `no_hp`, `npwp`, `email`, `dokumen_pendukung`, `is_verified`) VALUES
(2, 12, 2, 'anggijuwita', '123', '123', 'angg@123', '1750573768_2a978a9f4f5d6436809e.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `form_pengajuantempat`
--

CREATE TABLE `form_pengajuantempat` (
  `ID_formPengajuanTempat` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `nama_tempat` varchar(255) NOT NULL,
  `kabupaten_kota` enum('mataram','lombok_barat','lombok_tengah','lombok_timur','lombok_utara') NOT NULL,
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
-- Dumping data for table `form_pengajuantempat`
--

INSERT INTO `form_pengajuantempat` (`ID_formPengajuanTempat`, `ID_akun`, `nama_tempat`, `kabupaten_kota`, `kecamatan`, `kelurahan`, `nama_jalan`, `kategori`, `foto`, `deskripsi`, `harga_tiket`, `google_maps`, `is_verified`) VALUES
(1, 12, 'Pantai Parkiran', 'lombok_utara', 'Mangsit', 'Mangsit', 'Jalan Raya Senggigi', 'tourist_destination', '1750478769_8c1e0ebf108209fb6e5a.jpg', 'pantai dengan parkiran', 10000, 'https://maps.app.goo.gl/ES7BxjhcjqiP497JA', 0),
(2, 3, 'Taman Wisata Pusuk Sembalun', 'lombok_timur', 'Sembalun', 'Sembalun Bumbung', 'Jalan Wisata Gunung Rinjani', 'tourist_destination', '1750479438_35ff0ef1c17cd6aab9aa.png', 'Bukit yang dikelilingi oleh bukit-bukit lain di sekeliling Gunung Rinjani, dengan kabut dan hawa dingin yang sangat khas dari tempat wisata ini.', 10000, 'https://maps.app.goo.gl/tpVyGRt51nnEEXeS8', 0),
(3, 12, 'Gili Kondo', 'lombok_timur', 'Sambelia', 'Gili Kondo', 'Gili Kondo', 'tourist_destination', '1750480620_7fcc98288ae92794be6e.png', 'Gili dengan pasir putih, dan hutan kecil dengan pepohonan hijau, air pantai biru muda yang sangat jernih.', 150000, 'https://maps.app.goo.gl/yrTALvkEg5eJ3pgZ7', 0),
(4, 12, 'Pantai Serangan', 'lombok_tengah', 'Praya Barat', 'Serangan', 'Jalan Twin Peaks', 'tourist_destination', '1750489358_560b4869ca7fcbcf10e0.png', 'Pantai pasir putih keren', 5000, 'https://maps.app.goo.gl/6gjCFYXdRJXePjYz6', 0),
(5, 12, 'Pantai Serangan', 'lombok_tengah', 'Praya Barat', 'Serangan', 'Jalan Twin Peaks', 'tourist_destination', '1750489689_7f3f5f158b32b0bb24a0.png', 'Pantai pasir putih keren', 5000, 'https://maps.app.goo.gl/6gjCFYXdRJXePjYz6', 0),
(6, 12, 'Pantai Serangan', 'lombok_tengah', 'Praya Barat', 'Serangan', 'Jalan Twin Peaks', 'tourist_destination', '1750489701_baa12e5b1c77151f35de.png', 'Pantai pasir putih keren', 5000, 'https://maps.app.goo.gl/6gjCFYXdRJXePjYz6', 0);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
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
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`ID_menu`, `ID_tempat`, `foto_menu`, `nama_menu`, `deskripsi_menu`, `harga_menu`) VALUES
(1, 2, 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\Pelecing.png', 'Pelecing Kangkung', 'Kale(kangkung) blanched (or steamed) and served cold with spicy tomato chili sauce', 10000),
(2, 2, NULL, 'Nasi Puyung', 'A dish consisting of white rice, spicy shredded chicken, dried shredded chicken, plus fried peanuts and soybeans', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `ID_notif` int(11) NOT NULL,
  `ID_akun` int(11) NOT NULL,
  `header` varchar(255) NOT NULL,
  `isi_notif` text NOT NULL,
  `tanggal_jam` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`ID_notif`, `ID_akun`, `header`, `isi_notif`, `tanggal_jam`) VALUES
(1, 1, 'Request for new place addition', 'enjikeren has submitted a request to add a new place.', '2025-06-21 07:08:09'),
(3, 1, 'Request for culinary site claim', 'enjikeren has submitted a request to claim a culinary site.', '2025-06-22 06:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `ID_promo` int(11) NOT NULL,
  `ID_tempat` int(11) NOT NULL,
  `nama_promo` varchar(255) NOT NULL,
  `deskripsi_promo` varchar(500) NOT NULL,
  `valid_until` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`ID_promo`, `ID_tempat`, `nama_promo`, `deskripsi_promo`, `valid_until`) VALUES
(1, 2, 'Buy 2 Get 3', 'Buy 2 serving get 3 serving of Es Campur', '2025-10-01'),
(2, 2, 'Discount 10%', 'Every purchase over Rp100.000', '2025-07-31');

-- --------------------------------------------------------

--
-- Table structure for table `review`
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
-- Dumping data for table `review`
--

INSERT INTO `review` (`ID_review`, `ID_akun`, `ID_tempat`, `komentar`, `rating`, `foto`, `waktu`) VALUES
(1, 3, 1, 'Pantai Selong Belanak adalah salah satu destinasi pantai paling memukau di Lombok, Nusa Tenggara Barat. \r\nPantai ini sangat cocok untuk wisatawan yang ingin bersantai, menikmati matahari, atau belajar surfing—karena ombak di bagian ujung pantai cukup tenang untuk pemula. Di sepanjang pantai, pengunjung juga bisa menemukan \r\nderetan warung yang menyajikan makanan lokal dan minuman segar.', 4.50, 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\review_selong_belanak.png', '2025-06-09 08:00:00'),
(2, 3, 2, 'Pegawainya ramah, pagi2 menu sudah banyak yang siap, tempatnya bersih, kalau untuk rasa saya agak kurang cocok, makanan yang saya pesan rawon dan gulai kambing.', 4.70, 'C:\\xampp\\htdocs\\TubesWeb\\PemWebIDEA\\Assets\\review_sumberRejeki.png', '2025-06-09 03:09:58'),
(3, 12, 4, 'keren bgt oiiiii', 5.00, '1750508747_4f009b376a1610830153.png', '2025-06-21 12:25:47');

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
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
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`ID_tempat`, `nama_tempat`, `kabupaten_kota`, `kecamatan`, `kelurahan`, `nama_jalan`, `kategori`, `deskripsi`, `foto`, `google_maps`, `harga_tiket`, `ID_akun`) VALUES
(1, 'Selong Belanak Beach', 'lombok_tengah', 'West Praya ', 'Selong Belanak', 'Selong Belanak Street', 'tourist_destination', 'Selong Belanak Beach is one of the most stunning beach destinations in Lombok, West Nusa Tenggara. This beach is perfect for travelers looking to relax, soak up the sun, or learn to surf, as the waves at the end of the beach are calm enough for beginners. Along the beach, visitors can also find a row of stalls serving local food and refreshing drinks. The main attraction at Selong Belanak Beach is the sunset view.', 'SelongBelanakPic.png', 'https://maps.app.goo.gl/64PXP5dDJuWBxW5W6', 10000, NULL),
(2, 'RM Sumber Rejeki', 'lombok_tengah', 'Praya', 'Panjisari', 'Mareje Street', 'culinary', 'RM Sumber Rejeki is a traditional Indonesian restaurant that serves various home-style dishes with authentic flavors. The signature dishes at RM Sumber Rejeki include fried chicken, grilled fish, sour vegetable soup, tempeh with chili sauce, and a spicy chili sauce that is sure to tantalize your taste buds. The restaurant\'s simple yet comfortable atmosphere makes dining here an enjoyable experience, perfect for family lunches or group meals with tourists. The friendly and efficient service at RM Sumber Rejeki is another major draw, attracting many customers.', 'sumber_rejeki.png', 'https://maps.app.goo.gl/aEu7SmWdVg7CFdYE7', NULL, NULL),
(3, 'Merese Hill', 'lombok_tengah', 'Pujut', 'Kuta', 'Jalan Kuta Lombok', 'tourist_destination', 'Bukit Merese showcases the beauty of the sea view with its stunning white sand with a vast expanse of grass. Its beauty also gives a more organic impression supported by the many buffaloes that roam around the hills.\r\nBukit Merese is one of the best locations in Lombok to enjoy the beauty of sunrise and sunset. This area presents a variety of natural beauty in one, including white sand beaches, mesmerizing blue seas, rolling hills, and vast green pastures accompanied by several buffaloes.', 'BukitMerese.jpg', 'https://maps.app.goo.gl/cQqnxCGfjcndYBuU7', 10000, NULL),
(4, 'Tanjung Aan Beach', 'lombok_tengah', 'Pujut', 'Kuta', 'Jalan Kuta Lombok', 'tourist_destination', 'Tanjung Aan Beach is directly facing the Indian Ocean, has a long curved coastline of about 2 km distance. beaches are usually small and fine grains but here the grains of sand are large rounds like peppercorns. This beach destination is perfect for those of you who like to swim and enjoy the beauty of the beach. The reason is, the waves there are quite calm and have a fairly shallow depth.', 'TanjungAan.png', 'https://maps.app.goo.gl/CtRrETyoBse73ZKy9', 10000, NULL),
(5, 'Elamu Lombok', 'lombok_tengah', 'Pujut', 'Kuta', 'Jl. Pariwisata Pantai Kuta', 'culinary', 'Elamu is a Greek home-cooking restaurant located in Kuta, Lombok. We offer authentic Greek cuisine and beverages, creating an atmosphere reminiscent of the ambiance in Greece.', 'ElamuLombok.png', 'https://maps.app.goo.gl/S3f71q8w9tDE2Bh58', NULL, NULL),
(6, 'Boom Burger', 'lombok_tengah', 'Pujut', 'Kuta', 'Jl. Pariwisata Kuta', 'culinary', 'This warung selling burgers and kebab, also some drinks, and fries. This warung open from 5.30 PM until late. ', 'BoomBurger.png', 'https://maps.app.goo.gl/aCfG3cA9Jfo4Ncxo8', NULL, NULL),
(7, 'The Breakery', 'lombok_tengah', 'Pujut', 'Kuta', 'Jalan Raya Kuta', 'culinary', 'The Breakery is located in Kuta, Lombok. This cafe is the only one cafe that provide fresh french bakery and pastry. Also, we provide many types of bread and coffee. This bakery have the best croissant in town. A small Paris in kuta, best pastry and croissant so far in lombok. Fresh ans warm everymorning with awsome coffee, was perfect for my breaky.', 'TheBreakery.png', 'https://maps.app.goo.gl/kTiUvAbWNyvUzdn48', NULL, NULL),
(8, 'Verve Beach Club', 'lombok_barat', 'Batu Layar', 'Senggigi', 'Jalan Raya Senggigi', 'culinary', 'Beach Club and Pizzaria The biggest and best pizza on Lombok together with the coldest drinks and an amazing dessert menu', 'Verve.png', 'https://maps.app.goo.gl/VxVza5EeLfWkzPAn8', NULL, NULL),
(9, 'Cantina Mexicana', 'lombok_tengah', 'Pujut', 'Kuta', 'Jalan Raya Kuta', 'culinary', 'Cantina Mexicana is a restaurant that serves Tex-Mex cuisine, a fusion of Northern Mexican and American dishes, with Spanish influences. They are known for a variety of quick and delicious dishes, such as tacos and tortilla-based dishes. Cantina Mexicana also offers multigrain tortillas that are popular for kebabs, burritos, tacos and enchiladas.', 'CantinaMexicana.png', 'https://maps.app.goo.gl/XvFDqJyPSREQcToM6', NULL, NULL),
(10, 'Mawun Beach', 'lombok_tengah', 'Pujut', 'Tumpak', 'Jalan Pantai Mawun', 'tourist_destination', 'Pantai dengan pasir putih, ombak yang tidak terlalu besar, sangat cocok untuk berenang dan surfing', 'MawunBeach.png', 'https://maps.app.goo.gl/k8QYDQH8jSt6PWB48', 10000, NULL),
(11, 'Pandanan Beach', 'lombok_utara', 'Pemenang', 'Malaka', 'Jalan Raya Malimbu', 'tourist_destination', 'Pantai dengan pasir putih, bisa menyewa kano untuk ke tengah pantai, pantai yang cocok untuk berenang.', 'PandananBeach.png', 'https://maps.app.goo.gl/2f5wxFsxxkbde4MH7', 10000, NULL),
(12, 'Mount Rinjani', 'lombok_timur', 'Sembalun', 'Sembalun Lawang', 'Jalan Sembalun Bubung', 'tourist_destination', 'Mount Rinjani is the second highest active volcano in Indonesia, reaching an altitude of 3,726 meters above sea level. Located on the island of Lombok, West Nusa Tenggara, the mountain is a favorite of hikers for its stunning natural beauty. Mount Rinjani has a large crater, Segara Anak, and a crater lake with incredible views.', 'RinjaniPic.png', 'https://maps.app.goo.gl/soaY1LDmuyZpC1CE8', 150000, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`ID_akun`);

--
-- Indexes for table `form_klaim`
--
ALTER TABLE `form_klaim`
  ADD PRIMARY KEY (`ID_formKlaim`),
  ADD KEY `form_klaim_ibfk_1` (`ID_akun`),
  ADD KEY `form_klaim_ibfk_2` (`ID_tempat`);

--
-- Indexes for table `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  ADD PRIMARY KEY (`ID_formPengajuanTempat`),
  ADD KEY `form_pengajuantempat_ibfk_1` (`ID_akun`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_menu`),
  ADD KEY `ID_tempat` (`ID_tempat`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`ID_notif`),
  ADD KEY `ID_akun` (`ID_akun`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_promo`),
  ADD KEY `promo_ibfk_1` (`ID_tempat`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID_review`),
  ADD KEY `review_ibfk_1` (`ID_akun`),
  ADD KEY `ID_tempat` (`ID_tempat`);

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`ID_tempat`),
  ADD KEY `tempat_ibfk_1` (`ID_akun`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
  MODIFY `ID_akun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `form_klaim`
--
ALTER TABLE `form_klaim`
  MODIFY `ID_formKlaim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  MODIFY `ID_formPengajuanTempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `ID_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID_review` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `ID_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `form_klaim`
--
ALTER TABLE `form_klaim`
  ADD CONSTRAINT `form_klaim_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `form_klaim_ibfk_2` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`);

--
-- Constraints for table `form_pengajuantempat`
--
ALTER TABLE `form_pengajuantempat`
  ADD CONSTRAINT `form_pengajuantempat_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`);

--
-- Constraints for table `promo`
--
ALTER TABLE `promo`
  ADD CONSTRAINT `promo_ibfk_1` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ID_tempat`) REFERENCES `tempat` (`ID_tempat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tempat`
--
ALTER TABLE `tempat`
  ADD CONSTRAINT `tempat_ibfk_1` FOREIGN KEY (`ID_akun`) REFERENCES `akun` (`ID_akun`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
