-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 18, 2024 at 11:56 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_yuda`
--

-- --------------------------------------------------------

--
-- Table structure for table `caraousel`
--

CREATE TABLE `caraousel` (
  `id_caraousel` int NOT NULL,
  `judul` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `caraousel`
--

INSERT INTO `caraousel` (`id_caraousel`, `judul`, `foto`) VALUES
(16, '2', '20241119073741.jpg'),
(19, '1', '20241216164035.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(3, 'Basket'),
(5, 'Sepak Bola'),
(6, 'Voli');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int NOT NULL,
  `judul_website` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `profil_website` text COLLATE utf8mb4_general_ci NOT NULL,
  `instagram` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `no_wa` varchar(30) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `judul_website`, `profil_website`, `instagram`, `facebook`, `email`, `alamat`, `no_wa`) VALUES
(1, 'BeritaOlahraga', 'born in karanganyar 24-11-2007', 'https://www.instagram.com/yudaapiipp/', 'https://www.facebook.com/', 'yudhaafif16@gmail.com', 'Perum Kalingga, Tasikmadu, Karanganyar', '62 882006890428');

-- --------------------------------------------------------

--
-- Table structure for table `konten`
--

CREATE TABLE `konten` (
  `id_konten` int NOT NULL,
  `judul` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `slug` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `id_kategori` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `konten`
--

INSERT INTO `konten` (`id_konten`, `judul`, `keterangan`, `foto`, `slug`, `id_kategori`, `tanggal`, `username`) VALUES
(14, 'Timnas Indonesia Kalah', 'Timnas Indonesia tidak perlu merasa kecewa atas kekalahan tipis 0-1 dari Vietnam dalam pertandingan Grup B Piala AFF 2024 yang berlangsung di Stadion Phu Tho, Viet Tri, pada Minggu (15/12/2024) malam WIB.\r\n\r\nJustru, hal ini seharusnya menjadi pelajaran berharga untuk perkembangan karier para pemain muda Timnas Indonesia di kancah Internasional. ', '20241216155004.jpg', 'Timnas-Indonesia-Kalah', '5', '2024-12-16', 'admin'),
(15, 'Sananta Menurun?', 'Pelatih Persis Solo, Ong Kim Swee, optimis penyerang andalannya, Ramadhan Sananta, bisa kembali menemukan ketajamannya dalam kompetisi BRI Liga 1 2024/2025. Meskipun musim ini penyerang berusia 22 tahun tersebut mengalami penurunan signifikan dalam produktivitas gol, Ong yakin Sananta masih bisa kembali bersinar.\r\n\r\nSelama musim ini, Ramadhan Sananta baru berhasil mencetak satu gol dan satu assist dalam 14 pertandingan bersama Persis Solo. Angka ini sangat kontras dengan catatan golnya di musim-musim sebelumnya.\r\n\r\nPenurunan tersebut membuat banyak pihak bertanya-tanya tentang penyebab turunnya performa Sananta. Ong Kim Swee pun mengungkapkan beberapa faktor yang berperan dalam kesulitan Sananta kali ini. ', '20241216155316.jpg', 'Sananta-Menurun?', '5', '2024-12-16', 'admin'),
(16, 'Kemenangan Man United', 'Kemarin malam, Manchester United bertamu ke Etihad Stadium. Mereka menantang Manchester City di pertandingan EPL 2024/2025.\r\n\r\nDi laga ini, Manchester United berhasil memetik kemenangan secara dramatis. Mereka mengalahkan The Cityzens dengan skor 2-1 setelah tertinggal 1-0 terlebih dahulu.\r\n\r\nNamun kemenangan Setan Merah ini harus dibayar mahal. Karena ada pemain mereka yang tumbang akibat cedera. ', '20241216155531.jpg', 'Kemenangan-Man-United', '5', '2024-12-16', 'admin'),
(17, 'Liverpool puncak Klasemen', 'Liverpool terus mendominasi klasemen Liga Inggris setelah mengalahkan Newcastle United 3-0. Mohamed Salah menjadi pemain kunci dengan mencetak dua assist dan satu gol. Kemenangan ini mengukuhkan posisi Liverpool di puncak klasemen dengan 34 poin dari 13 pertandingan, unggul jauh dari Arsenal dan Chelsea ', '20241216155840.jpg', 'Liverpool-puncak-Klasemen', '5', '2024-12-16', 'admin'),
(18, 'Palmer Bersinar', 'Chelsea berhasil mengamankan kemenangan penting atas Southampton dengan skor 3-1 di pekan ke-14 Liga Inggris. Cole Palmer mencetak dua gol, memperkuat posisinya sebagai salah satu pemain muda paling menjanjikan musim ini. Kemenangan ini mengangkat Chelsea ke peringkat kedua klasemen sementara, bersaing ketat dengan Arsenal ', '20241216160042.jpg', 'Palmer-Bersinar', '5', '2024-12-16', 'admin'),
(19, 'Timnas Voli juara', 'Timnas voli putra Indonesia sukses mempertahankan gelar juara SEA Games setelah mengalahkan Thailand di babak final. Dengan permainan impresif dari kapten Rivan Nurmulki, Indonesia menang dengan skor 3-1. Ini menjadi gelar keempat berturut-turut bagi Indonesia di ajang SEA Games​   ', '20241216160349.jpg', 'Timnas-Voli-juara', '6', '2024-12-16', 'admin'),
(20, 'Turnamen Voli Pantai Dunia', 'Timnas voli putra Indonesia sukses mempertahankan gelar juara SEA Games setelah mengalahkan Thailand di babak final. Dengan permainan impresif dari kapten Rivan Nurmulki, Indonesia menang dengan skor 3-1. Ini menjadi gelar keempat berturut-turut bagi Indonesia di ajang SEA Games​ ', '20241216160638.jpg', 'Turnamen-Voli-Pantai-Dunia', '6', '2024-12-16', 'admin'),
(21, 'Italia Kalahkan Polandia', 'Italia sukses merebut gelar juara Liga Voli Eropa 2024 dengan mengalahkan Polandia di laga final. Dengan kombinasi permainan cepat dan blok solid, Italia meraih kemenangan 3-1, sekaligus membalas kekalahan mereka di turnamen sebelumnya ', '20241216160800.jpg', 'Italia-Kalahkan-Polandia', '6', '2024-12-16', 'admin'),
(22, 'Pemain Baru Satria Muda', 'Satria Muda memastikan komposisi tim yang kuat untuk menghadapi IBL 2025 dengan merekrut mantan pemain asing RANS, menambah daya gedor di lini depan mereka', '20241216162800.jpg', 'Pemain-Baru-Satria-Muda', '3', '2024-12-16', 'admin'),
(23, 'HangTuah Jakarta Playoff', 'Dengan komposisi pemain yang lebih kompetitif, Hangtuah Jakarta yakin bisa menembus babak playoff IBL 2025, memperkuat posisinya di liga​', '20241216162838.jpg', 'HangTuah-Jakarta-Playoff', '3', '2024-12-16', 'admin'),
(24, 'Golden State Warriors', 'Warriors mengejutkan NBA dengan mengakuisisi Dennis Schroder dari Brooklyn Nets, memberikan dimensi baru pada skuad mereka untuk menghadapi musim ini', '20241216162949.jpg', 'Golden-State-Warriors', '3', '2024-12-16', 'admin'),
(25, 'MVP Giannis', 'Giannis memimpin Milwaukee Bucks ke final NBA Cup 2024 setelah menang 110-102 melawan Atlanta Hawks di semifinal​\r\n', '20241216163124.jpg', 'MVP-Giannis', '3', '2024-12-16', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `password`, `level`) VALUES
(1, 'admin', 'Yuda Aviv', '21232f297a57a5a743894a0e4a801fc3', 'Admin'),
(9, 'user', 'Yuda Aviv', 'ee11cbb19052e40b07aac0ca060c23ee', 'kontributor'),
(14, 'yuda', 'yuda', 'ac9053a8bd7632586c3eb663a6cf15e4', 'kontributor'),
(15, 'yudaaviv', 'yudaaviv', '0a1b818311a9e5ea7cf85fe8c3e9b39a', 'kontributor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `caraousel`
--
ALTER TABLE `caraousel`
  ADD PRIMARY KEY (`id_caraousel`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `caraousel`
--
ALTER TABLE `caraousel`
  MODIFY `id_caraousel` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `konten`
--
ALTER TABLE `konten`
  MODIFY `id_konten` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
