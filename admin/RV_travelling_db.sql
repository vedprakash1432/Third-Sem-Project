-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 03:38 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `traveling`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Image` varchar(60) NOT NULL,
  `Number` int(10) NOT NULL,
  `Password` int(20) NOT NULL,
  `Bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `Image`, `Number`, `Password`, `Bio`) VALUES
(1, 'vedprakash', 'vedprakashsharma2246@gmail.com', 'IMG-20210307-WA0018.jpg', 2147483647, 143256, 'software engineer'),
(2, 'raj', 'vedprakashsharma2246@gmail.com', 'raj.png', 2147483647, 14325, 'fullstack developer');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Number` int(10) NOT NULL,
  `Destination_Name` varchar(50) NOT NULL,
  `Traveling_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `Adult` int(2) NOT NULL,
  `Child` int(4) NOT NULL,
  `Playboy` int(3) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `Name`, `Email`, `Number`, `Destination_Name`, `Traveling_date`, `Adult`, `Child`, `Playboy`, `Date`) VALUES
(1, 'vedprakash', 'vedprakashsharma2246@gmail.com', 2147483647, 'mumbai', '2023-12-22 18:30:00', 1, 0, 0, '2023-12-29 18:30:47'),
(2, 'Vijay', 'vedprakashsharma2246@gmail.com', 55555555, 'mumbai', '2024-01-02 18:30:00', 1, 1, 0, '2023-12-29 18:35:00');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(3) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone` int(10) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `Date_Time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Subject`, `Message`, `Date_Time`) VALUES
(1, 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'issues', 'aaaaaaaaaaaaaaaaa', '2023-12-14 05:58:03'),
(2, 'Raj', 'sharma', 'vedprakashsharma2246@gmail.com', 5555555, 'issues', 'jjjjjjjjjjjjjjjjjjjjj', '2023-12-14 06:20:53'),
(3, 'Raj', 'sharma', 'rahuljaiswal273158@gmail.com', 2122112212, 'issues', 'aaaaaaaaaaaaaaaa', '2023-12-14 06:21:36'),
(4, 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'issues', 'nnnnnnnnnnnnnn', '2023-12-15 08:46:23'),
(5, 'ved', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'issues', 'ggggggggggggggggg', '2023-12-16 05:59:06'),
(6, 'ramesh', 'sharma', 'rahuljaiswal273158@gmail.com', 500055444, 'about tour', 'ffffffffffffff', '2024-01-02 13:45:29');

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(3) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Destination_type` varchar(30) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `Name`, `Image`, `Price`, `Destination_type`, `Description`) VALUES
(4, 'Dubai', 'dubai1.webp', 59999, 'international', 'this is awesome place in world.'),
(6, 'Gorakhpur', 'gkp_temple1.avif', 78999, 'domestic', 'nice place in gorakhpur'),
(7, 'Lalkila', 'lalkila1.jpg', 99999, 'domestic', 'Services  registered with Aadhaar'),
(8, 'india gate', 'india_gate1.webp', 79999, 'domestic', 'awesome'),
(9, 'Kutumminar', 'kutumminar1.jpg', 59999, 'domestic', 'very good place'),
(11, 'Dubai tower', 'dubai_tower3.jpeg', 99999, 'international', 'this is awesome place in world.'),
(12, 'Newzealand', 'newzealand1.avif', 59999, 'international', 'this is awesome place in world.'),
(14, 'Australia', 'aust1.jpg', 9999, 'international', 'this is awesome place in world.'),
(15, 'Japan', 'japan1.jpeg', 9999, 'international', 'this is awesome place in world.'),
(16, 'Dubai Matro', 'Dubai-Metro2.jpg', 69999, 'international', 'this is awesome place in world.'),
(17, 'Aagra', 'aga.jpg', 59999, 'domestic', 'this is awesome place in world.');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(3) NOT NULL,
  `Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Contact` int(10) NOT NULL,
  `Holiday_Type` varchar(30) NOT NULL,
  `Destination` varchar(50) NOT NULL,
  `Date_Time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `Name`, `Email`, `Contact`, `Holiday_Type`, `Destination`, `Date_Time`) VALUES
(1, 'Vijay', 'vedprakashsharma2246@gmail.com', 2147483647, 'domestic', 'dubai', '2023-12-16 07:07:44'),
(3, 'Vijay', 'vedprakashsharma2246@gmail.com', 2147483647, 'international', 'Mumbai', '2023-12-29 16:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(3) NOT NULL,
  `Title` varchar(15) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(60) NOT NULL,
  `Phone` bigint(10) NOT NULL,
  `Image` varchar(60) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Title`, `First_Name`, `Last_Name`, `Email`, `Phone`, `Image`, `Address`, `Password`) VALUES
(12, 'Mr', 'vedprakash', 'sharma', 'vedprakashsharma2246@gmail.com', 7705063770, 'ved2.jpg', 'Gorakhpur', '14325'),
(13, 'Mr', 'Raj', 'sharma', 'vedprakashsharma2246@gmail.com', 2122112212, 'usa1.webp', 'delhi', '143256'),
(16, 'Mr', 'vijay', 'chaurasiya', 'vedprakashsharma2246@gmail.com', 2147483647, '1669942419780.jpg', 'gujrat', '143256'),
(17, 'Mr', 'Ramesh', 'Jaiswal', 'vedprakashsharma2246@gmail.com', 7705063770, '1669942418643.jpg', 'gorakhpur', '123456789');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
