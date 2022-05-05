-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2022 at 02:48 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newakin`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `sn` int(11) NOT NULL,
  `bankname` varchar(500) NOT NULL,
  `bankid` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`sn`, `bankname`, `bankid`) VALUES
(1, ' United Bank for Africa', 7),
(2, 'First Bank', 8),
(3, 'MainStreet', 9),
(4, 'GTB', 10),
(5, 'UnioN', 11),
(6, 'WEMA', 16),
(7, 'IBTC', 17),
(8, 'Access', 31),
(9, 'Ecobank', 47),
(10, 'Fidelity', 51),
(11, 'Diamond', 72),
(12, 'ETB', 75),
(13, 'FCMB', 76),
(14, 'Intercontinental', 89),
(15, 'Standard Chartered', 109),
(16, 'Zenith', 117),
(17, 'SKYE', 120),
(18, 'Sterling', 121),
(19, 'Keystone Bank', 123),
(20, 'Enterprise', 125),
(21, 'Citi Bank', 126),
(22, 'Fin Bank', 128),
(23, 'UNITY', 129),
(24, 'TronWallet', 0),
(25, 'EthereumWallet', 0),
(26, 'Bitcoin Wallet', 0),
(27, 'PinkcoinWallet', 0),
(28, 'Bitcoin Wallet', 0),
(29, 'PinkcoinWallet', 0);

-- --------------------------------------------------------

--
-- Table structure for table `clan`
--

CREATE TABLE `clan` (
  `id` int(11) NOT NULL,
  `clanCode` varchar(20) NOT NULL,
  `clanName` varchar(100) NOT NULL,
  `m_no` int(11) NOT NULL,
  `clancreator` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clan`
--

INSERT INTO `clan` (`id`, `clanCode`, `clanName`, `m_no`, `clancreator`, `category`, `status`, `date`) VALUES
(1, 'THKSWBGOPJGF', 'Brent Crewa', 1, 2, 'Lite', 'visible', 1600953995),
(2, '6QMZ0WR2OYAJ', 'Magney', 1, 4, 'Lite', 'visible', 1601834616),
(3, 'KXT90SICKY1M', '900EX', 1, 4, 'Lite', 'visible', 1601834766),
(4, 'HDYW65PFYR1H', 'sa', 1, 4, 'Lite', 'visible', 1601834852),
(5, '0ZYA6RGNFPVQ', 'Dmk', 1, 4, 'Lite', 'visible', 1601834985),
(6, 'IEHI527SVW4K', 'assa', 1, 2, 'Lite', 'visible', 1602034847),
(7, '06KKYAQPOSWF', 'YES', 1, 1, 'Lite', 'visible', 1604417830),
(8, 'ACHSKUBSZROJ', 'dEQ', 1, 1, 'Select Category', 'visible', 1604417855),
(9, 'A0GITKFJ1YU9', 'NINE', 1, 1, 'Lite', 'visible', 1604417893);

-- --------------------------------------------------------

--
-- Table structure for table `clan_refer`
--

CREATE TABLE `clan_refer` (
  `id` int(11) NOT NULL,
  `clancode` varchar(25) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `upline` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `val` int(11) NOT NULL,
  `who_created` varchar(200) NOT NULL,
  `who_sold` varchar(200) NOT NULL,
  `who_use` varchar(200) NOT NULL,
  `role_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`id`, `code`, `val`, `who_created`, `who_sold`, `who_use`, `role_id`, `status`) VALUES
(13, 'ODLZA06YQQDT', 10000, '0', '', '3', 0, 1),
(14, 'ZWQMDL5WZ9EB', 10000, '2', '', '3', 0, 1),
(15, 'KTYNRW5MCO27', 3000, '2', '', '', 0, 1),
(16, 'YZJPRK0VR9OB', 7500, '1', '', '7', 0, 1),
(17, 'UYP9QIWBSO7X', 7500, '9', '', '7', 0, 1),
(18, 'S8EMODLQZUUN', 7500, '5', '', '5', 0, 1),
(19, 'AQCVKH36LIWD', 1500, '3', '', '7', 0, 1),
(20, 'QXA5M67I4FEC', 30000, '3', '', '7', 2, 1),
(21, 'SQ0TANPREGC3', 333333, '5', '', '3', 1, 1),
(22, 'FERNCL7MBOGF', 5000, '3', '', '7', 2, 1),
(23, 'XJIMREHDMIDP', 1350, '3', '', '7', 2, 1),
(24, '1UJHFKIVZCSH', 9850, '5', '', '3', 1, 1),
(25, 'T2HIYCXXVBFJ', 46700, '5', '', '3', 1, 1),
(26, 'EISDS0URDFHF', 2147483647, '5', '', '6', 1, 1),
(27, 'MXLZMZI1YHF9', 14000, '5', '', '3', 1, 1),
(28, '0S5NQNHMTLYZ', 15600, '5', '', '3', 1, 1),
(29, 'O6JIRLKYO8VY', 2300, '3', '', '6', 2, 1),
(30, 'PLWBHLTB4GAE', 3456, '3', '', '7', 2, 1),
(31, 'R7YJ0LTB8CC1', 3456, '3', '', '7', 2, 1),
(32, 'MKAG9CGCZ1WB', 34500, '3', '', '7', 2, 1),
(33, 'DGTNIAXVW6JK', 34500, '3', '', '7', 2, 1),
(34, '7JV4B2TBWFSG', 4000, '3', '', '7', 2, 1),
(35, 'PDVVAN0BZRQL', 4000, '3', '', '7', 2, 1),
(36, 'TKCMIOQLYTRZ', 4000, '3', '', '7', 2, 1),
(37, 'YBXKW7M1ZNOU', 4000, '3', '', '7', 2, 1),
(38, '5J31GX2QSNWV', 4000, '3', '', '', 2, 0),
(39, 'ROVDFZBDRK5M', 6000, '3', '', '9', 2, 1),
(40, 'PXMPES1VQJGO', 6000, '3', '', '8', 2, 1),
(41, 'DDX5SUUNFZT0', 6000, '3', '', '8', 2, 1),
(42, 'N8SDWOT1AZG3', 6000, '3', '', '9', 2, 1),
(43, 'SWAWBRLRJSAZ', 6000, '3', '', '', 2, 0),
(44, 'QEUHRJPGDVUW', 6000, '3', '', '', 2, 0),
(45, 'INGQUWU85ZPG', 6000, '3', '', '', 2, 0),
(46, 'F90ZE1BQ4AV8', 6000, '3', '', '9', 2, 1),
(47, 'NKDVAHLRXBQA', 6000, '3', '', '', 2, 0),
(48, 'KNBA7HACEGSM', 6000, '3', '', '10', 2, 1),
(49, 'FNMRHOYZQIGZ', 200, '5', '', '6', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `daycheck`
--

CREATE TABLE `daycheck` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `usr_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daycheck`
--

INSERT INTO `daycheck` (`id`, `date`, `usr_id`, `status`) VALUES
(1, '2020-12-14', 1, 0),
(2, '2020-12-17', 1, 0),
(3, '2022-01-16', 5, 0),
(4, '2022-01-16', 3, 0),
(5, '2022-01-16', 0, 0),
(6, '2022-01-17', 5, 0),
(7, '2022-01-17', 3, 0),
(8, '2022-01-17', 0, 0),
(9, '2022-01-17', 6, 0),
(10, '2022-01-18', 0, 0),
(11, '2022-01-18', 3, 0),
(12, '2022-01-18', 6, 0),
(13, '2022-01-19', 6, 0),
(14, '2022-01-19', 7, 0),
(15, '2022-01-21', 7, 0),
(16, '2022-01-21', 0, 0),
(17, '2022-01-21', 6, 0),
(18, '2022-01-21', 3, 0),
(19, '2022-01-21', 9, 0),
(20, '2022-01-21', 8, 0),
(21, '2022-01-21', 10, 0),
(22, '2022-01-21', 12, 0),
(23, '2022-01-24', 7, 0),
(24, '2022-01-29', 7, 0),
(25, '2022-01-30', 7, 0),
(26, '2022-01-31', 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `day_counter`
--

CREATE TABLE `day_counter` (
  `id` int(11) NOT NULL,
  `day_status` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `expdt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `day_counter`
--

INSERT INTO `day_counter` (`id`, `day_status`, `user_id`, `date`, `expdt`) VALUES
(59, 1, 7, '2022-01-30 02:42:25', '2022-01-31 02:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `investment`
--

CREATE TABLE `investment` (
  `id` int(11) NOT NULL,
  `investment_name` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `roi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investment`
--

INSERT INTO `investment` (`id`, `investment_name`, `amount`, `roi`) VALUES
(1, 'VIP 1', '5000', 50),
(2, 'VIP 2', '10000', 55),
(3, 'VIP 3', '30000', 60);

-- --------------------------------------------------------

--
-- Table structure for table `investment_list`
--

CREATE TABLE `investment_list` (
  `id` int(20) NOT NULL,
  `invst_name` varchar(100) NOT NULL,
  `roi` varchar(11) NOT NULL,
  `minimum` varchar(11) NOT NULL,
  `type` int(5) NOT NULL,
  `type_2` int(100) NOT NULL,
  `duration` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `investment_list`
--

INSERT INTO `investment_list` (`id`, `invst_name`, `roi`, `minimum`, `type`, `type_2`, `duration`) VALUES
(1, 'Basic', '60', '10000', 2, 0, '6'),
(2, 'Delux', '60', '20000', 2, 40, '1'),
(3, 'Executive', '60', '30000', 2, 2, '12'),
(4, 'steady', '90', '1000', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `joinedclan`
--

CREATE TABLE `joinedclan` (
  `id` int(11) NOT NULL,
  `clanId` varchar(30) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `datejoined` int(20) NOT NULL,
  `queue_no` int(11) NOT NULL,
  `clan_wallet` int(11) NOT NULL,
  `ref` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `joinedclan`
--

INSERT INTO `joinedclan` (`id`, `clanId`, `usr_id`, `datejoined`, `queue_no`, `clan_wallet`, `ref`) VALUES
(1, 'IEHI527SVW4K', 2, 1602034847, 0, 0, ''),
(2, '06KKYAQPOSWF', 1, 1604417830, 0, 0, ''),
(3, 'ACHSKUBSZROJ', 1, 1604417855, 0, 0, ''),
(4, 'A0GITKFJ1YU9', 1, 1604417893, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `myinvestment`
--

CREATE TABLE `myinvestment` (
  `id` int(11) NOT NULL,
  `capital` int(100) NOT NULL,
  `presentAmount` int(100) NOT NULL,
  `invst_id` int(10) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `dayCount` int(11) NOT NULL,
  `expectedTotal` int(100) NOT NULL,
  `roiExpect` int(11) NOT NULL,
  `profitcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `myinvestment`
--

INSERT INTO `myinvestment` (`id`, `capital`, `presentAmount`, `invst_id`, `usr_id`, `date`, `dayCount`, `expectedTotal`, `roiExpect`, `profitcount`) VALUES
(1, 30000, 1200, 3, 1, '2020-06-16', 2, 48000, 18000, 2),
(2, 20000, 800, 2, 1, '2020-12-08', 2, 32000, 12000, 0),
(3, 10000, 400, 1, 1, '2020-12-08', 2, 16000, 6000, 0),
(4, 30000, 1200, 3, 1, '2020-12-08', 2, 48000, 18000, 0),
(5, 10000, 0, 1, 2, '2020-12-09', 0, 16000, 6000, 0),
(6, 10000, 0, 1, 2, '2020-12-09', 0, 16000, 6000, 0),
(7, 30000, 0, 3, 3, '2020-12-09', 0, 48000, 18000, 0),
(8, 20000, 0, 2, 3, '2020-12-09', 0, 32000, 12000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `overflow`
--

CREATE TABLE `overflow` (
  `id` int(11) NOT NULL,
  `sumit` int(11) NOT NULL,
  `datenow` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `overflow`
--

INSERT INTO `overflow` (`id`, `sumit`, `datenow`) VALUES
(1, 150, 1600959257),
(2, 150, 1600959258),
(3, 150, 1601833489),
(4, 150, 1601833489),
(5, 150, 1601833489),
(6, 150, 1601835156),
(7, 150, 1601835156),
(8, 150, 1601838114),
(9, 150, 1601838114),
(10, 150, 1601838159),
(11, 150, 1601838159);

-- --------------------------------------------------------

--
-- Table structure for table `paymenttrans`
--

CREATE TABLE `paymenttrans` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `tx_ref` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `time` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(1) NOT NULL,
  `Expiry_Temporary` varchar(50) NOT NULL,
  `Expiry_Permanent` varchar(50) NOT NULL,
  `govname` varchar(200) NOT NULL,
  `schoolname` text CHARACTER SET latin1 NOT NULL,
  `schooladdress` text CHARACTER SET latin1 NOT NULL,
  `schoolurl` text CHARACTER SET latin1 NOT NULL,
  `schoolacronym` varchar(50) CHARACTER SET latin1 NOT NULL,
  `supportemail` varchar(200) CHARACTER SET latin1 NOT NULL,
  `supportphone` varchar(66) CHARACTER SET latin1 NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `Expiry_Temporary`, `Expiry_Permanent`, `govname`, `schoolname`, `schooladdress`, `schoolurl`, `schoolacronym`, `supportemail`, `supportphone`, `date`) VALUES
(1, '5 Week', '3 Year', 'Ekiti State Government', 'Ekiti State Internal Revenue Service', 'Ado Ekiti, Ekiti State', 'http://www.ekris.com', 'EKIRS', 'support@ekirs.com', '08055526202,08034815117', '2020-01-11 16:07:36');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `date_created` int(20) NOT NULL,
  `date_modified` int(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `amount` int(20) NOT NULL,
  `transid` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `usr_id`, `date_created`, `date_modified`, `status`, `amount`, `transid`, `type`) VALUES
(1, 1, 1607429817, 1607429817, 'You withdraw 9000 to central wallet', 9000, '', ''),
(2, 1, 1607429848, 1607429848, 'You withdraw 39000 to central wallet', 39000, '', ''),
(3, 1, 1607431847, 0, 'You funded your wallet', 100000, '', ''),
(4, 2, 1607500807, 0, 'You funded your wallet', 100000, '', ''),
(5, 3, 1607510912, 0, 'You funded your wallet', 100000, '', ''),
(6, 5, 1642357682, 0, 'You funded your wallet', 5000, '', ''),
(7, 3, 1642360256, 0, 'You funded your wallet', 10000, '', ''),
(8, 3, 1642360973, 0, 'You funded your wallet', 10000, '', ''),
(9, 5, 1642368377, 0, 'You funded your wallet', 7500, '', ''),
(10, 3, 1642414232, 0, 'You funded your wallet', 333333, '', ''),
(11, 3, 1642414468, 0, 'You funded your wallet', 9850, '', ''),
(12, 3, 1642414536, 0, 'You funded your wallet', 46700, '', ''),
(13, 3, 1642417729, 0, 'You funded your wallet', 14000, '', ''),
(14, 3, 1642417842, 0, 'You funded your wallet', 15600, '', ''),
(15, 6, 1642450401, 0, 'You funded your wallet', 2300, '', ''),
(16, 6, 1642452537, 0, 'You funded your wallet', 2147483647, '', ''),
(17, 7, 1642625479, 0, 'You funded your wallet', 34500, '', ''),
(18, 7, 1642766250, 0, 'You funded your wallet', 3000, '', ''),
(19, 7, 1642766279, 0, 'You funded your wallet', 7500, '', ''),
(20, 7, 1642766612, 0, 'You funded your wallet', 7500, '', ''),
(21, 7, 1642766672, 0, 'You funded your wallet', 1500, '', ''),
(22, 7, 1642766734, 0, 'You funded your wallet', 30000, '', ''),
(23, 7, 1642766821, 0, 'You funded your wallet', 5000, '', ''),
(24, 7, 1642767380, 0, 'You funded your wallet', 1350, '', ''),
(25, 7, 1642767866, 0, 'You funded your wallet', 3456, '', ''),
(26, 7, 1642767912, 0, 'You funded your wallet', 3456, '', ''),
(27, 7, 1642768019, 0, 'You funded your wallet', 34500, '', ''),
(28, 7, 1642768270, 0, 'You funded your wallet', 4000, '', ''),
(29, 7, 1642768445, 0, 'You funded your wallet', 4000, '', ''),
(30, 7, 1642768491, 0, 'You funded your wallet', 4000, '', ''),
(31, 7, 1642768512, 0, 'You funded your wallet', 4000, '', ''),
(32, 9, 1642768769, 0, 'You funded your wallet', 6000, '', ''),
(33, 8, 1642769871, 0, 'You funded your wallet', 6000, '', ''),
(34, 8, 1642769902, 0, 'You funded your wallet', 6000, '', ''),
(35, 9, 1642769992, 0, 'You funded your wallet', 6000, '', ''),
(36, 9, 1642770033, 0, 'You funded your wallet', 6000, '', ''),
(37, 10, 1642774249, 0, 'You funded your wallet', 6000, '', ''),
(38, 6, 1642800271, 0, 'You funded your wallet', 200, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `myrefid` varchar(12) NOT NULL,
  `upline` varchar(12) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `othernames` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `role_id` int(11) NOT NULL,
  `slots` int(2) NOT NULL DEFAULT 3,
  `wallets` int(13) NOT NULL,
  `TRON` varchar(120) NOT NULL,
  `referralwallet` int(11) NOT NULL,
  `wallet_fund_status` int(11) NOT NULL,
  `date_created` text NOT NULL,
  `date_modified` datetime NOT NULL,
  `first_failed_login` int(11) NOT NULL,
  `failed_login_count` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `myrefid`, `upline`, `surname`, `othernames`, `password`, `email`, `phoneno`, `address`, `role_id`, `slots`, `wallets`, `TRON`, `referralwallet`, `wallet_fund_status`, `date_created`, `date_modified`, `first_failed_login`, `failed_login_count`) VALUES
(1, 'AB', '1', 'Akinbo', 'Eleazar Olumuyiwa', 'p4sP0WFpl6MhLj%3Q%3Q', 'jesusboyonline@gmail.com', '08138209953', '', 1, 3, 889000, '3112275665', 72000, 0, '', '0000-00-00 00:00:00', 0, 0),
(2, 'WRDNLXUOV4YD', 'MN%3Q%3Q', 'Adeleke', 'Samuel', 'p4sP0WFpl6MhLj%3Q%3Q', 'adeolamary10@gmail.com', '090940122222', '', 2, 3, 80000, '', 20, 0, '', '0000-00-00 00:00:00', 0, 0),
(3, 'PITTYPEA45CY', 'AB', 'AKinlade', 'JOSIAH ', 'qW%2SX0KSua3Wh', 'josiahakinlade@gmail.com', '09068263747', '', 2, 3, 283571, '2111748020', 0, 0, '', '0000-00-00 00:00:00', 0, 0),
(4, '', '', 'Akinbo', 'Samuel', 'ccKP', 'opportunitycaster@gmail.com', '09037132665', '', 2, 3, 0, '', 0, 0, '', '0000-00-00 00:00:00', 0, 0),
(5, 'ROPKIHFX3YFW', 'WRDNLXUOV4YD', 'seun', 'ayo', 'wXCJ0Mvq1nrnd2gyrD%3Q%3Q', 'seunayo@gmail.com', '08136149462', '', 1, 3, 12500, '', 0, 0, '', '0000-00-00 00:00:00', 0, 0),
(6, 'R5WLYU0HMLRP', 'WRDNLXUOV4YD', 'dwekfwrfrfr', 'wedwee', 'wXCJ0Mvq1nrnd2gyrD%3Q%3Q', 'ab@gmail.com', '+2347037886510', '', 0, 3, 13579, '4t45tetger', 1200, 1, '', '0000-00-00 00:00:00', 0, 0),
(7, 'FM1PYTWH4SEK', 'R5WLYU0HMLRP', 'ujiji', 'uu', 'MTnHy2MzaKR%3Q', 'uu@gmail.com', '08136149463', '', 0, 3, 501962, 'gfhhm56865874kumfhfhyryry5764ut', 0, 0, '', '0000-00-00 00:00:00', 0, 0),
(8, 'XSGWEEOYYBLD', 'R5WLYU0HMLRP', 'ewdfwef', 'wede', 'MTnHy2MzaD%3Q%3Q', 'az@gmail.com', '08136149464', '', 0, 3, 12000, '', 0, 1, '', '0000-00-00 00:00:00', 0, 0),
(9, 'FHUUZZE9S4CE', 'R5WLYU0HMLRP', 'fwerrecvcssd', 'xcdssdcsdc', 'MTnHy2MzaKR%3Q', 'op@gmail.com', '323432423423', '', 0, 3, 0, '234342455', 0, 1, '', '0000-00-00 00:00:00', 0, 0),
(10, 'N7AOKLLGTXSB', 'R5WLYU0HMLRP', 'eeew', 'dcwec', 'MTnHy2MzaKR%3Q', 'lo@gmail.com', '245534535', '', 0, 3, 6332, '', 0, 1, '', '0000-00-00 00:00:00', 0, 0),
(11, 'VN5C0GY1WGZN', 'R5WLYU0HMLRP', 'svdvsd', 'sdvcsd', 'MTnHy2MzaKR%3Q', 'kl@gmail.com', '1343432', '', 0, 3, 0, '', 0, 0, '', '0000-00-00 00:00:00', 0, 0),
(12, 'F7GLQTB3PLKY', 'R5WLYU0HMLRP', 'sffrfrv', 'vsvf', 'MTnHy2MzaD%3Q%3Q', 'lcv@gmail.com', '123425367568', '', 0, 3, 11013, '', 0, 0, '', '0000-00-00 00:00:00', 0, 0),
(13, 'IGHHSWQOXYJ5', 'R5WLYU0HMLRP', 'dcdc', 'cds', 'MTnHy2L%3Q', 'ml@g.com', '2313121', '', 0, 3, 10000, '', 0, 0, '', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `withdraw`
--

CREATE TABLE `withdraw` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `usr_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `dateadded` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `withdraw`
--

INSERT INTO `withdraw` (`id`, `amount`, `usr_id`, `status`, `dateadded`) VALUES
(1, 10000, 1, 1, '2020-12-08'),
(2, 10000, 1, 0, '2020-12-08'),
(3, 50000, 3, 1, '2020-12-09'),
(4, 18000, 9, 1, '2022-01-21'),
(5, 1000, 7, 1, '2022-01-24'),
(6, 1000, 7, 1, '2022-01-24'),
(7, 1000, 7, 0, '2022-01-24'),
(8, 10000, 7, 0, '2022-01-24'),
(9, 10000, 7, 0, '2022-01-24'),
(10, 10000, 7, 0, '2022-01-24'),
(11, 10000, 7, 0, '2022-01-24'),
(12, 8000, 7, 0, '2022-01-24'),
(13, 0, 7, 0, '2022-01-24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `clan`
--
ALTER TABLE `clan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clan_refer`
--
ALTER TABLE `clan_refer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `daycheck`
--
ALTER TABLE `daycheck`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `day_counter`
--
ALTER TABLE `day_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment`
--
ALTER TABLE `investment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment_list`
--
ALTER TABLE `investment_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `joinedclan`
--
ALTER TABLE `joinedclan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `myinvestment`
--
ALTER TABLE `myinvestment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overflow`
--
ALTER TABLE `overflow`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymenttrans`
--
ALTER TABLE `paymenttrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `staffid` (`myrefid`,`email`,`phoneno`);

--
-- Indexes for table `withdraw`
--
ALTER TABLE `withdraw`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `sn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `clan`
--
ALTER TABLE `clan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `clan_refer`
--
ALTER TABLE `clan_refer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `daycheck`
--
ALTER TABLE `daycheck`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `day_counter`
--
ALTER TABLE `day_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `investment`
--
ALTER TABLE `investment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `investment_list`
--
ALTER TABLE `investment_list`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `joinedclan`
--
ALTER TABLE `joinedclan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `myinvestment`
--
ALTER TABLE `myinvestment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `overflow`
--
ALTER TABLE `overflow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `paymenttrans`
--
ALTER TABLE `paymenttrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `withdraw`
--
ALTER TABLE `withdraw`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
