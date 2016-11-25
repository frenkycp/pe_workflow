-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2016 at 09:24 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yemipe`
--

-- --------------------------------------------------------

--
-- Table structure for table `action`
--

CREATE TABLE `action` (
  `id` int(11) NOT NULL,
  `controller_id` varchar(50) NOT NULL,
  `action_id` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `action`
--

INSERT INTO `action` (`id`, `controller_id`, `action_id`, `name`) VALUES
(12, 'site', 'index', 'Index'),
(13, 'site', 'profile', 'Profile'),
(14, 'site', 'login', 'Login'),
(15, 'site', 'logout', 'Logout'),
(16, 'site', 'contact', 'Contact'),
(17, 'site', 'about', 'About'),
(18, 'menu', 'index', 'Index'),
(19, 'menu', 'view', 'View'),
(20, 'menu', 'create', 'Create'),
(21, 'menu', 'update', 'Update'),
(22, 'menu', 'delete', 'Delete'),
(23, 'role', 'index', 'Index'),
(24, 'role', 'view', 'View'),
(25, 'role', 'create', 'Create'),
(26, 'role', 'update', 'Update'),
(27, 'role', 'delete', 'Delete'),
(28, 'role', 'detail', 'Detail'),
(29, 'user', 'index', 'Index'),
(30, 'user', 'view', 'View'),
(31, 'user', 'create', 'Create'),
(32, 'user', 'update', 'Update'),
(33, 'user', 'delete', 'Delete'),
(34, 'site', 'register', 'Register'),
(35, 'dcn', 'index', 'Index'),
(36, 'dcn', 'view', 'View'),
(37, 'dcn', 'create', 'Create'),
(38, 'dcn', 'update', 'Update'),
(39, 'dcn', 'delete', 'Delete'),
(40, 'wi-masterlist', 'index', 'Index'),
(41, 'wi-masterlist', 'view', 'View'),
(42, 'wi-masterlist', 'create', 'Create'),
(43, 'wi-masterlist', 'update', 'Update'),
(44, 'wi-masterlist', 'delete', 'Delete'),
(45, 'doc-section', 'index', 'Index'),
(46, 'doc-section', 'view', 'View'),
(47, 'doc-section', 'create', 'Create'),
(48, 'doc-section', 'update', 'Update'),
(49, 'doc-section', 'delete', 'Delete'),
(50, 'doc-type', 'index', 'Index'),
(51, 'doc-type', 'view', 'View'),
(52, 'doc-type', 'create', 'Create'),
(53, 'doc-type', 'update', 'Update'),
(54, 'doc-type', 'delete', 'Delete'),
(55, 'doc-class', 'index', 'Index'),
(56, 'doc-class', 'view', 'View'),
(57, 'doc-class', 'create', 'Create'),
(58, 'doc-class', 'update', 'Update'),
(59, 'doc-class', 'delete', 'Delete'),
(60, 'wi-masterlist', 'report', 'Report'),
(61, 'wi', 'index', 'Index'),
(62, 'wi', 'view', 'View'),
(63, 'wi', 'create', 'Create'),
(64, 'wi', 'update', 'Update'),
(65, 'wi', 'delete', 'Delete'),
(66, 'wi', 'checkout', 'Checkout'),
(67, 'wi', 'my-job', 'My Job'),
(68, 'wi', 'wi-open', 'Wi Open'),
(69, 'wi', 'check-masterlist', 'Check Masterlist'),
(70, 'wi', 'checkin', 'Checkin'),
(71, 'wi', 'check-smile', 'Check Smile'),
(72, 'wi', 'final-check', 'Final Check'),
(73, 'wi', 'waiting-appr', 'Waiting Appr'),
(74, 'wi', 'waiting-approval', 'Waiting Approval'),
(75, 'wi', 'reject', 'Reject'),
(76, 'wi', 'approval', 'Approval'),
(77, 'wi', 'download', 'Download'),
(78, 'wi', 'takejob', 'Takejob'),
(79, 'wi', 'waiting-dist', 'Waiting Dist'),
(80, 'wi', 'closing-wi', 'Closing Wi'),
(81, 'wi', 'available-jobs', 'Available Jobs'),
(82, 'my-job', 'index', 'Index'),
(83, 'available-jobs', 'index', 'Index'),
(84, 'my-job', 'view', 'View'),
(85, 'available-jobs', 'view', 'View'),
(86, 'my-job', 'download', 'Download'),
(87, 'my-job', 'checkin', 'Checkin'),
(88, 'available-jobs', 'checkout', 'Checkout'),
(89, 'my-job', 'reject', 'Reject'),
(90, 'my-job', 'closing-wi', 'Closing Wi'),
(91, 'available-jobs', 'check-masterlist', 'Check Masterlist'),
(92, 'available-jobs', 'check-smile', 'Check Smile'),
(93, 'available-jobs', 'final-check', 'Final Check'),
(94, 'available-jobs', 'waiting-approval', 'Waiting Approval'),
(95, 'available-jobs', 'waiting-dist', 'Waiting Dist'),
(96, 'available-jobs', 'waiting-distribution', 'Waiting Distribution');

-- --------------------------------------------------------

--
-- Table structure for table `doc_class`
--

CREATE TABLE `doc_class` (
  `doc_class_id` int(11) NOT NULL,
  `class_code` varchar(10) NOT NULL,
  `class_detail` varchar(30) NOT NULL,
  `class_count` int(11) NOT NULL DEFAULT '0',
  `flag` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_class`
--

INSERT INTO `doc_class` (`doc_class_id`, `class_code`, `class_detail`, `class_count`, `flag`) VALUES
(1, 'C', 'PCB-SMT', 48, 1),
(2, 'P', 'PAINTING', 13, 1),
(3, 'F', 'FA/SAA/RPA/PA', 103, 1),
(4, 'W', 'WW', 23, 1),
(5, 'S', 'SPU', 1, 1),
(6, 'J', 'INJECTION', 0, 1),
(7, 'A', 'PCB-AI', 17, 1),
(8, 'M', 'PCB-MI', 66, 1),
(9, 'SA', 'RPA/SFG/SNT', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_count`
--

CREATE TABLE `doc_count` (
  `masterlist_count_id` int(11) NOT NULL,
  `doc_type` varchar(10) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doc_section`
--

CREATE TABLE `doc_section` (
  `doc_section_id` int(11) NOT NULL,
  `section_name` varchar(30) NOT NULL,
  `flag` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_section`
--

INSERT INTO `doc_section` (`doc_section_id`, `section_name`, `flag`) VALUES
(1, 'FINAL ASSY', 1),
(2, 'SUB ASSY', 0),
(3, 'PCB', 1),
(4, 'WW', 1),
(5, 'PAINTING', 1),
(6, 'SPU', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doc_type`
--

CREATE TABLE `doc_type` (
  `doc_type_id` int(11) NOT NULL,
  `type_name` varchar(20) NOT NULL,
  `flag` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_type`
--

INSERT INTO `doc_type` (`doc_type_id`, `type_name`, `flag`) VALUES
(1, 'WI', 1),
(2, 'WG', 1),
(3, 'SETLIST', 1),
(4, 'SOK', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `controller` varchar(50) NOT NULL,
  `action` varchar(50) NOT NULL DEFAULT 'index',
  `icon` varchar(50) NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `parent_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `name`, `controller`, `action`, `icon`, `order`, `parent_id`) VALUES
(1, 'Home', 'site', 'index', 'fa fa-home', 1, NULL),
(2, 'Master', '', 'index', 'fa fa-database', 2, NULL),
(3, 'Menu', 'menu', 'index', 'fa fa-circle-o', 3, 2),
(4, 'Role', 'role', 'index', 'fa fa-circle-o', 4, 2),
(5, 'User', 'user', 'index', 'fa fa-circle-o', 5, 2),
(7, 'Masterlist', 'wi-masterlist', 'index', 'fa fa-file', 2, NULL),
(8, 'Document Section', 'doc-section', 'index', 'fa fa-circle-o', 3, 2),
(9, 'Document Type', 'doc-type', 'index', 'fa fa-circle-o', 4, 2),
(10, 'Document Class', 'doc-class', 'index', 'fa fa-circle-o', 5, 2),
(11, 'WI List', 'wi', 'index', 'fa fa-dot-circle-o', 7, 14),
(13, 'My Job', 'my-job', 'index', 'fa fa-tags', 13, 14),
(14, 'Work Instruction', '', 'index', 'fa fa-file-archive-o', 12, NULL),
(15, 'Available Jobs', 'available-jobs', 'index', 'fa fa-tasks', 8, 14);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`) VALUES
(1, 'Super Administrator'),
(2, 'Administrator'),
(3, 'Regular User'),
(4, 'WI Maker'),
(5, 'PE Admin 1'),
(6, 'PE Admin 2'),
(7, 'Checker'),
(8, 'Approval');

-- --------------------------------------------------------

--
-- Table structure for table `role_action`
--

CREATE TABLE `role_action` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `action_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_action`
--

INSERT INTO `role_action` (`id`, `role_id`, `action_id`) VALUES
(120, 3, 12),
(121, 3, 13),
(122, 3, 14),
(123, 3, 15),
(124, 3, 16),
(125, 3, 17),
(126, 3, 18),
(127, 3, 19),
(128, 3, 23),
(129, 3, 24),
(130, 3, 28),
(131, 3, 29),
(132, 3, 30),
(133, 3, 31),
(134, 3, 32),
(135, 3, 33),
(446, 2, 12),
(447, 2, 13),
(448, 2, 14),
(449, 2, 15),
(450, 2, 16),
(451, 2, 17),
(452, 2, 29),
(453, 2, 30),
(454, 2, 31),
(455, 2, 32),
(456, 2, 45),
(457, 2, 46),
(458, 2, 47),
(459, 2, 48),
(460, 2, 50),
(461, 2, 51),
(462, 2, 52),
(463, 2, 53),
(464, 2, 55),
(465, 2, 56),
(466, 2, 57),
(467, 2, 58),
(468, 2, 40),
(469, 2, 41),
(470, 2, 42),
(471, 2, 43),
(903, 1, 12),
(904, 1, 13),
(905, 1, 14),
(906, 1, 15),
(907, 1, 17),
(908, 1, 18),
(909, 1, 19),
(910, 1, 20),
(911, 1, 21),
(912, 1, 22),
(913, 1, 23),
(914, 1, 24),
(915, 1, 25),
(916, 1, 26),
(917, 1, 27),
(918, 1, 28),
(919, 1, 29),
(920, 1, 30),
(921, 1, 31),
(922, 1, 32),
(923, 1, 33),
(924, 1, 45),
(925, 1, 46),
(926, 1, 47),
(927, 1, 48),
(928, 1, 49),
(929, 1, 50),
(930, 1, 51),
(931, 1, 52),
(932, 1, 53),
(933, 1, 54),
(934, 1, 55),
(935, 1, 56),
(936, 1, 57),
(937, 1, 58),
(938, 1, 59),
(939, 1, 40),
(940, 1, 41),
(941, 1, 42),
(942, 1, 43),
(943, 1, 44),
(944, 1, 61),
(945, 1, 62),
(946, 1, 63),
(947, 1, 64),
(948, 1, 65),
(949, 1, 61),
(950, 1, 62),
(951, 1, 63),
(952, 1, 64),
(953, 1, 65),
(1696, 4, 12),
(1697, 4, 13),
(1698, 4, 34),
(1699, 4, 14),
(1700, 4, 15),
(1701, 4, 16),
(1702, 4, 17),
(1703, 4, 40),
(1704, 4, 41),
(1705, 4, 61),
(1706, 4, 62),
(1707, 4, 82),
(1708, 4, 84),
(1709, 4, 86),
(1710, 4, 87),
(1711, 4, 83),
(1712, 4, 85),
(1713, 4, 88),
(1737, 6, 12),
(1738, 6, 13),
(1739, 6, 34),
(1740, 6, 14),
(1741, 6, 15),
(1742, 6, 18),
(1743, 6, 19),
(1744, 6, 20),
(1745, 6, 21),
(1746, 6, 22),
(1747, 6, 23),
(1748, 6, 24),
(1749, 6, 25),
(1750, 6, 26),
(1751, 6, 27),
(1752, 6, 28),
(1753, 6, 29),
(1754, 6, 30),
(1755, 6, 31),
(1756, 6, 32),
(1757, 6, 33),
(1758, 6, 45),
(1759, 6, 46),
(1760, 6, 47),
(1761, 6, 48),
(1762, 6, 49),
(1763, 6, 50),
(1764, 6, 51),
(1765, 6, 52),
(1766, 6, 53),
(1767, 6, 54),
(1768, 6, 55),
(1769, 6, 56),
(1770, 6, 57),
(1771, 6, 58),
(1772, 6, 59),
(1773, 6, 40),
(1774, 6, 41),
(1775, 6, 42),
(1776, 6, 43),
(1777, 6, 44),
(1778, 6, 60),
(1779, 6, 61),
(1780, 6, 62),
(1781, 6, 63),
(1782, 6, 64),
(1783, 6, 65),
(1784, 6, 82),
(1785, 6, 84),
(1786, 6, 86),
(1787, 6, 89),
(1788, 6, 83),
(1789, 6, 85),
(1790, 6, 92),
(1791, 7, 12),
(1792, 7, 13),
(1793, 7, 34),
(1794, 7, 14),
(1795, 7, 15),
(1796, 7, 61),
(1797, 7, 62),
(1798, 7, 82),
(1799, 7, 84),
(1800, 7, 86),
(1801, 7, 89),
(1802, 7, 83),
(1803, 7, 85),
(1804, 7, 93),
(1852, 8, 12),
(1853, 8, 13),
(1854, 8, 34),
(1855, 8, 14),
(1856, 8, 15),
(1857, 8, 61),
(1858, 8, 62),
(1859, 8, 82),
(1860, 8, 84),
(1861, 8, 86),
(1862, 8, 89),
(1863, 8, 83),
(1864, 8, 85),
(1865, 8, 94),
(1866, 5, 12),
(1867, 5, 13),
(1868, 5, 14),
(1869, 5, 15),
(1870, 5, 29),
(1871, 5, 30),
(1872, 5, 31),
(1873, 5, 32),
(1874, 5, 40),
(1875, 5, 41),
(1876, 5, 42),
(1877, 5, 43),
(1878, 5, 44),
(1879, 5, 60),
(1880, 5, 61),
(1881, 5, 62),
(1882, 5, 82),
(1883, 5, 84),
(1884, 5, 86),
(1885, 5, 89),
(1886, 5, 90),
(1887, 5, 83),
(1888, 5, 85),
(1889, 5, 91),
(1890, 5, 96);

-- --------------------------------------------------------

--
-- Table structure for table `role_menu`
--

CREATE TABLE `role_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_menu`
--

INSERT INTO `role_menu` (`id`, `role_id`, `menu_id`) VALUES
(76, 3, 1),
(147, 2, 1),
(148, 2, 2),
(149, 2, 5),
(150, 2, 8),
(151, 2, 9),
(152, 2, 10),
(153, 2, 7),
(251, 1, 1),
(252, 1, 2),
(253, 1, 3),
(254, 1, 4),
(255, 1, 5),
(256, 1, 8),
(257, 1, 9),
(258, 1, 10),
(259, 1, 7),
(260, 1, 14),
(261, 1, 11),
(459, 4, 1),
(460, 4, 14),
(461, 4, 11),
(462, 4, 13),
(463, 4, 15),
(472, 6, 1),
(473, 6, 2),
(474, 6, 3),
(475, 6, 4),
(476, 6, 5),
(477, 6, 8),
(478, 6, 9),
(479, 6, 10),
(480, 6, 7),
(481, 6, 14),
(482, 6, 11),
(483, 6, 13),
(484, 6, 15),
(485, 7, 1),
(486, 7, 14),
(487, 7, 11),
(488, 7, 13),
(489, 7, 15),
(506, 8, 1),
(507, 8, 14),
(508, 8, 11),
(509, 8, 13),
(510, 8, 15),
(511, 5, 1),
(512, 5, 2),
(513, 5, 5),
(514, 5, 7),
(515, 5, 14),
(516, 5, 11),
(517, 5, 13),
(518, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `name`, `role_id`, `photo_url`, `last_login`, `last_logout`) VALUES
(1, 'admin', '773c17687a43dc8f52be7ab42fa27d21', 'Administrator', 1, 'ID6jM8Az7Yh_R6LR44Ezh02VECKTQ_Ya.png', '2016-11-25 15:22:41', '2016-11-25 11:43:25'),
(2, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'Regular User', 3, 'default.png', NULL, NULL),
(3, 'aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'Frenky', 3, NULL, '2016-05-27 08:17:16', '2016-05-27 08:18:49'),
(4, 'ivan', '2c42e5cf1cdbafea04ed267018ef1511', 'Ivan', 3, NULL, '2016-11-23 11:59:04', '2016-11-23 15:58:48'),
(5, 'firman', '370239f5667b0b597e5ef2740135be34', 'FIRMAN', 4, 'default.png', '2016-11-24 16:04:25', '2016-11-24 14:24:06'),
(6, 'ade', 'b8fcb497c479192c260a5c30e9c09a82', 'ADE', 4, 'default.png', '2016-11-25 08:57:55', '2016-11-25 09:06:46'),
(7, 'divky', 'eb690717f8ee9003e8e7c7c7ade9efdb', 'DIVKY', 4, 'default.png', NULL, NULL),
(8, 'joe', 'aa241b37d4ece8a1f30b620ca98725f2', 'JOE', 5, 'default.png', '2016-11-25 11:45:55', '2016-11-25 11:07:59'),
(9, 'billy', '89c246298be2b6113fb10ba80f3c6956', 'BILLY', 4, 'default.png', NULL, NULL),
(10, 'anggi', '4a283e1f5eb8628c8631718fe87f5917', 'ANGGI', 4, 'default.png', '2016-09-05 14:32:51', '2016-06-01 08:51:09'),
(11, 'erwin', '785f0b13d4daf8eee0d11195f58302a4', 'ERWIN', 4, 'default.png', NULL, NULL),
(12, 'hardi', 'dddb1b27f1a7d7601a6a0f7e2ca92926', 'HARDI', 4, 'default.png', NULL, NULL),
(13, 'riza', 'd5f275885bd96778f7f01c814e405e7c', 'RIZA', 4, 'default.png', NULL, NULL),
(14, 'bintang', '801dc3c9e3bcd2a3cf428f3b79b312b6', 'BINTANG', 4, 'default.png', NULL, NULL),
(15, 'rian', 'cb2b28afc2cc836b33eb7ed86f99e65a', 'RIAN', 4, 'default.png', NULL, NULL),
(16, 'eko', 'e5ea9b6d71086dfef3a15f726abcc5bf', 'EKO', 4, 'default.png', NULL, NULL),
(17, 'harianto', '122be21840e03efac76f12cd74023a2e', 'HARIANTO', 4, 'default.png', NULL, NULL),
(18, 'wildan', 'af6b3aa8c3fcd651674359f500814679', 'WILDAN', 4, 'default.png', NULL, NULL),
(19, 'doni', '2da9cd653f63c010b6d6c5a5ad73fe32', 'DONI', 4, 'default.png', NULL, NULL),
(20, 'hendro', '66cb5177a2d8017b6e71983e95659388', 'HENDRO', 4, 'default.png', NULL, NULL),
(21, 'dani', '55b7e8b895d047537e672250dd781555', 'DANI', 4, 'default.png', NULL, NULL),
(22, 'fikri', '5d4864249b21de08642aa6ff4178b346', 'FIKRI', 4, 'default.png', NULL, NULL),
(23, 'mukhlis', '34cefd67a188a767177bad81e72bc2b2', 'MUKHLIS', 4, 'default.png', NULL, NULL),
(24, 'satriya', '35d28afc4fee06e82cc2c6d25773f4c3', 'SATRIYA', 7, 'default.png', '2016-11-25 11:38:16', '2016-11-25 11:41:43'),
(25, 'susanto', '8941a2794fea91e669863bea9fd708f3', 'SUSANTO', 4, 'default.png', NULL, NULL),
(26, 'frenky', '7e8138d4518075d82c23e27a93a17151', 'FRENKY', 6, 'default.png', '2016-11-25 11:09:46', '2016-11-25 11:39:54'),
(27, 'zamroni', 'a078479c3d251b9f229c801dfe5363cc', 'ZAMRONI', 8, 'default.png', '2016-11-25 11:43:32', '2016-11-25 11:45:49');

-- --------------------------------------------------------

--
-- Table structure for table `wi`
--

CREATE TABLE `wi` (
  `wi_id` int(11) NOT NULL,
  `wi_model` varchar(200) DEFAULT NULL,
  `wi_section` varchar(50) DEFAULT NULL,
  `wi_docno` varchar(50) DEFAULT NULL,
  `wi_title` varchar(100) DEFAULT NULL,
  `wi_stagestat` varchar(50) DEFAULT NULL,
  `wi_status` varchar(50) DEFAULT NULL,
  `wi_issue` varchar(50) DEFAULT NULL,
  `wi_rev` varchar(5) DEFAULT NULL,
  `wi_maker` varchar(100) DEFAULT NULL,
  `wi_filename` text,
  `wi_file` text,
  `wi_filename2` text,
  `wi_file2` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wi`
--

INSERT INTO `wi` (`wi_id`, `wi_model`, `wi_section`, `wi_docno`, `wi_title`, `wi_stagestat`, `wi_status`, `wi_issue`, `wi_rev`, `wi_maker`, `wi_filename`, `wi_file`, `wi_filename2`, `wi_file2`) VALUES
(1, 'NS-BP301', 'FA', 'NS-BP301/WI/SNT', 'NETWORK ASSY', 'MP', 'CLOSE', '2016-08-04', '4', 'RIAN', 'NS-BP301SR-WI-SNT R004.xlsx', './files/wi/NS-BP301SR-WI-SNT R004.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(3, 'NS-BP301', 'FA', 'NS-BP301/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-08-01', '3', 'WILDAN', 'NS-BP301-WI-FA Rev.03 -.xlsx', './files/wi/NS-BP301-WI-FA Rev.03 -.xlsx', '', './files/wi/'),
(5, 'NS-BP301', 'WW', 'NS-BP301/ WI/ WW', 'BACKBOARD', 'MP', 'CLOSE', '2015-08-13', '0', 'HENDRO', 'WI WW Backboard BP-301 rev0.xlsx', './files/wi/WI WW Backboard BP-301 rev0.xlsx', 'DDC-BP301 WI-WW-R00.pdf', './files/wi/DDC-BP301 WI-WW-R00.pdf'),
(6, 'NS-BP301', 'WW', 'NS-BP301/ WI/ WW', 'BAFFLE', 'MP', 'CLOSE', '2015-08-13', '0', 'HENDRO', 'WI WW Baffle BP-301 rev0.xlsx', './files/wi/WI WW Baffle BP-301 rev0.xlsx', 'DDC-BP301 WI-WW-R00.pdf', './files/wi/DDC-BP301 WI-WW-R00.pdf'),
(7, 'NS-BP301', 'WW', 'NS-BP301/ WI/ WW', 'BODY', 'MP', 'CLOSE', '2015-08-13', '0', 'HENDRO', 'WI WW Body BP301 rev00.xls', './files/wi/WI WW Body BP301 rev00.xls', 'DDC-BP301 WI-WW-R00.pdf', './files/wi/DDC-BP301 WI-WW-R00.pdf'),
(8, 'NS-BP301', 'WW', 'NS-BP301/ WI/ WW', 'REINFORCEMENT', 'MP', 'CLOSE', '2015-08-13', '0', 'HENDRO', 'WI WW Reinforcement Bp301 rev0.xls', './files/wi/WI WW Reinforcement Bp301 rev0.xls', 'DDC-BP301 WI-WW-R00.pdf', './files/wi/DDC-BP301 WI-WW-R00.pdf'),
(9, 'NS-BP301, NS-BP401', 'FA', 'NS-BP301SR/WI/SFG', 'FRONT GRILLE ASSY', 'MP', 'CLOSE', '2016-08-03', '1', 'WILDAN', 'NS-BP301-WI-SFG Rev. 01 -.xls', './files/wi/NS-BP301-WI-SFG Rev. 01 -.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(10, 'NS-BP401', 'FA', 'NS-BP401SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '2', 'FIRMAN', 'NS-BP401SR-WI- SAA-rev2.xlsx', './files/wi/NS-BP401SR-WI- SAA-rev2.xlsx', '', './files/wi/'),
(11, 'NS-BP401', 'FA', 'NS-BP401/WI/SNT', 'NETWORK ASSY', 'MP', 'CLOSE', '2015-08-13', '1', 'RIAN', 'NS-BP401SR-WI-SNT Rev1.xlsx', './files/wi/NS-BP401SR-WI-SNT Rev1.xlsx', 'DDC-BP401 WI-SNT-R01.pdf', './files/wi/DDC-BP401 WI-SNT-R01.pdf'),
(12, 'NS-BP401', 'FA', 'NS-BP401SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-30', '3', 'ADE', 'NS-BP401 WI PA rev03.xls', './files/wi/NS-BP401 WI PA rev03.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(13, 'NS-BP401', 'FA', 'NS-BP401SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-08-04', '3', 'FIRMAN', 'NS-BP401-WI-FA REV3.xlsx', './files/wi/NS-BP401-WI-FA REV3.xlsx', '', './files/wi/'),
(14, 'NS-BP401', 'WW', 'NS-BP400 & BP401 / WI/ WW', 'BACKBOARD', 'MP', 'CLOSE', '2015-04-12', '2', 'HENDRO', 'WI WW Back  BP400 rev2.xlsx', './files/wi/WI WW Back  BP400 rev2.xlsx', 'DDC-BP400 & BP401 WI-WW-R01.pdf', './files/wi/DDC-BP400 & BP401 WI-WW-R01.pdf'),
(15, 'NS-BP401', 'WW', 'NS-BP400 & BP401 / WI/ WW', 'BAFFLE', 'MP', 'CLOSE', '2015-04-22', '2', 'HENDRO', 'WI WW Baffle BP400 rev2.xlsx', './files/wi/WI WW Baffle BP400 rev2.xlsx', 'DDC-BP400 & BP401 WI-WW-R01.pdf', './files/wi/DDC-BP400 & BP401 WI-WW-R01.pdf'),
(16, 'NS-BP401', 'WW', 'NS- BP401 / WI/ WW (BODY)', 'BODY', 'MP', 'CLOSE', '2013-02-25', '1', 'HENDRO', 'WI WW Body BP401 rev0.xls', './files/wi/WI WW Body BP401 rev0.xls', 'DDC-BP401 WI-WW-BODY-R00', './files/wi/DDC-BP401 WI-WW-BODY-R00'),
(17, 'NS-BP401', 'WW', 'NS-BP400 & BP401 / WI/ WW', 'REINFORCEMENT', 'MP', 'CLOSE', '2013-02-25', '1', 'HENDRO', 'WI WW Reinforcement BP400 rev1.xls', './files/wi/WI WW Reinforcement BP400 rev1.xls', 'DDC-BP400 & BP401 WI-WW-R01.pdf', './files/wi/DDC-BP400 & BP401 WI-WW-R01.pdf'),
(18, 'NS-BP401', 'WW', 'NS-BP401SR/WI/CAB', 'CABINET', 'MP', 'CLOSE', '2016-07-22', '2', 'HENDRO', 'WI NS-BP401 CAB R2.xlsx', './files/wi/WI NS-BP401 CAB R2.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(33, 'YSP-5600', 'FA', 'YSP-5600SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2015-09-07', '4', 'RIZA', 'YSP-5600SR WI FA R.04.xls', './files/wi/YSP-5600SR WI FA R.04.xls', 'YSP-5600-WI-FA-DDC-004.pdf', './files/wi/YSP-5600-WI-FA-DDC-004.pdf'),
(34, 'YSP-5600', 'FA', 'YSP-5600/WI/FU', 'FIRMWARE UPDATE', 'MP', 'CLOSE', '2015-09-07', '-', 'RIAN', 'WI YSP-5600-FU (FIRMWARE UPDATE) Rev.00.xlsx', './files/wi/WI YSP-5600-FU (FIRMWARE UPDATE) Rev.00.xlsx', 'YSP-5600-WI-FU-DDC-000.pdf', './files/wi/YSP-5600-WI-FU-DDC-000.pdf'),
(35, 'YSP-5600', 'FA', 'ALL Spec-WI-HIPOT', 'Hi-POT TESTER', 'MP', 'CLOSE', '2015-09-15', '5', 'RIAN', 'WI Hi-Pot Spec for All Model Rev.05.xls', './files/wi/WI Hi-Pot Spec for All Model Rev.05.xls', 'WI-ALL HIPOT DDC Rev.05.pdf', './files/wi/WI-ALL HIPOT DDC Rev.05.pdf'),
(36, 'YSP-5600', 'FA', 'F0050', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-30', '5', 'ADE', 'YSP5600SR-WI-PA - REV05.xls', './files/wi/YSP5600SR-WI-PA - REV05.xls', '', './files/wi/'),
(37, 'YSP-5600', 'FA', 'F0051', 'ATTACHMENT ASSY', 'MP', 'CLOSE', '2016-09-15', '6', 'FIRMAN', 'F0051 YSP5600SR-WI-AA - REV6.xlsx', './files/wi/F0051 YSP5600SR-WI-AA - REV6.xlsx', '', './files/wi/'),
(39, 'YSP-5600', 'FA', 'F0048', 'GRILLE FRAME UNIT', 'MP', 'CLOSE', '2016-08-02', '1', 'FIRMAN', 'F0048 YSP-5600SR WI GFU (Grille Frame Unit) Rev. 01.xlsx', './files/wi/F0048 YSP-5600SR WI GFU (Grille Frame Unit) Rev. 01.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(40, 'YSP-5600', 'FA', 'YSP-5600SR/WI/AS', 'ARRAY SPEAKER UNIT', 'MP', 'CLOSE', '2016-07-30', '4', 'FIRMAN', 'YSP-5600SR WI AS (Array Speaker Unit) Rev.04.xlsx', './files/wi/YSP-5600SR WI AS (Array Speaker Unit) Rev.04.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(41, 'YSP-5600', 'FA', 'YSP-5600/WI/WC', 'WOOFER ASSY CHECK', 'MP', 'CLOSE', '2016-01-11', '0', 'RIAN', 'YSP-5600SR WI WOOFER CHECK Rev.00.xlsx', './files/wi/YSP-5600SR WI WOOFER CHECK Rev.00.xlsx', 'YSP-5600-WI-MI-WC-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-WC-DDC-000.pdf'),
(42, 'YSP-5600', 'FA', 'YSP-5600/WI/AFC', 'ARRAY FUNCTION CHECK', 'MP', 'CLOSE', '2016-01-11', '0', 'RIAN', 'YSP-5600SR WI AFC (Array Fungtion Check) Rev.00.xlsx', './files/wi/YSP-5600SR WI AFC (Array Fungtion Check) Rev.00.xlsx', 'YSP-5600-WI-AFC-DDC-000.pdf', './files/wi/YSP-5600-WI-AFC-DDC-000.pdf'),
(43, 'YSP-5600', 'FA', 'YSP-5600/WI/AU', 'AMP UNIT INSPECTION', 'MP', 'CLOSE', '2015-12-10', '4', 'RIAN', 'WI YSP-5600-AMP UNIT CHECK Rev.04.xlsx', './files/wi/WI YSP-5600-AMP UNIT CHECK Rev.04.xlsx', 'YSP-5600-WI-AU-DDC-004.pdf', './files/wi/YSP-5600-WI-AU-DDC-004.pdf'),
(44, 'YSP-5600', 'FA', 'YSP-5600SR/WI/SC', 'SOUND CHECK', 'MP', 'CLOSE', '2015-10-13', '1', 'RIAN', 'YSP-5600SR WI SOUND CHEK Rev.01.xlsx', './files/wi/YSP-5600SR WI SOUND CHEK Rev.01.xlsx', '', './files/wi/'),
(45, 'YSP-5600', 'FA', 'YSP-5600SR/WI/PC', 'PAIRING CHECK', 'MP', 'CLOSE', '2015-09-04', '1', 'RIAN', 'YSP-5600SR WI PAIRING CHEK Rev.01.xlsx', './files/wi/YSP-5600SR WI PAIRING CHEK Rev.01.xlsx', '', './files/wi/'),
(46, 'YSP-5600', 'PCBA', 'YSP 5600/DAMP/WI/MI', 'MANUAL INSERTION PCB DAMP', 'MP', 'CLOSE', '2016-01-13', '2', 'HARDI', 'WI-MI YSP-5600 DAMP REV2.xlsx', './files/wi/WI-MI YSP-5600 DAMP REV2.xlsx', '', './files/wi/'),
(47, 'YSP-5600', 'PCBA', 'YSP 5600/INPUT/WI/MI', 'MANUAL INSERTION PCB INPUT', 'MP', 'CLOSE', '2016-02-10', '3', 'HARDI', 'WI-MI YSP-5600 INPUT REV3.xlsx', './files/wi/WI-MI YSP-5600 INPUT REV3.xlsx', '', './files/wi/'),
(48, 'YSP-5600', 'PCBA', 'M0026', 'MANUAL INSERTION PCB POWER', 'MP', 'CLOSE', '2016-10-04', '6', 'EKO', '11. M0026 WI YSP-5600 dan SWK W16-MI (04 Oct 16).xlsx', './files/wi/11. M0026 WI YSP-5600 dan SWK W16-MI (04 Oct 16).xlsx', '', './files/wi/'),
(49, 'YSP-5600', 'PCBA', 'YSP 5600/DIGI/WI/MI', 'MANUAL INSERTION PCB DIGI', 'MP', 'CLOSE', '2015-10-12', '2', 'FIKRI', 'WI-MI YSP 5600 DIGI REV 2.xlsx', './files/wi/WI-MI YSP 5600 DIGI REV 2.xlsx', '', './files/wi/'),
(50, 'YSP-5600', 'PCBA', 'YSP 5600/DAMP/WI/FCT', 'FCT INSPECTION PCB DAMP', 'MP', 'CLOSE', '2015-09-03', '0', 'MUKLHIS', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-DAMP-FCT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-DAMP-FCT-DDC-000.pdf'),
(51, 'YSP-5600', 'PCBA', 'YSP 5600/POWER/WI/FCT', 'FCT INSPECTION PCB POWER', 'MP', 'CLOSE', '2015-09-03', '0', 'FIKRI', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-POWER-FCT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-POWER-FCT-DDC-000.pdf'),
(52, 'YSP-5600', 'PCBA', 'YSP 5600/INPUT/WI/FCT', 'FCT INSPECTION PCB INPUT', 'MP', 'CLOSE', '2015-09-03', '0', 'MUKLHIS', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-INPUT-FCT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-INPUT-FCT-DDC-000.pdf'),
(53, 'YSP-5600', 'PCBA', 'YSP 5600/DIGI/WI/FCT', 'FCT INSPECTION PCB DIGI', 'MP', 'CLOSE', '2015-08-12', '3', 'HARDI', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-DIGITAL-FCT-DDC-003.pdf', './files/wi/YSP-5600-WI-MI-DIGITAL-FCT-DDC-003.pdf'),
(54, 'YSP-5600', 'PCBA', 'YSP 5600/HDMI/WI/FCT', 'FCT INSPECTION PCB HDMI', 'MP', 'CLOSE', '2015-09-03', '0', 'MUKLHIS', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-HDMI-FCT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-HDMI-FCT-DDC-000.pdf'),
(55, 'YSP-5600', 'PCBA', 'YSP 5600/DAMP/WI/ICT', 'ICT INSPECTION PCB DAMP', 'MP', 'CLOSE', '2015-09-03', '0', 'MUKLHIS', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-DAMP-ICT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-DAMP-ICT-DDC-000.pdf'),
(56, 'YSP-5600', 'PCBA', 'YSP 5600/INPUT/WI/ICT', 'ICT INSPECTION PCB INPUT', 'MP', 'CLOSE', '2015-09-03', '0', 'MUKLHIS', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-INPUT-ICT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-INPUT-ICT-DDC-000.pdf'),
(57, 'YSP-5600', 'PCBA', 'YSP 5600/POWER/WI/ICT', 'ICT INSPECTION PCB POWER', 'MP', 'CLOSE', '2015-09-03', '0', 'MUKLHIS', 'WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_ R.03.xlsx', 'YSP-5600-WI-MI-POWER-ICT-DDC-000.pdf', './files/wi/YSP-5600-WI-MI-POWER-ICT-DDC-000.pdf'),
(58, 'YSP-5600', 'PCBA', 'PCB-DIGITAL-PA-PB-YSP5600-L2R0', 'SETLIST SMT DIGITAL L2', 'MP', 'CLOSE', '2015-11-23', '3', 'ANGGI', 'PCB-DIGITAL-PA-PB-YSP5600-L2R3.xls', './files/wi/PCB-DIGITAL-PA-PB-YSP5600-L2R3.xls', 'YSP-5600-DIGITAL-PA-PB-SL-DDC.pdf', './files/wi/YSP-5600-DIGITAL-PA-PB-SL-DDC.pdf'),
(60, 'YSP-5600', 'PCBA', 'PCB-POWER-SB-YSP5600-L2R0', 'SETLIST SMT INPUT-POWER-CB L2', 'MP', 'CLOSE', '2016-01-13', '2', 'ANGGI', 'PCB-POWER-SB-YSP5600-L2R2.xls', './files/wi/PCB-POWER-SB-YSP5600-L2R2.xls', 'YSP-5600-INPUT-POWER-SB-DDC-002.pdf', './files/wi/YSP-5600-INPUT-POWER-SB-DDC-002.pdf'),
(64, 'YSP-5600', 'PCBA', 'YSP-5600/WI/ASC', 'ARRAY SPEAKER CHECK', 'MP', 'CLOSE', '2015-06-15', '0', 'RIAN', 'WI  YSP-5600-Array Speaker Chek Rev.00.xlsx', './files/wi/WI  YSP-5600-Array Speaker Chek Rev.00.xlsx', 'YSP-5600-WI-ASC ddc Rev.00.pdf', './files/wi/YSP-5600-WI-ASC ddc Rev.00.pdf'),
(66, 'NS-B40', 'FA', 'NS-B40SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-30', '7', 'FIRMAN', 'NS-B40SR WI FA REV7.xlsx', './files/wi/NS-B40SR WI FA REV7.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(67, 'NS-C40', 'FA', 'NS-C40SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-30', '7', 'FIRMAN', 'NS-C40SR WI FA REV 7.xlsx', './files/wi/NS-C40SR WI FA REV 7.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(68, 'NS-P40', 'FA', 'NS-P40SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-21', '12', 'DIVKY', 'NS-P40SR SAA R.12.xls', './files/wi/NS-P40SR SAA R.12.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(69, 'NS-P40', 'FA', 'NS-P40SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-21', '15', 'ADE', 'NS-P40SR_PA_R.15.xls', './files/wi/NS-P40SR_PA_R.15.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(70, 'NS-PB40', 'FA', 'NS-PB40SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-20', '2', 'WILDAN', 'NS-PB40SR PA Rev.2.xls', './files/wi/NS-PB40SR PA Rev.2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(71, 'NS-WSW160', 'FA', 'NS-WSW160SR/WI/RPA', 'REAR PANEL ASSY', 'MP', 'CLOSE', '2016-06-06', '3', 'ADE', 'NS-WSW-160 WI RPA R3.xls', './files/wi/NS-WSW-160 WI RPA R3.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(73, 'NS-SW500', 'PAINTING', '500_Series_AV-30-III-10', 'PAINTING', 'MP', 'CLOSE', '2016-07-01', '10', 'DONI', 'WI-500-PTG PN rev.1.xls', './files/wi/WI-500-PTG PN rev.1.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(74, 'NS-B700', 'FA', 'NS-B700SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-16', '11', 'ADE', 'B700-WI-PA-REV11.xls', './files/wi/B700-WI-PA-REV11.xls', '', './files/wi/'),
(75, 'NS-B700', 'FA', 'NS-B700SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '6', 'DIVKY', 'B700-WI-SAA-REV06.xls', './files/wi/B700-WI-SAA-REV06.xls', '', './files/wi/'),
(76, 'NS-B700, NS-BP400', 'PAINTING', '700_PN_Series_14-A-1-II-08', 'PAINTING BL & WH', 'MP', 'CLOSE', '2016-07-01', '13', 'DONI', 'WI 700 PN Series 14-A-1-ll-08 rev14.xls', './files/wi/WI 700 PN Series 14-A-1-ll-08 rev14.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(77, 'NS-SW901', 'PAINTING', '901_PN_Series_14-A-1-II-12', 'PAINTING', 'MP', 'CLOSE', '2016-07-27', '3', 'DONI', '901-WI-PTG PN rev1.XLS', './files/wi/901-WI-PTG PN rev1.XLS', 'blank.xlsx', './files/wi/blank.xlsx'),
(78, 'DBR12', 'FA', 'DBR12/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-16', '9', 'ADE', 'DBR-12 WI PA Rev 9.xlsx', './files/wi/DBR-12 WI PA Rev 9.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(79, 'DBR15', 'FA', 'DBR15/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-15', '9', 'ADE', 'DBR-15 WI PA REV 9.xlsx', './files/wi/DBR-15 WI PA REV 9.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(80, 'DSR112', 'FA', 'DSR112/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-21', '6', 'ADE', 'DSR 112 WI PA REV 6.xls', './files/wi/DSR 112 WI PA REV 6.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(81, 'DSR118W', 'FA', 'DSR118W/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-20', '8', 'FIRMAN', 'DSR118W WI FA REV 8.xlsx', './files/wi/DSR118W WI FA REV 8.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(82, 'NS-F51', 'FA', 'NS-F51SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '3', 'WILDAN', 'NS F-51SR WI PA Rev.03.xls', './files/wi/NS F-51SR WI PA Rev.03.xls', '', './files/wi/'),
(83, 'NS-5000', 'PAINTING', 'P0003', 'PAINTING SPRAY PROCCESS', 'MP', 'CLOSE', '2016-07-26', '3', 'DONI', 'P0003-WI-PTG NS-5000 rev. 3.xls', './files/wi/P0003-WI-PTG NS-5000 rev. 3.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(86, 'NS-SW050', 'PCBA', 'NS-SW050SR/WI/MAIN/MI', 'MANUAL INSERT PCB MAIN', 'MP', 'CLOSE', '2016-07-28', '2', 'EKO', 'WI NS-SW050 Rev. 2.xlsx', './files/wi/WI NS-SW050 Rev. 2.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(87, 'NS-PA40', 'FA', 'NS-PA40SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-20', '9', 'ADE', 'NS-PA40SR PA R.09.xls', './files/wi/NS-PA40SR PA R.09.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(88, 'NS-PA40', 'FA', 'NS-PA40SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-29', '9', 'DIVKY', 'NS-PA40SR SAA R.09.xls', './files/wi/NS-PA40SR SAA R.09.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(90, 'NS-SW500', 'FA', 'NS-SW500SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-20', '12', 'FIRMAN', 'SW500-WI-FA Rev12.xlsx', './files/wi/SW500-WI-FA Rev12.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(91, 'NS-SW100', 'FA', 'NS-SW100/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-20', '5', 'WILDAN', 'NS-SW100 WI PA Rev.05.xlsx', './files/wi/NS-SW100 WI PA Rev.05.xlsx', '', './files/wi/'),
(92, 'NS-SW100', 'FA', 'NS-SW100/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-02', '5', 'FIRMAN', 'WI FA SW100 REV5.xlsx', './files/wi/WI FA SW100 REV5.xlsx', '', './files/wi/'),
(93, 'NS-SW1000', 'PAINTING', 'SW1000_PN_30-A-1-IX-14', 'PAINTING', 'MP', 'CLOSE', '2016-07-01', '2', 'DONI', 'SW1000 WI-PTG PN rev1 master.xls', './files/wi/SW1000 WI-PTG PN rev1 master.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(94, 'NX-N500', 'FA', 'NX-N500/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-25', '11', 'ADE', 'NX-N500 WI PA REV 11.xlsx', './files/wi/NX-N500 WI PA REV 11.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(95, 'NS-AW194', 'FA', 'NS-AW194SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-26', '6', 'FIRMAN', 'NS-AW194SR WI FA REV 6.xlsx', './files/wi/NS-AW194SR WI FA REV 6.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(96, 'DSR112', 'FA', 'DSR112/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-20', '10', 'FIRMAN', 'DSR112 WI FA REV 10.xlsx', './files/wi/DSR112 WI FA REV 10.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(97, 'NS-SW050', 'FA', 'NS-SW050/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-02', '3', 'FIRMAN', 'WI FA SW050 REV3.xlsx', './files/wi/WI FA SW050 REV3.xlsx', '', './files/wi/'),
(98, 'Side Panel PN Series', 'PAINTING', 'Side Panel PN  Series AV-35-VIII-09', 'PAINTING', 'MP', 'CLOSE', '2016-07-01', '13', 'DONI', 'WI Ptg Side Panel PN Rev. 13.xls', './files/wi/WI Ptg Side Panel PN Rev. 13.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(99, 'SRT-700', 'FA', 'SRT-700SR/WI/BU', 'BAFFLE UNIT', 'MP', 'CLOSE', '2016-07-25', '3', 'FIRMAN', 'SRT-700 WI BU REV. 3.xlsx', './files/wi/SRT-700 WI BU REV. 3.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(100, 'SRT-700', 'FA', 'SRT-700SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-06-23', '6', 'FIRMAN', 'SRT-700 WI FA REV. 6.xls', './files/wi/SRT-700 WI FA REV. 6.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(101, 'SRT-1500', 'RPA', 'SRT-1500SR/WI/MUC', 'MAIN UNIT CHECK', 'MP', 'CLOSE', '2016-09-13', '10', 'RIAN', 'Main_Unit_Check_SRT-1500_Rev.10.xlsx', './files/wi/Main_Unit_Check_SRT-1500_Rev.10.xlsx', '', './files/wi/'),
(102, 'SRT-1500', 'FA', 'SRT-1500SR/WI/SUC', 'SOUND CHECK', 'MP', 'CLOSE', '2016-07-25', '2', 'RIAN', 'WI Sound_Check_SRT-1500_R02.xls', './files/wi/WI Sound_Check_SRT-1500_R02.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(103, 'THRC212', 'FA', 'THRC212/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-07-26', '5', 'ADE', 'THRC212 WI PA Rev 5.xls', './files/wi/THRC212 WI PA Rev 5.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(104, 'VS6', 'FA', 'VS6/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-25', '5', 'FIRMAN', 'VS6 WI FA REV 5.xlsx', './files/wi/VS6 WI FA REV 5.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(105, 'VXC4F', 'PCBA', 'VXC4/WI/MI', 'PCB NETWORK - MANUAL INSERTION', 'MP', 'CLOSE', '2016-07-25', '5', 'EKO', 'WI-VXc4-network REV.5.xls', './files/wi/WI-VXc4-network REV.5.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(106, 'VXC5F VXC5FW', 'FA', 'VXC5F/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-26', '3', 'FIRMAN', 'VXC 5F SR WI FA REV 3.xlsx', './files/wi/VXC 5F SR WI FA REV 3.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(107, 'NS-333', 'FA', 'NS-333SR/WI/SFG', 'FRONT GRILLE ASSY', 'MP', 'CLOSE', '2016-07-30', '2', 'WILDAN', 'Ns-333 WI FG rev. 2.xls', './files/wi/Ns-333 WI FG rev. 2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(108, 'NS-555', 'FA', 'NS-555SR/WI/SFG', 'FRONT GRILLE ASSY', 'MP', 'CLOSE', '2016-07-21', '2', 'WILDAN', 'NS-555SR-SFG Rev.3.xls', './files/wi/NS-555SR-SFG Rev.3.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(109, 'NS-555', 'FA', 'NS-555/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-05-17', '13', 'FIRMAN', 'NS-555WI FA REV13.xlsx', './files/wi/NS-555WI FA REV13.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(110, 'NS-777', 'FA', 'NS-777SR/WI/SFG', 'FRONT GRILLE ASSY', 'MP', 'CLOSE', '2016-07-21', '3', 'WILDAN', 'NS-777 WI SFG rev. 3.xls', './files/wi/NS-777 WI SFG rev. 3.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(111, 'NS-C444', 'FA', 'NS-C444SR/WI/SFG', 'FRONT GRILLE ASSY', 'MP', 'CLOSE', '2016-07-21', '2', 'WILDAN', 'NS-C444 SFG rev. 2.xls', './files/wi/NS-C444 SFG rev. 2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(112, 'YAS-105', 'FA', 'YAS-105/WI/SC', 'SOUND CHECK', 'MP', 'CLOSE', '2016-07-30', '4', 'BINTANG', 'YAS-105 WI Sound Check Rev4.xls', './files/wi/YAS-105 WI Sound Check Rev4.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(113, 'YAS-152', 'FA', 'YAS-152SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-06-23', '10', 'FIRMAN', 'WI FA YAS-152SR R.10.xlsx', './files/wi/WI FA YAS-152SR R.10.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(114, 'YAS-152, ATS 1520', 'PCBA', 'M0048', 'PCB POWER - MANUAL INSERTION', 'MP', 'CLOSE', '2016-06-23', '3', 'HARDI', 'WI MI YAS-152 R.03.xlsx', './files/wi/WI MI YAS-152 R.03.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(115, 'NS-WSW41', 'FA', 'NS-WSW41SR/WI/RPA', 'REAR PANEL ASSY', 'MP', 'CLOSE', '2016-07-06', '6', 'FIRMAN', 'NS-WSW41SR WI  RPA Rev 6.xlsx', './files/wi/NS-WSW41SR WI  RPA Rev 6.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(116, 'YAS-306', 'FA', 'F0021', 'FINAL ASSY', 'MP', 'CLOSE', '2016-10-03', '6', 'DIVKY', 'F0021 WI FA YAS-306 REV 6.xlsx', './files/wi/F0021 WI FA YAS-306 REV 6.xlsx', '', './files/wi/'),
(117, 'YAS-706', 'FA', 'F0035', 'FINAL ASSY', 'MP', 'OPEN', '2016-10-03', '5', 'FIRMAN', 'F0035 YAS-706 WI FA REV 5.xlsx', './files/wi/F0035 YAS-706 WI FA REV 5.xlsx', '', './files/wi/'),
(118, 'YAS-706', 'FA', 'F0039', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '6', 'DIVKY', 'F0039 YAS-706SR WI SAA REV 6.xls', './files/wi/F0039 YAS-706SR WI SAA REV 6.xls', '', './files/wi/'),
(119, 'NS-F350', 'FA', 'NS-F350SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '6', 'ADE', 'NS-F350SR-WI-PA-Rev6.xls', './files/wi/NS-F350SR-WI-PA-Rev6.xls', '', './files/wi/'),
(120, 'NS-F500', 'FA', 'NS-F500SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-25', '6', 'FIRMAN', 'F500-WI-FA rev6.xlsx', './files/wi/F500-WI-FA rev6.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(121, 'NS-AW194', 'FA', 'NS-AW194SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-23', '5', 'DIVKY', 'NS-AW194SR SAA R.05.xlsx', './files/wi/NS-AW194SR SAA R.05.xlsx', '', './files/wi/'),
(122, 'NS-AW992', 'FA', 'NS-AW992SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-29', '4', 'DIVKY', 'NS-AW992SR-WI-SAA-Rev04.xls', './files/wi/NS-AW992SR-WI-SAA-Rev04.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(123, 'DBR12/', 'FA', 'DBR12/WI/AA', 'AMP ASSY', 'MP', 'CLOSE', '2016-07-30', '2', 'ADE', 'DBR12 WI RPA Rev 2.xls', './files/wi/DBR12 WI RPA Rev 2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(124, 'DBR15', 'FA', 'DBR15/WI/AA', 'AMP ASSY', 'MP', 'CLOSE', '2016-07-30', '2', 'ADE', 'DBR-15 WI RPA REV 2.xls', './files/wi/DBR-15 WI RPA REV 2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(125, 'DXS-18', 'FA', 'DXS-18/WI/PSC', 'PHASE AND SWEEPER CHECK', 'MP', 'CLOSE', '2016-07-30', '2', 'BINTANG', 'DXS-18 WI Sound Check Rev2.xls', './files/wi/DXS-18 WI Sound Check Rev2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(126, 'L-85', 'FA', 'L-85/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-01', '7', 'ADE', 'L85 WI PA REV 7.xlsx', './files/wi/L85 WI PA REV 7.xlsx', '', './files/wi/'),
(127, 'L-85', 'FA', 'L-85SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-01', '2', 'DIVKY', 'STAND L-85SR-WI-SAA REV.02.xls', './files/wi/STAND L-85SR-WI-SAA REV.02.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(128, 'NS-SW1000', 'WW', 'NS-SW1000PTG/Top/Proses1/FL', 'Flat Laminator, Running Saw, Double End Tenoner', 'MP', 'CLOSE', '2016-08-05', '2', 'DANI', 'WI WW Top NS-SW1000SR PTG REV 2.xls', './files/wi/WI WW Top NS-SW1000SR PTG REV 2.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(129, 'VS4', 'FA', 'VS4/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-29', '6', 'FIRMAN', 'VS4Series WI FA REV 6.xlsx', './files/wi/VS4Series WI FA REV 6.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(130, 'SRT-700', 'FA', 'SRT-700SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-22', '5', 'ADE', 'SRT-700 PA REV. 05.xlsx', './files/wi/SRT-700 PA REV. 05.xlsx', '', './files/wi/'),
(131, 'NS-555', 'FA', 'NS-555SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-02', '7', 'DIVKY', 'NS-555WI SAA REV7.xls', './files/wi/NS-555WI SAA REV7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(132, 'NS-WSW41', 'FA', 'NS-WSW41SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-05', '3', 'FIRMAN', 'NS-WSW41 WI FA R.03.xlsx', './files/wi/NS-WSW41 WI FA R.03.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(133, 'YAS-203', 'FA', 'YAS-CU203SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-05', '4', 'FIRMAN', 'YAS-CU203SR WI FA R.04.xlsx', './files/wi/YAS-CU203SR WI FA R.04.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(134, 'YAS-306', 'FA', 'F0019', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-05', '4', 'ADE', 'F0019 WI PA YAS 306 Rev.04.xlsx', './files/wi/F0019 WI PA YAS 306 Rev.04.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(135, 'YAS-306', 'FA', 'F0022', 'AMP UNIT', 'MP', 'CLOSE', '2016-08-09', '3', 'FIRMAN', 'F0022 WI AU YAS-306 REV3.xlsx', './files/wi/F0022 WI AU YAS-306 REV3.xlsx', '', './files/wi/'),
(136, 'YAS-306', 'FA', 'F0032', 'FUNCTION CHECK', 'MP', 'CLOSE', '2016-09-15', '4', 'BINTANG', 'F0032 WI Function Check YAS-306 Rev.04.xlsx', './files/wi/F0032 WI Function Check YAS-306 Rev.04.xlsx', '', './files/wi/'),
(137, 'SR-301', 'FA', 'SR-301/WI/FC', 'FUNCTION CHECK', 'MP', 'CLOSE', '2016-07-26', '4', 'BINTANG', 'YHT SR-301 WI Function Check FA Rev4.xls', './files/wi/YHT SR-301 WI Function Check FA Rev4.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(138, 'YSP-1400', 'PCBA', 'M0046', 'PCB POWER - MANUAL INSERTION', 'MP', 'CLOSE', '2016-06-23', '2', 'HARDI', 'YSP-1400POWER WI MI.Rev.02.xlsx', './files/wi/YSP-1400POWER WI MI.Rev.02.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(139, 'YSP-1600', 'FA', 'YSP-1600/WI/AA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-22', '13', 'DIVKY', 'YSP-1600SR WI AA R.13.xls', './files/wi/YSP-1600SR WI AA R.13.xls', '', './files/wi/'),
(141, 'YSP-1600', 'FA', 'YSP-1600SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-05', '9', 'ADE', 'YSP1600SR-WI-PA R09.xls', './files/wi/YSP1600SR-WI-PA R09.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(142, 'YSP-5600', 'FA', 'F0054', 'SUB ASSY', 'MP', 'CLOSE', '2016-08-30', '8', 'FIRMAN', 'YSP-5600SR WI SA R.08.xlsx', './files/wi/YSP-5600SR WI SA R.08.xlsx', '', './files/wi/'),
(143, 'YSP-2700', 'FA', 'F0002', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-21', '6', 'DIVKY', 'F0002 YSP-2700SR WI SAA REV 6.xls', './files/wi/F0002 YSP-2700SR WI SAA REV 6.xls', '', './files/wi/'),
(144, 'YSP-2700', 'FA', 'F0003', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-08', '6', 'FIRMAN', 'F0003 YSP-CU2700SR WI FA 6.xls', './files/wi/F0003 YSP-CU2700SR WI FA 6.xls', '', './files/wi/'),
(145, 'NS-WSW121', 'FA', 'F0010', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-23', '6', 'FIRMAN', 'F0010 NS-WSW121 WI FA REV6.xlsx', './files/wi/F0010 NS-WSW121 WI FA REV6.xlsx', '', './files/wi/'),
(146, 'YSP-2700', 'FA', 'F0014', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-30', '3', 'RIZA', 'F0014 YSP-CU2700SR WI SA R3.xls', './files/wi/F0014 YSP-CU2700SR WI SA R3.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(147, 'YST-FSW100', 'FA', 'YST-FSW100SR/WI/AAC', 'AUDIO ANALYZER CHECK', 'MP', 'CLOSE', '2016-07-20', '1', 'BINTANG', 'YST-FSW100-WI-AAC R1.xls', './files/wi/YST-FSW100-WI-AAC R1.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(148, 'YST-RSW300', 'FA', 'YST-RSW300SR/WI/AAC', 'AUDIO ANALYZER CHECK', 'MP', 'CLOSE', '2016-07-21', '1', 'BINTANG', 'YST-RSW300-WI-AAC R1.xls', './files/wi/YST-RSW300-WI-AAC R1.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(149, 'YST-RSW300', 'PCBA', 'YST-RSW300SR/WI/MI', 'PCB MANUAL INSERTION', 'MP', 'CLOSE', '2016-06-13', '8', 'HARDI', 'YST-RSW300-WI-MI. rev.8.xlsx', './files/wi/YST-RSW300-WI-MI. rev.8.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(150, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses1/RS', 'PANEL SAW', 'MP', 'CLOSE', '2016-08-05', '0', 'SATRIYA', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(151, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses2/Moulder', 'MOULDER', 'MP', 'CLOSE', '2016-08-05', '0', 'SATRIYA', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(152, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses3/VVC', 'VERTICAL V-CUT', 'MP', 'CLOSE', '2016-08-05', '6', 'HENDRO', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(153, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses4/PS', 'PROFILE SANDER', 'MP', 'CLOSE', '2016-08-05', '0', 'SATRIYA', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(154, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses5/SL', 'SOFT LAMINATOR', 'MP', 'CLOSE', '2016-08-05', '7', 'DANI', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(155, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses6/NCR', 'NC ROUTER', 'MP', 'CLOSE', '2016-08-05', '3', 'HENDRO', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(156, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses7/SD', 'SINGLE DRILL', 'MP', 'CLOSE', '2016-08-05', '0', 'SATRIYA', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(157, 'YST-SW012', 'WW', 'YST-SW012/Body/Proses8/HVC', 'HORIZONTAL V-CUT', 'MP', 'CLOSE', '2016-08-05', '0', 'SATRIYA', 'WI WW Body YST-SW012 Rev 7.xls', './files/wi/WI WW Body YST-SW012 Rev 7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(158, 'YST-SW515', 'PCBA', 'YST-SW515SR/WI/MI', 'PCB MAIN MANUAL INSTERTION', 'MP', 'CLOSE', '2016-08-05', '22', 'EKO', 'YST-SW515-WI-MI -rev22.xlsx', './files/wi/YST-SW515-WI-MI -rev22.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(159, 'NS-AW392', 'FA', 'NS-AW392SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-01', '9', 'DIVKY', 'NS-AW392SR WI FA REV 9.xlsx', './files/wi/NS-AW392SR WI FA REV 9.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(160, 'NS-C500', 'FA', 'NS-C500SR/WI/SFG', 'FRONT GRILLE ASSY', 'MP', 'CLOSE', '2016-08-05', '1', 'WILDAN', 'C500-WI-SFG R. 1.xls', './files/wi/C500-WI-SFG R. 1.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(161, 'NS-C500', 'FA', 'NS-C500SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-14', '3', 'ADE', 'NS-C500-WI-PA-REV03.xls', './files/wi/NS-C500-WI-PA-REV03.xls', '', './files/wi/'),
(162, 'NS-F500', 'FA', 'NS-F500SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-08', '4', 'WILDAN', 'NS-F500-WI-PA-REV 4.xls', './files/wi/NS-F500-WI-PA-REV 4.xls', '', './files/wi/'),
(163, 'DXS18', 'FA', 'DXS18/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-01', '5', 'ADE', 'DXS18 WI PA REV5.xls', './files/wi/DXS18 WI PA REV5.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(164, 'DXS18', 'FA', 'DXS18/WI/AA', 'AMP ASSY', 'MP', 'CLOSE', '2016-08-01', '2', 'ADE', 'DXS-18 WI RPA Rev 2.xlsx', './files/wi/DXS-18 WI RPA Rev 2.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(165, 'L-85', 'FA', 'L-85SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-30', '6', 'FIRMAN', 'STAND L-85SR-WI-FA REV.06.xlsx', './files/wi/STAND L-85SR-WI-FA REV.06.xlsx', '', './files/wi/'),
(166, 'NS-5000', 'FA', 'F0046', 'ACCESSORY ASSY', 'MP', 'CLOSE', '2016-09-20', '3', 'WILDAN', 'F0046 NS-5000 WI SAA REV3.xlsx', './files/wi/F0046 NS-5000 WI SAA REV3.xlsx', '', './files/wi/'),
(167, 'NS-5000', 'FA', 'F0047', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-23', '4', 'FIRMAN', 'F0047 NS-5000 WI FA Rev.04.xlsx', './files/wi/F0047 NS-5000 WI FA Rev.04.xlsx', '', './files/wi/'),
(168, 'YAS-203, ATS-2030', 'FA', 'YAS-CU203SR/WI/AU', 'AMP UNIT', 'MP', 'CLOSE', '2016-08-03', '7', 'ADE', 'YAS-203SR & ATS-2030SR PA R7.xls', './files/wi/YAS-203SR & ATS-2030SR PA R7.xls', 'blank.xlsx', './files/wi/blank.xlsx'),
(169, 'YAS-105', 'FA', 'YAS-105SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-07-30', '8', 'FIRMAN', 'WI FA YAS-105SR_ATS-1050SR Rev.08.xlsx', './files/wi/WI FA YAS-105SR_ATS-1050SR Rev.08.xlsx', 'blank.xlsx', './files/wi/blank.xlsx'),
(170, 'YAS-306', 'FA', 'F0023', 'TOP PANEL UNIT', 'MP', 'CLOSE', '2016-09-23', '3', 'WILDAN', 'F0023 WI TPU YAS-306SR rev. 3.xls', './files/wi/F0023 WI TPU YAS-306SR rev. 3.xls', '', './files/wi/'),
(171, 'NS-SW050', 'FA', 'NS-SW050/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-20', '4', 'WILDAN', 'WI PA SW050 REV 04.xlsx', './files/wi/WI PA SW050 REV 04.xlsx', '', './files/wi/'),
(172, 'NS-777', 'FA', 'NS-777/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '10', 'DIVKY', 'NS-777SR-WI-SAA-Rev10.xls', './files/wi/NS-777SR-WI-SAA-Rev10.xls', '', './files/wi/'),
(173, 'NS-C700', 'FA', 'NS-C700SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-10-03', '8', 'WILDAN', 'C700-WI-PA rev8.xls', './files/wi/C700-WI-PA rev8.xls', '', './files/wi/'),
(174, 'YAS-706', 'PCBA', 'C0015', 'PCB-DAMP-PA-PB-YAS706-L2R1', 'MP', 'CLOSE', '2016-08-29', '3', 'ANGGI', 'C0015 PCB-DAMP-PA-PB-YAS706-L2R2.xlsx', './files/wi/C0015 PCB-DAMP-PA-PB-YAS706-L2R2.xlsx', '', './files/wi/'),
(176, 'YAS-706', 'PCBA', 'C0013', 'PCB-POWER-SB-YAS706-L2R1 SMT', 'MP', 'CLOSE', '2016-07-02', '2', 'BILLY', 'NS-BP301SR-WI-SNT R00.xlsx', './files/wi/NS-BP301SR-WI-SNT R00.xlsx', '', './files/wi/'),
(177, 'YAS-706', 'PCBA', 'A0003', 'YAS-706SR POWER RG', 'MP', 'CLOSE', '2016-06-22', '2', 'HARIANTO', 'YAS-706SR  POWER  RG.xls', './files/wi/YAS-706SR  POWER  RG.xls', '', './files/wi/'),
(178, 'YAS-706', 'PCBA', 'A0006', 'YAS-706SR POWER AV', 'MP', 'CLOSE', '2016-06-22', '2', 'HARIANTO', 'YAS-706SR  POWER  AV.xls', './files/wi/YAS-706SR  POWER  AV.xls', '', './files/wi/'),
(179, 'YAS-706', 'PCBA', 'M0020', 'Manual Insert YAS-706 POWER', 'MP', 'CLOSE', '2016-06-22', '1', 'HARDI', 'WI-Manual Insert YAS-706 POWER .xlsx', './files/wi/WI-Manual Insert YAS-706 POWER .xlsx', '', './files/wi/'),
(180, 'YAS-706', 'FA', 'F0034', 'PACKAGE ASSY', 'MP', 'OPEN', '2016-09-21', '3', 'ADE', 'F0034 YAS 706 WI PA REV 3.xlsx', './files/wi/F0034 YAS 706 WI PA REV 3.xlsx', '', './files/wi/'),
(181, 'NS-SW050, NS-SW100', 'PCBA', 'C0006', 'BONDING PCB-MAIN-SB-SW050-100-L2R2', 'MP', 'CLOSE', '2016-08-29', '5', 'BILLY', 'C0006 PCB-MAIN-SB-SW050-100-L2R2 Rev.05.xls', './files/wi/C0006 PCB-MAIN-SB-SW050-100-L2R2 Rev.05.xls', '', './files/wi/'),
(182, 'YAS-706', 'FA', 'F0041', 'FUNCTION CHECK', 'MP', 'CLOSE', '2016-08-18', '3', 'BINTANG', 'F0041 YAS-CU706 WI Function Check Rev3.xlsx', './files/wi/F0041 YAS-CU706 WI Function Check Rev3.xlsx', '', './files/wi/'),
(183, 'NS-PZ40', 'FA', 'NS-PZ40SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-03', '1', 'DIVKY', 'NS-PZ40SR SAA R.01.xls', './files/wi/NS-PZ40SR SAA R.01.xls', '', './files/wi/'),
(184, 'NS-P150', 'FA', 'NS-P150SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-14', '3', 'DIVKY', 'NS-P150 SAA R.3.xls', './files/wi/NS-P150 SAA R.3.xls', '', './files/wi/'),
(185, 'NS-F160', 'FA', 'NS-F160SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-23', '3', 'DIVKY', 'Acc Assy F160 rev3.xls', './files/wi/Acc Assy F160 rev3.xls', '', './files/wi/'),
(186, 'NS-PC350', 'FA', 'NS-PC350SR/WI/SNT', 'NETWORK ASSY', 'MP', 'CLOSE', '2016-08-03', '2', 'FIRMAN', 'NS-PC350 WI SNT R2.xlsx', './files/wi/NS-PC350 WI SNT R2.xlsx', '', './files/wi/'),
(187, 'NS-B500', 'FA', 'NS-B500SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-16', '5', 'ADE', 'NS-B500-WI-PA-REV05.xls', './files/wi/NS-B500-WI-PA-REV05.xls', '', './files/wi/'),
(188, 'NS-B500', 'FA', 'NS-B500SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-11', '3', 'DIVKY', 'NS-B500-WI-SAA-REV03.xls', './files/wi/NS-B500-WI-SAA-REV03.xls', '', './files/wi/'),
(189, 'NS-C500', 'FA', 'NS-C500SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '3', 'DIVKY', 'NS-C500-WI-SAA-REV03.xls', './files/wi/NS-C500-WI-SAA-REV03.xls', '', './files/wi/'),
(190, 'NS-F500', 'FA', 'NS-F500SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-03', '3', 'DIVKY', 'NS-F500-WI-SAA-REV3.xls', './files/wi/NS-F500-WI-SAA-REV3.xls', '', './files/wi/'),
(191, 'NS-F700', 'FA', 'NS-F700SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-06-27', '10', 'ADE', 'F700-WI-PA-REV 10.xls', './files/wi/F700-WI-PA-REV 10.xls', '', './files/wi/'),
(192, 'NS-C700', 'FA', 'NS-C700SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '6', 'DIVKY', 'C700-WI-SAA-REV06.xls', './files/wi/C700-WI-SAA-REV06.xls', '', './files/wi/'),
(193, 'NS-B901', 'FA', 'NS-B901SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '5', 'WILDAN', 'WI PA NS-B901SR rev. 5.xls', './files/wi/WI PA NS-B901SR rev. 5.xls', '', './files/wi/'),
(194, 'NS-B901', 'FA', 'NS-B901/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-02', '2', 'DIVKY', 'WI SAA NS-B901SR REV 2.xls', './files/wi/WI SAA NS-B901SR REV 2.xls', '', './files/wi/'),
(195, 'YAS-152', 'FA', 'YAS-152/WI/MUI', 'MAIN UNIT INSPECTION', 'MP', 'CLOSE', '2016-08-01', '7', 'BINTANG', 'YAS-152 WI Main Unit Inspection Rev7.xls', './files/wi/YAS-152 WI Main Unit Inspection Rev7.xls', '', './files/wi/'),
(196, 'YAS-105', 'FA', 'YAS-105SR/WI/TPU', 'TOP PANEL UNIT', 'MP', 'CLOSE', '2016-08-03', '1', 'WILDAN', 'WI TPU YAS-105SR Rev.01 -.xls', './files/wi/WI TPU YAS-105SR Rev.01 -.xls', '', './files/wi/'),
(197, 'AMP-AH2', 'RPA', 'AMP-AH2/WI/RPA', 'REAR PANEL ASSY', 'MP', 'CLOSE', '2016-09-01', '3', 'ADE', 'AMP-AH2 RPA Rev.3.xls', './files/wi/AMP-AH2 RPA Rev.3.xls', '', './files/wi/'),
(198, 'NS-BP300', 'FA', 'NS-BP300SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '4', 'DIVKY', 'NS-BP300SR-WI- SAA-R4.xls', './files/wi/NS-BP300SR-WI- SAA-R4.xls', '', './files/wi/'),
(199, 'NS-BP300', 'FA', 'NS-BP300SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-22', '10', 'WILDAN', 'NS-BP300SR-WI-PA rev  10.xls', './files/wi/NS-BP300SR-WI-PA rev  10.xls', '', './files/wi/'),
(200, 'YST-FSW150', 'FA', 'YST-FSW150SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-02', '16', 'FIRMAN', 'YST-FSW150-WI-FA R16.xlsx', './files/wi/YST-FSW150-WI-FA R16.xlsx', '', './files/wi/'),
(201, 'VS6', 'FA', 'VS6SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-04', '7', 'DIVKY', 'VS6SR SAA R.07.xls', './files/wi/VS6SR SAA R.07.xls', '', './files/wi/'),
(202, 'NS-50F', 'FA', 'NS-50FSR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-01', '6', 'WILDAN', '50F-WI-PA-REV.06 -.xls', './files/wi/50F-WI-PA-REV.06 -.xls', '', './files/wi/'),
(203, 'SRT-1500', 'FA', 'SRT-1500SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-25', '6', 'DIVKY', 'SRT-1500 SAA Rev.06.xlsx', './files/wi/SRT-1500 SAA Rev.06.xlsx', '', './files/wi/'),
(204, 'SRT-1500', 'FA', 'SRT-1500SR/WI/MU', 'MAIN UNIT', 'MP', 'CLOSE', '2016-07-25', '4', 'FIRMAN', 'SRT-1500 WI MU Rev. 04.xls', './files/wi/SRT-1500 WI MU Rev. 04.xls', '', './files/wi/'),
(205, 'YSP-2500', 'FA', 'YSP-CU2500SR/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-08-18', '8', 'FIRMAN', 'YSP-CU2500SR WI FA R8.xlsx', './files/wi/YSP-CU2500SR WI FA R8.xlsx', '', './files/wi/'),
(206, 'YSP-2700', 'FA', 'F0009', 'SOUND CHECK', 'MP', 'CLOSE', '2016-09-08', '3', 'BINTANG', 'F0009 YSP-CU2700 WI Sound Check Rev3.xlsx', './files/wi/F0009 YSP-CU2700 WI Sound Check Rev3.xlsx', '', './files/wi/'),
(207, 'NS-WSW120, NS-WSW121', 'FA', 'F0011', 'SOUND CHECK', 'MP', 'CLOSE', '2016-08-09', '3', 'BINTANG', 'F0011 NS-WSW120 & NS-WSW121 WI Sound Check Rev3.xlsx', './files/wi/F0011 NS-WSW120 & NS-WSW121 WI Sound Check Rev3.xlsx', '', './files/wi/'),
(208, 'YSP-2700', 'PCBA', 'A0001', 'PCB POWER, PCB MAIN RADIAL AI', 'MP', 'CLOSE', '2016-08-01', '3', 'HARIANTO', 'YSP-2700SR  MAIN POWER   RG.xls', './files/wi/YSP-2700SR  MAIN POWER   RG.xls', '', './files/wi/'),
(209, 'L-85', 'INJECTION', 'WG/INJECTION/033', 'Slide Feet-Plastic Injection', 'MP', 'CLOSE', '2016-02-22', '0', 'EDI', '33. Parameter WG-IPS-033  Slide Feet.xlsx', './files/wi/33. Parameter WG-IPS-033  Slide Feet.xlsx', '', './files/wi/'),
(210, 'Slide Feet', 'SPU', 'WI/SPU/070', 'SPU INJECTION', 'MP', 'CLOSE', '2016-05-31', '0', 'EDI', '. WI -SPU-070.xlsx', './files/wi/. WI -SPU-070.xlsx', '', './files/wi/'),
(211, 'NS-WSW121', 'FA', 'F0081', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-11', '0', 'DIVKY', 'F0081 WSW-121SR WI SAA REV 0.xlsx', './files/wi/F0081 WSW-121SR WI SAA REV 0.xlsx', '', './files/wi/'),
(212, 'NS-WSW121', 'FA', 'F0080', 'PACKAGE ASSY', 'MP', 'OPEN', '2016-10-04', '1', 'ADE', 'F0080 - WSW121 WI.PA - REV 1.xls', './files/wi/F0080 - WSW121 WI.PA - REV 1.xls', '', './files/wi/'),
(213, 'NS-F901', 'FA', 'NS-F901/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '7', 'WILDAN', 'NS-F901 WI PA REV. 7.xls', './files/wi/NS-F901 WI PA REV. 7.xls', '', './files/wi/'),
(214, 'NS-F901', 'FA', 'NS-F901SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-29', '2', 'DIVKY', 'NS-F901SR WI-SAA R2.xls', './files/wi/NS-F901SR WI-SAA R2.xls', '', './files/wi/'),
(215, 'NS-F700', 'FA', 'NS-F700SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-05', '10', 'DIVKY', 'F700-WI-SAA-REV10.xls', './files/wi/F700-WI-SAA-REV10.xls', '', './files/wi/'),
(216, 'NX-N500', 'PAINTING', 'NX-N500-BS-1012', 'BELT SANDER PROCCESS', 'MP', 'CLOSE', '2016-08-12', '1', 'DONI', 'WI NX-N500 BS-1012 Rev.01.xls', './files/wi/WI NX-N500 BS-1012 Rev.01.xls', '', './files/wi/'),
(217, 'NS-SW1000', 'FA', 'NS-SW1000/WI/SCF', 'SOUND CHECK', 'MP', 'CLOSE', '2016-08-15', '1', 'BINTANG', 'NS-SW1000 WI Soundcheck Rev1.xls', './files/wi/NS-SW1000 WI Soundcheck Rev1.xls', '', './files/wi/'),
(218, 'BB-TRBX', 'PCBA', 'M0051', 'PCB MAIN MANUAL INSTERTION', 'MP', 'OPEN', '2016-08-12', '0', 'EKO', 'M0051 WI BB-TRBX MI Rev.00.xls', './files/wi/M0051 WI BB-TRBX MI Rev.00.xls', '', './files/wi/'),
(219, 'ALL SMT', 'PCBA', 'C0035', 'PENGOPERASIAN MESIN N=1 CHECKER', 'MP', 'CLOSE', '2016-07-25', '0', 'BILLY', 'C0035_Prosedur Pengoperasian Mesin N=1 Checker.xls', './files/wi/C0035_Prosedur Pengoperasian Mesin N=1 Checker.xls', '', './files/wi/'),
(220, 'ALL SMT', 'PCBA', 'C0036', 'Maintenance Mesin N=1 Checker', 'MP', 'CLOSE', '2016-07-25', '0', 'BILLY', 'C0036_Maintenance Mesin N=1 Checker.xls', './files/wi/C0036_Maintenance Mesin N=1 Checker.xls', '', './files/wi/'),
(221, 'ALL PCB', 'PCBA', 'WI-E-100', 'PARAMETER SETTING UNTUK MESIN FLUXER DAN SOLDER DIP (LINE 1)', 'MP', 'OPEN', '2016-06-15', '13', 'EKO', 'WI-E-100 Sensbey Machine ,line 1 R.13.xls', './files/wi/WI-E-100 Sensbey Machine ,line 1 R.13.xls', '', './files/wi/'),
(222, 'ALL PCB', 'PCBA', 'WI-E-101', 'PARAMETER SETTING UNTUK MESIN FLUXER DAN SOLDER DIP (LINE 2)', 'MP', 'OPEN', '2016-09-30', '9', 'EKO', 'WI-E-101_Sensbey Machine WG-LINE 2-Rev 09.xls', './files/wi/WI-E-101_Sensbey Machine WG-LINE 2-Rev 09.xls', '', './files/wi/'),
(223, 'ALL PCB', 'PCBA', 'WI-E-102', 'PARAMETER SETTING UNTUK MESIN FLUXER DAN SOLDER DIP (LINE 3)', 'MP', 'OPEN', '2016-08-30', '4', 'EKO', 'WI-E-102_Sensbey Machine WG-LINE 3-Rev 04.xls', './files/wi/WI-E-102_Sensbey Machine WG-LINE 3-Rev 04.xls', '', './files/wi/'),
(224, 'ALL MODEL', 'PCBA', 'M0052', 'SOLDERING TOUCH-UP', 'MP', 'CLOSE', '2016-08-11', '0', 'EKO', 'M0052 SOK SOLDERING TOUCH-UP.xls', './files/wi/M0052 SOK SOLDERING TOUCH-UP.xls', '', './files/wi/'),
(225, 'NS-C210', 'FA', 'NS-C210SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-15', '6', 'DIVKY', 'Acc Assy C210 rev6.xls', './files/wi/Acc Assy C210 rev6.xls', '', './files/wi/'),
(226, 'NS-C210', 'FA', 'NS-C210SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-06-28', '8', 'WILDAN', 'Package Assy C210 rev. 8 -.xls', './files/wi/Package Assy C210 rev. 8 -.xls', '', './files/wi/'),
(227, 'NS-B310', 'FA', 'NS-B310SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-15', '5', 'DIVKY', 'Acc B310rev5.xls', './files/wi/Acc B310rev5.xls', '', './files/wi/'),
(228, 'NS-B310', 'FA', 'NS-B310SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-06-28', '8', 'WILDAN', 'Package Assy B310 rev.8 -.xls', './files/wi/Package Assy B310 rev.8 -.xls', '', './files/wi/'),
(229, 'YRS-2500', 'FA', 'YRS-2500SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-15', '3', 'DIVKY', 'YRS-2500 WI PA REV.3.xls', './files/wi/YRS-2500 WI PA REV.3.xls', '', './files/wi/'),
(230, 'NS-PC40', 'FA', 'F0076', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-23', '1', 'DIVKY', 'NS-PC40 WI SAA REV 1.xls', './files/wi/NS-PC40 WI SAA REV 1.xls', '', './files/wi/'),
(231, 'YAS-706', 'RPA', 'F0040', 'AMP UNIT CHECK', 'MP', 'CLOSE', '2016-08-31', '3', 'BINTANG', 'F0040 YAS-CU706 WI Amp Unit Check Rev3.xls', './files/wi/F0040 YAS-CU706 WI Amp Unit Check Rev3.xls', '', './files/wi/'),
(233, 'NS-BP200', 'FA', 'NS-BP200SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-18', '6', 'DIVKY', 'NS-BP200SR-WI-SAA-REV06.xls', './files/wi/NS-BP200SR-WI-SAA-REV06.xls', '', './files/wi/'),
(234, 'YSP-CU2700, NS-WSW120/121', 'FA', 'F0018', 'PPID WRITER', 'MP', 'CLOSE', '2016-08-18', '4', 'BINTANG', 'F0018 NS-WSW120 & NS-WSW121 WI PPID Writer Rev4.xlsx', './files/wi/F0018 NS-WSW120 & NS-WSW121 WI PPID Writer Rev4.xlsx', '', './files/wi/'),
(235, 'BB-TRBX', 'PCBA', 'M0050', 'FCT-MAIN & AVMT INSPECTION', 'TP', 'OPEN', '2016-08-20', '3', 'BINTANG', 'M0050 BB-TRBX-300_500 WI FCT Rev3.xlsx', './files/wi/M0050 BB-TRBX-300_500 WI FCT Rev3.xlsx', '', './files/wi/'),
(236, 'ALL MODEL', 'PAINTING', 'P0010', 'MANUFACTURING STANDART BUFFING', 'MP', 'CLOSE', '2016-08-01', '0', 'DONI', 'MANUFACTURING STANDART BUFFING.xlsx', './files/wi/MANUFACTURING STANDART BUFFING.xlsx', '', './files/wi/'),
(237, 'ALL MODEL', 'PCBA', 'WG-E-122', 'Metal Mask Stencil Cleaner Machine', 'MP', 'CLOSE', '2016-08-20', '1', 'BILLY', 'WG_122_Metal Mask Stencil Cleanner Rev.01.xls', './files/wi/WG_122_Metal Mask Stencil Cleanner Rev.01.xls', '', './files/wi/'),
(238, 'NS-8390', 'FA', 'NS-8390SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-06-30', '7', 'ADE', 'NS-8390-WI-PA-REV07.xls', './files/wi/NS-8390-WI-PA-REV07.xls', '', './files/wi/'),
(239, 'SW BOX-SILENT PIANO', 'FA', 'F0078', 'SWITCH BOX PACKAGE ASSY', 'MP', 'OPEN', '2016-08-26', '4', 'ANGGI', 'F0078 WI PA SILENT PIANO R.4.xlsx', './files/wi/F0078 WI PA SILENT PIANO R.4.xlsx', '', './files/wi/'),
(240, 'YAS-306, YAS-706', 'FA', 'F0027', 'HI-POT TESTER', 'MP', 'CLOSE', '2016-08-24', '3', 'BINTANG', 'F0027 YAS-306&706 WI Hipot Tester Rev3.xls', './files/wi/F0027 YAS-306&706 WI Hipot Tester Rev3.xls', '', './files/wi/'),
(241, 'YST-SW215', 'FA', 'YST-SW215SR/WI/RPA', 'REAR PANEL ASSY', 'MP', 'CLOSE', '2016-08-09', '15', 'ADE', 'YST-SW215-WI-RPA rev.15.xls', './files/wi/YST-SW215-WI-RPA rev.15.xls', '', './files/wi/'),
(242, 'YST - SW015', 'SA', 'YST - SW015SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-19', '4', 'DIVKY', 'YST-SW015-WI-SAA REV 4.xls', './files/wi/YST-SW015-WI-SAA REV 4.xls', '', './files/wi/'),
(243, 'NS-F210', 'SA', 'NS-F210SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-19', '7', 'DIVKY', 'NS-F210-WI-SAA R7.xls', './files/wi/NS-F210-WI-SAA R7.xls', '', './files/wi/'),
(244, 'NS-PB210', 'FA', 'NS-PB210SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '5', 'DIVKY', 'Acc Assy PB210 rev5.xls', './files/wi/Acc Assy PB210 rev5.xls', '', './files/wi/'),
(245, 'NS-BP101', 'FA', 'NS-BP101SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-14', '7', 'WILDAN', 'NS-BP101 WI PA Rev 7.xls', './files/wi/NS-BP101 WI PA Rev 7.xls', '', './files/wi/'),
(246, 'NS-BP101', 'FA', 'NS-BP101SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-22', '4', 'DIVKY', 'NS-BP101SR SAA R.4.xls', './files/wi/NS-BP101SR SAA R.4.xls', '', './files/wi/'),
(247, 'NS-BP182', 'FA', 'NS-BP182SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-07-02', '2', 'DIVKY', 'NS-BP182-WI-SAA Rev 02.xls', './files/wi/NS-BP182-WI-SAA Rev 02.xls', '', './files/wi/'),
(248, 'NS-BP200', 'FA', 'NS-BP200SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-06-29', '9', 'WILDAN', 'NS-BP200-WI-PA-Rev. 9 -.xls', './files/wi/NS-BP200-WI-PA-Rev. 9 -.xls', '', './files/wi/'),
(249, 'VXS1ML', 'FA', 'F0082', 'PACKAGE ASSY', 'TP', 'OPEN', '-', '0', 'FIRMAN', '', '', '', ''),
(250, 'VXS1ML', 'FA', 'F0083', 'SPEAKER FINAL ASSY', 'TP', 'OPEN', '-', '0', 'WILDAN', '', '', '', ''),
(251, 'VXS1ML', 'FA', 'F0084', 'SUB ASSY', 'TP', 'OPEN', '-', '0', 'ADE', '', '', '', ''),
(252, 'VXS3S', 'FA', 'F0085', 'PACKAGE ASSY', 'TP', 'OPEN', '-', '0', 'FIRMAN', '', '', '', ''),
(253, 'VXS3S', 'FA', 'F0086', 'SPEAKER FINAL ASSY', 'TP', 'OPEN', '-', '0', 'ADE', '', '', '', ''),
(254, 'VXS3S', 'FA', 'F0087', 'ACCESSORIES ASSY', 'TP', 'OPEN', '-', '0', 'WILDAN', '', '', '', ''),
(255, 'CMA1M', 'FA', 'F0088', 'PACKAGE ASSY', 'TP', 'CHECKIN', '-', '0', 'DIVKY', '', '', '', ''),
(256, 'CMA1M', 'FA', 'F0089', 'FINAL ASSY', 'TP', 'CHECK MASTERLIST', '-', '0', 'DIVKY', '', '', '', ''),
(257, 'CMA3S', 'FA', 'F0090', 'PACKAGE ASSY', 'TP', 'CHECKOUT BY ADE', '-', '0', 'WILDAN', '', '', '', ''),
(258, 'CMA3S', 'FA', 'F0091', 'FINAL ASSY', 'TP', 'CHECKOUT BY FIRMAN', '-', '0', 'WILDAN', '', '', '', ''),
(259, '8T18-RMA1MB', 'FA', 'F0092', 'PACKAGE ASSY', 'TP', 'WAITING APPROVAL', '-', '0', 'DIVKY', '', '', '', ''),
(260, '8T18-RMA1MB', 'FA', 'F0093', 'FINAL ASSY', 'TP', 'FINAL CHECK', '-', '0', 'DIVKY', '', '', '', ''),
(261, 'NS-B750', 'FA', 'NS-B750SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-08-22', '7', 'DIVKY', 'B750-WI-SAA REV07.xls', './files/wi/B750-WI-SAA REV07.xls', '', './files/wi/'),
(262, 'NS-WSW120', 'FA', 'NS-WSW120SR/WI/FA', 'SUBWOOFER FINAL ASSY', 'MP', 'CLOSE', '2016-08-18', '9', 'FIRMAN', 'NS-WSW120 WI FA Rev 9.xlsx', './files/wi/NS-WSW120 WI FA Rev 9.xlsx', '', './files/wi/'),
(263, 'YSP-2700', 'FA', 'F0001', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-18', '4', 'ADE', 'F0001 YSP-2700SR-WI-PA - REV 4.xls', './files/wi/F0001 YSP-2700SR-WI-PA - REV 4.xls', '', './files/wi/'),
(264, 'NS-5000', 'SPU', 'WI/SPU/062', 'SPEAKER UNIT ASSY', 'MP', 'CLOSE', '2016-08-08', '2', 'EDI', 'WI-SPU-062 - Rev 2.xlsx', './files/wi/WI-SPU-062 - Rev 2.xlsx', '', './files/wi/'),
(265, 'NS-SW050, NS-SW100', 'PCBA', 'C0012', 'BONDING PCB-MAIN-SB-SW050-100-L1R2', 'MP', 'CLOSE', '2016-08-29', '2', 'BILLY', 'C0012 PCB-MAIN-SB-SW050-100-L1R2 Rev.02.xls', './files/wi/C0012 PCB-MAIN-SB-SW050-100-L1R2 Rev.02.xls', '', './files/wi/'),
(266, 'YAS-203', 'RPA', 'YAS-203/WI/FU', 'AVNERA FIRMWARE UPDATE', 'MP', 'CLOSE', '2016-08-30', '0', 'BINTANG', 'YAS-203 WI AVNERA Update Rev0.xlsx', './files/wi/YAS-203 WI AVNERA Update Rev0.xlsx', '', './files/wi/'),
(267, 'YAS-706', 'RPA', 'F0095', 'DESTINATION DOWNLOAD', 'MP', 'CLOSE', '-', '0', 'BINTANG', NULL, NULL, NULL, NULL),
(268, 'YSP-1600', 'RPA', 'YSP-1600/WI/MUC', 'MAIN UNIT CHECK', 'MP', 'FINAL CHECK', '-', '9', 'BINTANG', NULL, NULL, NULL, NULL);
INSERT INTO `wi` (`wi_id`, `wi_model`, `wi_section`, `wi_docno`, `wi_title`, `wi_stagestat`, `wi_status`, `wi_issue`, `wi_rev`, `wi_maker`, `wi_filename`, `wi_file`, `wi_filename2`, `wi_file2`) VALUES
(269, 'YSP-5600', 'RPA', 'F0053', 'AMP UNIT CHECK', 'MP', 'FINAL CHECK', '2016-09-13', '8', 'BINTANG', 'F0053 YSP-5600 WI Amp Unit Check Rev8.xlsx', './files/wi/F0053 YSP-5600 WI Amp Unit Check Rev8.xlsx', '', './files/wi/'),
(270, 'SPU DMI4', 'SPU', 'SPU/WI/073', 'DMI 4 16cm (YJ018A0 & YJ004A0)', 'MP', 'FINAL CHECK', '-', '-', 'ERWIN', NULL, NULL, NULL, NULL),
(271, 'SPU DMI3', 'SPU', 'SPU/WI/058', 'WOOFER ASSEMBLY YH431A0 16CM', 'MP', 'CHECK SMILE', '-', '-', 'ERWIN', NULL, NULL, NULL, NULL),
(273, 'YAS-706', 'PCBA', 'C0014', 'PCB-DIGITAL-PA-PB-YAS706-L2R2', 'MP', 'CLOSE', '2016-09-09', '3', 'ANGGI', 'C0014 PCB-DIGITAL-PA-PB-YAS706-L2R2 Rev.03.xlsx', './files/wi/C0014 PCB-DIGITAL-PA-PB-YAS706-L2R2 Rev.03.xlsx', '', './files/wi/'),
(274, 'YAS-306', 'RPA', 'F0025', 'AMP UNIT CHECK', 'MP', 'CHECK SMILE', '2016-09-15', '3', 'BINTANG', 'F0025 WI Amp Unit_Check_YAS-306 Rev.03.xls', './files/wi/F0025 WI Amp Unit_Check_YAS-306 Rev.03.xls', '', './files/wi/'),
(275, 'YAS-306', 'FA', 'F0026', 'SOUND CHECK', 'MP', 'CLOSE', '2016-09-24', '4', 'BINTANG', 'F0026 YAS-306 WI Sound Check Rev04.xls', './files/wi/F0026 YAS-306 WI Sound Check Rev04.xls', '', './files/wi/'),
(276, 'YAS-306', 'FA', 'F0028', 'DESTINATION DOWNLOAD', 'MP', 'CLOSE', '2016-08-24', '1', 'BINTANG', 'F0028 YAS-306 WI Destination Download Rev1.xlsx', './files/wi/F0028 YAS-306 WI Destination Download Rev1.xlsx', '', './files/wi/'),
(277, 'YAS-306', 'RPA', 'F0029', 'FIRMWARE UPDATE', 'MP', 'CLOSE', '2016-08-24', '1', 'BINTANG', 'F0029 YAS-306 WI Firmware Update Rev1.xlsx', './files/wi/F0029 YAS-306 WI Firmware Update Rev1.xlsx', '', './files/wi/'),
(278, 'YAS-306', 'PCBA', 'M0010', 'PCB CONTAIN  POWER (H) MANUAL INSERTION', 'MP', 'CLOSE', '2016-09-02', '2', 'HARDI', 'M0010 WI-MI YAS-306 POWER Rev.02.xlsx', './files/wi/M0010 WI-MI YAS-306 POWER Rev.02.xlsx', '', './files/wi/'),
(279, 'YSP-2700', 'PCBA', 'M0005', 'PCB CONTAIN POWER (H) MANUAL INSERTION', 'MP', 'CLOSE', '2016-09-02', '2', 'HARDI', 'M0005 WI MI YSP-CU2700 POWER Rev.02.xlsx', './files/wi/M0005 WI MI YSP-CU2700 POWER Rev.02.xlsx', '', './files/wi/'),
(280, 'NS-PC40', 'FA', 'F0075', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-30', '1', 'ADE', 'WI PA PC-40 Rev.1.xlsx', './files/wi/WI PA PC-40 Rev.1.xlsx', '', './files/wi/'),
(284, 'NS-777', 'WW', 'NS-777SR BL/Back', 'BACK', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL Back Rev00.xls', './files/wi/WI WW NS-777SR BL Back Rev00.xls', '', './files/wi/'),
(285, 'NS-777', 'WW', 'NS-777SR BL/Baffle', 'BAFFLE', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL Baffle Rev00.xls', './files/wi/WI WW NS-777SR BL Baffle Rev00.xls', '', './files/wi/'),
(286, 'NS-777', 'WW', 'NS-777SR BL/Bottom', 'BOTTOM BOARD', 'MP', 'CLOSE', '2016-09-05', '0', 'DANI', 'WI WW NS-777SR BL Bottom Rev00.xls', './files/wi/WI WW NS-777SR BL Bottom Rev00.xls', '', './files/wi/'),
(287, 'NS-777', 'WW', 'NS-777SR BL/Side', 'SIDE', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL Side Rev00.xls', './files/wi/WI WW NS-777SR BL Side Rev00.xls', '', './files/wi/'),
(288, 'NS-777', 'WW', 'NS-777SR BL/Top', 'TOP BOARD', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL Top Rev00.xls', './files/wi/WI WW NS-777SR BL Top Rev00.xls', '', './files/wi/'),
(289, 'NS-777', 'WW', 'NS-777SR BL/Cleat', 'CLEAT', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL Cleat Rev00.xls', './files/wi/WI WW NS-777SR BL Cleat Rev00.xls', '', './files/wi/'),
(290, 'NS-777', 'WW', 'NS-777SR BL/Cleat A', 'CLEAT A', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL CleatA Rev00.xls', './files/wi/WI WW NS-777SR BL CleatA Rev00.xls', '', './files/wi/'),
(291, 'NS-777', 'WW', 'NS-777SR BL/Cleat B', 'CLEAT B', 'MP', 'CLOSE', '2016-08-31', '0', 'DANI', 'WI WW NS-777SR BL CleatB Rev00.xls', './files/wi/WI WW NS-777SR BL CleatB Rev00.xls', '', './files/wi/'),
(292, 'NS-5000', 'WW', 'W0007', 'BAFFLE', 'MP', 'CLOSE', '2016-09-09', '4', 'DANI', 'W0007 WI WW Baffle NS-5000 rev 4.xlsx', './files/wi/W0007 WI WW Baffle NS-5000 rev 4.xlsx', '', './files/wi/'),
(293, 'YSP-5600', 'PCBA', 'C0018', 'PCB-POWER-SB-YSP5600-L2R3 SMT BONDING', 'MP', 'CLOSE', '2016-09-28', '4', 'BILLY', 'PCB-POWER-SB-YSP5600-L2.xls', './files/wi/PCB-POWER-SB-YSP5600-L2.xls', '', './files/wi/'),
(294, 'YSP-5600', 'PCBA', 'C0041', 'PCB-POWER-SB-YSP5600-L1R1 SMT BONDING', 'MP', 'CLOSE', '2016-08-31', '1', 'ANGGI', 'C0041 PCB-POWER-SB-YSP5600-L1R1 Rev.01.xlsx', './files/wi/C0041 PCB-POWER-SB-YSP5600-L1R1 Rev.01.xlsx', '', './files/wi/'),
(295, 'NS-WSW121, YSP-2500, NS-WSW120, YSP-2700', 'RPA', 'F0094', 'AVNERA FIRMWARE UPDATE', 'MP', 'CLOSE', '2016-08-31', '0', 'BINTANG', 'F0049 YSP-2700 WI AVNERA Update Rev0.xlsx', './files/wi/F0049 YSP-2700 WI AVNERA Update Rev0.xlsx', '', './files/wi/'),
(296, 'YAS-706', 'FA', 'F0042', 'SOUND CHECK', 'MP', 'CLOSE', '2016-08-31', '2', 'BINTANG', 'F0042 YAS-706 WI Sound Check Rev2.xlsx', './files/wi/F0042 YAS-706 WI Sound Check Rev2.xlsx', '', './files/wi/'),
(297, 'YAS-706', 'PCBA', 'M0025', 'FCT INSPECTION PCB DIGITAL', 'MP', 'CHECK MASTERLIST', '-', '-', 'HARDI', NULL, NULL, NULL, NULL),
(298, 'DBR 10,DBR12,DBR15', 'PCBA', 'DBR-10/WI/FCT/AMPS', 'FCT AMPS INSPECTION', 'MP', 'CLOSE', '2016-08-30', '1', 'EKO', 'DBR Series-WI-FCT-AMPS R.01.xlsx', './files/wi/DBR Series-WI-FCT-AMPS R.01.xlsx', '', './files/wi/'),
(299, 'SWK-W16', 'PCBA', 'SWK-W16/MAIN/WI/MI', 'PCB MAIN MANUAL INSERTION', 'MP', 'CLOSE', '2016-03-03', '3', 'EKO', 'WI-MI SWK-W16 MAIN REV3.xlsx', './files/wi/WI-MI SWK-W16 MAIN REV3.xlsx', '', './files/wi/'),
(300, 'YSP-5600', 'PCBA', 'A0009', 'YSP-5600 POWER JV1', 'MP', 'CLOSE', '2016-09-03', '2', 'BILLY', 'A0009 YSP-5600SR-PWR-JV1 Rev.02.xlsx', './files/wi/A0009 YSP-5600SR-PWR-JV1 Rev.02.xlsx', '', './files/wi/'),
(301, 'YSP-5600', 'PCBA', 'A0008', 'YSP-5600-PWR-AV131', 'MP', 'CHECK MASTERLIST', '2016-09-08', '2', 'BILLY', 'A0008 YSP-5600SR-PWR-AV131 Rev.02.xlsx', './files/wi/A0008 YSP-5600SR-PWR-AV131 Rev.02.xlsx', '', './files/wi/'),
(302, 'YSP-5600', 'PCBA', 'A0007', 'YSP-5600 PWR RG', 'MP', 'CLOSE', '2016-09-03', '2', 'BILLY', 'A0007 YSP-5600-PWR-RG Rev.02.xlsx', './files/wi/A0007 YSP-5600-PWR-RG Rev.02.xlsx', '', './files/wi/'),
(303, 'YAS-152', 'PCBA', 'YAS-152/DIGITAL/WI/MI', 'PCB DIGITAL MANUAL INSERTION', 'MP', 'CLOSE', '2016-09-30', '2', 'EKO', 'WI MI YAS-152 R.04.xlsx', './files/wi/WI MI YAS-152 R.04.xlsx', '', './files/wi/'),
(304, 'DXS18', 'PCBA', 'DXS-18/IN/WI/MI', 'MANUAL INSERTION PCB IN DXS18', 'MP', 'CLOSE', '2015-07-28', '1', 'MUKHLIS', 'DXS-18_IN_MI_REV 1.xlsx', './files/wi/DXS-18_IN_MI_REV 1.xlsx', '', './files/wi/'),
(305, 'DXS-18', 'PCBA', 'DXS-18/ DSP/WI/MI', 'MANUAL INSERTION PCB DSP', 'MP', 'CLOSE', '2015-07-28', '1', 'MUKHLIS', 'DXS-18_DSP_MI REV 1.xlsx', './files/wi/DXS-18_DSP_MI REV 1.xlsx', '', './files/wi/'),
(306, 'DXS-18', 'PCBA', 'DXS-18/LED/WI/MI', 'MANUAL INSERTION PCB LED', 'MP', 'CLOSE', '2015-07-28', '1', 'MUKHLIS', 'DXS-18_LED_MI REV 1.xlsx', './files/wi/DXS-18_LED_MI REV 1.xlsx', '', './files/wi/'),
(307, 'DSR118, DXS18', 'PCBA', 'DSRAMPS2/WI/MI', 'MANUAL INSERTION PCB AMPS2', 'MP', 'CLOSE', '2016-08-30', '4', 'EKO', 'DSRAMPS2_MI REV4.xlsx', './files/wi/DSRAMPS2_MI REV4.xlsx', '', './files/wi/'),
(308, 'DSR215, DSR115, DSR112, DSR118, DXS18', 'PCBA', 'DSR/ ACIN/WI/MI', 'MANUAL INSERTION PCB ACIN', 'MP', 'CLOSE', '2015-07-28', '2', 'MUKHLIS', 'DSR_ACIN_MI REV2.xlsx', './files/wi/DSR_ACIN_MI REV2.xlsx', '', './files/wi/'),
(309, 'YSP-2700', 'RPA', 'F0007', 'FUNCTION CHECK', 'MP', 'CLOSE', '2016-09-08', '3', 'BINTANG', 'F0007 YSP-CU2700 WI Function Check Rev 3.xlsx', './files/wi/F0007 YSP-CU2700 WI Function Check Rev 3.xlsx', '', './files/wi/'),
(310, 'NS-IC400', 'FA', 'NS-IC400SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-07-01', '6', 'FIRMAN', 'NS-IC400SR WI FA REV 6.xlsx', './files/wi/NS-IC400SR WI FA REV 6.xlsx', '', './files/wi/'),
(313, 'NS-333', 'WW', 'WI/WW/NS-333SR/BL/Back', 'BACK', 'MP', 'CLOSE', '2016-09-13', '0', 'DANI', 'WI WW NS-333SR BL Back Rev00.xls', './files/wi/WI WW NS-333SR BL Back Rev00.xls', '', './files/wi/'),
(314, 'NS-333', 'WW', 'WI/WW/NS-333SR/BL/Baffle', 'BAFFLE', 'MP', 'CLOSE', '2016-09-13', '0', 'DANI', 'WI WW NS-333SR BL Baffle Rev00.xls', './files/wi/WI WW NS-333SR BL Baffle Rev00.xls', '', './files/wi/'),
(315, 'NS-333', 'WW', 'WI/WW/NS-333SR/BL/Top', 'TOP', 'MP', 'CLOSE', '2016-09-13', '0', 'DANI', 'WI WW NS-333SR BL Top Rev00.xls', './files/wi/WI WW NS-333SR BL Top Rev00.xls', '', './files/wi/'),
(316, 'NS-333', 'WW', 'WI/WW/NS-333SR/BL/Side', 'SIDE', 'MP', 'CLOSE', '2016-09-13', '0', 'DANI', 'WI WW NS-333SR BL Side Rev00.xls', './files/wi/WI WW NS-333SR BL Side Rev00.xls', '', './files/wi/'),
(317, 'NS-333', 'WW', 'WI/WW/NS-333SR/BL/Cleat-A ', 'CLEAT A', 'MP', 'CLOSE', '2016-09-13', '0', 'DANI', 'WI WW NS-333SR BL CleatA  rev0.xls', './files/wi/WI WW NS-333SR BL CleatA  rev0.xls', '', './files/wi/'),
(318, 'NS-333', 'WW', 'WI/WW/NS-333SR/BL/Cleat-B', 'CLEAT B', 'MP', 'CLOSE', '2016-09-13', '0', 'DANI', 'WI WW NS-333SR BL CleatB  rev0.xls', './files/wi/WI WW NS-333SR BL CleatB  rev0.xls', '', './files/wi/'),
(319, 'COMMON', 'SPU-INJECTION', 'WG-INJECTION-027', 'GAS BURNER', 'MP', 'CLOSE', '2016-09-13', '0', 'EDI', 'WG-INJECTION-027 GAS BURNER.xlsx', './files/wi/WG-INJECTION-027 GAS BURNER.xlsx', '', './files/wi/'),
(320, 'COMMON', 'SPU-INJECTION', 'WG-INJECTION-026  ', 'CALIBRATION INJECT SUMITOMO', 'MP', 'CLOSE', '2016-09-13', '0', 'EDI', 'WG-INJECTION-026  CALIBRATION INJECT SUMITOMO.xlsx', './files/wi/WG-INJECTION-026  CALIBRATION INJECT SUMITOMO.xlsx', '', './files/wi/'),
(321, '2016DKV-CC SILENT PIANO', 'FA', 'DKV-SE/PIANO/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-20', '5', 'ANGGI', 'DKV SE PIANO WI FA R.5.xls', './files/wi/DKV SE PIANO WI FA R.5.xls', '', './files/wi/'),
(323, 'YAS-706', 'FA', 'F0036', 'AMP UNIT', 'MP', 'CHECK MASTERLIST', '2016-09-26', '3', 'DIVKY', 'F0036 YAS-706 WI AU REV3.xlsx', './files/wi/F0036 YAS-706 WI AU REV3.xlsx', '', './files/wi/'),
(324, 'YAS-306', 'FA', 'F0020', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-21', '3', 'DIVKY', 'F0020 WI SAA YAS-306SR Rev.03.xls', './files/wi/F0020 WI SAA YAS-306SR Rev.03.xls', '', './files/wi/'),
(325, 'NS-SW700', 'FA', 'NS-SW700SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-03', '16', 'ADE', 'NS-SW700-WI-PA-REV16.xls', './files/wi/NS-SW700-WI-PA-REV16.xls', '', './files/wi/'),
(326, 'NS-777', 'FA', 'NS-777SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-14', '17', 'ADE', 'NS-777SR-WI-PA-Rev 17.xls', './files/wi/NS-777SR-WI-PA-Rev 17.xls', '', './files/wi/'),
(327, 'NS-WSW160', 'FA', 'NS-WSW160SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-09', '14', 'ADE', 'WI NS-WSW160 PA Rev.14.xls', './files/wi/WI NS-WSW160 PA Rev.14.xls', '', './files/wi/'),
(328, 'YST-FSW150', 'FA', 'YST-FSW150 SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-14', '13', 'ADE', 'YST-FSW150SR-WI-PA R13.xls', './files/wi/YST-FSW150SR-WI-PA R13.xls', '', './files/wi/'),
(329, 'YST-FSW100', 'FA', 'YST-FSW100SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-14', '15', 'DIVKY', 'YST-FSW100SR-WI-SAA Rev15.xls', './files/wi/YST-FSW100SR-WI-SAA Rev15.xls', '', './files/wi/'),
(330, 'YST-SW215', 'PCBA', 'YST-SW215SR/WI/MI', 'PCB MAIN MANUAL INSERTION', 'MP', 'CLOSE', '2016-09-20', '23', 'EKO', 'YST-SW215-WI-MI Rev.23.xlsx', './files/wi/YST-SW215-WI-MI Rev.23.xlsx', '', './files/wi/'),
(331, 'GA15II', 'PCBA', 'GA15IISR-MA-SL-JV', 'JUMPER AUTO INSERTION JV', 'MP', 'CLOSE', '2016-09-13', '3', 'BILLY', 'PCB_GA15II_MA_JUMPER.xlsx', './files/wi/PCB_GA15II_MA_JUMPER.xlsx', '', './files/wi/'),
(332, 'GA15II', 'PCBA', 'GA15IISR-MA-SL-AV1', 'AUTO INSTERTION JUMPER AXIAL AV', 'MP', 'CLOSE', '2016-09-13', '6', 'BILLY', 'PCB_GA15II_MA-AXIAL-AI.xlsx', './files/wi/PCB_GA15II_MA-AXIAL-AI.xlsx', '', './files/wi/'),
(333, 'GA15II', 'PCBA', 'GA15IISR-MA-SL-RG1', 'AUTO INSERTION RADIAL RG', 'MP', 'CLOSE', '2016-09-13', '9', 'BILLY', 'PCB_GA15II_MA-RADIAL-AI.xlsx', './files/wi/PCB_GA15II_MA-RADIAL-AI.xlsx', '', './files/wi/'),
(335, 'NS-5000', 'FA', 'F0045', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-21', '3', 'ADE', 'F0045 NS-5000 WI PA REV3.xlsx', './files/wi/F0045 NS-5000 WI PA REV3.xlsx', '', './files/wi/'),
(336, 'NS-SW500', 'FA', 'NS-SW500SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-14', '6', 'ADE', 'NS-SW500-WI-PA-REV06.xls', './files/wi/NS-SW500-WI-PA-REV06.xls', '', './files/wi/'),
(337, 'CISPR32 (181EX)', NULL, 'C0033', 'PCB-AM-PA-PB SMT', NULL, 'OPEN', '-', '-', 'ANGGI', NULL, NULL, NULL, NULL),
(338, 'CISPR32 (181EX)', NULL, 'C0043', 'PCB-MA-PN-UH-SMT', NULL, 'OPEN', '-', '-', 'ANGGI', NULL, NULL, NULL, NULL),
(339, 'CISPR32 (181EX)', NULL, 'C0044', 'PCB-DM-PA-PB SMT', NULL, 'OPEN', '-', '-', 'ANGGI', NULL, NULL, NULL, NULL),
(340, 'CISPR32 (181EX)', NULL, 'M0058', 'MANUAL INSERTION PCB DIGITAL-UH', NULL, 'OPEN', '-', '-', 'HARDI', NULL, NULL, NULL, NULL),
(341, 'CISPR32 (181EX)', NULL, 'M0057', 'MANUAL INSERTION PCB DIGITAL-MA', NULL, 'OPEN', '-', '-', 'MUKHLIS', NULL, NULL, NULL, NULL),
(342, 'CISPR32 (181EX)', NULL, 'F0077', 'SWITCH BOX FINAL ASSY', NULL, 'OPEN', '-', '-', 'ANGGI', NULL, NULL, NULL, NULL),
(343, 'CISPR32 (181EX)', NULL, 'F0097', 'INSPECTION CHECK', NULL, 'OPEN', '-', '-', 'BINTANG', NULL, NULL, NULL, NULL),
(344, 'NS-6490', NULL, 'NS-6490SR/WI/SBB', 'BACK BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(345, 'NS-F350', NULL, 'NS-F350/WI/WW/NETWORK_BOARD', 'NETWORK BOARD', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(346, 'NS-F330', NULL, 'NS-F330/WI/WW/NETWORK_BOARD', 'NETWORK BOARD', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(347, 'NS-5000', NULL, 'W0017', 'CLEAT', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(348, 'NS-B51', NULL, 'NS-B51/WI/WW/BACK', 'BACK', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(349, 'NS-C51', NULL, 'NS-C51/WI/WW/BACK', 'BACK', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(350, 'NS-B150, NS-C150', NULL, 'NS-B & C150/WI/WW/BACK', 'BACK', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(351, 'NS-B150, NS-C150', NULL, 'NS-B & C150/WI/WW/BAFFLE', 'BAFFLE', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(352, 'NS-F140', NULL, 'NS-F140/WI/WW/BACK', 'BACK', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(353, 'NS-F150', NULL, 'NS-F150/WI/WW/BACK', 'BACK', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(354, 'NS-F210', NULL, 'NS-F210/WI/WW/BACK', 'BACK', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(355, 'NS-125F, NS-M125', NULL, 'NS-125FPN/WI/WW- BACKBOARD', 'BACK BOARD', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(356, 'NS-6390', NULL, 'NS-6390/WI/WW/BACK', 'BACK BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(357, 'NS-C125', NULL, 'NS-C125/WI/WW/BACK', 'BACK BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(358, 'NS-C125', NULL, 'NS-C125/WI/WW/BAFFLE', 'BAFFLE BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(359, 'NS-C55', NULL, 'NS-C55/WI/WW/BACK', 'BACK BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(360, 'NS-B210', NULL, 'NS-B210/WI/WW/BACK', 'BACK BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(361, 'NS-B210', NULL, 'NS-B210/WI/WW/BAFFLE', 'BAFFLE BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(362, 'NS-C210', NULL, 'NC-C210/WI/WW/BACK', 'BACK BOARD ASSY', NULL, 'OPEN', '-', '-', 'HENDRO', NULL, NULL, NULL, NULL),
(365, 'GA15II', 'PCBA', 'GA-15II/WI/MI', 'PCB MAIN MANUAL INSERTION', 'MP', 'CLOSE', '2016-09-22', '3', 'EKO', 'GA-15-WI-MI Rev3.xls', './files/wi/GA-15-WI-MI Rev3.xls', '', './files/wi/'),
(366, 'YSP-5600 & SWK-W16', 'PCBA', 'M0035', 'FCT INSPECTION PCB HDMI', 'MP', 'CLOSE', '2016-09-23', '3', 'HARDI', 'WI YSP-5600 & SWK-W16-FCT & ICT_HDMI R.03.xlsx', './files/wi/WI YSP-5600 & SWK-W16-FCT & ICT_HDMI R.03.xlsx', '', './files/wi/'),
(367, 'NS-IC600', 'FA', 'NS-IC600SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-21', '4', 'ADE', 'NS-IC600SR-WI-PA-REV.04.xls', './files/wi/NS-IC600SR-WI-PA-REV.04.xls', '', './files/wi/'),
(368, 'NS-AW294', 'FA', 'NS-AW294SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-24', '4', 'ADE', 'NS-AW294SR PA R.04.xls', './files/wi/NS-AW294SR PA R.04.xls', '', './files/wi/'),
(369, 'NS-AW194', 'FA', 'NS-AW194SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-21', '5', 'ADE', 'NS-AW194SR PA R.05.xls', './files/wi/NS-AW194SR PA R.05.xls', '', './files/wi/'),
(370, 'YAS-306', 'RPA', 'F0096', 'DESTINATION DOWNLOAD', 'MP', 'CLOSE', '2016-09-15', '0', 'BINTANG', 'F0028 WI Dest_Dwnload_RPA_YAS-CU306 Rev.00.xlsx', './files/wi/F0028 WI Dest_Dwnload_RPA_YAS-CU306 Rev.00.xlsx', '', './files/wi/'),
(371, 'YAS-152', 'FA', 'YAS-152/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-17', '16', 'ADE', 'WI PA YAS-152 REV 16.xls', './files/wi/WI PA YAS-152 REV 16.xls', '', './files/wi/'),
(372, 'NS-F140', 'FA', 'NS-F140SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-20', '3', 'DIVKY', 'NS-F140 SAA R.3.xls', './files/wi/NS-F140 SAA R.3.xls', '', './files/wi/'),
(373, 'NS-BP101', 'FA', 'NS-BP101SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-08', '4', 'FIRMAN', 'NS-BP101-WI-FA R4.xlsx', './files/wi/NS-BP101-WI-FA R4.xlsx', '', './files/wi/'),
(374, 'GTR-1000', 'FA', 'GTR-1000/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-08', '4', 'ADE', 'Package GTR-1000 rev04.xls', './files/wi/Package GTR-1000 rev04.xls', '', './files/wi/'),
(375, 'SPS-900', 'FA', 'SPS-900 SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-08', '3', 'ADE', 'Package SPS900rev03.xls', './files/wi/Package SPS900rev03.xls', '', './files/wi/'),
(376, 'NS-SW200', 'FA', 'NS-SW200SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-08', '9', 'FIRMAN', 'SW200 WI FA REV 9.xlsx', './files/wi/SW200 WI FA REV 9.xlsx', '', './files/wi/'),
(377, 'NS-P51', 'FA', 'NS-P51/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-15', '2', 'ADE', 'NS P-51SR WI PA REV 2.xls', './files/wi/NS P-51SR WI PA REV 2.xls', '', './files/wi/'),
(378, 'NS-B51', 'FA', 'NS-B51SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-09', '2', 'FIRMAN', 'NS-P51 WI FA REV 2.xlsx', './files/wi/NS-P51 WI FA REV 2.xlsx', '', './files/wi/'),
(379, 'NS-B951', 'FA', 'NS-B951SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-09', '2', 'FIRMAN', 'NS-B951SR-WI-FA R2.xlsx', './files/wi/NS-B951SR-WI-FA R2.xlsx', '', './files/wi/'),
(380, 'VXS10S', 'FA', 'VXS10S/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-09', '5', 'RIZA', 'VXS10S WI FA REV 5.xls', './files/wi/VXS10S WI FA REV 5.xls', '', './files/wi/'),
(381, 'VXS10ST', 'FA', 'VXS10ST/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-09', '7', 'RIZA', 'WI VXS10ST FA REV 7.xlsx', './files/wi/WI VXS10ST FA REV 7.xlsx', '', './files/wi/'),
(382, 'TSX-132ML', 'FA', 'TSX-132ML/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-09', '2', 'FIRMAN', 'TSX132-WI-FA_rev2.xls', './files/wi/TSX132-WI-FA_rev2.xls', '', './files/wi/'),
(384, 'NS-SW1000', 'FA', 'NS-SW1000SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-13', '3', 'FIRMAN', 'NS-SW1000SR WI FA Rev.3.xlsx', './files/wi/NS-SW1000SR WI FA Rev.3.xlsx', '', './files/wi/'),
(385, 'NS-SW1000', 'WW', 'NS-SW1000/WI/WW/BAFFLE', 'BAFFLE UNIT', 'MP', 'CLOSE', '2016-09-26', '2', 'DANI', 'WI WW Baffle NS-SW1000SR PVC REV 2.xls', './files/wi/WI WW Baffle NS-SW1000SR PVC REV 2.xls', '', './files/wi/'),
(386, 'NS-C901', 'FA', 'NS-C901SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-09-13', '4', 'FIRMAN', 'NS-C901SR WI-FA REV04.xlsx', './files/wi/NS-C901SR WI-FA REV04.xlsx', '', './files/wi/'),
(387, 'NS-C901', 'FA', 'NS-C901SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-15', '4', 'WILDAN', 'WI PA NS-C901 SR REV 4.xls', './files/wi/WI PA NS-C901 SR REV 4.xls', '', './files/wi/'),
(388, 'NS-B951', 'FA', 'NS-B951SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-16', '3', 'WILDAN', 'WI PA NS-B951 rev 3.xls', './files/wi/WI PA NS-B951 rev 3.xls', '', './files/wi/'),
(389, 'NS-B210', 'FA', 'NS-B210SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-14', '6', 'DIVKY', 'Acc B210rev6.xls', './files/wi/Acc B210rev6.xls', '', './files/wi/'),
(390, 'NS-PB210', 'FA', 'NS-PB210SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-20', '5', 'ADE', 'NS-PB210-WI-PA R5.xls', './files/wi/NS-PB210-WI-PA R5.xls', '', './files/wi/'),
(391, 'YST-FSW100', 'FA', 'YST-FSW100SR/WI/PA', 'PACKAGE ASSY ', 'MP', 'CLOSE', '2016-09-14', '24', 'ADE', 'YST-FSW100SR-WI-PA Rev24.xls', './files/wi/YST-FSW100SR-WI-PA Rev24.xls', '', './files/wi/'),
(392, 'BB-TRBX', 'F0079', 'F0079', 'PACKAGE ASSY', 'MP', 'CHECKIN', '2016-09-26', '5', 'WILDAN', 'F0079 WI TRBX-Series PA R.5.xls', './files/wi/F0079 WI TRBX-Series PA R.5.xls', '', './files/wi/'),
(393, 'YAS-706', 'FA', 'F0037', 'TOP PANEL UNIT', 'MP', 'CHECKIN', '2016-09-23', '2', 'WILDAN', 'F0037 WI TPU YAS-CU706SR rev. 2.xls', './files/wi/F0037 WI TPU YAS-CU706SR rev. 2.xls', '', './files/wi/'),
(394, 'YAS-706', 'FA', 'F0038', 'BOTTOM PANEL UNIT', 'MP', 'CHECKIN', '2016-09-22', '2', 'WILDAN', 'F0038 WI BPU YAS-706 REV 2.xlsx', './files/wi/F0038 WI BPU YAS-706 REV 2.xlsx', '', './files/wi/'),
(395, 'NS-125F', 'FA', 'NS-125F/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-15', '14', 'ADE', 'WI NS-125F PA rev14.xls', './files/wi/WI NS-125F PA rev14.xls', '', './files/wi/'),
(396, 'NS-125F', 'FA', 'NS-125FSR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-17', '12', 'DIVKY', 'WI NS-125F SAA rev12.xls', './files/wi/WI NS-125F SAA rev12.xls', '', './files/wi/'),
(397, 'NS-333', 'FA', 'NS-333SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-15', '19', 'ADE', 'NS-333SR-WI-PA Rev19.xls', './files/wi/NS-333SR-WI-PA Rev19.xls', '', './files/wi/'),
(398, 'NS-333', 'FA', 'NS-333SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-17', '9', 'DIVKY', 'NS-333SR-WI-SAA Rev09.xls', './files/wi/NS-333SR-WI-SAA Rev09.xls', '', './files/wi/'),
(399, 'VXC4, VXC4W', 'FA', 'VXC4/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-16', '10', 'FIRMAN', 'WI_FINAL_ASSY_VXC4 Rev.10.xlsx', './files/wi/WI_FINAL_ASSY_VXC4 Rev.10.xlsx', '', './files/wi/'),
(400, 'VXC3F, VXC3FW', 'FA', 'VXC3F/WI/FA', 'FINAL ASSY', 'MP', 'CLOSE', '2016-09-16', '3', 'FIRMAN', 'VXC 3F SR WI FA REV 3.xlsx', './files/wi/VXC 3F SR WI FA REV 3.xlsx', '', './files/wi/'),
(401, 'YST-SW515', 'FA', 'YST-SW515SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-15', '24', 'ADE', 'YST-SW515-WI-PA rev24.xls', './files/wi/YST-SW515-WI-PA rev24.xls', '', './files/wi/'),
(402, 'NS-8390', 'FA', 'NS-8390SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-14', '4', 'DIVKY', 'NS-8390-WI-SAA-REV04.xls', './files/wi/NS-8390-WI-SAA-REV04.xls', '', './files/wi/'),
(403, 'ALL MODEL', 'PAINTING', 'REACTOR-SOK-05-05', 'REACTOR 2 E-30 And E-XP 2', 'MP', 'CLOSE', '2016-08-30', '1', 'DONI', 'REACTOR-SOK-05-05-001 Rev.01.xlsx', './files/wi/REACTOR-SOK-05-05-001 Rev.01.xlsx', '', './files/wi/'),
(404, 'YST-SW216', 'WW', 'YST-SW216/WI/WW/BODY', 'BODY', 'MP', 'CLOSE', '2016-09-21', '0', 'DANI', 'WI WW YST-SW216 Body Rev 00.xls', './files/wi/WI WW YST-SW216 Body Rev 00.xls', '', './files/wi/'),
(405, 'YST-SW216', 'WW', 'YST-SW216/WI/WW/SIDE-LR', 'SIDE LR ASSY', 'MP', 'CLOSE', '2016-09-21', '0', 'DANI', 'WI WW YST-SW216 SideLR Rev 00.xls', './files/wi/WI WW YST-SW216 SideLR Rev 00.xls', '', './files/wi/'),
(406, 'FZB0814B', 'FA', 'FZB0814BSR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-27', '5', 'FIRMAN', 'FINAL ASSY FZB0814BSR REV.05.xlsx', './files/wi/FINAL ASSY FZB0814BSR REV.05.xlsx', '', './files/wi/'),
(407, 'FZB0214A', 'FA', 'FZB0214ASR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-27', '4', 'FIRMAN', 'FINAL ASSY FZB0214ASR REV.04.xlsx', './files/wi/FINAL ASSY FZB0214ASR REV.04.xlsx', '', './files/wi/'),
(408, 'FZB0218A', 'FA', 'FZB0218ASR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-27', '5', 'FIRMAN', 'FINAL ASSY FZB0218ASR REV.05.xlsx', './files/wi/FINAL ASSY FZB0218ASR REV.05.xlsx', '', './files/wi/'),
(409, 'FZB0414B', 'FA', 'FZB0414BSR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-28', '5', 'FIRMAN', 'FINAL ASSY FZB0414BSR REV.05.xlsx', './files/wi/FINAL ASSY FZB0414BSR REV.05.xlsx', '', './files/wi/'),
(410, 'FZB0418A', 'FA', 'FZB0418ASR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-27', '3', 'FIRMAN', 'FINAL ASSY FZB0418ASR REV.03.xlsx', './files/wi/FINAL ASSY FZB0418ASR REV.03.xlsx', '', './files/wi/'),
(411, 'FZB0418B', 'FA', 'FZB0418BSR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-29', '3', 'FIRMAN', 'FINAL ASSY FZB0418BSR REV.03.xlsx', './files/wi/FINAL ASSY FZB0418BSR REV.03.xlsx', '', './files/wi/'),
(412, 'FZB0423D', 'FA', 'FZB0423DSR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-29', '3', 'FIRMAN', 'FINAL ASSY FZB0423DSR REV.03.xlsx', './files/wi/FINAL ASSY FZB0423DSR REV.03.xlsx', '', './files/wi/'),
(413, 'FZB0423E', 'FA', 'FZB0423ESR/WI/FA', 'AVITECS FINAL ASSY ', 'MP', 'CLOSE', '2016-09-29', '3', 'FIRMAN', 'FINAL ASSY FZB0423ESR REV.03.xlsx', './files/wi/FINAL ASSY FZB0423ESR REV.03.xlsx', '', './files/wi/'),
(414, 'FZB0818B', 'FA', 'FZB0818BSR/WI/FA', 'AVITECS FINAL ASSY ', 'MP', 'CLOSE', '2016-09-29', '5', 'FIRMAN', 'FINAL ASSY FZB0818BSR REV.05.xlsx', './files/wi/FINAL ASSY FZB0818BSR REV.05.xlsx', '', './files/wi/'),
(415, 'FZB0818C', 'FA', 'FZB0818CSR/WI/FA', 'AVITECS FINAL ASSY', 'MP', 'CLOSE', '2016-09-29', '2', 'FIRMAN', 'FINAL ASSY FZB0818CSR REV.02.xlsx', './files/wi/FINAL ASSY FZB0818CSR REV.02.xlsx', '', './files/wi/'),
(416, 'NS-B500', NULL, 'NS-B500/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'ADE', NULL, NULL, NULL, NULL),
(417, 'NS-C901', NULL, 'NS-C901/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'WILDAN', NULL, NULL, NULL, NULL),
(418, 'YST-SW515', NULL, 'YST-SW515/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'ADE', NULL, NULL, NULL, NULL),
(419, 'NS-333', NULL, 'NS-333/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'ADE', NULL, NULL, NULL, NULL),
(420, 'YST-FSW100', NULL, 'YST-FSW100/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'ADE', NULL, NULL, NULL, NULL),
(421, 'NS-SW500', NULL, 'NS-SW500/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'ADE', NULL, NULL, NULL, NULL),
(422, 'NS-C500', NULL, 'NS-C500/WI/PA', 'PACKAGE ASSY', NULL, 'CLOSE', '-', '-', 'ADE', NULL, NULL, NULL, NULL),
(423, 'NS-125F', NULL, 'NS-125F/WI/SAA', 'ACCESSORIES ASSY', NULL, 'CLOSE', '-', '-', 'DIVKY', NULL, NULL, NULL, NULL),
(424, 'NS-SW100', 'PCBA', 'A0011', 'PCB MAI/POWER-RADIAL-AI', 'MP', 'CHECKIN', '-', '-', 'HARIANTO', NULL, NULL, NULL, NULL),
(425, 'NS-SW100', NULL, 'NS-SW100SR/WI/MAIN/MI', 'MANUAL INSERT PCB MAIN', NULL, 'OPEN', '-', '-', 'EKO', NULL, NULL, NULL, NULL),
(426, 'NS-SW050', NULL, 'A0013', 'PCB MAIN/POWER-JUMPER-AI', NULL, 'OPEN', '-', '-', 'HARIANTO', NULL, NULL, NULL, NULL),
(428, 'NS-5000', 'WW', 'W0012', 'BACK', 'MP', 'CLOSE', '2016-09-28', '2', 'DANI', 'WI WW Back NS-5000 rev2.xlsx', './files/wi/WI WW Back NS-5000 rev2.xlsx', '', './files/wi/'),
(429, 'NS-5000', 'WW', 'W0008', 'SIDE IN', 'MP', 'CLOSE', '2016-09-28', '2', 'DANI', 'WI WW Side IN  NS-5000 rev 2.xlsx', './files/wi/WI WW Side IN  NS-5000 rev 2.xlsx', '', './files/wi/'),
(430, 'NS-5000', 'WW', 'W0009', 'SIDE OUT', 'MP', 'CLOSE', '2016-09-28', '2', 'DANI', 'WI WW Side OUT  NS-5000 rev 2.xlsx', './files/wi/WI WW Side OUT  NS-5000 rev 2.xlsx', '', './files/wi/'),
(431, 'NS-F150', 'FA', 'NS-F150SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-27', '3', 'ADE', 'NS-F150SR PA Rev 3.xls', './files/wi/NS-F150SR PA Rev 3.xls', '', './files/wi/'),
(432, 'NS-F350', 'FA', 'NS-F350SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-27', '1', 'FIRMAN', 'NS-F350SR-WI-SAA Rev 01.xlsx', './files/wi/NS-F350SR-WI-SAA Rev 01.xlsx', '', './files/wi/'),
(433, 'NS-ICS600', 'FA', 'NS-ICS600SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-22', '4', 'ADE', 'NS-ICS600SR-WI-PA-REV.04.xls', './files/wi/NS-ICS600SR-WI-PA-REV.04.xls', '', './files/wi/'),
(434, 'NS-P350', 'FA', 'NS-P350SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '3', 'FIRMAN', 'NS-P350SR-WI-SAA Rev03.xlsx', './files/wi/NS-P350SR-WI-SAA Rev03.xlsx', '', './files/wi/'),
(435, 'NS-PA150', 'FA', 'NS-PA150SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-27', '3', 'ADE', 'NS-PA150SR PA R.3.xls', './files/wi/NS-PA150SR PA R.3.xls', '', './files/wi/'),
(436, 'NS-SW050', 'FA', 'NS-SW050SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-20', '2', 'FIRMAN', 'NS-SW050SR WI SAA REV 2.xls', './files/wi/NS-SW050SR WI SAA REV 2.xls', '', './files/wi/'),
(437, 'NS-SW100', 'FA', 'NS-SW100SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-20', '2', 'FIRMAN', 'NS-SW100SR WI SAA REV 2.xls', './files/wi/NS-SW100SR WI SAA REV 2.xls', '', './files/wi/'),
(438, 'NS-SW700', 'FA', 'NS-SW700SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-27', '14', 'DIVKY', 'NS-SW700-WI-SAA-REV14.xls', './files/wi/NS-SW700-WI-SAA-REV14.xls', '', './files/wi/'),
(440, 'NS-SW901', 'FA', 'NS-SW901/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-23', '8', 'WILDAN', 'WI PA NS-SW901 rev 8.xls', './files/wi/WI PA NS-SW901 rev 8.xls', '', './files/wi/'),
(441, 'NS-AW294', 'FA', 'NS-AW294SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '2', 'FIRMAN', 'NS-AW294SR SAA R.02.xlsx', './files/wi/NS-AW294SR SAA R.02.xlsx', '', './files/wi/'),
(442, 'NS-AW392', 'FA', 'NS-AW392SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-22', '3', 'FIRMAN', 'NS-AW392SR-WI-SAA Rev03.xlsx', './files/wi/NS-AW392SR-WI-SAA Rev03.xlsx', '', './files/wi/'),
(443, 'NS-AW592', 'FA', 'NS-AW592SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '3', 'FIRMAN', 'NS-AW592SR-WI-SAA-Rev03.xlsx', './files/wi/NS-AW592SR-WI-SAA-Rev03.xlsx', '', './files/wi/'),
(444, 'NS-B330', 'FA', 'NS-B330SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '1', 'FIRMAN', 'NS-B330SR-WI-SAA Rev1.xlsx', './files/wi/NS-B330SR-WI-SAA Rev1.xlsx', '', './files/wi/'),
(445, 'NS-BP301', 'FA', 'NS-BP301SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '2', 'FIRMAN', 'NS-BP301SR-WI- SAA-R2.xlsx', './files/wi/NS-BP301SR-WI- SAA-R2.xlsx', '', './files/wi/'),
(446, 'NS-WSW160', 'FA', 'NS-WSW160SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-23', '9', 'DIVKY', 'NS-WSW160SR SAA R.9.xls', './files/wi/NS-WSW160SR SAA R.9.xls', '', './files/wi/'),
(447, 'NX-N500', 'FA', 'NX-N500SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '7', 'FIRMAN', 'NX-N500SR SAA R.07.xlsx', './files/wi/NX-N500SR SAA R.07.xlsx', '', './files/wi/'),
(448, 'NS-F160', 'FA', 'NS-F160SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '4', 'ADE', 'Package Assy F160 rev  4.xls', './files/wi/Package Assy F160 rev  4.xls', '', './files/wi/'),
(449, 'NS-SW200', 'FA', 'NS-SW200SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-20', '8', 'WILDAN', 'WI PA NS-SW200  rev 8.xls', './files/wi/WI PA NS-SW200  rev 8.xls', '', './files/wi/'),
(450, 'ATS-1520', 'FA', 'ATS1520/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-27', '4', 'DIVKY', 'WI SAA ATS-1520 rev 4.xls', './files/wi/WI SAA ATS-1520 rev 4.xls', '', './files/wi/'),
(451, 'NS-SW200', 'FA', 'NS-SW200SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-07', '7', 'DIVKY', 'WI SAA NS-SW200SR rev 7.xls', './files/wi/WI SAA NS-SW200SR rev 7.xls', '', './files/wi/'),
(452, 'YAS-152', 'FA', 'YAS-152/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-17', '13', 'DIVKY', 'WI SAA YAS-152 rev 13.xls', './files/wi/WI SAA YAS-152 rev 13.xls', '', './files/wi/'),
(453, 'NS-F71', 'FA', 'F0069', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '1', 'FIRMAN', 'F0069 WI NS-F71 SAA Rev.01.xlsx', './files/wi/F0069 WI NS-F71 SAA Rev.01.xlsx', '', './files/wi/'),
(454, 'YAS-105, ATS-1050', 'FA', 'YAS-105SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-19', '8', 'DIVKY', 'YAS-105SR & ATS-1050SR SAA R8.xls', './files/wi/YAS-105SR & ATS-1050SR SAA R8.xls', '', './files/wi/'),
(455, 'YHT-S401', 'FA', 'YHT-S401SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-23', '14', 'DIVKY', 'YHT-S401SR SAA R.14.xls', './files/wi/YHT-S401SR SAA R.14.xls', '', './files/wi/'),
(456, 'YSP-2500, HTY-250', 'FA', 'YSP-2500SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-14', '6', 'DIVKY', 'YSP-CU2500SR dan WSW120SR WI SAA REV 6.xls', './files/wi/YSP-CU2500SR dan WSW120SR WI SAA REV 6.xls', '', './files/wi/'),
(457, 'YST-FSW150', 'FA', 'YST-FSW150SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-24', '12', 'DIVKY', 'YST-FSW150-WI-SAA R12.xls', './files/wi/YST-FSW150-WI-SAA R12.xls', '', './files/wi/'),
(458, 'YST-SW315', 'FA', 'YST-SW315SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '30', 'ADE', 'YST-SW315-WI-PA Rev 30.xls', './files/wi/YST-SW315-WI-PA Rev 30.xls', '', './files/wi/'),
(459, 'YST-SW515', 'FA', 'YST-SW515SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-27', '15', 'DIVKY', 'YST-SW515-WI-SAA Rev.15.xls', './files/wi/YST-SW515-WI-SAA Rev.15.xls', '', './files/wi/'),
(460, 'DXS18', 'FA', 'DXS-SERIES/WI/FITTING', 'FITTING', 'MP', 'CLOSE', '2016-09-15', '1', 'RIZA', 'DXS WI FITTING REV 1.xls', './files/wi/DXS WI FITTING REV 1.xls', '', './files/wi/'),
(461, 'YAS-105, SRT-700', 'PCBA', 'YAS-105-POWER-SB-SL-L2', 'PCB-POWER-SMT L2', 'MP', 'CLOSE', '2016-09-26', '2', 'BILLY', 'PCB-POWER-SB-YAS105-SRT700-L2R1.xls', './files/wi/PCB-POWER-SB-YAS105-SRT700-L2R1.xls', '', './files/wi/'),
(462, 'YAS-706', 'PCBA', 'M0017', 'PCB DIGITAL MANUAL INSERTION', 'MP', 'CLOSE', '2016-09-30', '2', 'EKO', 'WI-Manual Insert YAS-706 DIGI Rev.2.xlsx', './files/wi/WI-Manual Insert YAS-706 DIGI Rev.2.xlsx', '', './files/wi/'),
(463, 'NS-WSW160', NULL, 'NS-WSW160SR/WI/SAA	', 'ACCESSORIES ASSY', NULL, 'CLOSE', '-', '-', 'DIVKY', NULL, NULL, NULL, NULL),
(464, 'BOTTOM PANEL EFG', NULL, 'BOTTOM PANEL EFG/WI/WW/CEFFINE', 'SURFACE BOARD', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(465, 'NX-N500', NULL, 'NX-N500/WI/AA', 'ACCESSORIES ASSY', NULL, 'OPEN', '-', '-', 'FIRMAN', NULL, NULL, NULL, NULL),
(466, 'ALL MODEL', 'PAINTING', 'P0007', 'MANUFACTURING STANDART MIXING', 'MP', 'CLOSE', '2016-09-23', '3', 'DONI', 'P0007 MANUFACTURING STANDART MIXING Rev.03.xlsx', './files/wi/P0007 MANUFACTURING STANDART MIXING Rev.03.xlsx', '', './files/wi/'),
(467, 'NS-PB350', 'FA', 'NS-PB350SR/WI/FA', 'SPEAKER FINAL ASSY', 'MP', 'CLOSE', '2016-10-03', '4', 'FIRMAN', 'NS-PB350 WI FA REV 4.xlsx', './files/wi/NS-PB350 WI FA REV 4.xlsx', '', './files/wi/'),
(468, 'YST-SW012', 'FA', 'YST-SW012SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-08-04', '15', 'ADE', 'YST-SW012-WI-PA rev15.xls', './files/wi/YST-SW012-WI-PA rev15.xls', '', './files/wi/'),
(471, 'BB-TRBX, BB700', NULL, 'C0040', 'PCB-MAIN-SB-BB_TRBX-L2', NULL, 'OPEN', '-', '-', 'ANGGI', NULL, NULL, NULL, NULL),
(472, 'BZW, CZW', NULL, 'BZW0820N/G/22N/G/WI/PA', 'PACKAGE ASSY', NULL, 'OPEN', '-', '-', 'RIZA', NULL, NULL, NULL, NULL),
(473, 'BZW, CZW', NULL, 'CZW0820N/G/22N/G/WI/PA', 'PACKAGE ASSY', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(474, 'BZW, CZW', NULL, 'CEFFINE/WI/WW/PALLET', 'PALLET', NULL, 'OPEN', '-', '-', 'DANI', NULL, NULL, NULL, NULL),
(475, 'YSP-1600', NULL, 'DKV-SE/PIANO/WI/FA	', 'FINAL ASSY', NULL, 'CLOSE', '-', '-', 'ANGGI', NULL, NULL, NULL, NULL),
(476, 'NS-BP182', 'FA', 'NS-BP182SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-02', '4', 'WILDAN', 'NS-BP182-WI-PA Rev 04.xls', './files/wi/NS-BP182-WI-PA Rev 04.xls', '', './files/wi/'),
(477, 'NS-F51', 'FA', 'NS-F51SR/WI/SAA', 'ACCESSORIES ASSY', 'MP', 'CLOSE', '2016-09-26', '1', 'FIRMAN', 'F51SR-WI-SAA-REV01.xlsx', './files/wi/F51SR-WI-SAA-REV01.xlsx', '', './files/wi/'),
(478, 'NS-AW592', 'FA', 'NS-AW592/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '7', 'ADE', 'NS-AW592SR PA R.07.xls', './files/wi/NS-AW592SR PA R.07.xls', '', './files/wi/'),
(479, 'NS-AW392', 'FA', 'NS-AW392SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '8', 'ADE', 'NS-AW392SR PA R.08.xls', './files/wi/NS-AW392SR PA R.08.xls', '', './files/wi/'),
(480, 'NS-F71', 'FA', 'F0068', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '4', 'WILDAN', 'WI NS-F71 PA Rev.04.xlsx', './files/wi/WI NS-F71 PA Rev.04.xlsx', '', './files/wi/'),
(481, 'NS-P150', 'FA', 'NS-P150SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '4', 'ADE', 'Package Assy P150 rev4.xls', './files/wi/Package Assy P150 rev4.xls', '', './files/wi/'),
(482, 'NS-B330', 'FA', 'NS-B330SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '4', 'WILDAN', 'NS-B330SR-WI-PA Rev4.xls', './files/wi/NS-B330SR-WI-PA Rev4.xls', '', './files/wi/'),
(483, 'NS-SW1000', 'FA', 'NS-SW1000SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '6', 'WILDAN', 'NS-SW1000 WI PA REV 6.xls', './files/wi/NS-SW1000 WI PA REV 6.xls', '', './files/wi/'),
(484, 'NS-BP301', 'FA', 'NS-BP301SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-09-26', '6', 'WILDAN', 'NS-BP301 WI PA rev06.xls', './files/wi/NS-BP301 WI PA rev06.xls', '', './files/wi/'),
(485, 'SRT-1000', 'FA', 'SRT-1000SR/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-10-06', '11', 'WILDAN', 'SRT 1000 & SBS 100 WI PA REV 11.xls', './files/wi/SRT 1000 & SBS 100 WI PA REV 11.xls', '', './files/wi/'),
(486, 'ZWVSA105FHX', 'FA', 'ZWVSA105FHX/WI/PA', 'PACKAGE ASSY', 'MP', 'CLOSE', '2016-10-06', '1', 'RIZA', 'Package Assy ZWVSA105FHX REV.01.xls', './files/wi/Package Assy ZWVSA105FHX REV.01.xls', '', './files/wi/');

-- --------------------------------------------------------

--
-- Table structure for table `wi_masterlist`
--

CREATE TABLE `wi_masterlist` (
  `masterlist_id` int(11) NOT NULL,
  `doc_no` varchar(20) NOT NULL,
  `doc_title` varchar(50) NOT NULL,
  `doc_class` int(11) NOT NULL,
  `speaker_model` text NOT NULL,
  `doc_section` int(11) NOT NULL,
  `doc_type` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `remark` text,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `flag` int(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wi_masterlist`
--

INSERT INTO `wi_masterlist` (`masterlist_id`, `doc_no`, `doc_title`, `doc_class`, `speaker_model`, `doc_section`, `doc_type`, `pic_id`, `remark`, `created_at`, `date_modified`, `user_id`, `flag`) VALUES
(1, 'C0001', 'PCB BEAM & DAMP', 1, ' YSP-2500, HTY-250, SRT-1000, YRS-1500, YRS-2500', 3, 3, 10, NULL, '2016-05-31 01:09:09', '2016-07-13 15:33:54', 8, 1),
(2, 'C0002', 'PCB DAC', 1, 'NS-WSW120, YSP-2500, HTY-250, YSP-2700, YAS-706', 3, 3, 10, NULL, '2016-05-31 01:09:31', '2016-05-31 01:09:31', 8, 1),
(3, 'C0003', 'PCB INPUT ( LINE 2 )', 1, 'SRT-1500, YSP-1600 ', 3, 3, 10, NULL, '2016-05-31 10:21:22', '2016-06-20 17:19:05', 8, 1),
(4, 'C0004', 'PCB INPUT, DAMP, HDMI ( Line 2 )', 1, 'YSP-5600', 3, 3, 10, NULL, '2016-06-16 14:32:06', '2016-06-16 14:32:06', 8, 1),
(5, 'C0005', 'PCB DIGITAL', 1, 'YSP-CU2700', 3, 3, 9, NULL, '2016-06-03 17:08:18', '2016-06-03 17:08:18', 8, 1),
(6, 'C0006', 'PCB MAIN SMT (LINE2)', 1, 'NS-SW050, NS-SW100', 3, 3, 9, NULL, '2016-05-31 01:08:45', '2016-06-20 18:58:51', 8, 1),
(7, 'C0007', 'PCB POWER', 1, 'YSP-CU2700', 3, 3, 9, NULL, '2016-06-03 17:08:33', '2016-06-03 17:08:33', 8, 1),
(8, 'C0008', 'PCB BEAM & FL', 1, 'YSP-CU2700', 3, 3, 9, NULL, '2016-06-03 17:08:41', '2016-06-03 17:08:41', 8, 1),
(9, 'C0009', 'PCB MAIN', 1, 'NS-WSW121', 3, 3, 9, NULL, '2016-06-03 17:47:40', '2016-06-03 17:47:40', 8, 1),
(10, 'F0001', 'PACKAGE ASSY', 3, 'YSP-2700', 1, 1, 6, NULL, '2016-06-02 07:58:40', '2016-06-02 07:58:40', 1, 1),
(11, 'F0002', 'ACCESSORIES ASSY', 3, 'YSP-2700', 1, 1, 7, NULL, '2016-06-02 08:14:17', '2016-06-02 08:14:17', 1, 1),
(12, 'F0003', 'FINAL ASSY', 3, 'YSP-CU2700', 1, 1, 13, NULL, '2016-06-03 16:55:24', '2016-06-03 16:55:24', 8, 1),
(13, 'SA0001', 'ARRAY SPEAKER UNIT', 3, 'YSP-2700', 1, 1, 13, NULL, '2016-06-02 13:06:59', '2016-06-02 13:06:59', 1, 0),
(14, 'F0004', 'ARRAY SPEAKER CHECK', 3, 'YSP-CU2700', 1, 1, 14, NULL, '2016-06-03 16:56:25', '2016-06-03 16:56:25', 8, 1),
(15, 'F0005', 'DESTINATION WRITER', 3, 'YSP-CU2700', 1, 1, 14, NULL, '2016-06-03 17:09:01', '2016-06-03 17:09:01', 8, 1),
(16, 'F0006', 'FIRMWARE UPDATE', 3, 'YSP-CU2700', 1, 1, 14, NULL, '2016-06-03 16:57:15', '2016-06-03 16:57:15', 8, 1),
(17, 'F0007', 'FUNCTION CHECK', 3, 'YSP-CU2700', 1, 1, 14, NULL, '2016-06-03 16:57:40', '2016-06-03 16:57:40', 8, 1),
(18, 'F0008', 'HIPOT TESTER', 3, 'YSP-CU2700', 1, 1, 14, NULL, '2016-06-03 16:55:55', '2016-06-03 16:55:55', 8, 1),
(19, 'F0009', 'SOUND CHECK', 3, 'YSP-CU2700', 1, 1, 15, NULL, '2016-06-03 17:09:15', '2016-06-03 17:09:15', 8, 1),
(20, 'M0001', 'PCB BEAM-MANUAL INSERT', 8, 'YSP-CU2700', 1, 1, 16, NULL, '2016-06-03 16:21:44', '2016-06-03 16:21:44', 8, 1),
(21, 'M0002', 'PCB DIGITAL-MANUAL INSERT', 8, 'YSP-CU2700', 3, 1, 16, NULL, '2016-06-03 16:21:52', '2016-06-03 16:21:52', 8, 1),
(22, 'M0003', 'PCB FL-MANUAL INSERT', 8, 'YSP-CU2700', 3, 1, 12, NULL, '2016-06-03 16:22:00', '2016-06-03 16:22:00', 8, 1),
(23, 'M0004', 'PCB POWER-MANUAL INSERT', 8, 'YSP-CU2700', 3, 1, 12, NULL, '2016-06-03 16:22:14', '2016-06-03 16:22:14', 8, 1),
(24, 'A0001', 'PCB MAIN-POWER-RADIAL-AI', 7, 'YSP-CU2700', 3, 3, 17, NULL, '2016-06-07 14:37:09', '2016-06-07 14:37:09', 8, 1),
(25, 'A0002', 'PCB MAIN-POWER-JUMPER-JV-AV', 7, 'YSP-CU2700', 3, 3, 17, NULL, '2016-06-07 14:36:58', '2016-06-07 14:36:58', 8, 1),
(26, 'A0003', 'PCB POWER-RADIAL-AI', 7, 'YSP-706', 3, 3, 17, NULL, '2016-06-07 14:40:01', '2016-06-07 14:40:01', 8, 1),
(27, 'F0010', 'FINAL ASSY', 3, 'NS-WSW121', 1, 1, 6, NULL, '2016-06-02 08:55:23', '2016-06-02 08:55:23', 1, 1),
(28, 'SA0002', 'REAR PANEL ASSY', 3, 'NS-WSW121', 1, 1, 5, NULL, '2016-06-02 13:07:06', '2016-06-02 13:07:06', 1, 0),
(29, 'F0011', 'SOUND CHECK', 3, 'NS-WSW121', 1, 1, 15, NULL, '2016-06-02 08:59:20', '2016-06-02 08:59:20', 1, 1),
(30, 'SA0003', 'FRONT GRILLE ASSY', 3, 'NS-WSW121', 1, 1, 18, NULL, '2016-06-02 13:07:22', '2016-06-02 13:07:22', 1, 0),
(31, 'F0012', 'HIPOT TESTER', 3, 'NS-WSW121', 1, 1, 14, NULL, '2016-06-02 09:04:49', '2016-06-02 09:04:49', 1, 1),
(32, 'SA0004', 'REAR PANEL INSPECTION', 3, 'NS-WSW121', 1, 1, 15, NULL, '2016-06-02 13:07:38', '2016-06-02 13:07:38', 1, 0),
(33, 'SA0005', 'PPID WRITER', 3, 'NS-WSW121', 1, 1, 15, NULL, '2016-06-02 13:08:20', '2016-06-02 13:08:20', 1, 0),
(34, 'F0013', 'FUNCTION CHECK (WIRRELES CONNECTIONS)', 3, 'NS-WSW121', 1, 1, 15, NULL, '2016-06-02 09:10:27', '2016-06-02 09:10:27', 1, 1),
(35, 'P0001', 'SPRAY BAFFLE-PAINTING', 2, 'NS-WSW121', 5, 1, 19, NULL, '2016-06-02 09:15:55', '2016-06-02 09:15:55', 1, 1),
(36, 'W0001', 'BACK', 4, 'NS-WSW121', 4, 1, 20, NULL, '2016-06-02 09:19:26', '2016-06-02 09:19:26', 1, 1),
(37, 'W0002', 'BODY', 4, 'NS-WSW121', 4, 1, 20, NULL, '2016-06-02 09:20:08', '2016-06-02 09:20:08', 1, 1),
(38, 'W0003', 'BAFFLE', 4, 'NS-WSW121', 4, 1, 20, NULL, '2016-06-02 09:20:38', '2016-06-02 09:20:38', 1, 1),
(39, 'W0004', 'REINFORCEMENT', 4, 'NS-WSW121', 4, 1, 20, NULL, '2016-06-02 09:21:13', '2016-06-02 09:21:13', 1, 1),
(40, 'W0005', 'BASE WOOD', 4, 'NS-WSW121', 4, 1, 20, NULL, '2016-06-02 09:21:59', '2016-06-02 09:21:59', 1, 1),
(41, 'F0014', 'ARRAY SPEAKER UNIT', 3, 'YSP-CU2700', 1, 1, 13, NULL, '2016-06-02 10:38:01', '2016-06-02 10:38:01', 8, 1),
(42, 'F0015', 'REAR PANEL ASSY', 3, 'NS-WSW121', 1, 1, 5, NULL, '2016-06-02 10:39:56', '2016-06-02 10:39:56', 8, 1),
(43, 'F0016', 'FRONT GRILLE ASSY', 3, 'NS-WSW121', 1, 1, 18, NULL, '2016-06-02 10:41:58', '2016-06-02 10:41:58', 8, 1),
(44, 'F0017', 'AUTO INSPECTION AVMT', 3, 'NS-WSW121', 1, 1, 15, NULL, '2016-06-09 12:57:06', '2016-06-09 12:57:06', 8, 1),
(45, 'F0018', 'PPID WRITER', 3, 'NS-WSW121', 1, 1, 15, NULL, '2016-06-02 10:44:06', '2016-06-02 10:44:06', 8, 1),
(46, 'M0005', 'PCB DAC-MANUAL INSERT', 8, 'NS-WSW121', 3, 1, 16, NULL, '2016-06-02 13:29:45', '2016-06-02 13:29:45', 8, 1),
(47, 'M0006', 'PCB MAIN-MANUAL INSERT', 8, 'NS-WSW121', 3, 1, 16, NULL, '2016-06-02 13:30:47', '2016-06-02 13:30:47', 8, 1),
(48, 'M0007', 'ICT INSPECTION PCB POWER', 8, 'YSP-CU2700', 3, 1, 16, NULL, '2016-06-02 13:59:39', '2016-06-02 13:59:39', 8, 1),
(49, 'F0019', 'PACKAGE ASSY', 3, 'YAS-306', 1, 1, 6, NULL, '2016-06-02 14:06:16', '2016-06-02 14:06:16', 1, 1),
(50, 'F0020', 'ACCESSORIES ASSY', 3, 'YAS-306', 1, 1, 7, NULL, '2016-06-02 14:08:22', '2016-06-02 14:08:22', 1, 1),
(51, 'F0021', 'SPEAKER FINAL ASSY', 3, 'YAS-306', 1, 1, 13, NULL, '2016-06-02 14:11:05', '2016-06-02 14:11:05', 1, 1),
(52, 'F0022', 'AMP UNIT', 3, 'YAS-306', 1, 1, 5, NULL, '2016-06-02 14:37:36', '2016-06-02 14:37:36', 1, 1),
(53, 'F0023', 'TOP PANEL UNIT', 3, 'YAS-306', 1, 1, 18, NULL, '2016-06-02 14:40:48', '2016-06-02 14:40:48', 1, 1),
(54, 'F0024', 'BOTTOM PANEL UNIT', 3, 'YAS-306', 1, 1, 6, NULL, '2016-06-02 14:41:24', '2016-06-02 14:41:24', 1, 1),
(55, 'F0025', 'AMP UNIT CHECK', 3, 'YAS-306', 1, 1, 15, NULL, '2016-06-02 14:42:26', '2016-06-02 14:42:26', 1, 1),
(56, 'F0026', 'SOUND CHECK', 3, 'YAS-306', 1, 1, 14, NULL, '2016-06-02 14:43:18', '2016-06-02 14:43:18', 1, 1),
(57, 'F0027', 'HI-POT TESTER CHECK', 3, 'YAS-306', 1, 1, 15, NULL, '2016-06-02 14:44:28', '2016-06-02 14:44:28', 1, 1),
(58, 'F0028', 'DEST DOWNLOAD FA (OBSOLETE)', 3, 'YAS-306', 1, 1, 15, NULL, '2016-06-02 14:52:02', '2016-09-15 09:03:05', 8, 1),
(59, 'M0008', 'ICT INSPECTION PCB MAIN', 8, 'NS-WSW121, YSP-CU2700', 3, 1, 16, NULL, '2016-06-02 14:52:31', '2016-06-02 14:52:31', 8, 1),
(60, 'F0029', 'FIRMWARE UPDATE', 3, 'YAS-306', 1, 1, 15, NULL, '2016-06-02 14:53:22', '2016-06-02 14:53:22', 1, 1),
(61, 'M0009', 'PCB DIGITAL MANUAL INSERTION ', 8, 'YAS-306', 3, 1, 16, NULL, '2016-06-04 14:09:14', '2016-06-04 14:09:14', 8, 1),
(62, 'M0010', 'PCB POWER MANUAL INSERTION ', 8, 'YAS-306', 3, 1, 12, NULL, '2016-06-04 14:08:57', '2016-06-04 14:08:57', 8, 1),
(63, 'M0011', 'FCT INSPECTION PCB DIGITAL', 8, 'YSP-CU2700', 3, 1, 12, NULL, '2016-06-03 17:24:34', '2016-06-03 17:24:34', 8, 1),
(64, 'M0012', 'FCT INSPECTION PCB POWER', 8, 'YSP-CU2700, YAS-306', 3, 1, 12, NULL, '2016-06-04 13:56:53', '2016-06-04 13:56:53', 8, 1),
(65, 'M0013', 'FCT INSPECTION PCB DAC', 8, 'NS-WSW121', 3, 1, 12, NULL, '2016-06-04 13:25:28', '2016-06-04 13:25:28', 8, 1),
(66, 'M0014', 'FCT INSPECTION PCB MAIN', 8, 'NS-WSW121', 3, 1, 12, NULL, '2016-06-04 13:26:02', '2016-06-04 13:26:02', 8, 1),
(67, 'M0015', 'ICT INSPECTION PCB FL', 8, 'YSP-CU2700', 3, 1, 16, NULL, '2016-06-02 15:00:24', '2016-06-02 15:00:24', 8, 1),
(68, 'M0016', 'ICT INSPECTION PCB POWER', 8, 'YAS-306', 3, 1, 16, NULL, '2016-06-02 15:02:15', '2016-06-02 15:02:15', 1, 1),
(69, 'M0017', 'PCB DIGITAL MANUAL INSERTION ', 8, 'YAS-706', 3, 1, 12, NULL, '2016-06-07 14:24:02', '2016-06-07 14:24:02', 8, 1),
(70, 'M0018', 'FCT INSPECTION PCB DIGITAL', 8, 'YAS-306', 3, 1, 16, NULL, '2016-06-02 15:06:04', '2016-06-02 15:06:04', 1, 1),
(71, 'A0004', 'PCB POWER-RADIAL-AI', 7, 'YAS-306', 3, 3, 17, NULL, '2016-06-07 14:41:39', '2016-06-07 14:41:39', 8, 1),
(72, 'A0005', 'PCB POWER-JUMPER-AI', 7, 'YAS-306', 3, 3, 17, NULL, '2016-06-07 14:41:50', '2016-06-07 14:41:50', 8, 1),
(73, 'C0010', 'PCB POWER SMT', 1, 'YAS-306', 3, 3, 10, NULL, '2016-06-07 19:54:47', '2016-06-07 19:54:47', 8, 1),
(74, 'C0011', 'PCB DIGITAL', 1, 'YAS-306', 3, 3, 10, NULL, '2016-06-07 14:48:36', '2016-06-07 14:48:36', 8, 1),
(75, 'F0030', 'HIPOT TESTER', 3, 'NS-WSW120', 1, 1, 14, NULL, '2016-06-15 13:32:30', '2016-06-15 13:32:30', 8, 1),
(76, 'F0031', 'HIPOT TESTER', 3, 'YSP-CU2500', 1, 1, 14, NULL, '2016-06-04 08:40:01', '2016-06-04 08:40:01', 8, 1),
(77, 'M0019', 'FCT INSPECTION PCB BEAM', 8, 'YSP-2500, YSP-2700, YRS-1500, YRS-2500, SRT-1000', 3, 1, 16, NULL, '2016-06-04 14:11:20', '2016-06-04 14:11:20', 8, 1),
(78, 'F0032', 'FUNCTION CHECK', 3, 'YAS-306', 1, 1, 14, NULL, '2016-06-07 07:43:34', '2016-06-07 07:43:34', 8, 1),
(79, 'C0012', 'PCB MAIN SMT (LINE1)', 1, 'NS-SW050, NS-SW100', 3, 3, 9, NULL, '2016-06-16 14:30:18', '2016-06-20 18:59:11', 8, 1),
(80, 'F0033', 'EMPTY', 3, 'EMPTY', 1, 1, 14, NULL, '2016-06-09 13:27:37', '2016-09-20 13:54:23', 8, 1),
(81, 'F0034', 'PACKAGE ASSY', 3, 'YAS-706', 1, 1, 7, NULL, '2016-06-07 14:08:48', '2016-06-07 14:08:48', 8, 1),
(82, 'F0035', 'SPEAKER FINAL ASSY', 3, 'YAS-706', 1, 1, 13, NULL, '2016-06-07 14:10:02', '2016-06-07 14:10:02', 8, 1),
(83, 'F0036', 'AMP UNIT ASSY', 3, 'YAS-706', 1, 1, 5, NULL, '2016-06-07 14:11:24', '2016-06-07 14:11:24', 8, 1),
(84, 'F0037', 'TOP PANEL UNIT', 3, 'YAS-706', 1, 1, 18, NULL, '2016-06-07 14:13:10', '2016-06-07 14:13:10', 8, 1),
(85, 'F0038', 'BOTTOM PANEL UNIT', 3, 'YAS-706', 1, 1, 5, NULL, '2016-06-07 14:13:44', '2016-06-07 14:13:44', 8, 1),
(86, 'F0039', 'ACCESSORIES ASSY', 3, 'YAS-706', 1, 1, 7, NULL, '2016-06-15 13:25:51', '2016-06-15 13:25:51', 8, 1),
(87, 'F0040', 'AMP UNIT CHECK', 3, 'YAS-706', 1, 1, 14, NULL, '2016-06-07 14:15:35', '2016-06-07 14:15:35', 8, 1),
(88, 'F0041', 'FUNCTION CHECK', 3, 'YAS-706', 1, 1, 15, NULL, '2016-06-07 14:16:09', '2016-06-07 14:16:09', 8, 1),
(89, 'F0042', 'SOUND CHECK', 3, 'YAS-706', 1, 1, 15, NULL, '2016-06-07 14:16:35', '2016-06-07 14:16:35', 8, 1),
(90, 'F0043', 'DESTINATIONS DOWNLOAD', 3, 'YAS-706', 1, 1, 14, NULL, '2016-06-07 14:17:20', '2016-06-07 14:17:20', 8, 1),
(91, 'F0044', 'FIRMWARE UPDATE', 3, 'YAS-706', 1, 1, 14, NULL, '2016-06-07 14:17:45', '2016-06-07 14:17:45', 8, 1),
(92, 'M0020', 'PCB POWER MANUAL INSERTION ', 8, 'YAS-706', 3, 1, 12, NULL, '2016-06-07 14:19:13', '2016-06-07 14:19:13', 8, 1),
(93, 'M0021', 'PCB DAMP MANUAL INSERT', 8, 'YAS-706', 3, 1, 16, NULL, '2016-06-07 14:25:20', '2016-06-07 14:25:20', 8, 1),
(94, 'M0022', 'ICT INSPECTION PCB POWER', 8, 'YAS-706', 3, 1, 16, NULL, '2016-06-07 14:26:13', '2016-06-07 14:26:13', 8, 1),
(95, 'M0023', 'FCT INSPECTION PCB POWER', 8, 'YAS-706', 3, 1, 12, NULL, '2016-06-07 14:26:53', '2016-06-07 14:26:53', 8, 1),
(96, 'M0024', 'FCT INSPECTION PCB DAMP', 8, 'YAS-706', 3, 1, 16, NULL, '2016-06-07 14:27:40', '2016-06-07 14:27:40', 8, 1),
(97, 'M0025', 'FCT INSPECTION PCB DIGITAL', 8, 'YAS-706', 3, 1, 12, NULL, '2016-06-07 14:28:26', '2016-06-07 14:28:26', 8, 1),
(98, 'A0006', 'PCB POWER-JUMPER-AI', 7, 'YAS-706', 3, 3, 17, NULL, '2016-06-07 14:43:19', '2016-06-07 14:43:19', 8, 1),
(99, 'C0013', 'PCB POWER', 1, 'YAS-706', 3, 3, 10, NULL, '2016-06-07 14:50:01', '2016-06-07 14:50:01', 8, 1),
(100, 'C0014', 'PCB DIGITAL', 1, 'YAS-706', 3, 3, 10, NULL, '2016-06-16 16:18:46', '2016-06-16 16:18:46', 8, 1),
(101, 'C0015', 'PCB DAMP', 1, 'YAS-706', 3, 3, 10, NULL, '2016-06-07 14:51:13', '2016-06-07 14:51:13', 8, 1),
(102, 'F0045', 'PACKAGE ASSY', 3, 'NS-5000', 1, 1, 6, NULL, '2016-06-09 08:30:35', '2016-06-09 08:30:35', 1, 1),
(103, 'F0046', 'ACCESSORIESS ASSY', 3, 'NS-5000', 1, 1, 6, NULL, '2016-06-09 08:31:25', '2016-06-09 08:31:25', 1, 1),
(104, 'F0047', 'FINAL ASSY', 3, 'NS-5000', 1, 1, 13, NULL, '2016-06-09 08:32:00', '2016-06-09 08:32:00', 1, 1),
(105, 'F0048', 'FRONT GRILLE ASSY, TERMINAL ASSY, PORT ASSY (SA )', 3, 'NS-5000', 1, 1, 5, NULL, '2016-06-09 13:07:42', '2016-06-09 13:07:42', 8, 1),
(106, 'S0001', 'SPACER ASSY', 5, 'NS-5000', 6, 1, 13, NULL, '2016-06-09 08:34:58', '2016-06-09 08:34:58', 1, 1),
(107, 'P0002', 'PAINTING PROCESS (MIX)', 2, 'NS-5000', 5, 1, 19, NULL, '2016-06-09 08:41:10', '2016-06-09 08:41:10', 1, 1),
(108, 'P0003', 'PAINTING PROCCESS', 2, 'NS-5000', 5, 1, 19, NULL, '2016-06-09 08:40:08', '2016-06-09 08:40:08', 1, 1),
(109, 'W0006', 'CABINET ASS''Y', 4, 'NS-5000', 4, 1, 21, NULL, '2016-06-09 08:43:19', '2016-06-09 08:43:19', 1, 1),
(110, 'W0007', 'BAFFLE', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 08:43:56', '2016-06-09 08:43:56', 1, 1),
(111, 'W0008', 'SIDE IN', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 08:44:33', '2016-06-09 08:44:33', 1, 1),
(112, 'W0009', 'SIDE OUT', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 08:59:15', '2016-06-09 08:59:15', 1, 1),
(113, 'W0010', 'TOP', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:01:19', '2016-06-09 09:01:19', 1, 1),
(114, 'W0011', 'BOTTOM', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:01:51', '2016-06-09 09:01:51', 1, 1),
(115, 'W0012', 'BACK', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:02:25', '2016-06-09 09:02:25', 1, 1),
(116, 'W0013', 'REINFORCEMENT', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:02:58', '2016-06-09 09:02:58', 1, 1),
(117, 'W0014', 'PARTITION', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:03:24', '2016-06-09 09:03:24', 1, 1),
(118, 'W0015', 'WEDGE', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:03:51', '2016-06-09 09:03:51', 1, 1),
(119, 'W0016', 'CORNER WOOD', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:04:20', '2016-06-09 09:04:20', 1, 1),
(120, 'W0017', 'CLEAT', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:04:53', '2016-06-09 09:04:53', 1, 1),
(121, 'W0018', 'BOARD DUCT', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:07:49', '2016-06-09 09:07:49', 1, 1),
(122, 'W0019', 'GUIDE WOOD', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:08:24', '2016-06-09 09:08:24', 1, 1),
(123, 'W0020', 'HOLDER DAMPER', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:08:54', '2016-06-09 09:08:54', 1, 1),
(124, 'W0021', 'A-CHAMBER', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:09:22', '2016-06-09 09:09:22', 1, 1),
(125, 'W0022', 'MASKING JIG', 4, 'NS-5000', 4, 1, 20, NULL, '2016-06-09 09:09:48', '2016-06-09 09:09:48', 1, 1),
(126, 'F0049', 'GP 201EX CC UNIT FINAL ASSY', 3, 'SW BOX 2016DKV & GP201EX  CC UNIT', 1, 1, 10, NULL, '2016-06-10 07:45:00', '2016-09-20 13:48:31', 8, 1),
(127, 'F0050', 'PACKAGE ASSY', 3, 'YSP-5600', 1, 1, 6, NULL, '2016-06-16 08:19:25', '2016-06-16 08:19:25', 8, 1),
(128, 'F0051', 'ATTACHMENT ASSY', 3, 'YSP-5600', 1, 1, 7, NULL, '2016-06-16 08:22:48', '2016-06-16 08:22:48', 8, 1),
(129, 'F0052', 'SPEAKER FINAL ASSY', 3, 'YSP-5600', 1, 1, 13, NULL, '2016-06-16 08:26:13', '2016-07-15 13:29:39', 8, 1),
(130, 'F0053', 'AMP UNIT CHECK', 3, 'YSP-5600', 1, 1, 14, NULL, '2016-06-16 08:27:28', '2016-06-16 08:27:28', 8, 1),
(131, 'F0054', 'SUB ASSY', 3, 'YSP-5600', 1, 1, 5, NULL, '2016-06-16 08:31:42', '2016-06-16 08:31:42', 8, 1),
(132, 'F0055', 'GRILLE FRAME UNIT', 3, 'YSP-5600', 1, 1, 5, NULL, '2016-06-16 08:33:12', '2016-06-16 08:33:12', 8, 1),
(133, 'F0056', 'ARRAY SPEAKER UNIT', 3, 'YSP-5600', 1, 1, 5, NULL, '2016-06-16 09:24:28', '2016-06-16 09:24:28', 8, 1),
(134, 'F0057', 'PAIRING CHECK', 3, 'YSP-5600', 1, 1, 15, NULL, '2016-06-16 09:25:11', '2016-06-16 09:25:11', 8, 1),
(135, 'F0058', 'ARRAY SPEAKER CHECK', 3, 'YSP-5600', 1, 1, 15, NULL, '2016-06-16 08:37:52', '2016-06-16 08:37:52', 8, 1),
(136, 'F0059', 'SOUND CHECK', 3, 'YSP-5600', 1, 1, 14, NULL, '2016-06-16 08:40:07', '2016-06-16 08:40:07', 8, 1),
(137, 'F0060', 'WOOFER CHECK', 3, 'YSP-5600', 1, 1, 15, NULL, '2016-06-16 08:40:59', '2016-06-16 08:40:59', 8, 1),
(138, 'F0061', 'ARRAY SPEAKER FUNCTION CHECK', 3, 'YSP-5600', 1, 1, 15, NULL, '2016-06-16 08:42:26', '2016-06-16 08:42:26', 8, 1),
(139, 'F0062', 'FIRMWARE UPDATE', 3, 'YSP-5600', 1, 1, 15, NULL, '2016-06-16 08:44:01', '2016-06-16 08:44:01', 8, 1),
(140, 'M0026', 'MANUAL INSERTION PCB POWER', 8, 'YSP-5600', 3, 1, 12, NULL, '2016-06-16 08:53:39', '2016-06-16 08:53:39', 8, 1),
(141, 'M0027', 'MANUAL INSERTION PCB DIGITAL', 8, 'YSP-5600', 3, 1, 22, NULL, '2016-06-16 08:57:10', '2016-06-16 08:57:10', 8, 1),
(142, 'M0028', 'MANUAL INSERTION PCB DAMP', 8, 'YSP-5600', 3, 1, 12, NULL, '2016-06-16 08:58:20', '2016-06-16 08:58:20', 8, 1),
(143, 'M0029', 'MANUAL INSERTION PCB INPUT', 8, 'YSP-5600', 3, 1, 12, NULL, '2016-06-16 08:59:11', '2016-06-16 08:59:11', 8, 1),
(144, 'M0030', 'ICT INSPECTION PCB DAMP', 8, 'YSP-5600', 3, 1, 23, NULL, '2016-06-16 09:02:26', '2016-06-16 09:02:26', 8, 1),
(145, 'M0031', 'ICT INSPECTION PCB POWER', 8, 'YSP-5600', 3, 1, 23, NULL, '2016-06-16 09:03:50', '2016-06-16 09:03:50', 8, 1),
(146, 'M0032', 'FCT INSPECTION PCB INPUT', 8, 'YSP-5600', 3, 1, 23, NULL, '2016-06-16 09:05:29', '2016-06-16 09:05:29', 8, 1),
(147, 'M0033', 'FCT INSPECTION PCB POWER', 8, 'YSP-5600', 3, 1, 23, NULL, '2016-06-16 09:06:14', '2016-06-16 09:06:14', 8, 1),
(148, 'M0034', 'FCT INSPECTION PCB DAMP', 8, 'YSP-5600', 3, 1, 12, NULL, '2016-06-16 09:07:08', '2016-06-16 09:07:08', 8, 1),
(149, 'M0035', 'FCT INSPECTION PCB HDMI', 8, 'YSP-5600', 3, 1, 16, NULL, '2016-06-16 09:07:56', '2016-06-16 09:07:56', 8, 1),
(150, 'M0036', 'FCT INSPECTION PCB DIGITAL', 8, 'YSP-5600', 3, 1, 12, NULL, '2016-06-16 09:10:07', '2016-07-13 19:23:04', 8, 1),
(151, 'M0037', 'FCT INSPECTION PCB MAIN', 8, 'YSP-5600', 3, 1, 23, NULL, '2016-06-16 09:11:22', '2016-06-16 09:11:22', 8, 1),
(152, 'M0038', 'ICT INSPECTION PCB INPUT', 8, 'YSP-5600', 3, 1, 23, NULL, '2016-06-16 09:12:35', '2016-06-16 09:12:35', 8, 1),
(153, 'A0007', 'POWER RADIAL AI', 7, 'YSP-5600', 3, 1, 17, NULL, '2016-06-16 09:13:36', '2016-06-16 09:13:36', 8, 1),
(154, 'A0008', 'POWER AXIAL AI', 7, 'YSP-5600', 3, 1, 17, NULL, '2016-06-16 09:14:20', '2016-06-16 09:14:20', 8, 1),
(155, 'A0009', 'POWER JUMPER AI', 7, 'YSP-5600', 3, 1, 17, NULL, '2016-06-16 09:15:05', '2016-06-16 09:15:05', 8, 1),
(156, 'C0016', 'PCB INPUT DAMP HDMI ( LINE 1 )', 1, 'YSP-5600', 3, 3, 10, NULL, '2016-06-16 16:19:19', '2016-06-20 15:42:12', 8, 1),
(157, 'C0017', 'PCB DIGITAL', 1, 'YSP-5600', 3, 3, 10, NULL, '2016-06-16 16:19:30', '2016-06-16 16:19:30', 8, 1),
(158, 'C0018', 'PCB INPUT POWER', 1, 'YSP-5600', 3, 3, 10, NULL, '2016-06-16 16:19:39', '2016-06-16 16:19:39', 8, 1),
(159, 'F0063', 'GROUND CONTINUITY TESTER', 3, 'YSP-5600', 1, 1, 14, NULL, '2016-06-16 09:18:40', '2016-06-16 09:18:40', 8, 1),
(160, 'C0019', 'PCB MAIN', 1, 'NS-WSW121 (LINE 1)', 3, 3, 9, NULL, '2016-06-16 11:15:01', '2016-06-16 11:15:01', 8, 1),
(161, 'C0020', 'PCB POWER', 1, 'YSP-CU2700 (LINE 1)', 3, 3, 9, NULL, '2016-06-16 11:16:32', '2016-06-16 11:16:32', 8, 1),
(162, 'C0021', 'PCB POWER', 1, 'YAS-306( LINE 1 )', 3, 3, 9, NULL, '2016-06-16 11:18:16', '2016-06-16 11:18:16', 8, 1),
(163, 'F0064', 'PACKAGE ASSY', 3, 'SWK-W16', 1, 1, 6, NULL, '2016-06-16 13:10:14', '2016-06-16 13:10:14', 8, 1),
(164, 'F0065', 'SPEAKER  FINAL ASSY', 3, 'SWK-W16', 1, 1, 5, NULL, '2016-06-16 13:12:34', '2016-06-16 13:12:34', 8, 1),
(165, 'F0066', 'SOUND CHECK', 3, 'SWK-W16', 1, 1, 15, NULL, '2016-06-16 13:14:43', '2016-06-16 13:14:43', 8, 1),
(166, 'F0067', 'ACCESSORIES ASSY', 3, 'SWK-W16', 1, 1, 6, NULL, '2016-06-16 13:16:55', '2016-06-16 13:16:55', 8, 1),
(167, 'M0039', 'MANUAL INSERTION PCB MAIN', 8, 'SWK-W16', 3, 1, 16, NULL, '2016-06-16 13:19:18', '2016-06-16 13:19:18', 8, 1),
(168, 'M0040', 'FCT INSPECTION PCB MAIN', 8, 'SWK-W16', 3, 1, 23, NULL, '2016-06-16 13:21:29', '2016-06-16 13:21:29', 8, 1),
(169, 'C0022', 'ADD PART SMT PROCESS SPECIAL OF PWB', 1, 'SWK-W16', 3, 1, 23, NULL, '2016-06-16 13:23:58', '2016-06-16 13:23:58', 8, 1),
(170, 'C0023', 'PCB MAIN SMT', 1, 'SWK-W16', 3, 3, 10, NULL, '2016-06-16 16:19:55', '2016-06-16 16:19:55', 8, 1),
(171, 'M0041', 'ICT INSPECTION PCB MAIN', 8, 'SWK-W16', 3, 1, 23, NULL, '2016-06-16 13:29:15', '2016-06-16 13:29:15', 8, 1),
(172, 'C0024', 'IDENTIFIKASI IC MEMORY FLASHROM', 1, 'COMMON', 3, 1, 10, NULL, '2016-06-16 13:29:55', '2016-06-16 13:29:55', 8, 1),
(173, 'A0010', 'PCB MAIN RADIAL AI', 7, 'SWK-W16', 3, 1, 17, NULL, '2016-06-16 13:31:32', '2016-06-16 13:31:32', 8, 1),
(174, 'F0068', 'PACKAGE ASSY', 3, 'NS-F71', 1, 1, 6, NULL, '2016-06-16 15:09:57', '2016-06-16 15:09:57', 8, 1),
(175, 'F0069', 'ACCESSORES ASSY', 3, 'NS-F71', 1, 1, 6, NULL, '2016-06-16 15:14:05', '2016-06-16 15:14:05', 8, 1),
(176, 'F0070', 'SPEAKER  FINAL ASSY', 3, 'NS-F71', 1, 1, 5, NULL, '2016-06-16 15:16:21', '2016-06-16 15:16:21', 8, 1),
(177, 'F0071', 'FRONT GRILLE ASSY', 3, 'NS-F71', 1, 1, 15, NULL, '2016-06-16 15:18:28', '2016-06-16 15:18:28', 8, 1),
(178, 'F0072', 'NETWORK ASSY', 3, 'NS-F71', 1, 1, 15, NULL, '2016-06-16 15:20:45', '2016-06-16 15:20:45', 8, 1),
(179, 'F0073', 'WIRE HARNESS ASSY', 3, 'NS-F71', 1, 1, 24, NULL, '2016-06-16 15:30:00', '2016-06-16 15:30:00', 8, 1),
(180, 'F0074', 'WELDING PRESS', 3, 'NS-F71', 1, 2, 13, NULL, '2016-06-16 15:41:05', '2016-06-16 15:41:05', 8, 1),
(181, 'W0023', 'BAFFLE', 4, 'NS-F71', 4, 1, 21, NULL, '2016-06-16 15:37:54', '2016-06-16 15:37:54', 8, 1),
(182, 'C0025', 'PROSEDUR PERLAKUAN MATERIAL PCB', 1, 'COMMON', 3, 1, 9, NULL, '2016-06-17 07:30:25', '2016-06-17 07:30:25', 8, 1),
(183, 'C0026', 'PCB INPUT (LINE1)', 1, 'SRT-1500, YSP-1600', 3, 3, 10, NULL, '2016-06-20 18:26:44', '2016-06-20 18:26:44', 8, 1),
(184, 'C0027', 'PCB AMPS PA (LINE2)', 1, 'DSR series, DXS18 ', 3, 3, 10, NULL, '2016-06-21 13:05:22', '2016-06-21 13:06:29', 8, 1),
(185, 'C0028', 'PCB AMPS PA (LINE1)', 1, 'DSR series, DXS18', 3, 3, 10, NULL, '2016-06-21 13:31:47', '2016-06-21 13:31:47', 8, 1),
(186, 'C0029', 'PCB-MAIN-SB-HS & HSi Series-L2R1', 1, 'HS & HSi series', 3, 3, 10, NULL, '2016-07-13 01:34:58', '2016-07-13 16:09:41', 8, 1),
(187, 'C0030', 'PCB-DIGITAL-PA-PB-YSP1400-L1R1', 1, 'YSP-1400', 3, 3, 10, NULL, '2016-07-13 02:11:11', '2016-07-13 16:11:11', 8, 1),
(188, 'C0031', 'PCB-DIGITAL-PA-PB-YAS152-L1R1', 1, 'YAS-152', 3, 3, 10, NULL, '2016-07-13 02:11:41', '2016-07-13 16:11:41', 8, 1),
(189, 'C0032', 'PCB-DIGITAL-PA-PB-YSP1400-L2R1', 1, 'YSP-1400', 3, 3, 10, NULL, '2016-07-13 02:12:13', '2016-07-13 16:12:13', 8, 1),
(190, 'C0033', 'PCB AM PRINTING', 1, 'SW BOX SH 181EX2 UP & GP', 3, 3, 10, NULL, '2016-07-13 02:12:50', '2016-09-20 11:03:00', 8, 1),
(191, 'F0075', 'PACKAGE ASSY', 3, 'NS-PC40', 1, 1, 6, NULL, '2016-07-13 17:33:15', '2016-07-14 07:34:18', 8, 1),
(192, 'F0076', 'ACCESSORIES ASSY', 3, 'NS-PC40', 1, 1, 7, NULL, '2016-07-13 17:34:49', '2016-07-14 07:34:49', 8, 1),
(193, 'F0077', 'SW BOX FINAL ASSY', 3, 'SW BOX SH 181EX2 UP & GP', 1, 1, 10, NULL, '2016-07-14 11:56:22', '2016-09-20 11:03:13', 8, 1),
(194, 'F0078', 'SW BOX PACKAGE ASSY', 3, 'SW BOX SH 181EX2 UP & GP', 1, 1, 10, NULL, '2016-07-16 13:30:19', '2016-09-20 11:03:23', 8, 1),
(195, 'C0034', 'PCB DIGITAL PRINTING CC PA', 1, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 3, 10, NULL, '2016-07-18 07:36:15', '2016-09-20 13:40:10', 8, 1),
(196, 'M0042', 'PCB ASSY NETWORK', 8, 'VXS5', 3, 1, 12, NULL, '2016-07-19 11:56:53', '2016-07-19 11:56:53', 8, 1),
(197, 'M0043', 'PCB ASSY NETWORK', 8, 'VXS8', 3, 1, 12, NULL, '2016-07-19 11:57:41', '2016-07-19 11:57:41', 8, 1),
(198, 'M0044', 'PCB ASSY NETWORK', 8, 'VXC6', 3, 1, 12, NULL, '2016-07-19 11:58:28', '2016-07-19 11:58:28', 8, 1),
(199, 'M0045', 'PCB ASSY NETWORK', 8, 'VXC8', 3, 1, 12, NULL, '2016-07-19 11:59:04', '2016-07-19 11:59:04', 8, 1),
(200, 'A0011', 'PCB MAIN RADIAL', 7, 'NS-SW100', 3, 3, 17, NULL, '2016-07-20 13:36:46', '2016-07-20 13:36:46', 8, 1),
(201, 'A0012', 'PCB MAIN JUMPER', 7, 'NS-SW100', 3, 3, 17, NULL, '2016-07-20 13:38:32', '2016-07-20 13:38:32', 8, 1),
(202, 'A0013', 'PCB MAIN JUMPER', 7, 'NS-SW050', 3, 3, 17, NULL, '2016-07-20 13:40:00', '2016-07-20 13:40:00', 8, 1),
(203, 'A0014', 'PCB MAIN RADIAL', 7, 'NS-SW050', 3, 3, 17, NULL, '2016-07-20 13:40:51', '2016-07-20 13:40:51', 8, 1),
(204, 'C0035', 'PROSEDUR PENGOPERASIAN MESIN N=1 CHECKER', 1, 'COMMON', 3, 1, 9, NULL, '2016-07-25 07:35:18', '2016-07-25 07:35:18', 8, 1),
(205, 'C0036', 'MAINTENANCE MESIN N=1 CHECKER', 1, 'COMMON', 3, 1, 9, NULL, '2016-07-25 08:38:20', '2016-07-25 08:38:20', 8, 1),
(206, 'P0004', 'REPAIR PAINTING', 2, 'NS-5000', 5, 1, 19, NULL, '2016-07-25 09:42:29', '2016-07-25 09:42:29', 8, 1),
(207, 'C0037', 'PENANGANAN SOLDER PASTE', 1, 'COMMON', 3, 2, 9, NULL, '2016-07-26 13:49:43', '2016-08-01 13:45:19', 8, 1),
(208, 'C0038', 'SOLDER PASTE SOFTENER', 1, 'COMMON', 3, 2, 9, NULL, '2016-07-28 08:09:11', '2016-07-28 08:09:11', 8, 1),
(209, 'A0015', 'test', 7, 'new model test', 1, 3, 18, NULL, '2016-07-28 10:53:05', '2016-07-28 10:53:05', 8, 1),
(210, 'C0039', 'JOINT PART PCB AI & SMT', 1, 'COMMON', 3, 1, 9, NULL, '2016-07-28 10:59:02', '2016-08-01 13:44:38', 8, 1),
(211, 'C0040', 'PCB MAIN BONDING (LINE2)', 1, 'BB-TRBX', 3, 3, 9, NULL, '2016-07-28 13:56:48', '2016-07-28 13:56:48', 8, 1),
(212, 'M0046', 'PCB MAIN', 8, 'YSP-1400', 3, 1, 12, NULL, '2016-07-29 10:41:32', '2016-07-29 10:41:32', 8, 1),
(213, 'M0047', 'MANUAL INSERT PCB NETWORK', 8, 'VXC6', 3, 1, 12, NULL, '2016-08-04 14:53:55', '2016-08-04 15:07:38', 8, 1),
(214, 'M0048', 'MANUAL INSERT PCB POWER', 8, 'YASA-152', 3, 1, 23, NULL, '2016-08-04 14:57:39', '2016-08-04 15:08:46', 8, 1),
(215, 'F0079', 'PACKAGE ASSY', 3, 'BB-TRBX', 1, 1, 6, NULL, '2016-08-04 14:58:51', '2016-08-04 14:58:51', 8, 1),
(216, 'M0049', 'MANUAL INSERT PCB NETWORK', 8, 'VXC8', 3, 1, 12, NULL, '2016-08-04 15:09:30', '2016-08-04 15:09:30', 8, 1),
(217, 'M0050', 'FCT-MAIN & AVMT INSPECTION', 8, 'TRBX300, TRBX500, BB-TRBX', 3, 1, 14, NULL, '2016-08-04 15:10:37', '2016-08-04 15:10:37', 8, 1),
(218, 'M0051', 'MANUAL INSERT MAIN', 8, 'BB-TRBX', 3, 1, 16, NULL, '2016-08-04 15:11:57', '2016-08-04 15:11:57', 8, 1),
(219, 'F0080', 'PACKAGE ASSY', 3, 'NS-WSW121', 1, 1, 6, NULL, '2016-08-10 13:52:36', '2016-08-10 13:52:36', 8, 1),
(220, 'M0052', 'SOLDERING TOUCH UP', 8, 'COMMON', 3, 4, 16, NULL, '2016-08-11 09:49:15', '2016-08-11 09:49:15', 8, 1),
(221, 'F0081', 'ACCESSORIES ASSY', 3, 'NS-WSW121', 1, 1, 7, NULL, '2016-08-11 10:36:38', '2016-08-11 10:36:38', 8, 1),
(222, 'F0082', 'PACKAGE ASSY', 3, '8R56-VXS1MLW, 8R55-VXS1MLB', 1, 1, 5, NULL, '2016-08-16 09:44:52', '2016-08-16 09:50:24', 8, 1),
(223, 'F0083', 'SPEAKER FINAL ASSY', 3, '8R56-VXS1MLW, 8R55-VXS1MLB', 1, 1, 18, NULL, '2016-08-16 09:45:56', '2016-08-16 09:50:40', 8, 1),
(224, 'F0084', 'ACCESSORIES ASSY', 3, '8R56-VXS1MLW, 8R55-VXS1MLB', 1, 1, 6, NULL, '2016-08-16 09:49:47', '2016-08-16 09:50:53', 8, 1),
(225, 'F0085', 'PACKAGE ASSY', 3, '8R58-VXS3SW, 8R57-VXS3SB', 1, 1, 5, NULL, '2016-08-16 09:52:46', '2016-08-16 09:52:46', 8, 1),
(226, 'F0086', 'SPEAKER FINAL ASSY', 3, '8R58-VXS3SW, 8R57-VXS3SB', 1, 1, 6, NULL, '2016-08-16 09:53:09', '2016-08-16 09:53:09', 8, 1),
(227, 'F0087', 'ACCESSORIES ASSY', 3, '8R58-VXS3SW, 8R57-VXS3SB', 1, 1, 18, NULL, '2016-08-16 09:53:38', '2016-08-16 09:53:38', 8, 1),
(228, 'F0088', 'PACKAGE ASSY', 3, '8S21-CMA1MB, 8S22-CMA1MW', 1, 1, 7, NULL, '2016-08-16 09:57:26', '2016-08-16 09:57:26', 8, 1),
(229, 'F0089', 'SUB ASSY ', 3, '8S21-CMA1MB, 8S22-CMA1MW', 1, 1, 7, NULL, '2016-08-16 09:58:41', '2016-08-16 09:58:41', 8, 1),
(230, 'F0090', 'PACKAGE ASSY', 3, '8S23-CMA3SB, 8S24-CMA3SW', 1, 1, 18, NULL, '2016-08-16 10:01:01', '2016-08-16 10:01:01', 8, 1),
(231, 'F0091', 'SUB ASSY ', 3, '8S23-CMA3SB, 8S24-CMA3SW', 1, 1, 18, NULL, '2016-08-16 10:01:32', '2016-08-16 10:01:32', 8, 1),
(232, 'F0092', 'PACKAGE ASSY', 3, '8T18-RMA1MB', 1, 1, 7, NULL, '2016-08-16 10:02:56', '2016-08-16 10:02:56', 8, 1),
(233, 'F0093', 'SUB ASSY ', 3, '8T18-RMA1MB', 1, 1, 7, NULL, '2016-08-16 10:10:20', '2016-08-16 10:10:20', 8, 1),
(234, 'P0005', 'MIXING MATERIAL', 2, 'COMMON', 5, 4, 19, NULL, '2016-08-16 15:03:23', '2016-08-16 15:03:23', 8, 1),
(235, 'P0006', 'MIXING JIG AND TOOLS', 2, 'COMMON', 5, 4, 19, NULL, '2016-08-16 15:05:56', '2016-08-16 15:05:56', 8, 1),
(236, 'P0007', 'MIXING OPERATION METHOD', 2, 'COMMON', 5, 4, 19, NULL, '2016-08-16 15:06:44', '2016-08-16 15:06:44', 8, 1),
(237, 'P0008', 'BUFFING MACHINE', 2, 'COMMON', 5, 4, 19, NULL, '2016-08-20 09:13:08', '2016-08-20 09:13:08', 8, 1),
(238, 'P0009', 'BUFFING JIG AND TOOL', 2, 'COMMON', 5, 4, 19, NULL, '2016-08-20 13:35:53', '2016-08-20 13:35:53', 8, 1),
(239, 'P0010', 'BUFFING OPERATION METHODE', 2, ' COMMON', 5, 4, 19, NULL, '2016-08-20 13:36:22', '2016-08-20 13:36:22', 8, 1),
(240, 'F0094', 'AVNERA FIRMWARE UPDATE', 3, 'YSP-CU2700, NS-WSW121, YSP-CU2500, NS-WSW120', 1, 1, 14, NULL, '2016-08-30 16:09:52', '2016-08-30 16:09:52', 8, 1),
(241, 'C0041', 'PCB-INPUT-POWER (LINE 1)', 1, 'YSP-5600', 3, 3, 10, NULL, '2016-09-01 16:46:35', '2016-09-01 16:46:35', 8, 1),
(242, 'C0042', 'IDENTIFIKASI PENGGUNAAN STENCIL PADA MESIN YSP', 1, 'COMMON', 3, 1, 10, NULL, '2016-09-02 10:08:56', '2016-09-02 10:08:56', 8, 1),
(243, 'F0095', 'DESTINATIONS DOWNLOAD', 3, 'YAS-706', 1, 1, 14, NULL, '2016-09-03 14:51:44', '2016-09-03 14:51:44', 8, 1),
(244, 'F0096', 'DESTINATION DOWNLOAD-RPA', 3, 'YAS-306', 1, 1, 14, NULL, '2016-09-15 09:03:53', '2016-09-15 09:03:53', 8, 1),
(245, 'P0011', 'SPRAY MATERIAL', 2, 'COMMON', 5, 4, 19, NULL, '2016-09-15 13:46:55', '2016-09-15 13:46:55', 8, 1),
(246, 'P0012', 'SPRAY JIG AND TOOLS', 2, 'COMMON', 5, 4, 19, NULL, '2016-09-15 13:47:27', '2016-09-15 13:47:27', 8, 1),
(247, 'P0013', 'SPRAY OPERATING METODE', 2, 'COMMON', 5, 4, 19, NULL, '2016-09-15 13:48:00', '2016-09-15 13:48:00', 8, 1),
(248, 'F0097', 'INSPECTION CHECK', 3, 'SW BOX SH 181EX2 UP & GP', 1, 1, 14, NULL, '2016-09-20 11:10:07', '2016-09-20 11:10:07', 8, 1),
(249, 'M0053', 'FCT INSPECTION PCB DM', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 22, NULL, '2016-09-20 11:13:41', '2016-09-20 11:13:41', 8, 1),
(250, 'M0054', 'FCT INSPECTION PCB AM', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 22, NULL, '2016-09-20 11:14:41', '2016-09-20 11:14:41', 8, 1),
(251, 'M0055', 'MANUAL INSERTION PCB DIGITAL-PNB', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 23, NULL, '2016-09-20 11:16:35', '2016-09-20 11:16:35', 8, 1),
(252, 'M0056', 'MANUAL INSERTION PCB DIGITAL-AM', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 22, NULL, '2016-09-20 11:17:36', '2016-09-20 11:17:36', 8, 1),
(253, 'M0057', 'MANUAL INSERTION PCB DIGITAL-MA', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 23, NULL, '2016-09-20 11:19:15', '2016-09-20 11:19:15', 8, 1),
(254, 'M0058', 'MANUAL INSERTION PCB DIGITAL-UH', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 22, NULL, '2016-09-20 11:20:27', '2016-09-20 11:20:27', 8, 1),
(255, 'C0043', 'PCB-MA-PN-UH-SMT', 1, 'SW BOX SH 181EX2 UP & GP', 3, 3, 10, NULL, '2016-09-20 11:21:23', '2016-09-20 11:21:23', 8, 1),
(256, 'C0044', 'PCB-DM-PA-PB SMT', 1, 'SW BOX SH 181EX2 UP & GP', 3, 3, 10, NULL, '2016-09-20 11:22:19', '2016-09-20 11:22:19', 8, 1),
(257, 'M0059', 'INSPECTION SH-AM WRITER', 8, 'SW BOX SH 181EX2 UP & GP', 3, 1, 25, NULL, '2016-09-20 11:40:43', '2016-09-20 11:43:38', 8, 1),
(258, 'C0045', 'PCB DIGITAL-CCJK-HP-SBC-SMT', 1, 'SW BOX 2016DKV & GP201EX  CC UNIT\r\n', 3, 3, 10, NULL, '2016-09-20 13:04:32', '2016-09-20 13:40:20', 8, 1),
(259, 'C0046', 'PCB DIGITAL PRINTING CC PB', 1, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 3, 10, NULL, '2016-09-20 13:06:20', '2016-09-20 13:40:29', 8, 1),
(260, 'C0047', 'PCB DIGITAL DM PA-PB', 1, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 3, 10, NULL, '2016-09-20 13:06:58', '2016-09-20 13:40:39', 8, 1),
(261, 'C0048', 'EMPTY', 1, 'EMPTY', 3, 1, 15, NULL, '2016-09-20 13:08:55', '2016-09-20 13:15:01', 8, 1),
(262, 'M0060', 'MANUAL INSERTION PCB CC_JK', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 23, NULL, '2016-09-20 13:18:34', '2016-09-20 13:40:54', 8, 1),
(263, 'M0061', 'MANUAL INSERTION PCB CC', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 23, NULL, '2016-09-20 13:19:59', '2016-09-20 13:41:03', 8, 1),
(264, 'M0062', 'MANUAL INSERTION PCB HP', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 23, NULL, '2016-09-20 13:23:00', '2016-09-20 13:41:13', 8, 1),
(265, 'M0063', 'MANUAL INSERTION PCB SBC4', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 23, NULL, '2016-09-20 13:24:43', '2016-09-20 13:41:24', 8, 1),
(266, 'M0064', 'ICT INSPECTION PCB SBC4', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 12, NULL, '2016-09-20 13:26:13', '2016-09-20 13:41:35', 8, 1),
(267, 'M0065', 'FCT INSPECTION PCB DM', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 15, NULL, '2016-09-20 13:29:29', '2016-09-20 13:41:45', 8, 1),
(268, 'M0066', 'FCT INSPECTION PCB CC', 8, 'SW BOX 2016DKV & GP201EX  CC UNIT', 3, 1, 15, NULL, '2016-09-20 13:32:44', '2016-09-20 13:41:56', 8, 1),
(269, 'F0098', 'SW BOX 2016DKV PACKAGE ASSY', 3, 'SW BOX 2016DKV & GP201EX  CC UNIT', 1, 1, 6, NULL, '2016-09-20 13:43:23', '2016-09-20 13:43:23', 8, 1),
(270, 'F0099', 'GP 201EX CC UNIT PACKAGE ASSY', 3, 'SW BOX 2016DKV & GP201EX CC UNIT', 1, 1, 6, NULL, '2016-09-20 13:45:32', '2016-09-20 13:45:32', 8, 1),
(271, 'F0100', 'SW BOX 2016DKV FINAL ASSY', 3, 'SW BOX 2016DKV & GP201EX CC UNIT', 1, 1, 10, NULL, '2016-09-20 13:48:02', '2016-09-20 13:48:02', 8, 1),
(272, 'F0101', 'FINAL CHECK AND CONNECTION', 3, 'SW BOX 2016DKV & GP201EX CC UNIT', 1, 1, 14, NULL, '2016-09-20 13:50:07', '2016-09-20 13:50:07', 8, 1),
(273, 'F0102', 'FLASH PROGAMING', 3, 'SW BOX 2016DKV & GP201EX CC UNIT	', 1, 1, 15, NULL, '2016-09-20 13:51:49', '2016-09-20 13:51:49', 8, 1),
(274, 'F0103', 'SD CARD PROGRAMING', 3, 'SW BOX 2016DKV & GP201EX CC UNIT	', 1, 1, 15, NULL, '2016-09-20 13:52:38', '2016-09-20 13:52:38', 8, 1),
(275, 'A0016', 'PCB MAIN AXIAL', 7, 'NS-SW050', 3, 3, 17, NULL, '2016-09-30 10:47:33', '2016-09-30 10:47:33', 8, 1),
(276, 'A0017', 'PCB MAIN AXIAL', 7, 'NS-SW100', 3, 3, 17, NULL, '2016-09-30 10:48:01', '2016-09-30 10:48:01', 8, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action`
--
ALTER TABLE `action`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_class`
--
ALTER TABLE `doc_class`
  ADD PRIMARY KEY (`doc_class_id`);

--
-- Indexes for table `doc_count`
--
ALTER TABLE `doc_count`
  ADD PRIMARY KEY (`masterlist_count_id`);

--
-- Indexes for table `doc_section`
--
ALTER TABLE `doc_section`
  ADD PRIMARY KEY (`doc_section_id`),
  ADD KEY `doc_section_id` (`doc_section_id`),
  ADD KEY `doc_section_id_2` (`doc_section_id`);

--
-- Indexes for table `doc_type`
--
ALTER TABLE `doc_type`
  ADD PRIMARY KEY (`doc_type_id`),
  ADD KEY `doc_type_id` (`doc_type_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_id` (`parent_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_action`
--
ALTER TABLE `role_action`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `action_id` (`action_id`);

--
-- Indexes for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_id` (`role_id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `wi`
--
ALTER TABLE `wi`
  ADD PRIMARY KEY (`wi_id`);

--
-- Indexes for table `wi_masterlist`
--
ALTER TABLE `wi_masterlist`
  ADD PRIMARY KEY (`masterlist_id`),
  ADD UNIQUE KEY `doc_no` (`doc_no`),
  ADD KEY `pic_id` (`pic_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `doc_section` (`doc_section`),
  ADD KEY `doc_section_2` (`doc_section`),
  ADD KEY `doc_section_3` (`doc_section`),
  ADD KEY `doc_section_4` (`doc_section`),
  ADD KEY `doc_class` (`doc_class`),
  ADD KEY `doc_class_2` (`doc_class`),
  ADD KEY `doc_type` (`doc_type`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action`
--
ALTER TABLE `action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
--
-- AUTO_INCREMENT for table `doc_class`
--
ALTER TABLE `doc_class`
  MODIFY `doc_class_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `doc_count`
--
ALTER TABLE `doc_count`
  MODIFY `masterlist_count_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doc_section`
--
ALTER TABLE `doc_section`
  MODIFY `doc_section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc_type`
--
ALTER TABLE `doc_type`
  MODIFY `doc_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `role_action`
--
ALTER TABLE `role_action`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1891;
--
-- AUTO_INCREMENT for table `role_menu`
--
ALTER TABLE `role_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=519;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `wi`
--
ALTER TABLE `wi`
  MODIFY `wi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=487;
--
-- AUTO_INCREMENT for table `wi_masterlist`
--
ALTER TABLE `wi_masterlist`
  MODIFY `masterlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_action`
--
ALTER TABLE `role_action`
  ADD CONSTRAINT `role_action_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `role_menu`
--
ALTER TABLE `role_menu`
  ADD CONSTRAINT `role_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
