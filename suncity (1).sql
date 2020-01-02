-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2020 at 06:26 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suncity`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_ID` int(11) NOT NULL,
  `cus_Name` varchar(50) NOT NULL,
  `cus_NIC` varchar(15) NOT NULL,
  `loyalty_card_no` varchar(10) NOT NULL,
  `date_of_birth` date NOT NULL,
  `cus_address` varchar(200) NOT NULL,
  `cus_mobile` varchar(10) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cus_ID`, `cus_Name`, `cus_NIC`, `loyalty_card_no`, `date_of_birth`, `cus_address`, `cus_mobile`, `cus_email`, `cus_status`) VALUES
(1, 'Kasun', '932861330V', '', '0000-00-00', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'del'),
(2, 'Kasun', '932861330V', '', '0000-00-00', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'del'),
(3, 'Kasun', '932861330V', '', '0000-00-00', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'del'),
(4, 'Kasun', '932861330V', '227853706', '1993-10-12', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'act'),
(5, 'Sandun', '925860000V', '', '0000-00-00', 'Colombo', '0713554422', 'sadur@gmail.com', 'del'),
(6, 'Kasun', '932861330V', '0000012345', '1993-10-12', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'del'),
(7, 'Kasun', '932861330V', '0000012345', '1993-10-12', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'act'),
(8, 'Charith', '200032331V', '0000011224', '2000-02-25', 'Colombo', '0713554422', 'richath.charrrith@gmail.com', 'act'),
(9, 'Pasindu', '960000448V', '0000013875', '1996-01-31', 'Colombo', '0713554488', 'pasindu@gmail.com', 'act'),
(11, 'Janana', '200031324V', '0000011342', '2000-01-28', 'Colombo', '0713554433', 'janana@gmail.com', 'act'),
(12, 'Sajeewaka', '942000000V', '0000044651', '1994-01-26', 'Colombo', '0777777223', 'sajeewaka@live.com', 'act'),
(13, 'Isuru', '930323311V', '034024718', '1993-05-01', 'Kegalle', '0777766223', 'isuru@gmail.com', 'act'),
(14, 'Sandun', '920000123V', '000055725', '1992-10-08', 'Colombo', '0777777223', 'sadur@gmail.com', 'act'),
(15, 'Kasun', '199328601330', '535643338', '1993-10-12', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'act'),
(16, 'Charith', '200031324V', '689166466', '2000-02-25', 'Colombo', '0777777223', 'kasun.disanayake@gmail.com', 'act');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `drg_id` int(11) NOT NULL,
  `drg_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `marketer` varchar(100) NOT NULL,
  `description` varchar(300) DEFAULT NULL,
  `drug_status` varchar(6) NOT NULL DEFAULT 'act',
  `catid` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`drg_id`, `drg_name`, `brand_name`, `manufacturer`, `marketer`, `description`, `drug_status`, `catid`) VALUES
(1, 'Aripiprazole', 'ARIP MT', 'TORRENT PHARMACEUTICALS LTD', 'EONA', 'Do not give without receipt.', 'act', '8'),
(2, 'Fluoxetine', 'Fluoxetine', 'SPC', 'SPC', 'Do not give without receipt.', 'act', '8'),
(3, 'Aripiprazole', 'ARIP MT', 'Hemas', '', 'kkkkk', 'del', '8'),
(4, 'Paracitol', 'Penadol', 'Hemas', '', 'Good for headache.', 'del', '5'),
(5, 'Lacto', 'Lacto', 'Hemas', '', 'good for rashes in skin.', 'del', '6'),
(6, 'Paracitol', 'Paracitol', 'SPC', '', 'fsfvvsf', 'del', '5'),
(7, 'Aripiprazole', 'ARIP MT', 'Hemas', '', 'good', 'del', '5'),
(11, 'Lacto', 'ARIP MT', 'Hemas', '', 'kkkkkiiiiiii', 'del', '6'),
(12, 'Vitamin C', 'Vitamin C', 'Hemas', '', 'Good', 'del', '11'),
(13, 'Sildenafil Citrate Tablets', 'ENOGRA-100', 'ZIM Laboratories Limited', 'Tabrane Pharmaceuticals (Pvt) Ltd', 'Do not give without receipt.', 'act', '8'),
(14, 'Aripiprazole', 'Arizole', 'ATOZ Pharmaceuticals Pvt. Ltd.', 'EURO ASIAN PHARMACY', 'Do not give without receipt.', 'del', '8');

-- --------------------------------------------------------

--
-- Table structure for table `drugs_category`
--

CREATE TABLE `drugs_category` (
  `catid` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `cat_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drugs_category`
--

INSERT INTO `drugs_category` (`catid`, `cat_name`, `cat_status`) VALUES
(1, 'drugs', 'del'),
(2, 'drugs', 'del'),
(3, '99', 'del'),
(4, 'grocery items', 'del'),
(5, 'Pain killers', 'act'),
(6, 'creams', 'act'),
(7, 'creams', 'del'),
(8, 'normal drugs', 'act'),
(9, 'Barms', 'del'),
(10, 'Pain killers', 'del'),
(11, 'Vitamins', 'act');

-- --------------------------------------------------------

--
-- Table structure for table `drug_product`
--

CREATE TABLE `drug_product` (
  `pro_id` int(11) NOT NULL,
  `drg_name` varchar(100) NOT NULL,
  `pk_size` varchar(5) NOT NULL,
  `no_of_pks` varchar(5) NOT NULL,
  `batch_no` varchar(20) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `manufacture_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `un_price` double NOT NULL,
  `sl_price` double NOT NULL,
  `cost` double NOT NULL,
  `pro_status` varchar(6) NOT NULL DEFAULT 'act',
  `grn_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drug_product`
--

INSERT INTO `drug_product` (`pro_id`, `drg_name`, `pk_size`, `no_of_pks`, `batch_no`, `weight`, `manufacture_date`, `expire_date`, `un_price`, `sl_price`, `cost`, `pro_status`, `grn_id`) VALUES
(1, '1', '10', '15', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 12),
(2, '1', '10', '16', '', '', '0000-00-00', '0000-00-00', 2, 5, 1, 'act', 13),
(3, '2', '20', '25', '', '', '0000-00-00', '0000-00-00', 5, 10, 0, 'act', 13),
(4, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 14),
(5, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 14),
(6, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 15),
(7, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 15),
(8, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 16),
(9, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 16),
(10, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 17),
(11, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 17),
(12, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 18),
(13, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 18),
(14, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 19),
(15, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 19),
(16, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 20),
(17, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 20),
(18, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 21),
(19, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 21),
(20, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 22),
(21, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 22),
(22, '1', '10', '21', '', '', '0000-00-00', '0000-00-00', 1, 2, 1, 'act', 23),
(23, '2', '22', '30', '', '', '0000-00-00', '0000-00-00', 15, 20, 0, 'act', 23),
(24, '2', '10', '10', '', '', '0000-00-00', '0000-00-00', 11, 22, 1100, 'act', 24),
(25, '2', '10', '10', '', '', '0000-00-00', '0000-00-00', 11, 22, 1100, 'act', 25),
(26, '13', '40', '10', 'FK70K802', '100mg', '2018-10-01', '2021-09-01', 45, 50, 18000, 'act', 26),
(27, '13', '40', '10', 'FK70K802', '100mg', '2018-10-01', '2021-09-01', 40, 50, 16000, 'act', 27),
(28, '13', '40', '10', 'FK70K802', '100mg', '2018-10-01', '2021-09-01', 40, 50, 16000, 'act', 27),
(29, '1', '30', '15', 'C144E001', 'mg15', '2019-07-01', '2020-07-01', 500, 23.77, 7500, 'act', 28),
(30, '13', '30', '10', 'C144E001', 'mg50', '2019-06-16', '2022-08-16', 2.75, 3.5, 825, 'act', 29),
(31, '1', '30', '10', 'C144E001', 'mg15', '2019-07-15', '2021-07-15', 500, 23.77, 5000, 'act', 30),
(32, '1', '100', '10', 'C144E001', 'mg15', '2019-12-09', '2022-12-09', 400, 23.77, 4000, 'act', 32),
(33, '1', '100', '10', 'C144E001', 'mg15', '2019-12-09', '2022-12-09', 400, 23.77, 4000, 'act', 33),
(34, '1', '100', '10', 'C144E0011', '15mg', '2019-11-01', '2019-12-30', 300, 23, 3000, 'act', 34),
(35, '1', '100', '10', 'ftftfutfvuv', '15mg', '2019-10-04', '2019-12-30', 300, 23, 3000, 'act', 35),
(36, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'act', 35),
(37, '1', '100', '10', 'C144E001', '15mg', '2019-11-01', '2019-12-30', 300, 23, 3000, 'act', 36),
(38, '', '', '', '', '', '0000-00-00', '0000-00-00', 0, 0, 0, 'act', 36),
(39, '1', '100', '10', 'C144E001', 'mg20', '2019-12-30', '2019-12-30', 300, 23, 3000, 'act', 38),
(40, '2', '100', '10', 'ftftfutfvuv', 'mg20', '2019-12-30', '2019-12-30', 250, 3, 2500, 'act', 38),
(41, '1', '100', '10', 'C144E001', 'mg20', '2019-12-30', '2021-12-01', 300, 23, 3000, 'act', 39),
(42, '2', '100', '5', 'ftftfutfvuv', 'mg20', '2019-12-30', '2022-12-30', 250, 3, 1250, 'act', 39),
(43, '1', '100', '5', 'C144E001', '15mg', '2019-12-31', '2021-12-31', 300, 24, 1500, 'act', 40),
(44, '13', '20', '5', 'gdhh12', '50mg', '2019-11-01', '2021-11-01', 200, 30, 1000, 'act', 41);

-- --------------------------------------------------------

--
-- Table structure for table `grn`
--

CREATE TABLE `grn` (
  `grn_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ref_no` varchar(10) NOT NULL,
  `sup_id` int(11) NOT NULL,
  `total_cost` double NOT NULL,
  `grn_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grn`
--

INSERT INTO `grn` (`grn_id`, `date`, `ref_no`, `sup_id`, `total_cost`, `grn_status`) VALUES
(12, '2019-07-23 18:30:00', '0000000001', 1, 10000, 'act'),
(13, '2019-07-23 18:30:00', '0000000001', 1, 10000, 'act'),
(14, '2019-07-23 18:30:00', '0000000002', 1, 10000, 'act'),
(15, '2019-07-23 18:30:00', '0000000002', 1, 10000, 'act'),
(16, '2019-07-23 18:30:00', '0000000002', 1, 10000, 'act'),
(17, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(18, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(19, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(20, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(21, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(22, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(23, '2019-07-23 18:30:00', '0000000002', 1, 0, 'act'),
(24, '2019-07-23 18:30:00', '0000000001', 1, 10000, 'act'),
(25, '2019-07-23 18:30:00', '0000000001', 1, 10000, 'act'),
(26, '2019-07-29 18:30:00', '0000000003', 1, 18000, 'act'),
(27, '2019-07-29 18:30:00', '0000000003', 1, 16000, 'act'),
(28, '2019-08-14 18:30:00', '0000000004', 1, 7500, 'act'),
(29, '2019-08-16 07:46:18', '0000000022', 1, 825, 'act'),
(30, '2019-08-26 07:04:50', '0000000005', 2, 5000, 'act'),
(31, '2019-12-09 09:46:59', '0123344558', 1, 0, 'act'),
(32, '2019-12-09 09:49:15', '0125544448', 1, 4000, 'act'),
(33, '2019-12-09 09:50:17', 'mlkmklm', 1, 4000, 'act'),
(34, '2019-12-30 11:14:17', '1111444488', 2, 3000, 'act'),
(35, '2019-12-30 11:17:00', '0000012486', 1, 5500, 'act'),
(36, '2019-12-30 11:20:28', '0123344558', 1, 5000, 'act'),
(37, '2019-12-30 11:34:52', '561651465', 1, 0, 'act'),
(38, '2019-12-30 11:36:55', '4556122344', 1, 5500, 'act'),
(39, '2019-12-30 11:39:51', '0000555554', 1, 4250, 'act'),
(40, '2019-12-31 06:27:03', '1122554488', 2, 1500, 'act'),
(41, '2019-12-31 06:38:47', '0000011144', 2, 1000, 'act');

-- --------------------------------------------------------

--
-- Table structure for table `grocery_items`
--

CREATE TABLE `grocery_items` (
  `git_id` int(11) NOT NULL,
  `git_name` varchar(100) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `marketer` varchar(100) NOT NULL,
  `description` varchar(300) NOT NULL,
  `price` double NOT NULL,
  `git_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grocery_items`
--

INSERT INTO `grocery_items` (`git_id`, `git_name`, `brand_name`, `manufacturer`, `marketer`, `description`, `price`, `git_status`) VALUES
(1, 'Plaster', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Antibacterial Plaster', 85, 'act'),
(2, 'Soap', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Good', 50, 'del'),
(3, 'Hand Wash', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Good', 80, 'act'),
(4, 'Liquid', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Good', 100, 'act'),
(5, 'Spray', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Good', 150, 'act'),
(6, 'Hand Wash', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Good', 80, 'act'),
(7, 'Soap', 'Dettol', 'Varun Medimpex Inc', 'Reckitt Benckiser (Lanka) Ltd', 'Good', 50, 'act');

-- --------------------------------------------------------

--
-- Table structure for table `items_return`
--

CREATE TABLE `items_return` (
  `return_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `pos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items_return`
--

INSERT INTO `items_return` (`return_id`, `date`, `pos_id`) VALUES
(1, '2019-11-25 10:28:52', 37),
(2, '2019-11-25 10:29:07', 37),
(3, '2019-11-25 10:29:19', 37),
(4, '2019-11-25 10:38:16', 37),
(5, '2019-11-25 10:39:15', 37),
(6, '2019-11-25 10:43:44', 0),
(7, '2019-11-25 10:47:45', 0),
(8, '2019-11-25 10:49:17', 0),
(9, '2019-11-25 11:13:59', 37),
(10, '2019-11-25 11:17:42', 37),
(11, '2019-12-16 08:09:21', 43),
(12, '2019-12-16 08:58:53', 45),
(13, '2019-12-16 09:11:11', 46),
(14, '2019-12-16 09:15:45', 47),
(15, '2019-12-16 09:19:10', 48),
(16, '2019-12-16 09:22:20', 48),
(17, '2019-12-16 09:26:20', 49),
(18, '2019-12-16 09:38:58', 50),
(19, '2019-12-16 10:03:16', 52),
(20, '2019-12-30 10:07:39', 70),
(21, '2019-12-30 10:10:10', 69),
(22, '2019-12-30 10:15:12', 68),
(23, '2019-12-30 11:00:25', 67);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `offer_id` int(11) NOT NULL,
  `it_name` int(100) NOT NULL,
  `discount` int(10) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`offer_id`, `it_name`, `discount`, `start_date`, `end_date`) VALUES
(1, 1, 50, '2019-11-03', '2019-11-17'),
(2, 1, 50, '2019-11-03', '2019-11-17'),
(3, 1, 0, '2019-12-07', '2019-12-21'),
(4, 1, 0, '2019-12-16', '2019-12-30'),
(5, 1, 0, '2019-12-17', '2019-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `online_sold_items`
--

CREATE TABLE `online_sold_items` (
  `osi_id` int(11) NOT NULL,
  `it_id` int(11) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_address` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `online_sold_items`
--

INSERT INTO `online_sold_items` (`osi_id`, `it_id`, `qty`, `c_name`, `c_address`, `c_mobile`) VALUES
(1, 1, '2', '', '', ''),
(2, 1, '1', '', '', ''),
(3, 1, '1', 'Kasun', 'Kandy', '0757288142'),
(4, 1, '1', 'Kasun', 'Kandy', '0757288142'),
(5, 5, '1', 'Kasun', 'Kandy', '0757288142');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `pid` int(11) NOT NULL,
  `points` varchar(1000) NOT NULL,
  `pos_id` int(11) NOT NULL,
  `cus_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`pid`, `points`, `pos_id`, `cus_ID`) VALUES
(1, '0.12691', 33, 15),
(2, '-0.12691', 34, 15),
(3, '1.176615', 35, 15),
(4, '-1.176615', 36, 15),
(5, '0.2275', 37, 0),
(6, '', 38, 0),
(7, '', 39, 0),
(8, '0.359975', 40, 15),
(9, '0.065975', 41, 14),
(10, '0.508085', 42, 13),
(11, '0.3885', 43, 0),
(12, '', 44, 0),
(13, '0.516', 45, 15),
(14, '0.11885', 46, 15),
(15, '0.178275', 47, 15),
(16, '0.2377', 48, 15),
(17, '0.297125', 49, 15),
(18, '594.25', 17, 15),
(19, '0.11885', 50, 0),
(20, '237.7', 18, 0),
(21, '-595.957925', 51, 15),
(22, '1.1885', 52, 15),
(23, '2377', 19, 15),
(24, '-2378.1885', 53, 15),
(25, '1.1885', 54, 0),
(26, '1.1885', 55, 15),
(27, '2.0262', 56, 15),
(28, '-3.214699999999', 57, 15),
(29, '5.9425', 58, 15),
(30, '-5.942500000000', 59, 15),
(31, '0.035655', 60, 0),
(32, '', 61, 0),
(33, '0.035655', 62, 0),
(34, '0.03885', 63, 0),
(35, '0.035655', 64, 0),
(36, '0.03885', 65, 0),
(37, '0.24425', 66, 0),
(38, '0.16885', 67, 0),
(39, '0.1295', 68, 0),
(40, '0.225775', 69, 0),
(41, '0.13385', 70, 0),
(42, '237.7', 20, 0),
(43, '356.55', 21, 0),
(44, '259', 22, 0),
(45, '337.7', 23, 0),
(46, '-0.000000000000', 71, 15),
(47, '-0.000000000000', 72, 15),
(48, '-0.0000000000009992007221626409', 73, 15),
(49, '0.03885', 74, 0);

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `pos_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `operator` varchar(50) NOT NULL,
  `tot_amount` double NOT NULL,
  `tot_discount` double NOT NULL,
  `sub_tot` double NOT NULL,
  `net_tot` int(11) NOT NULL,
  `pos_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`pos_id`, `date`, `operator`, `tot_amount`, `tot_discount`, `sub_tot`, `net_tot`, `pos_status`) VALUES
(1, '2019-08-15 10:44:35', 'Kasun', 5.5, 0, 5.5, 0, 'act'),
(2, '2019-08-15 10:44:35', 'Kasun', 5.5, 0, 5.5, 0, 'act'),
(3, '2019-08-15 10:44:35', 'Kasun', 5.5, 0, 5.5, 0, 'act'),
(4, '2019-08-15 10:53:54', 'Kasun', 63.9, 0, 63.9, 0, 'act'),
(5, '2019-08-15 10:55:26', 'Kasun', 63.9, 0, 63.9, 0, 'act'),
(6, '2019-08-15 10:57:33', 'Kasun', 50, 0, 50, 0, 'act'),
(7, '2019-08-16 07:40:42', '', 113.9, 2.5, 111.4, 0, 'act'),
(8, '2019-08-16 07:42:49', '', 113.9, 2.5, 111.4, 0, 'act'),
(9, '2019-09-16 10:01:02', '', 237.7, 0, 237.7, 0, 'act'),
(10, '2019-09-16 10:02:44', '', 237.7, 0, 237.7, 0, 'act'),
(11, '2019-09-16 10:05:12', '', 21.3, 0, 21.3, 0, 'act'),
(12, '2019-09-16 10:07:22', '', 237.7, 4.75, 232.95, 0, 'act'),
(13, '2019-09-16 10:09:00', '', 237.7, 4.75, 232.95, 0, 'act'),
(14, '2019-09-16 10:09:44', '', 2000, 0, 2000, 0, 'act'),
(15, '2019-09-16 10:11:29', '', 100, 0, 100, 0, 'act'),
(16, '2019-09-16 10:13:41', '', 100, 0, 100, 0, 'act'),
(17, '2019-09-16 10:13:53', '', 47.54, 0, 47.54, 0, 'act'),
(18, '2019-09-18 08:43:36', '', 0, 0, 0, 0, 'act'),
(19, '2019-09-18 10:21:26', '', 50, 0, 50, 0, 'act'),
(20, '2019-09-18 10:27:30', '', 50, 0, 50, 0, 'act'),
(21, '2019-09-18 10:29:38', '', 140, 0, 140, 0, 'act'),
(22, '2019-09-18 10:30:26', '', 140, 0, 140, 0, 'act'),
(23, '2019-09-18 11:02:07', '', 100, 0, 100, 0, 'act'),
(24, '2019-10-21 10:40:23', '', 525, 9, 516, 0, 'act'),
(25, '2019-10-21 10:47:46', '', 45, 0, 45, 0, 'act'),
(26, '2019-10-21 11:10:34', '', 0, 0, 0, 0, 'act'),
(27, '2019-10-21 11:10:51', '', 0, 0, 0, 0, 'act'),
(28, '2019-10-21 11:11:16', '', 0, 0, 0, 0, 'act'),
(29, '2019-10-21 11:17:38', '', 180, 0, 180, 0, 'act'),
(30, '2019-10-21 11:28:24', '', 30, 0, 30, 0, 'act'),
(31, '2019-10-21 11:31:21', '', 105, 0, 105, 0, 'act'),
(32, '2019-10-28 10:32:58', '', 713.1, 0, 713.1, 0, 'act'),
(33, '2019-11-22 04:49:43', '', 259, 5.18, 253.82, 0, 'act'),
(34, '2019-11-22 04:51:36', '', 356.55, 0, 356.55, 0, 'act'),
(35, '2019-11-22 05:05:04', '', 2377, 23.77, 2353.23, 0, 'act'),
(36, '2019-11-22 05:06:27', '', 2377, 23.77, 2353.23, 0, 'act'),
(37, '2019-11-25 08:52:36', '', 459, 4, 455, 0, 'act'),
(38, '2019-11-27 08:38:16', '', 0, 0, 0, 0, 'act'),
(39, '2019-11-29 18:44:24', '', 0, 0, 0, 0, 'act'),
(40, '2019-11-30 16:06:48', '', 777, 57.05, 719.95, 0, 'act'),
(41, '2019-12-01 05:37:22', '', 131.95, 0, 131.95, 0, 'act'),
(42, '2019-12-01 05:40:09', '', 1069.65, 53.48, 1016.17, 0, 'act'),
(43, '2019-12-09 06:37:33', '', 777, 0, 777, 0, 'act'),
(44, '2019-12-09 08:50:38', '', 0, 0, 0, 0, 'act'),
(45, '2019-12-16 08:43:15', '', 1077, 45, 1032, 0, 'act'),
(46, '2019-12-16 09:09:38', '', 237.7, 0, 237.7, 0, 'act'),
(47, '2019-12-16 09:15:18', '', 356.55, 0, 356.55, 0, 'act'),
(48, '2019-12-16 09:18:47', '', 475.4, 0, 475.4, 0, 'act'),
(49, '2019-12-16 09:26:01', '', 594.25, 0, 594.25, 0, 'act'),
(50, '2019-12-16 09:35:46', '', 237.7, 0, 237.7, 0, 'act'),
(51, '2019-12-16 09:46:55', '', 100, 0, 100, 0, 'act'),
(52, '2019-12-16 10:02:40', '', 2377, 0, 2377, 0, 'act'),
(53, '2019-12-16 10:16:25', '', 100, 0, 100, 0, 'act'),
(54, '2019-12-16 10:19:15', '', 2377, 0, 2377, 0, 'act'),
(55, '2019-12-16 10:20:05', '', 2377, 0, 2377, 0, 'act'),
(56, '2019-12-16 10:21:06', '', 4052.4, 0, 4052.4, 0, 'act'),
(57, '2019-12-16 10:21:52', '', 2.13, 0, 2.13, 0, 'act'),
(58, '2019-12-16 10:34:51', '', 11885, 0, 11885, 0, 'act'),
(59, '2019-12-16 10:35:36', '', 2.13, 0, 2.13, 0, 'act'),
(60, '2019-12-23 10:32:11', '', 71.31, 0, 71.31, 0, 'act'),
(61, '2019-12-23 10:33:00', '', 71.31, 0, 71.31, 0, 'act'),
(62, '2019-12-23 10:33:16', '', 71.31, 0, 71.31, 0, 'act'),
(63, '2019-12-23 10:35:35', '', 77.7, 0, 77.7, 0, 'act'),
(64, '2019-12-25 05:51:43', '', 71.31, 0, 71.31, 0, 'act'),
(65, '2019-12-25 07:00:18', '', 77.7, 0, 77.7, 78, 'act'),
(66, '2019-12-30 09:43:33', '', 488.5, 0, 488.5, 489, 'act'),
(67, '2019-12-30 09:46:59', '', 337.7, 0, 337.7, 338, 'act'),
(68, '2019-12-30 09:48:07', '', 259, 0, 259, 259, 'act'),
(69, '2019-12-30 09:49:47', '', 456.55, 5, 451.55, 452, 'act'),
(70, '2019-12-30 09:57:01', '', 267.7, 0, 267.7, 268, 'act'),
(71, '2019-12-31 08:26:40', '', 6.39, 0, 6.39, 6, 'act'),
(72, '2019-12-31 08:27:31', '', 6.39, 0, 6.39, 6, 'act'),
(73, '2019-12-31 08:29:51', '', 6.39, 0, 6.39, 6, 'act'),
(74, '2020-01-01 09:34:36', '', 77.7, 0, 77.7, 78, 'act');

-- --------------------------------------------------------

--
-- Table structure for table `returned_items`
--

CREATE TABLE `returned_items` (
  `ri_id` int(11) NOT NULL,
  `it_name` varchar(100) NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `amount` varchar(10) NOT NULL,
  `return_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `returned_items`
--

INSERT INTO `returned_items` (`ri_id`, `it_name`, `price`, `quantity`, `amount`, `return_id`) VALUES
(1, '	Aripiprazole', '23.77', '10', '237.7', 6),
(2, 'Fluoxetine', '2.13', '10', '21.3', 6),
(3, 'Vitamin C', '10', '20', '200', 6),
(4, '	Aripiprazole', '23.77', '10', '237.7', 7),
(5, 'Fluoxetine', '2.13', '10', '21.3', 7),
(6, 'Vitamin C', '10', '20', '200', 7),
(7, '	Aripiprazole', '23.77', '10', '237.7', 8),
(8, 'Fluoxetine', '2.13', '10', '21.3', 8),
(9, 'Vitamin C', '10', '20', '200', 8),
(10, '	Aripiprazole', '23.77', '10', '237.7', 9),
(11, '	Aripiprazole', '23.77', '10', '237.7', 10),
(12, 'Fluoxetine', '2.13', '10', '21.3', 10),
(13, 'Fluoxetine', '2.13', '30', '63.9', 11),
(14, 'Aripiprazole', '23.77', '30', '713.1', 11),
(15, 'Aripiprazole', '23.77', '30', '713.1', 12),
(16, 'Aripiprazole', '23.77', '10', '237.7', 13),
(17, 'Aripiprazole', '23.77', '15', '356.55', 14),
(18, 'Aripiprazole', '23.77', '20', '475.4', 15),
(19, 'Aripiprazole', '23.77', '20', '475.4', 16),
(20, 'Aripiprazole', '23.77', '25', '594.25', 17),
(21, 'Aripiprazole', '23.77', '10', '237.7', 18),
(22, 'Aripiprazole', '23.77', '100', '2377', 19),
(23, 'Aripiprazole', '23.77', '15', '356.55', 21),
(24, '78', '2.13', '10', '21.3', 22),
(25, '79', '23.77', '10', '237.7', 22),
(26, '13', '10', '10', '100', 23),
(27, '1', '23.77', '10', '237.7', 23);

-- --------------------------------------------------------

--
-- Table structure for table `salary_details`
--

CREATE TABLE `salary_details` (
  `sid` int(11) NOT NULL,
  `year` varchar(10) NOT NULL,
  `month` varchar(20) NOT NULL,
  `OT` varchar(10) NOT NULL,
  `bonus` varchar(10) NOT NULL,
  `deduction` varchar(10) NOT NULL,
  `usr_ID` int(11) NOT NULL,
  `epf` varchar(20) NOT NULL,
  `etf` varchar(20) NOT NULL,
  `tot_salary` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_details`
--

INSERT INTO `salary_details` (`sid`, `year`, `month`, `OT`, `bonus`, `deduction`, `usr_ID`, `epf`, `etf`, `tot_salary`) VALUES
(1, '2017', 'january', '1000', '2000', '100', 19, '2000', '500', '25400'),
(2, '2017', 'january', '1000', '2000', '200', 20, '1440', '360', '19000'),
(3, '2017', 'february', '1000', '2000', '100', 19, '2000', '500', '25400'),
(4, '2017', 'february', '1000', '2000', '500', 20, '1440', '360', '18700'),
(5, '2018', 'january', '1000', '2000', '100', 19, '2000', '500', '25400'),
(6, '2018', 'january', '1000', '2000', '100', 20, '1440', '360', '19100'),
(7, '2019', 'january', '1000', '2000', '100', 19, '2000', '500', '24400'),
(8, '2019', 'january', '1000', '2000', '100', 20, '1440', '360', '19100'),
(9, '2019', 'february', '1000', '2000', '100', 19, '2000', '500', '25400'),
(10, '2019', 'february', '1000', '1500', '200', 20, '1440', '360', '18500');

-- --------------------------------------------------------

--
-- Table structure for table `sold_product`
--

CREATE TABLE `sold_product` (
  `sp_id` int(11) NOT NULL,
  `it_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` varchar(10) NOT NULL,
  `amount` double NOT NULL,
  `discount` varchar(5) NOT NULL DEFAULT '0',
  `pos_id` int(11) NOT NULL,
  `sp_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sold_product`
--

INSERT INTO `sold_product` (`sp_id`, `it_name`, `price`, `quantity`, `amount`, `discount`, `pos_id`, `sp_status`) VALUES
(1, 'Plaster', 5.5, '1', 5.5, '0.00', 1, 'act'),
(2, 'Plaster', 5.5, '1', 5.5, '0.00', 2, 'act'),
(3, 'Plaster', 5.5, '1', 5.5, '0.00', 3, 'act'),
(4, 'Plaster', 100, '10', 1000, '0.00', 6, 'act'),
(5, 'Plaster', 10, '5', 50, '2.50', 7, 'act'),
(6, 'Fluoxetine', 2.13, '30', 63.9, '0.00', 7, 'act'),
(7, 'Plaster', 10, '5', 50, '2.50', 8, 'act'),
(8, 'Fluoxetine', 2.13, '30', 63.9, '0.00', 8, 'act'),
(9, 'Plaster', 23.77, '10', 237.7, '0.00', 9, 'act'),
(10, 'hjj', 23.77, '10', 237.7, '0.00', 10, 'act'),
(11, 'penadol', 2.13, '10', 21.3, '0.00', 11, 'act'),
(12, 'vhgfhgf', 23.77, '10', 237.7, '4.75', 12, 'act'),
(13, 'vhgfhgf', 23.77, '10', 237.7, '4.75', 13, 'act'),
(14, 'ghh', 100, '20', 2000, '0.00', 14, 'act'),
(15, 'plaster', 10, '10', 100, '0.00', 15, 'act'),
(16, 'plaster', 10, '10', 100, '0.00', 16, 'act'),
(17, 'o', 23.77, '2', 47.54, '0.00', 17, 'act'),
(18, 'plaster', 5, '10', 50, '0.00', 19, 'act'),
(19, 'plaster', 5, '10', 50, '0.00', 20, 'act'),
(20, 'Plaster', 5, '20', 100, '0.00', 21, 'act'),
(21, 'penadol', 2, '20', 40, '0.00', 21, 'act'),
(22, 'Plaster', 5, '20', 100, '0.00', 22, 'act'),
(23, 'penadol', 2, '20', 40, '0.00', 22, 'act'),
(24, 'Penadol', 2, '50', 100, '0.00', 23, 'act'),
(25, 'Penadol', 1.5, '50', 75, '0.00', 24, 'act'),
(26, 'soap', 45, '10', 450, '9.00', 24, 'act'),
(27, 'soap', 45, '1', 45, '0.00', 25, 'act'),
(28, 'soap', 10, '3', 30, '0.00', 29, 'act'),
(29, 'soap', 50, '3', 150, '0.00', 29, 'act'),
(30, 'soap', 10, '3', 30, '0.00', 30, 'act'),
(31, 'soap', 35, '3', 105, '0.00', 31, 'act'),
(32, 'Aripiprazole', 23.77, '30', 713.1, '0.00', 32, 'act'),
(33, 'Aripiprazole', 23.77, '10', 237.7, '4.75', 33, 'act'),
(34, 'Fluoxetine', 2.13, '10', 21.3, '0.43', 33, 'act'),
(35, 'Aripiprazole', 23.77, '15', 356.55, '0.00', 34, 'act'),
(36, 'Aripiprazole', 23.77, '100', 2377, '23.77', 35, 'act'),
(37, 'Aripiprazole', 23.77, '100', 2377, '23.77', 36, 'act'),
(38, '	Aripiprazole', 23.77, '10', 237.7, '0.00', 37, 'act'),
(39, 'Fluoxetine', 2.13, '10', 21.3, '0.00', 37, 'act'),
(40, 'Vitamin C', 10, '20', 200, '4.00', 37, 'act'),
(41, '1', 23.77, '30', 713.1, '57.05', 40, 'act'),
(42, '2', 2.13, '30', 63.9, '0.00', 40, 'act'),
(43, '13', 10, '10', 100, '0.00', 41, 'act'),
(44, '2', 2.13, '15', 31.95, '0.00', 41, 'act'),
(45, '1', 23.77, '45', 1069.65, '53.48', 42, 'act'),
(46, '2', 2.13, '30', 63.9, '0.00', 43, 'act'),
(47, '1', 23.77, '30', 713.1, '0.00', 43, 'act'),
(48, '1', 23.77, '30', 713.1, '0.00', 45, 'act'),
(49, '2', 2.13, '30', 63.9, '0.00', 45, 'act'),
(50, '13', 10, '30', 300, '45.00', 45, 'act'),
(51, '1', 23.77, '10', 237.7, '0.00', 46, 'act'),
(52, '1', 23.77, '15', 356.55, '0.00', 47, 'act'),
(53, '1', 23.77, '20', 475.4, '0.00', 48, 'act'),
(54, '1', 23.77, '25', 594.25, '0.00', 49, 'act'),
(55, '1', 23.77, '10', 237.7, '0.00', 50, 'act'),
(56, '13', 10, '10', 100, '0.00', 51, 'act'),
(57, '1', 23.77, '100', 2377, '0.00', 52, 'act'),
(58, '13', 10, '10', 100, '0.00', 53, 'act'),
(59, '1', 23.77, '100', 2377, '0.00', 54, 'act'),
(60, '1', 23.77, '100', 2377, '0.00', 55, 'act'),
(61, '1', 23.77, '120', 2852.4, '0.00', 56, 'act'),
(62, '13', 10, '120', 1200, '0.00', 56, 'act'),
(63, '2', 2.13, '1', 2.13, '0.00', 57, 'act'),
(64, '1', 23.77, '500', 11885, '0.00', 58, 'act'),
(65, '2', 2.13, '1', 2.13, '0.00', 59, 'act'),
(66, '1', 23.77, '3', 71.31, '0.00', 60, 'act'),
(67, '1', 23.77, '3', 71.31, '0.00', 62, 'act'),
(68, '2', 2.13, '3', 6.39, '0.00', 63, 'act'),
(69, '1', 23.77, '3', 71.31, '0.00', 63, 'act'),
(70, '1', 23.77, '3', 71.31, '0.00', 64, 'act'),
(71, '1', 23.77, '3', 71.31, '0.00', 65, 'act'),
(72, '2', 2.13, '3', 6.39, '0.00', 65, 'act'),
(73, '13', 10, '10', 100, '0.00', 66, 'act'),
(74, '1', 23.77, '15', 356.55, '0.00', 66, 'act'),
(75, '2', 2.13, '15', 31.95, '0.00', 66, 'act'),
(76, '13', 10, '10', 100, '0.00', 67, 'act'),
(77, '1', 23.77, '10', 237.7, '0.00', 67, 'act'),
(78, '2', 2.13, '10', 21.3, '0.00', 68, 'act'),
(79, '1', 23.77, '10', 237.7, '0.00', 68, 'act'),
(80, '1', 23.77, '15', 356.55, '0.00', 69, 'act'),
(81, '13', 10, '10', 100, '5.00', 69, 'act'),
(82, '13', 10, '3', 30, '0.00', 70, 'act'),
(83, '1', 23.77, '10', 237.7, '0.00', 70, 'act'),
(84, '2', 2.13, '3', 6.39, '0.00', 71, 'act'),
(85, '1', 2.13, '3', 6.39, '0.00', 72, 'act'),
(86, '2', 2.13, '3', 6.39, '0.00', 73, 'act'),
(87, '1', 2.13, '3', 6.39, '0.00', 74, 'act'),
(88, '1', 23.77, '3', 71.31, '0.00', 74, 'act');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `st_id` int(11) NOT NULL,
  `ref_type` varchar(10) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `st_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `item_id` int(11) NOT NULL,
  `st_in` int(11) NOT NULL,
  `st_out` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`st_id`, `ref_type`, `ref_no`, `st_date`, `item_id`, `st_in`, `st_out`) VALUES
(1, 'Sale', 70, '2019-12-30 15:27:01', 13, 0, 3),
(2, 'Sale', 70, '2019-12-30 15:27:01', 1, 0, 10),
(3, 'Return', 21, '2019-12-30 15:40:11', 1, 15, 0),
(4, 'Return', 22, '2019-12-30 15:45:12', 1, 10, 0),
(5, 'Return', 22, '2019-12-30 15:45:13', 2, 10, 0),
(6, 'Return', 23, '2019-12-30 16:30:26', 13, 10, 0),
(7, 'Return', 23, '2019-12-30 16:30:26', 1, 10, 0),
(8, 'GRN', 34, '2019-12-30 16:44:17', 1, 1000, 0),
(9, 'GRN', 35, '2019-12-30 16:47:00', 1, 1000, 0),
(10, 'GRN', 35, '2019-12-30 16:47:00', 1, 10, 0),
(11, 'GRN', 36, '2019-12-30 16:50:28', 1, 1000, 0),
(12, 'GRN', 36, '2019-12-30 16:50:28', 1, 10, 0),
(13, 'GRN', 38, '2019-12-30 17:06:55', 1, 1000, 0),
(14, 'GRN', 38, '2019-12-30 17:06:55', 2, 1000, 0),
(15, 'GRN', 39, '2019-12-30 17:09:51', 1, 1000, 0),
(16, 'GRN', 39, '2019-12-30 17:09:51', 2, 500, 0),
(17, 'GRN', 40, '2019-12-31 11:57:03', 1, 500, 0),
(18, 'GRN', 41, '2019-12-31 12:08:48', 13, 100, 0),
(19, 'Sale', 71, '2019-12-31 13:56:40', 2, 0, 3),
(20, 'Sale', 72, '2019-12-31 13:57:32', 1, 0, 3),
(21, 'Sale', 73, '2019-12-31 13:59:51', 2, 0, 3),
(22, 'Sale', 74, '2020-01-01 15:04:36', 1, 0, 3),
(23, 'Sale', 74, '2020-01-01 15:04:36', 1, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `sup_id` int(11) NOT NULL,
  `sup_name` varchar(50) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `sup_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`sup_id`, `sup_name`, `company_name`, `contact_no`, `sup_status`) VALUES
(1, 'Jak', 'WXYZ', '0771234567', 'act'),
(2, 'Shane', 'PQRS', '0711223344', 'act');

-- --------------------------------------------------------

--
-- Table structure for table `sup_payments`
--

CREATE TABLE `sup_payments` (
  `pay_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `pay_method` varchar(10) NOT NULL,
  `cheque_no` varchar(15) DEFAULT NULL,
  `cheque_date` date DEFAULT NULL,
  `sup_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sup_payments`
--

INSERT INTO `sup_payments` (`pay_id`, `amount`, `pay_method`, `cheque_no`, `cheque_date`, `sup_id`) VALUES
(1, 10000, 'Cheque', '004488', '2019-10-12', 2),
(2, 8000, 'Cash', '', '0000-00-00', 1),
(3, 0, 'cash', '', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `usr_ID` int(11) NOT NULL,
  `usr_Name` varchar(50) NOT NULL,
  `usr_password` varchar(32) NOT NULL,
  `usr_NIC` varchar(15) NOT NULL,
  `date_of_birth` date NOT NULL,
  `usr_address` varchar(200) NOT NULL,
  `usr_mobile` varchar(10) NOT NULL,
  `usr_email` varchar(100) NOT NULL,
  `role` varchar(50) NOT NULL,
  `basic_salary` int(10) NOT NULL,
  `random_no` varchar(7) DEFAULT NULL,
  `usr_status` varchar(6) NOT NULL DEFAULT 'act'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`usr_ID`, `usr_Name`, `usr_password`, `usr_NIC`, `date_of_birth`, `usr_address`, `usr_mobile`, `usr_email`, `role`, `basic_salary`, `random_no`, `usr_status`) VALUES
(19, 'Kasun', 'b59c67bf196a4758191e42f76670ceba', '199328601330', '1993-10-12', 'Kandy', '0757288142', 'kasun.disanayake@gmail.com', 'admin', 25000, '1263929', 'act'),
(20, 'Nisal', 'b59c67bf196a4758191e42f76670ceba', '960000444V', '1996-01-13', 'Colombo', '0711466477', 'nisal.disanayake@gmail.com', 'cashier', 18000, NULL, 'act'),
(21, 'Sadev', 'b59c67bf196a4758191e42f76670ceba', '910000000V', '1991-04-21', 'Colombo', '0757288142', 'sadev.chandrabaratha@gmail.com', 'storekeeper', 10000, NULL, 'act'),
(22, 'Ishara', 'd41d8cd98f00b204e9800998ecf8427e', '931111444V', '1993-01-21', 'Colombo', '0778554444', 'isharadilshan@gmail.com', 'manager', 25000, NULL, 'act');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_ID`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`drg_id`);

--
-- Indexes for table `drugs_category`
--
ALTER TABLE `drugs_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `drug_product`
--
ALTER TABLE `drug_product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `grn`
--
ALTER TABLE `grn`
  ADD PRIMARY KEY (`grn_id`);

--
-- Indexes for table `grocery_items`
--
ALTER TABLE `grocery_items`
  ADD PRIMARY KEY (`git_id`);

--
-- Indexes for table `items_return`
--
ALTER TABLE `items_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `online_sold_items`
--
ALTER TABLE `online_sold_items`
  ADD PRIMARY KEY (`osi_id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`pos_id`);

--
-- Indexes for table `returned_items`
--
ALTER TABLE `returned_items`
  ADD PRIMARY KEY (`ri_id`);

--
-- Indexes for table `salary_details`
--
ALTER TABLE `salary_details`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `sold_product`
--
ALTER TABLE `sold_product`
  ADD PRIMARY KEY (`sp_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`sup_id`);

--
-- Indexes for table `sup_payments`
--
ALTER TABLE `sup_payments`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`usr_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cus_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `drg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `drugs_category`
--
ALTER TABLE `drugs_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `drug_product`
--
ALTER TABLE `drug_product`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `grn`
--
ALTER TABLE `grn`
  MODIFY `grn_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `grocery_items`
--
ALTER TABLE `grocery_items`
  MODIFY `git_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `items_return`
--
ALTER TABLE `items_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `offer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `online_sold_items`
--
ALTER TABLE `online_sold_items`
  MODIFY `osi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `pos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `returned_items`
--
ALTER TABLE `returned_items`
  MODIFY `ri_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `salary_details`
--
ALTER TABLE `salary_details`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sold_product`
--
ALTER TABLE `sold_product`
  MODIFY `sp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `st_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `sup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sup_payments`
--
ALTER TABLE `sup_payments`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `usr_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
