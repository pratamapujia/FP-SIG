-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 22 Jun 2021 pada 01.03
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sig2021`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id`, `email`, `password`) VALUES
(1, 'creadycelgie03@gmail.com', 'cready2000'),
(2, 'admin@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `map`
--

CREATE TABLE `map` (
  `id` int(11) NOT NULL,
  `desk` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `map`
--

INSERT INTO `map` (`id`, `desk`, `latitude`, `longitude`, `color`) VALUES
(1, 'Ibukota Abdya', '3.818570', '96.831841', 'Purple'),
(2, 'Kab.Aceh Jaya', '4.727890', '95.601373', 'Orange'),
(3, 'Ibukota Kotamadya Sabang', '5.909284', '95.304742', 'Yellow'),
(4, 'Ibukota Kotamadya Langsa', '4.476020', '97.952447', 'Blue');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rumah_sakit`
--

CREATE TABLE `rumah_sakit` (
  `id` int(11) NOT NULL,
  `rumah_sakit` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `jalan` varchar(60) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `longitude` varchar(50) NOT NULL,
  `latitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rumah_sakit`
--

INSERT INTO `rumah_sakit` (`id`, `rumah_sakit`, `type`, `jalan`, `telepon`, `longitude`, `latitude`) VALUES
(1, 'RS Islam Siti Hajar Sidoarjo', 'B', 'Jl. Raden Patah No. 70-72 Sidoarjo', '031-8921233', '112.72191743703706', '-7.457583034895495'),
(2, 'RS Umum Daerah Sidoarjo', 'B', 'Jl. Mojopahit No. 667, Sidoarjo', '031-8961649', '112.71636857900047', '-7.465415724633652'),
(3, 'RS Umum Mitra Keluarga Waru', 'B', ' Jl. Jend. S. Parman No. 8 Waru', '031-8543111', '112.72864492344772', '-7.362757509011884'),
(4, 'RS Umum Siti Khodijah Muhammadiyah Cbg Sepanjang', 'B', 'Jl. Raya Bebekan, Taman, Sidoarjo', '031-7882123', '112.69905904713427', '-7.34478678143712'),
(5, 'RS Ibu dan Anak Buah Delima', 'C', 'Jl. Sunandar Priyo Sudarmo 154, Sidoarjo', '031-8056911', '112.71343974943137', '-7.46300371251744'),
(6, 'RS Ibu dan Anak Kirana', 'C', 'Jl. Raya Ngelom No.87 Taman, Sidoarjo', '031-7881623', '112.69171148461297', '-7.349061500890957 '),
(7, 'RS Ibu dan Anak Pondok Tjandra', 'C', 'Jl. Mangga IE 225 Pondok Tjandra Indah', '031-8664488', '112.77922806038904', '-7.3452304449279335'),
(8, 'RS Ibu dan Anak Soerya', 'C', 'Jl. Raya Kalijaten 11-15 Taman, Sidoarjo', '031-7885011', '112.69175003138648', '-7.35214970045748'),
(9, 'RS Mata Fatma', 'C', 'Jl. Raya Kalijaten No. 40, Sidoarjo', '031-7879857', '112.69140308576792', '-7.353081423567451'),
(10, 'RS Mitra Keluarga Pondok Tjandra', 'C', 'Jl. Raya Taman Asri Kav DD No 1 - 8, Sidoarjo', '031-99691999', '112.7755061332148', '-7.3446541081679335'),
(11, 'RS Umum Al-Islam H. M. Mawardi', 'C', 'Jl. Kyai Mojo No.12A Jeruk Gamping Krian, Sidoarjo', '031-8973379', '112.58332314017164', '-7.4169688105316185'),
(12, 'RS Umum Anwar Medika', 'C', 'Jl. Raya By Pass Krian KM 33 Semawut Balong Bendo ', '031-8972052', '112.55695252705209', '-7.409869753490279'),
(13, 'RS Umum Citra Medika', 'C', 'Jl. Raya Surabaya Mojokerto KM.44 Kramat Temenggung', '0321-361000', '112.46361071352128', '-7.432995109568284'),
(14, 'RS Umum Delta Surya', 'C', 'Jl. Pahlawan No. 09, Sidoarjo', '031-8962531', '112.70156839471804', '-7.447114963464538'),
(15, 'RS Arafah Anwar Medika Sukodono', 'D', 'Jl. Sawo No. 2 Dungus Sukodono', '031-8830989', '112.67299950093819', '-7.394144871065095'),
(16, 'RS TNI - AD (D.K.T)', 'D', 'Jl. Dr. Soetomo No.2, Sidoarjo', '031-8964610', '112.71656910499006', '-7.4446620296195665'),
(17, 'RS Pusura Candi', 'D', 'JL Raya Gelam No. 39, Sidoarjo', '031-99717449', '112.71236813838395', '-7.486642141373448'),
(18, 'RS Umum Rahman Rahim', 'D', 'Jl. Raya Saimbang No.10, Kebonagung, Sukodono', '031-8830010', '112.6716021851508', '-7.420769294631633'),
(19, 'RS Umum Prima Husada', 'D', 'Jl. Letjen Suprapto No.3, Kepuhkiriman, Waru', '031-8672303', '112.76626028231398', '-7.352869031663186'),
(20, 'RS Umum Mitra Sehat Mandiri Sidoarjo', 'D', 'Jl. Raya Krian - Mojosari KM 3 Tropodo Krian, Sidoarjo', '031-99891626', '112.57390205696879', '-7.431997725221014'),
(21, 'RS Umum Jasem', 'D', 'Jl. Samanhudi No.85 A, Sidoarjo', '031-8962129', '112.72179887414738', '-7.459344076546105'),
(22, 'RS Umum Assakinah Medika', 'D', 'Jl. Raya Kebon Agung No.65, Sambang, Kebonagung, Sukodono', '031-8832354', '112.67418294879293', '-7.4144007473375275'),
(23, 'RS Umum Aisyiyah Siti Fatimah', 'D', 'Jl. Kenongo No. 14 Tulangan, Sidoarjo', '031-8851840', '112.65293102906088', '-7.4857174505068205'),
(24, 'RS Umum Bunda', 'C', 'Jl. Kundi No 70 Kepuh Kiriman Waru Sidoarjo', '031-8668880', '112.77070813569156', '-7.3519022317883875'),
(25, 'RS Ibu & Anak Mitra Husada', 'C', 'Jl. Raya Sruni No.159, Dusun Sruni, SruniGedangan', '031-8917479', '112.72685581980053', '-7.40112342729076'),
(26, 'RS Arafah Anwar Medika Sukodono', 'D', 'Jl. Sawo No.2, Sukodono, Sidoarjo', '031-8830989', '112.67297707098784', '-7.394194699582011'),
(27, 'RS Sheila Medika', 'D', 'Jl Letjen Wahono No.77-79 bypass Juanda, Sedati Gede, Sedati', '0822-4425-1088', '112.75966192522202', '-7.371701283813661');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `map`
--
ALTER TABLE `map`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `map`
--
ALTER TABLE `map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `rumah_sakit`
--
ALTER TABLE `rumah_sakit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
