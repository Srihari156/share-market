-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2025 at 12:43 PM
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
-- Database: `share_market`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`) VALUES
(1, 'Saregama india Ltd'),
(2, 'Hindustan Unilever Ltd'),
(3, 'Hero MotoCorp Ltd'),
(4, 'Ashok Leyland Ltd'),
(5, 'Asian Paints Ltd'),
(6, 'Bata India Ltd'),
(7, 'Bajaj Electricals Ltd'),
(8, 'Amrutanjan Health Care Ltd');

-- --------------------------------------------------------

--
-- Table structure for table `sell_details`
--

CREATE TABLE `sell_details` (
  `id` int(11) NOT NULL,
  `company_name_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `closed` varchar(200) DEFAULT NULL,
  `open` varchar(200) DEFAULT NULL,
  `high` varchar(200) DEFAULT NULL,
  `low` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sell_details`
--

INSERT INTO `sell_details` (`id`, `company_name_id`, `date`, `closed`, `open`, `high`, `low`) VALUES
(1, 1, '2025-06-03', '552.50', '548.33', '556.65', '545.20'),
(2, 1, '2025-06-02', '546.85', '540.25', '550.00', '537.40'),
(3, 1, '2025-05-30', '542.55', '546.80', '546.80', '537.00'),
(4, 1, '2025-05-29', '548.25', '558.50', '558.50', '542.45'),
(5, 1, '2025-05-28', '554.80', '560.00', '560.00', '552.70'),
(8, 1, '2025-05-23', '543.05', '536.00', '547.55', '532.80'),
(9, 1, '2025-05-22', '537.65', '536.55', '541.55', '530.25'),
(10, 1, '2025-05-21', '536.15', '537.60', '538.90', '530.00'),
(11, 2, '2025-06-03', '2352.30', '2365.10', '2379.50', '2342.60'),
(12, 2, '2025-06-02', '2371.60', '2347.90', '2384.00', '2343.60'),
(13, 2, '2025-05-30', '2348.30', '2360.00', '2374.90', '2343.50'),
(14, 2, '2025-06-29', '2366.70', '2369.00', '2376.00', '2355.50'),
(15, 2, '2025-06-28', '2362.00', '2388.00', '2388.00', '2352.00'),
(16, 2, '2025-05-27', '2380.20', '2394.10', '2409.50', '2360.30'),
(17, 2, '2025-05-26', '2394.10', '2368.00', '2397.30', '2364.10'),
(18, 2, '2025-05-23', '2359.20', '2336.90', '2364.50', '2329.60'),
(19, 2, '2025-05-22', '2330.70', '2355.00', '2363.10', '2313.10'),
(20, 2, '2025-05-21', '2363.90', '2346.00', '2375.70', '2375.70'),
(21, 3, '2025-06-03', '4208.60', '4250.00', '4280.50', '4201.00'),
(22, 3, '2025-06-02', '4232.30', '4310.10	', '4318.70	', '4196.00	'),
(23, 3, '2025-05-30', '4309.30	', '4341.60	', '4380.00', '4289.30	'),
(24, 3, '2025-05-29', '4356.60	', '4384.00		', '4384.00	', '4332.10'),
(25, 3, '2025-05-28', '4362.20	', '4368.00	', '4383.40	', '4310.50	'),
(26, 3, '2025-05-27', '4338.20	', '4370.50		', '4374.90	', '4300.00'),
(27, 3, '2025-05-26', '4359.40		', '4309.90	', '4418.30	', '4300.00'),
(28, 3, '2025-05-23', '4308.80	', '4288.90	', '4335.00	', '4276.40'),
(29, 3, '2025-05-22', '4276.30	', '4250.00		', '4284.00	', '4202.90'),
(30, 3, '2025-05-21', '4263.80	', '4241.00		', '4288.90	', '4212.00'),
(31, 4, '2025-06-03', '236.11	', '237.52		', '237.72	', '235.90'),
(32, 4, '2025-06-02', '236.25	', '237.75	', '237.75		', '234.46'),
(33, 4, '2025-05-30', '236.03		', '240.73	', '240.77	', '235.10'),
(34, 4, '2025-05-29', '240.73	', '240.00	', '241.20	', '238.05'),
(35, 4, '2025-05-28', '238.63	', '240.00		', '242.45	', '238.15'),
(36, 4, '2025-05-27', '239.62	', '240.50		', '241.50	', '238.00'),
(37, 4, '2025-05-26', '239.89	', '241.80		', '241.90	', '237.05'),
(38, 4, '2025-05-23', '239.61		', '241.00	', '243.80	', '235.14'),
(39, 4, '2025-05-22', '238.80		', '240.00	', '241.42	', '236.32'),
(40, 4, '2025-05-21', '244.61		', '243.51	', '245.78	', '239.50'),
(41, 5, '2025-06-03', '2255.70	', '2272.60	', '2287.30		', '2246.70'),
(42, 5, '2025-06-02', '2266.70	', '2259.10	', '2272.30	', '2257.90'),
(43, 5, '2025-05-30', '2259.10	', '2296.50	', '2304.00	', '2255.00'),
(44, 5, '2025-05-29', '2294.30	', '2303.20		', '2309.00	', '2286.50'),
(45, 5, '2025-05-28', '2303.20		', '2327.60	', '2333.00	', '2300.30'),
(46, 5, '2025-05-27', '2327.60	', '2313.10		', '2351.60	', '2301.10'),
(47, 5, '2025-05-26', '2327.20	', '2316.00		', '2338.00	', '2302.80'),
(48, 5, '2025-05-23', '2315.50', '2301.80', '2329.00', '2295.00'),
(49, 5, '2025-05-22', '2299.20', '2309.20', '2310.00', '2283.10'),
(50, 5, '2025-05-21', '2312.40', '2296.00', '2316.20', '2290.00'),
(51, 6, '2025-06-04', '1221.90', '1223.90', '1237.40', '1220.30'),
(53, 8, '2025-06-05', '735.45	', '738.00	', '743.45	', '732.10	');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_details`
--
ALTER TABLE `sell_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_company_name_id` (`company_name_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sell_details`
--
ALTER TABLE `sell_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sell_details`
--
ALTER TABLE `sell_details`
  ADD CONSTRAINT `fk_company_name_id` FOREIGN KEY (`company_name_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
