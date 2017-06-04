-- phpMyAdmin SQL Dump
-- version 4.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 22, 2017 at 06:49 PM
-- Server version: 5.6.22
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `arduino_sensor`
--

-- --------------------------------------------------------

--
-- Table structure for table `arduino`
--

CREATE TABLE IF NOT EXISTS `arduino` (
`id` int(20) NOT NULL,
  `suhu` int(20) NOT NULL,
  `kelembapan` int(20) NOT NULL,
  `cahaya` int(20) NOT NULL,
  `waktu` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `arduino`
--

INSERT INTO `arduino` (`id`, `suhu`, `kelembapan`, `cahaya`, `waktu`) VALUES
(60, 500, 59, 99, '2017-04-14 11:33:59'),
(61, 29, 59, 99, '2017-04-15 11:34:39'),
(62, 28, 59, 99, '2017-04-16 11:35:19'),
(63, 27, 59, 99, '2017-04-17 11:36:00'),
(79, 100, 200, 300, '2017-04-21 18:21:20'),
(80, 150, 90, 18, '2017-04-21 18:21:20'),
(81, 500, 300, 200, '2017-04-21 18:24:02'),
(82, 450, 90, 98, '2017-04-21 18:24:02'),
(83, 300, 10, 100, '2017-04-21 18:33:18'),
(84, 400, 200, 100, '2017-04-22 06:00:18'),
(85, 300, 100, 900, '2017-04-22 06:00:18'),
(86, 300, 100, 50, '2017-04-22 06:01:27'),
(87, 600, 500, 100, '2017-04-22 06:01:27'),
(88, 600, 700, 100, '2017-04-12 00:00:00'),
(89, 100, 800, 200, '2017-04-22 06:04:56'),
(90, 231, 555, 343, '2017-04-22 06:05:16'),
(91, 123, 324, 143, '2017-04-22 06:05:16'),
(92, 324, 344, 222, '2017-04-22 06:05:37'),
(93, 567, 864, 555, '2017-04-22 06:05:37'),
(94, 213, 123, 123, '2017-04-22 06:06:18'),
(95, 213, 123, 123, '2017-04-22 06:06:18'),
(96, 400, 10, 800, '2017-04-22 06:07:12'),
(97, 700, 250, 50, '2017-04-22 06:07:12'),
(98, 100, 20, 500, '2017-04-22 06:14:52'),
(99, 700, 350, 100, '2017-04-22 06:14:52'),
(100, 10, 20, 50, '2017-04-22 06:15:15'),
(101, 70, 390, 400, '2017-04-22 06:15:15'),
(102, 800, 500, 100, '2017-04-22 15:54:04'),
(103, 100, 800, 300, '2017-04-22 15:54:04');

-- --------------------------------------------------------

--
-- Table structure for table `setting_website`
--

CREATE TABLE IF NOT EXISTS `setting_website` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(50) NOT NULL,
  `logo` text NOT NULL,
  `moto` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting_website`
--

INSERT INTO `setting_website` (`id`, `name`, `description`, `contact`, `email`, `address`, `city`, `logo`, `moto`) VALUES
(1, 'Marskproperti.com', 'Marksproperti merupakan website dengan spesialis properti di Batu-Malang dengan menerapkan Marketing Strategy yang tepat sasaran bagi kebijakan pemasaran properti anda. Kami menerapkan Internet Marketing dan Social Media Marketing yang terintegrasi agar properti yang anda iklankan dapat menemukan customer potensial sesuai dengan target market anda.', '08962399782', 'admin@marksproperti.com', 'Batu', 'Batu Kota', 'MCQaF7mTYE.png', 'Melayani dengan senang hati');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` enum('A') NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 'administrator', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `arduino`
--
ALTER TABLE `arduino`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting_website`
--
ALTER TABLE `setting_website`
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
-- AUTO_INCREMENT for table `arduino`
--
ALTER TABLE `arduino`
MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `setting_website`
--
ALTER TABLE `setting_website`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
