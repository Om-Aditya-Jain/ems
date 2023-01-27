-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2023 at 06:14 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `txn_details`
--

CREATE TABLE `txn_details` (
  `sno` int(11) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `sender_id` varchar(1000) NOT NULL,
  `receiver_id` varchar(1000) NOT NULL,
  `txn_hash` varchar(1000) NOT NULL,
  `value` float NOT NULL,
  `transaction_fee` varchar(1000) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `txn_details`
--

INSERT INTO `txn_details` (`sno`, `username`, `sender_id`, `receiver_id`, `txn_hash`, `value`, `transaction_fee`, `timestamp`) VALUES
(1, 'om', '0x877Fa48191C7EE80040F19d46E7287F58Aa50fa2', '0x7077A01bfaD89871f365BB01815bc517e19Aaf92', '0xf36e4ea211e58de47d24ea6a72be422cdbcb571765295c46f310c760cda48ecf', 0.001, '0.000000000002331', '2023-01-25 18:12:49'),
(2, 'om', '0x877Fa48191C7EE80040F19d46E7287F58Aa50fa2', '0x7077A01bfaD89871f365BB01815bc517e19Aaf92', '0x8e4c5c501bfb55575b7fd1376017a3a6ff7034fcd844a05178e69c06f77ccd6c', 0.001, '0.000000000002562', '2023-01-25 18:17:50'),
(3, 'om', '0x877Fa48191C7EE80040F19d46E7287F58Aa50fa2', '0x7077A01bfaD89871f365BB01815bc517e19Aaf92', '0xd8b2f72b83588030e50c9242a3c63898666ae80064712f59730f8a55f18b2e55', 0.001, '0.0000000000021', '2023-01-25 18:20:49'),
(4, 'om', '0x877Fa48191C7EE80040F19d46E7287F58Aa50fa2', '0x7077A01bfaD89871f365BB01815bc517e19Aaf92', '0x696b97e991c63dc4294e760f10f27077a8bc78aa94dc84d0de158a10bb8aa57b', 0.001, '0.000000000001386', '2023-01-26 07:53:42'),
(5, 'om', '0x877Fa48191C7EE80040F19d46E7287F58Aa50fa2', '0x7077A01bfaD89871f365BB01815bc517e19Aaf92', '0x80fa467b00f69a4976ff93e98a4c3e2649e40861dbcb7ff8eadd5fdf1a865ef4', 0.001, '0.000000000001134', '2023-01-26 07:57:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `txn_details`
--
ALTER TABLE `txn_details`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `txn_details`
--
ALTER TABLE `txn_details`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
