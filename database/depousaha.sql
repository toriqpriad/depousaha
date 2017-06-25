-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 25, 2017 at 05:40 PM
-- Server version: 5.6.35
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `depousaha`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `description`, `update_at`) VALUES
(3, 'Testing Gallery 1', 'deskripsi test', '25-06-2017 04:06'),
(4, 'Testing Gallery 2', 'test', '25-06-2017 04:06'),
(5, 'Testing Gallery 3', '', '25-06-2017 04:06');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE IF NOT EXISTS `gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sort` int(11) NOT NULL,
  `update_at` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `name`, `sort`, `update_at`) VALUES
(1, 3, 'aMEapt.jpg', 1, '14-06-2017 07:06'),
(6, 3, 'iOMUZx.jpg', 3, ''),
(7, 3, 'gU4z9l.jpg', 2, ''),
(8, 3, 'FziDTM.png', 4, ''),
(13, 4, '3yejM0.jpg', 3, ''),
(14, 4, 'wkhHCp.jpg', 4, ''),
(15, 4, 'dEX7Lc.jpg', 1, ''),
(16, 5, 'r5U6Tz.jpg', 1, '25-06-2017 04:06'),
(17, 5, 'Ky9zRj.jpg', 2, '25-06-2017 04:06'),
(18, 5, 'xwnBVq.jpg', 3, '25-06-2017 04:06');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE IF NOT EXISTS `merchant` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `link` varchar(100) NOT NULL,
  `owner` varchar(200) DEFAULT NULL,
  `contact` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `description` text NOT NULL,
  `logo` text,
  `cover` text,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `name`, `link`, `owner`, `contact`, `address`, `email`, `description`, `logo`, `cover`, `update_at`) VALUES
(19, 'Balistic', 'balistic', 'Toriq', '089623993782', 'oke123                ', 'toriq.354@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'IpT3nl.jpg', 'P11nYT.jpg', '24-06-2017 07:06'),
(20, 'Merchant Cantik', 'merchantcantik', 'test123', '89123132', 'teasdadas                ', 'toqqew@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'H2cttu.jpg', 'Aq6Jba.jpg', '24-06-2017 04:06'),
(21, 'merchant 1', 'merchant1', 'owner 1', '089623131213', '                ', 'test@gmail.com', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '2dYqUQ.jpg', 'C8vKpE.jpg', '23-06-2017 01:06'),
(22, 'merchant 2', 'merchant2', 'merchant 2', '', '                ', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', '6F534S.jpg', '', '19-06-2017 04:06'),
(23, 'merchant 3', 'merchant3', 'merchant 3', '', '                ', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'rYgxRW.jpg', '', '19-06-2017 04:06'),
(24, 'merchant 5', 'merchant5', 'merchant 5', '', '                ', '', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using ''Content here, content here'', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'UbWPxF.jpg', '', '19-06-2017 04:06'),
(25, 'merchant 6', 'merchant6', 'merchant 5', '', '                ', '', '', 'FJ5UGA.jpg', '', '19-06-2017 04:06'),
(26, 'merchant 7', 'merchant7', 'merchant 7', '', '                ', '', '', '', '', '19-06-2017 04:06'),
(27, 'merchant 8', 'merchant8', 'merchant 8', '', '                ', '', '', '', '', '19-06-2017 04:06');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_promo`
--

CREATE TABLE IF NOT EXISTS `merchant_promo` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` text NOT NULL,
  `url` text NOT NULL,
  `description` text,
  `image` text,
  `active` char(1) NOT NULL DEFAULT 'N',
  `update_at` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_promo`
--

INSERT INTO `merchant_promo` (`id`, `merchant_id`, `name`, `link`, `url`, `description`, `image`, `active`, `update_at`) VALUES
(8, 19, 'Test terus', 'test-terus.html', 'http://google.com', '', '6Lv1Du.jpg', 'Y', '19-06-2017'),
(9, 19, 'testme', 'testme.html', '', '', 'P0aLeY.jpg', 'Y', '19-06-2017');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_socmed`
--

CREATE TABLE IF NOT EXISTS `merchant_socmed` (
  `id` int(11) NOT NULL,
  `socmed_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_socmed`
--

INSERT INTO `merchant_socmed` (`id`, `socmed_id`, `merchant_id`, `url`, `update_at`) VALUES
(20, 1, 21, '', '23-06-2017 01:06'),
(21, 2, 21, '', '23-06-2017 01:06'),
(22, 3, 21, '', '23-06-2017 01:06'),
(23, 4, 21, '', '23-06-2017 01:06'),
(24, 1, 20, 'fb.com/merchantcantik', '24-06-2017 04:06'),
(25, 2, 20, 'twitter.com/toriqpriad', '24-06-2017 04:06'),
(26, 3, 20, '', '24-06-2017 04:06'),
(27, 4, 20, '', '24-06-2017 04:06'),
(36, 1, 19, 'facebook.com/merchantganteng', '24-06-2017 07:06'),
(37, 2, 19, 'twtter.com/merchantganteng', '24-06-2017 07:06'),
(38, 3, 19, 'ig.com/merchantganteg', '24-06-2017 07:06'),
(39, 4, 19, '', '24-06-2017 07:06');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `dimension` varchar(200) DEFAULT NULL,
  `description` text,
  `merchant_id` int(11) NOT NULL,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `name`, `link`, `price`, `dimension`, `description`, `merchant_id`, `update_at`) VALUES
(101, 5, 'nugget', 'nugget.html', 0, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '19-06-2017 07:06'),
(102, 5, 'vila', 'vila.html', 0, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '15-06-2017 02:06'),
(103, 7, 'Kerajinan tangan 1', 'kerajinan-tangan-1.html', 2000, 'biji', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, '23-06-2017 04:06'),
(104, 7, 'Kerajinan tangan 2', 'kerajinan-tangan-2.html', 200, 'biji', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '19-06-2017 02:06'),
(105, 7, 'Kerajinan 3', 'kerajinan-3.html', 9000, 'ons', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, '19-06-2017 02:06'),
(106, 7, 'Kerajinan 4', 'kerajinan-4.html', 30000, '', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, '19-06-2017 02:06'),
(107, 5, 'Kripik Pisang ', 'kripik-pisang-.html', 120000, 'bungkus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '19-06-2017 02:06'),
(108, 5, 'Jajan', 'jajan.html', 300, 'bungkus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '19-06-2017 02:06'),
(109, 6, 'Meja', 'meja.html', 39090, 'unit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, '19-06-2017 07:06'),
(110, 6, 'Kursi', 'kursi.html', 9000, 'unit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '19-06-2017 07:06'),
(111, 6, 'Rumah', 'rumah.html', 6000, 'unit', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 20, '19-06-2017 02:06'),
(112, 6, 'gudang', 'gudang.html', 2313, 'ruangan', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 19, '19-06-2017 02:06'),
(115, 7, 'kerajinan 5', '', NULL, NULL, NULL, 19, NULL),
(116, 7, 'kerajinan 6', '', NULL, NULL, NULL, 19, NULL),
(117, 7, 'kerajinan 8', '', NULL, NULL, NULL, 19, NULL),
(118, 7, 'kerajinan 9', '', NULL, NULL, NULL, 19, NULL),
(119, 7, 'kerajinan 10', '', NULL, NULL, NULL, 19, NULL),
(120, 7, 'kerajinan 11', '', NULL, NULL, NULL, 19, NULL),
(121, 7, 'kerajinan 12', '', NULL, NULL, NULL, 19, NULL),
(122, 7, 'Kerajinan 13', '', NULL, NULL, NULL, 19, NULL),
(123, 7, 'Kerajinan 14', '', NULL, NULL, NULL, 19, NULL),
(124, 7, 'Kerajinan 15', '', NULL, NULL, NULL, 19, NULL),
(125, 7, 'Kerajinan 16', '', NULL, NULL, NULL, 19, NULL),
(126, 7, 'Kerajinan 17', '', NULL, NULL, NULL, 19, NULL),
(127, 7, 'Kerajinan 18', '', NULL, NULL, NULL, 19, NULL),
(128, 7, 'Kerajinan 19', '', NULL, NULL, NULL, 19, NULL),
(129, 7, 'Kerajinan 20', '', NULL, NULL, NULL, 19, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` text NOT NULL,
  `description` text,
  `update_at` varchar(45) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `link`, `description`, `update_at`) VALUES
(5, 'Makanan', 'makanan', 'Kategori Makanan', '07-06-2017 08:06'),
(6, 'Properti', 'properti', '', '19-06-2017 07:06'),
(7, 'Kerajinan Tangan', 'kerajinan-tangan', 'test', '21-06-2017 02:06');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE IF NOT EXISTS `product_images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `name` text,
  `sort` char(10) NOT NULL,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `name`, `sort`, `update_at`) VALUES
(1, 103, 'c35MCr.png', '0', '19-06-2017 02:06'),
(2, 104, 'RBny63.png', '0', '19-06-2017 02:06'),
(3, 105, '8ABFim.PNG', '0', '19-06-2017 02:06'),
(4, 106, 'fmYqcb.jpg', '0', '19-06-2017 02:06'),
(5, 107, 'nacLwv.jpg', '0', '19-06-2017 02:06'),
(6, 108, 'zUQmMO.jpg', '0', '19-06-2017 02:06'),
(8, 110, 'xAuIon.jpg', '0', '19-06-2017 02:06'),
(9, 111, 'LBlPya.jpg', '0', '19-06-2017 02:06'),
(10, 112, 'SHpcAW.jpg', '0', '19-06-2017 02:06'),
(11, 109, 'eHaYKh.jpg', '0', NULL),
(12, 103, 'Aj8CBW.jpg', '1', NULL),
(13, 103, 'PrIr1h.jpg', '2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL,
  `site_name` varchar(200) DEFAULT NULL,
  `site_moto` varchar(200) DEFAULT NULL,
  `site_description` text,
  `site_address` text NOT NULL,
  `site_contact` varchar(40) NOT NULL,
  `site_email` varchar(200) NOT NULL,
  `site_logo` text,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `site_name`, `site_moto`, `site_description`, `site_address`, `site_contact`, `site_email`, `site_logo`, `update_at`) VALUES
(0, 'Depousaha.com', 'moto', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'Lowokwaru, Malang. ', '089623131213', 'depousaha@gmail.com', 'TnDQXS.png', '25-06-2017 0505:0606');

-- --------------------------------------------------------

--
-- Table structure for table `site_socmed`
--

CREATE TABLE IF NOT EXISTS `site_socmed` (
  `id` int(11) NOT NULL,
  `role` char(1) NOT NULL DEFAULT 'A',
  `socmed_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_socmed`
--

INSERT INTO `site_socmed` (`id`, `role`, `socmed_id`, `url`, `update_at`) VALUES
(10, 'A', 1, 'fb.com', '25-06-2017 05:06'),
(11, 'A', 2, 'tw.com', '25-06-2017 05:06'),
(12, 'A', 3, 'ig.com', '25-06-2017 05:06'),
(13, 'A', 4, 'ytb.com', '25-06-2017 05:06');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`, `update_at`) VALUES
(1, 'test3', 'QnT4be.png', '20-06-2017 08:06'),
(2, 'Test Slider', 'wxTKW2.png', '20-06-2017 08:06'),
(3, 'Test Slider', 'iK4SZR.jpg', '20-06-2017 08:06');

-- --------------------------------------------------------

--
-- Table structure for table `socmed`
--

CREATE TABLE IF NOT EXISTS `socmed` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `icon` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socmed`
--

INSERT INTO `socmed` (`id`, `name`, `logo`, `icon`, `update_at`) VALUES
(1, 'facebook', 'cv6FKu.png', 'fa fa-facebook', '24-06-2017 06:06'),
(2, 'twitter', 'SkJwwn.PNG', 'fa fa-twitter', '24-06-2017 06:06'),
(3, 'instagram', 'MKBXln.png', 'fa fa-instagram', '24-06-2017 06:06'),
(4, 'youtube', 'fkY0F8.png', 'fa fa-youtube', '24-06-2017 06:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE IF NOT EXISTS `testimoni` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `image` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `name`, `comment`, `image`, `update_at`) VALUES
(1, 'Facebook', 'pinter', 'i1SpAM.png', '14-06-2017 04:06'),
(2, 'Merchant x', 'oke123', '', '20-06-2017 07:06'),
(3, 'TOtok', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', '', '20-06-2017 08:06');

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
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'admin@gmail.com', 'administrator', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gallery_id` (`gallery_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `merchant_promo`
--
ALTER TABLE `merchant_promo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product` (`merchant_id`);

--
-- Indexes for table `merchant_socmed`
--
ALTER TABLE `merchant_socmed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socmend_id` (`socmed_id`),
  ADD KEY `socmed_id` (`socmed_id`),
  ADD KEY `merchant` (`merchant_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_product_id` (`product_category_id`),
  ADD KEY `merchant_id` (`merchant_id`),
  ADD KEY `merchant_id_2` (`merchant_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_product_idx` (`id_product`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_socmed`
--
ALTER TABLE `site_socmed`
  ADD PRIMARY KEY (`id`),
  ADD KEY `socmend_id` (`socmed_id`),
  ADD KEY `socmed_id` (`socmed_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `socmed`
--
ALTER TABLE `socmed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `merchant_promo`
--
ALTER TABLE `merchant_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `merchant_socmed`
--
ALTER TABLE `merchant_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=130;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `site_socmed`
--
ALTER TABLE `site_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `socmed`
--
ALTER TABLE `socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery_images`
--
ALTER TABLE `gallery_images`
  ADD CONSTRAINT `gallery_images_ibfk_1` FOREIGN KEY (`gallery_id`) REFERENCES `gallery` (`id`);

--
-- Constraints for table `merchant_promo`
--
ALTER TABLE `merchant_promo`
  ADD CONSTRAINT `merchant_promo_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`);

--
-- Constraints for table `merchant_socmed`
--
ALTER TABLE `merchant_socmed`
  ADD CONSTRAINT `merchant_socmed_ibfk_1` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`),
  ADD CONSTRAINT `merchant_socmed_ibfk_2` FOREIGN KEY (`socmed_id`) REFERENCES `socmed` (`id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `category_product` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `merchant_id` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `id_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
