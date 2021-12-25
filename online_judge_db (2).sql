-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 14, 2020 at 04:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_judge_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `nama`, `nim`, `password`, `id_admin`) VALUES
(1, 'Ahmad Syaifudin R', '19051204076', 'Syaifudin123', 1),
(2, 'Wahyu Dwi Prakoso', '19051204077', 'WahyuD1221', 2),
(4, 'Abdullah Azizi', '19051204055', '12345678', 2),
(5, 'Lumiere Silvamilion Clover', '19051204075', '97654321', 1),
(6, 'Muhammad Fakhri Ali A', '19051204098', '87654321', 2),
(7, 'Secre Swallowtail', '19051204056', '12345678', 1),
(8, 'Dony Kusuma', '18051204054', 'dony54321', 1),
(9, 'Asta', '17051204052', 'asta5210', 1),
(10, 'William Vangeance', '17051204053', 'william5321', 1);

-- --------------------------------------------------------

--
-- Table structure for table `result_test`
--

CREATE TABLE `result_test` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `token` varchar(255) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `nilai` float NOT NULL,
  `answear` varchar(1000) NOT NULL,
  `log_err1` varchar(500) NOT NULL,
  `log_err2` varchar(500) NOT NULL,
  `log_err3` varchar(500) NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result_test`
--

INSERT INTO `result_test` (`id`, `nama`, `token`, `nim`, `nilai`, `answear`, `log_err1`, `log_err2`, `log_err3`, `id_admin`) VALUES
(24, 'Ahmad Syaifudin R', '1011', '19051204076', 100, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 1),
(25, 'Wahyu Dwi Prakoso', '1011', '19051204077', 99.9, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 2),
(27, 'Abdullah Azizi', '1011', '19051204055', 100, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 2),
(30, 'Lumiere Silvamilion Clover', '1010', '19051204075', 99.9, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 1),
(32, 'Secre Swallowtail', '1010', '19051204056', 99.9, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 1),
(34, 'Dony Kusuma', '1010', '18051204054', 99.9, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 1),
(35, 'Asta', '1010', '17051204052', 99.9, 'I2luY2x1ZGUgPGlvc3RyZWFtPgojaW5jbHVkZTxzdGRpby5oPgp1c2luZyBuYW1lc3BhY2Ugc3RkOwppbnQgbWFpbigpIHsKICAgIGludCBiLGM7CiAgICBjaGFyIGFbMTBdOwogICAgc2NhbmYoIiVzIiwgJmEpOwogICAgY2luPj5iPj5jOwogICAgY291dDw8YTw8IiAiPDxiK2M7CiAgICByZXR1cm4gMDsKfQ==', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` int(11) NOT NULL,
  `id_soal` int(20) NOT NULL,
  `stdin` varchar(255) NOT NULL,
  `stdout` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `example_input` text NOT NULL,
  `example_output` text NOT NULL,
  `id_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `id_soal`, `stdin`, `stdout`, `question`, `example_input`, `example_output`, `id_admin`) VALUES
(1, 1010, 'SGVsbG8NCjQ1DQoxMg==', 'SGVsbG8gNTc=', 'Buatlah model penjumlahan\r\nsederhana dengan menambahkan\r\nsatu kata dan spasi di depan\r\nhasil penjumlahan. Dan satu\r\nkata di depan merupakan hasil\r\ninputan', 'Hello 45 56', 'Hello 101', 1),
(2, 1010, 'U2VsYW1hdA0KNTYNCjg5', 'U2VsYW1hdCAxNDU=', '', '', '', 1),
(3, 1010, 'U2VsYW1hdA0KNTYNCjg5', 'U2VsYW1hdCAxNDU=', '', '', '', 1),
(4, 1011, 'SGVsbG8NCjU2DQo4OQ==', 'SGVsbG8gMTMw', 'Buat program penjumlahan sederhana dengan penjumlahan satu string di depan hasil penjumlahn yang didapat dari input user', 'Hello 12 45 67', 'Hello 456', 2),
(5, 1011, 'SGVsbG8NCjU2DQoxMg==', 'SGVsbG8gMzc=', ' ', ' ', ' ', 2),
(6, 1011, 'SGVsbG8NCjQ1DQo3OQ==', 'SGVsbG8gMTUw', ' ', ' ', ' ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(11) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `nim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`id`, `email`, `password`, `nama`, `nim`) VALUES
(1, 'ahmad.19076@mhs.unesa.ac.id', '19051204076', 'Ahmad Syaifudin R', '19051204076');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nim`, `email`, `password`) VALUES
(1, 'Ahmmad Syaifudin Ramadhan', '19051204076', 'syaifudinramadhan@gmail.com', 'Syaifudin1012'),
(2, 'Dedy Yusuf', '19051204089', 'dedy.19089@mhs.unesa.ac.id', 'DedyY123'),
(4, 'Farro Axza', '19051204062', 'farroaxza@gmail.com', 'farroAxza22'),
(5, 'Muhammad Zaky R', '19051204058', 'muhammad.19058@mhs.unesa.ac.id', 'mzr22314');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result_test`
--
ALTER TABLE `result_test`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `result_test`
--
ALTER TABLE `result_test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
