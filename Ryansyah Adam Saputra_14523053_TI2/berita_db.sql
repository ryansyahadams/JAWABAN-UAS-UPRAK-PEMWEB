-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 19, 2025 at 06:31 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `berita_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int NOT NULL,
  `title` varchar(150) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `title`, `thumbnail`, `content`) VALUES
(2, 'ayam', 'ayam.png', 'Ayam adalah hewan unggas yang tergolong dalam spesies Gallus gallus domesticus. Ayam merupakan salah satu hewan ternak paling banyak dipelihara di seluruh dunia karena memiliki nilai ekonomi yang tinggi, baik sebagai sumber protein hewani melalui daging maupun telur. Dalam sistem peternakan modern, ayam dibedakan menjadi dua jenis utama, yaitu ayam petelur dan ayam pedaging. Proses pemeliharaan ayam melibatkan pemberian pakan bergizi, pengendalian penyakit, serta pengelolaan lingkungan kandang yang baik agar produktivitas tetap optimal.'),
(3, 'kucing ', 'kucing.jpg', 'Di berbagai budaya, kucing telah menjadi hewan peliharaan yang sangat populer dan karena sifatnya yang tenang dan mudah beradaptasi dengan lingkungan manusia. Banyak orang memelihara kucing karena merasa terbantu secara emosional, terutama dalam mengatasi stres dan kesepian. Di media sosial, kucing bahkan menjadi ikon hiburan karena tingkah lakunya yang lucu dan menggemaskan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
