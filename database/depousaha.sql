-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 15, 2017 at 04:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
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
-- Table structure for table `access_log`
--

CREATE TABLE `access_log` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(200) NOT NULL,
  `platform` varchar(200) NOT NULL,
  `browser` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `access_log`
--

INSERT INTO `access_log` (`id`, `ip_address`, `platform`, `browser`, `date`) VALUES
(2, '::1', 'Windows 10', 'Opera', '26-06-2017'),
(9, '::1', 'Windows 10', 'Opera', '27-06-2017'),
(10, '::1', 'Windows 10', 'Opera', '28-06-2017'),
(11, '::1', 'Windows 10', 'Opera', '29-06-2017'),
(12, '::1', 'Windows 10', 'Opera', '30-06-2017'),
(13, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(14, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(15, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(16, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(17, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(18, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(19, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(20, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(21, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(22, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(23, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(24, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(25, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(26, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(27, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(28, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(29, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(30, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(31, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(32, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(33, '::1', 'Windows 10', 'Opera', '01-07-2017'),
(34, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(35, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(36, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(37, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(38, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(39, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(40, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(41, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(42, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(43, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(44, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(45, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(46, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(47, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(48, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(49, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(50, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(51, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(52, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(53, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(54, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(55, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(56, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(57, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(58, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(59, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(60, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(61, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(62, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(63, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(64, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(65, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(66, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(67, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(68, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(69, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(70, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(71, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(72, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(73, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(74, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(75, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(76, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(77, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(78, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(79, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(80, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(81, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(82, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(83, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(84, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(85, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(86, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(87, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(88, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(89, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(90, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(91, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(92, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(93, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(94, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(95, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(96, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(97, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(98, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(99, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(100, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(101, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(102, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(103, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(104, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(105, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(106, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(107, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(108, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(109, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(110, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(111, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(112, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(113, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(114, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(115, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(116, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(117, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(118, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(119, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(120, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(121, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(122, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(123, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(124, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(125, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(126, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(127, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(128, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(129, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(130, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(131, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(132, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(133, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(134, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(135, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(136, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(137, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(138, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(139, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(140, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(141, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(142, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(143, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(144, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(145, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(146, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(147, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(148, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(149, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(150, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(151, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(152, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(153, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(154, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(155, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(156, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(157, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(158, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(159, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(160, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(161, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(162, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(163, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(164, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(165, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(166, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(167, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(168, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(169, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(170, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(171, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(172, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(173, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(174, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(175, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(176, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(177, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(178, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(179, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(180, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(181, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(182, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(183, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(184, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(185, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(186, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(187, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(188, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(189, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(190, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(191, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(192, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(193, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(194, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(195, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(196, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(197, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(198, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(199, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(200, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(201, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(202, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(203, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(204, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(205, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(206, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(207, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(208, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(209, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(210, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(211, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(212, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(213, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(214, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(215, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(216, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(217, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(218, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(219, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(220, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(221, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(222, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(223, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(224, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(225, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(226, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(227, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(228, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(229, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(230, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(231, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(232, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(233, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(234, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(235, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(236, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(237, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(238, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(239, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(240, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(241, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(242, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(243, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(244, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(245, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(246, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(247, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(248, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(249, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(250, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(251, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(252, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(253, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(254, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(255, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(256, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(257, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(258, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(259, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(260, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(261, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(262, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(263, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(264, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(265, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(266, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(267, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(268, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(269, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(270, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(271, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(272, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(273, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(274, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(275, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(276, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(277, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(278, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(279, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(280, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(281, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(282, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(283, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(284, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(285, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(286, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(287, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(288, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(289, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(290, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(291, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(292, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(293, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(294, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(295, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(296, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(297, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(298, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(299, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(300, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(301, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(302, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(303, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(304, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(305, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(306, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(307, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(308, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(309, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(310, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(311, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(312, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(313, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(314, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(315, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(316, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(317, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(318, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(319, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(320, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(321, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(322, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(323, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(324, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(325, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(326, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(327, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(328, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(329, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(330, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(331, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(332, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(333, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(334, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(335, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(336, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(337, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(338, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(339, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(340, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(341, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(342, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(343, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(344, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(345, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(346, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(347, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(348, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(349, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(350, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(351, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(352, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(353, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(354, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(355, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(356, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(357, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(358, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(359, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(360, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(361, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(362, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(363, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(364, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(365, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(366, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(367, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(368, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(369, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(370, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(371, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(372, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(373, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(374, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(375, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(376, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(377, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(378, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(379, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(380, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(381, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(382, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(383, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(384, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(385, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(386, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(387, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(388, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(389, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(390, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(391, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(392, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(393, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(394, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(395, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(396, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(397, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(398, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(399, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(400, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(401, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(402, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(403, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(404, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(405, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(406, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(407, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(408, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(409, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(410, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(411, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(412, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(413, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(414, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(415, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(416, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(417, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(418, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(419, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(420, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(421, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(422, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(423, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(424, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(425, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(426, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(427, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(428, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(429, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(430, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(431, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(432, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(433, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(434, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(435, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(436, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(437, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(438, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(439, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(440, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(441, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(442, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(443, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(444, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(445, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(446, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(447, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(448, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(449, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(450, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(451, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(452, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(453, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(454, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(455, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(456, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(457, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(458, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(459, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(460, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(461, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(462, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(463, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(464, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(465, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(466, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(467, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(468, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(469, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(470, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(471, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(472, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(473, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(474, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(475, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(476, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(477, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(478, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(479, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(480, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(481, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(482, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(483, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(484, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(485, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(486, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(487, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(488, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(489, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(490, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(491, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(492, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(493, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(494, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(495, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(496, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(497, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(498, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(499, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(500, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(501, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(502, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(503, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(504, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(505, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(506, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(507, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(508, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(509, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(510, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(511, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(512, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(513, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(514, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(515, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(516, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(517, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(518, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(519, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(520, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(521, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(522, '::1', 'Windows 10', 'Opera', '02-07-2017'),
(523, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(524, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(525, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(526, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(527, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(528, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(529, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(530, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(531, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(532, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(533, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(534, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(535, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(536, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(537, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(538, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(539, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(540, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(541, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(542, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(543, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(544, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(545, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(546, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(547, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(548, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(549, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(550, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(551, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(552, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(553, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(554, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(555, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(556, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(557, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(558, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(559, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(560, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(561, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(562, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(563, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(564, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(565, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(566, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(567, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(568, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(569, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(570, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(571, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(572, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(573, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(574, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(575, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(576, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(577, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(578, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(579, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(580, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(581, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(582, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(583, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(584, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(585, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(586, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(587, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(588, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(589, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(590, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(591, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(592, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(593, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(594, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(595, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(596, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(597, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(598, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(599, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(600, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(601, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(602, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(603, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(604, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(605, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(606, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(607, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(608, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(609, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(610, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(611, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(612, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(613, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(614, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(615, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(616, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(617, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(618, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(619, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(620, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(621, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(622, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(623, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(624, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(625, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(626, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(627, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(628, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(629, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(630, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(631, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(632, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(633, '::1', 'Windows 10', 'Opera', '03-07-2017'),
(634, '180.253.46.79', 'Windows 10', 'Opera', '03-07-2017'),
(635, '173.252.85.213', 'Unknown Platform', '', '03-07-2017'),
(636, '173.252.85.211', 'Unknown Platform', '', '03-07-2017'),
(637, '173.252.85.216', 'Unknown Platform', '', '03-07-2017'),
(638, '173.252.84.92', 'Unknown Platform', '', '03-07-2017'),
(639, '173.252.84.87', 'Unknown Platform', '', '03-07-2017'),
(640, '173.252.85.198', 'Unknown Platform', '', '03-07-2017'),
(641, '114.125.120.205', 'Android', 'Chrome', '03-07-2017'),
(642, '66.220.156.148', 'iOS', 'Safari', '03-07-2017'),
(643, '202.3.214.138', 'iOS', 'Mozilla', '03-07-2017'),
(644, '173.252.85.209', 'Unknown Platform', '', '03-07-2017'),
(645, '173.252.84.58', 'Unknown Platform', '', '03-07-2017'),
(646, '173.252.84.57', 'Unknown Platform', '', '03-07-2017'),
(647, '173.252.85.222', 'Unknown Platform', '', '03-07-2017'),
(648, '66.96.233.48', 'iOS', 'Safari', '03-07-2017'),
(649, '173.252.85.225', 'Unknown Platform', '', '03-07-2017'),
(650, '64.233.173.43', 'Android', 'Chrome', '03-07-2017'),
(651, '64.233.173.39', 'Android', 'Chrome', '03-07-2017'),
(652, '64.233.173.41', 'Android', 'Chrome', '03-07-2017'),
(653, '125.163.253.76', 'Android', 'Chrome', '03-07-2017'),
(654, '120.188.64.221', 'Android', 'Chrome', '03-07-2017'),
(655, '180.253.134.135', 'Android', 'Chrome', '03-07-2017'),
(656, '158.140.172.80', 'Android', 'Chrome', '03-07-2017'),
(657, '158.140.163.70', 'Android', 'Chrome', '03-07-2017'),
(658, '36.67.59.31', 'Android', 'Chrome', '03-07-2017'),
(659, '36.88.152.55', 'Android', 'Chrome', '03-07-2017'),
(660, '173.252.85.203', 'Unknown Platform', '', '03-07-2017'),
(661, '180.247.28.170', 'Windows 10', 'Firefox', '03-07-2017'),
(662, '36.81.169.88', 'Android', 'Chrome', '03-07-2017'),
(663, '158.140.172.95', 'iOS', 'Safari', '03-07-2017'),
(664, '114.124.141.40', 'Android', 'Chrome', '03-07-2017'),
(665, '114.124.147.12', 'Android', 'Chrome', '03-07-2017'),
(666, '120.188.76.156', 'Android', 'Chrome', '03-07-2017'),
(667, '202.3.214.129', 'Unknown Platform', 'Mozilla', '03-07-2017'),
(668, '36.69.98.181', 'Android', 'Chrome', '03-07-2017'),
(669, '107.167.98.176', 'Android', 'Chrome', '03-07-2017'),
(670, '180.253.69.43', 'Windows 10', 'Opera', '07-07-2017'),
(671, '180.253.69.43', 'Linux', 'Safari', '08-07-2017'),
(672, '127.0.0.1', 'Linux', 'Firefox', '08-07-2017'),
(673, '127.0.0.1', 'Linux', 'Firefox', '14-07-2017'),
(674, '127.0.0.1', 'Linux', 'Firefox', '15-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `captcha_validation`
--

CREATE TABLE `captcha_validation` (
  `id` int(11) NOT NULL,
  `word` text NOT NULL,
  `status` char(1) NOT NULL,
  `update_at` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `name`, `description`, `update_at`) VALUES
(1, 'CAI 2017', '', '15-07-2017 04:07');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_images`
--

CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL,
  `gallery_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `sort` int(11) NOT NULL,
  `update_at` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery_images`
--

INSERT INTO `gallery_images` (`id`, `gallery_id`, `name`, `sort`, `update_at`) VALUES
(1, 1, '1ED97w.jpg', 1, '15-07-2017 04:07'),
(2, 1, 'NgKdgh.jpg', 2, '15-07-2017 04:07'),
(3, 1, 'qUbOyl.jpg', 3, '15-07-2017 04:07'),
(4, 1, 'Ifb0cY.jpg', 4, '15-07-2017 04:07');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
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
  `status` char(1) DEFAULT NULL,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`id`, `name`, `link`, `owner`, `contact`, `address`, `email`, `description`, `logo`, `cover`, `status`, `update_at`) VALUES
(68, 'Balistic', 'balistic', 'balistic', '089623993782', 'Batu', 'balistic.id@gmail.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'kD7ftW.jpg', 'auTVF5.jpg', 'A', '03-07-2017 02:07'),
(69, 'Bakso Arif', 'baksoarif', 'Arief', '089623993782', 'Pandan, Batu , Malang , Jawa Timur           ', 'arief@gmail.com', 't is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'WWYgsV.jpg', '0MZez9.jpg', 'A', '03-07-2017 02:07'),
(70, 'Van Hoven Cafe', 'vanhovencafe', 'Peso Dawud', '089623993782', 'Selecta, Batu , Jawa Timur                ', 'van_hoven@gmai.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'G52ZqF.jpg', 'lF2bob.png', 'A', '15-07-2017 08:07'),
(71, 'Toriq Shop', 'toriqshop', 'toriqpriad', '089623131213', '', 'toriq.354@gmail.com', '', '', '', 'A', '15-07-2017 07:07'),
(72, 'Toriq Shop 123', 'toriqshop123', 'Toriq', '089623993782', NULL, 'toriq.354@gmail.com', '', NULL, NULL, 'N', '15-07-2017'),
(73, 'Merchant Baru', 'merchantbaru', 'merchant', '089623993782', NULL, 'toriq.354@gmail.com', '', NULL, NULL, 'N', '15-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_promo`
--

CREATE TABLE `merchant_promo` (
  `id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `link` text NOT NULL,
  `url` text NOT NULL,
  `description` text,
  `image` text,
  `active` char(1) NOT NULL DEFAULT 'N',
  `update_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_promo`
--

INSERT INTO `merchant_promo` (`id`, `merchant_id`, `name`, `link`, `url`, `description`, `image`, `active`, `update_at`) VALUES
(14, 69, 'Contoh Promo', 'contoh-promo.html', 'http://toriqpriad.com/depousaha/merchant/detail/baksoarif', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2I5XpL.jpg', 'Y', '03-07-2017'),
(15, 70, 'Contoh Promo 1', 'contoh-promo-1.html', 'http://toriqpriad.com/depousaha/home', '', 'os85OS.jpg', 'Y', '03-07-2017');

-- --------------------------------------------------------

--
-- Table structure for table `merchant_socmed`
--

CREATE TABLE `merchant_socmed` (
  `id` int(11) NOT NULL,
  `socmed_id` int(11) NOT NULL,
  `merchant_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `merchant_socmed`
--

INSERT INTO `merchant_socmed` (`id`, `socmed_id`, `merchant_id`, `url`, `update_at`) VALUES
(63, 1, 68, 'fb.com/balistic.id', '03-07-2017 02:07'),
(64, 2, 68, 'twitter.com/balistic.id', '03-07-2017 02:07'),
(65, 1, 69, 'fb.com/bakso_arief', '03-07-2017 02:07'),
(66, 2, 69, 'twitter.com/bakso_arief', '03-07-2017 02:07'),
(85, 1, 71, '', '15-07-2017 07:07'),
(86, 2, 71, '', '15-07-2017 07:07'),
(87, 1, 70, 'https://www.facebook.com/Van-Hoven-Cafe-Resto-Distro-1405800976332551/', '15-07-2017 08:07'),
(88, 2, 70, '', '15-07-2017 08:07');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `link` varchar(200) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `dimension` varchar(200) DEFAULT NULL,
  `description` text,
  `merchant_id` int(11) NOT NULL,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_category_id`, `name`, `link`, `price`, `dimension`, `description`, `merchant_id`, `update_at`) VALUES
(13, 10, 'Keripik Enak', 'keripik-enak.html', 2000, 'bungkus', 'Enak koq cobain aja dulu', 68, '15-07-2017 07:07'),
(14, 10, 'Burger', 'burger.html', 1000, 'pcs', 'Burger Enak', 68, '15-07-2017 07:07'),
(15, 10, 'Donat Enak', 'donat-enak.html', 2000, 'pc', 'Donat Enak', 68, '03-07-2017 02:07'),
(16, 10, 'Lalapan Bu Yani', 'lalapan-bu-yani.html', 1000, 'potong', 'Ayam Lalapan', 68, '03-07-2017 02:07'),
(18, 10, 'Roti Bakar Van Hoven', 'roti-bakar-van-hoven.html', 10000, 'porsi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 70, '03-07-2017 02:07'),
(24, 12, 'Baju Bagus Polos', 'baju-bagus-polos.html', 8000, 'potong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 68, '03-07-2017 03:07'),
(25, 12, 'Baju Hitam', 'baju-hitam.html', 70000, 'potong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 68, '03-07-2017 03:07'),
(26, 12, 'Baju Apik', 'baju-apik.html', 50000, 'potong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 69, '03-07-2017 03:07'),
(27, 12, 'Baju Ini Aja', 'baju-ini-aja.html', 50000, 'potong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 68, '03-07-2017 03:07'),
(28, 12, 'Kaos Oblog', 'kaos-oblog.html', 70000, 'potong', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 68, '03-07-2017 03:07'),
(29, 10, 'test produk belum aktif merchant', 'test-produk-belum-aktif-merchant.html', 100, 'test', 'asads', 72, '15-07-2017 03:07'),
(30, 10, 'test produk belum aktif merchant', 'test-produk-belum-aktif-merchant.html', 100, 'test', 'asads', 72, '15-07-2017 03:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `link` text NOT NULL,
  `description` text,
  `update_at` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `name`, `link`, `description`, `update_at`) VALUES
(10, 'Makanan', 'makanan', '', '02-07-2017 05:07'),
(12, 'Pakaian', 'pakaian', '', '03-07-2017 02:07'),
(14, 'Buku', 'buku', '', '03-07-2017 02:07'),
(15, 'Properti', 'properti', '', '03-07-2017 02:07');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `id_product` int(11) DEFAULT NULL,
  `name` text,
  `sort` char(10) NOT NULL,
  `update_at` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `id_product`, `name`, `sort`, `update_at`) VALUES
(2, 13, 'u2IgV0.jpg', '0', '03-07-2017 02:07'),
(3, 13, 'xOSZRh.jpg', '1', '03-07-2017 02:07'),
(5, 14, 'vnVaJY.jpg', '0', '03-07-2017 02:07'),
(6, 14, 'QfiG0C.jpg', '1', '03-07-2017 02:07'),
(7, 14, 'YT6qTU.png', '2', '03-07-2017 02:07'),
(8, 15, '0jOQBL.jpg', '0', '03-07-2017 02:07'),
(9, 15, '3ZxMke.jpg', '1', '03-07-2017 02:07'),
(10, 15, 'NTKFgv.jpg', '2', '03-07-2017 02:07'),
(11, 16, 'fA70Kb.jpg', '0', '03-07-2017 02:07'),
(12, 16, 'khWD1m.jpg', '1', '03-07-2017 02:07'),
(17, 18, 'qTsW2P.jpg', '0', '03-07-2017 02:07'),
(18, 18, '9c6pBD.jpg', '1', '03-07-2017 02:07'),
(19, 18, 'x4p6v5.jpg', '2', '03-07-2017 02:07'),
(25, 24, 'dko708.jpg', '0', '03-07-2017 03:07'),
(26, 25, '9XESqC.png', '0', '03-07-2017 03:07'),
(27, 26, 'fRiu9R.jpg', '0', '03-07-2017 03:07'),
(28, 27, 'xUn5dH.png', '0', '03-07-2017 03:07'),
(29, 28, 'J9eeHc.jpg', '0', '03-07-2017 03:07'),
(30, 13, 'cPMGx0.png', '2', NULL),
(31, 14, 'zV66nM.png', '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
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
(0, 'Depousaha.com', 'Hidupkan UMKM Rakyat', 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat pariatur. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullam laboris nisi ut aliquip commodo.', 'Sukun, Malang , Jawa Timur', '089623131213', 'toriqpriad@gmail.com', '3dZpex.png', '03-07-2017 0303:0707');

-- --------------------------------------------------------

--
-- Table structure for table `site_socmed`
--

CREATE TABLE `site_socmed` (
  `id` int(11) NOT NULL,
  `role` char(1) NOT NULL DEFAULT 'A',
  `socmed_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_socmed`
--

INSERT INTO `site_socmed` (`id`, `role`, `socmed_id`, `url`, `update_at`) VALUES
(58, 'A', 1, 'fb.com', '03-07-2017 03:07'),
(59, 'A', 2, 'tw.com', '03-07-2017 03:07');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `image`, `update_at`) VALUES
(5, 'Slider 1', 'isuepU.jpg', '03-07-2017 03:07'),
(6, 'Slider 2', 'xXD6Nt.jpg', '03-07-2017 03:07'),
(7, 'Slider 3', '3Mv7lN.png', '03-07-2017 03:07');

-- --------------------------------------------------------

--
-- Table structure for table `socmed`
--

CREATE TABLE `socmed` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `logo` text NOT NULL,
  `icon` varchar(40) NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `socmed`
--

INSERT INTO `socmed` (`id`, `name`, `logo`, `icon`, `update_at`) VALUES
(1, 'facebook', 'cv6FKu.png', 'fa fa-facebook', '24-06-2017 06:06'),
(2, 'twitter', 'SkJwwn.PNG', 'fa fa-twitter', '24-06-2017 06:06');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `image` text NOT NULL,
  `update_at` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id`, `name`, `comment`, `image`, `update_at`) VALUES
(5, 'Toriq', 'Mantab Jiwa', '', '03-07-2017 03:07'),
(6, 'Anonim', 'Oke Teruskan', '', '03-07-2017 03:07');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `role` enum('A') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `name`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', 'administrator', 'A');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `access_log`
--
ALTER TABLE `access_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `captcha_validation`
--
ALTER TABLE `captcha_validation`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `access_log`
--
ALTER TABLE `access_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=675;
--
-- AUTO_INCREMENT for table `captcha_validation`
--
ALTER TABLE `captcha_validation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `gallery_images`
--
ALTER TABLE `gallery_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `merchant`
--
ALTER TABLE `merchant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `merchant_promo`
--
ALTER TABLE `merchant_promo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `merchant_socmed`
--
ALTER TABLE `merchant_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `site_socmed`
--
ALTER TABLE `site_socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `socmed`
--
ALTER TABLE `socmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
