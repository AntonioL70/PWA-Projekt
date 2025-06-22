-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2025 at 11:52 PM
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
-- Database: `webvijesti`
--

-- --------------------------------------------------------

--
-- Table structure for table `clanci`
--

CREATE TABLE `clanci` (
  `id` int(11) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `naslov` varchar(200) NOT NULL,
  `sazetak` text NOT NULL,
  `sadrzaj` text NOT NULL,
  `kategorija` varchar(50) NOT NULL,
  `slika` varchar(255) NOT NULL,
  `prikazi` tinyint(1) NOT NULL DEFAULT 0,
  `datum_objave` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=cp1250 COLLATE=cp1250_croatian_ci;

--
-- Dumping data for table `clanci`
--

INSERT INTO `clanci` (`id`, `autor`, `naslov`, `sazetak`, `sadrzaj`, `kategorija`, `slika`, `prikazi`, `datum_objave`) VALUES
(21, 'wdawdawdawda', 'wdawdawdawd', 'awdawdawddawadaw', 'awdawdawdawdawdawdawdawd awdawdawd awd aw daw dawd ', 'Sport', 'img_68586da7bec0f.png', 1, '2025-06-22 20:55:03'),
(22, 'awdawd awdawd', 'awdawdawdawdawdawdawda', 'wdawdawdawdawdawdawdawd', 'awdawdawdawdawdawd', 'Sport', 'img_6858713e9b649.png', 1, '2025-06-22 21:10:22'),
(23, 'awdawdawdawdawd', 'awdawdawdawd', 'awdawdawdawda', 'wdawdawd', 'Sport', 'img_685871495e852.png', 1, '2025-06-22 21:10:33'),
(24, 'awdawdawdawdawdawd', 'awdawdawdawd', 'adwawdawdawdawd', 'awdawdawdawdaw dawd awdawd', 'Sport', 'img_68587154e08ff.png', 1, '2025-06-22 21:10:44'),
(25, 'awdawdawd', 'awdawd awda', 'wda wdawdawdawd awdaw', 'da wd awd awd awd', 'Sport', 'img_6858715f01f2a.png', 1, '2025-06-22 21:10:55'),
(26, 'asd asd', ' dawd awd', 'a wdd aw dawd ', 'aw daw dawd aw', 'Svijet', 'img_685871c872df6.png', 1, '2025-06-22 21:12:40'),
(27, 'a wdaw daw d', 'aw dawd awd awd', 'a wdaw dawd awd ', 'awd awd awd ', 'Svijet', 'img_685871d11969b.png', 1, '2025-06-22 21:12:49'),
(28, 'a wdawdaw daw daw', 'a wdaw daw dawd ', 'da dawd awd ad awd', 'a dawd awd awd awd awd awd', 'Svijet', 'img_685871dc1df03.png', 1, '2025-06-22 21:13:00'),
(29, 'awdaw daw dawd awd', 'd awd awdawd awd awd w', 'aw dawd awdaw dawd awd awd awd', 'd awd awdawd awd awd awdaawda w', 'Svijet', 'img_685871ec2c1ef.png', 1, '2025-06-22 21:13:16'),
(30, 'a wdawd awd awd awd aad', 'd awd awd awd awd daw a', 'a daw dawd awd awd aw', ' dawd awd awd awd a', 'Svijet', 'img_685871f83d4a2.png', 1, '2025-06-22 21:13:28'),
(31, 'awdawdawd awd awd', 'aw daw da wd aw', 'aw daw dawda wd aw', 'aw daw daw daw ', 'Svijet', 'img_685875fe4cba4.png', 0, '2025-06-22 21:30:38'),
(32, 'awda wdawdawdaw', 'aw dawdawdawd', 'awdawdawdawd', 'awdawdawd', 'Svijet', 'img_685876094cba0.png', 0, '2025-06-22 21:30:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clanci`
--
ALTER TABLE `clanci`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clanci`
--
ALTER TABLE `clanci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
